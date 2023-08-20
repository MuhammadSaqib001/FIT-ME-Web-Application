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

    if(isset($_POST['student']))
			{

				 $x1=  $_POST["user_name"];
	  			 $x2=  $_POST["passcode"] ;
				 
				//$q = "INSERT INTO employees(EMPLOYEE_ID,LAST_NAME,JOB_ID,HIRE_DATE,SALARY,COMMISION_PCT,DEPARTMENT_ID) VALUES". $_POST["emp_id"];
	 			$q = "select * from our_user where user_id=" .$x1. " and role=0";
					$query_id = oci_parse($con, $q);
					$r = oci_execute($query_id);
                    $row = oci_fetch_array($query_id, OCI_BOTH+OCI_RETURN_NULLS);
					$member_id = $row["USER_ID"];
					$pass = $row["PASSWORD"];
					echo $pass;
				if($pass == $x2)
                {
					$file = fopen("test1","w");
					echo fwrite($file,$x1);
					fclose($file);
                   header ("Location: dashboard_attendence.php");
                }
				else
				{	
				header ("Location: FIT_ME.html?wrong=true");	
				}
			}

			if(isset($_POST['admin']))
			{

			
				 $x1=  $_POST["user_name"];
	  			 $x2=  $_POST["passcode"] ;
				 
				//$q = "INSERT INTO employees(EMPLOYEE_ID,LAST_NAME,JOB_ID,HIRE_DATE,SALARY,COMMISION_PCT,DEPARTMENT_ID) VALUES". $_POST["emp_id"];
	 			$q = "select * from our_user where user_id=" .$x1. " and role=1";
					$query_id = oci_parse($con, $q);
					$r = oci_execute($query_id);
                    $row = oci_fetch_array($query_id, OCI_BOTH+OCI_RETURN_NULLS);
					$member_id = $row["USER_ID"];
					$pass = $row["PASSWORD"];
					echo $pass;
				if($pass == $x2)
                {
					$file = fopen("test1","w");
					echo fwrite($file,$x1);
					fclose($file);
                   header ("Location: FIT_ME.html");
                }
				else
				{	
					header ("Location: FIT_ME.html?wrong=true");	
				}
			}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <title>FitMe Login Form</title>
    <link rel="stylesheet" href="attendence.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div style="display:flex ; justify-content: space-between;">
        <div style="flex:3">
   
            <div class="left_area">
                <h3><i>Attendence Mangement System</i></h3>
            </div>
            <div class="wrapper">
                <div class="title">
                    Login Role
                </div>
           
            <form  method="POST">


                <div class="field">
                    User Name<input type="text" name="user_name" >
                </div>

                <div class="field">
                    Password<input type="password" name="passcode" >
                </div>
                <div class="field">
                    <input type="submit" name="student" value="Login as STUDENT">
                </div>
               <br><center>or</center>
                <div class="field1">
                    <input type="submit" name="admin" value="Login as ADMIN">
                </div>
            </form>
        </div>
        </div>
        <div style="flex:4;">
            <img style="width: 60vw; height: 80vh;margin-left:-85px; margin-top:59px" src="Cx1.jpeg"><img>
         
        </div>

    </div>

    

    <div class="copy">
        <center>© 2021 Muhammad Saqib (BS Student at FAST NUCES Islamabad). All rights reserved</center>
    </div>
</body>

</html>