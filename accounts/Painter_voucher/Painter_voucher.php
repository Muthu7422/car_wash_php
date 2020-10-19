<?php
include("../../includes.php");
include("../../redirect.php");
error_reporting(0);

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $_SESSION['title']; ?></title>
  <?php  include("../../includes_db_css.php"); ?>
   
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <!--header Starts-->
  <?php include("../../header.php"); ?>
  <!--Header End -->
  <!-- Left side column. contains the logo and sidebar -->
   <?php include("../../leftbar.php"); ?>
 <!-- Side Bar End -->
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="background-color:#ECF0F5">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Painter Voucher
        <small>Report</small>
      </h1>
     </section>
<script>
function Delete_Click() {
    var strconfirm = confirm("Are you sure you want to delete?");
    if (strconfirm == true) {
        return true;
    }
	else
		return false;
}  
  
  
</script>	
<script>

function tabE(obj,e){ 
   var e=(typeof event!='undefined')?window.event:e;// IE : Moz 
   if(e.keyCode==13){ 
     var ele = document.forms[0].elements; 
     for(var i=0;i<ele.length;i++){ 
       var q=(i==ele.length-1)?0:i+1;// if last element : if any other 
       if(obj==ele[i]){ele[q].focus();break} 
     } 
  return false; 
   } 
  } 
</script> 

    <!-- Main content -->
    <section class="content container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Painter Voucher</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
		
            <form class="form-horizontal" method="post" action="Painter_voucher.php" autocomplete="off">
              <div class="box-body">
                  
				<div class="form-group col-sm-4">
			    <label for="catname">Painter Name</label>
                <select class="form-control" name="PainterName"  id="PainterName"   required>
			    <option value="">--select The Name</option>
				<?php 
				$mob1="select * from m_painters_master where status='Active'";
				$mobi1=mysqli_query($conn,$mob1);
				while($Pain=mysqli_fetch_array($mobi1))
				{
				?>	
				<option value="<?php echo $Pain['Id'];?>"><?php echo $Pain['PainterName'];?></option>
				<?php
				}
				?>
				</select>
                </div>
              </div>
			   <div class="box-body">
			                <div class="box-footer">
			 
              <button  type="submit" class="btn btn-info pull-right" >Submit</button>
              </div>
			    </div>
			       <div class="box-header">
              <h3 class="box-title">Painter Report</h3>
            </div>
            <!-- /.box-header -->
               <div class="box-body">
                <div class="form-group col-sm-12">
				<div style="overflow:auto">
                <table id="example1" class="table table-bordered table-striped" width="100%">
                <thead>
                <tr>
				<th>Sl No</th>
				<th>Painter Name</th>
				<th>Invoice No</th>
                <th>Invoice Date</th>
				<th>Invoice  Amount</th>
				<th>Painting Amount</th>
				<th>Cust. Amount</th>
				<th>Balance Amount</th>
				<th align="center">Add Amount</th>
				
                </tr>
                </thead>
                <tbody>
					
					
					<?php
					if(isset($_POST['PainterName']))
				{
					$i=0;
				 	$Dcs="select * from s_outsources where PainterName='".$_POST['PainterName']."'"; 
					$ds=mysqli_query($conn,$Dcs);
					while($cx=mysqli_fetch_array($ds))
					{
						$co="select * from m_painters_master where Id='".$cx['PainterName']."'";
						$mn=mysqli_query($conn,$co);
						$cxsa=mysqli_fetch_array($mn);
						
						$Cdsa="select * from a_final_bill where JobcardId='".$cx['JobcardId']."'";
						$nx=mysqli_query($conn,$Cdsa);
						while($cxz=mysqli_fetch_array($nx))
						{
							$p="select * from s_outsources_details where JobcardId='".$cx['JobcardId']."'";
							$pp=mysqli_query($conn,$p);
							while($ppp=mysqli_fetch_array($pp))
							{
								
							  $M="select SUM(PaidAmount) as PaidAmount from painter_outstanding where PainterName='".$cxsa['Id']."' and InvoiceId='".$cxz['id']."'"; 
								$Fc=mysqli_query($conn,$M);
								$lok=mysqli_fetch_array($Fc); 
								$balance=$ppp['TotalAmount']-$lok['PaidAmount'];
						
					
					$i++;
				?>
                <tr>
                <td><?php echo $i;?></td>
                <td><?php echo $cxsa['PainterName'];?></td>
				<td><?php echo $cxz['inv_no'];?></td>
				<td><?php echo $cxz['bill_date'];?></td>
				<td><?php echo $cxz['other_charge'];?></td>
				<td><?php echo $ppp['TotalAmount'];?></td>
				<td><?php echo $cxz['other_charge'];?></td>
				<td><?php echo $balance;?></td>
				
				<td align="center"><a href="painter_amount_add.php?PainterName=<?php echo $cxsa['PainterName']; ?>&painterid=<?php echo  $cx['PainterName']; ?>&invoiceid=<?php echo $cxz['id']; ?>&invoiceno=<?php echo $cxz['inv_no']; ?>&balance=<?php echo $balance; ?>"  onclick="return confirm('Are You Sure Want to Proceed?');" class="btn-box-tool"><i class="fa fa-chevron-circle-right" style="font-size:20px;color:red"></i></a></td>
				  <?php
				}
				}
				}
					
				}
				  ?>
                  
                </tr>
				
                </tbody>
              </table>
			  </div>
                </div>				
            </div>
              <!-- /.box-body -->
			 

              <!-- /.box-footer -->
            </form>
			
			
		
          </div>
        </div>
      </div>


    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
  immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>

<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->


<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
	 
	 
     user experience. -->
	  <?php include("../../footer.php"); ?>
  <!--footer End-->
 <div class="control-sidebar-bg"></div>
 <?php include("../../includes_db_js.php"); ?>
</body>
</html>