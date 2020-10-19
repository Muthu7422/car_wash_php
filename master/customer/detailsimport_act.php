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
				 
				//$sd="select Id from crm_enquiry where CustomerFirstName='$emapData[1]' AND CustomerMobile1='$emapData[6]' AND CompanyName='$emapData[3]'";
				//$Esd=mysqli_query($sd);
				//$nr=mysqli_num_rows($Esd);
				if(1==1)
				{
				//It wiil insert a row to our subject table from our csv file`
	            $sql = "INSERT into customer_old_data(ServiceDate,CustomerName,VehicleModel,CustomerMobile,ServiceName,VehicleNumber)";
                $sql.="values('$emapData[0]','$emapData[1]','$emapData[2]','$emapData[3]','$emapData[4]','$emapData[5]')";
                                                                                                                                                                                                                      
	         //we are using mysqli_query function. it returns a resource on true else False on error
	          $result = mysqli_query($conn,$sql);
				}
				//exit;
			  //echo "dfsdfdsfdsfsdf";
				if(! $result )
				{
					echo "<script type=\"text/javascript\">
							alert(\"Invalid File:Please Upload CSV File.\");
							window.location = \"detailsimport.php\"
						</script>";
				
				}

	         }
	         fclose($file);
	         //throws a message if data successfully imported to mysqli database from excel file
	         echo "<script type=\"text/javascript\">
						alert(\"CSV File has been successfully Imported.\");
						window.location = \"detailsimport.php\"
					</script>";
	        //close of connection
						
		 }
	}	 
?>		 