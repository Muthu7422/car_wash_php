<?php
error_reporting(0);
include("../../includes.php");
include("../../redirect.php");

$date=date('d/m/Y');
$s="select * from a_final_bill where inv_no='".$_REQUEST['inv_no']."'";
$Es=mysqli_query($conn,$s); 
$Fs=mysqli_fetch_array($Es);
$n=mysqli_num_rows($Es);
$ino=$n;

$spm="select * from m_franchisee where id='".$_SESSION['FranchiseeId']."'";
$Scm=mysqli_query($conn,$spm);
$Frp1=mysqli_fetch_array($Scm);





?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Job Card Receipt</title>
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<style>
<style type="text/css" media="print">


a.button {
    -webkit-appearance: button;
    -moz-appearance: button;
    appearance: button;
	padding-top:3px;
	padding-bottom:2px;
    padding-right:10px;
    padding-left:10px;
    text-decoration: none;
    color: initial;
}
@media print { 
table, table tr, table td { 
border-top: #000 solid 1px; 
border-bottom: #000 solid 1px; 
border-left: #000 solid 1px; 
border-right: #000 solid 1px; 
}
.tds
{
border-top: #000 solid 1px; 
border-bottom: #000 solid 1px; 
border-left: #000 solid 1px; 
border-right: #000 solid 1px; 
}
}








.style2 {font-family: Arial, Helvetica, sans-serif}
.style3 {font-size: 18px}
.style4 {font-size: 16px}
</style>
<style>
table { border-collapse: collapse; }
tr { border: none; }
td.line {
  border-right: solid 0px #000; 
  border-left: solid 0px #000;
}
table, th{
    border: 0px solid black;
}


</style>
<script>
function printDiv(divName) {

 var printContents = document.getElementById(divName).innerHTML;
 w=window.open();
 w.document.write(printContents);
 w.print();
 w.close();
}
</script>
<script>
function getIndianCurrency(float $number)
{
    $decimal = round($number - ($no = floor($number)), 2) * 100;
    $hundred = null;
    $digits_length = strlen($no);
    $i = 0;
    $str = array();
    $words = array(0 => '', 1 => 'one', 2 => 'two',
        3 => 'three', 4 => 'four', 5 => 'five', 6 => 'six',
        7 => 'seven', 8 => 'eight', 9 => 'nine',
        10 => 'ten', 11 => 'eleven', 12 => 'twelve',
        13 => 'thirteen', 14 => 'fourteen', 15 => 'fifteen',
        16 => 'sixteen', 17 => 'seventeen', 18 => 'eighteen',
        19 => 'nineteen', 20 => 'twenty', 30 => 'thirty',
        40 => 'forty', 50 => 'fifty', 60 => 'sixty',
        70 => 'seventy', 80 => 'eighty', 90 => 'ninety');
    $digits = array('', 'hundred','thousand','lakh', 'crore');
    while( $i < $digits_length ) {
        $divider = ($i == 2) ? 10 : 100;
        $number = floor($no % $divider);
        $no = floor($no / $divider);
        $i += $divider == 10 ? 1 : 2;
        if ($number) {
            $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
            $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
            $str [] = ($number < 21) ? $words[$number].' '. $digits[$counter]. $plural.' '.$hundred:$words[floor($number / 10) * 10].' '.$words[$number % 10]. ' '.$digits[$counter].$plural.' '.$hundred;
        } else $str[] = null;
    }
    $Rupees = implode('', array_reverse($str));
    $paise = ($decimal) ? "." . ($words[$decimal / 10] . " " . $words[$decimal % 10]) . ' Paise' : '';
    return ($Rupees ? $Rupees . 'Rupees ' : '') . $paise .;
}
</script>
</head>
<?php 
   $sij="select * from  a_final_bill where inv_no='".$_REQUEST['inv_no']."'";
  $Esij=mysqli_query($conn,$sij);
  $FEsij=mysqli_fetch_array($Esij); 
  
         $cus="select * from a_customer where id='".$FEsij['cname']."'";
			$spm=mysqli_query($conn,$cus);
			$epm=mysqli_fetch_array($spm);
  
  $spm1="select * from s_job_card where job_card_no='".$FEsij['job_card_no']."'";
$Scm1=mysqli_query($conn,$spm1);
$Frp11=mysqli_fetch_array($Scm1);

?>  
<body oncontextmenu="return false;">

<div id="print-content">
<table align="center" width="250" border="1"   cellpadding="3"  cellspacing="0">
  <thead>    
    <tr>
    <td align="left" width="350"><b><?PHP echo $Frp1['NonEnglish']; ?></b><br/><?PHP echo $Frp1['NonEnglishAddres']; ?><br/><?PHP echo $Frp1['con_number']; ?><br/>فات :<?PHP echo  $Frp1['gst_no']; ?><?PHP echo $Frp1['website']; ?><br/><?PHP echo $Frp1['email']; ?> </td>
 </tr>
	<tr>
      <td align="center" width="250"><b> <img src="<?php echo $_SESSION['path'];?>/iocss/logo3.jpg" alt="logo" style="width:auto;height:80px;background-color:#FFF"/> </td> 
    </tr>
  </thead>

<tbody>
<tr>
<td> 
<table align="center" width="250" border="1px"   cellpadding="3"  cellspacing="0"> 
  <tr>
     <td align="left" width="112"><b>دت  </b></td><td align="left" width="135"><b>انفوس ن  </b></td>
  </tr>
  <tr>
     <td align="left" width="112"><?php echo date("d-m-Y", strtotime($FEsij['bill_date'])); ?></td><td align="left" width="135"><?php echo $FEsij['inv_no'] ?></td>
  </tr>  	
</table>
<table align="center" width="250" border="1px"   cellpadding="3"  cellspacing="0"> 

 <tr>
    <td align="left" width="250"><b> جب كرد ن  </b><u><?php echo $FEsc['id']; ?></u></td><td align="left" width="100"><b>فيهكل ن  </b>&nbsp; &nbsp; </td>
 </tr>
 <tr>
   <td align="left" width="250"><?php echo $FEsij['job_card_no'] ?></td><td align="left" width="250"><?php echo $FEsij['cvehile'] ?></td>
 </tr>
 <tr>
 
   <td align="left" width="150"><b>كوست نايم </b></td><td align="left" width="100"><b>موبايل </b></td>  
 </tr>
 <tr>
   <td align="left" width="250"><?php echo $epm['cust_name'] ?></td><td align="left" width="250"><?php echo $FEsij['cmobile'] ?></td>
 </tr>

<tr>
   <td align="left"><b>إنتري تم </b></td>
   <td align="left" ><?php echo $Frp11['entry_time'] ?></td>
   </tr>
   <tr>
    <td align="left"><b>اكسيت تم </b></td>
   <td align="left" ><?php echo $Frp11['DeliveryTime'] ?></td>
   </tr>
 </tr>
 </table>
 <div>&nbsp;</div>
<table align="center" width="250" border="1px" cellpadding="3"  cellspacing="0">

<tr>
<td colspan="4"><span style="font-size:18px" class="style4">كستومر برفرنس</span></td>
</tr>
<br/>

<?php 

				$ab2="select * from a_final_bill where inv_no='".$_REQUEST['inv_no']."'";  
				$cp2=mysqli_query($conn,$ab2);
				$dp2=mysqli_fetch_array($cp2);

				$sinv2="select * from a_customer where id='".$dp2['cname']."' order by id desc";
				$Esinv2=mysqli_query($conn,$sinv2);
				$FEsinv2=mysqli_fetch_array($Esinv2);
				
				
				?>

<tr>
<td><span style="margin-right:10px"><input type="checkbox" <?php if($FEsinv2['typr_polish']=='1') { ?> checked="true" <?php } ?> disabled>طير بولش</span></td>
<td><span style="margin-right:10px"><input type="checkbox" <?php if($FEsinv2['db_polish']=='1') { ?> checked="true" <?php } ?> disabled>ضشبورد بولش</span></td>
<td><span style="margin-right:10px"><input type="checkbox" <?php if($FEsinv2['mat_paper']=='1') { ?> checked="true" <?php } ?> disabled>مات ببر  </span></td>
<td><span style="margin-right:10px"><input type="checkbox" <?php if($FEsinv2['e_water_wash']=='1') { ?> checked="true" <?php } ?> disabled>انجن وتر وش</span></td>

</tr>
</table>
<table align="center" width="250" border="1px"   cellpadding="3"  cellspacing="0" >  

 <tr>

   <td align="left" ><b>S.No </b></td><td align="left" width="250"><b>Service Types </b></td><td align="left" width="350"><b>Service Amount </b></td>
 </tr>
  <?php 
  $i=0;
     $sij1="select * from  s_job_card_sdetails where job_card_no='".$_REQUEST['JobcardId']."'";
  $Esij1=mysqli_query($conn,$sij1);
 while($FEsij1=mysqli_fetch_array($Esij1)){
	 
	  $cus1="select * from m_service_type where stype='".$FEsij1['service_type']."'";
			$spm1=mysqli_query($conn,$cus1);
			$epm1=mysqli_fetch_array($spm1);
	 $i++;
	 ?>
 <tr>
 <td>  <?php echo $i;?> </td>
 <td align="left" width="250"><?php echo $epm1['NonEnglish'] ?></td><td align="left" width="250"><?php echo $FEsij1['st_amt']  ?></td>
 </tr>
 
  <?php } ?>
</table>

<div>&nbsp;</div>
<table align="center" width="250" border="1px"   cellpadding="3"  cellspacing="0">  
  <tr>
    <td align="left" width="150"><b>أمنت  </b></td><td align="right" width="250"><b><?PHP echo number_format($FEsij['TotalServiceAmount'],2); ?></b></td>
  </tr>
  <tr>
    <td align="left" width="100"><b>ديسكونت أمنت  </b></td><td align="right" width="250"><b><?PHP echo $FEsij['discount']; ?></b></td>
  </tr>
  <tr>
    <td align="left" width="100"><b>فات % </b></td><td align="right" width="250"><b><?PHP echo $FEsij['gst']; ?></b></td>
	
  </tr>
  
  <tr>
    <td align="left" width="100"><b>توتال أمنت  </b></td><td align="right" width="250"><b><?PHP echo number_format($FEsij['Total_bill_Amount'],2); ?></b></td>
  </tr>
  <tr>
    <td align="left" width="100"><b>بلنس أمنت </b></td><td align="right" width="250"><b><?PHP echo number_format($FEsij['bal_amt'],2); ?></b></td>
  </tr>
</table>
</td>
</tr>
<?php if($Frp11['jcard_status']=='Close'){?>
<table align="center" width="700" border="1px"   cellpadding="3"  cellspacing="0">
  <h4 align="center"><input type="button" name="print" value="برنت " onClick="printDiv('print-content')" />&nbsp;&nbsp;&nbsp;<a href="../../services/job_card/s_jobcard_view_close.php" class="button style2">قلص </a></h4>
</table>
<?php }
else if($Frp11['jcard_status']=='Finished'){
?>
<table align="center" width="700" border="1px"   cellpadding="3"  cellspacing="0">
  <h4 align="center"><input type="button" name="print" value="برنت " onClick="printDiv('print-content')" />&nbsp;&nbsp;&nbsp;<a href="../../services/job_card/s_jobcard_view.php" class="button style2">قلص </a></h4>
</table>
<?php }?>
<table align="center" width="700" border="0"   cellpadding="3"  cellspacing="0">
 <tr><td colspan="2"><div style="text-align:center;"><?PHP echo $Frp1['website']; ?> | <?PHP echo $Frp1['email']; ?> </div></td></tr>
</table>

</tbody>
</table>
</div>
</body>
</html>
