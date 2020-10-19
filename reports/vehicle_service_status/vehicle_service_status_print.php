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
                 Vehicle Service Status From <?php echo date("d-m-Y",strtotime($_POST['from'])); ?>  To  <?php echo date("d-m-Y",strtotime($_POST['to'])); ?>              
                </thead>
                
				<thead>
                <tr>
                  <th>S.No</th>
                  <th>Job Card Number</th>
				  <th>Customer Name</th>
				  <th>Vehicle Number</th>
				   <th>Mobile</th>
				  <th>Amount</th>
				  
				  </tr>
                </thead>
                <tbody>
				<?php
				$fdate=$_POST['from'];
				$tdate=$_POST['to'];
				$i=0;
			   
			    $ss="select * from s_job_card where jcard_status='".$_POST["ServiceStatus"]."' and jdate between '$fdate' and '$tdate' order by id desc";
				
				$Ess=mysqli_query($conn,$ss);
				while($FEss=mysqli_fetch_array($Ess))
				{
					$i++;
				?>
              
                <tr>
                  <td><?php echo $i;  ?></td>
                  <td><?php echo $FEss['job_card_no']; ?></td>
				  <td><?php echo $FEss['sname']; ?></td>
				  <td><?php echo $FEss['vehicle_no'];  ?></td>
				  <td><?php echo $FEss['smobile']; ?></td>
				  <td><?php echo $FEss['total_amt']; ?></td>
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