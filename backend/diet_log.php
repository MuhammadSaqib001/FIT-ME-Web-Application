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
				//echo $userr;
				
				  			
				$q1 = "select * from diet_plan where user_id = ".$userr. " and status='A'" ;
		 $d="'" .date("Y-m-d"). "'";
				$query_id1 = oci_parse($con, $q1);
				$r1 = oci_execute($query_id1);
				$row1 = oci_fetch_array($query_id1, OCI_BOTH+OCI_RETURN_NULLS);
				$id= (int)$row1[0];
				
				$l="'" .date("l"). "'";
				
			
				//if($t_id>0)header ("Location: target.php");
				$q4 = "select foodtrack_id from food_track where dietplan_id=" .$id. " and day=" .$l;
				//$q4 = "select foodtrack_id from food_track where dietplan_id=" .$id. " and day='Sunday'";

				$query_id4 = oci_parse($con, $q4);
				$r4 = oci_execute($query_id4);
				$row4 = oci_fetch_array($query_id4, OCI_BOTH+OCI_RETURN_NULLS);
				$s_id= (int)$row4[0];
				
				if($s_id==0)
				{
					$q2 = "select max(foodtrack_id) from food_track" ;
		 
					$query_id2 = oci_parse($con, $q2);
					$r2 = oci_execute($query_id2);
					$row2 = oci_fetch_array($query_id2, OCI_BOTH+OCI_RETURN_NULLS);
					$f_id= (int)$row2[0];
					$f_id++;
					$l="'" .date("l"). "'";
					$d="'" .date("Y-m-d"). "'";
				
									
					$comp=(int)$_POST['comp'];
					$q3 = "insert into food_track(foodtrack_id,dietplan_id,day,following_rate,day_of) values(" .$f_id. "," .$id.  "," .$l. "," .$comp. "," .$d. ")"  ;
					$query_id3 = oci_parse($con, $q3);
					$r3 = oci_execute($query_id3);
				
				
					if($r3) header ("Location: target.php");
				}
				else
				{
					header ("Location: target.php");
				}
			}
?>

<html lang="en" dir="ltr">
<head>
    <title>FitMe Registration Form</title>
    <link rel="stylesheet" href="register.css">
</head>
<body>
    <div class="wrapper">
        <div class="title">
           Diet_Plan Tracking
        </div>
	
        <form  method="POST">
			<div class="mytext">Fill the form based on the precentage you were able to follow Diet Targets</div>
            <div class="field">
               Completion Rate *<input type="number" name="comp" required>

            </div>
            <div class="field">
               Calorie inatke *<input type="text" name="weight" required>

           <div>
					
            <div class="field">
                <input type="submit" name="save" value="Save the Log">
            </div>
        </form>
        
</body>
</html>