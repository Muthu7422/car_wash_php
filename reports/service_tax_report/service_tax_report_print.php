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
            		     <div class="box">
            			
            <!-- /.box-header -->
            <div class="box-body">
              <table id="" class="table table-bordered table-striped">
				<thead>  
           <?php
         $fdate=$_POST['from'];
		 $tdate=$_POST['to'];
           ?>				
               <h4>  Service - Service Tax Report From <?php echo date("d-m-Y",strtotime($fdate)); ?>  To  <?php echo date("d-m-Y",strtotime($tdate)); ?> </h4>      
                </thead>
                
				<thead>
                <tr>
                  <th>S.No</th>
                  <th>Date</th>
				  <th>Invoice No</th>
				  <th>Customer Name</th>
				    <th>State</th>
				  
				   <th>Taxable Value.</th>
				  
				  <th>18%</th>
				   
				  </tr>
                </thead>
                <tbody>
				<?php
				
				$i=0;
			   
				$ss="select * from a_final_bill where (bill_date between '$fdate' AND '$tdate')  AND FrachiseeId='".$_SESSION['BranchId']."' order by bill_date desc";
				$Ess=mysqli_query($conn,$ss);
				while($FEss=mysqli_fetch_array($Ess))
				{
				    $cust_name="select * from a_customer where id='".$FEss['cname']."'";
					$cust_nameq=mysqli_query($conn,$cust_name);
					$cust_namef=mysqli_fetch_array($cust_nameq);
					 
					$sjid="select id from s_job_card where job_card_no = '".$FEss['job_card_no']."'";
				    $Esjid=mysqli_query($conn,$sjid);
				    $FEsjid=mysqli_fetch_array($Esjid);
					 
					$spare_name="select id from s_spare_prepick where s_job_card_no='".$FEsjid['id']."'";
					$spare_nameq=mysqli_query($conn,$spare_name);
					$spare_namef=mysqli_fetch_array($spare_nameq);
					 
					$spare_detail="select id from s_spare_prepick_details where s_pick_no='".$spare_namef['id']."'";
					$spare_detailq=mysqli_query($conn,$spare_detail);
					$spare_detailf=mysqli_fetch_array($spare_detailq);
					 
					
					
					$s18="SELECT sum((mrp*qty))as total FROM `s_spare_prepick_details` where s_pick_no='".$spare_detailf['id']."' and TaxRate='18.00'";
					$Es18=mysqli_query($conn,$s18);
					$FEs18=mysqli_fetch_array($Es18);
					 $Total18=$FEs18['total'];
					 
					$TAmount18=$FEss['TotalServiceAmount']*18/100;
					
					
					$i++;
					 
				?>
                <tr>
                  <td><?php echo $i;  ?></td>
                  <td><?php echo date("d-m-Y",strtotime($FEss['bill_date'])); ?></td>
				  <td><?php echo $FEss['inv_no'];  ?></td>
				  <td><?php echo $cust_namef['cust_name']; ?></td>
				  <td><?php echo $cust_namef['addr']; ?></td>
				
				    <td><?php echo number_format($FEss['TotalServiceAmount'],2); ?></td>
					
					<td><?php echo number_format($TAmount18,2); ?></td>
				   
				  </tr>
				<?php				
			      }				
				?>
				<tr>
                  <td colspan="5" align="right"><?php //echo $tc; ?></td>
				  <td colspan="6" align="right"><?php //echo $td;  ?></td>
				  </tr>
                  </tbody>                
              </table>
            </div>

			
			
			

			
            <!-- /.box-header -->
          </div>
			
            <!-- /.box-body -->
          </div>
           


		   
          
        </div>
      </div>
	  
         


			
            <!-- /.box-header -->
            
           


		   
          
        </div>
      </div>
	  
    </section>    
  </div>  

  <!--footer End-->

<?php include("../../includes_db_js.php"); ?>
</body>
</html>