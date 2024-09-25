<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller {
  public function __construct(){
  	 parent::__construct();
  	 $this->load->model('EmployeeModel');
  }
  public function createUserView($type){

    if($type=="sse"){
      $intent['form_title']     = "CREATE USER SSE";
      $intent['user_type']      ="dept";
    }else if($type=="sbs_supervisor"){
      $intent['form_title']     ="CREATE USER CONTRACTOR SUPERVISOR";
      $intent['user_type']      ="user";
    }
    
    $intent["menuActive"]     = "create_user";
    $intent["subMenuActive"]  = "createuser_".$type;
    $intent["headerCss"]      = "admin/employee/changePassword/changePasswordCss";
    $intent["mainContent"]    = "admin/employee/changePassword/create_user";
    $intent["footerJs"]       = "admin/employee/changePassword/changePasswordJs";
    $this->load->view("admin/include/template",$intent);
  }

  public function saveUser(){
    $type=$this->uri->segment(4);
    $name=$this->input->post("name");
    $user_name=$this->input->post("username");
    $inserted_at=date('Y-m-d H:i:s');
    $contact=$this->input->post("contact");

    if($type=="dept"){
      $user_type='ssc';
    }else if($type=="user"){
      $user_type='sbs_supervisor';
    }
    $data['type']=$type;
    $data['name']=$name;
    $data['mobile']=$contact;
    $data['username']=$user_name;
    $data['inserted_at']=$inserted_at;
    $data['updated_at']=$inserted_at;
    $data['password']='123456';
    $data['active']='1';
    $data['coach_vivran']="yes";
    $data['dept']='RAILWAY';

    $user_res=$this->db->get_where("users",["username"=>$user_name]);
    if($user_res->row()>0){
      $arr["user_message"] = "Username Already Taken Please Enter different ..";
      $arr["css"]     = "bg-red";
      $arr['timestamp']=time();
    }else{
      $this->db->insert("users",$data);
      if($this->db->affected_rows()>0){
        $arr["user_message"] = "User Created Successfully Password is 123456 ";
        $arr["css"]     = "bg-green";
        $arr['timestamp']=time();
      }else{
        $arr["user_message"] = "Can't create User ... ";
        $arr["css"]     = "bg-red";
        $arr['timestamp']=time();
      }
    }
    $this->session->set_flashdata($arr);
    redirect("Admin/createUserView/".$user_type);

  }

  public function changePasswordView(){
    
    $intent["menuActive"]     = "changepassword";
    $intent["subMenuActive"]  = "changepassword";
    $intent["headerCss"]      = "admin/employee/changePassword/changePasswordCss";
    $intent["mainContent"]    = "admin/employee/changePassword/changePasswordRailway";
    $intent["footerJs"]       = "admin/employee/changePassword/changePasswordJs";
    $this->load->view("admin/include/template",$intent);
  }

  public function changePassword(){

    $newPwd  = $this->input->post("newPwd");
    $oldPwd  = $this->input->post("oldPwd");
    $conNewPwd = $this->input->post("conNewPwd");
    if( strcmp($newPwd, $conNewPwd) == 0){

      $user_id = $this->session->userdata('id');
      $res = $this->EmployeeModel->changePasswordRailway($user_id,$oldPwd,$newPwd);
      if( $res ){
        $arr["message"] = "Password Change Successfully..";
        $arr["css"]     = "bg-green";
      }else{
        $arr["message"] = "InCorrect Old Password..";
        $arr["css"]     = "bg-red";
      }
      
    }else{

      $arr["message"] = "New Password And Confirm New Password Does Not Match..";
      $arr["css"]     = "bg-red";
    }
    $this->session->set_flashdata($arr);
    redirect("Admin/changePasswordView");
  }

  public function assignWork( $type ){

    $this->db = $this->load->database("default",TRUE);

    $train_numbers = [];
    $trains_res = $this->db->distinct()->select("train_number")->get("railway_trains");
    foreach($trains_res->result() as $row){
      $train_numbers[] = $row->train_number;
    }

    $users = [];
    $typename = "";
    $assigned_trains=[];

    if($type=="sbs_supervisor"){
      //user
      $typename = "Contractor Supervisor";
      $users_res = $this->db->where("type",USER_CONTRACTOR)->where("active","1")->get("users");
      foreach($users_res->result() as $row){
        $users[$row->username] = $row;
        $users[$row->username]->train_numbers = [];
      }
      $railway_mapping_res = $this->db->where("type",USER_CONTRACTOR)->get("railway_mapping");
      foreach($railway_mapping_res->result() as $row){
        $assigned_trains[]=$row->train_number;
        $users[$row->username]->train_numbers[] = $row->train_number;
      }

    }else if($type=="sse"){
      //dept
      $typename = "SSE";
      $users_res = $this->db->where("type",USER_SSE)->where("active","1")->get("users");
      foreach($users_res->result() as $row){
        $users[$row->username] = $row;
        $users[$row->username]->train_numbers = [];
      }
      $railway_mapping_res = $this->db->where("type",USER_SSE)->get("railway_mapping");
      foreach($railway_mapping_res->result() as $row){
        $users[$row->username]->train_numbers[] = $row->train_number;
        $assigned_trains[]=$row->train_number;
      }
    }
    $intent["users"] = $users;
    $intent["type"] = $type;
    $intent["train_numbers"] = $train_numbers;
    $intent["form_title"] = "Assign Work ".$typename;
    $intent["typename"] = $typename;
    $intent['assigned_trains']=$assigned_trains;
    $intent["menuActive"] = "assign_work";
    $intent["subMenuActive"]  = "assign_work_".$type;
    $intent["headerCss"]   = "admin/assign_work/assign_workCss";
    $intent["mainContent"] = "admin/assign_work/assign_work";
    $intent["footerJs"]    = "admin/assign_work/assign_workJs";
    // echo "<pre>";
    // print_r($intent);
    // die();

    $this->load->view("admin/include/template",$intent);
  }

} 