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
	
			if(isset($_POST['register']))
			{
				
					$sql = "select max(user_id) from users";  
				$query_id = oci_parse($con, $sql);
				$r = oci_execute($query_id);
				$row = oci_fetch_array($query_id, OCI_BOTH+OCI_RETURN_NULLS);
					
				$x=$row[0];
				$x++;
				
				
				 $x1=  $_POST["logname"];
	  			 $x2=  $_POST["passcode"] ;
				  $x3=  $_POST["gender"];
	  			 $x4=  $_POST["weight"] ;
				  $x5=  $_POST["height"];
	  			 
				 
			$file = fopen("test1","w");
					echo fwrite($file,$x);
					fclose($file);
				
	$q = "INSERT INTO users(user_id,user_name,password,gender,height,weight) VALUES (". $x . ",'" .$x1.  "','" .$x2.  "','" .$x3.  "','" .$x5.  "','" .$x4."' )";
		 
				$query_id1 = oci_parse($con, $q);
				$row1 = oci_execute($query_id1);

						if($row1)    header ("Location: Register1.php");
						
			}
?>