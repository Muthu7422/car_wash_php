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
               <h4>  Sales Tax Report From <?php echo date("d-m-Y",strtotime($_POST['from'])); ?>  To  <?php echo date("d-m-Y",strtotime($_POST['to'])); ?> </h4>      
                </thead>
                
				<thead>
                <tr>
                  <th>S.No</th>
                  <th>Date</th>
				  <th>Invoice No</th>
				  <th>Customer Name</th>
				    <th>State</th>
				  
				   <th>Taxable Value</th>
				 <th>18%</th>
				  
				  </tr>
                </thead>
                <tbody>
				<?php
				$fdate=$_POST['from'];
				$tdate=$_POST['to'];
				$i=0;
			   
				  $ss="select * from sales_invoice where (sdate between '$fdate' AND '$tdate') AND FranchiseeId='".$_SESSION['BranchId']."' order by sdate desc";
				  $Ess=mysqli_query($conn,$ss);
				 while($FEss=mysqli_fetch_array($Ess))
				 {
					  $i++;
					  $cust_name="select * from a_customer where id='".$FEss['cname']."'";
					 $cust_nameq=mysqli_query($conn,$cust_name);
					 $cust_namef=mysqli_fetch_array($cust_nameq);
					 
					 $ss1="select SUM(BeforeTaxOfMrp) as BeforeTaxOfMrp from sales_invoice_details where inv_no = '".$FEss['inv_no']."'";
				     $Ess1=mysqli_query($conn,$ss1);
				     $FEss1=mysqli_fetch_array($Ess1);
					 $rate=$FEss1['BeforeTaxOfMrp'];
					 
					 $tax5="select SUM(BeforeTaxOfMrp) AS BeforeTaxOfMrp from sales_invoice_details where TaxOfMrp='5' and inv_no = '".$FEss['inv_no']."'";
					 $taxq5=mysqli_query($conn,$tax5);
					 $taxf5=mysqli_fetch_array($taxq5);
					 
					 $tax12="select SUM(BeforeTaxOfMrp) AS BeforeTaxOfMrp from sales_invoice_details where TaxOfMrp='12' and inv_no = '".$FEss['inv_no']."'";
					 $taxq12=mysqli_query($conn,$tax12);
					 $taxf12=mysqli_fetch_array($taxq12);
					 
					 $tax18="select SUM(BeforeTaxOfMrp) AS BeforeTaxOfMrp from sales_invoice_details where TaxOfMrp='18' and inv_no = '".$FEss['inv_no']."'";
					 $taxq18=mysqli_query($conn,$tax18);
					 $taxf18=mysqli_fetch_array($taxq18);
					
					  $tax28="select SUM(BeforeTaxOfMrp) AS BeforeTaxOfMrp from sales_invoice_details where TaxOfMrp='28' and inv_no = '".$FEss['inv_no']."'";
					 $taxq28=mysqli_query($conn,$tax28);
					 $taxf28=mysqli_fetch_array($taxq28);
					 
					 $five=$taxf5['BeforeTaxOfMrp']*5/100;
					 $twelve=$taxf12['BeforeTaxOfMrp']*12/100;
					 $eighteen=$taxf18['BeforeTaxOfMrp']*18/100;
					 $twentyeight=$taxf28['BeforeTaxOfMrp']*28/100;  
				     ?>
                <tr>
                  <td><?php echo $i;  ?></td>
                  <td><?php echo date("d-m-Y",strtotime($FEss['sdate'])); ?></td>
				  <td><?php echo $FEss['inv_no'];  ?></td>
				  <td><?php echo $cust_namef['cust_name']; ?></td>
				  <td><?php echo $cust_namef['addr'];?></td>
				 
				    <td><?php echo number_format(("$rate"),2); ?></td>
					
					<td><?php echo number_format(("$eighteen"),2); ?></td>
				
				  </tr>
				<?php				
			      }				
				?>
				
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