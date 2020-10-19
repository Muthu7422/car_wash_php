<?php
include("../../includes.php");
include("../../redirect.php");
?>
<!DOCTYPE html>
<html>
<?php
header('Content-type: application/excel');
$filename = 'Overall Overview'.date("d-m-Y").'.xls';
header('Content-Disposition: attachment; filename='.$filename);

?>
<body>
     <table id="example1" class="table table-bordered table-striped" width="100%">
                <thead>
				
				 <tr><h3>Company Name : <?php echo $_SESSION['company']?></h3></tr>
				 <tr><h4>Overall Overview</h4></tr>
                

		   

<tr style="background-color:#FAEBD7">
<th>P&L metrics</th>
<th>January</th>
<th>February</th>
<th>March</th>
<th>April</th>
<th>May</th>
<th>June</th>
<th>July</th>
<th>August</th>
<th>September</th>
<th>October</th>
<th>November</th>
<th>December</th>
</tr>
</thead>
<tbody>

 <?php
		$year=date("Y");
		
		  $jobsjan="select sum(ServiceAmountAfterGst) as ServiceAmountAfterGst from a_final_bill where bill_date between '$year-01-01' and '$year-01-31'"; 
			$jobsqjan=mysql_query($jobsjan);
		    $jobsfjan=mysql_fetch_array($jobsqjan); 
			
			 $jobsfeb="select sum(ServiceAmountAfterGst) as ServiceAmountAfterGst from a_final_bill where  bill_date between '$year-02-01' and '$year-02-28'"; 
			$jobsqfeb=mysql_query($jobsfeb);
		    $jobsffeb=mysql_fetch_array($jobsqfeb);
			
			$jobsmarch="select sum(ServiceAmountAfterGst) as ServiceAmountAfterGst from a_final_bill where  bill_date between '$year-03-01' and '$year-03-31'"; 
			$jobsqmarch=mysql_query($jobsmarch);
		    $jobsfmarch=mysql_fetch_array($jobsqmarch);
			
			$jobsapril="select sum(ServiceAmountAfterGst) as ServiceAmountAfterGst from a_final_bill where  bill_date between '$year-04-01' and '$year-04-30'"; 
			$jobsqapril=mysql_query($jobsapril);
		    $jobsfapril=mysql_fetch_array($jobsqapril);
			
			$jobsmay="select sum(ServiceAmountAfterGst) as ServiceAmountAfterGst from a_final_bill where  bill_date between '$year-05-01' and '$year-05-31'"; 
			$jobsqmay=mysql_query($jobsmay);
		    $jobsfmay=mysql_fetch_array($jobsqmay);
			
			$jobsjune="select sum(ServiceAmountAfterGst) as ServiceAmountAfterGst from a_final_bill where bill_date between '$year-06-01' and '$year-06-31'"; 
			$jobsqjune=mysql_query($jobsjune);
		    $jobsfjune=mysql_fetch_array($jobsqjune);
			
			$jobsjuly="select sum(ServiceAmountAfterGst) as ServiceAmountAfterGst from a_final_bill where  bill_date between '$year-07-01' and '$year-07-31'"; 
			$jobsqjuly=mysql_query($jobsjuly);
		    $jobsfjuly=mysql_fetch_array($jobsqjuly);
			
			$jobsaug="select sum(ServiceAmountAfterGst) as ServiceAmountAfterGst from a_final_bill where  bill_date between '$year-08-01' and '$year-08-31'"; 
			$jobsqaug=mysql_query($jobsaug);
		    $jobsfaug=mysql_fetch_array($jobsqaug);
			
			$jobssep="select sum(ServiceAmountAfterGst) as ServiceAmountAfterGst from a_final_bill where  bill_date between '$year-09-01' and '$year-09-31'"; 
			$jobsqsep=mysql_query($jobssep);
		    $jobsfsep=mysql_fetch_array($jobsqsep);
			
			$jobsoct="select sum(ServiceAmountAfterGst) as ServiceAmountAfterGst from a_final_bill where  bill_date between '$year-10-01' and '$year-10-31'"; 
			$jobsqoct=mysql_query($jobsoct);
		    $jobsfoct=mysql_fetch_array($jobsqoct);
			
			$jobsnov="select sum(ServiceAmountAfterGst) as ServiceAmountAfterGst from a_final_bill where bill_date between '$year-11-01' and '$year-11-31'"; 
			$jobsqnov=mysql_query($jobsnov);
		    $jobsfnov=mysql_fetch_array($jobsqnov);
			
			$jobsdec="select sum(ServiceAmountAfterGst) as ServiceAmountAfterGst from a_final_bill where bill_date between '$year-12-01' and '$year-12-31'"; 
			$jobsqdech=mysql_query($jobsdec);
		    $jobsfdec=mysql_fetch_array($jobsqdech);
			
			
		  
		 
		?>
		
		<tr>
		
		<td style="background-color:#F0F8FF"><b>Revenue : </b></td>
		<td><?php echo number_format($jobsfjan['ServiceAmountAfterGst'],2);?></td>
		<td><?php echo number_format($jobsffeb['ServiceAmountAfterGst'],2);?></td>
		<td><?php echo number_format($jobsfmarch['ServiceAmountAfterGst'],2);?></td>
		<td><?php echo number_format($jobsfapril['ServiceAmountAfterGst'],2);?></td>
		<td><?php echo number_format($jobsfmay['ServiceAmountAfterGst'],2);?></td>
		<td><?php echo number_format($jobsfjune['ServiceAmountAfterGst'],2);?></td>
		<td><?php echo number_format($jobsfjuly['ServiceAmountAfterGst'],2);?></td>
		<td><?php echo number_format($jobsfaug['ServiceAmountAfterGst'],2);?></td>
		<td><?php echo number_format($jobsfsep['ServiceAmountAfterGst'],2);?></td>
		<td><?php echo number_format($jobsfoct['ServiceAmountAfterGst'],2);?></td>
		<td><?php echo number_format($jobsfnov['ServiceAmountAfterGst'],2);?></td>
		<td><?php echo number_format($jobsfdec['ServiceAmountAfterGst'],2);?></td>
		</tr>
		

<?php

$year=date("Y");
		
		  $jobsjan="select sum(ExpenseAmount) as ExpenseAmount from expense_details where ExpenseDate between '$year-01-01' and '$year-01-31'"; 
			$jobsqjan=mysql_query($jobsjan);
		    $jobsfjan=mysql_fetch_array($jobsqjan); 
			
			 $jobsfeb="select sum(ExpenseAmount) as ExpenseAmount from expense_details where ExpenseDate between '$year-02-01' and '$year-02-28'"; 
			$jobsqfeb=mysql_query($jobsfeb);
		    $jobsffeb=mysql_fetch_array($jobsqfeb);
			
			$jobsmarch="select sum(ExpenseAmount) as ExpenseAmount  from expense_details where ExpenseDate between '$year-03-01' and '$year-03-31'"; 
			$jobsqmarch=mysql_query($jobsmarch);
		    $jobsfmarch=mysql_fetch_array($jobsqmarch);
			
			$jobsapril="select sum(ExpenseAmount) as ExpenseAmount  from expense_details where ExpenseDate between '$year-04-01' and '$year-04-30'"; 
			$jobsqapril=mysql_query($jobsapril);
		    $jobsfapril=mysql_fetch_array($jobsqapril);
			
			$jobsmay="select sum(ExpenseAmount) as ExpenseAmount  from expense_details where ExpenseDate between '$year-05-01' and '$year-05-31'"; 
			$jobsqmay=mysql_query($jobsmay);
		    $jobsfmay=mysql_fetch_array($jobsqmay);
			
			$jobsjune="select sum(ExpenseAmount) as ExpenseAmount  from expense_details where ExpenseDate between '$year-06-01' and '$year-06-31'"; 
			$jobsqjune=mysql_query($jobsjune);
		    $jobsfjune=mysql_fetch_array($jobsqjune);
			
			$jobsjuly="select sum(ExpenseAmount) as ExpenseAmount  from expense_details where ExpenseDate between '$year-07-01' and '$year-07-31'"; 
			$jobsqjuly=mysql_query($jobsjuly);
		    $jobsfjuly=mysql_fetch_array($jobsqjuly);
			
			$jobsaug="select sum(ExpenseAmount) as ExpenseAmount  from expense_details where ExpenseDate between '$year-08-01' and '$year-08-31'"; 
			$jobsqaug=mysql_query($jobsaug);
		    $jobsfaug=mysql_fetch_array($jobsqaug);
			
			$jobssep="select sum(ExpenseAmount) as ExpenseAmount  from expense_details where ExpenseDate between '$year-09-01' and '$year-09-31'"; 
			$jobsqsep=mysql_query($jobssep);
		    $jobsfsep=mysql_fetch_array($jobsqsep);
			
			$jobsoct="select sum(ExpenseAmount) as ExpenseAmount  from expense_details where ExpenseDate between '$year-10-01' and '$year-10-31'"; 
			$jobsqoct=mysql_query($jobsoct);
		    $jobsfoct=mysql_fetch_array($jobsqoct);
			
			$jobsnov="select sum(ExpenseAmount) as ExpenseAmount  from expense_details where ExpenseDate between '$year-11-01' and '$year-11-31'"; 
			$jobsqnov=mysql_query($jobsnov);
		    $jobsfnov=mysql_fetch_array($jobsqnov);
			
			$jobsdec="select sum(ExpenseAmount) as ExpenseAmount  from expense_details where ExpenseDate between '$year-12-01' and '$year-12-31'"; 
			$jobsqdech=mysql_query($jobsdec);
		    $jobsfdec=mysql_fetch_array($jobsqdech);
			
			
			
			
		?>
		
		<tr>
		
		<td style="background-color:#F0F8FF"><b>Operating expenses : </b></td>
		<td><?php echo number_format($jobsfjan['ExpenseAmount'],2);?></td>
		<td><?php echo number_format($jobsffeb['ExpenseAmount'],2);?></td>
		<td><?php echo number_format($jobsfmarch['ExpenseAmount'],2);?></td>
		<td><?php echo number_format($jobsfapril['ExpenseAmount'],2);?></td>
		<td><?php echo number_format($jobsfmay['ExpenseAmount'],2);?></td>
		<td><?php echo number_format($jobsfjune['ExpenseAmount'],2);?></td>
		<td><?php echo number_format($jobsfjuly['ExpenseAmount'],2);?></td>
		<td><?php echo number_format($jobsfaug['ExpenseAmount'],2);?></td>
		<td><?php echo number_format($jobsfsep['ExpenseAmount'],2);?></td>
		<td><?php echo number_format($jobsfoct['ExpenseAmount'],2);?></td>
		<td><?php echo number_format($jobsfnov['ExpenseAmount'],2);?></td>
		<td><?php echo number_format($jobsfdec['ExpenseAmount'],2);?></td>
		</tr>
		
		<tr>
		<?php
		 $jobsjan1="select sum(ServiceAmountAfterGst) as ServiceAmountAfterGst from a_final_bill where bill_date between '$year-01-01' and '$year-01-31'"; 
			$jobsqjan1=mysql_query($jobsjan1);
		    $jobsfjan1=mysql_fetch_array($jobsqjan1); 
			
			
			 $jobsfeb1="select sum(ServiceAmountAfterGst) as ServiceAmountAfterGst from a_final_bill where  bill_date between '$year-02-01' and '$year-02-28'"; 
			$jobsqfeb1=mysql_query($jobsfeb1);
		    $jobsffeb1=mysql_fetch_array($jobsqfeb1);
			
			$jobsmarch1="select sum(ServiceAmountAfterGst) as ServiceAmountAfterGst from a_final_bill where  bill_date between '$year-03-01' and '$year-03-31'"; 
			$jobsqmarch1=mysql_query($jobsmarch1);
		    $jobsfmarch1=mysql_fetch_array($jobsqmarch1);
			
			$jobsapril1="select sum(ServiceAmountAfterGst) as ServiceAmountAfterGst from a_final_bill where  bill_date between '$year-04-01' and '$year-04-30'"; 
			$jobsqapril1=mysql_query($jobsapril1);
		    $jobsfapril1=mysql_fetch_array($jobsqapril1);
			
			$jobsmay1="select sum(ServiceAmountAfterGst) as ServiceAmountAfterGst from a_final_bill where  bill_date between '$year-05-01' and '$year-05-31'"; 
			$jobsqmay1=mysql_query($jobsmay1);
		    $jobsfmay1=mysql_fetch_array($jobsqmay1);
			
			$jobsjune1="select sum(ServiceAmountAfterGst) as ServiceAmountAfterGst from a_final_bill where bill_date between '$year-06-01' and '$year-06-31'"; 
			$jobsqjune1=mysql_query($jobsjune1);
		    $jobsfjune1=mysql_fetch_array($jobsqjune1);
			
			$jobsjuly1="select sum(ServiceAmountAfterGst) as ServiceAmountAfterGst from a_final_bill where  bill_date between '$year-07-01' and '$year-07-31'"; 
			$jobsqjuly1=mysql_query($jobsjuly1);
		    $jobsfjuly1=mysql_fetch_array($jobsqjuly1);
			
			$jobsaug1="select sum(ServiceAmountAfterGst) as ServiceAmountAfterGst from a_final_bill where  bill_date between '$year-08-01' and '$year-08-31'"; 
			$jobsqaug1=mysql_query($jobsaug1);
		    $jobsfaug1=mysql_fetch_array($jobsqaug1);
			
			$jobssep1="select sum(ServiceAmountAfterGst) as ServiceAmountAfterGst from a_final_bill where  bill_date between '$year-09-01' and '$year-09-31'"; 
			$jobsqsep1=mysql_query($jobssep1);
		    $jobsfsep1=mysql_fetch_array($jobsqsep1);
			
			$jobsoct1="select sum(ServiceAmountAfterGst) as ServiceAmountAfterGst from a_final_bill where  bill_date between '$year-10-01' and '$year-10-31'"; 
			$jobsqoct1=mysql_query($jobsoct1);
		    $jobsfoct1=mysql_fetch_array($jobsqoct1);
			
			$jobsnov1="select sum(ServiceAmountAfterGst) as ServiceAmountAfterGst from a_final_bill where bill_date between '$year-11-01' and '$year-11-31'"; 
			$jobsqnov1=mysql_query($jobsnov1);
		    $jobsfnov1=mysql_fetch_array($jobsqnov1);
			
			$jobsdec1="select sum(ServiceAmountAfterGst) as ServiceAmountAfterGst from a_final_bill where bill_date between '$year-12-01' and '$year-12-31'"; 
			$jobsqdech1=mysql_query($jobsdec1);
		    $jobsfdec1=mysql_fetch_array($jobsqdech1);
			
			
			
			
			
			 $jobsjan="select sum(ExpenseAmount) as ExpenseAmount from expense_details where ExpenseDate between '$year-01-01' and '$year-01-31'"; 
			$jobsqjan=mysql_query($jobsjan);
		    $jobsfjan=mysql_fetch_array($jobsqjan); 
			
			 $jobsfeb="select sum(ExpenseAmount) as ExpenseAmount from expense_details where ExpenseDate between '$year-02-01' and '$year-02-28'"; 
			$jobsqfeb=mysql_query($jobsfeb);
		    $jobsffeb=mysql_fetch_array($jobsqfeb);
			
			$jobsmarch="select sum(ExpenseAmount) as ExpenseAmount  from expense_details where ExpenseDate between '$year-03-01' and '$year-03-31'"; 
			$jobsqmarch=mysql_query($jobsmarch);
		    $jobsfmarch=mysql_fetch_array($jobsqmarch);
			
			$jobsapril="select sum(ExpenseAmount) as ExpenseAmount  from expense_details where ExpenseDate between '$year-04-01' and '$year-04-30'"; 
			$jobsqapril=mysql_query($jobsapril);
		    $jobsfapril=mysql_fetch_array($jobsqapril);
			
			$jobsmay="select sum(ExpenseAmount) as ExpenseAmount  from expense_details where ExpenseDate between '$year-05-01' and '$year-05-31'"; 
			$jobsqmay=mysql_query($jobsmay);
		    $jobsfmay=mysql_fetch_array($jobsqmay);
			
			$jobsjune="select sum(ExpenseAmount) as ExpenseAmount  from expense_details where ExpenseDate between '$year-06-01' and '$year-06-31'"; 
			$jobsqjune=mysql_query($jobsjune);
		    $jobsfjune=mysql_fetch_array($jobsqjune);
			
			$jobsjuly="select sum(ExpenseAmount) as ExpenseAmount  from expense_details where ExpenseDate between '$year-07-01' and '$year-07-31'"; 
			$jobsqjuly=mysql_query($jobsjuly);
		    $jobsfjuly=mysql_fetch_array($jobsqjuly);
			
			$jobsaug="select sum(ExpenseAmount) as ExpenseAmount  from expense_details where ExpenseDate between '$year-08-01' and '$year-08-31'"; 
			$jobsqaug=mysql_query($jobsaug);
		    $jobsfaug=mysql_fetch_array($jobsqaug);
			
			$jobssep="select sum(ExpenseAmount) as ExpenseAmount  from expense_details where ExpenseDate between '$year-09-01' and '$year-09-31'"; 
			$jobsqsep=mysql_query($jobssep);
		    $jobsfsep=mysql_fetch_array($jobsqsep);
			
			$jobsoct="select sum(ExpenseAmount) as ExpenseAmount  from expense_details where ExpenseDate between '$year-10-01' and '$year-10-31'"; 
			$jobsqoct=mysql_query($jobsoct);
		    $jobsfoct=mysql_fetch_array($jobsqoct);
			
			$jobsnov="select sum(ExpenseAmount) as ExpenseAmount  from expense_details where ExpenseDate between '$year-11-01' and '$year-11-31'"; 
			$jobsqnov=mysql_query($jobsnov);
		    $jobsfnov=mysql_fetch_array($jobsqnov);
			
			$jobsdec="select sum(ExpenseAmount) as ExpenseAmount  from expense_details where ExpenseDate between '$year-12-01' and '$year-12-31'"; 
			$jobsqdech=mysql_query($jobsdec);
		    $jobsfdec=mysql_fetch_array($jobsqdech);
			
			$jan=$jobsfjan1['ServiceAmountAfterGst']-$jobsfjan['ExpenseAmount'];
			$feb=$jobsffeb1['ServiceAmountAfterGst']-$jobsffeb['ExpenseAmount'];
			$mar=$jobsfmarch1['ServiceAmountAfterGst']-$jobsfmarch['ExpenseAmount'];
			$apr=$jobsfapril1['ServiceAmountAfterGst']-$jobsfapril['ExpenseAmount'];
			$may=$jobsfmay1['ServiceAmountAfterGst']-$jobsfmay['ExpenseAmount'];
			$jun=$jobsfjune1['ServiceAmountAfterGst']-$jobsfjune['ExpenseAmount'];
			$jul=$jobsfjuly1['ServiceAmountAfterGst']-$jobsfjuly['ExpenseAmount'];
			$aug=$jobsfaug1['ServiceAmountAfterGst']-$jobsfaug['ExpenseAmount'];
			$sep=$jobsfsep1['ServiceAmountAfterGst']-$jobsfsep['ExpenseAmount'];
			$oct=$jobsfoct1['ServiceAmountAfterGst']-$jobsfoct['ExpenseAmount'];
			$nov=$jobsfnov1['ServiceAmountAfterGst']-$jobsfnov['ExpenseAmount'];
			$dec=$jobsfdec1['ServiceAmountAfterGst']-$jobsfdec['ExpenseAmount'];
			?>
		<td style="background-color:#F0F8FF"><b>Operating profit : </b></td>
		<td><?php echo number_format($jan,2);?></td>
		<td><?php echo number_format($feb,2);?></td>
      	<td><?php echo number_format($mar,2);?></td>
		<td><?php echo number_format($apr,2);?></td>
		<td><?php echo number_format($may,2);?></td>
		<td><?php echo number_format($jun,2);?></td>
		<td><?php echo number_format($jul,2);?></td>
		<td><?php echo number_format($aug,2);?></td>
		<td><?php echo number_format($sep,2);?></td>
		<td><?php echo number_format($oct,2);?></td>
		<td><?php echo number_format($nov,2);?></td>
		<td><?php echo number_format($dec,2);?></td>
		</tr>
		
		<tr>
		<td style="background-color:#F0F8FF"><b>Net profit : </b></td>
		<td><?php echo number_format($jan,2);?></td>
		<td><?php echo number_format($feb,2);?></td>
      	<td><?php echo number_format($mar,2);?></td>
		<td><?php echo number_format($apr,2);?></td>
		<td><?php echo number_format($may,2);?></td>
		<td><?php echo number_format($jun,2);?></td>
		<td><?php echo number_format($jul,2);?></td>
		<td><?php echo number_format($aug,2);?></td>
		<td><?php echo number_format($sep,2);?></td>
		<td><?php echo number_format($oct,2);?></td>
		<td><?php echo number_format($nov,2);?></td>
		<td><?php echo number_format($dec,2);?></td>
		</tr>
		
		<tr>
		<?php
		 $b1="select sum(TotalServiceAmount) as TotalServiceAmount from a_final_bill where bill_date between '$year-01-01' and '$year-01-31'"; 
			$b11=mysql_query($b1);
		    $b111=mysql_fetch_array($b11); 
			
			
			 $b2="select sum(TotalServiceAmount) as TotalServiceAmount from a_final_bill where  bill_date between '$year-02-01' and '$year-02-28'"; 
			$b22=mysql_query($b2);
		    $b222=mysql_fetch_array($b22);
			
			$b3="select sum(TotalServiceAmount) as TotalServiceAmount from a_final_bill where  bill_date between '$year-03-01' and '$year-03-31'"; 
			$b33=mysql_query($b3);
		    $b333=mysql_fetch_array($b33);
			
			$b4="select sum(TotalServiceAmount) as TotalServiceAmount from a_final_bill where  bill_date between '$year-04-01' and '$year-04-30'"; 
			$b44=mysql_query($b4);
		    $b444=mysql_fetch_array($b44);
			
			$b5="select sum(TotalServiceAmount) as TotalServiceAmount from a_final_bill where  bill_date between '$year-05-01' and '$year-05-31'"; 
			$b55=mysql_query($b5);
		    $b555=mysql_fetch_array($b55);
			
			$b6="select sum(TotalServiceAmount) as TotalServiceAmount from a_final_bill where bill_date between '$year-06-01' and '$year-06-31'"; 
			$b66=mysql_query($b6);
		    $b666=mysql_fetch_array($b66);
			
			$b7="select sum(TotalServiceAmount) as TotalServiceAmount from a_final_bill where  bill_date between '$year-07-01' and '$year-07-31'"; 
			$b77=mysql_query($b7);
		    $b777=mysql_fetch_array($b77);
			
			$b8="select sum(TotalServiceAmount) as TotalServiceAmount from a_final_bill where  bill_date between '$year-08-01' and '$year-08-31'"; 
			$b88=mysql_query($b8);
		    $b888=mysql_fetch_array($b88);
			
			$b9="select sum(TotalServiceAmount) as TotalServiceAmount from a_final_bill where  bill_date between '$year-09-01' and '$year-09-31'"; 
			$b99=mysql_query($b9);
		    $b999=mysql_fetch_array($b99);
			
			$b10="select sum(TotalServiceAmount) as TotalServiceAmount from a_final_bill where  bill_date between '$year-10-01' and '$year-10-31'"; 
			$b1010=mysql_query($b10);
		    $b101010=mysql_fetch_array($b1010);
			
			$b11="select sum(TotalServiceAmount) as TotalServiceAmount from a_final_bill where bill_date between '$year-11-01' and '$year-11-31'"; 
			$b1111=mysql_query($b11);
		    $b111111=mysql_fetch_array($b1111);
			
			$b12="select sum(TotalServiceAmount) as TotalServiceAmount from a_final_bill where bill_date between '$year-12-01' and '$year-12-31'"; 
			$b1212=mysql_query($b12);
		    $b121212=mysql_fetch_array($b1212);
			
			$tax1=$jobsfjan1['ServiceAmountAfterGst']-$b111['TotalServiceAmount'];
			
			$tax2=$jobsffeb1['ServiceAmountAfterGst']-$b222['TotalServiceAmount'];
			$tax3=$jobsfmarch1['ServiceAmountAfterGst']-$b333['TotalServiceAmount'];
			$tax4=$jobsfapril1['ServiceAmountAfterGst']-$b444['TotalServiceAmount'];
			$tax5=$jobsfmay1['ServiceAmountAfterGst']-$b555['TotalServiceAmount'];
			$tax6=$jobsfjune1['ServiceAmountAfterGst']-$b666['TotalServiceAmount'];
			$tax7=$jobsfjuly1['ServiceAmountAfterGst']-$b777['TotalServiceAmount'];
			$tax8=$jobsfaug1['ServiceAmountAfterGst']-$b888['TotalServiceAmount'];
			$tax9=$jobsfsep1['ServiceAmountAfterGst']-$b999['TotalServiceAmount'];
			$tax10=$jobsfoct1['ServiceAmountAfterGst']-$b101010['TotalServiceAmount'];
			$tax11=$jobsfnov1['ServiceAmountAfterGst']-$b111111['TotalServiceAmount'];
			$tax12=$jobsfdec1['ServiceAmountAfterGst']-$b121212['TotalServiceAmount'];
			
		?>
		<td style="background-color:#F0F8FF"><b>Tax(GST) : </b></td>
		<td><?php echo number_format($tax1,2);?></td>
		<td><?php echo number_format($tax2,2);?></td>
		<td><?php echo number_format($tax3,2);?></td>
		<td><?php echo number_format($tax4,2);?></td>
		<td><?php echo number_format($tax5,2);?></td>
		<td><?php echo number_format($tax6,2);?></td>
		<td><?php echo number_format($tax7,2);?></td>
		<td><?php echo number_format($tax8,2);?></td>
		<td><?php echo number_format($tax9,2);?></td>
		<td><?php echo number_format($tax10,2);?></td>
		<td><?php echo number_format($tax11,2);?></td>
		<td><?php echo number_format($tax12,2);?></td>
		</tr>
		
		<tr>
		<td style="background-color:#F0F8FF"><b>Profit after tax : </b></td>
		<td><?php echo number_format($jan-$tax1,2);?></td>
		<td><?php echo number_format($feb-$tax2,2);?></td>
      	<td><?php echo number_format($mar-$tax3,2);?></td>
		<td><?php echo number_format($apr-$tax4,2);?></td>
		<td><?php echo number_format($may-$tax5,2);?></td>
		<td><?php echo number_format($jun-$tax6,2);?></td>
		<td><?php echo number_format($jul-$tax7,2);?></td>
		<td><?php echo number_format($aug-$tax8,2);?></td>
		<td><?php echo number_format($sep-$tax9,2);?></td>
		<td><?php echo number_format($oct-$tax10,2);?></td>
		<td><?php echo number_format($nov-$tax11,2);?></td>
		<td><?php echo number_format($dec-$tax12,2);?></td>
		</tr>
		
		<tr>
		<td style="background-color:#F0F8FF"><b>Depriciation : </b></td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		</tr>
		<tr>
		<td style="background-color:#F0F8FF"><b>Interest : </b></td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		</tr>
				 </tbody>
               
              </table>
</body>



</html>