<?php
error_reporting(0);
include("../../includes.php");
include("../../redirect.php");
ob_start();
//mysql_connect("localhost","root","");
//mysql_select_db("addstock2"); 
if(isset($_POST["submit"]))
{
/*
	$cgst=explode("%", $scf['CGST']);
	$sgst=explode("%", $scf['DISCSGST']);
	$tax=$cgst[0]+$sgst[0];
	$spare="insert into m_spare set stype='".trim($scf['stype'])."',sbrand='".trim($scf['sbrand'])."',sname='".trim($scf['DESCRIPTION'])."',spartno='".trim($scf['PARTNUMBER'])."',smrp='".trim($scf['MRP'])."',ssupplier='".trim($scf['ssupplier'])."',status='Active',units='1',min_stock='1',TaxRate='".trim($tax)."',ItemPhoto='no_image.PNG',hsn='".trim($scf['HSN'])."',
	sgst='".trim($sgst[0])."',cgst='".trim($cgst[0])."',rate='".trim($scf['RATE'])."'";
	$spareq=mysql_query($spare);
	$spareid=mysql_insert_id();
		
	$is="insert into item_stock set FranchiseeId='5',ItemId='".$spareid."',Uom='1',StockQuantity='".$scf['QTY']."'";
	$isq=mysql_query($is);
	
0.SNO
1.PART No.
2.DESCRIPTION
3.HSN
4.MRP
5.QTY
6.DISC SGST
7.CGST
8.Rate
9.AMOUNT
10.Selling Price
*/     
          $file = $_FILES['file']['tmp_name'];
          $handle = fopen($file, "r");
          $c = 0;
          while(($filesop = fgetcsv($handle, 1000, ",")) !== false)
          {
		  $stype=2;
		  $sbrand=1;
           $sname = $filesop[2];
           $spartno = $filesop[1];
		   $smrp = $filesop[10];
		   $mrp = $filesop[4];
		  $ssupplier = 2;
		  $status='Active';
		  $units = 1;
		  $min_stock = '1.00';
		  //$TaxRate = $filesop[1];
		  $ItemPhoto='no_image.PNG';
		   $hsn=$filesop[3];
           $sgst=$filesop[6];
		   $cgst=$filesop[7];
		   $rate=$filesop[8];
		   $qty=$filesop[5];
          
		  $c++;
		  //"--";
		  
		  $sei="select * from m_spare where spartno='".trim($spartno)."' AND mrp='".trim($mrp)."'";
		  $Esei=mysql_query($sei);
		  $nr=mysql_num_rows($Esei);
		 // echo "</br>";
		  if($nr>0)
		  {
			$FEsei=mysql_fetch_array($Esei);
			 $is="update item_stock set StockQuantity=StockQuantity+$qty where FranchiseeId='5' AND ItemId='".$FEsei['sid']."'";
			//echo "</br>";
			$isq=mysql_query($is);  
			
			$us="update m_spare set smrp='".trim($smrp)."',mrp='".trim($mrp)."' where sid='".$FEsei['sid']."'";
			$Eus=mysql_query($us);			
		  }
		  else
		  {			
	$TaxRate=$cgst+$sgst;
	$spare="insert into m_spare set stype='$stype',sbrand='$sbrand',sname='".trim($sname)."',spartno='".trim($spartno)."',smrp='".trim($smrp)."',mrp='".trim($mrp)."',ssupplier='".trim($ssupplier)."',status='Active',units='1',min_stock='".trim($min_stock)."',TaxRate='".trim($TaxRate)."',ItemPhoto='no_image.PNG',hsn='".trim($hsn)."',sgst='".trim($sgst)."',cgst='".trim($cgst)."',rate='".trim($rate)."'";
 //"</br>";
	$spareq=mysql_query($spare);
	$spareid=mysql_insert_id();
		
	$is="insert into item_stock set FranchiseeId='5',ItemId='".$spareid."',Uom='1',StockQuantity='".$qty."'";
	$isq=mysql_query($is); 
	
	
 
		  }
		  
		  }
header("location:../inventory/s_inventory.php?s=Stock imported Sucessfully");
}
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
	 <div class="box-header with-border">
             <?php if($_REQUEST['s']!="") {?> 
			  <div class="alert alert-success">
                <strong>Stock Imported Successfully!</strong> <i class="glyphicon glyphicon-ok" style="font-size:30px;color:white"></i>
              </div> <?php } ?>
			 </div>	 
   
   
    <!-- Main content -->
    <section class="content container-fluid">
    <form role="form" method="post" autocomplete="off" enctype="multipart/form-data">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
             <!-- /.box-header -->
            <!-- form start -->
            
              <div class="box-body">
                <div class="form-group col-sm-4">
                 <label for="exampleInputFile">File Upload   |  <a href="sampleformate.csv">Sample Format</a> </label>
                  <input type="file" class="form-control" name="file" id="file" size="150" required>
				  <p class="help-block">Only CSV File Import.(Please remove column Headings before upload)</p>
                </div>
				<div class="form-group col-sm-4">
				<br/>
                 <label for="exampleInputFile"></label>
                  
                </div>
            </div>
              <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
	    <div class="box-footer">
                <button type="submit" class="btn btn-info pull-right" name="submit" value="submit" onsubmit="javascript:return confirm('Are you Sure Want to Proceed?')">Upload</button>
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
