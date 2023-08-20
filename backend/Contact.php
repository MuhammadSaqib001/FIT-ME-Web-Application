<?php

		$db_sid = 
		" (DESCRIPTION =
    (ADDRESS = (PROTOCOL = TCP)(HOST = localhost)(PORT = 1521))
    (CONNECT_DATA =
      (SERVER = DEDICATED)
      (SERVICE_NAME = SAQIB)
    )
  )
  ";  
    $db_user = "SYSTEM";   // Oracle username e.g "scott"
   $db_pass = "PASSword165588";    // Password for user e.g "1234"
   $con = oci_connect($db_user,$db_pass,$db_sid); 
  
	echo "CONNECTED";
	
				$myfile = fopen("test1", "r") or die("Unable to open file!");
				$x=fgets($myfile);		
				fclose($myfile); 
			 
				$num = (int)$x;			
				$sql = "update users set phone='" .$_POST['phone']. "' , address='" .$_POST['address']. "' where user_id=" .$num. "";  
				$query_id = oci_parse($con, $sql);
				$r = oci_execute($query_id);
					
				
				
				if($r)
				{	
						if($r)    header ("Location: home.php");
				}
				else
				{
					header ("Location: Password.html?wrong=true");
					}
?>

