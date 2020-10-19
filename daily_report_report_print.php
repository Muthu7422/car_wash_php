<?php
include("includes.php");
include("redirect.php");
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $_SESSION['title']; ?></title>
  <?php  include("includes_db_css.php"); ?>   
</head>
<body class="">
<div class="wrapper"> 
    <section class="content container-fluid">
	
	 <h3>
        Customer Service Details
      </h3>
      <!--Print Satrt--!>
	  <div class="row">
        <!-- left column -->		
        <div class="col-md-6">            
            <div class="box">
            			
            <!-- /.box-header -->
            <div class="box-body">
              <table id="" class="table table-bordered table-striped">
				<thead>                
                  Service Details
                </thead>
                
			<thead>
              <tr>
                <th>S.No</th>
				<th>ServiceName</th>
				  </tr>
                </thead>
                <tbody>
				<?php
				$i=0;
				 $sco="select * from s_job_card_sdetails where job_card_no='".$_REQUEST['JobcradId']."'";
				 $Esco=mysqli_query($conn,$sco);
				while($FEsco=mysqli_fetch_array($Esco))
				{
					
					
				 $i++;
				?>
                <tr>
                  <td><?php echo $i;  ?></td>
				  <td><?php echo $FEsco['service_type']; ?></td>			  
                </tr>
				<?php				
			      }				
				?>
				<tr>
                  <td colspan="5" align="right"><?php //echo $tc; ?></td>
				  </tr>
                  </tbody>                
              </table>
            </div>
			         <div class="box-body">
              <table id="" class="table table-bordered table-striped">
				<thead>                
                  Package Service Details
                </thead>
                
			<thead>
              <tr>
                <th>S.No</th>
				<th>Package Name</th>
				  </tr>
                </thead>
                <tbody>
				<?php
				$i=0;
				 $sco="select * from s_job_card_pdetails where job_card_no='".$_REQUEST['JobcradId']."'";
				 $Esco=mysqli_query($conn,$sco);
				while($FEsco=mysqli_fetch_array($Esco))
				{
					
					
				 $i++;
				?>
                <tr>
                  <td><?php echo $i;  ?></td>
				  <td><?php echo $FEsco['package_type']; ?></td>			  
                </tr>
				<?php				
			      }				
				?>
				<tr>
                  <td colspan="5" align="right"><?php //echo $tc; ?></td>
				  </tr>
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

<?php include("includes_db_js.php"); ?>
</body>
</html>