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
					if($_POST['diet']=="d1")
					{
						header ("Location: diet_template1.php");
					}
					if($_POST['diet']=="d2")
					{
						header ("Location: create_diet.php");
					}
				}
	}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <title>DietPlan Creation</title>
    <link rel="stylesheet" href="register.css">
</head>
<body>
    <div class="wrapper">
        <div class="title">
            Diet Plan Creation
        </div>
	
		<div class="mytext"><center>Nutrition Targets</center></div>

        <form action="" method="POST">
            
		<br>Which one of the following would you like to opt.<br>
		<select name="diet" id="diet" value="Select Your Workout Plan">
			<option value="d1" >Choose from Existing Diet Plans</option>
			<option value="d2" >Create a Customized Plan</option>
		</select>

			 <div class="field1">
             <input type="submit" name="register" value="Next->">
            </div>
			
			
        </form>
     </div>   
</body>
</html>