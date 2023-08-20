
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
  

				$sql = "insert into student values('19I-0494','Muhammad Saqib','0306-6803494','Multan','A',0,2)";
				$query_id = oci_parse($con, $sql);
				$r = oci_execute($query_id);
			//	$row = oci_fetch_array($query_id, OCI_BOTH+OCI_RETURN_NULLS);
					
			
		
						//echo "<center style='color:black;font-size:20px;font-family:calibri;height:15px;'>" .$dis. " </center> ";
?>
