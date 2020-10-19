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

<body class="hold-transition skin-blue sidebar-mini">
<!-- Anchor start -->
<!--<a href="#" onClick="popup_window_show('#popup_window_id_B2562FB5F3577D989E47A6B8FB6A60D4', { pos : 'window-center', parent : this, x : 0, y : 0, width : 'auto' }); return false;">Open popup window</a>-->
<!-- Anchor end -->

<!-- Popup Window start -->

<!-- Popup Window end -->
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
        User Create
        <small></small>
      </h1>
    </section>

    <!-- Main content -->
	<?php 
	$ss="select * from f_user_create";
$Ess=mysql_query($ss);
$Fss=mysql_fetch_array($Ess);
$ns=mysql_num_rows($Ess);
$ns1=$ns+0001;
$dc="US".$ns1;
	
	?>
    <section class="content container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Create User </h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
			<?php
			if(isset($_REQUEST['id'])!="")
			{
			$ct1="select * from t_category where id='".$_REQUEST['id']."'";
				$Ect1=mysql_query($ct1);
				$Fct1=mysql_fetch_array($Ect1);
			?>
            <form class="form-horizontal" method="post" action="category_edit.php?id=<?php echo $Fct1['id']; ?>">
              <div class="box-body">
                  
                <div class="form-group">
                  <label for="catcode" class="col-sm-3 control-label">Category Code</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="categorycode" id="categorycode" value="<?php echo $Fct1['code']; ?>" autocomplte="off" placeholder="Category Code" required>
                  </div>
                </div>
                <div class="form-group">
                      <label for="catname" class="col-sm-3 control-label">Category Name</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="categoryname" autofocus="autofocus" id="categoryname" value="<?php echo $Fct1['category']; ?>" placeholder="Category Name" required>
                      </div>
                    </div>                   
                  <?php 
					if(isset($_REQUEST['category']))
				     {
					  ?>
					   <script type="text/javascript">
					   </script>
					   <?PHP
					   }
					   ?>
              </div>
              <!-- /.box-body -->
              
                <button type="submit" class="btn btn-default ">Cancel</button>
                <button type="submit" onClick="popup_window_show('#popup_window_id_B2562FB5F3577D989E47A6B8FB6A60D4', { pos : 'window-center', parent : this, x : 0, y : 0, width : 'auto' })" class="btn btn-info pull-right">Save Changes</button>
				
				

              </div>
              <!-- /.box-footer -->
            </form>
			<?php
			}
			else
			{
			
			?>
            <form class="form-horizontal" method="post" action="f_user_create_act.php" autocomplete="off">
              <div class="box-body">
                  
                <div class="form-group">
                  <label for="catcode" class="col-sm-3 control-label">User Code</label>
                  <div class="col-sm-2">
                    <input type="text" class="form-control" name="user_id" id="user_id" value="<?php echo $dc; ?>" onKeyPress="return tabE(this,event)" required readonly="ture">
                  </div>
                </div>
                <div class="form-group">
                      <label for="catname" class="col-sm-3 control-label">Finacial Year</label>
                      <div class="col-sm-4">
                        <select type="text" class="form-control" name="financial_year" id="financial_year"  placeholder="Category Name" required>
						 <?php
				  $sql="select * from f_financial_year";
				  $result=mysql_query($sql);
				  while ($row = mysql_fetch_array($result)) {
				  
				  ?>
				  <option value="<?php echo $row['financial_year']; ?>"><?php echo $row['financial_year']; ?></option>
				  <?php
				  }
				  
				  ?>
						</select>
                      </div>
                    </div> 
					<div class="form-group">
                      <label for="catname" class="col-sm-3 control-label">User Name</label>
                      <div class="col-sm-4">
                        <input type="text" class="form-control" name="user_name" id="user_name"  placeholder="User Name" required>
                      </div>
                    </div> <div class="form-group">
                      <label for="catname" class="col-sm-3 control-label">Branch Name</label>
                      <div class="col-sm-4">
                        <select type="text" class="form-control" name="company_name" id="company_name" required>
						 <?php
				  $sql="select * from m_franchisee";
				  $result=mysql_query($sql);
				  while ($row = mysql_fetch_array($result)) {
				  
				  ?>
				  <option value="<?php echo $row['id']; ?>"><?php echo $row['franchisee_name']; ?></option>
				  <?php
				  }
				  
				  ?>
						</select>
                      </div>
                    </div>
					<div class="form-group">
                      <label for="catname" class="col-sm-3 control-label">Password</label>
                   	  <div class="col-sm-4">
                        <input type="text" class="form-control" name="password" id="password"  placeholder="Password" required>
                      </div>
                    
					</div>                   
                  
				   
				  
				  
              </div>
			  <div class="box-body">
				<div class="box-header with-border">
					<h3 class="box-title"> User Access Pages</h3>
				</div>
			    <?php 
			    $slm="select id,category,cicon,url from t_lmenu where parent='0'";
				$Eslm=mysql_query($slm);
				$i=0;
				while($FEslm=mysql_fetch_array($Eslm))
				{
					$i++;
				?>
				<div class="form-group">
				<div class="col-sm-2"></div>
				<div class="col-sm-4 checkbox">
					<label><input type="checkbox" name="check_list[]" id="check_list[]" value="<?php echo $FEslm['id']; ?>"><b><?php echo $i.". ".$FEslm['category']; ?></b></label>
					<?php 
					$ssc1="select id,category,cicon,url from t_lmenu where parent='".$FEslm['id']."'";
					$Essc1=mysql_query($ssc1);
					$nsc1=mysql_num_rows($Essc1);
					$j=0;
					while($FEssc1=mysql_fetch_array($Essc1))
					{
						$j++;
		    		?>
					<div class="form-group">
				    <div class="col-sm-2"></div>
				    <div class="col-sm-8 checkbox">
					<label><input type="checkbox" name="check_list[]" id="check_list[]" value="<?php echo $FEssc1['id']; ?>"><?php echo  $i.". ".$j.". ".$FEssc1['category']; ?></label>
					
					<?php 
					$ssc2="select id,category,cicon,url from t_lmenu where parent='".$FEssc1['id']."'";
					$Essc2=mysql_query($ssc2);
					$nsc2=mysql_num_rows($Essc2);
					$k=0;
					while($FEssc2=mysql_fetch_array($Essc2))
					{
						$k++;
		    		?>
					<div class="form-group">
				    <div class="col-sm-2"></div>
				    <div class="col-sm-10 checkbox">
					<label><input type="checkbox" name="check_list[]" id="check_list[]" value="<?php echo $FEssc2['id']; ?>"><i><?php echo $i.". ".$j.". ".$k.". ".$FEssc2['category']; ?></i></label>
					</div>
				    
				    </div>
					<?php } ?>
							
					
				    </div>
				    <div class="col-sm-1"></div>
					<div class="col-sm-1"></div>
				    </div>
					<?php } ?>
				</div>
				<div class="col-sm-6"></div>
				
				</div>
				<?php } ?>
				
				
			  </div>
			  
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-default ">Cancel</button>
                <button onClick="return confirm('Are You Sure Want to Save?');" type="submit" class="btn btn-info pull-right">Save Changes</button>
              </div>
              <!-- /.box-footer -->
            </form>
			<?php
			}
			?>
          </div>
        </div>
      </div>
      <div class="hidden">
        <!-- left column -->
        <div class="col-md-12">
            
            <div class="box">
            <div class="box-header">
              <h3 class="box-title">Available Categories</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Category Code</th>
                  <th>Category Name</th>
                  <th width="15%">Edit / Delete</th>
                </tr>
                </thead>
                <tbody>
				<?php
				$ct="select * from t_category";
				$Ect=mysql_query($ct);
				while($Fct=mysql_fetch_array($Ect))
				{
				?>
                <tr>
                  <td><?php echo $Fct['code']; ?></td>
                  <td><?php echo $Fct['category']; ?></td>
                  <td>
                      <a href="category.php?id=<?php echo $Fct['id']; ?>" class="btn-box-tool"><i class="fa fa-edit custom-icon1"></i></a>
                      <a href="category_delete.php?id=<?php echo $Fct['id']; ?>" onClick="popup_window_show('#popup_window_id_33ED1F5BB26C0F584EEC6292161E14FB', { pos : 'window-center', parent : this, x : 0, y : 0, width : 'auto' });;" class="btn-box-tool"><i class="fa fa-close custom-icon1"></i></a>
                  </td>
                </tr>
				<?php
				}
				?>
                  </tbody>
                <tfoot>
                <tr>
                  <th>Category Code</th>
                  <th>Category Name</th>
                  <th>Edit / Delete</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
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