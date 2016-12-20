<?php
/* 
Script to apply changes in WATO 
 */

//Replace with the ip of the check_mk server
$url2 = "http://10.0.0.1/monitoring/check_mk/webapi.py?action=activate_changes&mode=all";
$ch2 = curl_init($url2);
//Replace
$auth2 = 'user:password';
curl_setopt($ch2, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch2, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
curl_setopt($ch2, CURLOPT_USERPWD, $auth2);
$page2 = curl_exec($ch2);
curl_close($ch2);
