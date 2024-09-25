<?php

function MysqlDate( $stringDate ){      /*Sunday 28 January 2018*/

	$stringDate = trim($stringDate);
	list($day,$date,$month,$year) = explode(" ", $stringDate);
	return date("Y-m-d",strtotime("$date $month $year"));
}


function RemoveSpaces( $string ){

	return preg_replace('/[\s\t\n\r\s]+/', ' ', trim($string));
}



function caseCompareIdPwd( $user_id1 , $password1 , $user_id2 , $password2){

	if( strcmp($user_id1,$user_id2)==0 && strcmp($password1, $password2)==0 )
        return true;
    else
        return false;
}



function uploadImageFromBase64( $location , $base64 , $image_name)//only JPEG/JPG format supported.
{
	try{

		if(empty($base64))
			return null;

		if( !file_exists($location) )
		{
		    if( !mkdir($location,0777,true) )
		        exit("error to make upload directory");
		}
		$imageString = base64_decode($base64);
		$imageInfo   = getimagesizefromstring($imageString) or die("image library error");
		$arr = explode("/",$imageInfo["mime"]);
		

		if(strcasecmp("image",$arr[0])!=0||(strcasecmp("jpeg",$arr[1])!=0&&strcasecmp("jpg",$arr[1])!=0))
		    return null;
		$image_url = $location.$image_name.".jpg";
		$imageResourceId = @imagecreatefromstring($imageString) or die("image not created");
		imagejpeg($imageResourceId,$image_url) or die("image not move");
		imagedestroy($imageResourceId);

		return $image_name.".jpg";

	}catch(Expection $e){

		$response["status_code"] = "500";
		$response["status_message"] = "base64 library error";
		$response["result"] = null;
		echo json_encode($response);
		exit();
	}
}




function calDistance($lat1, $lon1, $lat2, $lon2 , $unit ) {

	$theta = $lon1 - $lon2;
	$miles = (sin(deg2rad((float)$lat1)) * sin(deg2rad((float)$lat2))) + (cos(deg2rad((float)$lat1)) * cos(deg2rad((float)$lat2)) * cos(deg2rad($theta)));
	$miles = acos($miles);
	$miles = rad2deg($miles);
	$result['miles'] = $miles * 60 * 1.1515;
	$result['feet'] = $result['miles'] * 5280;
	$result['yards'] = $result['feet'] / 3;
	$result['kilometers'] = $result['miles'] * 1.609344;
	$result['km'] = $result['miles'] * 1.609344;
	$result['meters'] = $result['kilometers'] * 1000;
	return round($result[$unit],2)." $unit";

}


function my_uniqid( $prefix='', $user_data='' ){

	return $prefix.$user_data.date("YmdHis").mt_rand(10000,99999);

}

function uniNameForImage(){
	return date("YmdHis").strtoupper(uniqid());
}




function firebase($registration_ids,$title,$body){

	    $key = 'AAAAPkKkdOw:APA91bFHCEV0jsatyWQ0mC7qoGZ24CxHbzY-MCpF2WNc0FupwzBjxvIVTxhBmpVPT2487sGdPfldtQYL2tOH3a9-6N48KzhtdGIfOzCGKR6wX-NxkqNx2vWQdbz3-_10P-uC9PvWCZzW';

    	$data = array
          (
          	    'body' 	=> $body,
				'title'	=> $title,
				"color" => "#53c4bc",
             	'icon'	=> 'myicon',/*Default Icon*/
              	'sound' => 'mySound'/*Default sound*/
          );
          $notification = array
          (
				'body' 	=> $body,
				'title'	=> $title,
				"color" => "#53c4bc",
             	'icon'	=> 'myicon',/*Default Icon*/
              	'sound' => 'mySound'/*Default sound*/
          );
        $fields = array(
            'to' => $registration_ids,
            'data' => $data,
            'notification' => $notification,
            'priority'=>'high'
        );

    	   //firebase server url to send the curl request
        $url = 'https://fcm.googleapis.com/fcm/send';

    	
    	$headers = array(
            'Authorization: key='.$key,
            'Content-Type: application/json'
        );

        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
        $result = curl_exec($ch);

        if ($result === FALSE) {
            //die('Curl failed: ' . curl_error($ch));
        }
        curl_close($ch);

        return json_decode($result);
}



function sms($number,$msg)
{  //$url="http://bhashsms.vdsai.com/api/sendmsg.php?user=vdaibs&pass=123456&sender=VDAISE&phone=".$number."&text=".urlencode($msg)."&priority=ndnd&stype=normal";
	//$url = "http://mysms.sms7.biz/rest/services/sendSMS/sendGroupSms?AUTH_KEY=".$authkey."&message=".urlencode($message)."&senderId=".$senderID."&routeId=1&mobileNos=".$number."&smsContentType=english";

    //$url = "http://bulksms.niktechsoftware.com/vendorsms/pushsms.aspx?user=kpushpendra81&password=Balwant@123&msisdn=".$number."&sid=DALHLD&msg=".urlencode($msg)."&fl=0&gwid=2";
    /*$url = "http://bulksms.niktechsoftware.com/vendorsms/pushsms.aspx?user=kpushpendra81&password=Balwant@123&msisdn=".$number."&sid=DALHL&msg=".urlencode($msg)."&fl=0&gwid=2";*/
	if(isset($url)){
		$ch = curl_init();
		curl_setopt($ch,CURLOPT_URL,$url);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
		$output=curl_exec($ch);
		curl_close($ch);
	    return $output;
	}else{
		return "url not found";
	}
}

function checkSmsStatus($sms_id,$mobile)  //Sent,DELIVRD,Invalid Number
{  
  //$url="http://bhashsms.vdsai.com/api/recdlr.php?user=vdaibs&msgid=$sms_id&phone=$mobile&msgtype=normal";
  //$url = "http://bulksms.niktechsoftware.com/vendorsms/checkdelivery.aspx?user=kpushpendra81&password=Balwant@123&messageid=$sms_id";
  //$url = "http://bulksms.niktechsoftware.com/vendorsms/checkdelivery.aspx?user=81&password=Balwant@123&messageid=$sms_id";
  if(isset($url)){
  	  $ch = curl_init();
	  curl_setopt($ch,CURLOPT_URL,$url);
	  curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
	  $output=curl_exec($ch);
	  curl_close($ch);
	  return $output;
  }else{
  	return "url not found";
  }
}



function newIncidenceMsg( $IncidenceType, $IncidenceId , $rajasvagram, $added_by ){

	//return "Shravasti IRS, New $IncidenceType Incidence ($IncidenceId) reported by $added_by. For more details visit dashboard/app";
	return "($IncidenceId) Shravasti IRS, New $IncidenceType Incidence reported by $added_by. For more details visit dashboard/app";
}

function completeIncidenceMsg( $IncidenceType, $IncidenceId , $rajasvagram, $added_by){

	//return "Shravasti IRS, For $IncidenceType Incidence ($IncidenceId) reported by $added_by, All Primary Department have been completed their action. For more details visit dashboard/app";
	return "($IncidenceId) Shravasti IRS, For $IncidenceType Incidence reported by $added_by, All Primary Department have been completed their action. For more details visit dashboard/app";
}


function underProcessIncidenceMsg( $EmpId, $Name, $IncidenceId , $rajasvagram, $added_by ){

	//return "Disaster Management Software, Officer $Name($EmpId) Respond On $IncidenceType Incidence ($IncidenceId) reported by $added_by. For more details visit dashboard/app";
	return "($IncidenceId) Disaster Management Software, Officer $Name($EmpId) Respond On Incidence reported by $added_by. For more details visit dashboard/app";
}

function secondaryDepUnderProcessIncidenceMsg( $EmpId, $Name, $IncidenceId , $rajasvagram, $added_by ){

	//return "Disaster Management Software,Secondary Department Officer $Name($EmpId) Respond On Incidence ($IncidenceId) reported by $added_by. For more details visit dashboard/app";
	return "($IncidenceId) Disaster Management Software,Secondary Department Officer $Name($EmpId) Respond On Incidence reported by $added_by. For more details visit dashboard/app";
}


function secondsToTime($seconds) {
    $dtF = new \DateTime('@0');
    $dtT = new \DateTime("@$seconds");
    return $dtF->diff($dtT)->format('%a days, %h hours');
}


function insertSpaceAfterEachChar( $String ){
	//
	return implode(" ", str_split($String));
}




function convertSystemInfoFileIntoArray( $file = '' ){
	$output = array();
	
	$lines = file($file, FILE_IGNORE_NEW_LINES);
	
	$lines = array_filter($lines, function($value) { return !is_null($value) && $value !== ''; });
	
	$arr = array();

	foreach( $lines as $index => $line ){
		$line_without_trim = $line; 
		$line = trim($line);
		if( 
			$line == "##START GramSachiwalayaId##" ||
			$line == "##START GramSachiwalayaType##" ||
			$line == "##START MACADDRESS##" ||
			$line == "##START ComputerSystemProduct##" ||
			$line == "##START BIOS##" ||
			$line == "##START ComputerSystem##" ||
			$line == "##START OperatingSystem##" ||
			$line == "##START DigitalSignerService##" ||
			$line == "##START PUBLIC IP##" ||
			$line == "##START IPCONFIG##" ||
			$line == "##START Processor##" ||
			$line == "##START BaseBoard##" ||
			$line == "##START NetworkAdapterConfiguration##" ||
			$line == "##START LogicalDisk##" ||
			$line == "##START PhysicalMemory##" ||
			$line == "##START DiskDrive##" ||
			$line == "##START PnpDeviceWPD##" ||
			$line == "##START DSC##"
		){
			$arr = array();
			continue;
		}
		if( $line == "##END GramSachiwalayaId##" ){
			$output["GramSachiwalayaId"] = $arr;
			continue;
		}
		if( $line == "##END GramSachiwalayaType##" ){
			$output["GramSachiwalayaType"] = $arr;
			continue;
		}
		if( $line == "##END MACADDRESS##" ){
			$output["MACADDRESS"] = $arr;
			continue;
		}
		if( $line == "##END ComputerSystemProduct##" ){
			$output["ComputerSystemProduct"] = $arr;
			continue;
		}
		if( $line == "##END BIOS##" ){
			$output["BIOS"] = $arr;
			continue;
		}
		if( $line == "##END ComputerSystem##" ){
			$output["ComputerSystem"] = $arr;
			continue;
		}
		if( $line == "##END OperatingSystem##" ){
			$output["OperatingSystem"] = $arr;
			continue;
		}
		if( $line == "##END DigitalSignerService##" ){
			$output["DigitalSignerService"] = $arr;
			continue;
		}
		if( $line == "##END PUBLIC IP##" ){
			$output["PUBLIC IP"] = $arr;
			continue;
		}
		if( $line == "##END IPCONFIG##" ){
			$output["IPCONFIG"] = $arr;
			continue;
		}
		if( $line == "##END Processor##" ){
			$output["Processor"] = $arr;
			continue;
		}
		if( $line == "##END BaseBoard##" ){
			$output["BaseBoard"] = $arr;
			continue;
		}
		if( $line == "##END NetworkAdapterConfiguration##" ){
			$output["NetworkAdapterConfiguration"] = $arr;
			continue;
		}
		if( $line == "##END LogicalDisk##" ){
			$output["LogicalDisk"] = $arr;
			continue;
		}
		if( $line == "##END PhysicalMemory##" ){
			$output["PhysicalMemory"] = $arr;
			continue;
		}
		if( $line == "##END DiskDrive##" ){
			$output["DiskDrive"] = $arr;
			continue;
		}
		if( $line == "##END PnpDeviceWPD##" ){
			$output["PnpDeviceWPD"] = $arr;
			continue;
		}
		if( $line == "##END DSC##" ){
			$output["DSC"] = $arr;
			continue;
		}
		
		if( $line == "Windows IP Configuration"){
			continue;
		}

		if( trim(substr($line_without_trim, 0, 4)) == "" ){ //avoid : in value
			$key = $line;
			$value = null;
			unset($value);
		}else{
			@list($key,$value) = explode(":",$line_without_trim,2);
		}
		if( isset($key) && isset($value) ){
			$arr[trim($key)][] = $value;
			$lastkey = trim($key);
			$lastindex = count($arr[trim($key)]) - 1;
		}else{
			$arr[$lastkey][$lastindex] .= $key;
		}
	}
	return $output;
}


function getSystemInfo( $file = '' ){
	$arr = convertSystemInfoFileIntoArray($file);

	$output = array(
		"ComputerSystemProduct_UUID"=>$arr["ComputerSystemProduct"]["UUID"],
		"ComputerSystemProduct_Vendor"=>$arr["ComputerSystemProduct"]["Vendor"],
		"ComputerSystemProduct_IdentifyingNumber"=>$arr["ComputerSystemProduct"]["IdentifyingNumber"],
		"BIOS_SerialNumber"=>$arr["BIOS"]["SerialNumber"],
		"BIOS_Manufacturer"=>$arr["BIOS"]["Manufacturer"],
		"ComputerSystem_Manufacturer"=>$arr["ComputerSystem"]["Manufacturer"],
		"ComputerSystem_Model"=>$arr["ComputerSystem"]["Model"],
		"ComputerSystem_SystemSKUNumber"=>$arr["ComputerSystem"]["SystemSKUNumber"],
		"OperatingSystem_Caption"=>$arr["OperatingSystem"]["Caption"],
		"OperatingSystem_OSArchitecture"=>$arr["OperatingSystem"]["OSArchitecture"],
		"OperatingSystem_SerialNumber"=>$arr["OperatingSystem"]["SerialNumber"],
		"OperatingSystem_CSName"=>$arr["OperatingSystem"]["CSName"],
		"OperatingSystem_RegisteredUser"=>$arr["OperatingSystem"]["RegisteredUser"],
		"OperatingSystem_SystemDrive"=>$arr["OperatingSystem"]["SystemDrive"],
		"OperatingSystem_Version"=>$arr["OperatingSystem"]["Version"],
		"PUBLIC IP_Address"=>$arr["PUBLIC IP"]["Address"][1],
		"Processor_Name"=>$arr["Processor"]["Name"],
		"Processor_ProcessorId"=>$arr["Processor"]["ProcessorId"],
		"BaseBoard_Manufacturer"=>$arr["BaseBoard"]["Manufacturer"],
		"BaseBoard_Product"=>$arr["BaseBoard"]["Product"],
		"BaseBoard_SerialNumber"=>$arr["BaseBoard"]["SerialNumber"],
		"BaseBoard_Version"=>$arr["BaseBoard"]["Version"],
		"LogicalDisk_DeviceID"=>$arr["LogicalDisk"]["DeviceID"],
		"LogicalDisk_Description"=>$arr["LogicalDisk"]["Description"],
		"LogicalDisk_VolumeSerialNumber"=>$arr["LogicalDisk"]["VolumeSerialNumber"],
		"PhysicalMemory_DeviceLocator"=>$arr["PhysicalMemory"]["DeviceLocator"],
		"PhysicalMemory_Manufacturer"=>$arr["PhysicalMemory"]["Manufacturer"],
		"PhysicalMemory_PartNumber"=>$arr["PhysicalMemory"]["PartNumber"],
		"PhysicalMemory_SerialNumber"=>$arr["PhysicalMemory"]["SerialNumber"],
		"DiskDrive_MediaType"=>$arr["DiskDrive"]["MediaType"],
		"DiskDrive_Manufacturer"=>$arr["DiskDrive"]["Manufacturer"],
		"DiskDrive_Model"=>$arr["DiskDrive"]["Model"],
		"DiskDrive_SerialNumber"=>$arr["DiskDrive"]["SerialNumber"],
		"DiskDrive_Signature"=>$arr["DiskDrive"]["Signature"],
		"PnpDeviceWPD_FriendlyName"=>$arr["PnpDeviceWPD"]["FriendlyName"],
		"PnpDeviceWPD_Caption"=>$arr["PnpDeviceWPD"]["Caption"],
		"PnpDeviceWPD_Description"=>$arr["PnpDeviceWPD"]["Description"],
		"PnpDeviceWPD_Manufacturer"=>$arr["PnpDeviceWPD"]["Manufacturer"],
		"DSC_SerialNumber"=>$arr["DSC"]["SerialNumber"],
		"DSC_Thumbprint"=>$arr["DSC"]["Thumbprint"],
		"DSC_Issuer"=>$arr["DSC"]["Issuer"],
		"DSC_Subject"=>$arr["DSC"]["Subject"],
		"DSC_NotAfter"=>$arr["DSC"]["NotAfter"],
		"DSC_NotBefore"=>$arr["DSC"]["NotBefore"],
		
	);

	$machine = array(
		"ComputerSystemProduct_UUID" => $output["ComputerSystemProduct_UUID"],
		"ComputerSystemProduct_Vendor" => $output["ComputerSystemProduct_Vendor"],
		"ComputerSystemProduct_IdentifyingNumber" => $output["ComputerSystemProduct_IdentifyingNumber"],
		"BIOS_SerialNumber" => $output["BIOS_SerialNumber"],
		"BIOS_Manufacturer" => $output["BIOS_Manufacturer"],
		"ComputerSystem_Manufacturer" => $output["ComputerSystem_Manufacturer"],
		"ComputerSystem_Model" => $output["ComputerSystem_Model"],
		"ComputerSystem_SystemSKUNumber" => $output["ComputerSystem_SystemSKUNumber"],
		"Processor_Name" => $output["Processor_Name"],
		"Processor_ProcessorId" => $output["Processor_ProcessorId"],
		"BaseBoard_Manufacturer" => $output["BaseBoard_Manufacturer"],
		"BaseBoard_Product" => $output["BaseBoard_Product"],
		"BaseBoard_SerialNumber" => $output["BaseBoard_SerialNumber"],
		"BaseBoard_Manufacturer" => $output["BaseBoard_Manufacturer"],
		"BaseBoard_Product" => $output["BaseBoard_Product"],
		"LogicalDisk_VolumeSerialNumber0" => $output["LogicalDisk_VolumeSerialNumber"][0] //first drive serial number
	);

	$output["machine"] = $machine;
	$output["machine_id"] = hash('sha256',serialize($machine));
	$output["token"] = $output["machine_id"];

	return $output;
}





require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Csv;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
use PhpOffice\PhpSpreadsheet\Reader\Xls;

function readeGramSwarajExcel( $file = '' ){

	ini_set('memory_limit', '-1');

	$output = array();

	$arr_file = explode('.', $file);
	$extension = end($arr_file);
	$error = array();
	$error1 = array(); 
    
	if( 'xlsx' == $extension || 'xlsm' == $extension ) {
		$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
	}else if( 'xls' == $extension ){
		$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
	}else {
		return false;
	}
	
	$spreadsheet = $reader->load($file);

	$worksheet = $spreadsheet->getActiveSheet();

	$datetime = date("Y-m-d H:i:s");



	/*CFC START*/

	$report = trim($worksheet->getCellByColumnAndRow(1,2)->getFormattedValue());
    $sno = trim($worksheet->getCellByColumnAndRow(1,7)->getFormattedValue());
    $district = trim($worksheet->getCellByColumnAndRow(2,7)->getFormattedValue());
    $block = trim($worksheet->getCellByColumnAndRow(3,7)->getFormattedValue());
    $lgd_code = trim($worksheet->getCellByColumnAndRow(4,7)->getFormattedValue());
    $village = trim($worksheet->getCellByColumnAndRow(5,7)->getFormattedValue());
    $voucher_no = trim($worksheet->getCellByColumnAndRow(6,7)->getFormattedValue());
    $voucher_date = trim($worksheet->getCellByColumnAndRow(7,7)->getFormattedValue());
    $amount = trim($worksheet->getCellByColumnAndRow(8,7)->getFormattedValue());
    $status = trim($worksheet->getCellByColumnAndRow(9,7)->getFormattedValue());
    $vendor = trim($worksheet->getCellByColumnAndRow(10,7)->getFormattedValue());
    $vendor_account_deatils = trim($worksheet->getCellByColumnAndRow(11,7)->getFormattedValue());

    if(
    	$report == 'Vendor Wise Expenditure Detail' &&
    	$sno == 'S.No.' &&
    	$district == 'District Panchayats and Equivalent' &&
    	$block == 'Block Panchayats and Equivalent' &&
    	$lgd_code == 'LGD Code' &&
    	$village == 'Village Panchayats and Equivalent' &&
    	$voucher_no == 'Voucher No.' &&
    	$voucher_date == 'Voucher Date' &&
    	$amount == 'Amount' &&
    	$status == 'Status' &&
    	$vendor == 'Vendor' &&
    	$vendor_account_deatils == 'Vendor Account Deatils'

    ){
    		$ci =& get_instance();

    		$division = array();
    		$res = $ci->db->select("division,district")->get_where("location_details",["location_type"=>"DISTRICT"]);
    		foreach( $res->result() as $row ){
    			$division[$row->district] = $row->division;
    		}

    		$year = trim($worksheet->getCellByColumnAndRow(1,4)->getFormattedValue());
			list($name,$value) = explode(":",$year);
			$year = trim($value);
			$scheme = trim($worksheet->getCellByColumnAndRow(1,5)->getFormattedValue());
			list($name,$value) = explode(":",$scheme);
			$scheme = trim($value);

    		foreach($worksheet->getRowIterator() as $row => $val){
				if($row<=7){
		    		continue;
		    	}
		  //   	$output[] = array(
		  //   		"year" => $year,
		  //   		"scheme" => $scheme,
				// 	"sno" => trim($worksheet->getCellByColumnAndRow(1,$row)->getFormattedValue()),
				//     "district" => trim($worksheet->getCellByColumnAndRow(2,$row)->getFormattedValue()),
				//     "block" => trim($worksheet->getCellByColumnAndRow(3,$row)->getFormattedValue()),
				//     "lgd_code" => trim($worksheet->getCellByColumnAndRow(4,$row)->getFormattedValue()),
				//     "village" => trim($worksheet->getCellByColumnAndRow(5,$row)->getFormattedValue()),
				//     "voucher_no" => trim($worksheet->getCellByColumnAndRow(6,$row)->getFormattedValue()),
				//     "voucher_date" => date("Y-m-d", strtotime(trim($worksheet->getCellByColumnAndRow(7,$row)->getFormattedValue()))),
				//     "amount" => trim($worksheet->getCellByColumnAndRow(8,$row)->getFormattedValue()),
				//     "status" => trim($worksheet->getCellByColumnAndRow(9,$row)->getFormattedValue()),
				//     "vendor" => trim($worksheet->getCellByColumnAndRow(10,$row)->getFormattedValue()),
				//     "vendor_account_deatils" => trim($worksheet->getCellByColumnAndRow(11,$row)->getFormattedValue())
				// );

		    	if( !empty(trim($worksheet->getCellByColumnAndRow(4,$row)->getFormattedValue())) ){
		    		
		    		list($vendor_name,$type) = explode("~",trim($worksheet->getCellByColumnAndRow(10,$row)->getFormattedValue()));
		    		list($bank_name,$ifsc,$account) = explode("~",trim($worksheet->getCellByColumnAndRow(11,$row)->getFormattedValue()));

		    		$row_arr = array(
			    		"incidence_image" => $year,
			    		"incidence_type" => $scheme,
					    "district" => trim($worksheet->getCellByColumnAndRow(2,$row)->getFormattedValue()),
					    "block" => trim($worksheet->getCellByColumnAndRow(3,$row)->getFormattedValue()),
					    "location_id" => trim($worksheet->getCellByColumnAndRow(4,$row)->getFormattedValue()),
					    "village" => trim($worksheet->getCellByColumnAndRow(5,$row)->getFormattedValue()),
					    "incidence_lat" => trim($worksheet->getCellByColumnAndRow(6,$row)->getFormattedValue()),
					    "incidence_datetime" => date("Y-m-d", strtotime(trim($worksheet->getCellByColumnAndRow(7,$row)->getFormattedValue()))),
					    "solve_in_sec" => trim($worksheet->getCellByColumnAndRow(8,$row)->getFormattedValue()),
					    "sender_imei" => trim($worksheet->getCellByColumnAndRow(10,$row)->getFormattedValue()),
					    "incidence_comment" => trim($worksheet->getCellByColumnAndRow(11,$row)->getFormattedValue()),
					    "vendor_name" => $vendor_name,
					    "vendor_account_no" => $account
					);

					$row_arr["division"] = isset($division[$row_arr["district"]]) ? $division[$row_arr["district"]] : NULL;

					$found_res = $ci->db->get_where("incidence_data_master",$row_arr);

					if( $found_res->num_rows() == 0 ){
						$row_arr["record_datetime"] = $datetime;
						$row_arr["status"] = trim($worksheet->getCellByColumnAndRow(9,$row)->getFormattedValue());
						$row_arr["sender_mob"] = trim($worksheet->getCellByColumnAndRow(1,$row)->getFormattedValue());
						$output[] = $row_arr;
					}
		    	}
			}

			
			if( count($output) > 0 && $ci->db->insert_batch("incidence_data_master",$output) ){
				return true;
			}
    }






    /*CFC END*/


    /*SFC START*/

    $report = trim($worksheet->getCellByColumnAndRow(1,1)->getFormattedValue());
	
    $sno = trim($worksheet->getCellByColumnAndRow(1,5)->getFormattedValue());
    $lgd_type = trim($worksheet->getCellByColumnAndRow(2,5)->getFormattedValue());
    $lgd_code = trim($worksheet->getCellByColumnAndRow(3,5)->getFormattedValue());
    $lgd_name = trim($worksheet->getCellByColumnAndRow(4,5)->getFormattedValue());
    $fto_date = trim($worksheet->getCellByColumnAndRow(5,5)->getFormattedValue());
    $file_name = trim($worksheet->getCellByColumnAndRow(6,5)->getFormattedValue());
    $amount = trim($worksheet->getCellByColumnAndRow(7,5)->getFormattedValue());
    $generated_ip = trim($worksheet->getCellByColumnAndRow(8,5)->getFormattedValue());
    $generated_date = trim($worksheet->getCellByColumnAndRow(9,5)->getFormattedValue());
    $maker_ip = trim($worksheet->getCellByColumnAndRow(10,5)->getFormattedValue());
    $maker_date = trim($worksheet->getCellByColumnAndRow(11,5)->getFormattedValue());
    $checker_ip = trim($worksheet->getCellByColumnAndRow(12,5)->getFormattedValue());
    $checker_date = trim($worksheet->getCellByColumnAndRow(13,5)->getFormattedValue());





    if(
    	$report == 'Audit Report For FTO' &&
    	$sno == 'S.No.' &&
    	$lgd_type == 'Local Body Type' &&
    	$lgd_code == 'Local Body Code' &&
    	$lgd_name == 'Local Body Name' &&
    	$fto_date == 'FTO Date' &&
    	$file_name == 'File Name' &&
    	$amount == 'Amount' &&
    	$generated_ip == 'Generated IP Address' &&
    	$generated_date == 'Generated Date' &&
    	$maker_ip == 'Maker Signed IP Address' &&
    	$maker_date == 'Maker Signed Date' &&
    	$checker_ip == 'Checker Signed IP Address' &&
    	$checker_date == 'Checker Signed Date'

    ){
    		$ci =& get_instance();

    		$year = trim($worksheet->getCellByColumnAndRow(1,2)->getFormattedValue());
			list($name,$value) = explode(":",$year);
			$year = trim($value);
		    $scheme = trim($worksheet->getCellByColumnAndRow(1,3)->getFormattedValue());
		    list($name,$value) = explode(":",$scheme);
			$scheme = trim($value);

    		foreach($worksheet->getRowIterator() as $row => $val){
				if($row<=5){
		    		continue;
		    	}

		    	if( !empty(trim($worksheet->getCellByColumnAndRow(3,$row)->getFormattedValue())) ){
		    		$row_arr = array(
			    		"year" => $year,
			    		"scheme" => $scheme,
					    "lgd_type" => trim($worksheet->getCellByColumnAndRow(2,$row)->getFormattedValue()),
					    "lgd_code" => trim($worksheet->getCellByColumnAndRow(3,$row)->getFormattedValue()),
					    "lgd_name" => trim($worksheet->getCellByColumnAndRow(4,$row)->getFormattedValue()),
					    "fto_date" => trim($worksheet->getCellByColumnAndRow(5,$row)->getFormattedValue()),
					    "file_name" => trim($worksheet->getCellByColumnAndRow(6,$row)->getFormattedValue()),
					    "amount" => trim($worksheet->getCellByColumnAndRow(7,$row)->getFormattedValue()),
					    "generated_ip" => trim($worksheet->getCellByColumnAndRow(8,$row)->getFormattedValue()),
					    "generated_date" => trim($worksheet->getCellByColumnAndRow(9,$row)->getFormattedValue()),
					    "maker_ip" => trim($worksheet->getCellByColumnAndRow(10,$row)->getFormattedValue()),
					    "maker_date" => trim($worksheet->getCellByColumnAndRow(11,$row)->getFormattedValue()),
					    "checker_ip" => trim($worksheet->getCellByColumnAndRow(12,$row)->getFormattedValue()),
					    "checker_date" => trim($worksheet->getCellByColumnAndRow(13,$row)->getFormattedValue())
					);

					$found_res = $ci->db->get_where("incidence_data_master2",$row_arr);

					if( $found_res->num_rows() == 0 ){
						$row_arr["record_datetime"] = $datetime;
						$row_arr["sheet_sno"] = trim($worksheet->getCellByColumnAndRow(1,$row)->getFormattedValue());
						$output[] = $row_arr;
					}
		    	}
			}

			if( count($output) > 0 && $ci->db->insert_batch("incidence_data_master2",$output) ){
				return true;
			}
    }


    /*SFC END*/

    

	return false;
}




function readeGramSwarajJSON( $file = '', $datetime = '', $year = '', $scheme = '', $report = '' ){

	ini_set('memory_limit', '-1');

	$output = array();
	//$datetime = date("Y-m-d H:i:s");



	/*CFC START*/

    if( $report == 'Vendor Wise Expenditure Detail.json' ){

    		$jsonstr = file_get_contents($file);
			$jsonArr = json_decode($jsonstr, true); // decode the JSON into an associative array

    		$ci =& get_instance();

    		$division = array();
    		$res = $ci->db->select("division,district")->get_where("location_details",["location_type"=>"DISTRICT"]);
    		foreach( $res->result() as $row ){
    			$division[$row->district] = $row->division;
    		}

    		foreach($jsonArr as $index => $row){
		    		
	    		list($vendor_name,$type) = explode("~",trim($row["vendor"]));
	    		list($bank_name,$ifsc,$account) = explode("~",trim($row["vendorBank"]));
	    		$voucher_date = explode("/",$row["voucherDate"]);
	    		$voucher_date = sprintf("%s-%s-%s",$voucher_date[2],$voucher_date[1],$voucher_date[0]);


	    		$row_arr = array(
		    		"incidence_image" => $year,
		    		"incidence_type" => $scheme,
				    "district" => trim($row["districtName"]),
				    "block" => trim($row["parentName"]),
				    "location_id" => trim($row["villageCode"]),
				    "village" => trim($row["villageName"]),
				    "incidence_lat" => trim($row["voucherno"]),
				    "incidence_datetime" => $voucher_date,
				    "solve_in_sec" => trim($row["amount"]),
				    "sender_imei" => trim($row["vendor"]),
				    "incidence_comment" => trim($row["vendorBank"]),
				    "vendor_name" => $vendor_name,
				    "vendor_account_no" => $account
				);

				$row_arr["division"] = isset($division[$row_arr["district"]]) ? $division[$row_arr["district"]] : NULL;

				$found_res = $ci->db->get_where("incidence_data_master",$row_arr);

				if( $found_res->num_rows() == 0 ){
					$row_arr["record_datetime"] = $datetime;
					$row_arr["status"] = trim($row["status"]);
					$row_arr["sender_mob"] = trim($row["id"]);
					$output[] = $row_arr;
				}
			}

			if( count($output) > 0 && $ci->db->insert_batch("incidence_data_master",$output) ){
				return true;
			}
    }

    /*CFC END*/

	return false;
}


function getClientIp($ip=''){
	if( isset($_SERVER['HTTP_X_CLIENT']) ){
		if( !empty($_SERVER['HTTP_X_CLIENT']) ){
			return $_SERVER['HTTP_X_CLIENT'];
		}else{
			return $ip;
		}
	}else{
		return $ip;
	}
	return $ip;
}


function getLtByLtn($ltn){
	$arr = array(
		"1" => "Maker",
		"2" => "Checker"
	);
	return isset($arr[$ltn]) ? $arr[$ltn] : "";
}


function check_app_post_sync( $arr, $lgd_code, $timestamp, $app ){
	if(isset($app) && !empty($app)){
		$notification_milisec = 10*60*1000;
		$margin_milisec = 1*60*1000;

		if( isset($arr["PnpDeviceWPD_FriendlyName"]) && count($arr["PnpDeviceWPD_FriendlyName"]) > 0 ){
			$CI =& get_instance();
			$vdsai_panchayat_gateway_communication = $CI->load->database('vdsai_panchayat_gateway_communication', TRUE);
			$timestamp_milisec = $timestamp*1000;
			$vdsai_panchayat_gateway_communication->select("sno");
			$vdsai_panchayat_gateway_communication->where("lgd_code",$lgd_code);
			$vdsai_panchayat_gateway_communication->where("location !=","from_notification");
			$vdsai_panchayat_gateway_communication->where("(cast(timestamp as decimal(15,2)) - cast(notification_time as decimal(15,2))) <= $notification_milisec",NULL);
			$vdsai_panchayat_gateway_communication->where("(cast(timestamp as decimal(15,2)) - $timestamp_milisec) BETWEEN -$margin_milisec AND $margin_milisec",NULL);	
			$res = $vdsai_panchayat_gateway_communication->get("app_post_sync");

			if( $res->num_rows() > 0 ){
				return true;
			}else{
				//return false;
				return "Android App geo location not found. plz try again";
			}
		}else{
			//return false;
			return "Please connect android app device with system then try again";
		}
	}else{
		return true;
	}
	
}

function financial_year( $type='', $date='' ){
	
	$date = empty($date) ? date("Y-m-d") : $date;
	$response = "";

	$curr_day = date("d",strtotime($date));
	$curr_month = date("m",strtotime($date));
	$curr_year4 = date("Y",strtotime($date));
	$curr_year2 = date("y",strtotime($date));

	if( $type == '1' ){
		$curr_year2 = date("y",strtotime($date));
	}

	if( $type == '2' ){
		$curr_year2 = date("Y",strtotime($date));
	}

	if( $curr_month >= 4 ){
		$curr_year2++;
		$response = $curr_year4."-".$curr_year2;
	}else{
		$curr_year4--;
		$response = $curr_year4."-".$curr_year2;
	}

	return $response;
}


function saveComplainDataHelp($user_id,$issue_in,$type_of_issue,$description){
	$issue_details=[];

	foreach(ISSUE_IN as $key){
		switch($key){
			case 'app':
				$issue_details[$key]=ISSUE_TYPE_APP;
				break;
			case 'web':
				$issue_details[$key]=ISSUE_TYPE_WEB;
				break;
			case 'extension':
				$issue_details[$key]=ISSUE_TYPE_EXTENSION;
				break;
			case 'executable_file':
				$issue_details[$key]=ISSUE_TYPE_EXE_FILE;
				break;


		}
	}
	
	// $name=$this->input->post("name");
	// $email=$this->input->post("email");
	// $mobile=$this->input->post("mobile");
	// $issue_in=$this->input->post("issue_in");
	// $type_of_issue=$this->input->post("type_of_issue");
	// $user_id=$this->input->post("user_id");
	// $description=$this->input->post("description");
	if(empty($user_id)){
		$response= ["status_code"=>400,"message"=>"User id can't be empty .."];
		return $response;
	}

	//check if issue_in exist of not
	if(isset($issue_details[$issue_in])){
		//check for the validation of type of issue
		if(array_search($type_of_issue,$issue_details[$issue_in])!==false){
			// $user_id=$this->session->userdata("user_id");
			$ci =& get_instance();
			$createDateTime=date('Y-m-d H:i:s');
			$dateTimeid=date('YmdHis');
			$randNo=rand(1000,9999);
			$referenceId='REF'.$dateTimeid.$randNo;
			$data=array(
				"issue_in"=>$issue_in,
				"type_of_issue"=>$type_of_issue,
				"description"=>$description,
				"user_id"=>$user_id,
				"created_at"=>$createDateTime,
				"updated_at"=>$createDateTime,
				"status"=>"Pending",
				"reference_id"=>$referenceId
			);
			$ci->db->insert("complaint_form",$data);
			if($ci->db->affected_rows()>0){
				$response=[
					"status_code"=>200,
					"message"=>"success",
					"referenceId"=>$referenceId
				];
			}else{
				$response=[
					"status_code"=>500,
					"message"=>$ci->db->error()
				];

			}
			return $response;
			
			
		}else{
			//invalid type of issue
			$response=[
				"status_code"=>400,
				"message"=>"Please enter correct type of issue.."
			];

			return $response;
		}
	}else{
		//issue not listed in constant.php
		$response= ["status_code"=>400,"message"=>"Invalid issue .."];
		return $response;
	}

}



