<?php
include("dbinfo.php");
include 'db.php';
 if(isset($_POST["Import"])){		

		echo $filename=$_FILES["file"]["tmp_name"];
		

		 if($_FILES["file"]["size"] > 0)
		 {

		  	$file = fopen($filename, "r");
	         while (($emapData = fgetcsv($file, 10000, ",")) !== FALSE)
	         {
	     //It wiil insert a row to our subject table from our csv file`
	           $sql = "INSERT into t_fabric_purchase (`id`, `lot_no`, `invoice_no`, `date`, `supplier_name`, `gst_no`, `supplier_bank`, `address`, `remarks`,`dis_in_rs`,                            `dis_in_kg`, `no_of_col`, `col_knit_charge`, `payment_mode`, `vehicle_charge`, `net_amount`, `tot_dis_amt`, `tc_knitting`, `net_tot`, `image`) 
values('$emapData[1]','$emapData[2]','$emapData[3]','$emapData[4]','$emapData[5]','$emapData[6]','$emapData[7]','$emapData[8]','$emapData[9]','$emapData[10]',                      '$emapData[11]','$emapData[12]','$emapData[13]','$emapData[14]','$emapData[15]','$emapData[16]','$emapData[17]','$emapData[18]','$emapData[19]','$emapData[20]')"; 
	         //we are using mysql_query function. it returns a resource on true else False on error
	          $result = mysql_query( $sql, $conn );
				if(! $result )
				{
					echo "<script type=\"text/javascript\">
							alert(\"Invalid File:Please Upload CSV File.\");
							window.location = \"fabric_purchase.php\"
						</script>";
				
				}

	         }
	         fclose($file);
	         //throws a message if data successfully imported to mysql database from excel file
	         echo "<script type=\"text/javascript\">
						alert(\"CSV File has been successfully Imported.\");
						window.location = \"fabric_purchase.php\"
					</script>";
	        
			 

			 //close of connection
			mysql_close($conn); 
				
		 	
			
		 }
	}	 
?>