<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller { 

	function __construct(){
		parent::__construct();
		$this->load->library('session');
	}

	public function index(){

		if($this->session->userdata("is_login") == true){
			$this->logout();
		}
		$this->load->view("login");  
	}

	public function auth(){
			
		$uid = $this->input->post("username");
	    $pwd = $this->input->post("password");
	    $user_agent = $this->input->user_agent();

	    $this->load->model('LoginModel');

	    $sessionData = $this->LoginModel->validate($uid,$pwd,$user_agent);

	    if( $sessionData["is_login"] ){
	    	$this->db->where('mobile',$uid);
	    	$this->db->update('customers',["last_login"=>date('Y-m-d H:i:s')]);
	    	
	    	$this->session->set_userdata($sessionData);
	    	//redirect('Location');
	    	//redirect('Admin/dashboard');
	    	if($sessionData['type']=='shopkeeper'){
	    		redirect('Shopkeeper/dashboard');
	    	}else if($sessionData['type']=='customer'){
	    		redirect('Customer/restaurant');
	    	}
	    	

	    	// if( $sessionData['type'] == "admin" ){
	    	// 	redirect('Railway/dashboard');
	    	// }else if( $sessionData['type'] == "dept" ){
	    	// 	redirect('view/CreateForm/finalBillingReport/1690450752274/admin');
	    	// }else if( $sessionData['type'] == "siteincharge" ){
	    	// 	redirect('view/CreateForm/viewRejectedFormData/1690365766');
	    	// }else if( $sessionData['type'] == "block" ){
	    	// 	redirect('view/CreateForm/viewUpdateFormData/1690365766B');
	    	// }else if( $sessionData['type'] == "seniorssc" ){
	    	// 	redirect('view/CreateForm/assignWork/ssc');
	    	// }else if( $sessionData['type'] == "sbsadmin" ){
	    	// 	redirect('view/CreateForm/assignWork/sbs_supervisor');
	    	// }else if( $sessionData['type'] == "user" ){
	    	// 	redirect('Railway/dashboard');
	    	// }else{
	    	// 	$this->session->set_flashdata("authFail","Access Dined.");
	    	// 	redirect('view/Login');
	    	// }

	    }else{
	    	
	    	$this->session->set_flashdata("authFail","Invalid Username / Password.");
	    	redirect('Login');

	    }
	}

	public function logout(){

		$this->session->sess_destroy();
        redirect('Login');
	}


}
