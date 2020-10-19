<?php
include("../../includes.php");
include("../../redirect.php");
/*
$dem="select * from s_job_card where jdate between '".$_REQUEST['from']."' and '".$_REQUEST['to']."' and status='Active' and FranchiseeId='".$_SESSION['FranchiseeId']."' and jcard_status='Close'";
$dom=mysql_query($dem);
while($dcm=mysql_fetch_array($dom))
{

$pqr="select * from s_job_card_pdetails where job_card_no='".$dcm['id']."'";
$pqrs=mysql_query($pqr);
$poq=mysql_fetch_array($pqrs);

$spm="select * from s_job_card_sdetails where job_card_no='".$dcm['id']."'";
$dqp=mysql_query($spm);
$ids=mysql_fetch_array($dqp);
}
*/
$SQL = "select * from s_job_card where jdate between '".$_REQUEST['from']."' and '".$_REQUEST['to']."' and status='Active' and FranchiseeId='".$_SESSION['FranchiseeId']."' and jcard_status='Close'";
$header = '';
$result ='';
$exportData = mysql_query ($SQL ) or die ( "Sql error : " . mysql_error( ) );

$fields = mysql_num_fields ( $exportData );
 
for ( $i = 0; $i < $fields; $i++ )
{
    $header .= mysql_field_name( $exportData , $i ) . "\t";
}
 
while( $row = mysql_fetch_row( $exportData ) )
{
    $line = '';
    foreach( $row as $value )
    {                                            
        if ( ( !isset( $value ) ) || ( $value == "" ) )
        {
            $value = "\t";
        }
        else
        {
            $value = str_replace( '"' , '""' , $value );
            $value = '"' . $value . '"' . "\t";
        }
        $line .= $value;
    }
    $result .= trim( $line ) . "\n";
}
$result = str_replace( "\r" , "" , $result );
 
if ( $result == "" )
{
    $result = "\nNo Record(s) Found!\n";                        
}
 
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=export.xls");
header("Pragma: no-cache");
header("Expires: 0");
print "$header\n$result";

$dem="select * from s_job_card where jdate between '".$_REQUEST['from']."' and '".$_REQUEST['to']."' and status='Active' and FranchiseeId='".$_SESSION['FranchiseeId']."' and jcard_status='Close'";
$dom=mysql_query($dem);
while($dcm=mysql_fetch_array($dom))
{

$pqr="select * from s_job_card_pdetails where job_card_no='".$dcm['id']."'";
$pqrs=mysql_query($pqr);
$poq=mysql_fetch_array($pqrs);


 
$SQL = "select * from s_job_card_pdetails where job_card_no='".$dcm['id']."'";
$header = '';
$result ='';
$exportData = mysql_query ($SQL ) or die ( "Sql error : " . mysql_error( ) );
 
$fields = mysql_num_fields ( $exportData );
 
for ( $i = 0; $i < $fields; $i++ )
{
    $header .= mysql_field_name( $exportData , $i ) . "\t";
}
 
while( $row = mysql_fetch_row( $exportData ) )
{
    $line = '';
    foreach( $row as $value )
    {                                            
        if ( ( !isset( $value ) ) || ( $value == "" ) )
        {
            $value = "\t";
        }
        else
        {
            $value = str_replace( '"' , '""' , $value );
            $value = '"' . $value . '"' . "\t";
        }
        $line .= $value;
    }
    $result .= trim( $line ) . "\n";
}
$result = str_replace( "\r" , "" , $result );
 
if ( $result == "" )
{
    $result = "\nNo Record(s) Found!\n";                        
}
}
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=export.xls");
header("Pragma: no-cache");
header("Expires: 0");
print "$header\n$result";

$dem="select * from s_job_card where jdate between '".$_REQUEST['from']."' and '".$_REQUEST['to']."' and status='Active' and FranchiseeId='".$_SESSION['FranchiseeId']."' and jcard_status='Close'";
$dom=mysql_query($dem);
while($dcm=mysql_fetch_array($dom))
{

$pqr="select * from s_job_card_pdetails where job_card_no='".$dcm['id']."'";
$pqrs=mysql_query($pqr);
$poq=mysql_fetch_array($pqrs);

 $SQL = "select * from s_job_card_sdetails where job_card_no='".$dcm['id']."'"; 
$header = '';
$result ='';
$exportData = mysql_query ($SQL ) or die ( "Sql error : " . mysql_error( ) );
 
$fields = mysql_num_fields ( $exportData );
 
for ( $i = 0; $i < $fields; $i++ )
{
    $header .= mysql_field_name( $exportData , $i ) . "\t";
}
 
while( $row = mysql_fetch_row( $exportData ) )
{
    $line = '';
    foreach( $row as $value )
    {                                            
        if ( ( !isset( $value ) ) || ( $value == "" ) )
        {
            $value = "\t";
        }
        else
        {
            $value = str_replace( '"' , '""' , $value );
            $value = '"' . $value . '"' . "\t";
        }
        $line .= $value;
    }
    $result .= trim( $line ) . "\n";
}
$result = str_replace( "\r" , "" , $result );
 
if ( $result == "" )
{
    $result = "\nNo Record(s) Found!\n";                        
}
}
 
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=export.xls");
header("Pragma: no-cache");
header("Expires: 0");
print "$header\n$result";
?>