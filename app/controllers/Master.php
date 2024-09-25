<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Master extends MY_Controller{
	public function addWarranty(){
    $this->db = $this->load->database("default",TRUE);
    $intent["menuActive"] = "warranty";
    $intent["subMenuActive"]  = "add_warranty";
    $intent["headerCss"]   = "admin/dashboard/dashboardCss";
    $intent["mainContent"] = "admin/master/add_warranty";
    $intent["footerJs"]    = "admin/master/add_warrantyJs";
    $this->load->view("admin/include/template",$intent);
  }
  public function saveaddWarranty(){
    // $this->db = $this->load->database("default",TRUE);
    $data['days'] = $this->input->post("days");
    $this->db->select("days");
    $this->db->where("days",$this->input->post("days"));
    $result=$this->db->get("railway_warranty_days");
    // print_r($result->result_array());
    // die();
    if(count($result->result_array())>0){
      echo "Duplicate Not Allowed";
      die();
    }
    $this->db->insert('railway_warranty_days', $data); // Correct way to insert data into the table

    if ($this->db->affected_rows() > 0) {
        echo "Data Inserted";
    } else {
        print_r($this->db->error());
    }
 }

  public function editWarranty(){
    $this->db->select("days");
    $this->db->from("railway_warranty_days");
    $query=$this->db->get();
    $intent['data']=$query->result_array();
    $intent["menuActive"] = "warranty";
    $intent["subMenuActive"]  = "edit_warranty";
    $intent["headerCss"]   = "admin/dashboard/dashboardCss";
    $intent["mainContent"] = "admin/master/edit_warranty";
    $intent["footerJs"]    = "admin/master/edit_warrantyJs";
    $this->load->view("admin/include/template",$intent);
    // print_r($intent);
  }

  public function saveUpdateWarranty(){

    $days=$this->input->post("days");
    $status=$this->input->post("status");
    $inputValue=$this->input->post("inputValue");
    $data['days']=$inputValue;
    if($status=="Delete"){
      $this->db->where("days",$days);
      $this->db->delete("railway_warranty_days");
    }else if($days!=$inputValue){
    $this->db->where("days",$days);
    $this->db->update("railway_warranty_days",$data);
   }else if($days==$inputValue){
    echo "Status Updated";
    die();
   }
    if($this->db->affected_rows()>0){
      echo "Status Updated";
    }
    else{
      print_r($this->db->error());
    }

  }
  //
  public function addTrain(){
    $this->db = $this->load->database("default",TRUE);
    $intent["menuActive"] = "update_form1";
    $intent["subMenuActive"]  = "add_train";
    $intent["headerCss"]   = "admin/dashboard/dashboardCss";
    $intent["mainContent"] = "admin/master/add_train";
    $intent["footerJs"]    = "admin/master/add_trainJs";
    $this->load->view("admin/include/template",$intent);
  }
  public function saveAddTrain(){
    // $this->db = $this->load->database("default",TRUE);
    $data['train_number'] = $this->input->post("trainNo");
    $this->db->select("train_number");
    $this->db->where("train_number",$this->input->post("trainNo"));
    $result=$this->db->get("railway_trains");
    if(count($result->result_array())>0){
      echo "Duplicate Not Allowed";
      die();
    }
    $this->db->insert('railway_trains', $data); // Correct way to insert data into the table

    if ($this->db->affected_rows() > 0) {
        echo "Data Inserted";
    } else {
        print_r($this->db->error());
    }
 }
  

  public function editTrain(){
    $this->db->select("train_number");
    $this->db->from("railway_trains");
    $query=$this->db->get();
    $intent['data']=$query->result_array();
    $intent["menuActive"] = "update_form1";
    $intent["subMenuActive"]  = "edit_train";
    $intent["headerCss"]   = "admin/dashboard/dashboardCss";
    $intent["mainContent"] = "admin/master/edit_train";
    $intent["footerJs"]    = "admin/master/edit_trainJs";
    $this->load->view("admin/include/template",$intent);
    // print_r($intent);
  }

    public function saveUpdateTrain(){

    $train_no=$this->input->post("trainNo");
    $status=$this->input->post("status");
    $data['status']=$status;
    $user_id=$this->session->userdata("id");
    // print_r($this->session->userdata);
    // die();
    if (empty($train_no)) {
        echo "Invalid input. Train number required.";
        return;
    }
    if($status=="Delete Train"){
      $this->db->where("train_number",$train_no);
      $this->db->delete("railway_trains");

      $affected_rows=$this->db->affected_rows();
    }else{
    $this->db->where("train_number",$train_no);
    $this->db->update("railway_trains",$data);
    $affected_rows=$this->db->affected_rows();
   }
   $data=[
    "train_number"=>$train_no,
    "user_id"=>$user_id,
    "delete_datetime"=>date('Y-m-d H:i:s'),
    "affected_rows"=>$affected_rows,
    "status"=>$status
  ];
  $this->db->insert("railway_trains_history",$data);
    if($this->db->affected_rows()>0){
      echo "Status Updated";
    }
    else{
      print_r($this->db->error());
    }

  }
  public function saveUpdateBerth(){

    $berth=$this->input->post("berth");
    $status=$this->input->post("status");
    $data['status']=$status;
    if($status=="Delete Berth"){
      $this->db->where("berth",$berth);
      $this->db->delete("railway_berth");
    }else{
    $this->db->where("berth",$berth);
    $this->db->update("railway_berth",$data);
   }
    if($this->db->affected_rows()>0){
      echo "Status Updated";
    }
    else{
      print_r($this->db->error());
    }

  }
  public function saveUpdateItem(){

    $item=$this->input->post("item");
    $status=$this->input->post("status");
    $data['status']=$status;
    if($status=="Delete Item"){
      $this->db->where("item_name",$item);
      $this->db->delete("railway_item");
    }else{
    $this->db->where("item_name",$item);
    $this->db->update("railway_item",$data);
   }
   if($this->db->affected_rows()>0){
      echo "Status Updated";
    }
    else{
      print_r($this->db->error());
    }

  }
  public function saveUpdateUom(){

    $uom=$this->input->post("uom");
    $status=$this->input->post("status");
    $data['status']=$status;
    if($status=="Delete UOM"){
      $this->db->where("uom",$uom);
      $this->db->delete("railway_uom");
    }else{
    $this->db->where("uom",$uom);
    $this->db->update("railway_uom",$data);
   }
   if($this->db->affected_rows()>0){
      echo "Status Updated";
    }
    else{
      print_r($this->db->error());
    }

  }

  public function saveUpdateWork(){

    $work_code=$this->input->post("work_code");
    $status=$this->input->post("status");
    $data['status']=$status;
    if($status=="Delete Work"){
      $this->db->where("work_code",$work_code);
      $this->db->delete("railway_work");
    }else{
    $this->db->where("work_code",$work_code);
    $this->db->update("railway_work",$data);
   }
   if($this->db->affected_rows()>0){
      echo "Status Updated";
    }
    else{
      print_r($this->db->error());
    }

  }

  public function saveUpdateCategory(){

    $work_category=$this->input->post("work_category");
    $status=$this->input->post("status");
    $data['status']=$status;
    if($status=="Delete Category"){
      $this->db->where("category",$work_category);
      $this->db->delete("railway_work_categories");
    }else{
    $this->db->where("category",$work_category);
    $this->db->update("railway_work_categories",$data);
   }
   if($this->db->affected_rows()>0){
      echo "Status Updated";
    }
    else{
      print_r($this->db->error());
    }

  }

  public function saveUpdateStatus(){

    $work_status=$this->input->post("work_status");
    $status=$this->input->post("status");
    $data['work_status']=$status;
    if($status=="Delete Status"){
      $this->db->where("status",$work_status);
      $this->db->delete("railway_work_status");
    }else{
    $this->db->where("status",$work_status);
    $this->db->update("railway_work_status",$data);
   }
   if($this->db->affected_rows()>0){
      echo "Status Updated";
    }
    else{
      print_r($this->db->error());
    }

  }


  public function addCoach(){
    $this->db = $this->load->database("default",TRUE);
    $intent["menuActive"] = "update_form2";
    $intent["subMenuActive"]  = "add_coach";
    $intent["headerCss"]   = "admin/dashboard/dashboardCss";
    $intent["mainContent"] = "admin/master/add_coach";
    $intent["footerJs"]    = "admin/master/add_coachJs";
    $this->load->view("admin/include/template",$intent);
  }

  public function saveCoach(){
    $data['coach_number']=$this->input->post("CoachNo");
    $data['coach_category']=$this->input->post("CoachCat");
    $this->db->select("coach_number,coach_category");
    $this->db->where("coach_number",$this->input->post("CoachNo"));
    $this->db->where("coach_category",$this->input->post("CoachCat"));
    $result=$this->db->get("railway_coach");
    // print_r($result->result_array());
    // die();
    if(count($result->result_array())>0){
      echo "Duplicate Not Allowed";
      die();
    }
    $this->db->insert("railway_coach",$data);
    if($this->db->affected_rows()>0){
      echo "Coach Added";
    }
    else{
      $message=$this->db->error();
      print_r($this->db->error());
    }
  }
  public function editCoach(){
    $this->db->select("coach_number,coach_category");
    $this->db->from("railway_coach");
    $query=$this->db->get();
    $intent['data']=$query->result_array();
    $intent["menuActive"] = "update_form2";
    $intent["subMenuActive"]  = "edit_coach";
    $intent["headerCss"]   = "admin/dashboard/dashboardCss";
    $intent["mainContent"] = "admin/master/edit_coach";
    $intent["footerJs"]    = "admin/master/edit_coachJs";
    $this->load->view("admin/include/template",$intent);
    // print_r($intent);
  }
  public function saveUpdateCoach(){

    $coach_no=$this->input->post("coachNo");
    $status=$this->input->post("status");
    $data['status']=$status;
    if($status=="Delete Coach"){
      $this->db->where("coach_number",$coach_no);
      $this->db->delete("railway_coach");
    }else{
    $this->db->where("coach_number",$coach_no);
    $this->db->update("railway_coach",$data);
   }
    if($this->db->affected_rows()>0){
      echo "Status Updated";
    }
    else{
      print_r($this->db->error());
    }

  }
  public function addBerth(){
    $this->db = $this->load->database("default",TRUE);
    $intent["menuActive"] = "update_form3";
    $intent["subMenuActive"]  = "add_berth";
    $intent["headerCss"]   = "admin/dashboard/dashboardCss";
    $intent["mainContent"] = "admin/master/add_berth";
    $intent["footerJs"]    = "admin/master/add_berthJs";
    $this->load->view("admin/include/template",$intent);
  }
  public function saveBerth(){
    $data['berth']=$this->input->post("berth");
    $this->db->select("berth");
    $this->db->where("berth",$this->input->post("berth"));
    $result=$this->db->get("railway_berth");
    //print_r($result->result_array());
    //die();
    if(count($result->result_array())>0){
      echo "Duplicate Not Allowed";
      die();
    }
    $this->db->insert("railway_berth",$data);
    if($this->db->affected_rows()>0){
      echo "Berth Added";
    }
    else{
      $message=$this->db->error();
      print_r($this->db->error());
    }
  }
  public function editBerth(){
    $this->db->select("berth");
    $this->db->from("railway_berth");
    $query=$this->db->get();
    $intent['data']=$query->result_array();
    $intent["menuActive"] = "update_form3";
    $intent["subMenuActive"]  = "edit_berth";
    $intent["headerCss"]   = "admin/dashboard/dashboardCss";
    $intent["mainContent"] = "admin/master/edit_berth";
    $intent["footerJs"]    = "admin/master/edit_berthJs";
    $this->load->view("admin/include/template",$intent);
  }

  public function addUom(){
    $this->db = $this->load->database("default",TRUE);
    $intent["menuActive"] = "update_form4";
    $intent["subMenuActive"]  = "add_uom";
    $intent["headerCss"]   = "admin/dashboard/dashboardCss";
    $intent["mainContent"] = "admin/master/add_uom";
    $intent["footerJs"]    = "admin/master/add_uomJs";
    $this->load->view("admin/include/template",$intent);
  }
  public function saveUom(){
    $data['uom']=$this->input->post("uom");
    $this->db->select("uom");
    $this->db->where("uom",$this->input->post("uom"));
    $result=$this->db->get("railway_uom");
    // print_r($result->result_array());
    // die();
    if(count($result->result_array())>0){
      echo "Duplicate Not Allowed";
      die();
    }
    $this->db->insert("railway_uom",$data);
    if($this->db->affected_rows()>0){
      echo "UOM Added";
    }
    else{
      $message=$this->db->error();
      print_r($this->db->error());
    }
  }
  public function editUom(){
    $this->db->select("uom");
    $this->db->from("railway_uom");
    $query=$this->db->get();
    $intent['data']=$query->result_array();
    $intent["menuActive"] = "update_form4";
    $intent["subMenuActive"]  = "edit_uom";
    $intent["headerCss"]   = "admin/dashboard/dashboardCss";
    $intent["mainContent"] = "admin/master/edit_uom";
    $intent["footerJs"]    = "admin/master/edit_uomJs";
    $this->load->view("admin/include/template",$intent);
  }
  public function addItem(){
    $this->db->select("uom");
    $this->db->from("railway_uom");
    $query=$this->db->get();
    $intent['result']=$query->result_array();
    $intent["menuActive"] = "update_form5";
    $intent["subMenuActive"]  = "add_item";
    $intent["headerCss"]   = "admin/dashboard/dashboardCss";
    $intent["mainContent"] = "admin/master/add_item";
    $intent["footerJs"]    = "admin/master/add_itemJs";
    $this->load->view("admin/include/template",$intent);
  }
  public function saveItem(){
    $data['item_name']=$this->input->post("itemName");
    $data['uom_value']=$this->input->post("uom_value");
    $this->db->select("item_name");
    $this->db->where("item_name",$this->input->post("itemName"));
    $result=$this->db->get("railway_item");
    // print_r($result->result_array());
    // die();
    if(count($result->result_array())>0){
      echo "Duplicate Not Allowed";
      die();
    }
    $this->db->insert("railway_item",$data);
    if($this->db->affected_rows()>0){
      echo "Item Added";
    }
    else{
      $message=$this->db->error();
      print_r($this->db->error());
    }
  }
  public function editItem(){
    $this->db->select("item_name,uom_value");
    $this->db->from("railway_item");
    $query=$this->db->get();
    $intent['data']=$query->result_array();
    $intent["menuActive"] = "update_form5";
    $intent["subMenuActive"]  = "edit_item";
    $intent["headerCss"]   = "admin/dashboard/dashboardCss";
    $intent["mainContent"] = "admin/master/edit_item";
    $intent["footerJs"]    = "admin/master/edit_itemJs";
    $this->load->view("admin/include/template",$intent);
  }
  public function addWork(){
    $this->db->select("uom");
    $this->db->from("railway_uom");
    $query=$this->db->get();
    $intent['result_uom']=$query->result_array();
    $this->db->select("item_name");
    $this->db->from("railway_item");
    $query2=$this->db->get();
    $this->db->select("category");
    $this->db->from("railway_work_categories");
    $query3=$this->db->get();
    $intent['result_categories']=$query3->result_array();
    $this->db->select("days");
    $this->db->from("railway_warranty_days");
    $query_5=$this->db->get();
    $intent['warranty_days']=$query_5->result_array();
    $intent['item_name']=$query2->result_array();
    $intent["menuActive"] = "update_form6";
    $intent["subMenuActive"]  = "add_work";
    $intent["headerCss"]   = "admin/dashboard/dashboardCss";
    $intent["mainContent"] = "admin/master/add_work2";
    $intent["footerJs"]    = "admin/master/add_workJs";
    $this->load->view("admin/include/template",$intent);
  }
  public function saveWork(){
    $data['item_name']=$this->input->post("item_name");
    $data['uom']=$this->input->post("uom_value");
    $data['work_code']=$this->input->post("workCode");
    $data['work_name']=$this->input->post("workName");
    $data['work_category']=$this->input->post("workCat");
    $data['work_rate']=$this->input->post("workRate");
    $data['warranty_days']=$this->input->post("warrantyDays");
    $this->db->select("work_code");
    $this->db->where("work_code",$this->input->post("workCode"));
    $result=$this->db->get("railway_work");
    // print_r($result->result_array());
    // die();
    if(count($result->result_array())>0){
      echo "Duplicate Work Code ";
      die();
    }
    $this->db->insert("railway_work",$data);
    if($this->db->affected_rows()>0){
      echo "Work Added";
    }
    else{
      $message=$this->db->error();
      print_r($this->db->error());
    }
  }
  public function editWork(){
    $this->db->select("*");
    $this->db->from("railway_work");
    $query=$this->db->get();
    $intent['data']=$query->result_array();
    $intent["menuActive"] = "update_form6";
    $intent["subMenuActive"]  = "edit_work";
    $intent["headerCss"]   = "admin/dashboard/dashboardCss";
    $intent["mainContent"] = "admin/master/edit_work";
    $intent["footerJs"]    = "admin/master/edit_workJs";
    $this->load->view("admin/include/template",$intent);
  }

  public function addCategory(){
    $intent["menuActive"] = "update_form7";
    $intent["subMenuActive"]  = "add_category";
    $intent["headerCss"]   = "admin/dashboard/dashboardCss";
    $intent["mainContent"] = "admin/master/add_category";
    $intent["footerJs"]    = "admin/master/add_categoryJs";
    $this->load->view("admin/include/template",$intent);
  }
  public function saveCategory(){
    $data['category']=$this->input->post("category");
    $this->db->select("category");
    $this->db->where("category",$this->input->post("category"));
    $result=$this->db->get("railway_work_categories");
    // print_r($result->result_array());
    // die();
    if(count($result->result_array())>0){
      echo "Duplicate Not Allowed";
      die();
    }
    $this->db->insert("railway_work_categories",$data);
    if($this->db->affected_rows()>0){
      echo "Work Category Added";
    }
    else{
      $message=$this->db->error();
      print_r($this->db->error());
    }
  }
  public function editCategory(){
    $this->db->select("*");
    $this->db->from("railway_work_categories");
    $query=$this->db->get();
    $intent['data']=$query->result_array();
    $intent["menuActive"] = "update_form7";
    $intent["subMenuActive"]  = "edit_category";
    $intent["headerCss"]   = "admin/dashboard/dashboardCss";
    $intent["mainContent"] = "admin/master/edit_category";
    $intent["footerJs"]    = "admin/master/edit_categoryJs";
    $this->load->view("admin/include/template",$intent);
  }
  public function addStatus(){
    $intent["menuActive"] = "update_form8";
    $intent["subMenuActive"]  = "add_status";
    $intent["headerCss"]   = "admin/dashboard/dashboardCss";
    $intent["mainContent"] = "admin/master/add_status";
    $intent["footerJs"]    = "admin/master/add_statusJs";
    $this->load->view("admin/include/template",$intent);
  }
  public function saveStatus(){
    $data['status']=$this->input->post("status");
    $this->db->select("status");
    $this->db->where("status",$this->input->post("status"));
    $result=$this->db->get("railway_work_status");
    // print_r($result->result_array());
    // die();
    if(count($result->result_array())>0){
      echo "Duplicate Not Allowed";
      die();
    }
    $this->db->insert("railway_work_status",$data);
    if($this->db->affected_rows()>0){
      echo "Work Status Added";
    }
    else{
      $message=$this->db->error();
      print_r($this->db->error());
    }
  }
  public function editStatus(){
    $this->db->select("*");
    $this->db->from("railway_work_status");
    $query=$this->db->get();
    $intent['data']=$query->result_array();
    $intent["menuActive"] = "update_form8";
    $intent["subMenuActive"]  = "edit_status";
    $intent["headerCss"]   = "admin/dashboard/dashboardCss";
    $intent["mainContent"] = "admin/master/edit_status";
    $intent["footerJs"]    = "admin/master/edit_statusJs";
    $this->load->view("admin/include/template",$intent);
  }
}
