      <!-- Static navbar -->
        <aside class="main-sidebar">
        <section class="sidebar">
		<?php
		//echo $path = $_SESSION['path'];
        ?>
      <!-- Sidebar user panel (optional) -->
      <!-- Sidebar Menu -->
      <ul class="sidebar-menu">
        
        <!-- Optionally, you can add icons to the links -->
        <li><a href="<?php echo $_SESSION['path'];?>/admin.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
		<?php
		//include("../../includes.php");
		$uname=$_SESSION['role_name'];
	    $slm="select id,category,cicon,url from t_lmenu where parent='0' order by id";
		$Eslm=mysqli_query($conn,$slm);
		//echo mysqli_num_rows($Eslm);
		while($FEslm=mysqli_fetch_array($Eslm))
		{
		$sup="select * from t_role_pages where role_id='$uname' AND pageno='".$FEslm['id']."'";
		$Esup=mysqli_query($conn,$sup); 
		$nup=mysqli_num_rows($Esup);
    	if($nup >'0') {
		?>
		<li class="treeview">
        <a href="<?php echo $_SESSION['path']."/".$FEslm['url']; ?>"><i class="<?php echo $FEslm['cicon']; ?>"></i> <span><?php echo $FEslm['category']; ?></span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
		 
		<ul class="treeview-menu"> 
        <?php 
		 $ssc="select id,category,cicon,url from t_lmenu where parent='".$FEslm['id']."' order by orders";
		 $Essc=mysqli_query($conn,$ssc);
		 $nsc=mysqli_num_rows($Essc);
		 //while($FEssc=mysqli_fetch_array($Essc))
		 //$FEssc=mysqli_fetch_array($Essc);
		 while($FEssc=mysqli_fetch_array($Essc))
		 {
			
		 $sup1="select * from t_role_pages where role_id='$uname' AND pageno='".$FEssc['id']."'";
		 $Esup1=mysqli_query($conn,$sup1);
		 $nup1=mysqli_num_rows($Esup1);
		 if($nup1 > '0')
		 {

		 $ssc1="select id,category,cicon,url from t_lmenu where parent='".$FEssc['id']."' order by orders";
		 $Essc1=mysqli_query($conn,$ssc1);
		 $nsc1=mysqli_num_rows($Essc1);
	    
         if($nsc1>'1') {		
		?>	  		  
		<li>
		<?php }
		 else {
		?>
		<li>
		<?php } ?>
          <a href="<?php echo  $_SESSION['path']."/".$FEssc['url']; ?>"><i class="<?php echo $FEssc['cicon']; ?>"></i> <span><?php echo $FEssc['category']; ?></span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span> 
          </a>		  		 
          <?php 
		  if(1==2) {
		  ?>
		  <ul class="treeview-menu">
		  <?php 		
		   //while($FEssc=mysqli_fetch_array($Essc))
		   //$FEssc=mysqli_fetch_array($Essc);
		   while($FEssc1=mysqli_fetch_array($Essc1))
		     {
			 $sup2="select * from t_role_pages where role_id='$uname' AND pageno='".$FEssc1['id']."'";
		     $Esup2=mysqli_query($conn,$sup2);
		     $nup2=mysqli_num_rows($Esup2);
		     if($nup2 > '0')
		     //if(1==1)
		     {
		  ?>
          <li><a href="<?php echo $FEssc1['url']; ?>"><i class="<?php echo $FEssc1['cicon']; ?>"></i> <span><?php echo $FEssc1['category']; ?> </span></a></li>	
		  <?php }  
		   }
		  ?>
		  </ul>
		  <?php } ?>		 		  
		</li>        
		<?php } 
		 }
		?>
		 </ul>
		</li> 
		<?php }  
		}		 
		?>
	  </ul>
	
	<!-- /.sidebar-menu -->
    </section>
	</aside>
 <div class="control-sidebar-bg"></div>