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
//echo "CONNECTED";
    if(isset($_POST['register']))
	{
		$myfile = fopen("test1", "r") or die("Unable to open file!");
				$x=fgets($myfile);		
				fclose($myfile); 
			 
				$num = (int)$x;			
				$sql = "update users set goal='" .$_POST['goals']. "' where user_id=" .$num. "";  
				$query_id = oci_parse($con, $sql);
				$r = oci_execute($query_id);
					
				
				
				if($r)
				{	
					if($_POST['workout']=="w1")
					{
						header ("Location: workout_template1.php");
					}
					if($_POST['workout']=="w2")
					{
						header ("Location: create_workout.php");
					}
				}
	}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <title>Workout Creation</title>
    <link rel="stylesheet" href="register.css">
</head>
<body>
    <div class="wrapper">
        <div class="title">
            Workout Plan Creation
        </div>
	
		<div class="mytext"><center>Fitness Targets</center></div>

        <form action="" method="POST">
            
            
			
		<div class="field">	
		<span title="Select your Fitness Goal">Fitness Goal &nbsp &nbsp&nbsp &nbsp:-&nbsp</span>
		<select name="goals" id="goals" value="Select Your Fitness Goal">
			<option id="g1" value="Weight Loss" >Weight Loss</option>
			<option id="g2"  value="Weight Gain" >Weight Gain</option>
			<option id="g3"  value="Healthy Life" >Healthy Life</option>
		</select>
		
		</div>
		
		<span title="Workout type">Workout Type &nbsp:-&nbsp
		
		<select name="workout" id="workout" value="Select Your Workout Plan Plan">
			<option value="w1" >Choose from Existing Workout Plans</option>
			<option value="w2" >Create a Customized Plan</option>
		</select>

			 <div class="field1">
             <input type="submit" name="register" value="Save">
            </div>
			
			
        </form>
     </div>   
</body>
</html>