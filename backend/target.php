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
  	
	
				$myfile = fopen("test1", "r") or die("Unable to open file!");
				$x=fgets($myfile);		
				fclose($myfile); 
			 
				$num = (int)$x;
				$sql = "select * from users where user_id=" .$num;  
				$query_id = oci_parse($con, $sql);
				$r = oci_execute($query_id);
				$row = oci_fetch_array($query_id, OCI_BOTH+OCI_RETURN_NULLS);
					
				$nam=$row['USER_NAME'];	
				
	
				$myfile = fopen("test1", "r") or die("Unable to open file!");
				$i=fgets($myfile);		
				fclose($myfile); 
				$userr = (int)$i;	
				
								  			
				$q1 = "select * from workout_plan where user_id = ".$userr. " and status='A'" ;
		 
				$query_id1 = oci_parse($con, $q1);
				$r1 = oci_execute($query_id1);
				$row1 = oci_fetch_array($query_id1, OCI_BOTH+OCI_RETURN_NULLS);
				$id= (int)$row1[0];
				
				
				$l="'" .date("l"). "'";
				$q4 = "select track_id from workout_track where workout_id=" .$id. " and day=" .$l ;
			//	$q4 = "select track_id from workout_track where workout_id=" .$id. " and day='Sunday'";
				$query_id4 = oci_parse($con, $q4);
				$r4 = oci_execute($query_id4);
				$row4 = oci_fetch_array($query_id4, OCI_BOTH+OCI_RETURN_NULLS);
				$s_id= (int)$row4[0];
				if($s_id==0){$wa="No";}
				else {$wa="Yes";}
				
				$p1 = "select * from diet_plan where user_id = ".$userr. " and status='A'" ;
		 
				$query_id11 = oci_parse($con, $p1);
				$r11 = oci_execute($query_id11);
				$row11 = oci_fetch_array($query_id11, OCI_BOTH+OCI_RETURN_NULLS);
				$d_id= (int)$row11[0];
				//echo "Lo G" .$d_id;
				
				$q5 = "select foodtrack_id from food_track where dietplan_id=" .$d_id. " and day=" .$l;
				$query_id5 = oci_parse($con, $q5);
				$r5 = oci_execute($query_id5);
				$row5 = oci_fetch_array($query_id5, OCI_BOTH+OCI_RETURN_NULLS);
				$p_id= (int)$row5[0];
				
				if($p_id==0){$fa="No";}
				else {$fa="Yes";}
?>				
				

<html> 
 <head>
    <title>FITME HomePage</title>
    <link rel="stylesheet" href="target.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
  </head>

     <header>

         <div class="left_area">
             <h3><i>FitMe</i></h3>
         </div>


         <div class="right_area">
             <a href="FIT_ME.html" class="logout_btn">Logout</a>
         </div>
		 
		 <div >
             <a href="home.php" class="mytext"><?php echo $nam ?></a>
         </div>
		

	</header> 
	
 <body>
  <div class="sidebar">

         <a href="home.php"><i class="fas fa-desktop"></i><span>Dashboard</span></a>
     </div>

     <div class="sidebar1">
         <a href="target.php"><i class="fas fa-clock"></i><span>Daily Logs</span></a>



     </div>
     <div class="sidebar2">
         
         <a href="diet.php"><i class="fas fa-heart"></i><span>Diet Plan</span></a>
         <a href="excercise.php"><i class="fas fa-table"></i><span>Workout Plan</span></a>
         <a href="setting.php"><i class="fas fa-cogs"></i><span>Settings</span></a>
         <a href="about.php"><i class="fas fa-info-circle"></i><span>About</span></a>
     </div>
	 
<form method="POST">
	  <a href="#" class="ptext"><i></i><span>Workout Today's Target</span></a>
<?php	  
				$q2 = "select muscle_id from muscle_group where workout_id = ".$id;
				$query_id2 = oci_parse($con, $q2);
				$r2 = oci_execute($query_id2);
				$l="'" .date("l"). "'";
				//echo $l;
	echo "<table style='width:1000px; margin-left:300px;margin-top:150px;border:black;border: 1px solid black;border-collapse: collapse;border-spacing: 8px;spacing:0 15px;'>";
echo "<tr>";
  echo"<b>"; echo "<td colspan='5'>";  echo"<b>"; echo "Daily Workout Targets of "; echo date("l");echo " ";echo date("Y-m-d");  echo"</b>"; echo "</td>";
    
     echo "</tr>";   
   echo "<tr>";
     echo "<td>Sr.</td>";
     echo "<td>Exercise Name</td>";
	 echo "<td>Equipment Required</td>";
	 echo "<td>Details</td>";
	 echo "<td>";echo "Completed";echo "<br>";echo "(Yes/No)"; echo"</td>";
     echo "</tr>";
   
				$loop=1;
				while($row2=oci_fetch_array($query_id2, OCI_BOTH+OCI_RETURN_NULLS))
				{
					$m_id=(int)$row2['MUSCLE_ID'];
					echo $m_id;
					//$q3 = "select * from exercise where muscle_id = ".$m_id. " and day=" .$l;
					$q3 = "select * from exercise where muscle_id = ".$m_id. " and day=" .$l;

					$query_id3 = oci_parse($con, $q3);
					$r3 = oci_execute($query_id3);
					$row3=oci_fetch_array($query_id3, OCI_BOTH+OCI_RETURN_NULLS);
					if($row3)
					{
						echo "<tr>";
						echo "<td>";echo $loop;echo"</td>";
						echo "<td>";echo $row3['EXERCISE_NAME']; echo "</td>";
						echo "<td>";echo $row3['EQUIMENTS']; echo "</td>";
						echo "<td>";echo $row3['DETAILS']; echo "</td>";
						echo "<td>";echo $wa; echo"</td>";
						echo "</tr>";
						$loop++;
					}	
					//$loop++;
				}
				//$loop++;
					// echo "<td>";echo $wa; echo"</td>";

			  echo "</table>";
				
				
?>
<br><br><br><br>

	   <div class="right_area">
<a href="work_log.php" class="logout_btn">Fill Workout Log</a>
</div>    
	  <a href="#" class="ctext"><i></i><span>Diet Today's Targets</span></a>

 <?php	  
				
				$l="'" .date("l"). "'";
				echo $l;
	echo "<table style='width:1000px; margin-left:300px;margin-top:160px;border:black;border: 1px solid black;border-collapse: collapse;border-spacing: 8px;spacing:0 15px;'>";
echo "<tr>";
  echo"<b>"; echo "<td colspan='6'>";  echo"<b>"; echo "Daily Diet Targets of "; echo date("l");echo " ";echo date("Y-m-d");  echo"</b>"; echo "</td>";
    
     echo "</tr>";   
   echo "<tr>";
     echo "<td>Sr.</td>";
     echo "<td>Food Name</td>";
	 echo "<td>Meal Time</td>";
	 echo "<td>Quantity</td>";
	 echo "<td>Calories Intake</td>";
	 echo "<td>";echo "Completed";echo "<br>";echo "(Yes/No)"; echo"</td>";
     echo "</tr>";
   
				$loop=1;
				
				//echo "Aoo G" .$d_id;
				//$p3 = "select * from food_intake where dietplan_id = " .$d_id. " and day=" .$l;
				$p3 = "select * from food_intake where dietplan_id = " .$d_id. " and day=" .$l;

					$query_id33 = oci_parse($con, $p3);
					$r33 = oci_execute($query_id33);
					//$row33=oci_fetch_array($query_id33, OCI_BOTH+OCI_RETURN_NULLS);
					$count=0;
				while($row33=oci_fetch_array($query_id33, OCI_BOTH+OCI_RETURN_NULLS))
				{
				//echo "Aoo G" .$d_id;	
					echo "<tr>";
					echo "<td>";echo $loop;echo"</td>";
					echo "<td>";echo $row33['FOOD_NAME']; echo "</td>";
					echo "<td>";echo $row33['TIMEOFMEAL']; echo "</td>";
					echo "<td>";echo $row33['QUANTITY']; echo "</td>";
					echo "<td>";echo $row33['CALORIES']; echo "</td>";
										echo "<td>";echo $fa; echo"</td>";

					echo "</tr>";
					$loop++;
					
				}

			  echo "</table>";
				echo $count;
				
?>

	   
	  <br><br><br><br>
	   <div class="right_area">
<a href="diet_log.php" class="logout_btn">Fill Diet Log</a>
</div>
		<?php	
			if(isset($_POST['work']))
			{
				header ("Location: FIT_ME.html?wrong=true");
			}
		?> 
</body>
</html>