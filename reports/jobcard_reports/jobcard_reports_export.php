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
$filename = 'Job Card Report From_'.date("d-m-Y",strtotime($_REQUEST['from'])).' To_'.date("d-m-Y",strtotime($_REQUEST['to'])).' .xls';
header('Content-Disposition: attachment; filename='.$filename);

?>
<body>
  <table  class="table table-bordered table-striped">
                <thead>
				<tr>&nbsp;</tr>
			 <tr><h3>Company Name : <?php echo $_SESSION['company']?></h3></tr>
				 <tr><h4><?php echo $_REQUEST['Status'];?> Final Bill Report From  <?php echo date("d-m-Y",strtotime($_REQUEST['from']));?> To  <?php echo date("d-m-Y",strtotime($_REQUEST['to']));?> </h4></tr>
				<tr>
				  <th>Sl No</th>
				   <th>Job Card No</th>
				    <th>Date</th>
                  <th>Vehicle No</th>
				  <th>Customer Name</th>
				  <th>Mobile</th>
				   <th>No Of Visits</th>
					<th>Services </th>
				   <th>Package & Include Services</th>
                </tr>
                </thead>
                <tbody>
				
  <?php
					if(isset($_REQUEST['from']))
				{
				$i=0;
				if($_REQUEST['Status']=='All')
				{
				 $ss="select * from s_job_card where jdate between '".$_REQUEST['from']."' and '".$_REQUEST['to']."' and status='Active' and FranchiseeId='".$_SESSION['BranchId']."'";
				}
				if($_REQUEST['Status']=='Close')
				{
					$ss="select * from s_job_card where jdate between '".$_REQUEST['from']."' and '".$_REQUEST['to']."' and status='Active' and FranchiseeId='".$_SESSION['BranchId']."' and jcard_status='Close'";
				}
				if($_REQUEST['Status']=='Open')
				{
					$ss="select * from s_job_card where jdate between '".$_REQUEST['from']."' and '".$_REQUEST['to']."' and status='Active' and FranchiseeId='".$_SESSION['BranchId']."' and jcard_status='Open'";
				}
				
				$Ess=mysqli_query($conn,$ss);
				$i=0;
				while($FEss=mysqli_fetch_array($Ess))
				{
					 $nv="select * from s_job_card where (jdate between '".$_REQUEST['from']."' and '".$_REQUEST['to']."') and smobile like '%".trim($FEss['smobile'])."%' and jcard_status='".$FEss['jcard_status']."'"; 
					 $tnv=mysqli_query($conn,$nv);
					 $tnvf=mysqli_fetch_array($tnv);
					 $nor=mysqli_num_rows($tnv);
					 
					 
					 $service="select GROUP_CONCAT(service_type) as service_type FROM s_job_card_sdetails WHERE job_card_no='".$FEss['id']."'";
				$serviceq=mysqli_query($conn,$service);
				$servicef=mysqli_fetch_array($serviceq);
			   				 
				$ssc="select DISTINCT(PackageName) AS PackageName from s_job_card_package_service_details where job_card_no='".$FEss['job_card_no']."'";
				$Essc=mysqli_query($conn,$ssc);
				$FEssc=mysqli_fetch_array($Essc);				 
					
			    $sn="select GROUP_CONCAT(service) AS Service from s_job_card_package_service_details where job_card_no='".$FEss['job_card_no']."' and PackageName='".$FEssc['PackageName']."'";
				$snq=mysqli_query($conn,$sn);
				$snf=mysqli_fetch_array($snq);
					 
					 
					$i++;
				?>
                <tr>
                  <td><?php echo $i;?></td>
                  <td><?php echo $FEss['job_card_no'];?></td>
				  <td><?php echo date("d-m-Y",strtotime($FEss['jdate']));?></td>
				  <td><?php echo $FEss['vehicle_no'];?></td>
				  <td><?php echo $FEss['sname'];?></td>
				  <td><?php echo $FEss['smobile'];?></td>
				   <td><?php echo $nor;?></td>
				   <td><?php echo $servicef['service_type'];  ?></td>
				  <td><span style="color:red"><b> <?php echo $FEssc['PackageName'];  ?> : </b></span><?php echo $snf['Service'];  ?></td>
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