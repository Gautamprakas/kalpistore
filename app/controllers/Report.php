<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once(APPPATH.'/libraries/fpdf181/pdf.php');

class Report extends MY_Controller {

	public function __construct(){

		parent::__construct();
		//$this->load->model("ReportModel");
		ini_set('memory_limit', '-1');
	}

	public function todaysReported(){
		$intent["menuActive"]     = "report";
		$intent["subMenuActive"]  = "todaysreported";
		$intent["headerCss"]      = "admin/report/todaysReported/indexCss";
		$intent["mainContent"]    = "admin/report/todaysReported/index";
		$intent["footerJs"]       = "admin/report/todaysReported/indexJs";
		$this->load->view("admin/include/template",$intent);
	}


	public function pending(){
		$intent["menuActive"]     = "report";
		$intent["subMenuActive"]  = "pending";
		$intent["headerCss"]      = "admin/report/pending/indexCss";
		$intent["mainContent"]    = "admin/report/pending/index";
		$intent["footerJs"]       = "admin/report/pending/indexJs";
		$this->load->view("admin/include/template",$intent);
	}

	public function resolved(){
		$intent["menuActive"]     = "report";
		$intent["subMenuActive"]  = "resolved";
		$intent["headerCss"]      = "admin/report/resolved/indexCss";
		$intent["mainContent"]    = "admin/report/resolved/index";
		$intent["footerJs"]       = "admin/report/resolved/indexJs";
		$this->load->view("admin/include/template",$intent);
	}


	public function todayResolved(){
		$intent["menuActive"]     = "report";
		$intent["subMenuActive"]  = "todayresolved";
		$intent["headerCss"]      = "admin/report/todayResolved/indexCss";
		$intent["mainContent"]    = "admin/report/todayResolved/index";
		$intent["footerJs"]       = "admin/report/todayResolved/indexJs";
		$this->load->view("admin/include/template",$intent);
	}


	// public function summary(){
	// 	$intent["data"]           = $this->getsummaryData();
	// 	$intent["menuActive"]     = "report";
	// 	$intent["subMenuActive"]  = "summary";
	// 	$intent["headerCss"]      = "admin/report/summary/indexCss";
	// 	$intent["mainContent"]    = "admin/report/summary/index";
	// 	$intent["footerJs"]       = "admin/report/summary/indexJs";
	// 	$this->load->view("admin/include/template",$intent);
	// }


	public function comparison($status = ''){
		$intent["data"]           = $this->getComparisonData($status);
		$intent["status"]         = $status;
		$intent["menuActive"]     = "report";
		$intent["subMenuActive"]  = "comparison";
		$intent["headerCss"]      = "admin/report/comparison/indexCss";
		$intent["mainContent"]    = "admin/report/comparison/index";
		$intent["footerJs"]       = "admin/report/comparison/indexJs";
		$this->load->view("admin/include/template",$intent);
	}

	public function notUsed($status = ''){
		$intent["data"]           = $this->getNotUsed($status);
		$intent["status"]         = $status;
		$intent["menuActive"]     = "report";
		$intent["subMenuActive"]  = "notUsed";
		$intent["headerCss"]      = "admin/report/notUsed/indexCss";
		$intent["mainContent"]    = "admin/report/notUsed/index";
		$intent["footerJs"]       = "admin/report/notUsed/indexJs";
		$this->load->view("admin/include/template",$intent);
	}

	public function main(){

		$intent["menuActive"]     = "report";
		$intent["subMenuActive"]  = "main";
		$intent["headerCss"]      = "admin/report/main/mainCss";
		$intent["mainContent"]    = "admin/report/main/main";
		$intent["footerJs"]       = "admin/report/main/mainJs";
		$this->load->view("admin/include/template",$intent);
	}


	public function loginDetails(){

		$intent["menuActive"]     = "report";
		$intent["subMenuActive"]  = "loginDetails";
		$intent["headerCss"]      = "admin/report/loginDetails/loginDetailsCss";
		$intent["mainContent"]    = "admin/report/loginDetails/loginDetails";
		$intent["footerJs"]       = "admin/report/loginDetails/loginDetailsJs";
		$this->load->view("admin/include/template",$intent);
	}

	public function notmMatchedEgramswaraj(){

		$intent["menuActive"]     = "report";
		$intent["subMenuActive"]  = "notmMatchedEgramswaraj";
		$intent["headerCss"]      = "admin/report/notmMatchedEgramswaraj/notmMatchedEgramswarajCss";
		$intent["mainContent"]    = "admin/report/notmMatchedEgramswaraj/notmMatchedEgramswaraj";
		$intent["footerJs"]       = "admin/report/notmMatchedEgramswaraj/notmMatchedEgramswarajJs";
		$this->load->view("admin/include/template",$intent);
	}


	public function reports(){
		$titleArr = array(
			"PanchayatGatewayTransactionAfter7PM" => "Panchayat Gateway Transaction After 7PM",
			"PanchayatGatewayTransactionNotMatched" => "Panchayat Gateway Transaction Not Matched",
			"PanchayatGatewayTransactionMatched" => "Panchayat Gateway Transaction Matched"
		);
		$subMenuActive = $this->uri->segment(3);
		$intent["menuActive"]     = "report";
		$intent["subMenuActive"]  = $subMenuActive;
		$intent["title"]  		  = $titleArr[$subMenuActive];
		$intent["headerCss"]      = "admin/report/reports/reportsCss";
		$intent["mainContent"]    = "admin/report/reports/reports";
		$intent["footerJs"]       = "admin/report/reports/reportsJs";
		$this->load->view("admin/include/template",$intent);
	}


	public function report_links(){

		$intent["menuActive"]     = "report_links";
		$intent["subMenuActive"]  = "report_links";
		$intent["headerCss"]      = "admin/report/report_links/report_linksCss";
		$intent["mainContent"]    = "admin/report/report_links/report_links";
		$intent["footerJs"]       = "admin/report/report_links/report_linksJs";
		$this->load->view("admin/include/template",$intent);
	}

	public function report_links2(){

		$intent["menuActive"]     = "report_links2";
		$intent["subMenuActive"]  = "report_links2";
		$intent["headerCss"]      = "admin/report/report_links2/report_links2Css";
		$intent["mainContent"]    = "admin/report/report_links2/report_links2";
		$intent["footerJs"]       = "admin/report/report_links2/report_links2Js";
		$this->load->view("admin/include/template",$intent);
	}

	public function report_links3(){

		$intent["menuActive"]     = "report_links3";
		$intent["subMenuActive"]  = "report_links3";
		$intent["headerCss"]      = "admin/report/report_links3/report_links3Css";
		$intent["mainContent"]    = "admin/report/report_links3/report_links3";
		$intent["footerJs"]       = "admin/report/report_links3/report_links3Js";
		$this->load->view("admin/include/template",$intent);
	}

	public function report_links_ivrs(){

		$intent["menuActive"]     = "report_links_ivrs";
		$intent["subMenuActive"]  = "report_links_ivrs";
		$intent["headerCss"]      = "admin/report/report_links_ivrs/report_links_ivrsCss";
		$intent["mainContent"]    = "admin/report/report_links_ivrs/report_links_ivrs";
		$intent["footerJs"]       = "admin/report/report_links_ivrs/report_links_ivrsJs";
		$this->load->view("admin/include/template",$intent);
	}



	public function getReports(){
		ini_set('memory_limit', '-1');
		$start_date = $this->input->post("start_date");
		$end_date = $this->input->post("end_date");
		$report_type = $this->input->post("report_type");
		$subMenuActive = $this->input->post("subMenuActive");
		$report = array();

		$loc_res = $this->db->get_where("location_details",["location_id"=>$this->location_id]);
		$loc_row = $loc_res->row();

		if( $subMenuActive == 'PanchayatGatewayTransactionAfter7PM' ){
			$this->db->select("incidence_data.record_datetime as 'Record Datetime'");
			$this->db->select("division as 'Division'");
			$this->db->select("district as 'District'");
			$this->db->select("block as 'Block'");
			$this->db->select("village as 'Gram Panchayat'");
			$this->db->select("map_num as 'LGD Code'");
			$this->db->select("DATE(incidence_datetime) as 'Voucher Date'");
			$this->db->select("incidence_lat as 'Voucher No'");
			$this->db->select("incidence_type as 'Scheme'");
			$this->db->select("solve_in_sec as 'Amount'");
			$this->db->select("sender_imei as 'Vendor'");
			$this->db->select("incidence_comment as 'Vendor Account Deatils'");
			$this->db->from("incidence_data");
			$this->db->join("location_details","incidence_data.location_id=location_details.location_id");
			$this->db->where("DATE(incidence_data.record_datetime) >=",$start_date);
			$this->db->where("DATE(incidence_data.record_datetime) <=",$end_date);
			$this->db->where("TIME(incidence_data.record_datetime) >","19:00:00");
			if( $this->location_type == "ADMIN" ){
				//
			}elseif( $this->location_type == "DIVISION" ){
				$this->db->where("location_details.division",$loc_row->division);
			}else if( $this->location_type == "DISTRICT" ){
				$this->db->where("location_details.district",$loc_row->district);
			}else if( $this->location_type == "BLOCK" ){
				$this->db->where("location_details.district",$loc_row->district);
				$this->db->where("location_details.block",$loc_row->block);
			}
			$this->db->order_by("incidence_data.record_datetime","DESC");
			$res = $this->db->get();
			$report = $res->result();
		}

		if( $subMenuActive == 'PanchayatGatewayTransactionNotMatched' ){

			
			$this->db->select("location_id as 'lgd_code'");
			$this->db->select("incidence_lat as 'voucher_no'");
			$this->db->select("DATE(incidence_datetime) as 'voucher_date'");
			$this->db->select("incidence_type as 'scheme'");
			$this->db->select("solve_in_sec as 'amount'");
			$this->db->select("vendor_name as 'vendor_name'");
			$this->db->select("vendor_account_no as 'vendor_account_no'");
			$this->db->where("matched",0);
			$this->db->where("DATE(incidence_datetime) >=",$start_date);
			$this->db->where("DATE(incidence_datetime) <=",$end_date);
			if( $this->location_type == "ADMIN" ){
				//
			}elseif( $this->location_type == "DIVISION" ){
				$this->db->where("incidence_data_master.division",$loc_row->division);
			}else if( $this->location_type == "DISTRICT" ){
				$this->db->where("incidence_data_master.district",$loc_row->district);
			}else if( $this->location_type == "BLOCK" ){
				$this->db->where("incidence_data_master.district",$loc_row->district);
				$this->db->where("incidence_data_master.block",$loc_row->block);
			}
			$incidence_data_master_res = $this->db->get("incidence_data_master");
			
			$incidence_data_master = array();
			foreach($incidence_data_master_res->result() as $row){
				$index = sprintf("I|%s|%s",$row->lgd_code,$row->voucher_no);
				$incidence_data_master[$index][] = $row;
			}

			
			
			//$this->db->select("incidence_data.added_by as 'lgd_code'");
			$this->db->select("location_details.map_num as 'lgd_code'");
			$this->db->select("incidence_data.incidence_lat as 'voucher_no'");
			$this->db->select("DATE(incidence_data.incidence_datetime) as 'voucher_date'");
			$this->db->select("incidence_data.incidence_type as 'scheme'");
			$this->db->select("incidence_data.solve_in_sec as 'amount'");
			$this->db->select("incidence_data.sender_imei as 'vendor_name'");
			$this->db->select("incidence_data.incidence_comment as 'vendor_account_no'");
			$this->db->select("incidence_data.record_datetime as 'record_datetime'");
			$this->db->select("location_details.division as 'division'");
			$this->db->select("location_details.district as 'district'");
			$this->db->select("location_details.block as 'block'");
			$this->db->select("location_details.village as 'gp'");
			$this->db->from("incidence_data");
			$this->db->join("location_details","location_details.location_id=incidence_data.location_id");
			$this->db->where("incidence_data.matched",NULL);
			$this->db->where("DATE(incidence_data.incidence_datetime) >=",$start_date);
			$this->db->where("DATE(incidence_data.incidence_datetime) <=",$end_date);
			$this->db->where("DATE(incidence_data.record_datetime) <=",END_DATE);
			if( $this->location_type == "ADMIN" ){
				//
			}elseif( $this->location_type == "DIVISION" ){
				$this->db->where("location_details.division",$loc_row->division);
			}else if( $this->location_type == "DISTRICT" ){
				$this->db->where("location_details.district",$loc_row->district);
			}else if( $this->location_type == "BLOCK" ){
				$this->db->where("location_details.district",$loc_row->district);
				$this->db->where("location_details.block",$loc_row->block);
			}
			$incidence_data_res = $this->db->get();

			$incidence_data = array();
			foreach($incidence_data_res->result() as $i => $incidence_data_row){
				$index = sprintf("I|%s|%s",$incidence_data_row->lgd_code,$incidence_data_row->voucher_no);
				$index2 = sprintf("I|%s",$incidence_data_row->lgd_code);
				$incidence_data[$i] = $incidence_data_row;

				if( isset($incidence_data_master[$index]) ){
					$incidence_data_master_arr = $incidence_data_master[$index];
					
					$incidence_data[$i]->total_not_matched = 0;
					$incidence_data[$i]->lgd_code_and_voucher_no_not_matched = 0;
					$incidence_data[$i]->voucher_date_not_matched = 0;
					$incidence_data[$i]->scheme_not_matched = 0;
					$incidence_data[$i]->amount_not_matched = 0;
					$incidence_data[$i]->vendor_name_not_matched = 0;
					$incidence_data[$i]->vendor_account_no_not_matched = 0;
					$incidence_data[$i]->record_datetime_late_not_matched = 0;

					foreach($incidence_data_master_arr as $incidence_data_master_row){
						if( $incidence_data_row->voucher_date != $incidence_data_master_row->voucher_date ){
							$incidence_data[$i]->voucher_date_not_matched += 1;
							$incidence_data[$i]->total_not_matched += 1;
							$incidence_data[$i]->voucher_date = sprintf("<font style='color:red;'>%s</font>",$incidence_data[$i]->voucher_date);
						}
						if( $incidence_data_row->scheme != $incidence_data_master_row->scheme ){
							$incidence_data[$i]->scheme_not_matched += 1;
							$incidence_data[$i]->total_not_matched += 1;
							$incidence_data[$i]->scheme = sprintf("<font style='color:red;'>%s</font>",$incidence_data[$i]->scheme);
						}
						if( $incidence_data_row->amount != $incidence_data_master_row->amount ){
							$incidence_data[$i]->amount_not_matched += 1;
							$incidence_data[$i]->total_not_matched += 1;
							$incidence_data[$i]->amount = sprintf("<font style='color:red;'>%s</font>",$incidence_data[$i]->amount);
						}
						if( strtolower($incidence_data_row->vendor_name) != strtolower($incidence_data_master_row->vendor_name) ){
							$incidence_data[$i]->vendor_name_not_matched += 1;
							$incidence_data[$i]->total_not_matched += 1;
							$incidence_data[$i]->vendor_name = sprintf("<font style='color:red;'>%s</font>",$incidence_data[$i]->vendor_name);
						}
						if( strcmp($incidence_data_row->vendor_account_no,$incidence_data_master_row->vendor_account_no)  != 0  ){
							$incidence_data[$i]->vendor_account_no_not_matched += 1;
							$incidence_data[$i]->total_not_matched += 1;
							$incidence_data[$i]->vendor_account_no = sprintf("<font style='color:red;'>%s</font>",$incidence_data[$i]->vendor_account_no);
						}
						if( strtotime($incidence_data_row->record_datetime) >= strtotime(date("Y-m-d 23:00:00",strtotime($incidence_data_row->record_datetime)))  ){
							$incidence_data[$i]->record_datetime_late_not_matched += 1;
							$incidence_data[$i]->total_not_matched += 1;
							$incidence_data[$i]->record_datetime = sprintf("<font style='color:red;'>%s</font>",$incidence_data[$i]->record_datetime);
						}
					}
				}else{
					
					$incidence_data[$i]->total_not_matched = 7;
					$incidence_data[$i]->lgd_code_and_voucher_no_not_matched = 1;
					$incidence_data[$i]->voucher_date_not_matched = 1;
					$incidence_data[$i]->scheme_not_matched = 1;
					$incidence_data[$i]->amount_not_matched = 1;
					$incidence_data[$i]->vendor_name_not_matched = 1;
					$incidence_data[$i]->vendor_account_no_not_matched = 1;
					$incidence_data[$i]->record_datetime_late_not_matched = 1;
					
					$incidence_data[$i]->lgd_code = sprintf("<font style='color:red;'>%s</font>",$incidence_data[$i]->lgd_code);
					$incidence_data[$i]->voucher_no = sprintf("<font style='color:red;'>%s</font>",$incidence_data[$i]->voucher_no);
					$incidence_data[$i]->voucher_date = sprintf("<font style='color:red;'>%s</font>",$incidence_data[$i]->voucher_date);
					$incidence_data[$i]->scheme = sprintf("<font style='color:red;'>%s</font>",$incidence_data[$i]->scheme);
					$incidence_data[$i]->amount = sprintf("<font style='color:red;'>%s</font>",$incidence_data[$i]->amount);
					$incidence_data[$i]->vendor_name = sprintf("<font style='color:red;'>%s</font>",$incidence_data[$i]->vendor_name);
					$incidence_data[$i]->vendor_account_no = sprintf("<font style='color:red;'>%s</font>",$incidence_data[$i]->vendor_account_no);
					$incidence_data[$i]->record_datetime = sprintf("<font style='color:red;'>%s</font>",$incidence_data[$i]->record_datetime);
					
				}

				
			}

			$report = $incidence_data;

		}


		if( $subMenuActive == 'PanchayatGatewayTransactionMatched' ){
			$this->db->select("division as 'Division'");
			$this->db->select("district as 'District'");
			$this->db->select("block as 'Block'");
			$this->db->select("village as 'Gram Panchayat'");
			$this->db->select("map_num as 'LGD Code'");
			$this->db->select("DATE(incidence_datetime) as 'Voucher Date'");
			$this->db->select("incidence_lat as 'Voucher No'");
			$this->db->select("incidence_type as 'Scheme'");
			$this->db->select("solve_in_sec as 'Amount'");
			$this->db->select("sender_imei as 'Vendor'");
			$this->db->select("incidence_comment as 'Vendor Account Deatils'");
			$this->db->select("incidence_data.record_datetime as 'Record Datetime'");
			$this->db->from("incidence_data");
			$this->db->join("location_details","incidence_data.location_id=location_details.location_id");
			$this->db->where("DATE(incidence_data.record_datetime) >=",$start_date);
			$this->db->where("DATE(incidence_data.record_datetime) <=",$end_date);
			$this->db->where("matched",1);
			if( $this->location_type == "ADMIN" ){
				//
			}elseif( $this->location_type == "DIVISION" ){
				$this->db->where("location_details.division",$loc_row->division);
			}else if( $this->location_type == "DISTRICT" ){
				$this->db->where("location_details.district",$loc_row->district);
			}else if( $this->location_type == "BLOCK" ){
				$this->db->where("location_details.district",$loc_row->district);
				$this->db->where("location_details.block",$loc_row->block);
			}
			$this->db->order_by("incidence_data.record_datetime","DESC");
			$res = $this->db->get();
			$report = $res->result();
		}

		

		if( count($report) > 0 ){

			$response["status_code"] = "200";
			$response["status_message"] = "data found";
			$response["result"] = $report;
		}else{

			$response["status_code"] = "404";
			$response["status_message"] = "data not found";
			$response["result"] = null;
		}
		echo json_encode($response);
	}


	public function getnotmMatchedEgramswaraj(){

		$date1 = $this->input->post("date1"); 

		$loc_res = $this->db->get_where("location_details",["location_id"=>$this->location_id]);
		$loc_row = $loc_res->row();

		$this->db->select("incidence_data_master.sno as Sno");
		$this->db->select("incidence_data_master.incidence_type as Scheme");
        $this->db->select("incidence_data_master.district as District");
        $this->db->select("incidence_data_master.block as Block");
        $this->db->select("incidence_data_master.village as Village");
        $this->db->select("incidence_data_master.location_id as LGD_Code");
		$this->db->select("incidence_data_master.incidence_lat as Voucher_No");
		$this->db->select("Date(incidence_data_master.incidence_datetime) as Voucher_Date");
		$this->db->select("incidence_data_master.solve_in_sec as Amount");
		$this->db->select("incidence_data_master.vendor_name as Vendor");
		$this->db->select("incidence_data_master.vendor_account_no as Vendor_Account_Deatils");
		$this->db->select("incidence_data_master.record_datetime as Record_Datetime");
		//$this->db->select("incidence_data_master.status as Status");
		$this->db->select("incidence_data_master.matched as Matched");
		$this->db->from("incidence_data_master");
		$this->db->where("Date(incidence_data_master.incidence_datetime)",$date1);
		//$this->db->where("incidence_data_master.matched",0);
		if( $this->location_type == "ADMIN" ){
			//
		}elseif( $this->location_type == "DIVISION" ){
			$this->db->where("incidence_data_master.division",$loc_row->division);
		}else if( $this->location_type == "DISTRICT" ){
			$this->db->where("incidence_data_master.district",$loc_row->district);
		}else if( $this->location_type == "BLOCK" ){
			$this->db->where("incidence_data_master.district",$loc_row->district);
			$this->db->where("incidence_data_master.block",$loc_row->block);
		}
		$res = $this->db->get();

		$incidence_data_master = array();
		$index_arr = array('');
		$output = array();
		$matched_trans = array();
		$col_status = 'Status_till_'.END_DATE;
		foreach($res->result() as $row){
			$index = sprintf("%s|%s",$row->LGD_Code,$row->Voucher_No);
			if( $row->Matched == '0' ){
				$clone_row = clone $row;
				unset($clone_row->Sno,$clone_row->Matched,$clone_row->Record_Datetime);
				$index_arr[] = $index;
				$incidence_data_master[$index][] = $row;
				$output[$row->Sno] = $clone_row;
				$output[$row->Sno]->{$col_status} = '';
				$output[$row->Sno]->Not_Matched_Status = '<span class="label label-danger">Voucher No. Not Matched</span>';
			}

			if( $row->Matched == '1' ){
				$matched_trans[$index][] = $row;
			}
			
		}


		/*Current Status Check*/
		$this->db->select("incidence_data_master_master.sno as Sno");
		$this->db->select("incidence_data_master_master.incidence_type as Scheme");
        $this->db->select("incidence_data_master_master.district as District");
        $this->db->select("incidence_data_master_master.block as Block");
        $this->db->select("incidence_data_master_master.village as Village");
        $this->db->select("incidence_data_master_master.location_id as LGD_Code");
		$this->db->select("incidence_data_master_master.incidence_lat as Voucher_No");
		$this->db->select("Date(incidence_data_master_master.incidence_datetime) as Voucher_Date");
		$this->db->select("incidence_data_master_master.solve_in_sec as Amount");
		$this->db->select("incidence_data_master_master.vendor_name as Vendor");
		$this->db->select("incidence_data_master_master.vendor_account_no as Vendor_Account_Deatils");
		$this->db->select("incidence_data_master_master.record_datetime as Record_Datetime");
		$this->db->select("incidence_data_master_master.status as Status");
		$this->db->select("incidence_data_master_master.matched as Matched");
		$this->db->from("incidence_data_master_master");
		$this->db->where("Date(incidence_data_master_master.incidence_datetime)",$date1);
		//$this->db->where_in("CONCAT(location_id,'|',incidence_lat)",$index_arr);
		$res1 = $this->db->get();
		foreach($res1->result() as $row1){
			$index1 = sprintf("%s|%s",$row1->LGD_Code,$row1->Voucher_No);
			$matched_status = array();
			if( isset($incidence_data_master[$index1]) ){
				foreach($incidence_data_master[$index1] as $row){
					if(
						$row1->Scheme == $row->Scheme &&
						$row1->LGD_Code == $row->LGD_Code &&
						$row1->Voucher_No == $row->Voucher_No &&
						$row1->Voucher_Date == $row->Voucher_Date &&
						$row1->Amount == $row->Amount &&
						$row1->Vendor == $row->Vendor &&
						$row1->Vendor_Account_Deatils == $row->Vendor_Account_Deatils
					){
						$temp = $output[$row->Sno]->{$col_status};
						$temp = explode(",", $temp);
						$temp[] = $row1->Status;
						$temp = array_unique($temp);
						$output[$row->Sno]->{$col_status} = implode(",", $temp);
					}
				}
			}
		}
		/*Current Status Check*/


		$this->db->select("incidence_data.sno as Sno");
		$this->db->select("incidence_data.incidence_type as Scheme");
        $this->db->select("incidence_data.added_by as LGD_Code");
		$this->db->select("incidence_data.incidence_lat as Voucher_No");
		$this->db->select("Date(incidence_data.incidence_datetime) as Voucher_Date");
		$this->db->select("incidence_data.solve_in_sec as Amount");
		$this->db->select("incidence_data.sender_imei as Vendor");
		$this->db->select("incidence_data.incidence_comment as Vendor_Account_Deatils");
		$this->db->select("incidence_data.record_datetime as Record_Datetime");
		//$this->db->select("incidence_data.status as Status");
		$this->db->from("incidence_data");
		$this->db->where_in("CONCAT(added_by,'|',incidence_lat)",$index_arr);
		$res2 = $this->db->get();

		// echo "<pre>";
		// print_r($output);
		// print_r($incidence_data_master);
		foreach($res2->result() as $row2){
			$index2 = sprintf("%s|%s",$row2->LGD_Code,$row2->Voucher_No);
			foreach($incidence_data_master[$index2] as $row){
				$output[$row->Sno]->Not_Matched_Status = '<span class="label label-success">Voucher No. Matched</span><br/>';

				if( isset($matched_trans[$index2]) ){
					$output[$row->Sno]->Not_Matched_Status .= '<span class="label label-primary">|Voucher Partially Matched</span><br/>';
				}

				if( $row2->Voucher_Date != $row->Voucher_Date ){
					$output[$row->Sno]->Not_Matched_Status .= '<span class="label label-warning">|Voucher Date Not Matched</span><br/>';
				}

				if( $row2->Amount != $row->Amount ){
					$output[$row->Sno]->Not_Matched_Status .= '<span class="label label-warning">|Amount Not Matched</span><br/>';
				}

				if( strcasecmp($row2->Vendor_Account_Deatils, $row->Vendor_Account_Deatils) != 0 ){
					$output[$row->Sno]->Not_Matched_Status .= '<span class="label label-warning">|Vendor Account Not Matched</span><br/>';
				}

				if( strcasecmp($row2->Vendor, $row->Vendor) != 0 ){
					$output[$row->Sno]->Not_Matched_Status .= '<span class="label label-warning">|Vendor Name Not Matched</span><br/>';
				}

				if( strtotime(date("Y-m-d 19:00:01",strtotime($row->Record_Datetime)))<=strtotime($row2->Record_Datetime) ){
					$output[$row->Sno]->Not_Matched_Status .= '<span class="label label-default">|After 7 PM</span><br/>';
				}
			}
		}

		if( count($output) > 0 ){

			$response["status_code"] = "200";
			$response["status_message"] = "data found";
			$response["result"] = array_values($output);
		}else{

			$response["status_code"] = "404";
			$response["status_message"] = "data not found";
			$response["result"] = null;
		}
		echo json_encode($response);
	}

	public function getLoginDetails(){

		$date1 = $this->input->post("date1");
		$session_user_id = $this->session->userdata("user_id");
		$this->load->model("EmployeeModel");
		$locationArr = $this->EmployeeModel->getUserLocationDetail($session_user_id);

		$this->db->select("location_details.district as District");
        $this->db->select("location_details.block as Block");
        $this->db->select("location_details.village as Village");
        $this->db->select("location_details.map_num as LGD No");
        $this->db->select("user_details.user_id as Gram Sachiwalaya ID");
		$this->db->select("user_details.registered as Machine Reg");
		$this->db->select("web_last_uses.in_dateTime as Login Time");
		$this->db->from("user_details");
		$this->db->join("web_last_uses","DATE(web_last_uses.in_dateTime)='$date1' AND user_details.user_id=web_last_uses.username");
		$this->db->join("location_details","user_details.location_type = 'VILLAGE' AND user_details.location_id=location_details.location_id");
		if( $locationArr )
		$this->db->where( $locationArr );
		$this->db->group_by("user_details.user_id");
		$res = $this->db->get();

		if( $res->num_rows() > 0 ){

			$response["status_code"] = "200";
			$response["status_message"] = "data found";
			$response["result"] = $res->result();
		}else{

			$response["status_code"] = "404";
			$response["status_message"] = "data not found";
			$response["result"] = null;
		}
		echo json_encode($response);
	}

	public function getMain(){
		ini_set('memory_limit', '-1');
		$start_date = $this->input->post("start_date");
		$end_date = $this->input->post("end_date");
		$report_type = $this->input->post("report_type");

		$days = round( ( strtotime($end_date) - strtotime($start_date) ) / ( 60 * 60 * 24 ) ) + 1;

		$this->db->cache_on();

		$loc_res = $this->db->get_where("location_details",["location_id"=>$this->location_id]);
		$loc_row = $loc_res->row();

		if( $this->location_type == "ADMIN" ){

			if($report_type=="division_wise"){
				$this->db->select("division as 'Division'");
			}
			if($report_type=="district_wise"){
				$this->db->select("division as 'Division'");
				$this->db->select("district as 'District'");
			}
			if($report_type=="block_wise"){
				$this->db->select("division as 'Division'");
				$this->db->select("district as 'District'");
				$this->db->select("block as 'Block'");
			}
			if($report_type=="gram_panchayat_wise"){
				$this->db->select("division as 'Division'");
				$this->db->select("district as 'District'");
				$this->db->select("block as 'Block'");
				$this->db->select("village as 'Gram Panchayat'");
			}
			$this->db->select("round(sum(gram_sachiwalaya_ids)/$days) as 'GP Ids'");
			//$this->db->select("sum(logged_in) as 'Logged In'");
			$this->db->select("sum(case when date1 = '$end_date' then installed else 0 end) as 'Installed'");
			$this->db->select("sum(gateway_transactions) as 'Payment Through Gateway'");
			$this->db->select("sum(egramswaraj_transactions) as 'Payment Through eGramSwaraj'");
			$this->db->select("sum(matched) as 'Matched'");
			$this->db->select("sum(egramswaraj_not_matched) as 'Not Matched'");
			$this->db->from("report");
			$this->db->where("date1 >=",$start_date);
			$this->db->where("date1 <=",$end_date);
			if($report_type=="division_wise"){
				$this->db->group_by("division");
			}
			if($report_type=="district_wise"){
				$this->db->group_by("district");
			}
			if($report_type=="block_wise"){
				$this->db->group_by("district,block");
			}
			if($report_type=="gram_panchayat_wise"){
				$this->db->group_by("district,block,village");
			}
			$res = $this->db->get();

		}if( $this->location_type == "DIVISION" ){

			if($report_type=="district_wise"){
				$this->db->select("district as 'District'");
			}
			if($report_type=="block_wise"){
				$this->db->select("district as 'District'");
				$this->db->select("block as 'Block'");
			}
			if($report_type=="gram_panchayat_wise"){
				$this->db->select("district as 'District'");
				$this->db->select("block as 'Block'");
				$this->db->select("village as 'Gram Panchayat'");
			}
			$this->db->select("round(sum(gram_sachiwalaya_ids)/$days) as 'GP Ids'");
			//$this->db->select("sum(logged_in) as 'Logged In'");
			$this->db->select("sum(case when date1 = '$end_date' then installed else 0 end) as 'Installed'");
			$this->db->select("sum(gateway_transactions) as 'Payment Through Gateway'");
			$this->db->select("sum(egramswaraj_transactions) as 'Payment Through eGramSwaraj'");
			$this->db->select("sum(matched) as 'Matched'");
			$this->db->select("sum(egramswaraj_not_matched) as 'Not Matched'");
			$this->db->from("report");
			$this->db->where("date1 >=",$start_date);
			$this->db->where("date1 <=",$end_date);
			$this->db->where("division",$loc_row->division);
			if($report_type=="district_wise"){
				$this->db->group_by("district");
			}
			if($report_type=="block_wise"){
				$this->db->group_by("district,block");
			}
			if($report_type=="gram_panchayat_wise"){
				$this->db->group_by("district,block,village");
			}
			$res = $this->db->get();

		}else if( $this->location_type == "DISTRICT" ){

			if($report_type=="block_wise"){
				$this->db->select("block as 'Block'");
			}
			if($report_type=="gram_panchayat_wise"){
				$this->db->select("block as 'Block'");
				$this->db->select("village as 'Gram Panchayat'");
			}
			$this->db->select("round(sum(gram_sachiwalaya_ids)/$days) as 'GP Ids'");
			//$this->db->select("sum(logged_in) as 'Logged In'");
			$this->db->select("sum(case when date1 = '$end_date' then installed else 0 end) as 'Installed'");
			$this->db->select("sum(gateway_transactions) as 'Payment Through Gateway'");
			$this->db->select("sum(egramswaraj_transactions) as 'Payment Through eGramSwaraj'");
			$this->db->select("sum(matched) as 'Matched'");
			$this->db->select("sum(egramswaraj_not_matched) as 'Not Matched'");
			$this->db->from("report");
			$this->db->where("date1 >=",$start_date);
			$this->db->where("date1 <=",$end_date);
			$this->db->where("district",$loc_row->district);
			if($report_type=="block_wise"){
				$this->db->group_by("district,block");
			}
			if($report_type=="gram_panchayat_wise"){
				$this->db->group_by("district,block,village");
			}
			$res = $this->db->get();

		}else if( $this->location_type == "BLOCK" ){

			$this->db->select("village as 'Gram Panchayat'");
			$this->db->select("round(sum(gram_sachiwalaya_ids)/$days) as 'GP Ids'");
			//$this->db->select("sum(logged_in) as 'Logged In'");
			$this->db->select("sum(case when date1 = '$end_date' then installed else 0 end) as 'Installed'");
			$this->db->select("sum(gateway_transactions) as 'Payment Through Gateway'");
			$this->db->select("sum(egramswaraj_transactions) as 'Payment Through eGramSwaraj'");
			$this->db->select("sum(matched) as 'Matched'");
			$this->db->select("sum(egramswaraj_not_matched) as 'Not Matched'");
			$this->db->from("report");
			$this->db->where("date1 >=",$start_date);
			$this->db->where("date1 <=",$end_date);
			$this->db->where("district",$loc_row->district);
			$this->db->where("block",$loc_row->block);
			$this->db->group_by("district,block,village");
			$res = $this->db->get();

		}else{
			//
		}

		$this->db->cache_off();

		$report = $res->result();



		if( count($report) > 0 ){

			$response["status_code"] = "200";
			$response["status_message"] = "data found";
			$response["result"] = $report;
		}else{

			$response["status_code"] = "404";
			$response["status_message"] = "data not found";
			$response["result"] = null;
		}
		echo json_encode($response);
	}


	public function getComparisonData( $status = '' ){
		
		$this->db->select('incidence_data_master.district as District');
		$this->db->select('incidence_data_master.block as Block');
		$this->db->select('incidence_data_master.village as Village');
		$this->db->select('incidence_data_master.location_id as LGD_NO');
		$this->db->select('incidence_data_master.incidence_type as Scheme');
		$this->db->select('incidence_data_master.incidence_lat as Voucher_No');
		$this->db->select('DATE(incidence_data_master.incidence_datetime) as Voucher_Date');
		$this->db->select('incidence_data_master.solve_in_sec as Amount');
		$this->db->select('incidence_data_master.sender_imei as Vendor');
		$this->db->select('incidence_data_master.incidence_comment as Vendor_Account_Deatils');
		$this->db->select('incidence_data_master.vendor_account_no');

		$this->db->select('location_details.district as _District');
		$this->db->select('location_details.block as _Block');
		$this->db->select('location_details.village as _Village');
		$this->db->select('location_details.map_num as _LGD_NO');
		$this->db->select('incidence_data.incidence_type as _Scheme');
		$this->db->select('incidence_data.incidence_lat as _Voucher_No');
		$this->db->select('DATE(incidence_data.incidence_datetime) as _Voucher_Date');
		$this->db->select('incidence_data.solve_in_sec as _Amount');
		$this->db->select('incidence_data.sender_imei as _Vendor');
		$this->db->select('incidence_data.incidence_comment as _Vendor_Account_Deatils');

		$this->db->from("incidence_data");
		$this->db->join("location_details","incidence_data.location_id=location_details.location_id");
		
		if( $status == 'unmatched' ){
			$this->db->join("incidence_data_master","
				location_details.map_num = incidence_data_master.location_id AND
				incidence_data.incidence_lat = incidence_data_master.incidence_lat AND
				incidence_data.solve_in_sec = incidence_data_master.solve_in_sec AND
				DATE(incidence_data.incidence_datetime) = DATE(incidence_data_master.incidence_datetime) AND
				incidence_data.incidence_comment = incidence_data_master.vendor_account_no
			","right outer");
			$this->db->where("incidence_data.incidence_lat IS NULL",NULL);
		}else{
			$this->db->join("incidence_data_master","
				location_details.map_num = incidence_data_master.location_id AND
				incidence_data.incidence_lat = incidence_data_master.incidence_lat AND
				incidence_data.solve_in_sec = incidence_data_master.solve_in_sec AND
				DATE(incidence_data.incidence_datetime) = DATE(incidence_data_master.incidence_datetime) AND
				incidence_data.incidence_comment = incidence_data_master.vendor_account_no
			");
		}
		
		$res = $this->db->get();
		//print_r($res->result());

		return $res->result_array();

	}


	public function getNotUsed( $status = '' ){
		
		$this->db->select('incidence_data_master.district as District');
		$this->db->select('incidence_data_master.block as Block');
		$this->db->select('incidence_data_master.village as Village');
		$this->db->select('incidence_data_master.location_id as LGD_NO');
		$this->db->select('incidence_data_master.incidence_type as Scheme');
		$this->db->select('incidence_data_master.incidence_lat as Voucher_No');
		$this->db->select('DATE(incidence_data_master.incidence_datetime) as Voucher_Date');
		$this->db->select('incidence_data_master.solve_in_sec as Amount');
		$this->db->select('incidence_data_master.sender_imei as Vendor');
		$this->db->select('incidence_data_master.incidence_comment as Vendor_Account_Deatils');
		$this->db->select('incidence_data_master.vendor_account_no');

		$this->db->from("incidence_data");
		$this->db->join("location_details","incidence_data.location_id=location_details.location_id");
		
		$this->db->join("incidence_data_master","
			location_details.map_num = incidence_data_master.location_id AND
			incidence_data.incidence_lat = incidence_data_master.incidence_lat AND
			incidence_data.solve_in_sec = incidence_data_master.solve_in_sec AND
			DATE(incidence_data.incidence_datetime) = DATE(incidence_data_master.incidence_datetime) AND
			incidence_data.incidence_comment = incidence_data_master.vendor_account_no
		","right outer");
		if( $this->office_type != "ADMIN" ){
        	$this->db->where("incidence_data_master.location_id",$this->user_id);
        } 
		$this->db->where("incidence_data.incidence_lat IS NULL",NULL);
		
		$res = $this->db->get();
		//print_r($res->result());

		return $res->result_array();

	}



	public function gettodaysReportedData(){
		
		
        $this->db->select("incidence_data.incidence_id");
        $this->db->select("incidence_data.incidence_type");
        $this->db->select("incidence_type.priority");
        $this->db->select("incidence_data.status");
        //$this->db->select("incidence_type.resolve_time as 'Defined_Time'");
	$this->db->select("incidence_data.solve_in_sec as 'Defined_Time'");
        $this->db->select("incidence_data.incidence_datetime");
        $this->db->select("'N/A' as 'Time'");
        $this->db->select('location_details.district as "District"');
        $this->db->select('location_details.tehsil as "Tehsil"');
		$this->db->select('location_details.block as "Block"');
		$this->db->select('location_details.cluster as "Village"');
        //$this->db->select('location_details.village as "School"');
 		$this->db->from("incidence_data");
		$this->db->join("location_details","incidence_data.location_id=location_details.location_id");
		$this->db->join("incidence_type","incidence_data.incidence_type=incidence_type.incidence_type");
		$this->db->where("DATE(incidence_data.incidence_datetime)",date("Y-m-d"));
		$this->db->where("incidence_data.status !=","complete");
		$this->db->group_by("incidence_data.incidence_id");
		$res = $this->db->get();

		/*echo "<pre>";
		print_r($res->result());*/
		$report = array();
		foreach($res->result() as $index => $row){
			$report[$index] = $row;
			$report[$index]->Defined_Time = secondsToTime($row->Defined_Time);
			$report[$index]->Time = secondsToTime(time()-strtotime($row->incidence_datetime));

		}

		if( count($report) > 0 ){

			$response["status_code"] = "200";
			$response["status_message"] = "data found";
			$response["result"] = $report;
		}else{

			$response["status_code"] = "404";
			$response["status_message"] = "data not found";
			$response["result"] = null;
		}
		echo json_encode($response);
	}


	public function getpendingData(){
		
		$this->db->select("incidence_data.incidence_id");
        $this->db->select("incidence_data.incidence_type");
        $this->db->select("incidence_type.priority");
        $this->db->select("incidence_data.status");
        $this->db->select("incidence_type.resolve_time as 'Defined_Time'");
        $this->db->select("incidence_data.incidence_datetime");
        $this->db->select("'N/A' as 'Time'");
        $this->db->select('location_details.district as "District"');
        $this->db->select('location_details.tehsil as "Tehsil"');
		$this->db->select('location_details.block as "Block"');
		$this->db->select('location_details.cluster as "Village"');
        //$this->db->select('location_details.village as "School"');
 		$this->db->from("incidence_data");
		$this->db->join("location_details","incidence_data.location_id=location_details.location_id");
		$this->db->join("incidence_type","incidence_data.incidence_type=incidence_type.incidence_type");
		$this->db->where("incidence_data.status !=","complete");
		$this->db->group_by("incidence_data.incidence_id");
		$res = $this->db->get();

		/*echo "<pre>";
		print_r($res->result());*/
		$report = array();
		foreach($res->result() as $index => $row){
			$report[$index] = $row;
			$report[$index]->Defined_Time = secondsToTime($row->Defined_Time);
			$report[$index]->Time = secondsToTime(time()-strtotime($row->incidence_datetime));

		}

		if( count($report) > 0 ){

			$response["status_code"] = "200";
			$response["status_message"] = "data found";
			$response["result"] = $report;
		}else{

			$response["status_code"] = "404";
			$response["status_message"] = "data not found";
			$response["result"] = null;
		}
		echo json_encode($response);
	}



	public function getresolvedData(){
		
		$this->db->select("incidence_data.incidence_id");
        $this->db->select("incidence_data.incidence_type");
        $this->db->select("incidence_type.priority");
        $this->db->select("incidence_type.resolve_time as 'Defined_Time'");
        $this->db->select("incidence_data.incidence_datetime");
        $this->db->select("incidence_data.completion_datetime");
        $this->db->select("'N/A' as 'Time'");
        $this->db->select('location_details.district as "District"');
        $this->db->select('location_details.tehsil as "Tehsil"');
		$this->db->select('location_details.block as "Block"');
		$this->db->select('location_details.cluster as "Village"');
        //$this->db->select('location_details.village as "School"');
 		$this->db->from("incidence_data");
		$this->db->join("location_details","incidence_data.location_id=location_details.location_id");
		$this->db->join("incidence_type","incidence_data.incidence_type=incidence_type.incidence_type");
		$this->db->where("incidence_data.status","complete");
		$this->db->group_by("incidence_data.incidence_id");
		$res = $this->db->get();

		/*echo "<pre>";
		print_r($res->result());*/
		$report = array();
		foreach($res->result() as $index => $row){
			$report[$index] = $row;
			$report[$index]->Defined_Time = secondsToTime($row->Defined_Time);
			$report[$index]->Time = secondsToTime(strtotime($row->completion_datetime)-strtotime($row->incidence_datetime));

		}

		if( count($report) > 0 ){

			$response["status_code"] = "200";
			$response["status_message"] = "data found";
			$response["result"] = $report;
		}else{

			$response["status_code"] = "404";
			$response["status_message"] = "data not found";
			$response["result"] = null;
		}
		echo json_encode($response);
	}



	public function gettodayResolvedData(){
		
		$this->db->select("incidence_data.incidence_id");
        $this->db->select("incidence_data.incidence_type");
        $this->db->select("incidence_type.priority");
        $this->db->select("incidence_type.resolve_time as 'Defined_Time'");
        $this->db->select("incidence_data.incidence_datetime");
        $this->db->select("incidence_data.completion_datetime");
        $this->db->select("'N/A' as 'Time'");
        $this->db->select('location_details.district as "District"');
        $this->db->select('location_details.tehsil as "Tehsil"');
		$this->db->select('location_details.block as "Block"');
		$this->db->select('location_details.cluster as "Village"');
        //$this->db->select('location_details.village as "School"');
 		$this->db->from("incidence_data");
		$this->db->join("location_details","incidence_data.location_id=location_details.location_id");
		$this->db->join("incidence_type","incidence_data.incidence_type=incidence_type.incidence_type");
		$this->db->where("incidence_data.status","complete");
		$this->db->where("DATE(incidence_data.completion_datetime)",date("Y-m-d"));
		$this->db->group_by("incidence_data.incidence_id");
		$res = $this->db->get();

		/*echo "<pre>";
		print_r($res->result());*/
		$report = array();
		foreach($res->result() as $index => $row){
			$report[$index] = $row;
			$report[$index]->Defined_Time = secondsToTime($row->Defined_Time);
			$report[$index]->Time = secondsToTime(strtotime($row->completion_datetime)-strtotime($row->incidence_datetime));

		}

		if( count($report) > 0 ){

			$response["status_code"] = "200";
			$response["status_message"] = "data found";
			$response["result"] = $report;
		}else{

			$response["status_code"] = "404";
			$response["status_message"] = "data not found";
			$response["result"] = null;
		}
		echo json_encode($response);
	}



	// public function getsummaryData(){
		
	// 	$this->db->select("incidence_data.incidence_id");
 //        $this->db->select("incidence_data.incidence_type");
 //        $this->db->select("incidence_type.priority");
 //        //$this->db->select("incidence_type.resolve_time");
 //        $this->db->select("incidence_data.solve_in_sec as resolve_time");
 //        $this->db->select("incidence_data.status");
 //        $this->db->select("incidence_data.incidence_datetime");
 //        $this->db->select("incidence_data.completion_datetime");
 //        $this->db->select("'N/A' as 'Time'");
 //        $this->db->select('location_details.district as "District"');
 //        $this->db->select('location_details.tehsil as "Tehsil"');
	// 	$this->db->select('location_details.block as "Block"');
	// 	$this->db->select('location_details.cluster as "Village"');
 //        //$this->db->select('location_details.village as "School"');
 // 		$this->db->from("incidence_data");
	// 	$this->db->join("location_details","incidence_data.location_id=location_details.location_id");
	// 	$this->db->join("incidence_type","incidence_data.incidence_type=incidence_type.incidence_type");
	// 	$this->db->group_by("incidence_data.incidence_id");
	// 	$res = $this->db->get();

	// 	/*echo "<pre>";
	// 	print_r($res->result());*/
	// 	$report = array();
	// 	$report["Today Reported"]["lowtime_in"]   = 0;
	// 	$report["Today Reported"]["lowtime_over"] = 0;
	// 	$report["Today Reported"]["lowtotal"] = 0;
	// 	$report["Today Reported"]["hightime_in"]   = 0;
	// 	$report["Today Reported"]["hightime_over"] = 0;
	// 	$report["Today Reported"]["hightotal"] = 0;

	// 	$report["Today Resolved"]["lowtime_in"]   = 0;
	// 	$report["Today Resolved"]["lowtime_over"] = 0;
	// 	$report["Today Resolved"]["lowtotal"] = 0;
	// 	$report["Today Resolved"]["hightime_in"]   = 0;
	// 	$report["Today Resolved"]["hightime_over"] = 0;
	// 	$report["Today Resolved"]["hightotal"] = 0;


	// 	$report["Total Reported"]["lowtime_in"]   = 0;
	// 	$report["Total Reported"]["lowtime_over"] = 0;
	// 	$report["Total Reported"]["lowtotal"] = 0;
	// 	$report["Total Reported"]["hightime_in"]   = 0;
	// 	$report["Total Reported"]["hightime_over"] = 0;
	// 	$report["Total Reported"]["hightotal"] = 0;

	// 	$report["Pending"]["lowtime_in"]   = 0;
	// 	$report["Pending"]["lowtime_over"] = 0;
	// 	$report["Pending"]["lowtotal"] = 0;
	// 	$report["Pending"]["hightime_in"]   = 0;
	// 	$report["Pending"]["hightime_over"] = 0;
	// 	$report["Pending"]["hightotal"] = 0;

	// 	$report["Under Process"]["lowtime_in"]   = 0;
	// 	$report["Under Process"]["lowtime_over"] = 0;
	// 	$report["Under Process"]["lowtotal"] = 0;
	// 	$report["Under Process"]["hightime_in"]   = 0;
	// 	$report["Under Process"]["hightime_over"] = 0;
	// 	$report["Under Process"]["hightotal"] = 0;


	// 	$report["Total Resolved"]["lowtime_in"]   = 0;
	// 	$report["Total Resolved"]["lowtime_over"] = 0;
	// 	$report["Total Resolved"]["lowtotal"] = 0;
	// 	$report["Total Resolved"]["hightime_in"]   = 0;
	// 	$report["Total Resolved"]["hightime_over"] = 0;
	// 	$report["Total Resolved"]["hightotal"] = 0;

	// 	$TodayDate = date("Y-m-d");

	// 	foreach($res->result() as $index => $row){
			
	// 		if($row->priority == "low"){

	// 			if( $row->status == 'complete' ){

	// 				if((strtotime($row->completion_datetime)-strtotime($row->incidence_datetime))<=$row->resolve_time){
	// 					//in time
	// 					if($TodayDate==date("Y-m-d",strtotime($row->completion_datetime))){
	// 						$report["Today Resolved"]["lowtime_in"]++;
	// 						$report["Today Resolved"]["lowtotal"]++;
	// 					}
	// 					$report["Total Reported"]["lowtime_in"]++;
	// 					$report["Total Reported"]["lowtotal"]++;
	// 					$report["Total Resolved"]["lowtime_in"]++;
	// 					$report["Total Resolved"]["lowtotal"]++;
	// 				}else{
	// 					//overtime
	// 					if($TodayDate==date("Y-m-d",strtotime($row->completion_datetime))){
	// 						$report["Today Resolved"]["lowtime_over"]++;
	// 						$report["Today Resolved"]["lowtotal"]++;
	// 					}
	// 					$report["Total Reported"]["lowtime_over"]++;
	// 					$report["Total Reported"]["lowtotal"]++;
	// 					$report["Total Resolved"]["lowtime_over"]++;
	// 					$report["Total Resolved"]["lowtotal"]++;
	// 				}

	// 			}elseif( $row->status == 'pending' ){
					
	// 				if( (time()-strtotime($row->incidence_datetime))<$row->resolve_time){
	// 					//
	// 					if($TodayDate==date("Y-m-d",strtotime($row->incidence_datetime))){
	// 						$report["Today Reported"]["lowtime_in"]++;
	// 						$report["Today Reported"]["lowtotal"]++;
	// 					}
	// 					$report["Total Reported"]["lowtime_in"]++;
	// 					$report["Total Reported"]["lowtotal"]++;
	// 					$report["Pending"]["lowtime_in"]++;
	// 					$report["Pending"]["lowtotal"]++;
	// 				}else{
	// 					//
	// 					if($TodayDate==date("Y-m-d",strtotime($row->incidence_datetime))){
	// 						$report["Today Reported"]["lowtime_over"]++;
	// 						$report["Today Reported"]["lowtotal"]++;
	// 					}
	// 					$report["Total Reported"]["lowtime_over"]++;
	// 					$report["Total Reported"]["lowtotal"]++;
	// 					$report["Pending"]["lowtime_over"]++;
	// 					$report["Pending"]["lowtotal"]++;
	// 				}


	// 			}elseif( $row->status == 'under process' ){
					
	// 				if(  (time()-strtotime($row->incidence_datetime))<$row->resolve_time){
	// 					//
	// 					if($TodayDate==date("Y-m-d",strtotime($row->incidence_datetime))){
	// 						$report["Today Reported"]["lowtime_in"]++;
	// 						$report["Today Reported"]["lowtotal"]++;
	// 					}
	// 					$report["Total Reported"]["lowtime_in"]++;
	// 					$report["Total Reported"]["lowtotal"]++;
	// 					$report["Under Process"]["lowtime_in"]++;
	// 					$report["Under Process"]["lowtotal"]++;
	// 				}else{
	// 					//
	// 					if($TodayDate==date("Y-m-d",strtotime($row->incidence_datetime))){
	// 						$report["Today Reported"]["lowtime_over"]++;
	// 						$report["Today Reported"]["lowtotal"]++;
	// 					}
	// 					$report["Total Reported"]["lowtime_over"]++;
	// 					$report["Total Reported"]["lowtotal"]++;
	// 					$report["Under Process"]["lowtime_over"]++;
	// 					$report["Under Process"]["lowtotal"]++;
	// 				}

	// 			}
			


	// 		} elseif($row->priority == "high") {
				 

	// 			 if( $row->status == 'complete' ){

	// 				if((strtotime($row->completion_datetime)-strtotime($row->incidence_datetime))<=$row->resolve_time){
	// 					//in time
	// 					if($TodayDate==date("Y-m-d",strtotime($row->completion_datetime))){
	// 						$report["Today Resolved"]["hightime_in"]++;
	// 						$report["Today Resolved"]["hightotal"]++;
	// 					}
	// 					$report["Total Reported"]["hightime_in"]++;
	// 					$report["Total Reported"]["hightotal"]++;
	// 					$report["Total Resolved"]["hightime_in"]++;
	// 					$report["Total Resolved"]["hightotal"]++;
	// 				}else{
	// 					//overtime
	// 					if($TodayDate==date("Y-m-d",strtotime($row->completion_datetime))){
	// 						$report["Today Resolved"]["hightime_over"]++;
	// 						$report["Today Resolved"]["hightotal"]++;
	// 					}
	// 					$report["Total Reported"]["hightime_over"]++;
	// 					$report["Total Reported"]["hightotal"]++;
	// 					$report["Total Resolved"]["hightime_over"]++;
	// 					$report["Total Resolved"]["hightotal"]++;
	// 				}

	// 			}elseif( $row->status == 'pending' ){
					
	// 				if( (time()-strtotime($row->incidence_datetime))<$row->resolve_time){
	// 					//
	// 					if($TodayDate==date("Y-m-d",strtotime($row->incidence_datetime))){
	// 						$report["Today Reported"]["hightime_in"]++;
	// 						$report["Today Reported"]["hightotal"]++;
	// 					}
	// 					$report["Total Reported"]["hightime_in"]++;
	// 					$report["Total Reported"]["hightotal"]++;
	// 					$report["Pending"]["hightime_in"]++;
	// 					$report["Pending"]["hightotal"]++;
	// 				}else{
	// 					//
	// 					if($TodayDate==date("Y-m-d",strtotime($row->incidence_datetime))){
	// 						$report["Today Reported"]["hightime_over"]++;
	// 						$report["Today Reported"]["hightotal"]++;
	// 					}
	// 					$report["Total Reported"]["hightime_over"]++;
	// 					$report["Total Reported"]["hightotal"]++;
	// 					$report["Pending"]["hightime_over"]++;
	// 					$report["Pending"]["hightotal"]++;
	// 				}


	// 			}elseif( $row->status == 'under process' ){
					
	// 				if(  (time()-strtotime($row->incidence_datetime))<$row->resolve_time){
	// 					//
	// 					if($TodayDate==date("Y-m-d",strtotime($row->incidence_datetime))){
	// 						$report["Today Reported"]["hightime_in"]++;
	// 						$report["Today Reported"]["hightotal"]++;
	// 					}
	// 					$report["Total Reported"]["hightime_in"]++;
	// 					$report["Total Reported"]["hightotal"]++;
	// 					$report["Under Process"]["hightime_in"]++;
	// 					$report["Under Process"]["hightotal"]++;
	// 				}else{
	// 					//
	// 					if($TodayDate==date("Y-m-d",strtotime($row->incidence_datetime))){
	// 						$report["Today Reported"]["hightime_over"]++;
	// 						$report["Today Reported"]["hightotal"]++;
	// 					}
	// 					$report["Total Reported"]["hightime_over"]++;
	// 					$report["Total Reported"]["hightotal"]++;
	// 					$report["Under Process"]["hightime_over"]++;
	// 					$report["Under Process"]["hightotal"]++;
	// 				}

	// 			}
			


	// 		}

	// 	}

	// 	if( count($report) > 0 ){

	// 		$response["status_code"] = "200";
	// 		$response["status_message"] = "data found";
	// 		$response["result"] = $report;
	// 	}else{

	// 		$response["status_code"] = "404";
	// 		$response["status_message"] = "data not found";
	// 		$response["result"] = null;
	// 	}
	// 	// echo "<pre>";
	// 	// print_r($response);
	// 	//echo json_encode($response);
	// 	return $response;
	// }



	// public function printSummaryData(){

 //   	 	$Config["Title"]   = 'Summary Report';
 //   	 	$Config["Filename"]= strtoupper(strtolower($Config["Title"]).'.pdf');
	// 	$Config["Data"]    = $this->getsummaryData();
	// 	$Config["Dest"]    = APPPATH.'../assets/report/'.$Config["Filename"];
	// 	$pdf = new PDF();
	// 	$pdf->createSummaryDataPDF($Config);
	// }
}
