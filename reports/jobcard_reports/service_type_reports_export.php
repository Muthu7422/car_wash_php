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
  <table id="example1" class="table table-bordered table-striped" width="100%">
                <thead>
                <tr>
				  <th>Sl No</th>
				  <th>Job Card No</th>
				  <th>Date</th>
                  <th>Vehicle No</th>
				  <th>Customer Name</th>
				  <th>Mobile</th>
				  <th>Print</th>
				  <th >Bill Rs.</th>
				  <th>Cost Rs.</th>	
				<th>Gross Margin</th>	
                </tr>
                </thead>
                <tbody>
				<?php
				// SELECT t1.*,t2.id as jid ,t2.job_card_no as jjcno,t2.vehicle_no as jvno,t2.smobile,t2.sname FROM s_job_card_sdetails t1 LEFT JOIN s_job_card t2 ON t1.job_card_no=t2.id where t1.ServiceId='0'
				if(isset($_REQUEST['Stype']))
				{
				$i=0;
				if($_REQUEST['Stype']=='All')
				{
				 $ss="SELECT t1.*,t2.id as jid ,t2.job_card_no as jjcno,t2.vehicle_no as jvno,t2.smobile,t2.sname,t2.job_card_no as jjob_card_no FROM s_job_card_sdetails t1 LEFT JOIN s_job_card t2 ON t1.job_card_no=t2.id where t1.jdate between '".$_REQUEST['from']."' AND '".$_REQUEST['to']."'";
				}
				else
				{
				 $ss="SELECT t1.*,t2.id as jid ,t2.job_card_no as jjcno,t2.vehicle_no as jvno,t2.smobile,t2.sname,t2.job_card_no as jjob_card_no FROM s_job_card_sdetails t1 LEFT JOIN s_job_card t2 ON t1.job_card_no=t2.id where t1.ServiceId='".$_REQUEST['Stype']."' AND (t1.jdate between '".$_REQUEST['from']."' AND '".$_REQUEST['to']."')";
				}				
				$Ess=mysql_query($ss);
				$i=0;
				while($FEss=mysql_fetch_array($Ess))
				{
					$i++;
				?>
                <tr>
                  <td><?php echo $i;?></td>
                  <td><?php echo $FEss['jjob_card_no'];?></td>
				  <td><?php echo date("d-m-Y",strtotime($FEss['jdate']));?></td>
				  <td><?php echo $FEss['jvno'];?></td>
				  <td><?php echo $FEss['sname'];?></td>
				  <td><?php echo $FEss['smobile'];?></td>
	              <td><a href="s_jobcard_receipt.php?job_card_no=<?php echo $FEss['job_card_no']; ?>"  onclick="return confirm('Are You Sure Want to Print?');" class="btn-box-tool"><i class="fa fa-print" style="font-size:20px;color:Black"></i></a></td>
				  <?php
					$sm="SELECT sum(st_amt) as sa, sum(CostPerServices) as cps FROM s_job_card_sdetails where job_card_no='".$FEss['id']."'";
					$Esm=mysqli_query($conn,$sm);
					$FEsm=mysqli_fetch_array($Esm);
				  ?>
				  <td style="text-align:right"><?php echo $FEsm['sa'];?></td>
				  <td style="text-align:right"><?php echo $FEsm['cps'];?></td>
				  <td style="text-align:right"><?php echo number_format(($FEsm['sa']-$FEsm['cps']),2);?></td>
				  <?php
				  }
				}
				  ?>                  
                </tr>				
                </tbody>
              </table>
</body>


<?php
 }


?>
</html>