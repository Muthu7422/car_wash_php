<!DOCTYPE html>
<html>
<?php
include("../../includes.php");
include("../../redirect.php");
if($_POST['CustomerMobileNoex']!='')
{
$dsa="select * from a_customer where mobile1='".$_POST['CustomerMobileNoex']."'";
}
else
{
$dsa="select * from a_customer_vehicle_details where vehicle_no='".$_POST['CustomerVehicleNoex']."'";
}
$cx=mysqli_query($conn,$dsa);
$ids=mysqli_fetch_array($cx);

if($_POST['CustomerMobileNoex']!='')
{
	$abc=$ids['id'];
}
else
{
	$abc=$ids['cust_no'];
}

$ds11="select * from a_customer where id='".$abc."'";
						$fc11=mysqli_query($conn,$ds11);
						$dxs11=mysqli_fetch_array($fc11);

$date=date('d/m/Y');
if(isset($_POST['export']))
{
header('Content-type: application/excel');
$filename = 'Customer Details Report for '.$dxs11['cust_name'].'-'.$date.'.xls';
header('Content-Disposition: attachment; filename='.$filename);

?>
<body>
  <table  class="table table-bordered table-striped">
                <thead>
				<tr>&nbsp;</tr>
			 <tr><h3>Company Name : <?php echo $_SESSION['company']?></h3></tr>
				 <tr><h4>Customer Details Report for : <?php echo $dxs11['cust_name'];?> </h4></tr>
				



              <tr>
                <th>S.No</th>
				<th> Name</th>
                <th> Phone No</th>
				<th> Address</th>
				<th> Secondary Mobile No</th>
				<th>Vehicle No</th>
				<th>Vehicle Brand</th>
				<th>Vehicle Model</th>
				<th>Vehicle Segment</th>
				<th>Vehicle Type</th>
				<th>Year</th>
				<th>Insurance Company</th>
				<th>Insurance Number</th>
				<th>Insurance Expiry Date</th>
				  </tr>
                </thead>
                <tbody>
				<?php
				$i=0;
				 $sco="select * from a_customer JOIN a_customer_vehicle_details on a_customer.id=a_customer_vehicle_details.cust_no where a_customer.id='".$abc."'";
				 $Esco=mysqli_query($conn,$sco);
				while($FEsco=mysqli_fetch_array($Esco))
				{
						$ds="select * from master_vehicle where id='".$FEsco['VehicleModel']."'";
						$fc=mysqli_query($conn,$ds);
						$dxs=mysqli_fetch_array($fc);
				 $i++;
				?>
                <tr>
                  <td><?php echo $i;  ?></td>
				  <td><?php echo $FEsco['cust_name']; ?></td>
				  <td><?php echo $FEsco['mobile1'];  ?></td>
				  <td><?php echo $FEsco['addr']; ?></td>
                  <td><?php echo $FEsco['mobile2']; ?></td>
				  <td><?php echo $FEsco['vehicle_no']; ?></td>
				  <td><?php echo $FEsco['VehicleBrand'];  ?></td>
				  <td><?php echo $dxs['VehicleModel'];  ?></td>
                  <td><?php echo $FEsco['VehicleSegment']; ?></td>
				  <td><?php echo $FEsco['VehicleType']; ?></td>
				  <td><?php echo $FEsco['Year'];  ?></td>
				  <td><?php echo $FEsco['InsuranceCompnayName']; ?></td>
				  <td><?php echo $FEsco['InsuranceNumber']; ?></td>
				  <td><?php echo date("d-m-Y",strtotime($FEsco['InsuranceNumberExpiryDate']));  ?></td>
                </tr>
				<?php				
			      }				
				?>
                  </tbody>                
              </table>
        </div>
		
		
		
	 <div class="box-body ">
              <table border="1"  class="table">
				<thead>                
                <b> Customer Jobcard Details</b>
                </thead>
			<thead>
              <tr>
                <th>S.No</th>
				<th>Jobcard No</th>
                <th>Jobcard Date</th>
				<th>Total Service Amount</th>
				<th>GST</th>
				<th>Discount Amount</th>
				<th>Bill Amount</th>
				<th>Delivery Date</th>
				<th>Service Advisor</th>
				<th>Technician Name</th>
				  </tr>
                </thead>
                <tbody>
				<?php
				$i=0;
				 $sco="select * from  s_job_card where customer_id='".$abc."' and FranchiseeId='".$_SESSION['BranchId']."'";
				 $Esco=mysqli_query($conn,$sco);
				while($FEsco=mysqli_fetch_array($Esco))
				{
						
				 $i++;
				?>
                <tr>
                  <td><?php echo $i;  ?></td>
				  <td><?php echo $FEsco['job_card_no']; ?></td>
				  <td><?php echo date("d-m-Y", strtotime($FEsco['jdate']));  ?></td>
				  <td><?php echo $FEsco['total_amt']; ?></td>
                  <td><?php echo $FEsco['gst']; ?></td>
				  <td><?php echo $FEsco['DiscountAmount']; ?></td>
				  <td><?php echo $FEsco['BalanceAmount'];  ?></td>
				  <td><?php echo date("d-m-Y",strtotime($FEsco['DeliveryDate']));  ?></td>
                  <td><?php echo $FEsco['ServiceAdvisor']; ?></td>
				  <td><?php echo $FEsco['TechnicianName']; ?></td>
                </tr>
				<?php				
			      }				
				?>
		
                  </tbody>                
              </table>
    </div>
	
	
	
		 <div class="box-body ">
              <table border="1"  class="table">
				<thead>                
                <b> Customer Total Package Details</b>
                </thead>
			<thead>
              <tr>
                <th>S.No</th>
				<th>Jobcard No</th>
                <th>Bill No</th>
				<th>Bill Date</th>
				<th>Package Name</th>
				  </tr>
                </thead>
                <tbody>
				<?php
				$i=0;
				 $sco="select * from  a_final_bill where cname='".$abc."'";
				 $Esco=mysqli_query($conn,$sco);
				while($FEsco=mysqli_fetch_array($Esco))
				{
					   $sco1="select * from  s_job_card where job_card_no='".$FEsco['job_card_no']."'";
				     $Esco1=mysqli_query($conn,$sco1);
			         $FEsco1=mysqli_fetch_array($Esco1);
						
						$ds="select * from s_job_card_pdetails where job_card_no='".$FEsco1['id']."'"; 
						$cp=mysqli_query($conn,$ds);
						while($sdo=mysqli_fetch_array($cp))
						{
				 $i++;
				?>
                <tr>
                  <td><?php echo $i;  ?></td>
				  <td><?php echo $FEsco1['job_card_no']; ?></td>
				  <td><?php echo $FEsco['inv_no'];  ?></td>
				  <td><?php echo date("d-m-Y", strtotime($FEsco['bill_date'])); ?></td>
                  <td><?php echo $sdo['package_type']; ?></td>
                </tr>
				<?php				
			      }		
				}				  
				?>
			
                  </tbody>                
              </table>
        </div>
		
		
		
			 <div class="box-body ">
              <table border="1"  class="table">
				<thead>                
                <b> Customer Total Service Details</b>
                </thead>
			<thead>
              <tr>
                <th>S.No</th>
				<th>Jobcard No</th>
                <th>Bill No</th>
				<th>Bill Date</th>
				<th>Service Name</th>
				  </tr>
                </thead>
                <tbody>
				<?php
				$i=0;
				 $sco="select * from  a_final_bill where cname='".$abc."'";
				 $Esco=mysqli_query($conn,$sco);
				while($FEsco=mysqli_fetch_array($Esco))
				{
					
					 $sco2="select * from  s_job_card where job_card_no='".$FEsco['job_card_no']."'";
				     $Esco2=mysqli_query($conn,$sco2);
			         $FEsco2=mysqli_fetch_array($Esco2);
				
					    $ds="select * from s_job_card_sdetails where job_card_no='".$FEsco2['id']."'"; 
						$cp=mysqli_query($conn,$ds);
						while($sdo=mysqli_fetch_array($cp))
						{
				 $i++;
				?>
                <tr>
                  <td><?php echo $i;  ?></td>
				  <td><?php echo $FEsco['job_card_no']; ?></td>
				  <td><?php echo $FEsco['inv_no'];  ?></td>
				  <td><?php echo date("d-m-Y",strtotime($FEsco['bill_date'])); ?></td>
                  <td><?php echo $sdo['service_type']; ?></td>
                </tr>
				<?php				
			      }		
}				  
				?>
			
                  </tbody>                
              </table>
            </div>
			
			
			
		 <div class="box-body ">
              <table border="1"  class="table">
				<thead>                
               <b> Refered By <?php echo $ids['cust_name']; ?></b>
                </thead>
			<thead>
              <tr>
                <th>S.No</th>
				<th>Customer Name</th>
				<th>Discount Amount</th>
                <th>Bill No</th>
				<th>Bill Date</th>
				  </tr>
                </thead>
                <tbody>
				<?php
				$i=0;
				 $sco="select * from  s_job_card where customer_id='".$abc."'"; 
				 $Esco=mysqli_query($conn,$sco);
				while($FEsco=mysqli_fetch_array($Esco))
				{
						$ds="select * from a_customer where id='".$FEsco['ReferencedMobileNo']."'"; 
						$cp=mysqli_query($conn,$ds);
						$sdo=mysqli_fetch_array($cp);
						if($sdo['cust_name']!='')
						{
							$customer=$sdo['cust_name'];
							$Discount=$FEsco['DiscountAmount'];
						
				 $i++;
				?>
                <tr>
                  <td><?php echo $i;  ?></td>
				  <td><?php echo $customer; ?></td>
				  <td><?php echo $Discount; ?></td>
				  <td><?php echo $FEsco['job_card_no'];  ?></td>
				  <td><?php echo date("d-m-Y",strtotime($FEsco['jdate'])); ?></td>
                </tr>
				<?php				
			      }		
				}

				?>
			
                  </tbody>                
              </table>
        </div>
		
		
		
			 <div class="box-body ">
              <table border="1"  class="table">
				<thead>                
              <b>  Refered From</b>
                </thead>
			<thead>
              <tr>
                <th>S.No</th>
				<th>Customer Name</th>
				<th>Discount Amount</th>
                <th>Bill No</th>
				<th>Bill Date</th>
				  </tr>
                </thead>
                <tbody>
				<?php
				$i=0;
				  $sco="select * from  s_job_card where ReferencedMobileNo='".$abc."'"; 
				 $Esco=mysqli_query($conn,$sco);
				while($FEsco=mysqli_fetch_array($Esco))
				{
						$ds="select * from a_customer where id='".$FEsco['customer_id']."'";
						$cp=mysqli_query($conn,$ds);
						$sdo=mysqli_fetch_array($cp);
						
				 $i++;
				?>
                <tr>
                  <td><?php echo $i;  ?></td>
				  <td><?php echo $sdo['cust_name']; ?></td>
				  <td><?php echo $FEsco['DiscountAmount']; ?></td>
				  <td><?php echo $FEsco['job_card_no'];  ?></td>
				  <td><?php echo date("d-m-Y",strtotime($FEsco['jdate'])); ?></td>
                </tr>
				<?php				
			      }		

				?>
			
                 </tbody>
               
              </table>
</body>


<?php
 }


?>
</html>