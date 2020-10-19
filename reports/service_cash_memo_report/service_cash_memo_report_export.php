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
$filename = 'service_cash_memo_report From_'.date("d-m-Y",strtotime($_REQUEST['from'])).' To_'.date("d-m-Y",strtotime($_REQUEST['to'])).' .xls';
header('Content-Disposition: attachment; filename='.$filename);

?>
<body>
  <table  class="table table-bordered table-striped">
                <thead>
				<tr>&nbsp;</tr>
			 <tr><h3>Company Name : <?php echo $_SESSION['company']?></h3></tr>
				 <tr><h4>Overall Final Bill Report From  <?php echo date("d-m-Y",strtotime($_REQUEST['from']));?> To  <?php echo date("d-m-Y",strtotime($_REQUEST['to']));?> </h4></tr>
			    <tr>
                  <th align="center">S.No</th>
                  <th align="center">Service Cash Memo No</th>
				  <th align="center">Date</th>
				  <th align="center">Customer</th>				
				  <th align="center">Aquramiles Point</th>
				  <th align="center">Service Type</th>
				  <th align="center">Quantity</th>
				  <th align="center">Before Discount</th>
				  <th align="center">Discount Amount</th>
				  <th align="center">Bill Amount</th>
                </tr>
                </thead>
                <tbody>
				
  <?php
				if(isset($_REQUEST['from']))
				 {
				$i=0;
			     $ct="select * from service_cash_memo where date between '".$_REQUEST['from']."' and '".$_REQUEST['to']."'"; 
				 $Ect=mysql_query($ct);
				 while($Fct=mysql_fetch_array($Ect))
				  {
					
			     
							
				 $na="select * from service_cash_memo where id='". $Fct['customer_name']."'";
				 $naq=mysql_query($na);
				 $naf=mysql_fetch_array($naq);
				
				 $pa="select * from a_customer where id='". $Fct['customer_name']."'";
				 $nmaq=mysql_query($pa);
				 $paf=mysql_fetch_array($nmaq);  
				 
				 
				 $pa1="select * from service_cash_memo_details where id='". $Fct['id']."'";
				 $nmaq1=mysql_query($pa1);
				 $paf1=mysql_fetch_array($nmaq1);   
				 
			 	 $pa2="select * from m_service_type where id='". $paf1['service_type']."'";
				 $nmaq2=mysql_query($pa2);
				 $paf2=mysql_fetch_array($nmaq2);  
					           
				 
				$i++;	
			  ?>
                 <tr>
                  <td  align="center"><?php echo $i;  ?></td>
                  <td  align="center"><?php echo $Fct['service_cash_memo_no']; ?></td>
				  <td  align="center"><?php echo date("d-m-Y",strtotime($Fct['date']));  ?></td>
				  <td  align="center" ><?php echo $paf['cust_name']; ?></td>				  				  
				  <td  align="center"><?php echo $paf['AMCEarned']; ?></td>				  
				  <td  align="center"><?php echo $paf2['stype']; ?></td>				  
				  <td  align="center"><?php echo $paf1['qty']; ?></td>				  
				  <td  align="center"><?php echo $Fct['b_discount']; ?></td>	
				  <td  align="center"><?php echo $Fct['discount_amount']; ?></td>	
                  <td  align="center"><?php echo $Fct['bill_amount']; ?></td>				  
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