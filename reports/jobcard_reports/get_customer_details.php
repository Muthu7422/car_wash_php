<?php
include("../../includes.php");

$customer=$_POST['customer'];
?>

 
<div class="box-body">
			
	<div class="form-group col-sm-12">
			<div>
            <h4 class="box-title"><b> Job Card Details </b></h4>
            <!-- /.box-header -->
             <table border="1" width="100%" align="center" class="table" >
			  <thead>
                <tr style="align:center">
                <th>Sl No</th>
				<th>Date</th>
				 <th>Job Card No</th>
				 <th>Customer Name</th>
				 <th>Mobile</th>
				   <th>Vehicle Segment</th>
				     <th>Service Type</th>
					  <th>Service Amount</th>
				  
			    </tr>
			
                 </thead>
				   <tbody>
					<?php
					$i=0;
					$jcd="select * from s_job_card where customer_id ='$customer'"; 
				   $jcdq=mysqli_query($conn,$jcd);
				   while($jcdf=mysqli_fetch_array($jcdq))
				   {
					   
					
					  $cd="select * from a_customer_vehicle_details where cust_no='".$jcdf['customer_id']."'"; 
				   $cdq=mysqli_query($conn,$cd);
			$cdf=mysqli_fetch_array($cdq);
				
				 
				   
				   $mvs="select * from master_vehicle_segment where VehicleSegment='".$cdf['VehicleSegment']."'";
				  $mvq=mysqli_query($conn,$mvs);
				 $mvf=mysqli_fetch_array($mvq);
				  
					  
				   $ssc="select * from m_service_type where status='Active' and v_type='".trim($mvf['Id'])."'";
				  $Essc=mysqli_query($conn,$ssc);
				$FEssc=mysqli_fetch_array($Essc);
				
				
				  
				  
				  
				   
				 $jcn="select * from s_job_card_sdetails where job_card_no='".$jcdf['id']."'"; 
				   $jcnq=mysqli_query($conn,$jcn);
				$jcnf=mysqli_fetch_array($jcnq);
				 
				  
				  
				   $i++;
				?>
                <tr>
                  <td><?php echo $i;?></td>
				   <td><?php echo date("d-m-Y",strtotime($jcdf['jdate']));?></td>
				  <td><?php echo $jcdf['job_card_no'];?></td>
				  <td><?php echo $jcdf['sname'];?></td>
				   <td><?php echo $jcdf['smobile'];?></td>
                  <td><?php echo $cdf['VehicleSegment'];?></td>
				  <td><?php echo $jcnf['service_type'];?></td>
				    <td><?php echo $jcnf['st_amt'];?></td>
				   
				  
				 

	  <?php
				 
				  
				   }
				  ?>
                  
                </tr>
				
                </tbody>
              </table>
          	
            <!-- /.box-body -->
			</div>
      </div>
	    
                </div>   
        