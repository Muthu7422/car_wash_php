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

header('Content-type: application/excel');
$filename = 'Customers Visit 2018 on'.$date.'.xls';
header('Content-Disposition: attachment; filename='.$filename);

?>
<body>
     <table id="example1" class="table table-bordered table-striped" width="100%">
                <thead>
				
				 <tr><h3>Company Name : <?php echo $_SESSION['company']?></h3></tr>
				 <tr><h4>Customers Visit 2018</h4></tr>
                <tr>
                  <th>S.No</th>
                  <th>Service Date</th>
				  <th>Customer Name</th>
				  <th>Customer Mobile</th>
				  <th>Vehicle Number</th>
				   <th>Vehicle Model</th>
				  <th>Service Name</th>
                </tr>
                </thead>
                <tbody>
				<?php
				
				$i=0;
				$ct="select * from customer_old_data where CustomerName!='' AND ServiceDate!='0000-00-00' order by ServiceDate";
				$Ect=mysql_query($ct);
				while($Fct=mysql_fetch_array($Ect))
				{
					//date("d-m-Y", strtotime($Fct['ServiceDate']));
				  
				 $i++;
				?>
                <tr>
                  <td><?php echo $i;  ?></td>
                  <td><?php echo date("d-m-Y", strtotime($Fct['ServiceDate'])); ?></td>
				  <td><?php echo $Fct['CustomerName'];  ?></td>
				  <td><?php echo $Fct['CustomerMobile'];  ?></td>
				  <td><?php echo $Fct['VehicleNumber'];  ?></td>				 
				  <td><?php echo $Fct['VehicleModel'];  ?></td>
				  <td><?php echo $Fct['ServiceName'];  ?></td>
                </tr>
				<?php
				
				}
				?>
                  </tbody>
                
              </table>
</body>



</html>