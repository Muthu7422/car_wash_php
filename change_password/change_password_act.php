<?php
include("../includes.php");
include("../redirect.php");

 $cs1="select * from f_user_create where user_name='".$_SESSION['user']."' AND password='".$_POST['old_password']."' "; 
$Ecs1=mysqli_query($conn,$cs1);
 $nr1=mysqli_num_rows($Ecs1);
if($nr1>'0')
{
 $cs="update f_user_create set password='".$_POST['new_password']."' where user_name='".$_SESSION['user']."' AND password='".$_POST['old_password']."' ";
$Ecs=mysqli_query($conn,$cs);
 
header("location:../login.php");	
}
else
{
	?>
<script type="text/javascript">
       //alert("Your Old Password is Wrong ! Please Login Again!!");
	  window.location.href='../login.php';
    </script>
	<?php
}

?>