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

    if(isset($_POST['login']))
			{
				 $x1=  $_POST["logid"];
	  			 $x2=  $_POST["passcode"] ;
				 
				//$q = "INSERT INTO employees(EMPLOYEE_ID,LAST_NAME,JOB_ID,HIRE_DATE,SALARY,COMMISION_PCT,DEPARTMENT_ID) VALUES". $_POST["emp_id"];
	 			$q = "select * from USERS where user_id=" .$x1. "";
					$query_id = oci_parse($con, $q);
					$r = oci_execute($query_id);
                    $row = oci_fetch_array($query_id, OCI_BOTH+OCI_RETURN_NULLS);
					$member_id = $row["USER_ID"];
					$pass = $row["PASSWORD"];

				if($pass == $x2)
                {
					$file = fopen("test1","w");
					echo fwrite($file,$x1);
					fclose($file);
                   header ("Location: home.php");
                }
				else
				{	
					header ("Location: FIT_ME.html?wrong=true");	
				}
			}
?>