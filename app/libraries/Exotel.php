<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require 'vendor/autoload.php';

use MVKaran\Exotel\Client;

class Exotel{



	public function call($mobile){
	$sid = "vdai5";
			$token = "d9bdb5da71d226a8e666bb0d622723192734b26d";


		$client = new Client($sid, $token);

		$result = $client->call_flow([

										'to' => $mobile,//$row2->mobile, 

										'app_id' => '213408',

										'caller_id' => '09513886363', //One of your Exophones,



										'time_limit' => '', //Optional. Can be ignored from the array itself

										'time_out' => '', //Optional. Can be ignored from the array itself

										'status_callback' => '', //Optional. Can be ignored from the array itself

										'custom_field' => '', //Optional. Can be ignored from the array itself

									]);
		return $result;
	}
}