<!DOCTYPE html>
<html>

<head>
    <!--[if gte mso 9]>
    <xml>
        <x:ExcelWorkbook>
            <x:ExcelWorksheets>
                <x:ExcelWorksheet>
                    <x:Name>Sheet 1</x:Name>
                    <x:WorksheetOptions>
                        <x:Print>
                            <x:ValidPrinterInfo/>
                        </x:Print>
                    </x:WorksheetOptions>
                </x:ExcelWorksheet>
            </x:ExcelWorksheets>
        </x:ExcelWorkbook>
    </xml>
    <![endif]-->
</head>


<?php
include("../../includes.php");
include("../../redirect.php");
$date=date('d/m/Y');
if(isset($_POST['export']))
{
header('Content-type: application/excel');
$filename = 'Overall_Report From_'.date("d-m-Y",strtotime($_REQUEST['from'])).' To_'.date("d-m-Y",strtotime($_REQUEST['to'])).' .xls';
header('Content-Disposition: attachment; filename='.$filename);

?>
<body>
  <table  class="table table-bordered table-striped">
                <thead>
				<tr>&nbsp;</tr>
			 <tr><h3>Company Name : <?php echo $_SESSION['company']?></h3></tr>
				 <tr><h4>Overall Final Bill Report From  <?php echo date("d-m-Y",strtotime($_REQUEST['from']));?> To  <?php echo date("d-m-Y",strtotime($_REQUEST['to']));?> </h4></tr>
				<tr>
				<th>S.No</th>
                  <th>Bill No</th>
				  <th>Date</th>
				  <th>Customer Name</th>
				  <th>Vehicle No</th>
				  <th>Services</th>
				   <th>Package & Include Services</th>
				   <th>Mode of Pay</th>
				   <th>Bill Amount</th>
                </tr>
                </thead>
                <tbody>
				
   <?php
				
				$i=0;
			     $ct="select * from a_final_bill where bill_date between '".$_REQUEST['from']."' and '".$_REQUEST['to']."'"; 
				$Ect=mysqli_query($conn,$ct);
				while($Fct=mysqli_fetch_array($Ect))
				{
					 $i++;
					 $job="select * from s_job_card where job_card_no='".$Fct['job_card_no']."'"; 
					$jobs=mysqli_query($conn,$job);
			$jobf=mysqli_fetch_array($jobs);
			
				
				
				 $na="select * from a_customer where id='". $Fct['cname']."'";
				$naq=mysqli_query($conn,$na);
				$naf=mysqli_fetch_array($naq);
				
				
	           $service="select GROUP_CONCAT(service_type) as service_type FROM s_job_card_sdetails WHERE job_card_no='".$jobf['id']."'";
				$serviceq=mysqli_query($conn,$service);
			   $servicef=mysqli_fetch_array($serviceq);
			   
				
				
				 $ssc="select DISTINCT(PackageName) AS PackageName from s_job_card_package_service_details where job_card_no='".$Fct['job_card_no']."'";
				  $Essc=mysqli_query($conn,$ssc);
				$FEssc=mysqli_fetch_array($Essc);
				 
					
			      $sn="select GROUP_CONCAT(service) AS Service from s_job_card_package_service_details where job_card_no='".$Fct['job_card_no']."' and PackageName='".$FEssc['PackageName']."'";
				$snq=mysqli_query($conn,$sn);
				$snf=mysqli_fetch_array($snq);
				//if($servicef['service_type']!='' or $FEssc['PackageName']!='')
					if(1==1)
				{
				
				?>
                <tr>
                  <td><?php echo $i;  ?></td>
                  <td><?php echo $Fct['inv_no']; ?></td>
				  <td><?php echo date("d-m-Y",strtotime($Fct['bill_date']));  ?></td>
				  <td><?php echo $naf['cust_name'];  ?></td>
				  <td><?php echo $Fct['cvehile'];  ?></td>
				  <td><?php echo $servicef['service_type'];  ?></td>
				   <td><span style="color:red"><b> <?php echo $FEssc['PackageName'];  ?> : </b></span><?php echo $snf['Service'];  ?></td>
				      <td><?php echo $Fct['ptype']; ?></td>
					   <td><?php echo $Fct['Total_bill_Amount']; ?></td>
				  
                </tr>
				<?php
				}
				}
				?>
                  </tbody>
               
              </table>
</body>


<?php
 }


?>
</html>