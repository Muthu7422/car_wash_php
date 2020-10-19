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
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body class="hold-transition skin-blue sidebar-mini" style="background-color: #e6f2ff">
<div class="container">
<div class="row">
<div class="col-sm-8 col-sm-offset-2" style="margin-top :150px">
 <div class="box-header with-border">
 <?php if($_REQUEST['wrong']!="") {?> 
<div class="alert" style="background-color:#FDF5E6; text-align:center;font-size:15px">
<strong>Warning!</strong> The pin code does not match so please enter again <i class="fa fa-warning" style="font-size:36px"></i></i>
</div> <?php } ?>
</div></div>
 <form role="form" method="post" action="s_job_card_close_addQ.php" autocomplete="off">
<div class="col-sm-8 col-sm-offset-2" style="Text-Align:right;font-size:30px"><a href="s_jobcard_view.php"><i class="fa fa-times" aria-hidden="true"></i></a></div>
<div class="col-sm-8 col-sm-offset-2" style="border: 2px solid #337ab7;border-radius: 12px; background-color:#FFF5EE">
 <?php include("../../includes_db_js.php"); ?>
 <br><br>
               
                <div class="form-group col-sm-4 hidden">
                  <label for="party">Job Card Id</label>
				  <input type="text" class="form-control" name="JobcardId" id="JobcardId" placeholder="Job Card Id" value="<?php echo $_REQUEST['JobcardId'];?>" onKeyPress="return tabE(this,event)" readonly>
				   <input type="text" class="form-control" name="job_card_no" id="job_card_no" placeholder="Job Card Id" value="<?php echo $_REQUEST['job_card_no'];?>" onKeyPress="return tabE(this,event)" readonly>
                </div> 
                    
                  <div class="form-group col-sm-2">
                  <label for="party">SMS </label>
				  </div>
				  <div class="form-group col-sm-4">
				   <select class="form-control" name="sms" id="sms"  onKeyPress="return tabE(this,event)" Required>  
					<option value="Enable">Enable</option>
					<option value="Disable">Disable</option>
				  </div>
				
				 <div class="form-group col-sm-2">
				   <input type="Submit" name="close" id="close" style="background-color:#37B8F8;color:#000000" value="CLOSE THE JOB CARD"  class="form-control">           	
				 </div>
				  				  
			  </div>
			</form>
		 </div>
 
</body>
</html>