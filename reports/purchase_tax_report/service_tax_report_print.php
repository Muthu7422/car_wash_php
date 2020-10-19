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
        <div class="col-md-9 col-md-offset-2">            
            <div class="box">
            			
            <!-- /.box-header -->
            <div class="box-body">
              <table id="" class="table table-bordered table-striped">
				<thead>                
                 Sales Tax Report From <?php echo $_POST['from']; ?>  To  <?php echo $_POST['to']; ?>              
                </thead>
                
				<thead>
                 <tr>
                   <th>S.No</th>
                   <th>Date</th>
				   <th>Invoice No</th>
				   <th>Customer Name</th>
				   <th>State</th>
				   <th>GSTIN No</th>
				   <th>Invoice Amt.</th>
				   <th>5%</th>
				   <th>12%</th>
				   <th>18%</th>
				   <th>28%</th>
				 </tr>
                </thead>
                <tbody>
				<?php
				$fdate=$_POST['from'];
				$tdate=$_POST['to'];
				$i=0;
			   
				  $ss="select * from sales_invoice where (sdate between '$fdate' AND '$tdate') order by sdate desc";
				  $Ess=mysqli_query($conn,$ss);
				  while($FEss=mysqli_fetch_array($Ess))
				   {
					 $cust_name="select * from a_customer where id='".$FEss['cname']."'";
					 $cust_nameq=mysqli_query($conn,$cust_name);
					 $cust_namef=mysqli_fetch_array($cust_nameq);
					 
					 $ss1="select * from sales_invoice_details where inv_no = '".$FEss['inv_no']."'";
				     $Ess1=mysqli_query($conn,$ss1);
				     $FEss1=mysqli_fetch_array($Ess1);
					 
					 $spare_name="select * from m_spare where sid='".$FEss1['spare_name']."'";
					 $spare_nameq=mysqli_query($conn,$spare_name);
					 $spare_namef=mysqli_fetch_array($spare_nameq);
					 $i++;
					 
				?>
                <tr>
                  <td><?php echo $i;  ?></td>
                  <td><?php echo $FEss['sdate']; ?></td>
				  <td><?php echo $FEss['inv_no'];  ?></td>
				  <td><?php echo $cust_namef['cust_name']; ?></td>
				  <td>State</td>
				  <td><?php echo $FEss['gstin']; ?></td>
				  <td><?php echo $FEss['bill_amt']; ?></td>
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