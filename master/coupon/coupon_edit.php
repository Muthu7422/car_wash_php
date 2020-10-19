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
    <form role="form" method="post" action="coupon_edit_act.php">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
             <!-- /.box-header -->
            <!-- form start -->
            <?php
			$id=$_REQUEST['id'];
			$g="select * from m_gst where id='$id'";
			$Eg=mysqli_query($conn,$g);
			$FEg=mysqli_fetch_array($Eg);
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
                  <input type="text" class="form-control" name="CouponDescription" id="CouponDescription" placeholder="Coupon Description">
                </div>
				<div class="form-group col-sm-4">
                  <label for="Branch">Coupon Expire Date</label>
                  <input type="date" class="form-control" name="CouponExpire" id="CouponExpire" required>
                </div>
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
