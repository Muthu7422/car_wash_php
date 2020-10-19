				 <div class="box-body ex3 hidden" id="recom">
				<h2>Recommended services  Details </h2>
			 <div class="form-group col-sm-6">
			   <label for="catname">Service Type</label>
                <select class="form-control" id="Rtype" name="Rtype" onKeyPress="return tabE(this,event)" onChange="getramount()">
				<option value="">--Select Service--</option>
				  <?php 
				  
				    if($mobil['id']!='')
				  {
				  $mob12="select * from a_customer_vehicle_details where cust_no='".trim($mobil['id'])."'";
				$mobi12=mysqli_query($conn,$mob12);
				$mobil12=mysqli_fetch_array($mobi12);
				  }
				  else
				  {
					 $mob12="select * from a_customer_vehicle_details where vehicle_no='".trim($temp['vehicle_no'])."'";
				     $mobi12=mysqli_query($conn,$mob12);
				     $mobil12=mysqli_fetch_array($mobi12);  
				  }
					
				  $mvs="select * from master_vehicle_segment where VehicleSegment='".trim($mobil12['VehicleSegment'])."'";
				  $mvq=mysqli_query($conn,$mvs);
				  $mvf=mysqli_fetch_array($mvq);
				   $vtype=trim($mvf['Id']); 
				  
				  
				   $ssc="select * from m_service_type where status='Active' and v_type='$vtype'";
				  $Essc=mysqli_query($conn,$ssc);
				  while($FEssc=mysqli_fetch_array($Essc))
				  {
				  ?>
				  <option value="<?php echo $FEssc['stype']; ?>"><?php echo $FEssc['stype']; ?></option>
				  <?php } ?>
				  </select>
                 </div>
				 <div class="form-group col-sm-3">
			   <label for="catname">Service Amount</label> 
                  <input type="txt" class="form-control" name="rst_amt" id="rst_amt"  placeholder="Service Amount"  onKeyPress="return isNumberKey(event,this)" >

				</div>
				<div class="form-group col-sm-4 hidden">
			   <label for="catname">Date</label>
			      <input type="date" class="form-control" name="RecomDate" id="RecomDate" onKeyPress="return tabE(this,event)" >
				</div>
				 <div class="form-group col-sm-2 hidden">
			   <label for="catname">Qty</label>
           
			    <input type="txt" class="form-control" name="rqty" id="rqty" value="1"  placeholder="Qty" onKeyPress="return tabE(this,event)" style="text-transform:uppercase">
                </div>
				
							
					 <div class="form-group col-sm-2 pull-right">
			   <label for="catname"></label>
             
                  <label for="Branch">&nbsp;</label>
                  <input type="Submit" placeholder="Add" name="AddRecom" id="AddRecom" style="background-color:#37B8F8; color:#000000" value="Add Service"  class="form-control " >
            
				  </div>
				<div class="form-group col-sm-8">
				<div>
					<table border="1" width="100%"  style="background-color:#F0F8FF" >
                <thead>
                <tr>
				   <th style="height:40px;text-align:center"> S.No </th>
                   <th style="text-align:center"> Service </th>
				   <th style="text-align:center"> Service Amount </th>
				   <th style="text-align:center"> Qty </th>
				  
				   <th style="text-align:center"> Action </th>
                </tr>
                </thead>
                <tbody>
				<?php 
				$i=0;
				 $s="select * from s_job_card_recomdetails_temp where session_id='".session_id()."' and FranchiseeId='".$_SESSION['FranchiseeId']."' and status='Active'";
				$Es=mysqli_query($conn,$s);
				while($FEs=mysqli_fetch_array($Es))
				{
					$i++;
					
				?>
                <tr>
				  <td style="height:40px;padding-left:5px"><?php echo $i;  ?></td>
                  <td style="padding-left:5px"> <?php echo $FEs['service_type'];  ?></td>
				  <td style="padding-right:5px;text-align:right"><?php echo $FEs['st_amt'];  ?></td>
				  <td style="padding-right:5px;text-align:right"><?php echo $FEs['qty'];  ?></td>
				 
				  <td><a href="recomservice_temp_delete.php?id=<?php echo $FEs['id']; ?> && job_card_no=<?php echo $FEs['job_card_no']; ?>" onClick="return Delete_Click();" class="btn-box-tool"><i class="fa fa-close custom-icon1"></i></a></td>
                </tr>
				<?php 
				
				}
				 ?>
                  </tbody>
                
              </table>
					</div>
				</div>
				 </div>