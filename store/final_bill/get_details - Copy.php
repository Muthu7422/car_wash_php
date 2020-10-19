<?php
include("../../dbinfoi.php");    
 
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
             <table border="1" width="950" align="center" >
			  <thead>
                <tr style="align:center">
                <th style="width: 30px">S:No</th>
                <th style="width: 110px">Package Name </th>
				<th style="width: 110px">Package Amount</th>
				<th style="width: 110px">Remarks</th>
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
                <td style="width: 30px;padding-left:5px"><?php echo "   ".$i; ?></td>
				<td style="width: 80px"><input name="<?php echo "package_name".$i; ?>" id="<?php echo "package_name".$i; ?>" value="<?php echo $Fct['package_type']; ?>" onKeyPress="return tabE(this,event)" class="form-control" readonly='ture'> </td>
				<td style="width: 80px"><input name="<?php echo "package_amount".$i; ?>" id="<?php echo "package_amount".$i; ?>" value="<?php echo $Fct['package_amt']; ?>"onKeyPress="return tabE(this,event)" class="form-control" readonly='ture'> </td>
				<td style="width: 80px"><input name="<?php echo "remarks".$i; ?>" id="<?php echo "remarks".$i; ?>" value="<?php echo $Fct['pac_remarks']; ?>"onKeyPress="return tabE(this,event)" class="form-control" readonly='ture'> </td>
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
	  
	  <div class="form-group col-sm-4">
                  <label for="Branch">Service Details</label><br/>
				  <?php
				  $i=0;
				   $Qw="SELECT * FROM s_job_card_pdetails WHERE job_card_no='".$jcd1['id']."'"; 
				  $Wqa=mysqli_query($conn,$Qw);
				  while($Wsq=mysqli_fetch_array($Wqa))
				  {
					 
						
						$Erc="select * from m_package_service where package_name='".$Wsq['package_type']."'";
						$Xz=mysqli_query($conn,$Erc);
						$Xz1=mysqli_num_rows($Xz);
						while($Yc=mysqli_fetch_array($Xz))
						{
							$i++;
				  ?>
                 <input type="checkbox" name="Packagedetails[]" id="Packagedetails[]" checked value="<?php echo $Yc['service'] ?>"><?php echo $Yc['service'] ?><br>
				 
				 <?php
				  }
				  }
				 ?>
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
             <table border="1" width="950" align="center" >
			  <thead>
                <tr style="align:center">
                <th style="width: 30px">S:No</th>
                <th style="width: 110px">Service Name </th>
				<th style="width: 110px">Service Amount</th>
				<th style="width: 110px">Qty</th>
				<th style="width: 110px">Remarks</th>
				<th style="width: 110px">Total</th>
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
                <td style="width: 30px;padding-left:5px"><?php echo "   ".$i; ?></td>
				<td style="width: 80px"><input name="<?php echo "scategory".$i; ?>" id="<?php echo "scategory".$i; ?>" value="<?php echo $Fct['service_type']; ?>" onKeyPress="return tabE(this,event)" class="form-control" readonly='ture'> </td>
				<td style="width: 80px"><input name="<?php echo "sbrand".$i; ?>" id="<?php echo "sbrand".$i; ?>" value="<?php echo $Fct['st_amt']; ?>"onKeyPress="return tabE(this,event)" class="form-control" readonly='ture'> </td>
				<td style="width: 80px"><input name="<?php echo "sname".$i; ?>" id="<?php echo "sname".$i; ?>" value="<?php echo $Fct['qty']; ?>"onKeyPress="return tabE(this,event)" class="form-control" readonly='ture'> </td>
				<td style="width: 80px"><input name="<?php echo "sqty".$i; ?>" id="<?php echo "sqty".$i; ?>" value="<?php echo $Fct['remarks']; ?>"onKeyPress="return tabE(this,event)" class="form-control" readonly='ture'> </td>
				<td style="width: 80px"><input name="<?php echo "smrp".$i; ?>" id="<?php echo "smrp".$i; ?>" value="<?php echo $TotalService=$Fct['st_amt']*$Fct['qty']; ?>"onKeyPress="return tabE(this,event)" class="form-control" readonly='ture'> </td>
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
             <table border="1" width="950" align="center" >
			  <thead>
                <tr style="align:center">
                <th style="width: 30px">S:No</th>
                <th style="width: 110px">Service Item Name</th>
				<th style="width: 110px">Amount </th>
				<th style="width: 110px">Qty</th>
				<th style="width: 110px">Total</th>
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
             <table border="1" width="950" align="center" >
			  <thead>
                <tr style="align:center">
                <th style="width: 30px">S:No</th>
                <th style="width: 110px">Spare Name</th>
				<th style="width: 110px">Amount </th>
				<th style="width: 110px">Qty</th>
				<th style="width: 110px">Total</th>
			    </tr>
				<?php
			 	$ct1="select * from s_spare_prepick where s_job_card_no='".$jcd1['id']."'"; 
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
				?>
                <tr>
                <td style="width: 30px;padding-left:5px"><?php echo "   ".$i; ?></td>
				<td style="width: 80px"><input name="<?php echo "sparename".$i; ?>" id="<?php echo "sparename".$i; ?>" value="<?php echo $FESPPName['sname']; ?>" onKeyPress="return tabE(this,event)" class="form-control" readonly='ture'> </td>
				<td style="width: 80px"><input name="<?php echo "mrp".$i; ?>" id="<?php echo "mrp".$i; ?>" value="<?php echo $abcd1['mrp']; ?>"onKeyPress="return tabE(this,event)" class="form-control" readonly='ture'> </td>
				<td style="width: 80px"><input name="<?php echo "qty".$i; ?>" id="<?php echo "qty".$i; ?>" value="<?php echo $abcd1['qty']; ?>"onKeyPress="return tabE(this,event)" class="form-control" readonly='ture'> </td>
				<td style="width: 80px"><input name="<?php echo "total".$i; ?>" id="<?php echo "total".$i; ?>" value="<?php echo $TotalPrepick=$abcd1['mrp']*$abcd1['qty']; ?>"onKeyPress="return tabE(this,event)" class="form-control" readonly='ture'> </td>
                </tr>
				<?php					
				$_SESSION['TotalServiceAmount']=$_SESSION['TotalServiceAmount'];	
				$_SESSION['TotalSpareAmount']=$_SESSION['TotalSpareAmount']+$TotalPrepick;
				
				$Stemp="insert into a_final_bill_spare_temp set amount='".$abcd1['mrp']."',SpareFrom='SparePick',bill_date='$bill_date',inv_no='$inv_no',job_card_no='$job_card_no',sname='".$abcd1['spare_name']."',qty='".$abcd1['qty']."'";
				$EStemp=mysqli_query($conn,$Stemp);
								
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
		<div class="form-group col-sm-12">
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
                  <label for="party">Spare Amount</label>
				  <input type="text" class="form-control" name="total_samt" id="total_samt" value="<?php echo $_SESSION['TotalSpareAmount']; ?>" onKeyUp="sumgst();"  onKeyPress="return tabE(this,event)" readonly='ture'>
               </div>
			    <div class="form-group col-sm-4">
                  <label for="party">Others Charge</label>
				  <input type="text" class="form-control" name="others_charge" id="others_charge"  onKeyUp="sumgst();"  onKeyPress="return tabE(this,event)">
               </div>
			   <?php 
			   $total=$_SESSION['TotalServiceAmount']+$_SESSION['TotalSpareAmount'];
			   
			   ?>
			    <div class="form-group col-sm-4">
                  <label for="party">Total Service Amount</label>
				  <input type="text" class="form-control" name="total" id="total" value="0" readonly onKeyUp="sumgst();"  onKeyPress="return tabE(this,event)">
               </div>
			   
			    <div class="form-group col-sm-4">
                  <label for="party">Discount %</label>
				  <input type="text" class="form-control" name="discount" id="discount" value="0" onKeyUp="sumgst();"  onKeyPress="return tabE(this,event)">
               </div>
			     <div class="form-group col-sm-4">
                  <label for="party">Amount</label>
				  <input type="text" class="form-control" name="total_amt" id="total_amt" onKeyUp="sumgst();"  value="0" onKeyPress="return tabE(this,event)" readonly='ture'>
               </div>
			   <div class="hidden">
			    <div class="form-group col-sm-4">
                  <label for="party">Net Amount</label>
				  <input type="text" class="form-control" name="net_amt" id="net_amt" onKeyUp="sumgst();"  value="0" onKeyPress="return tabE(this,event)" readonly='ture'>
               </div> </div>
			   
			   <div class="form-group col-sm-4">
                  <label for="party">GST </label>
				  <select type="text" class="form-control" name="gst" id="gst" onChange="sumgst();"  onKeyPress="return tabE(this,event)" required>
				  <option value="">Select The Gst</option>
				   <option>0</option>
				   <option>2.5</option>
				    <option>5</option>
					 <option>10</option>
					  <option>18</option>
					   <option>28</option>
				  </select>
               </div>  
			    <div class="form-group col-sm-4">
                  <label for="party" style="background-color:#B3BFC2">Bill Amount</label>
				  <input type="text" class="form-control" name="bill_amt" id="bill_amt" style="background-color:#B3BFC2" value="0" onKeyUp="sumgst();"  onKeyPress="return tabE(this,event)">
               </div>
			  
			   <div class="form-group col-sm-4">
                  <label for="party">Paid Advance Amount ()</label>
				  <input type="text" class="form-control" name="offer_amt" id="offer_amt" value="<?php echo $jcd1['PaidAmount']; ?>" readonly onKeyUp="sumgst();"  onKeyPress="return tabE(this,event)">
               </div>
			   
			    <div class="form-group col-sm-4">
                  <label for="party"> From Offer Amount</label>
				  <input type="text" class="form-control" name="fromoffer_amt" id="fromoffer_amt" value="0" onKeyUp="sumgst();"  onKeyPress="return tabE(this,event)">
               </div>
			   
			    <div class="form-group col-sm-4">
                  <label for="party">Received Amount</label>
				  <input type="text" class="form-control" name="rec_amt" id="rec_amt" value="0"  onKeyUp="sumgst();" onKeyPress="return tabE(this,event)">
               </div>
			   <div class="form-group col-sm-4">
                  <label for="party">Balance Amount</label>
				  <input type="text" class="form-control" name="bal_amt" id="bal_amt" onKeyPress="return tabE(this,event)" readonly='ture'>
               </div>
			   
			
			    <div class="form-group col-sm-4">
                  <label for="party">Payment Mode</label>
				  <select class="form-control" name="payment_mode" id="payment_mode" onchange = "ShowHideDiv()">
				    <option value="">Select the Option</option>
				  <option value="Cash">Cash</option>
				   <option value="Credit">Credit</option>
				   <option value="Cheque">Cheque</option>
				   <option value="Neft">Neft</option>
				   <option value="RTGS">RTGS</option>
				  </select>
				   </div>
				 <div class="form-group col-sm-8" id="bank_details" style="display:none">
				
					<div class="form-group col-sm-6">
              <label for="Branch">Bank Name</label>
              <select class="form-control" name="BankName" id="BankName" onChange="get_account(this.value);">
			   <option value="">--Select Bank--</option>
			  <?php
			  $bank="select DISTINCT(BankName) as  BankName from a_bank_acc";
			  $bankq=mysqli_query($conn,$bank);
			  while($bankfetch=mysqli_fetch_array($bankq))
			  {
			  ?>
			 <option value="<?php echo $bankfetch['BankName'];?>"><?php echo $bankfetch['BankName'];?></option>
			  <?php
			  }
			  ?>
			  </select>
                </div>
			  	<div class="form-group col-sm-6">
              <label for="Branch">Account No</label>
              <select class="form-control" name="AccountNo" id="AccountNo" class="form-control" onChange="get_bankid();"></select>
                </div>
				<div class="form-group col-sm-6" style="display:none">
                  <label for="Branch">Bank Id</label>
                  <input type="text" class="form-control" name="BankId" id="BankId" readonly>
                </div>
				
					<div class="form-group col-sm-6" style="display:none">
                  <label for="Branch">Ledger Id</label>
                  <input type="text" class="form-control" name="LedgerId" id="LedgerId" readonly>
                </div>
				</div>
               </div>
			   <div class="form-group col-sm-4">
                  <label for="party">SMS</label>
				  <select type="text" class="form-control" name="sms" id="sms" >
				  <option value="ENABLE">ENABLE</option>
				   <option value="DISABLE">DISABLE</option>
				  </select>
               </div>
                 
				 <div class="box-footer">
                <button type="submit" class="btn btn-info pull-right" Onclick="return confirm('Are you sure want to proceed?')">Submit The Invoice</button>
                </div>   
        