<?php 
ini_set('session.gc_maxlifetime', '3600');
session_start();

include("dbinfoi.php");
date_default_timezone_set("Asia/Calcutta");


$_SESSION['path']="http://tididemo.vertexsolution.co.in";
// $_SESSION['path']="http://192.168.0.102/Protouch/";
$_SESSION['company']="Tidi";
$_SESSION['title']="Tidi | Admin Panel";


?>