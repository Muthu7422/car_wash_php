<?php
include("includes.php");
//include("redirect.php");
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Feed Back</title>
</head>
<body class="">
<div class="container-fluid" style="overflow-x:auto;"> 
    <section class="content container-fluid">
		 <form role="form" method="post" action="feedback_act.php" autocomplete="off">
		<?php
		$jid="select * from s_job_card where id='".$_REQUEST['id']."'";
		$jidq=mysql_query($jid);
		$jidf=mysql_fetch_array($jidq);
		
		$ss="select * from m_franchisee where franchisee_id='F1'";
		$Ess=mysql_query($ss); 
		$FEss=mysql_fetch_array($Ess);
		?>
		 <div class="col-md-3" style="display:none"><input type="text" name="jid" id="jid" class="form-control" value="<?php echo $jidf['id'];?>" readonly></div>
		<h2><center><?php echo $FEss['franchisee_name']; ?></center></h2><br>
		 <center><?php echo $FEss['address']; ?><br></center>
		  <center> <?php echo $FEss['con_number'];?></center><br><br>
	<font>Please take a few minutes to give us feedback about our service by filling in this short Customer Feedback Form. We are conducting this research in order to measure your level of satisfaction with the quality of our service. We thank you for your participation.</font>
 				<hr>
		<table id="" class="table table-bordered table-striped" cellspacing="10">
		<thead><h2>Overall experience with our service</h2></thead>
				<tbody>	
				
				<h4>1. How would you rate your overall experience with our service?</h4>
				<div class="row">
               <div class="col-md-3"><input type="radio" name="q1" <?php if (isset($q1) && $q1=="Good") echo "checked";?> value="2">Good</div>
                <div class="col-md-3"><input type="radio" name="q1" <?php if (isset($q1) && $q1=="Average") echo "checked";?> value="1.5">Average</div>
                 <div class="col-md-3"><input type="radio" name="q1" <?php if (isset($q1) && $q1=="Poor") echo "checked";?> value="1">Poor</div>
				 
                   </div>			
				
 				
				<h4>2. How would you rate our prices?</h4>
				<div class="row">
                <div class="col-md-3"><input type="radio" name="q2" <?php if (isset($q2) && $q2=="Good") echo "checked";?> value="2">Good</div>
                <div class="col-md-3"><input type="radio" name="q2" <?php if (isset($q2) && $q2=="Average") echo "checked";?> value="1.5">Average</div>
                <div class="col-md-3"><input type="radio" name="q2" <?php if (isset($q2) && $q2=="Poor") echo "checked";?> value="1">Poor</div>
				</div>	
				
				<h4>3. How satisfied are you with the timeliness of order delivery? </h4>
				<div class="row">
               <div class="col-md-3"><input type="radio" name="q3" <?php if (isset($q3) && $q3=="Good") echo "checked";?> value="2">Good</div>
                <div class="col-md-3"><input type="radio" name="q3" <?php if (isset($q3) && $q3=="Average") echo "checked";?> value="1.5">Average</div>
                 <div class="col-md-3"><input type="radio" name="q3" <?php if (isset($q3) && $q3=="Poor") echo "checked";?> value="1">Poor</div>
				 
                   </div>	
				   
				
				<h4>4. How satisfied are you with the customer support? </h4>
				<div class="row">
               <div class="col-md-3"><input type="radio" name="q4" <?php if (isset($q4) && $q4=="Good") echo "checked";?> value="2">Good</div>
                <div class="col-md-3"><input type="radio" name="q4" <?php if (isset($q4) && $q4=="Average") echo "checked";?> value="1.5">Average</div>
                 <div class="col-md-3"><input type="radio" name="q4" <?php if (isset($q4) && $q4=="Poor") echo "checked";?> value="1">Poor</div>
				 
                   </div>	
				
				<h4>5. Would you recommend our product / service to other people?</h4>
				<div class="row">
               <div class="col-md-3"><input type="radio" name="q5" <?php if (isset($q5) && $q5=="Good") echo "checked";?> value="2">Good</div>
                <div class="col-md-3"><input type="radio" name="q5" <?php if (isset($q5) && $q5=="Average") echo "checked";?> value="1.5">Average</div>
                 <div class="col-md-3"><input type="radio" name="q5" <?php if (isset($q5) && $q5=="Poor") echo "checked";?> value="1">Poor</div>
				 
                   </div>	
				
			</tbody>
				 </table>
				 <b>E-mail:</b>
					<h5>Only if you want to hear more from us.</h5>
					<div class="form-group">
						<input class="form-control" placeholder="Your email address">
					</div><br>
			<div class="row">
				<div class="col-md-4 col-lg-2">
						<button class="btn btn-primary btn-block">Send Feedback</button>
				</div>
			</div>
	 </form>				
  </section>
</div>
</body>
</html>