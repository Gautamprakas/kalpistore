<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Shopkeeper extends MY_Controller{
	public function __construct(){

		parent::__construct();
	}
	public function dashboard(){
		// print_r($_SESSION);
		// die();
		$intent["menuActive"] = "home";
		$intent["subMenuActive"]  = "home";
		$intent["headerCss"]   = "admin/dashboard/dashboardCss";
		$intent["mainContent"] = "admin/dashboard/dashboard";
		$intent["footerJs"]    = "admin/dashboard/dashboardJs";
		$this->load->view("admin/include/template",$intent);
	}
	public function preBilling(){
			$intent['title']	='Pre Billing Report';
			$intent["approve_button"]  = true;
			$intent["menuActive"] = "data_sheet";
	    $intent["subMenuActive"]  = "pre_billing";
	    $intent["headerCss"]   = "admin/dashboard/dashboardCss";
	    $intent["mainContent"] = "admin/reports/data_sheet";
	    $intent["footerJs"]    = "admin/reports/data_sheetJs";
	    $this->load->view("admin/include/template",$intent);
	}
	public function workRatingReport(){
			$intent['title']	='Work Rating Report';
			$intent["approve_button"]  = true;
			$intent["menuActive"] = "data_sheet";
	    $intent["subMenuActive"]  = "work_rating";
	    $intent["headerCss"]   = "admin/dashboard/dashboardCss";
	    $intent["mainContent"] = "admin/reports/work_rating";
	    $intent["footerJs"]    = "admin/reports/work_ratingJs";
	    $this->load->view("admin/include/template",$intent);
	}
	public function getWorkRatingDetails(){
		$type=$this->session->userdata("type");
		$session_userid=$this->session->userdata("id");
		if($type=='sse'){
			$this->db->select("id,train_number,date,coach_number,coach_category,area,work_category,work_status,item_list,qty,uom,work_code,warranty_days,added_by_name as added_by,rating");
			$this->db->where("work_done_by IS NOT NULL");
			$this->db->where('approved_by',$session_userid);
			$res=$this->db->get("workshop_approved_ongoing")->result();
		}else{
			$this->db->select("id,train_number,date,coach_number,coach_category,area,work_category,work_status,item_list,qty,uom,work_code,warranty_days,added_by_name as added_by,rating");
			$this->db->where("work_done_by IS NOT NULL");
			$res=$this->db->get("workshop_approved_ongoing")->result();
			// $action="<span class='font-bold col-teal'>Pending</span>";
		}
		if( $res ){

			$response["status_code"] = "200";
			$response["status_message"] = "data found";
			$response["result"] = $res;
		}else{

			$response["status_code"] = "404";
			$response["status_message"] = "data not found";
			$response["result"] = null;
		}
		echo json_encode($response);
	}
	public function workOrderReport(){
			$intent['title']	='Work Order Report';
			$intent["approve_button"]  = false;
			$intent["menuActive"] = "data_sheet";
	    $intent["subMenuActive"]  = "work_order";
	    $intent["headerCss"]   = "admin/dashboard/dashboardCss";
	    $intent["mainContent"] = "admin/reports/data_sheet";
	    $intent["footerJs"]    = "admin/reports/work_order_reportJs";
	    $this->load->view("admin/include/template",$intent);
	}
	public function updateActivities(){
		$intent['title']='Update Activities';
		$intent["menuActive"] = "update_activity";
	    $intent["subMenuActive"]  = "update_activity";
	    $intent["headerCss"]   = "admin/dashboard/dashboardCss";
	    $intent["mainContent"] = "admin/activity/update_activities/update_activities";
	    $intent["footerJs"]    = "admin/activity/update_activities/update_activitiesJs";
	    $this->load->view("admin/include/template",$intent);
	}
	public function addActivity(){
		$intent['train_number']=$this->input->get('train_number');
		$intent['title']='Add Activity';
		$intent["menuActive"] = "update_activity";
	    $intent["subMenuActive"]  = "update_activity";
	    $intent["headerCss"]   = "admin/dashboard/dashboardCss";
	    $intent["mainContent"] = "admin/activity/add_activity/add_activity";
	    $intent["footerJs"]    = "admin/activity/add_activity/add_activityJs";
	    $this->load->view("admin/include/template",$intent);
	}
	public function viewPendingActivity(){
			$intent['title']='View Pending Activity';
			$intent["menuActive"] = "update_activity";
			$intent["mark_as_done"] = false;
	    $intent["subMenuActive"]  = "update_activity";
	    $intent["headerCss"]   = "admin/dashboard/dashboardCss";
	    $intent["mainContent"] = "admin/activity/add_activity/view_activity";
	    $intent["footerJs"]    = "admin/activity/add_activity/view_activityJs";
	    $this->load->view("admin/include/template",$intent);
	}
	public function viewVerifiedActivity(){
			$intent['title']='View Verified Activity';
			$intent["menuActive"] = "update_activity";
			$intent["mark_as_done"] = true;
	    $intent["subMenuActive"]  = "update_activity";
	    $intent["headerCss"]   = "admin/dashboard/dashboardCss";
	    $intent["mainContent"] = "admin/activity/add_activity/view_activity";
	    $intent["footerJs"]    = "admin/activity/add_activity/view_verified_activityJs";
	    $this->load->view("admin/include/template",$intent);
	}
	public function updateActivity(){
			$intent['title']='Update Activity';
			$intent["menuActive"] = "update_activity";
	    $intent["subMenuActive"]  = "update_activity";
	    $intent["headerCss"]   = "admin/dashboard/dashboardCss";
	    $intent["mainContent"] = "admin/activity/add_activity/update_activity";
	    $intent["footerJs"]    = "admin/activity/update_activities/update_activitiesJs";
	    $this->load->view("admin/include/template",$intent);
	}
	public function workDoneActivity(){
			$intent['title']='Work Done Activity';
			$intent["menuActive"] = "update_activity";
			$intent["mark_as_done"] = false;
	    $intent["subMenuActive"]  = "update_activity";
	    $intent["headerCss"]   = "admin/dashboard/dashboardCss";
	    $intent["mainContent"] = "admin/activity/add_activity/view_activity";
	    $intent["footerJs"]    = "admin/activity/add_activity/work_done_activityJs";
	    $this->load->view("admin/include/template",$intent);
	}
	public function saveAddActivity(){
		$train_number=$this->input->post('select_train');
		$coach_data=$this->input->post('select_coach');
		$work_category=$this->input->post('work_category');
		$work_status=$this->input->post('work_status');
		$area=$this->input->post('area');
		$work_code=$this->input->post('work_code');
		$work_list=$this->input->post('work_list');
		$remark=$this->input->post('remark');
		$time1=$this->input->post('time1');
		$time2=$this->input->post('time2');
		$date=$this->input->post('date');
		$item_list=$this->input->post('item_list');
		$qty=$this->input->post('qty');
		$uom=$this->input->post('uom');
		$id=generate_unique_key();
		$datetime=date('Y-m-d H:i:s');
		$session_userid=$this->session->userdata('id');
		$rate=$this->input->post('rate');
		$warranty_days=$this->input->post('warranty_days');
		$name=$this->session->userdata("name");
		if(!empty($coach_data)){
			if(isset(explode("|",$coach_data)[0])){
				$coach_number=explode("|",$coach_data)[0];
				$coach_category=explode("|",$coach_data)[1];
			}else{
				$response=[
					"status_code"=>404,
					"status_message"=>"Coach Data Not found"
				];
				echo json_encode($response);
				return;
			}
		}else{
				$response=[
					"status_code"=>404,
					"status_message"=>"Coach Data Not found"
				];
				echo json_encode($response);
				return;
		}
		$data=array(
			"id"=>$id,
			"work_code"=>$work_code,
			"train_number"=>$train_number,
			"coach_number"=>$coach_number,
			"coach_category"=>$coach_category,
			"work_category"=>$work_category,
			"work_status"=>$work_status,
			"area"=>$area,
			"work_list"=>$work_list,
			"remark"=>$remark,
			"date"=>$date,
			"time1"=>$time1,
			"time2"=>$time2,
			"date"=>$date,
			"item_list"=>$item_list,
			"qty"=>$qty,
			"uom"=>$uom,
			"added_datetime"=>$datetime,
			"added_by"=>$session_userid,
			"rate"=>$rate,
			"warranty_days"=>$warranty_days,
			"added_by_name"=>$name
		);	
		$inserted=$this->db->insert("workshop_pending",$data);
		if($inserted){
			$response=[
				"status_code"=>200,
				"status_message"=>"Data saved successfully.."
			];
			echo json_encode($response);
		}else{
			$response=[
				"status_code"=>500,
				"status_message"=>$this->db->error()
			];
			echo json_encode($response);
		}
	}
	public function getWorkDetails(){
		$work_code=$this->input->post('work_code');
		if(!empty($work_code)){
			$data=[
				"work_code"=>$work_code,
				"work_list"=>"Fitment of Seat 2",
				"work_category"=>"Plumbimg",
				"work_status"=>"Repair",
				"train_number"=>"12015",
				"coach_number"=>"164611",
				"area"=>"Berth-55"
			];
			$response=[
				"status_code"=>200,
				"data"=>$data
			];
			echo json_encode($response);
		}else{
			echo "400";
		}
	}
	public function getPreBillingData(){
			$type=$this->session->userdata("type");
			if( $type == "sse" ){
		      $data_train["train_numbers"]=[];
		      $result = $this->db->where("username",$this->session->userdata("id"))->get("railway_mapping");
		            foreach($result->result() as $row){
		                $data_train["train_numbers"][] = $row->train_number;
		            }
		         $train_numbers = implode(",",$data_train["train_numbers"]);

		      	 $train_numbers = strlen($train_numbers)>0?$train_numbers:"0";
		     	 $this->db->select("id,train_number,date,coach_number,coach_category,area,work_category,work_status,item_list,qty,uom,work_code,warranty_days,added_by,added_by_name");
		    	 $this->db->where_in("train_number",$train_numbers);
		    	 $this->db->from("workshop_pending");
		    	 $res=$this->db->get()->result();

		}else{
			$this->db->select("id,train_number,date,coach_number,coach_category,area,work_category,work_status,item_list,qty,uom,work_code,warranty_days,added_by,added_by_name");
			$this->db->from("workshop_pending");
			$res=$this->db->get()->result();

  	}
		if( $res ){

			$response["status_code"] = "200";
			$response["status_message"] = "data found";
			$response["result"] = $res;
		}else{

			$response["status_code"] = "404";
			$response["status_message"] = "data not found";
			$response["result"] = null;
		}
		echo json_encode($response);

	}
	// public function getMobilePreBillingData(){
	// 	$type=$this->session->userdata("type");
	// 	if( $type == "sse" ){
	//       $data_train["train_numbers"]=[];
	//       $result = $this->db->where("username",$this->session->userdata("id"))->get("railway_mapping");
	//             foreach($result->result() as $row){
	//                 $data_train["train_numbers"][] = $row->train_number;
	//             }
	//          $train_numbers = implode(",",$data_train["train_numbers"]);

	//       	 $train_numbers = strlen($train_numbers)>0?$train_numbers:"0";
	//      	 $this->db->select("id,train_number,date,coach_number,coach_category,area,work_category,work_status,item_list,qty,uom,work_code,warranty_days,added_by");
	//     	 $this->db->where_in("train_number",$train_numbers);
	//     	 $this->db->from("workshop_pending");
	//     	 $res=$this->db->get();

	//     }else{
	//     	$this->db->select("id,train_number,date,coach_number,area,coach_category,work_category,work_status,item_list,qty,uom,work_code,warranty_days,added_by");
	//     	$this->db->from("workshop_pending");
	//     	$res=$this->db->get();

	//     }
	//     //prakash($res->result());
	// 	$data = [];
	// 	if($res->result()){
	// 		$response["status_code"] = "200";
	// 	    $response["status_message"] = "data found";
	// 	    $response["result"] = $res->result();  // Return the data array containing all cards
		
	// 	} else {
	// 	    $response["status_code"] = "404";
	// 	    $response["status_message"] = "data not found";
	// 	    $response["result"] = null;
	// 	}

	// 	echo json_encode($response);

	// }
	public function getActivitiesData(){
		$session_userid=$this->session->userdata("id");
		$this->db->select("id,train_number,date,coach_number,area,coach_category,work_list,work_category,work_status,item_list,qty,uom,work_code,warranty_days,added_by_name as added_by");
		$this->db->where("added_by",$session_userid);
		$res=$this->db->get("workshop_pending");

		if($res->result()){
			$response["status_code"] = "200";
		    $response["status_message"] = "data found";
		    $response["result"] = $res->result();  // Return the data array containing all cards
		
		}else {
		    $response["status_code"] = "404";
		    $response["status_message"] = "data not found";
		    $response["result"] = null;
		}
		echo json_encode($response);

	}
	public function getWorkDoneActivities(){
		$session_userid=$this->session->userdata("id");
		$this->db->select("id,train_number,date,coach_number,area,coach_category,work_list,work_category,work_status,item_list,qty,uom,work_code,warranty_days,approved_by");
		$this->db->where("added_by",$session_userid);
		$this->db->where("work_done_by IS NOT NULL");
		$res=$this->db->get("workshop_approved_ongoing");

		if($res->result()){
			$response["status_code"] = "200";
		    $response["status_message"] = "data found";
		    $response["result"] = $res->result();  // Return the data array containing all cards
		
		}else {
		    $response["status_code"] = "404";
		    $response["status_message"] = "data not found";
		    $response["result"] = null;
		}
		echo json_encode($response);

	}
	// public function getActivitiesMobileData(){
	// 	$session_userid=$this->session->userdata("id");
	// 	$res=$this->db->get_where("workshop_pending",["added_by"=>$session_userid])->result();
	// 	//$res = $this->db->select("*")->from("railway_work")->get()->result_array();
	// 	$data = [];
	// 	if($res){
	// 		$response["status_code"] = "200";
	// 	    $response["status_message"] = "data found";
	// 	    $response["result"] = $res;  // Return the data array containing all cards
		
	// 	}else {
	// 	    $response["status_code"] = "404";
	// 	    $response["status_message"] = "data not found";
	// 	    $response["result"] = null;
	// 	}
	// 	echo json_encode($response);

	// }
	public function getApprovedActivities(){
		$session_userid=$this->session->userdata("id");
		$this->db->select("id,train_number,date,coach_number,area,coach_category,work_list,work_category,work_status,item_list,qty,uom,work_code,warranty_days,approved_by");
		$this->db->where("added_by",$session_userid);
		$this->db->where("work_done_by IS NULL");
		$res=$this->db->get("workshop_approved_ongoing");

		if($res->result()){
			$response["status_code"] = "200";
		    $response["status_message"] = "data found";
		    $response["result"] = $res->result();  // Return the data array containing all cards
		
		}else {
		    $response["status_code"] = "404";
		    $response["status_message"] = "data not found";
		    $response["result"] = null;
		}
		echo json_encode($response);


	}
	public function getApprovedData(){
		$session_userid=$this->session->userdata("id");
		$type=$this->session->userdata("type");
		if($type=='sse'){
			$this->db->select("id,train_number,date,coach_number,area,coach_category,work_category,work_status,item_list,qty,uom,work_code,warranty_days,approved_by_name as approved_by,added_by_name as added_by");
			$this->db->where("approved_by",$session_userid);
			$res=$this->db->get("workshop_approved_ongoing");
		}else{
			$this->db->select("id,train_number,date,coach_number,area,coach_category,work_category,work_status,item_list,qty,uom,work_code,warranty_days,approved_by_name as approved_by,added_by_name as added_by");
			$res=$this->db->get("workshop_approved_ongoing");
		}
		

		if($res->result()){
			$response["status_code"] = "200";
		    $response["status_message"] = "data found";
		    $response["result"] = $res->result();  // Return the data array containing all cards
		
		}else {
		    $response["status_code"] = "404";
		    $response["status_message"] = "data not found";
		    $response["result"] = null;
		}
		echo json_encode($response);


	}
	public function updateStatusOfReqBulk(){

    $remarks = $this->input->post("remarks");
    $status = $this->input->post("status");
    $datetime = date("Y-m-d H:i:s");
    $session_userid = $this->session->userdata("id");
    $session_username = $this->session->userdata("name");
    if($status=="Verified"){
      foreach($remarks as $row){
       	$this->db->trans_start(); // Start Transaction

				$row_res = $this->db->get_where("workshop_pending", ["id" => $row['id']])->row();

				if ($row_res) {
				    $row_res->approved_by = $session_userid;
				    $row_res->approved_datetime = $datetime;
				    $row_res->approved_by_name=$session_username;

				    $inserted = $this->db->insert("workshop_approved_ongoing", $row_res);

				    if ($inserted) {
				        $this->db->where("id", $row['id']);
				        $deleted = $this->db->delete("workshop_pending");

				        if (!$deleted) {
				            $this->db->trans_rollback(); // Rollback Transaction if delete fails
				            echo "500";
				            return;
				        }
				    } else {
				        $this->db->trans_rollback(); // Rollback Transaction if insert fails
				        echo "500";
				        return;
				    }
				} else {
				    $this->db->trans_rollback(); // Rollback Transaction if fetch fails
				    echo "500";
				    return;
				}

				$this->db->trans_complete(); // Complete the transaction

				if ($this->db->trans_status() === FALSE) {
				    // Transaction failed
				    echo "500";
				    return;
				}

	    }

    }
    if($status=="Rejected"){
      foreach($remarks as $row){
       	$this->db->trans_start(); // Start Transaction

				$row_res = $this->db->get_where("workshop_pending", ["id" => $row['id']])->row();

				if ($row_res) {
				    $row_res->rejected_by = $session_userid;
				    $row_res->rejected_datetime = $datetime;

				    $inserted = $this->db->insert("workshop_rejected", $row_res);

				    if ($inserted) {
				        $this->db->where("id", $row['id']);
				        $deleted = $this->db->delete("workshop_pending");

				        if (!$deleted) {
				            $this->db->trans_rollback(); // Rollback Transaction if delete fails
				            echo "500";
				            return;
				        }
				    } else {
				        $this->db->trans_rollback(); // Rollback Transaction if insert fails
				        echo "500";
				        return;
				    }
				} else {
				    $this->db->trans_rollback(); // Rollback Transaction if fetch fails
				    echo "500";
				    return;
				}

				$this->db->trans_complete(); // Complete the transaction

				if ($this->db->trans_status() === FALSE) {
				    // Transaction failed
				    echo "500";
				    return;
				}

	    }

    }
    echo "200";
  }

  public function updateStatusOfWorkReqBulk(){

    $remarks = $this->input->post("remarks");
    $status = $this->input->post("status");
    $datetime = date("Y-m-d H:i:s");
    $session_userid = $this->session->userdata("id");
    if ($status == "work_done") {
		    foreach ($remarks as $row) {
		        // Update the record in the database
		        $this->db->where("id", $row['id']);
		        $updated = $this->db->update("workshop_approved_ongoing", [
		            "work_done_by" => $session_userid,
		            "work_done_datetime" => $datetime
		        ]);

		        // Check if the update was successful
		        if (!$updated) {
		            // Output error message and stop further execution
		            echo "500";
		            prakash($this->db->error());
		            return;
		        }
		    }
		    echo "200";
		} else {
		    // Output error message for invalid status
		    echo "404";
		}

  }

  public function updateStatusOfReqRating(){
  	$id=$this->input->post('id');
  	$rating=$this->input->post('rating');
  	$id=$this->input->post('id');
  	$datetime = date("Y-m-d H:i:s");
    $session_userid = $this->session->userdata("id");
    if(!empty($id) && !empty($rating)){
    	$this->db->where("id",$id);
    	$updated=$this->db->update("workshop_approved_ongoing",["rating"=>$rating,"rating_datetime"=>$datetime,"rating_by"=>$session_userid]);
    	if($updated){
    		echo "200";
    	}else{
    		echo "500";
    	}

    }else{
    	echo "404";
    }
  }

  public function updateStatusOfReqRatingBulk(){
  	try{
        $this->db->trans_begin();
        $ratingData = $this->input->post("ratingData");
        $datetime = date("Y-m-d H:i:s");
        $session_userid = $this->session->userdata("id");
        //$zero_rating=$this->input->post("zero_rating");
        foreach($ratingData as $row){
          // if(!is_null($zero_rating)){
          //   foreach($zero_rating as $row_rating){
          //   // print_r($row['family_id']);
          //     if(isset($row['family_id']) && $row_rating['family_id']===$row['family_id']){
          //       $this->db->where("family_id",$row['family_id']);
          //       $this->db->update("form_data",["zero_rating"=>"0"]);
          //       // echo "Update zero rating of family_id ".$row_rating['family_id'].PHP_EOL.$row_rating['family_id'];
          //       // die();
          //     }
          //   }
          // }
          //die();
          $this->db->where("id",$row['id']);
					$updated=$this->db->update("workshop_approved_ongoing",["rating"=>$row['rating'],"rating_datetime"=>$datetime,"rating_by"=>$session_userid]);
          if ($this->db->affected_rows() == 0) {
                throw new Exception('Update failed for req_id: ' . $row['id']);
          }
        }
      $this->db->trans_commit();
      echo "200";
    }catch(Exception $e){
      $this->db->trans_rollback();
      log_message('error', 'Transaction failed: ' . $e->getMessage());
      echo "500";
    }
  }
	
}