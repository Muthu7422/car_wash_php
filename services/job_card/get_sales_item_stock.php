<?php
include("../../dbinfoi.php");  
  
	  //  $echeck="select * from m_item_master where barcode='".$_POST['qty']."' and status='Active'"; p_purchase
	  
       
      	        
?>	 
	</script>
  	<div class="box box-danger">
            <div class="box-header">
              <h3 class="box-title">Item Stocks</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
			  <div class="box-body" style="overflow:auto">
              <table  align="center" cellspacing="1" bgcolor="#FF6633">
  <tr>
    <td width="82" height="32" bgcolor="#FF6633" align="center"><strong>Item Name </strong></td>
	<td width="89" bgcolor="#FF6633" align="center"><strong>75-S</strong></td>
    <td width="85" bgcolor="#FF6633" align="center"><strong>80-M</strong></td>
    <td width="145" bgcolor="#FF6633" align="center"><strong>85-L</strong></td>
    <td width="88" bgcolor="#FF6633" align="center"><strong>90-XL</strong></td>
    <td width="65" bgcolor="#FF6633" align="center"><strong>95-XXL</strong></td>
	<td width="65" bgcolor="#FF6633" align="center"><strong>100-XXXL</strong></td>
	
  </tr>
  <?php
  
     
    $sn="select * from item_stock where item_name='".$_POST['country_id']."' order by id desc";  
  $Esn=mysqli_query($conn,$sn);
  while($Fsn=mysqli_fetch_array($Esn))
  {
   ?>
  <tr>
    <td bgcolor="#FFFFFF" align="center"><?php echo $Fsn['item_name']; ?></td>
	<td bgcolor="#FFFFFF" align="center"><?php echo $Fsn['S']; ?></td>
    <td bgcolor="#FFFFFF" align="center"><?php echo $Fsn['M']; ?></td>
   <td bgcolor="#FFFFFF" align="center"><?php echo $Fsn['L']; ?></td>
    <td bgcolor="#FFFFFF" align="center"><?php echo $Fsn['XL']; ?></td>
	 <td bgcolor="#FFFFFF" align="center"><?php echo $Fsn['XXL']; ?></td>
	 <td bgcolor="#FFFFFF" align="center"><?php echo $Fsn['XXXL']; ?></td>
   
  </tr>
  <?php } ?>
</table>
			  </div>
            </div>   
			<input type="hidden" class="form-control" id="tc" name="tc"  value="<?php echo $tnc; ?>" >
			
            <!-- /.box-body -->

          </div>
	
