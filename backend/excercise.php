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
				$query_id1 = oci_parse($con, $sql);
				$r1 = oci_execute($query_id1);
				$row1 = oci_fetch_array($query_id1, OCI_BOTH+OCI_RETURN_NULLS);
					
				$nam=$row1['USER_NAME'];	
				
				
				$q1 = "select * from workout_plan where user_id = ".$num. " and status='A'" ;
		 
				$query_id1 = oci_parse($con, $q1);
				$r1 = oci_execute($query_id1);
				$row1 = oci_fetch_array($query_id1, OCI_BOTH+OCI_RETURN_NULLS);
				$id= (int)$row1[0];
				
?>
<html> 
 <head>
    <title>FITME HomePage</title>
    <link rel="stylesheet" href="excercise.css">
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
         <a href="target.php"><i class="fas fa-clock"></i><span>Daily Logs</span></a>
         <a href="diet.php"><i class="fas fa-heart"></i><span>Diet Plan</span></a>
        

     </div>

     <div class="sidebar1">

         <a href="excercise.php"><i class="fas fa-table"></i><span>Workout Plan</span></a>


     </div>
     <div class="sidebar2">
         <a href="setting.php"><i class="fas fa-cogs"></i><span>Settings</span></a>
         <a href="about.php"><i class="fas fa-info-circle"></i><span>About</span></a>

     </div>
<br>
	 <a href="#" class="ptext"><i></i><span>Current Workout Plan</span></a>
<?php	 
		$q2 = "select * from muscle_group where workout_id = ".$id;
				$query_id2 = oci_parse($con, $q2);
				$r2 = oci_execute($query_id2);
				$l="'" .date("l"). "'";
				//echo $l;
	echo "<table style='width:1180px; margin-left:300px;margin-top:150px;border:black;border: 1px solid black;border-collapse: separate;border-spacing: 8px;spacing:0 15px;'>";
echo "<tr>";
  echo"<b>"; echo "<td colspan='2'>";  echo"<b>"; echo "Workout Name :- "; echo "<td colspan='4'>";echo $row1['WORKOUT_NAME']; echo"</b>"; echo "</td>";
    echo "</tr>";
	echo "<tr>";
  echo"<b>"; echo "<td colspan='2'>";  echo"<b>"; echo "Difficulty :- "; echo "<td colspan='4'>";echo $row1['DIFFICULTY']; echo"</b>"; echo "</td>";
  
     echo "</tr>";  

echo "<tr>";
  echo"<b>"; echo "<td colspan='2'>";  echo"<b>"; echo "Duration :- "; echo "<td colspan='4'>";echo $row1['DURATION'];echo " Months"; echo"</b>"; echo "</td>";
  
     echo "</tr>";   
   echo "<tr>";
   echo "<td style='color:blue;'>";echo "<b>";echo "Sr.";echo "</b>";echo "</td>"; 
     echo "<td style='color:blue;'>";echo "<b>";echo "Exercise Name";echo "</b>";echo "</td>"; 
	    echo "<td style='color:blue;'>";echo "<b>";echo "Muscle Name";echo "</b>";echo "</td>"; 

   echo "<td style='color:blue;'>";echo "<b>";echo "Equipemt";echo "</b>";echo "</td>"; 
   echo "<td style='color:blue;'>";echo "<b>";echo "Details";echo "</b>";echo "</td>"; 
   echo "<td style='color:blue;'>";echo "<b>";echo "Day";echo "</b>";echo "</td>"; 

     echo "</tr>";
   
				$loop=1;
				while($row2=oci_fetch_array($query_id2, OCI_BOTH+OCI_RETURN_NULLS))
				{
					$m_id=(int)$row2['MUSCLE_ID'];
					//echo $m_id;					
					$m_name=$row2['MUSCLE_NAME'];

					//$q3 = "select * from exercise where muscle_id = ".$m_id. " and day=" .$l;
					$q3 = "select * from exercise where muscle_id = ".$m_id;

					$query_id3 = oci_parse($con, $q3);
					$r3 = oci_execute($query_id3);
					//$row3=oci_fetch_array($query_id3, OCI_BOTH+OCI_RETURN_NULLS);
					WHILE($row3=oci_fetch_array($query_id3, OCI_BOTH+OCI_RETURN_NULLS))
					{
						echo "<tr>";
						echo "<td style='color:red;'>";echo $loop;echo"</td>";
						echo "<td>";echo $row3['EXERCISE_NAME']; echo "</td>";
						echo "<td>";echo $m_name; echo "</td>";

						echo "<td>";echo $row3['EQUIMENTS']; echo "</td>";
						echo "<td>";echo $row3['DETAILS']; echo "</td>";
						echo "<td>";echo $row3['DAY']; echo "</td>";

						echo "</tr>";
						$loop++;

					}	
				//	$loop++;
				}
					// echo "<td>";echo $wa; echo"</td>";

			  echo "</table>";
?>

</body>
</html>