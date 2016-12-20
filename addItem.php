<?php

/* 
Script to add an equipment in WATO 
 */

//Replace with the ip of the check_mk server
$url = "http://10.0.0.1/monitoring/check_mk/webapi.py?action=add_host";
//Replace by the name of the equipment
$name = '"name"';
//Replace by the Ip address of the equipment
$ip = '"10.0.0.2"';
//Replace by the folder name ( $folder='') if the equipment is not in a folder
$folder = ', "folder": foldername';
//tag_agent can also be "cmk-agent" 
$request = 'request={"attributes":{"tag_agent": "snmp-only", "tag_criticality": "prod", "ipaddress": ' . $ip . '}, "hostname": ' . $name . $folder .'}';
$ch = curl_init($url);

//Replace
$auth = 'username:password';
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
curl_setopt($ch, CURLOPT_USERPWD, $auth);
curl_setopt($ch, CURLOPT_POSTFIELDS, $request);
$page = curl_exec($ch);
curl_close($ch);
//Finally to apply changes use the script applyChanges.php
require 'applyChanges.php';