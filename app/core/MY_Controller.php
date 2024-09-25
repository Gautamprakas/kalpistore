<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	public $location_type;
	public $location_id;
	public $user_id;
	public $login_type;
	public $loginDateTime;
	public $name;
	public $mobile;
	public $email;
	public $office_type;
	public $office_id;
	public $vdsai_token;
	public $ltn;

	public function __construct(){

		parent::__construct();
		if( ! $this->isLogin() )  
			redirect('Login');

		$this->location_type = $this->session->userdata("location_type");
		$this->location_id   = $this->session->userdata("location_id");
		$this->user_id       = $this->session->userdata("user_id");
		$this->login_type    = $this->session->userdata("login_type");
		$this->loginDateTime = $this->session->userdata("loginDateTime");
		$this->name          = $this->session->userdata("name");
		$this->email         = $this->session->userdata("email");
		$this->mobile        = $this->session->userdata("mobile");
		$this->office_type   = $this->session->userdata("office_type");
		$this->office_id     = $this->session->userdata("office_id");
		$this->vdsai_token     = $this->session->userdata("vdsai_token");
		$this->ltn     		 = $this->session->userdata("ltn");

		
		if($this->location_type == 'VILLAGE'){
			$cookie = array(
				'name'   => 'token',
				'value'  => $this->vdsai_token,
				'expire' => time()+86500,
				'secure' => false,
				'prefix' => 'vdsai_',
			);
			set_cookie($cookie);
		}

		// if( ! $this->isQrValidated() && uri_string() != "Qrview/view" && uri_string() != "qrview/validateQr" )  
		// 	redirect('Qrview/view');
	}

	private function isLogin(){
        
        $is_login = $this->session->userdata("is_login");
        $base_url = $this->session->userdata("base_url");
        $location_type = $this->session->userdata("location_type");
        $vdsai_token = $this->session->userdata("vdsai_token");
        $vdsai_token_cookie = get_cookie('vdsai_token');

        if( $is_login && $base_url == base_url() && ( $location_type != 'VILLAGE' || $vdsai_token == $vdsai_token_cookie ) )
        	return true;
        else
        	return false;
	}

	 private function isQrValidated(){
	 	$is_login = $this->session->userdata("is_login");
        $base_url = $this->session->userdata("base_url");
        $location_type = $this->session->userdata("location_type");
        $vdsai_token = $this->session->userdata("vdsai_token");
        $vdsai_token_cookie = get_cookie('vdsai_token');
        $qr_validate = $this->session->userdata("qr_validate");


        if( $is_login && $base_url == base_url() && ( $location_type != 'VILLAGE' || ($vdsai_token == $vdsai_token_cookie && $qr_validate == TRUE) ) )
        	return true;
        else
        	return false;

	 }
}