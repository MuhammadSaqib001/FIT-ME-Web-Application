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
	
			if(isset($_POST['reset']))
			{
				
					$sql = "select user_name from users where user_id=" .$_POST['id']. "";  
				$query_id = oci_parse($con, $sql);
				$r = oci_execute($query_id);
				$row = oci_fetch_array($query_id, OCI_BOTH+OCI_RETURN_NULLS);
					
				$x=$row[0];
				
				if($x==$_POST['name'])
				{	
					$q = "Update users set password= '" .$x. "' where user_id=" .$_POST['id'];
		 
				$query_id1 = oci_parse($con, $q);
				$row1 = oci_execute($query_id1);

						if($row1)    header ("Location: FIT_ME.html");
				}
				else
				{
					header ("Location: Password.html?wrong=true");
				}				
			}
?>