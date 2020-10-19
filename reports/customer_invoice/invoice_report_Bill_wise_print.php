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
                  Invoice No : <?php echo $_REQUEST['inv_no']; ?> <br/>Invoice Amount <?php echo $_REQUEST['inv_amt'] ?><br/>Pending Amount : <?php echo $_REQUEST['pending_amt']; ?> <br/>  <br/>   Transaction Mode : Cash Account      
                </thead>
                
				<thead>
                <tr>
                  <th>S.No</th>
                  <th>Date</th>
				  <th>Customer Name</th>
				  <th>Paid Amount</th>
                </tr>
                </thead>
                <tbody>
			<?php
				 $ss="select * from account_cash where ReferenceNo='".$_REQUEST['inv_no']."'";
				$Ess=mysqli_query($conn,$ss);
				$i=0;								
				while($FEss=mysqli_fetch_array($Ess))
				{ 
			
		echo		 $sc="select * from a_customer where LedgerId='".$FEss['LedgerId']."'";
				 $Esc=mysqli_query($conn,$sc);
				 $FEsc=mysqli_fetch_array($Esc);
				 $i++;
				?>
                <tr>
                  <td><?php echo $i;  ?></td>
                  <td><?php echo $FEss['TransactionDate']; ?></td>
				  <td><?php echo $FEsc['cust_name']; ?></td>
				  <td><?php echo $FEss['Amount'];  ?></td>
				  				  
                </tr>
				<?php
				}
				
				?>
				<tr>
                  <td colspan="5" align="right"><?php //echo $tc; ?></td>
				  <td colspan="1" align="right"><?php //echo $td;  ?></td>
				 
                </tr>
                  </tbody>                
              </table>
            </div>
			
            <!-- /.box-body -->
          </div>
           
           <div class="box">            			
            <!-- /.box-header -->
            <div class="box-body">
              <table id="" class="table table-bordered table-striped">
				<thead>                
                  Transaction Mode : Bank Account      
                </thead>
                
				<thead>
                 <tr>
                  <th>S.No</th>
                  <th>Date</th>
				  <th>Customer Name</th>
				  <th>Paid Amount</th>
                </tr>
                </thead>
                <tbody>
				<?php
				 $ss="select * from account_bank where ReferenceNo='".$_REQUEST['inv_no']."'";
				$Ess=mysqli_query($conn,$ss);
				$i=0;								
				while($FEss=mysqli_fetch_array($Ess))
				{
				 $sc="select * from a_customer where LedgerId='".$FEss['LedgerId']."'";
				 $Esc=mysqli_query($conn,$sc);
				 $FEsc=mysqli_fetch_array($Esc);
				 
				 $i++;
				
				?>
               <tr>
                  <td><?php echo $i;  ?></td>
                  <td><?php echo $FEss['TransactionDate']; ?></td>
				 <td><?php echo $FEsc['cust_name']; ?></td>
				  <td><?php echo $FEss['Amount'];  ?></td>
				  				  
                </tr>
				<?php
				}
				?>
				<tr>
                  <td colspan="5" align="right"><?php //echo $tc; ?></td>
				  <td colspan="1" align="right"><?php //echo $td;  ?></td>
				 
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

<?php include("../../includes_db_js.php"); ?>
</body>
</html>