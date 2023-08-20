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
				

				if(!is_NULL($_POST['name']))
				{
					$nam=$_POST['name'];
				}
				else
				{
					$sql1 = "select user_name from users where user_id=" .$num. "";  
					$query_id1 = oci_parse($con, $sql1);
					$r1 = oci_execute($query_id1);
					$row1 = oci_fetch_array($query_id1, OCI_BOTH+OCI_RETURN_NULLS);
					
					$nam=$row1['USER_NAME'];	
				}
				
				if(!is_NULL($_POST['height']))
				{
					$h=(float)$_POST['height'];
					
				}
				else
				{
					$sql2 = "select height from users where user_id=" .$num. "";  
					$query_id2 = oci_parse($con, $sql2);
					$r2 = oci_execute($query_id2);
					$row2 = oci_fetch_array($query_id2, OCI_BOTH+OCI_RETURN_NULLS);
					
					$h=(float)$row2['HEIGHT'];
				}
				
				if(!is_NULL($_POST['weight']))
				{
						$w= (float) $_POST['weight'];
				}
				else
				{
					$sql3 = "select weight from users where user_id=" .$num. "";  
					$query_id3 = oci_parse($con, $sql3);
					$r3 = oci_execute($query_id3);
					$row3 = oci_fetch_array($query_id3, OCI_BOTH+OCI_RETURN_NULLS);
					
					$w=(float)$row['WEIGHT'];
				}
				
				$sql = "update users set user_name='" .$nam. "' , height=" .$h. " , weight= " .$w. "where user_id=" .$num. "";  
				$query_id = oci_parse($con, $sql);
				$r = oci_execute($query_id);
					
				
				
				if($r)
				{	
						if($r)    header ("Location: home.php");
				}
				else
				{
					header ("Location: Personal.php");
				}
?>

