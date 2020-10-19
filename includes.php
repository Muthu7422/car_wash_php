<?php 
ob_start();
ini_set('session.gc_maxlifetime', '3600');
session_start();
include("dbinfoi.php");
date_default_timezone_set("Asia/Calcutta");
//header("location:http://192.168.0.105:8080/autodetailerz/login.php");

$_SESSION['path']="http://192.168.43.199/myautocart_tidi/";
//$_SESSION['path']="http://tidi.vertexsolution.co.in";


$_SESSION['company']="TIDI - Cars & Services";
$_SESSION['title']="TIDI - Cars & Services | Admin Panel";



/*
Aqura Cars & Services
No.77A, Venkulangara Nagar, Near Kavanad Market,
Kavanad P.O,Kollam District,Kerala - 691 003

32ABOFA0679G1ZG

95624 00090

info@aqurainternational.com
*/
?>