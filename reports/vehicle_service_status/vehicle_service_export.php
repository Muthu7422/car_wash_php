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
$filename = 'Vehicle Service Status Report From_'.date("d-m-Y",strtotime($_REQUEST['from'])).' To_'.date("d-m-Y",strtotime($_REQUEST['to'])).' .xls';
header('Content-Disposition: attachment; filename='.$filename);

?>
<body>
  <table  class="table table-bordered table-striped">
                <thead>
				<tr>&nbsp;</tr>
			 <tr><h3>Company Name : <?php echo $_SESSION['company']?></h3></tr>
				 <tr><h4><?php echo $_REQUEST['jcard_status'];?> Service Report From  <?php echo date("d-m-Y",strtotime($_REQUEST['from']));?> To  <?php echo date("d-m-Y",strtotime($_REQUEST['to']));?> </h4></tr>
				<tr>
				  <th>S.No</th>
                  <th>Job Card Number</th>
				  <th>Customer Name</th>
				  <th>Vehicle Number</th>
				   <th>Mobile</th>
				  <th>Amount</th>
				  
				  </tr>
                </thead>
                <tbody>
				<?php
				$fdate=$_REQUEST['from'];
				$tdate=$_REQUEST['to'];
				$i=0;
			   
			    $ss="select * from s_job_card where jcard_status='".$_REQUEST["ServiceStatus"]."' and jdate between '$fdate' and '$tdate' and FranchiseeId='".$_SESSION['BranchId']."' order by id desc";
				
				$Ess=mysqli_query($conn,$ss);
				while($FEss=mysqli_fetch_array($Ess))
				{
					$i++;
				?>
              
                <tr>
                  <td><?php echo $i;  ?></td>
                  <td><?php echo $FEss['job_card_no']; ?></td>
				  <td><?php echo $FEss['sname']; ?></td>
				  <td><?php echo $FEss['vehicle_no'];  ?></td>
				  <td><?php echo $FEss['smobile']; ?></td>
				  <td><?php echo $FEss['total_amt']; ?></td>
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