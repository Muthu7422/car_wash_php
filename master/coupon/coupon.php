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
        
        <small>Coupon</small>
      </h1>
     </section>
	  <div class="box-header with-border">
            <?php if(isset($_REQUEST['s'])!='') {?> 
			  <div class="alert alert-success">
                <strong>Coupon Entry Saved Successfully!</strong> <i class="glyphicon glyphicon-ok" style="font-size:30px;color:white"></i>
              </div> <?php } ?>
             <?php if(isset($_REQUEST['d'])!='') {?> 
			  <div class="alert alert-success">
              <b> Coupon Entry Update Successfully!<i class="glyphicon glyphicon-ok" style="font-size:30px;color:white"></i></b>
              </div> <?php } ?>
			  <?php if(isset($_REQUEST['a'])!='') {?> 
			  <div class="alert alert-warning">
                 Coupon <b>already</b> exiting! <i class="fa fa-warning" style="font-size:30px;color:white"></i>
              </div> <?php } ?></div>
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
   
   
    <!-- Main content -->
    <section class="content container-fluid">
    <form role="form" method="post" action="coupon_act.php" autocomplete="off">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
             <!-- /.box-header -->
            <!-- form start -->
            <?php
			$g="select * from m_gst";
			$Eg=mysqli_query($conn,$g);
			$n=mysqli_num_rows($Eg);
			$n1=$n+1;
			?>
              <div class="box-body">
                
				
				<div class="form-group col-sm-4">
                  <label for="Branch">Coupon Type</label>
                 <select class="form-control" id="CouponType" name="CouponType">
				  <option>Franchisee</option>
                  <option>Customer</option>
				  </select>
                </div>
				<div class="form-group col-sm-4">
                  <label for="Branch">Franchisee Code / Customer Mobile No</label>
                   <input type="text" class="form-control" name="CouponMember" id="CouponMember" placeholder="Franchisee Code / Customer Mobile No" required>
                </div>
				<div class="form-group col-sm-4">
                  <label for="Branch">No of Coupons </label>
                  <input  type="number" class="form-control" name="NoOfCoupons" id="NoOfCoupons" required>
                </div>
				<div class="form-group col-sm-4">
                  <label for="Branch">Coupon Discount</label>
                  <input type="text" class="form-control" name="CouponDiscount" id="CouponDiscount" placeholder="Coupon Discount" required>
                </div>
				<div class="form-group col-sm-4">
                  <label for="Branch">Coupon Description</label>
                  <input type="text" class="form-control" name="CouponDescription" id="CouponDescription" placeholder="Coupon Description" required>
                </div>
				<div class="form-group col-sm-4">
                  <label for="Branch">Coupon Expire Date</label>
                  <input type="date" class="form-control" name="CouponExpire" id="CouponExpire" required>
                </div>
            </div>
              <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
	    <div class="box-footer">
                <button type="submit" class="btn btn-info pull-right">Submit</button>
        </div>    
         </div>
    </form>
	</section>
    <!-- /.content -->
	
	  <section class="content container-fluid">
       
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
             <!-- /.box-header -->
            <!-- form start -->
            
              <div class="box-body">
                <div class="form-group col-sm-12">
                <table id="example2" class="table table-bordered table-striped">
                <thead>
                <tr>
				
                  <th>S.No</th>
				  <th>Coupon Date</th>
				  <th>Coupon Code</th>
				  <th>Coupon Discount</th>
                  
				  <th>Coupon Member </th>
				  <th>Coupon Description</th>
				  
				  <th>Expire Date</th>
				  <th>Used On</th>
				  <th>Action</th>
                </tr>
                </thead>
                <tbody>
				<?php
				$ss="select * from coupon order by Id desc";
				$Ess=mysqli_query($conn,$ss);
				$i=0;
				while($FEss=mysqli_fetch_array($Ess))
				{
					$i++;
				?>
                <tr>
                  <td><?php echo $i; ?></td>
				  <td><?php  echo $FEss['GeneratedDate']; ?></td>
				  <td><?php  echo $FEss['CouponCode']; ?></td>
				  <td><?php  echo $FEss['CouponDiscount']; ?></td>
				  <td><?php  echo $FEss['CouponMember']; ?></td>
				  <td><?php  echo $FEss['CouponDescription']; ?></td>
				  <td><?php  echo $FEss['ExpiryDate']; ?></td>
				  <td><?php  echo $FEss['UsedDate']; ?></td>
				  <td>
                      <?php
                      if($FEss['UsedDate']=='0000-00-00')
					  {
					  ?>
					  <a href="coupon_delete_act.php?id=<?php  echo $FEss['Id']; ?>" class="btn-box-tool" onclick="return confirm('Are You Sure Want To Delete ?');"><i class="fa fa-close custom-icon1"></i></a>
					  <?php } ?>
				  </td>
                </tr>
				<?php } ?>
                </tbody>
              </table>
                </div>
            </div>
              <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
	      
         </div>

	</section>
	
</div>

  <!-- /.content-wrapper -->
 <!--footer start-->
 <?php include("../../footer.php"); ?>
  <!--footer End-->
    <div class="control-sidebar-bg"></div>
</div>
 <?php include("../../includes_db_js.php"); ?>
 

 
</body>
</html>
