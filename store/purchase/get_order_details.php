<?php
//error_reporting(0);
ob_start();
include("../../includes.php");
//include("../../redirect.php");
?>
<!DOCTYPE html>
<html>
<head>
<style>
table {
    width: 100%;
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid black;
    padding: 5px;
}

th {text-align: left;}
</style>
</head>
<body>

<?php
//$_GET['q'];
$ip=$_GET['q'];


              $ss="select * from  s_purchase_order where inv_no='".trim($ip)."'";
				$Ess=mysqli_query($conn,$ss);

echo "<table>
  <tr>
				  <th>SL NO</th>
                  <th>SUPPLIER</th>
				  <th>BRAND</th>
				  <th>SPARE</th>
				  <th>P.NO</th>
				  <th>UNIT</th>
				 
				  <th>P.RATE</th>
				  <th>QTY</th>
				  <th>AMOUNT</th>
				  <th>DISCOUNT</th>
				  <th>TAXABLE VALUE</th>
				   <th>GST</th>
				    <th>TOTAL</th>
				    <th>EDIT</th>
				 
                </tr>";
				$i=0;
				while($FEss=mysqli_fetch_array($Ess))
				{
					
					$echeck3="select * from s_purchase_order_details where inv_no='".$FEss['id']."' and status='Active'"; 
       $echk3=mysqli_query($conn,$echeck3);
       while($ecount3=mysqli_fetch_array($echk3)){
	   $i++;
				 	 $sdm="select * from m_spare_brand where sid='".$ecount3['spare_brand']."'"; 
					$scm=mysqli_query($conn,$sdm);
					$pqr=mysqli_fetch_array($scm);
					
					$sdm2="select * from m_spare where sid='".$ecount3['spare_name']."'"; 
					$scm2=mysqli_query($conn,$sdm2);
					$pqr2=mysqli_fetch_array($scm2);
					
					$sdm1="select * from m_supplier where sid='".$FEss['supplier_name']."'"; 
					$scm1=mysqli_query($conn,$sdm1);
					$pqr1=mysqli_fetch_array($scm1);
					
					 $ses="select * from m_unit_master where id='".$ecount3['unit']."'";
					$arrs=mysqli_query($conn,$ses);
					$spms=mysqli_fetch_array($arrs);
					$rtr=$FEss['total']-$ecount3['discount_amt'];
    echo "<tr>";
    echo "<td>" . $i . "</td>";
    echo "<td>" . $pqr1['sname'] . "</td>";
    echo "<td>" . $pqr['sbrand'] . "</td>";
    echo "<td>" . $pqr2['sname'] . "</td>";
    echo "<td>" . $ecount3['spare_part_no'] . "</td>";
    echo "<td>" . $spms['u_name'] . "</td>";
    echo "<td>" . $ecount3['mrp'] . "</td>";
    echo "<td>" . $ecount3['qty'] . "</td>";
    echo "<td>" . $ecount3['total'] . "</td>";
    echo "<td>" . $ecount3['discount_per'] . "</td>";
    echo "<td>" . number_format($rtr,2) . "</td>";
    echo "<td>" .$ecount3['gst_amt'] . "</td>";
    echo "<td>" . $ecount3['total'] . "</td>";
    echo "<td><a href=purchase_popup.php?id=" . $ecount3['id'] . ">EDIT</a></td>";
 
   echo "</tr>";
}
}
echo "</table>";
mysqli_close($conn);
?>
</body>
</html>




