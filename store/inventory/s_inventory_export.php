<?php 
include("../../includes.php");
include("../../redirect.php");
$date=date('d/m/Y');
$time=time();
?>
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



<body>
<?php
if(isset($_POST['export']))
{
header('Content-type: application/excel');
$filename = 'InventoryReport'.$date.$time.'.xls';
header('Content-Disposition: attachment; filename='.$filename);

?>
  <table  class="table table-bordered table-striped">
                <thead>
				<tr>&nbsp;</tr>
			    <tr><h3>Company Name : <?php echo $_SESSION['company']?></h3></tr>
				<tr><h4> Inventory Report </h4></tr>
				<tr>
				  <th>Sl No</th>
				   <th>Part No</th>
                  <th>Spare Name</th>
				  <th>HSN Code</th>
				  <th>MRP</th>
				  <th>Quantity</th>
				  <th>SGST</th>
				  <th>CGST</th>
				  <th>Rate</th>
				  <th>Amount</th>
				  <th>Selling Price</th>
                </tr>
                </thead>
                <tbody>
			
                <?php			
				$ss="select * from item_stock where FranchiseeId='".$_SESSION['FranchiseeId']."'";
				$Ess=mysql_query($ss);
				$i=0;
				while($FEss=mysql_fetch_array($Ess))
				{
				$ss1="select * from  m_franchisee where id='".$FEss['FranchiseeId']."'";
				$Ess1=mysql_query($ss1);
				$FEss1=mysql_fetch_array($Ess1);
				
				$ss2="select m_spare.*,m_unit_master.u_name from  m_spare JOIN m_unit_master ON m_spare.units=m_unit_master.id AND m_spare.sid='".$FEss['ItemId']."'";
				$Ess2=mysql_query($ss2);
				$FEss2=mysql_fetch_array($Ess2);
				
			 	$ss3="select * from  m_spare_brand where sid='".$FEss2['sbrand']."'"; 
				$Ess3=mysql_query($ss3);
				$FEss3=mysql_fetch_array($Ess3);
				
				$ss4="select * from  m_spare_type where sid='".$FEss2['stype']."'";
				$Ess4=mysql_query($ss4);
				$FEss4=mysql_fetch_array($Ess4);
					
				$i++;	
								
				?>
                <tr>
					<td><?php  echo $i; ?></td>
					<td><?php  echo $FEss2['spartno']; ?></td>
					<td style="text-align:left"><?php  echo trim($FEss2['sname']); ?></td>
					<td><?php  echo $FEss2['hsn']; ?></td>
					<td><?php  echo $FEss2['mrp']; ?></td>
					<td><?php  echo $FEss['StockQuantity']; ?></td>
					<td><?php  echo ($FEss2['TaxRate']/2); ?></td>
					<td><?php  echo ($FEss2['TaxRate']/2); ?></td>
					<td><?php  echo $FEss2['rate']; ?></td>
					<td><?php  echo $tam=($FEss['StockQuantity']*$FEss2['smrp']); ?></td> 
					<td><?php  echo $FEss2['smrp']; ?></td> 
                  </tbody>
				  </tr>
				<?php } ?>  
              </table>
<?php } ?>
</body>
</html>