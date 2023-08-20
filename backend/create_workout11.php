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
								  			
				$q1 = "select * from workout_plan where user_id = ".$userr. " and status='A'" ;
		 
				$query_id1 = oci_parse($con, $q1);
				$r1 = oci_execute($query_id1);
				$row1 = oci_fetch_array($query_id1, OCI_BOTH+OCI_RETURN_NULLS);
				$id= (int)$row1[0];
				
				//	$id= (int)$row2['WORKOUT_NAME'];
				
				echo "Workout_Id = ";
				echo $id;
				
				$q2 = "select muscle_id from muscle_group where workout_id = ".$id. " and muscle_name='" .$_POST['muscle']. "'";
		 
				$query_id2 = oci_parse($con, $q2);
				$r2 = oci_execute($query_id2);
				$row2 = oci_fetch_array($query_id2, OCI_BOTH+OCI_RETURN_NULLS);
			
				$m_id=(int)$row2[0];
				if($m_id==0)
				{	
					$q3 = "select max(muscle_id) from muscle_group";
					$query_id3 = oci_parse($con, $q3);
					$r3 = oci_execute($query_id3);
					$row3 = oci_fetch_array($query_id3, OCI_BOTH+OCI_RETURN_NULLS);
					$m_id=(int)$row3[0];
					$m_id++;
					
					$q4 = "insert into muscle_group values(" .$m_id. ",'" .$_POST['muscle']. "'," .$id. ")" ;
		 
					$query_id4= oci_parse($con, $q4);
					$r4 = oci_execute($query_id4);
					
				}
				
						$q5 = "select max(exercise_id) from exercise";
						$query_id5 = oci_parse($con, $q5);
						$r5 = oci_execute($query_id5);
						$row5 = oci_fetch_array($query_id5, OCI_BOTH+OCI_RETURN_NULLS);
						$e_id=(int)$row5[0];
						$e_id++;
						
						$q6 = "insert into exercise values(" .$e_id. ",'" .$_POST['name']. "','" .$_POST['day']."','".$_POST['equip']."','".$_POST['det']. "',".$m_id.")";
						$query_id6= oci_parse($con, $q6);
						$r6 = oci_execute($query_id6);
								
						if($r6)
						{
								if(isset($_POST['save']))
								{
									header ("Location: create_workout1.php");			
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
    <title>Add Exercises</title>
    <link rel="stylesheet" href="register.css">
</head>
<body>
    <div class="wrapper">
        <div class="title">
            Workout_Plan 
        </div>
	
        <form  method="POST">
			<div class="mytext"><center>Workout_Plan Exercises </center></div>
            <div class="field">
               Exercise Name *<input type="text" name="name" required>

            </div>
			
			<div class="field">
               Day of Exercise (Monday etc.)*<input type="text" name="day" >

            </div>
			
            <div class="field">
                Equipment Required*<input type="text" name="equip" >

            </div>
			 <div class="field">
               Details *<input type="text" name="det" required>

            </div>
<br>
		<br>
		Select Muscle group of exercise :- <br>
		<select name="muscle" id="muscle" value="Select Muscle Group of each exercise">
			<option value="Abs Muscles" >Abs Muscles</option>
			<option value="Legs & Traps" >Legs & Traps</option>
			<option value="Biceps & Triceps" >Biceps & Triceps</option>
			<option value="Shoulder" >Shoulder</option>
			<option value="Chest" >Chest</option>
			<option value="N/A" >N/A</option>


		</select>
		
            <div class="field1">
                <input type="submit" name="save" value="Add next Exercise">
            </div>
			<br><center>or</center>
			<div class="field1">
                <input type="submit" name="done" value="Done">
            </div>
        </form>
        
</body>
</html>