<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginModel extends CI_Model {

    function __construct(){
        parent::__construct();
        $this->db = $this->load->database('default',TRUE);
        $this->load->helper('my_helper');
    }

    public function validate( $uid , $pwd , $user_agent){ 
        /*// validate user id and password for software login...*/

        $result_resource = $this->db->get_where('customers',['mobile'=>$uid]);
        if( $result_resource->num_rows() == 1 && caseCompareIdPwd($uid,$pwd,$result_resource->row()->mobile,$result_resource->row()->password) ){
            //caseCompareIdPwd($uid,$pwd,$res->row()->user_id,$res->row()->password
            $data["id"]              = $result_resource->row()->name;
            $data["type"]            = $result_resource->row()->login_type;
            $data["is_login"]        = true;
            $data["mobile"]          = $result_resource->row()->mobile;
            $data["name"]            =$result_resource->row()->name;
            $data["base_url"]        = base_url();
        }else{

            $data["is_login"] = false;
            
        }

       /* if( $uid == "admin" && $pwd == "admin@123" ){
            
            $data["id"]              = "admin";
            $data["type"]            = 'admin';
            $data["is_login"]        = true;
            $data["mobile"]          = '';
            $data["base_url"]        = base_url();
            
        }else{
            
            $data["is_login"] = false;
        }*/

        return $data;
    }


}