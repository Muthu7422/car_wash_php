<?php
error_reporting(0);
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
      <h1>Sales Return</h1>
     </section>
    <!-- Main content -->
    <section class="content container-fluid">
    <form role="form" method="post" action="s_purchase_edit_act.php" autocomplete="off">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
             <!-- /.box-header -->
            <!-- form start -->
            
              <div class="box-body">
                <div class="form-group col-sm-4">
                  <label for="Branch">Invoice No</label>
				  <?php
				  $in="select * from sales_invoice where inv_no='".$_REQUEST['inv_no']."'";
				  $Ein=mysqli_query($conn,$in);
				  $Fin=mysqli_fetch_array($Ein);
				  
				  $dem="select * from a_customer where id='".$Fin['cname']."'";
				  $rmp=mysqli_query($conn,$dem);
				  $rcm=mysqli_fetch_array($rmp);
				  
				  $sem="select * from m_franchisee where id='".$Fin['branch_name']."'";
				  $arr=mysqli_query($conn,$sem);
				  $spm=mysqli_fetch_array($arr);
				  
				  
				 
				  
				  ?>
                  <input type="text" class="form-control" name="inv_no" id="inv_no" value="<?php echo $Fin['inv_no']; ?>" placeholder="Invoice No" readonly required>
                </div>
				
				 <div class="form-group col-sm-4">
                  <label for="Branch">Date</label>
                  <input type="date" class="form-control" name="pdate" id="pdate"  value="<?php echo $Fin['sdate']; ?>" placeholder="Date" required readonly>
                </div>
				
				<div class="form-group col-sm-4">
                  <label for="Branch">To Branch Name</label>
                  <select class="form-control" id="FranchiseeId" name="FranchiseeId" readonly>
				  <option value="<?php echo $spm['id']; ?>"><?php echo $spm['franchisee_name']; ?></option>
				  </select>
                </div> </div>
				 <div class="box-body">
				<div class="form-group col-sm-4">
                  <label for="Branch">Customer Name</label>
                  <select class="form-control" id="supplier_name" name="supplier_name" readonly>
				  <option value="<?php echo $rcm['sid']; ?>"><?php echo $rcm['cust_name']; ?></option>
				  </select>
                </div>
				
				
				<div class="form-group col-sm-4">
                  <label for="Branch">Outstanding</label>
                  <input class="form-control" name="out" id="out" value="<?php echo $Fin['cust_out_stand']; ?>" readonly>
                </div>
				<div class="form-group col-sm-4">
                  <label for="Branch">Total Amount</label>
                  <input class="form-control" id="sbrand" name="sbrand" value="<?php echo $Fin['total_amt']; ?>" readonly>
                </div>
				<div class="form-group col-sm-4">
                  <label for="Branch">Discount</label>
               <input class="form-control"  id="sparename" name="sparename" value="<?php echo $Fin['discount_per']; ?>" readonly>
                </div>
				<div class="form-group col-sm-4">
                 <label for="Branch">Discount Amount</label>
                 <input type="text" class="form-control" id="spart_no" value="<?php echo $Fin['dicount_amt']; ?>" name="spart_no" readonly>
			    </div>
				<div class="form-group col-sm-2">
                  <label for="Branch">Total</label>
               <input class="form-control"  id="unit" name="unit" value="<?php echo $Fin['total']; ?>" readonly>
                </div>
				<div class="form-group col-sm-2">
                  <label for="Branch">SGST</label>
                  <input type="text" class="form-control" name="prate" id="prate" value="<?php echo $Fin['sgst']; ?>" readonly placeholder="Purchase Rate">
                </div>
				
				<div class="form-group col-sm-2">
                  <label for="Branch">CGST</label>
                  <input type="text" class="form-control" name="discount_per" value="<?php echo $Fin['cgst']; ?>" id="discount_per" readonly>
                </div>
				<div class="form-group col-sm-2">
                  <label for="Branch">IGST</label>
                  <input type="text" class="form-control" name="discount_amt" value="<?php echo $Fin['igst']; ?>" id="discount_amt" readonly>
                </div>
				<div class="form-group col-sm-2">
                  <label for="Branch">GST Amount</label>
                  <input type="text" class="form-control" name="purchase_rate" value="<?php echo $Fin['gst_amt']; ?>" id="purchase_rate" readonly>
                </div>
				<div class="form-group col-sm-2">
                  <label for="Branch">Bill Amount</label>
                  <input type="text" class="form-control" name="qty" id="qty" value="<?php echo $Fin['bill_amt']; ?>" readonly>
                </div>
				<div class="form-group col-sm-4">
                  <label for="Branch">Received  Amount</label>
                  <input type="text" class="form-control" name="total" id="total" value="<?php echo $Fin['rec_amt']; ?>"  readonly >
                </div>
				<div class="form-group col-sm-2">
                  <label for="Branch">Balance Amount</label>
                  <input type="text" class="form-control" name="gst_amt" id="gst_amt" value="<?php echo $Fin['bal_amt']; ?>"readonly>
                </div>
				<div class="form-group col-sm-4">
                  <label for="Branch">Payment Mode</label>
                  <input type="text" class="form-control" name="net_amt" id="net_amt" value="<?php echo $Fin['payment_mode']; ?>" readonly>
                </div>
            </div>
			
			 <div class="box-body">
                <div class="form-group col-sm-12">
                <table id="example" class="table table-bordered table-striped">
                <thead>
                <tr>
				  <th>S.No</th>
				  <th>Spare Brand</th>
				  <th>Spare Name</th>
				  <th>Mrp</th>
				  <th>Qty</th>
				  <th>Amount</th>
				  <th>Return the Item</th>
                </tr>
                </thead>
                <tbody>
				<?php
				
				$edc="select * from sales_invoice where inv_no='".$_REQUEST['inv_no']."'";
				$esx=mysqli_query($conn,$edc);
				$wsx=mysqli_fetch_array($esx);
				
				
				$ss="select * from  sales_invoice_details where inv_id='".$wsx['id']."'";
				$Ess=mysqli_query($conn,$ss);
				$i=0;
				while($FEss=mysqli_fetch_array($Ess))
				{
					$i++;
					
				 	 $sdm="select * from m_spare_brand where sid='".$FEss['spard_brand']."'"; 
					$scm=mysqli_query($conn,$sdm);
					$pqr=mysqli_fetch_array($scm);
					
					$sdm2="select * from m_spare where sid='".$FEss['spare_name']."'"; 
					$scm2=mysqli_query($conn,$sdm2);
					$pqr2=mysqli_fetch_array($scm2);
					
					
				?>
                <tr>
                  <td><?php echo $i; ?></td>
				  <td><?php  echo $pqr['sbrand']; ?></td>
				  <td><?php  echo $pqr2['sname']; ?></td>
				<td><?php  echo $FEss['mrp']; ?></td>
				<td><?php  echo $FEss['qty']; ?></td>
				<td><?php  echo $FEss['total']; ?></td>
					<td><a href="sales_invoice_return.php?inv_no=<?php echo $wsx['inv_no']; ?> && id=<?php echo $FEss['id']; ?>" Onclick="return confirm('Are you sure want to proceed?')" title="Return the Sales Bill" class="btn-box-tool"><i class="fa fa-mail-forward custom-icon1" style="font-size:20px;color:brown"></i></a></td> 
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
    <!-- /.content -->
	</form>
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
