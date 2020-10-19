<?php
error_reporting(0);
include("../../includes.php");
include("../../redirect.php");
if(!isset($_POST["filen"])){
		
		 $filename=$_FILES["filen"]["tmp_name"];
		

		 if($_FILES["filen"]["size"] > 0)
		 {

		  	$file = fopen($filename, "r");
	         while (($emapData = fgetcsv($file, 10000, ",")) !== FALSE)
	         {
				 
				$sd="select Id from crm_enquiry where CustomerFirstName='$emapData[1]' AND CustomerMobile1='$emapData[6]' AND CompanyName='$emapData[3]'";
				$Esd=mysqli_query($conn,$sd);
				$nr=mysqli_num_rows($Esd);
				if($nr<'1')
				{
				//It wiil insert a row to our subject table from our csv file`
	            $sql = "INSERT into crm_enquiry(CustomerFirstName,CustomerLastName,CompanyName,CustomerEmailId,CustomerSkypeId,CustomerMobile1,CustomerMobile2,CustomerStreet,CustomerCity,CustomerState,CustomerPinCode,CustomerCountry,LeadSource,Description,EnquiryDate,EnquiryStatus,Status)";
                $sql.="values('$emapData[1]','$emapData[2]','$emapData[3]','$emapData[4]','$emapData[5]','$emapData[6]','$emapData[7]','$emapData[8]','$emapData[9]','$emapData[10]','$emapData[11]','$emapData[12]','Database Extraction','$emapData[14]','".date('Y-m-d')."','1','Active')";
                                                                                                                                                                                                                      
	         //we are using mysqli_query function. it returns a resource on true else False on error
	          $result = mysqli_query($conn,$sql);
				}
			  //echo "dfsdfdsfdsfsdf";exit;
				if(! $result )
				{
					echo "<script type=\"text/javascript\">
							alert(\"Invalid File:Please Upload CSV File.\");
							window.location = \"enquiry.php\"
						</script>";
				
				}

	         }
	         fclose($file);
	         //throws a message if data successfully imported to mysqli database from excel file
	         echo "<script type=\"text/javascript\">
						alert(\"CSV File has been successfully Imported.\");
						window.location = \"enquiry.php\"
					</script>";
	        //close of connection
						
		 }
	}	 
?>		 