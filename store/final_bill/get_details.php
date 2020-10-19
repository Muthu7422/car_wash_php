<?php
include("../../includes.php");
 
// $echeck="select * from m_item_master where barcode='".$_POST['qty']."' and status='Active'"; p_purchase
$_SESSION['TotalSpareAmount']="0.00";
$_SESSION['TotalServiceAmount']="0.00";
$_SESSION['TotalPackageAmount']="0.00";


$job_card_no=$_POST['job_card'];
$inv_no=$_POST['inv_no'];
$bill_date=$_POST['bill_date'];

$Dtemp="delete from a_final_bill_spare_temp where inv_no='$inv_no'";
$EDtemp=mysqli_query($conn,$Dtemp);

?>

 
<div class="box-body">
			
	<div class="form-group col-sm-12">
			<div style="padding-right:250px" >
            <h4 class="box-title"><b>Package Details</b></h4>
            <!-- /.box-header -->
             <table border="1" width="100%" align="center" >
			  <thead>
                <tr style="align:center">
                <th style="">S:No</th>
                <th style="">Package Name </th>
				<th style="">Package Amount</th>
				<th style="">Remarks</th>
			    </tr>
				<?php
				 $names1="select * from s_job_card where job_card_no='".$_POST['job_card']."'"; 
				$ns1=mysqli_query($conn,$names1);
				$jcd1=mysqli_fetch_array($ns1);
	
				$ct="select * from s_job_card_pdetails where job_card_no='".$jcd1['id']."'";
				$Ect=mysqli_query($conn,$ct);
				$n=mysqli_num_rows($Ect);
				$i=0;
				while($Fct=mysqli_fetch_array($Ect))
				{
				$i++;
				?>
                <tr>
                <td style="padding-left:5px"><?php echo "   ".$i; ?></td>
				<td style=""><input name="<?php echo "package_name".$i; ?>" id="<?php echo "package_name".$i; ?>" value="<?php echo $Fct['package_type']; ?>" onKeyPress="return tabE(this,event)" class="form-control" readonly='ture'> </td>
				<td style=""><input name="<?php echo "package_amount".$i; ?>" id="<?php echo "package_amount".$i; ?>" value="<?php echo $Fct['package_amt']; ?>"onKeyPress="return tabE(this,event)" class="form-control" readonly='ture'> </td>
				<td style=""><input name="<?php echo "remarks".$i; ?>" id="<?php echo "remarks".$i; ?>" value="<?php echo $Fct['pac_remarks']; ?>"onKeyPress="return tabE(this,event)" class="form-control" readonly='ture'> </td>
                </tr>
				<?php
			 	$_SESSION['TotalPackageAmount']=$_SESSION['TotalPackageAmount']+$Fct['package_amt']; 
				  }
				?>
                 </thead>
              </table>
          	
            <!-- /.box-body -->
			</div>
      </div>
	    <div class="form-group col-sm-12 hidden">
			<div style="padding-right:250px" >
            <h4 class="box-title"><b>Used Item Details - Package</b></h4>
            <!-- /.box-header -->
             <table border="1" width="950" align="center" >
			  <thead>
                <tr style="align:center">
                <th style="width: 30px">S:No</th>
                <th style="width: 110px">Package Item Name</th>
				<th style="width: 110px">Amount </th>
				<th style="width: 110px">Qty</th>
				<th style="width: 110px">Total</th>
			    </tr>
				
				<?php
				$i=0;
			 	$ct1="select * from s_job_card_pdetails where job_card_no='".$jcd1['id']."'"; 
				$Ect1=mysqli_query($conn,$ct1);
				while($Fct1=mysqli_fetch_array($Ect1))
				{
					
						
				 	$pack="select * from m_package where package_name='".$Fct1['package_type']."'"; 
					$packs=mysqli_query($conn,$pack);
					while($packa1=mysqli_fetch_array($packs))
					{
						
					$names1="select * from m_package_service where package_no='".$packa1['package_no']."'";
					$ns1=mysqli_query($conn,$names1);
					while($jcd2=mysqli_fetch_array($ns1))
					{						
					
					$abc="select * from m_service_type where stype='".$jcd2['service']."'";
					$abcd=mysqli_query($conn,$abc);
					while($abcd1=mysqli_fetch_array($abcd))
					{
					
					$pq="select * from m_service_type_details where service_type='".$abcd1['id']."'";
					$pqr=mysqli_query($conn,$pq);
					while($pqrs=mysqli_fetch_array($pqr))
					{
					
					$xy="select * from m_spare where sid='".$pqrs['spare_name']."'";
					$xyz=mysqli_query($conn,$xy);
					while($xyza=mysqli_fetch_array($xyz))
					
				{
				$i++;	
				?>
                <tr>
                <td style="width: 30px;padding-left:5px"><?php echo "   ".$i; ?></td>
				<td style="width: 80px"><input name="<?php echo "scategory".$i; ?>" id="<?php echo "scategory".$i; ?>" value="<?php echo $xyza['sname'] ?>" onKeyPress="return tabE(this,event)" class="form-control" readonly='ture'> </td>
				<td style="width: 80px"><input name="<?php echo "sbrand".$i; ?>" id="<?php echo "sbrand".$i; ?>" value="<?php echo $xyza['smrp'] ?>"onKeyPress="return tabE(this,event)" class="form-control" readonly='ture'> </td>
				<td style="width: 80px"><input name="<?php echo "sname".$i; ?>" id="<?php echo "sname".$i; ?>" value="<?php echo $pqrs['qty']; ?>"onKeyPress="return tabE(this,event)" class="form-control" readonly='ture'> </td>
   				<td style="width: 80px"><input name="<?php echo "sname".$i; ?>" id="<?php echo "sname".$i; ?>" value="<?php echo $TotalPackage=$pqrs['qty']*$xyza['smrp']; ?>"onKeyPress="return tabE(this,event)" class="form-control" readonly='ture'> </td>

				</tr>
				<?php
			        
					$Stemp="insert into a_final_bill_spare_temp set amount='".$xyza['smrp']."',SpareFrom='Package',bill_date='$bill_date',inv_no='$inv_no',job_card_no='$job_card_no',sname='".$xyza['sid']."',qty='".$pqrs['qty']."'";
					$EStemp=mysqli_query($conn,$Stemp);
					}
					}
					}
					}
				}
				}
				?>
                 </thead>
              </table>
          	
            <!-- /.box-body -->
			</div>
      </div> 
	  
	<div class="form-group col-sm-12">
			<div style="padding-right:250px" >
            <h4 class="box-title"><b>Service Details</b></h4>
            <!-- /.box-header -->
             <table border="1" width="100%" align="center" >
			  <thead>
                <tr style="align:center">
                <th style="">S:No</th>
                <th style="">Service Name </th>
				<th style="">Service Amount</th>
				<th style="">Qty</th>
				<th style="">Remarks</th>
				<th style="">Total</th>
			    </tr>
				
				<?php
				
				$names1="select * from s_job_card where job_card_no='".$_POST['job_card']."'";
				$ns1=mysqli_query($conn,$names1);
				$jcd1=mysqli_fetch_array($ns1);
				
				
				$ct="select * from s_job_card_sdetails where job_card_no='".$jcd1['id']."'";
				$Ect=mysqli_query($conn,$ct);
				$n=mysqli_num_rows($Ect);
				$i=0;
				while($Fct=mysqli_fetch_array($Ect))
				{
				$i++;
				?>
                <tr>
                <td style="padding-left:5px"><?php echo "   ".$i; ?></td>
				<td style=""><input name="<?php echo "scategory".$i; ?>" id="<?php echo "scategory".$i; ?>" value="<?php echo $Fct['service_type']; ?>" onKeyPress="return tabE(this,event)" class="form-control" readonly='ture'> </td>
				<td style=""><input name="<?php echo "sbrand".$i; ?>" id="<?php echo "sbrand".$i; ?>" value="<?php echo $Fct['st_amt']; ?>"onKeyPress="return tabE(this,event)" class="form-control" readonly='ture'> </td>
				<td style=""><input name="<?php echo "sname".$i; ?>" id="<?php echo "sname".$i; ?>" value="<?php echo $Fct['qty']; ?>"onKeyPress="return tabE(this,event)" class="form-control" readonly='ture'> </td>
				<td style=""><input name="<?php echo "sqty".$i; ?>" id="<?php echo "sqty".$i; ?>" value="<?php echo $Fct['remarks']; ?>"onKeyPress="return tabE(this,event)" class="form-control" readonly='ture'> </td>
				<td style=""><input name="<?php echo "smrp".$i; ?>" id="<?php echo "smrp".$i; ?>" value="<?php echo $TotalService=$Fct['st_amt']*$Fct['qty']; ?>"onKeyPress="return tabE(this,event)" class="form-control" readonly='ture'> </td>
                </tr>
				<?php
				$_SESSION['TotalServiceAmount']=$_SESSION['TotalServiceAmount']+$TotalService;
				  }
				?>
                 </thead>
              </table>
          	
            <!-- /.box-body -->
			</div>
      </div>
  
	   <div class="form-group col-sm-12 hidden">
			<div style="padding-right:250px" >
            <h4 class="box-title"><b>Used Item Details - service</b></h4>
            <!-- /.box-header -->
             <table border="1" width="100%" align="center" >
			  <thead>
                <tr style="align:center">
                <th style="">S:No</th>
                <th style="">Service Item Name</th>
				<th style="">Amount </th>
				<th style="">Qty</th>
				<th style="">Total</th>
			    </tr>
				<?php
			 	$ct1="select * from s_job_card_sdetails where job_card_no='".$jcd1['id']."'"; 
				$Ect1=mysqli_query($conn,$ct1);
				$i=0;
				while($Fct1=mysqli_fetch_array($Ect1))
				{
						
					$abc="select * from m_service_type where stype='".$Fct1['service_type']."'";
					$abcd=mysqli_query($conn,$abc);
					while($abcd1=mysqli_fetch_array($abcd))
					{
					$pq="select * from m_service_type_details where service_type='".$abcd1['id']."'";
					$pqr=mysqli_query($conn,$pq);
					while($pqrs=mysqli_fetch_array($pqr))
					{
					$xy="select * from m_spare where sid='".$pqrs['spare_name']."'";
					$xyz=mysqli_query($conn,$xy);
					while($xyza=mysqli_fetch_array($xyz))
				{  $i++;
				?>
                <tr>
                <td style="width: 30px;padding-left:5px"><?php echo "   ".$i; ?></td>
				<td style="width: 80px"><input name="<?php echo "scategory".$i; ?>" id="<?php echo "scategory".$i; ?>" value="<?php echo $xyza['sname']; ?>" onKeyPress="return tabE(this,event)" class="form-control" readonly='ture'> </td>
				<td style="width: 80px"><input name="<?php echo "sbrand".$i; ?>" id="<?php echo "sbrand".$i; ?>" value="<?php echo $xyza['smrp']; ?>"onKeyPress="return tabE(this,event)" class="form-control" readonly='ture'> </td>
				<td style="width: 80px"><input name="<?php echo "sname".$i; ?>" id="<?php echo "sname".$i; ?>" value="<?php echo $pqrs['qty']; ?>"onKeyPress="return tabE(this,event)" class="form-control" readonly='ture'> </td>
   				<td style="width: 80px"><input name="<?php echo "sname".$i; ?>" id="<?php echo "sname".$i; ?>" value="<?php echo $TotalSpare=$xyza['smrp']*$pqrs['qty']; ?>"onKeyPress="return tabE(this,event)" class="form-control" readonly='ture'> </td>

				</tr>
				<?php
                    $Stemp="insert into a_final_bill_spare_temp set amount='".$xyza['smrp']."',SpareFrom='Service',bill_date='$bill_date',inv_no='$inv_no',job_card_no='$job_card_no',sname='".$pqrs['spare_name']."',qty='".$pqrs['qty']."'";
					$EStemp=mysqli_query($conn,$Stemp);				
					}
					}
				}
				}
				?>
                 </thead>
              </table>
          	<!-- /.box-body -->
			</div>
      </div> 
		
		<div class="form-group col-sm-12">
		<!-- Spare Pick Start -->
			<div style="padding-right:250px" >
            <h4 class="box-title"><b>Spares Pick Details</b></h4>
            <!-- /.box-header -->
             <table border="1" width="100%" align="center" >
			  <thead>
                <tr style="align:center">
                <th style="">S:No</th>
                <th style="">Spare Name</th>
				<th style="">Amount </th>
				<th style="">Qty</th>
				<th style="">Total</th>
			    </tr>
				<?php
			  	$ct1="select * from s_spare_prepick where JobcardId='".$jcd1['id']."'";  
				$Ect1=mysqli_query($conn,$ct1);
				$npp=mysqli_num_rows($Ect1);
				if($npp>'0')
				{
				$Fct1=mysqli_fetch_array($Ect1);				
					$i=0;
					$abc="select * from s_spare_prepick_details where s_pick_no='".$Fct1['id']."'";
					$abcd=mysqli_query($conn,$abc);
					while($abcd1=mysqli_fetch_array($abcd))
					{
						$SPPName="select sname from m_spare where sid='".$abcd1['spare_name']."'";
						$ESPPName=mysqli_query($conn,$SPPName);
						$FESPPName=mysqli_fetch_array($ESPPName);
					$i++;
					
					$tmrp=number_format(($abcd1['mrp']-(($abcd1['TaxRate']/(100+$abcd1['TaxRate']))*$abcd1['mrp'])),2);
				?>
                <tr>
                <td style="padding-left:5px"><?php echo "   ".$i; ?></td>
				<td style=""><input name="<?php echo "sparename".$i; ?>" id="<?php echo "sparename".$i; ?>" value="<?php echo $FESPPName['sname']; ?>" onKeyPress="return tabE(this,event)" class="form-control" readonly='ture'> </td>
				<td style=""><input name="<?php echo "mrp".$i; ?>" id="<?php echo "mrp".$i; ?>" value="<?php echo $abcd1['mrp']; ?>"onKeyPress="return tabE(this,event)" class="form-control" readonly='ture'> </td>
				<td style=""><input name="<?php echo "qty".$i; ?>" id="<?php echo "qty".$i; ?>" value="<?php echo $abcd1['qty']; ?>"onKeyPress="return tabE(this,event)" class="form-control" readonly='ture'> </td>
				<td style=""><input name="<?php echo "total".$i; ?>" id="<?php echo "total".$i; ?>" value="<?php echo $TotalPrepick=$abcd1['mrp']*$abcd1['qty']; ?>"onKeyPress="return tabE(this,event)" class="form-control" readonly='ture'> </td>
                </tr>
				<?php					
				$_SESSION['TotalServiceAmount']=$_SESSION['TotalServiceAmount'];	
				$_SESSION['TotalSpareAmount']=$_SESSION['TotalSpareAmount']+$TotalPrepick;
				
				//$Stemp="insert into a_final_bill_spare_temp set amount='".$abcd1['mrp']."',SpareFrom='SparePick',bill_date='$bill_date',inv_no='$inv_no',job_card_no='$job_card_no',sname='".$abcd1['spare_name']."',qty='".$abcd1['qty']."'";
				//$EStemp=mysqli_query($Stemp);
								
				}
				}
				//global $SServiceAmount;
//global $SSpareAmount;
				//$SServiceAmount=$_SESSION['TotalServiceAmount'];
				//$SSpareAmount=$_SESSION['TotalSpareAmount'];
				//echo $_SESSION['TotalServiceAmount'];
				//echo $_SESSION['TotalSpareAmount'];
				?>
                 </thead>
              </table>
          	<!-- /.box-body -->
			</div>
      </div> 
	  <div class="form-group col-sm-12">
		<!-- Spare Pick Start -->
			<div style="padding-right:250px" >
            <h4 class="box-title"><b>Outsource Details</b></h4>
            <!-- /.box-header -->
             <table border="1" width="100%" align="center" >
			  <thead>
                <tr style="align:center">
                <th style="">S:No</th>
                <th style="">Outsource Name</th>
				<th style="">Amount </th>
				<th style="">Tax</th>
				<th style="">Total</th>
			    </tr>
				<?php				
					 $Fc="select * from s_outsources_details where JobcardId='".$jcd1['id']."'"; 
					$Dsx=mysqli_query($conn,$Fc);
					while($Csed=mysqli_fetch_array($Dsx))
					{
		
						$Fddc="select * from m_service_type where id='".$Csed['Outsources']."'";
						$fdcs=mysqli_query($conn,$Fddc);
						while($Vds=mysqli_fetch_array($fdcs))
						{
							$R="select * from m_service_type_details where service_type='".$Vds['id']."'";
							$Ds=mysqli_query($conn,$R);
							while($Rds=mysqli_fetch_array($Ds))
							{
								$A="select * from m_spare where sid='".$Rds['spare_name']."'";
								$AA=mysqli_query($conn,$A);
								while($Asw=mysqli_fetch_array($AA))
								{
						
					$i++;
					
				?>
                <tr>
                <td style="padding-left:5px"><?php echo "   ".$i; ?></td>
				<td style=""><input name="<?php echo "sparename".$i; ?>" id="<?php echo "sparename".$i; ?>" value="<?php echo $Vds['stype']; ?>" onKeyPress="return tabE(this,event)" class="form-control" readonly='ture'> </td>
				<td style=""><input name="<?php echo "mrp".$i; ?>" id="<?php echo "mrp".$i; ?>" value="<?php echo $Csed['Amount']; ?>"onKeyPress="return tabE(this,event)" class="form-control" readonly='ture'> </td>
				<td style=""><input name="<?php echo "qty".$i; ?>" id="<?php echo "qty".$i; ?>" value="<?php echo $Csed['Tax']; ?>"onKeyPress="return tabE(this,event)" class="form-control" readonly='ture'> </td>
				<td style=""><input name="<?php echo "total".$i; ?>" id="<?php echo "total".$i; ?>" value="<?php echo $Csed['TotalAmount']; ?>"onKeyPress="return tabE(this,event)" class="form-control" readonly='ture'> </td>
                </tr>
				<?php					
				//$_SESSION['TotalServiceAmount']=$_SESSION['TotalServiceAmount'];	
				//$_SESSION['TotalSpareAmount']=$_SESSION['TotalSpareAmount']+$TotalPrepick;
				
				$Stemp="insert into a_final_bill_spare_temp set amount='".$Csed['TotalAmount']."',SpareFrom='Outsource',bill_date='$bill_date',inv_no='$inv_no',job_card_no='$job_card_no',sname='".$Asw['sid']."',qty='0.00'";
				$EStemp=mysqli_query($conn,$Stemp);
								
								}
							}
						}
					}
				
				//global $SServiceAmount;
//global $SSpareAmount;
				//$SServiceAmount=$_SESSION['TotalServiceAmount'];
				//$SSpareAmount=$_SESSION['TotalSpareAmount'];
				//echo $_SESSION['TotalServiceAmount'];
				//echo $_SESSION['TotalSpareAmount'];
				?>
                 </thead>
              </table>
          	<!-- /.box-body -->
			</div>
      </div> 
		<!-- Spare Pick End -->
		
		<!-- Offer Start -->
		<div class="form-group col-sm-12 hidden">
			<div style="padding-right:250px" >
            <h4 class="box-title"><b>Available Offers Details</b></h4>
            <!-- /.box-header -->
             <table class="table table-bordered" >
			  <thead>
                <tr>
                <th>S:No</th>
                <th>Package Name</th>
				<th>Package Period</th>
				<th>Offer Amount</th>
				<th>Balance</th>
			    </tr>
				<?php
				$i=0;
				$echeck="select  * from s_add_package where VehicleId='".$jcd1['vehicle_no']."'";
				$echk=mysqli_query($conn,$echeck);
				while($ecount=mysqli_fetch_array($echk)) 
				{
				$i++;
				
				$sp="select * from m_package where id='".$ecount['PackageId']."'";
				$Esp=mysqli_query($conn,$sp);
				$FEsp=mysqli_fetch_array($Esp);
				
				
				?>
                <tr>
                <td><?php echo "   ".$i; ?></td>
				<td><?php echo $FEsp['package_name']; ?></td>
				<td><?php echo $ecount['StartDate']." To ".$ecount['EndDate']; ?></td>
				<td><?php echo $FEsp['amount']; ?></td>
				<td><?php echo $ecount['AvailableAmount']; ?></td>
				</tr>
				<?php
				//$_SESSION['TotalServiceAmount']=$_SESSION['TotalServiceAmount']+$ecount['package_amt'];
				  }
				?>
                 </thead>
              </table>
          	<input type="hidden" class="form-control" id="tc" name="tc"  value="<?php echo $tnc; ?>" >
            <!-- /.box-body -->
			</div>
        </div> 
		<!-- Offer End -->
	
		
				<div class="form-group col-sm-4">
                  <label for="party">Service Amount </label>
				  <input type="text" class="form-control" name="total_service_amt" id="total_service_amt" value="<?php echo $_SESSION['TotalServiceAmount']+$_SESSION['TotalPackageAmount']; ?>" onKeyPress="return tabE(this,event)" readonly='ture'>
               </div>
			   	<div class="form-group col-sm-4">
                  <label for="party">Spare Amount(Include Tax)</label>
				  <input type="text" class="form-control" name="total_samt" id="total_samt" value="<?php echo $_SESSION['TotalSpareAmount']; ?>" onKeyUp="sumgst();"  onKeyPress="return tabE(this,event)" readonly='ture'>
               </div>
			    <div class="form-group col-sm-4">
                  <label for="party">Other Charges(Outsource Amount)</label>
				  <input type="text" class="form-control" name="others_charge" id="others_charge"  onKeyUp="sumgst();"  onKeyPress="return tabE(this,event)">
               </div>
			   <?php 
			   $total=$_SESSION['TotalServiceAmount']+$_SESSION['TotalSpareAmount'];
			   
			   ?>
			    <div class="form-group col-sm-4">
                  <label for="party">Total Service Amount</label>
				  <input type="text" class="form-control" name="total" id="total" value="0" readonly onKeyUp="sumgst();"  onKeyPress="return tabE(this,event)">
               </div>
			
				
			  <div class="form-group col-sm-2">
              <label for="Branch">GST</label>
              <select type="text" class="form-control" name="gst" id="gst" onChange="sumgst();" placeholder="GST">
			 <option value="">---Select GST---</option>
			  <?php 
			  $ab="select * from m_gst where status='Active'";
			  $abc=mysqli_query($conn,$ab);
			  while($abcd=mysqli_fetch_array($abc))
			  {
			  ?>
			  <option value="<?php echo $abcd['gst'];?>"><?php echo $abcd['gst'];?></option>
			  <?php
			  }
			  ?>
			  </select>
                </div>
			
				<div class="form-group col-sm-2 hidden">
              <label for="Branch">IGST</label>
              <select type="text" class="form-control" name="igst" id="igst" onChange="sumgst();" placeholder="GST">
			  <option value="0">--IGST--</option>
			  <?php 
			  $sg="select igst from m_gst";
			  $sgt=mysqli_query($conn,$sg);
			  while($sgst=mysqli_fetch_array($sgt))
			  {
			  ?>
			  <option value="<?php echo $sgst['igst']; ?>"><?php echo $sgst['igst']; ?></option>
			  <?php
			  }
			  ?>
			  </select>
                </div>
			    <div class="form-group col-sm-4">
                  <label for="party" style="background-color:#B3BFC2">Bill Amount</label>
				  <input type="text" class="form-control" name="bill_amt" id="bill_amt" style="background-color:#B3BFC2" value="0" onKeyUp="sumgst();"  onKeyPress="return tabE(this,event)">
               </div>  
				
			   <div class="form-group col-sm-4">
                  <label for="party">SMS</label>
				  <select type="text" class="form-control" name="sms" id="sms" >
				  <option value="ENABLE">ENABLE</option>
				   <option value="DISABLE">DISABLE</option>
				  </select>
               </div>  </div>
                 
				 <div class="box-footer">
                <button type="submit" class="btn btn-info pull-right" Onclick="return confirm('Are you sure want to proceed?')">Submit The Invoice</button>
                </div>   
        