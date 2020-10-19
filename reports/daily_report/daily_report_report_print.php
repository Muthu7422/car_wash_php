<?php
include("../../includes.php");
include("../../redirect.php");
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $_SESSION['title']; ?></title>
  <?php  include("../../includes_db_css.php"); ?>   
</head>
<body class="">
<div class="wrapper"> 
    <section class="content container-fluid">
	
	
      <!--Print Satrt--!>
	  <div class="row">
        <!-- left column -->		
        <div class="col-md-12">            
            <div class="box">
            			
            <!-- /.box-header -->
            <div class="box-body">
              <table id="" class="table table-bordered table-striped">
				<thead>                
                  Supplier Payment Details From <?php echo $_POST['FromDate']; ?> 
                </thead>
                
			<thead>
              <tr>
                <th>S.No</th>
				<th>Bill No</th>
                <th>Date</th>
				<th>Customer Name</th>
				<th>Model.</th>
				<th>Customer No</th>
				<th>ServiceName</th>
				<th>Address</th>
				<th>Vehicle No</th>
				<th>Total Item</th>
				<th>Amount</th>
				<th>Mode Of Pay</th>
				<th>Demo </th>
				<th>Accessories </th>
				<th>Paid Details</th>
				  </tr>
                </thead>
                <tbody>
				<?php
				$FromDate=$_POST['FromDate'];
				$i=0;
				 $sco="select * from a_final_bill where bill_date='$FromDate'";
				 $Esco=mysqli_query($conn,$sco);
				while($FEsco=mysqli_fetch_array($Esco))
				{
					
				 $i++;
				?>
                <tr>
                  <td><?php echo $i;  ?></td>
                  <td><?php echo $FromDate; ?></td>
				  <td><?php echo $FEsco['inv_no']; ?></td>
				  <td><?php echo $FEsco['inv_no'];  ?></td>
				  <td><?php echo $FEsco['pdate']; ?></td>
                  <td><?php echo $FEsco['pdate']; ?></td>
				  <td><?php echo $FEsco['sname']; ?></td>
				  <td><?php echo $FEsco['inv_no'];  ?></td>
				  <td><?php echo $FEsco['pdate'];  ?></td>
                  <td><?php echo $FEsco['pdate']; ?></td>
				  <td><?php echo $FEsco['sname']; ?></td>
				  <td><?php echo $FEsco['ptype'];  ?></td>
				  <td><?php echo $FEsco['pdate']; ?></td>
				  <td><?php echo $FEsco['sname']; ?></td>
				  <td><?php echo $FEsco['inv_no'];  ?></td>				  
                </tr>
				<?php				
			      }				
				?>
				<tr>
                  <td colspan="5" align="right"><?php //echo $tc; ?></td>
				  <td colspan="1" align="right"><?php //echo $td;  ?></td>
                  </tbody>                
              </table>
            </div>
			
            <!-- /.box-body -->
          </div>
           


		   
          
        </div>
      </div>
	  <!--Print End --!>
	  
	  
	  
    </section>    
  </div>  

  <!--footer End-->

<?php include("../../includes_db_js.php"); ?>
</body>
</html>