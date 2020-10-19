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
  <title>Protouch | Feed Back</title>
   
   <link rel="stylesheet" type="text/css" href="starrating/style.css">

<script src="https://use.fontawesome.com/49b98aaeb5.js"></script>
</head>
<body class="">

<div class="container-fluid" style="overflow-x:auto;"> 

<?php
		$j="select * from s_job_card where id='".$_REQUEST['id']."'";
		$ji=mysqli_query($conn,$j);
		$jiq=mysqli_fetch_array($ji);
		$nosa=mysqli_num_rows($ji);
		
		
		$TotalRating=$jiq['q1']+$jiq['q2']+$jiq['q3']+$jiq['q4']+$jiq['q5']+$jiq['q6']+$jiq['q7'];
		
		
	 	$date = $jiq['jdate']; 
	  	$nextdate= date('Y-m-d', strtotime($date. ' + 3 days'));
	 	$currentdate=date("Y-m-d")
		?>
		<?php
		if($TotalRating < '1') 
		{
   
			if($currentdate < $nextdate)
			{
		?>

    <section class="content container-fluid">
		<form role="form" method="post" action="feedback_act1.php" autocomplete="off">
		<?php
		$jid="select * from s_job_card where id='".$_REQUEST['id']."'";
		$jidq=mysqli_query($conn,$jid);
		$jidf=mysqli_fetch_array($jidq);
		
		$ss="select * from m_franchisee where franchisee_id='F1'";
		$Ess=mysqli_query($conn,$ss); 
		$FEss=mysqli_fetch_array($Ess);
		?>
		 <div class="col-md-3" style="display:none"><input type="text" name="jid" id="jid" class="form-control" value="<?php echo $jidf['id'];?>" readonly></div>
		<h2><center><?php echo $FEss['franchisee_name']; ?></center></h2>
		<center><?php echo $FEss['address']; ?></center>
		<center> <?php echo $FEss['con_number'];?></center>
	    <font>Please take a few minutes to give us feedback about our service by filling in this short Customer Feedback Form. We are conducting this research in order to measure your level of satisfaction with the quality of our service. We thank you for your participation.</font>
 				<hr>		
		<h2>Overall experience with our service</h2>
		<section class="content container-fluid">
		<div class="row">
		 <div class="col-sm-12"><h4>1. How would you rate our customer friendliness?</h4></div>
		 </div>
		 <div class="row">
		 <div class="col-sm-12">
		 <div class="rates">
					<input type="radio" id="star5" name="rate" value="2.0" /><label for="star5" title="text">5 stars</label>
					<input type="radio" id="star4" name="rate" value="1.6" /><label for="star4" title="text">4 stars</label>
					<input type="radio" id="star3" name="rate" value="1.2" /><label for="star3" title="text">3 stars</label>
					<input type="radio" id="star2" name="rate" value="0.8" /><label for="star2" title="text">2 stars</label>
					<input type="radio" id="star1" name="rate" value="0.4" /><label for="star1" title="text">1 star</label>
		</div>
		</div></div>
		</br>
		
		<div class="row">
		<div class="col-sm-12"><h4>2. Kindly rate the exterior cleanliness of your car</h4></div>
		</div>
		<div class="row">
		<div class="col-sm-12">
		<div class="rates">
					<input type="radio" id="star51" name="rate1" value="2.0" /><label for="star51" title="text">5 stars</label>
					<input type="radio" id="star41" name="rate1" value="1.6" /><label for="star41" title="text">4 stars</label>
					<input type="radio" id="star31" name="rate1" value="1.2" /><label for="star31" title="text">3 stars</label>
					<input type="radio" id="star21" name="rate1" value="0.8" /><label for="star21" title="text">2 stars</label>
					<input type="radio" id="star11" name="rate1" value="0.4" /><label for="star11" title="text">1 star</label>
		</div>
		</div>
		</div>		
		</br>
		
		<div class="row">
		<div class="col-sm-12"><h4>3. If service provided, kindly rate the interior cleanliness of your car</h4></div>
		</div>
		<div class="row">
		<div class="col-sm-12">
		<div class="rates">
					<input type="radio" id="star52" name="rate2" value="2.0" /><label for="star52" title="text">5 stars</label>
					<input type="radio" id="star42" name="rate2" value="1.6" /><label for="star42" title="text">4 stars</label>
					<input type="radio" id="star32" name="rate2" value="1.2" /><label for="star32" title="text">3 stars</label>
					<input type="radio" id="star22" name="rate2" value="0.8" /><label for="star22" title="text">2 stars</label>
					<input type="radio" id="star12" name="rate2" value="0.4" /><label for="star12" title="text">1 star</label>
		</div>
		</div>
		</div>		
		</br>
		
		<div class="row">
		<div class="col-sm-12"><h4>4. If car detailing was provided, kindly rate the quality of the service</h4></div>
		</div>
		<div class="row">
		<div class="col-sm-12">
		<div class="rates">
					<input type="radio" id="star53" name="rate3" value="2.0" /><label for="star53" title="text">5 stars</label>
					<input type="radio" id="star43" name="rate3" value="1.6" /><label for="star43" title="text">4 stars</label>
					<input type="radio" id="star33" name="rate3" value="1.2" /><label for="star33" title="text">3 stars</label>
					<input type="radio" id="star23" name="rate3" value="0.8" /><label for="star23" title="text">2 stars</label>
					<input type="radio" id="star13" name="rate3" value="0.4" /><label for="star13" title="text">1 star</label>
		</div>
		</div>
		</div>		
		</br>
		
		<div class="row">
		<div class="col-sm-12"><h4>5. Kindly rate the cleanliness of our facilities</h4></div>
		</div>
		<div class="row">
		<div class="col-sm-12">
		<div class="rates">
					<input type="radio" id="star54" name="rate4" value="2.0" /><label for="star54" title="text">5 stars</label>
					<input type="radio" id="star44" name="rate4" value="1.6" /><label for="star44" title="text">4 stars</label>
					<input type="radio" id="star34" name="rate4" value="1.2" /><label for="star34" title="text">3 stars</label>
					<input type="radio" id="star24" name="rate4" value="0.8" /><label for="star24" title="text">2 stars</label>
					<input type="radio" id="star14" name="rate4" value="0.4" /><label for="star14" title="text">1 star</label>
		</div>
		</div>
		</div>		
		</br>
		
			<div class="row">
		<div class="col-sm-12"><h4>6. How would you rate the quality of vacuuming</h4></div>
		</div>
		<div class="row">
		<div class="col-sm-12">
		<div class="rates">
					<input type="radio" id="star55" name="rate5" value="2.0" /><label for="star55" title="text">5 stars</label>
					<input type="radio" id="star46" name="rate5" value="1.6" /><label for="star46" title="text">4 stars</label>
					<input type="radio" id="star35" name="rate5" value="1.2" /><label for="star35" title="text">3 stars</label>
					<input type="radio" id="star25" name="rate5" value="0.8" /><label for="star25" title="text">2 stars</label>
					<input type="radio" id="star15" name="rate5" value="0.4" /><label for="star15" title="text">1 star</label>
		</div>
		</div>
		</div>		
		</br>
		
			<div class="row">
		<div class="col-sm-12"><h4>7. Would you recommend us to your friends & family?</h4></div>
		</div>
		<div class="row">
		<div class="col-sm-12">
		
					 <input type="radio" name="yes_no" value="Yes" checked> Yes<br>
					<input type="radio" name="yes_no" value="No"> No<br>
					
	
		</div>
		</div>		
		</br>
		
		<div class="row">
		<div class="col-sm-12"><h4>8. Overall, how would you rate the services provided to you?</h4></div>
		</div>
		<div class="row">
		<div class="col-sm-12">
		<div class="rates">
					<input type="radio" id="star56" name="rate6" value="2.0" /><label for="star56" title="text">5 stars</label>
					<input type="radio" id="star47" name="rate6" value="1.6" /><label for="star47" title="text">4 stars</label>
					<input type="radio" id="star36" name="rate6" value="1.2" /><label for="star36" title="text">3 stars</label>
					<input type="radio" id="star26" name="rate6" value="0.8" /><label for="star26" title="text">2 stars</label>
					<input type="radio" id="star16" name="rate6" value="0.4" /><label for="star16" title="text">1 star</label>
		</div>
		</div>
		</div>		
		</br>
		
			<div class="row" >
		<div class="col-sm-12"><h4>Comments?</h4></div>
		</div>
		<div class="row">
		<div class="col-sm-12" style="border-bottom: 2px solid red;">
		
					<textarea type="text" id="Comments" name="Comments" rows="4" cols="50"></textarea>
					
		
		</div>
		</div>	
		</br>		
<i class="fa fa-map-marker fa-1.5x"  style="color:green" ><font color="black" style="font-size:18px;">Prozone Mall, Coimbatore - 641035</font></i><span style="padding-left:35px"></span>
<i class="fa fa-phone fa-1.5x"  style="color:red" ><font color="black" style="font-size:18px;"> 8870 6888 77</font></i><span style="padding-left:35px"></span>
<i class="fa fa-envelope fa-1.5x"  style="color:black" ><font color="black" style="font-size:18px;"> nfo@protouch.co.in</font></i><span style="padding-left:35px"></span>
<a href="http://www.protouch.co.in/"><i class="fa fa-globe fa-1.5x"  style="color:black" ><font color="black" style="font-size:18px;"> www.protouch.co.in</font></i></a>
		
		</br>
</br>
<i class="fa fa-whatsapp fa-1.5x"  style="color:green" ><font color="black" style="font-size:19px;">/ 8870688877</font></i><span style="padding-left:35px"></span>
<a href="https://www.instagram.com/protouchindia/"><i class="fa fa-instagram fa-1.5x"  style="color:red" ><font color="black" style="font-size:19px;">/ protouchindia</font></i></a><span style="padding-left:35px"></span>
<a href="https://www.facebook.com/ProTouchIndia/"><i class="fa fa-facebook-square fa-1.5x"  style="color:blue" ><font color="black" style="font-size:19px;">/ protouchindia</font></i></a>
		
		</br></br>
		</section>	
			<div class="row">
				<div class="col-md-4 col-lg-2">
						<button class="btn btn-primary">Send Feedback</button>
				</div>
		</div>
	 </form>
</section>
<?php

		}
		else
		{
?>

<a href="http://www.vertexsolution.co.in/"><i class="fa fa-globe fa-1.5x"  style="color:black" ><font color="black" style="font-size:18px;">Click</font></i></a>
<?php

		}
		?>
		<?php

		}
		else
		{
?>

<a href="http://www.vertexsolution.co.in/"><i class="fa fa-globe fa-1.5x"  style="color:black" ><font color="black" style="font-size:18px;">Click</font></i></a>
<?php

		}
		?>
</div>

</body>
</html>