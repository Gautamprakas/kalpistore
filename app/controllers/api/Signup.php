<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Signup extends CI_Controller {

	public function index(){

		$post = $this->input->post();
        
        if( isset($post["uid"]) && isset($post["pwd"]) && !empty($post["uid"]) && !empty($post["pwd"]) ){

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