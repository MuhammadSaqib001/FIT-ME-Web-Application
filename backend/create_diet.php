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
  
//	echo "CONNECTED";
	
			if(isset($_POST['save']))
			{
				//echo "CONNECTED";
					 
					$myfile = fopen("test1", "r") or die("Unable to open file!");
				$i=fgets($myfile);		
				fclose($myfile); 
				$userr = (int)$i;	
				echo $userr;
				
				  			
	$q1 = "update diet_plan set status='P' where user_id = ".$userr;
		 
				$query_id2 = oci_parse($con, $q1);
				$row2 = oci_execute($query_id2);
				
				
					$sql = "select max(dietplan_id) from diet_plan";  
				$query_id = oci_parse($con, $sql);
				$r = oci_execute($query_id);
				$row = oci_fetch_array($query_id, OCI_BOTH+OCI_RETURN_NULLS);
					
				$w_id=$row[0];
				$w_id++;
				
				echo $w_id;
				
				 $x1=  $_POST["name"];
	  			 $x2=  $_POST["complexity"] ;
				  $x3=  $_POST["duration"];
					  $x4=  $_POST["nutrient"];

		
		$d="'" .date("Y-m-d")."'";
	$q = "INSERT INTO diet_plan(user_id,dietplan_id,diet_name,start_date,duration,status,nutrients) VALUES (". $userr . "," .$w_id.  ",'" .$x1.  "',DATE " .$d. "," .$x3.  ",'A','"  .$x4. "')";
		 
				$query_id1 = oci_parse($con, $q);
				$row1 = oci_execute($query_id1);

						if($_POST['save'])
						{
							header ("Location: create_diet1.php");
						}
						if($_POST['done'])
						{
							header ("Location: home.php");
						}
			}
			
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <title>ADD Diet Plan</title>
    <link rel="stylesheet" href="register.css">
</head>
<body>
    <div class="wrapper">
        <div class="title">
            Diet_Plan 
        </div>
	
        <form method="POST">
			<div class="mytext"><center>Diet_Plan Type Details</center></div>
            <div class="field">
               DietPlan_Name *<input type="text" name="name" required>

            </div>
            <div class="field">
               Complexity *<input type="text" name="complexity" required>

            </div>
			
			 <div class="field">
               Duration *<input type="text" name="duration" required>

            </div>
			
			 <div class="field">
               Nutrients included *<input type="text" name="nutrient" >

            </div>
<br>
            <div class="field1">
                <input type="submit" name="save" value="Next->">
            </div>
        </form>
        
</body>
</html>