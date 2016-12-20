<?php
/* 
Script to delete an equipment in WATO 
 */

//Replace with the ip of the check_mk server
$url = "http://10.0.0.1/monitoring/check_mk/webapi.py?action=delete_host";
//replace with the hostname
$name = '"name"';
$request = 'request={"hostname":' . $name . '}';
$ch = curl_init($url);
//replace
$auth = 'user:password';
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
curl_setopt($ch, CURLOPT_USERPWD, $auth);
curl_setopt($ch, CURLOPT_POSTFIELDS, $request);
$page = curl_exec($ch);
curl_close($ch);
//Apply changes 
require 'applyChanges.php';