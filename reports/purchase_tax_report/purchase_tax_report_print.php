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
               <h4>  Purchase Tax Report From <?php echo $_POST['from']; ?>  To  <?php echo $_POST['to']; ?> </h4>      
                </thead>
                
				<thead>
                <tr>
                  <th>S.No</th>
                  <th>Date</th>
				  <th>Invoice No</th>
				  <th>Supplier Name</th>
				  <th>Taxable Value</th>
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
			   
				 $ss="select * from s_purchase where (pdate between '$fdate' AND '$tdate') and FranchiseeId='".$_SESSION['BranchId']."' order by pdate desc";
				 $Ess=mysqli_query($conn,$ss);
				 while($FEss=mysqli_fetch_array($Ess))
				 {
					 
					  
					 $ss1="select * from s_purchase_details where inv_no = '".$FEss['id']."'";
				     $Ess1=mysqli_query($conn,$ss1);
				     while($FEss1=mysqli_fetch_array($Ess1))
					 {
						 
						  $rate=$FEss1['total'];
						  $gst=$FEss1['sgst']+$FEss1['sgst']+$FEss1['igst'];
						  
					   $i++;
					 $sup_name="select * from m_supplier where sid='".$FEss['supplier_name']."'";
					 $sup_nameq=mysqli_query($conn,$sup_name);
					 $sup_namef=mysqli_fetch_array($sup_nameq);
					 
					 
					 if($gst=='5')
					 {
						  $five=$rate*5/100;
					 }
					 else
					 {
						  $five='0';
					 }
					  if($gst=='12')
					 {
						 $twelve=$rate*12/100;
					 }
					 else
					 {
						 $twelve='0';
					 }
					  if($gst=='18')
					 {
						 $eighteen=$rate*18/100;
					 }
					 else
					 {
						 $eighteen='0';
					 }
					  if($gst=='28')
					 {
						 $twentyeight=$rate*28/100;  
					 }
					 else
					 {
						 $twentyeight='0';
					 }					 
				    ?>
                <tr>
                  <td><?php echo $i;  ?></td>
                  <td><?php echo $FEss['pdate']; ?></td>
				  <td><?php echo $FEss['inv_no'];  ?></td>
				  <td><?php echo $sup_namef['sname']; ?></td>
				  <td><?php echo number_format(("$rate"),2); ?></td>
				  <td><?php echo number_format(("$five"),2); ?></td>
				  <td><?php echo number_format(("$twelve"),2); ?></td>
				  <td><?php echo number_format(("$eighteen"),2); ?></td>
				  <td><?php echo number_format(("$twentyeight"),2); ?></td>				  
				</tr>
				<?php				
			      }	
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