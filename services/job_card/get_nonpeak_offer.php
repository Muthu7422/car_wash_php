<?php
include("../../includes.php");    
            
		if(trim($_POST['NoOfVisit'])>0)
		{
			if(trim($_POST['ThreeMonthOffer'])>0)
			{
				$Offer=1;
			}
			else
			{					
			 $c="SELECT count(*) as cnt FROM m_discount where '".trim($_POST['EntryTime'])."' > s_time && '".trim($_POST['EntryTime'])."' < e_time";
			$Ec=mysqli_query($conn,$c);
			$FEc=mysqli_fetch_array($Ec); 
			$CurrentDay=trim($_POST['CurrentDay']);
			
			if(($CurrentDay=='Monday')||($CurrentDay=='Tueday')||($CurrentDay=='Wednesday')||($CurrentDay=='Thursday'))
			{
				if($FEc['cnt']>0)
				{
					$Offer=2;
				}
				else
				{
					$Offer=0;
				}
			}
			else
			{
				$Offer=0;
			}					
			}
		}
		else
		{
			$Offer=0;	
		}
		echo $Offer;
?>	  
