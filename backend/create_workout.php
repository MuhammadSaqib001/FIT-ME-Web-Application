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
				
				  			
	$q1 = "update workout_plan set status='P' where user_id = ".$userr;
		 
				$query_id2 = oci_parse($con, $q1);
				$row2 = oci_execute($query_id2);
				
				
					$sql = "select max(workout_id) from workout_plan";  
				$query_id = oci_parse($con, $sql);
				$r = oci_execute($query_id);
				$row = oci_fetch_array($query_id, OCI_BOTH+OCI_RETURN_NULLS);
					
				$w_id=$row[0];
				$w_id++;
				
				echo $w_id;
				
				 $x1=  $_POST["name"];
	  			 $x2=  $_POST["dif"] ;
				  $x3=  $_POST["du"];
	
		
		$d="'" .date("Y-m-d")."'";
	$q = "INSERT INTO workout_plan(user_id,workout_id,workout_name,start_date,duration,status,difficulty) VALUES (". $userr . "," .$w_id.  ",'" .$x1.  "',DATE " .$d. "," .$x3.  ",'A','" .$x2."' )";
		 
				$query_id1 = oci_parse($con, $q);
				$row1 = oci_execute($query_id1);

						if($row1) 
						{
							header ("Location: create_workout1.php");
						}
			}
?>

<html lang="en" dir="ltr">
<head>
    <title>Add Workout Plan</title>
    <link rel="stylesheet" href="register.css">
</head>
<body>
    <div class="wrapper">
        <div class="title">
            Workout_Plan 
        </div>
	
        <form  method="POST">
			<div class="mytext"><center>Workout_Plan Type Details</center></div>
            <div class="field">
               Workout_Name *<input type="text" name="name" required>

            </div>
            <div class="field">
               Difficulty *<input type="text" name="dif" required>

            </div>
			
			 <div class="field">
               Duration (Months) *<input type="text" name="du" required>

            </div>
			
			 <div class="field">
               Number of Exercises *<input type="text" name="num_e" required>

            </div>
<br>
			
		

            <div class="field1">
                <input type="submit" name="save" value="Next->">
            </div>
        </form>
        
</body>
</html>