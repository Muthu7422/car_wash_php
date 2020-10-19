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
$filename = 'cash_memo_report From_'.date("d-m-Y",strtotime($_REQUEST['from'])).' To_'.date("d-m-Y",strtotime($_REQUEST['to'])).' .xls';
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
                  <th>Cash Memo No</th>
				  <th>Date</th>
							  <th>Name</th>

				   <th>Bill Amount</th>
                </tr>
                </thead>
                <tbody>
				
   <?php
				
				$i=0;
			     $ct="select * from cash_memo where date between '".$_REQUEST['from']."' and '".$_REQUEST['to']."'"; 
				$Ect=mysql_query($ct);
				while($Fct=mysql_fetch_array($Ect))
				{
					 $i++;
					 $job="select * from cash_memo where cash_memo_no='".$Fct['cash_memo_no']."'"; 
					$jobs=mysql_query($job);
			$jobf=mysql_fetch_array($jobs);
			
				
				
				 $na="select * from cash_memo where id='". $Fct['customer_name']."'";
				 $naq=mysql_query($na);
				 $naf=mysql_fetch_array($naq);
				
				 $pa="select * from a_customer where id='". $Fct['customer_name']."'";
				 $nmaq=mysql_query($pa);
				 $paf=mysql_fetch_array($nmaq);
				
				
	         
				?>
                <tr>
                  <td><?php echo $i;  ?></td>
                  <td><?php echo $Fct['cash_memo_no']; ?></td>
				  <td><?php echo date("d-m-Y",strtotime($Fct['date']));  ?></td>
				  <td><?php echo $paf['cust_name'];  ?></td>
				
					   <td><?php echo $Fct['bill_amount']; ?></td>
				  
                </tr>
				<?php
				}
				}
				?>
                  </tbody>
               
              </table>
</body>


<?php
 


?>
</html>