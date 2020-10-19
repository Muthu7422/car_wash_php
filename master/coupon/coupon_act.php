<?php
include("../../includes.php");
include("../../redirect.php");
$nc=$_POST['NoOfCoupons'];
for($i=0;$i<$nc;$i++)
{
	$CouponNumber=mt_rand(10000, 999999);
 $in="insert into  coupon set CouponCode='$CouponNumber',CouponDiscount='".$_POST['CouponDiscount']."',CouponType='".$_POST['CouponType']."',CouponMember='".$_POST['CouponMember']."',CouponDescription='".$_POST['CouponDescription']."',GeneratedDate='".date('Y-m-d')."',ExpiryDate='".$_POST['CouponExpire']."'";
$Ein=mysqli_query($conn,$in);

}

header("location:coupon.php?s=Data Saved Successfully!");

?>