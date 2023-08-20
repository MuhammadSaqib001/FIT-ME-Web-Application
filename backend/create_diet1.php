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
  	
			if(isset($_POST['save']) || isset($_POST['done']))
			{
				$myfile = fopen("test1", "r") or die("Unable to open file!");
				$i=fgets($myfile);		
				fclose($myfile); 
				$userr = (int)$i;	
				echo "User = ";
				echo $userr;
								  			
				$q1 = "select * from diet_plan where user_id = ".$userr. " and status='A'" ;
		 
				$query_id1 = oci_parse($con, $q1);
				$r1 = oci_execute($query_id1);
				$row1 = oci_fetch_array($query_id1, OCI_BOTH+OCI_RETURN_NULLS);
				$id= (int)$row1[0];
				
				//	$id= (int)$row2['WORKOUT_NAME'];
				
				$q2 = "select max(food_id) from food_intake" ;
		 
				$query_id2 = oci_parse($con, $q2);
				$r2 = oci_execute($query_id2);
				$row2 = oci_fetch_array($query_id2, OCI_BOTH+OCI_RETURN_NULLS);
			
				$f_id=(int)$row2[0];
				$f_id++;
						
						$q6 = "insert into food_intake values(" .$f_id. ",'" .$_POST['name']. "','" .$_POST['qua']."','".$_POST['cal']."','".$_POST['day']. "','" .$_POST['meal']. "'," .$id.")";
						$query_id6= oci_parse($con, $q6);
						$r6 = oci_execute($query_id6);
								
						if($r6)
						{
								if(isset($_POST['save']))
								{
									header ("Location: create_diet1.php");			
								}
								
								if(isset($_POST['done']))
								{
									header ("Location: home.php");			
								}
						
						}
					}
				
			
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <title>Add Food_Intake</title>
    <link rel="stylesheet" href="register.css">
</head>
<body>
    <div class="wrapper">
        <div class="title">
            Diet_Plan
        </div>
	
        <form  method="POST">
			<div class="mytext"><center>Diet_Plan Food Inatke</center></div>
            <div class="field">
               Food Name *<input type="text" name="name" required>

            </div>
		
			
            <div class="field">
               Quantity *<input type="number" name="qua" required>

            </div>
			
			<div class="field">
               Calories Gained *<input type="number" name="cal" required>

            </div>
			
			<div class="field">
               Day of Week (Monday etc.)*<input type="text" name="day" >

            </div>
			
			
			 
<br>
		Select the Time of Meal :- <br>
		<select name="meal" id="meal" value="Select Meal">
			<option value="Breakfast" >Breakfast</option>
			<option value="Lunch" >Lunch</option>
			<option value="Snack Time" >Snack Time</option>
			<option value="Dinner" >Dinner</option>
			<option value="N/A" >N/A</option>


		</select>
            <div class="field1">
                <input type="submit" name="save" value="Next->">
            </div>
			<br>
			<center>or</center>
			<div class="field1">
                <input type="submit" name="done" value="Done">
            </div>
			
        </form>
        
</body>
</html>