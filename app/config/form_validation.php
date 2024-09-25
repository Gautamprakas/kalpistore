<?php

$config = [
              
              "login" => [
                 
                    [
                        "field" => "username",
	                    "label" => "User Name",
	                    "rules" => "required|alpha_numeric|trim" 
                    ],
                    [
                        "field" => "password",
	                    "label" => "Password",
	                    "rules" => "required|alpha_numeric" 
                    ]
              ]

];


$config['error_prefix'] = '<div  style="color:red;font-size:80%;">';
$config['error_suffix'] = '</div>';