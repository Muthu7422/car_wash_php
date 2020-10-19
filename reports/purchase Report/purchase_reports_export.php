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
$filename = 'Purchase Report From_'.date("d-m-Y",strtotime($_REQUEST['from'])).' To_'.date("d-m-Y",strtotime($_REQUEST['to'])).' .xls';
header('Content-Disposition: attachment; filename='.$filename);

?>
<body>
  <table  class="table table-bordered table-striped">
             <thead>
                <tr>
                  <th width="4px">S.No</th>
                  <th width="40px">Bill No</th>
				  <th width="60px">Date</th>
				  <th width="100px">Customer Name</th>
				  <th width="80px">Vehicle No</th>
				  <th width="170px">Services</th>
				   <th>Package & Include Services</th>
				   <th>Mode of Pay</th>
				   <th>Bill Amount</th>
                </tr>
                </thead>
 <tbody>
				<?php
				if(isset($_REQUEST['from']))
				{
				$i=0;
			     $ct="select * from a_final_bill where bill_date between '".trim($_REQUEST['from'])."' and '".trim($_REQUEST['to'])."' and FrachiseeId='".trim($_SESSION['BranchId'])."'"; 
				$Ect=mysqli_query($conn,$ct);
				while($Fct=mysqli_fetch_array($Ect))
				{
					
				$job="select * from s_job_card where job_card_no='".$Fct['job_card_no']."'"; 
				$jobs=mysqli_query($conn,$job);
				$jobf=mysqli_fetch_array($jobs);
			
				
				
				$na="select * from a_customer where id='".trim($Fct['cname'])."'";
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
				 $i++;
				?>
                <tr>
                  <td align="center"><?php echo $i;  ?></td>
                  <td align="center"><?php echo $Fct['inv_no']; ?></td>
				  <td align="center"><?php echo date("d-m-Y",strtotime($Fct['bill_date']));  ?></td>
				  <td align="center"><?php echo $naf['cust_name'];  ?></td>
				  <td align="center"><?php echo $Fct['cvehile'];  ?></td>
				  <td align="center"><?php echo $servicef['service_type'];  ?></td>
				   <td><span style="color:red"><b> <?php echo $FEssc['PackageName'];  ?> : </b></span><?php echo $snf['Service'];  ?></td>
				      <td align="center"><?php echo $Fct['ptype']; ?></td>
					   <td align="center"><?php echo $Fct['Total_bill_Amount']; ?></td>
				  
                </tr>
				<?php
				}
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