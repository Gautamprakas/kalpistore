<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Signup extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
		$this->validateApiKey();
	}

	private function validateApiKey(){

		$api_key=$this->input->get_request_header('X-API-KEY');

		//check if the api key is not provided
		if(empty($api_key)){
			$this->output
						->set_content_type('application/json')
						->set_status_header(400)
						->set_output(json_encode(["status_code"=>400,"message"=>"Missing Api key.."]))
						->_display();
			exit;
		}
		//A valid api key check
		if($api_key!=KALPI_STORE_API_KEY){
			$this->output
						->set_content_type('application/json')
						->set_status_header(401)
						->set_output(json_encode(["status_code"=>401,"message"=>"Invalid Api key.."]))
						->_display();
			exit;
		}

	}
	public function createCustomer(){
		
		// $input=file_get_contents('php://input');
		// $data=json_decode($input,true);
		$data=$this->input->post();
		$errors=[];
		 // Set validation rules
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('mobile', 'Mobile', 'required|regex_match[/^[0-9]{10}$/]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]');
        
        // Run validation
        if ($this->form_validation->run() == FALSE) {
            // Validation failed, show errors
            $this->output
					->set_content_type('application/json')
					->set_status_header(400)
					->set_output(json_encode(["status_code"=>400,"message"=>validation_errors()]));
			return;
		}else{
			$name=$this->db->escape_str($data['name']);
			$mobile=$this->db->escape_str($data['mobile']);
			$password=$this->db->escape_str($data['password']);
			$confirm_password=$this->db->escape_str($data['confirm_password']);
			// if(strcmp($password,$confirm_password)!==0){
			// 	$this->output
			// 				->set_content_type('application/json')
			// 				->set_status_header(400)
			// 				->set_output(json_encode(["status_code"=>400,"message"=>"password and confirm password did't matched"]));
			// 	return;
			// }
			$is_exist_cust=$this->db->get_where("customers",["mobile"=>$mobile])->row();
			if($is_exist_cust){
				$this->output
						->set_content_type('application/json')
						->set_status_header(500)
						->set_output(json_encode(["status_code"=>500,"message"=>"Mobile Number Already Registered"]));
				return;
			}else{
				$newCustomer=[
						"name"=>$name,
						"mobile"=>$mobile,
						"password"=>$password,
						"login_type"=>"customer"
					];
				$insert_new_entry=$this->db->insert("customers",$newCustomer);
				if($insert_new_entry){
	        		$this->output
						->set_content_type('application/json')
						->set_status_header(200)
						->set_output(json_encode(["status_code"=>200,"message"=>"Customer Created successfully.."]));
					return;

				}else{
					$this->output
								->set_content_type('application/json')
								->set_status_header(500)
								->set_output(json_encode(["status_code"=>500,"message"=>$this->db->error()]));
					return;
				}
			}

		}

		
		
		


	//EOF
	}

	public function createNewCustomer(){

		$post = $this->input->post();
        
        if( isset($post["name"]) && isset($post["mobile"]) && !empty($post["name"])){

        	if( $res = $this->AuthenticationModel( $post["uid"], $post["pwd"] ) ){

	        	if( strcasecmp($res->registered, 'no') == 0 ){

	        		$this->MakeUserRegisterModel($post["uid"]);
	        		unset($res->registered);
	        		unset($res->password);
		        	$response["status_code"] = "200";
		        	$response["status_message"] = "login successfully";
		        	$response["result"] = ["login_details"=>$res]; 
	        	}else{

		        	$response["status_code"] = "403";
		        	$response["status_message"] = "already registered";
		        	$response["result"] = null; 
	        	}
	        }else{

	        	$response["status_code"] = "404";
	        	$response["status_message"] = "invalid login_id / password";
	        	$response["result"] = null; 
	        }
        }else{

        	$response["status_code"] = "400";
        	$response["status_message"] = "bad request";
        	$response["result"] = null; 
        }

        echo json_encode($response);
	}

	

	private function AuthenticationModel( $uid , $pwd ){

		$this->db->select("login_type,user_id,location_type,location_id,office_id");
		$this->db->select("name,mobile,email,password,registered");
		$this->db->where("user_id",$uid);
        $this->db->where("password",$pwd);
        $this->db->where("status","active");
        $this->db->where_in("web_app",["both","app"]);
        $res = $this->db->get("user_details");

        if( $res->num_rows() > 0 && caseCompareIdPwd($uid,$pwd,$res->row()->user_id,$res->row()->password) )
        	return $res->row();
        else
        	return false;
	}


	
	private function MakeUserRegisterModel( $user_id ){

		$this->db->where('user_id',$user_id);
		$this->db->update("user_details",["registered"=>"yes"]);
		return true;

	}
}