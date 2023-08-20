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
?>
<html>

<head>
    <title>FITME HomePage</title>
    <link rel="stylesheet" href="diet.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
</head>

<body>
    <div class="header">
        <div class="left_area">
            <h3><i>FitMe</i></h3>
        </div>
        <div class="right_area">
            <a href="home.php" class="mytext"><?php echo $nam ?></a>
			<button href="FIT_ME.html" class="logout_btn">Logout</button>
        </div>

    </div>

    <div class="sidebar">

        <a href="home.php"><i class="fas fa-desktop"></i><span>Dashboard</span></a>
        <a href="target.php"><i class="fas fa-clock"></i><span>Daily Log</span></a>
    </div>

    <div class="sidebar1">
        <a href="diet.php"><i class="fas fa-heart"></i><span>Diet Plan</span></a>
    </div>
    <div class="sidebar2">

        <a href="excercise.php"><i class="fas fa-table"></i><span>Workout Plan</span></a>
        <a href="setting.php"><i class="fas fa-cogs"></i><span>Settings</span></a>
        <a href="about.php"><i class="fas fa-info-circle"></i><span>About</span></a>

    </div>
    <br>
    <a href="#" class="ptext"><i></i><span>Current Diet Plan</span></a>


    <?php
				
				$q = "select * from diet_plan where user_id=" .$num. " and status='A'";				
				$query_id = oci_parse($con, $q);
				$r = oci_execute($query_id);
				$row= oci_fetch_array($query_id, OCI_BOTH+OCI_RETURN_NULLS);				
				$d_id=$row[0];
				echo '<div class="scrolling-box">';
echo "<table >";
echo "<tr>";
  echo"<b>"; echo "<td colspan='2'>";  echo"<b>"; echo "Diet_Plan Name :- "; echo "<td colspan='3'>";echo $row['DIET_NAME']; echo"</b>"; echo "</td>";
    echo "</tr>";
	echo "<tr>";
  echo"<b>"; echo "<td colspan='2'>";  echo"<b>"; echo "Diet Nutrients :- "; echo "<td colspan='3'>";echo $row['NUTRIENTS']; echo"</b>"; echo "</td>";
  
     echo "</tr>";  

echo "<tr>";
  echo"<b>"; echo "<td colspan='2'>";  echo"<b>"; echo "Duration :- "; echo "<td colspan='3'>";echo $row['DURATION'];echo " Months"; echo"</b>"; echo "</td>";
  
     echo "</tr>"; 
	 
   echo "<tr>";
     echo "<td style='color:blue;'>Day of Week</td>";
	      echo "<td style='color:blue;'>Time of Meal</td>";

     echo "<td style='color:blue;'>Food Name</td>";
	 	 echo "<td style='color:blue;'>Quantity</td>";
	 echo "<td style='color:blue;'>Calories</td>";
     echo "</tr>";
	 
				$q11 = "select * from food_intake where dietplan_id=" .$d_id. " and day='Monday' and timeofmeal='Breakfast'";				
				$query_id11 = oci_parse($con, $q11);
				$r11 = oci_execute($query_id11);
				$row11= oci_fetch_array($query_id11, OCI_BOTH+OCI_RETURN_NULLS);			
				$f_id=$row11[0];
echo "<tr>";
     echo "<td style='color:green;'>Monday</td>";
	      echo "<td>";echo "Breakfast"; echo "</td>";

	      echo "<td>";echo $row11['FOOD_NAME']; echo "</td>";
		  	      echo "<td>";echo $row11['QUANTITY']; echo "</td>";

		      echo "<td>";echo $row11['CALORIES']; echo "</td>";

     echo "</tr>";
	 
	 $q11 = "select * from food_intake where dietplan_id=" .$d_id. " and day='Monday' and timeofmeal='Lunch'";				
				$query_id11 = oci_parse($con, $q11);
				$r11 = oci_execute($query_id11);
				$row11= oci_fetch_array($query_id11, OCI_BOTH+OCI_RETURN_NULLS);			
				$f_id=$row11[0];
echo "<tr>";
     echo "<td style='color:green;'>Monday</td>";
	      echo "<td>";echo "Lunch"; echo "</td>";

	      echo "<td>";echo $row11['FOOD_NAME']; echo "</td>";
		  	      echo "<td>";echo $row11['QUANTITY']; echo "</td>";

		      echo "<td>";echo $row11['CALORIES']; echo "</td>";

     echo "</tr>";
	 
	 $q11 = "select * from food_intake where dietplan_id=" .$d_id. " and day='Monday' and timeofmeal='Snack Time'";				
				$query_id11 = oci_parse($con, $q11);
				$r11 = oci_execute($query_id11);
				$row11= oci_fetch_array($query_id11, OCI_BOTH+OCI_RETURN_NULLS);			
				$f_id=$row11[0];
echo "<tr>";
     echo "<td style='color:green;'>Monday</td>";
	      echo "<td>";echo "Snack Time"; echo "</td>";

	      echo "<td>";echo $row11['FOOD_NAME']; echo "</td>";
		  	      echo "<td>";echo $row11['QUANTITY']; echo "</td>";

		      echo "<td>";echo $row11['CALORIES']; echo "</td>";

     echo "</tr>";
	 
	 $q11 = "select * from food_intake where dietplan_id=" .$d_id. " and day='Monday' and timeofmeal='Dinner'";				
				$query_id11 = oci_parse($con, $q11);
				$r11 = oci_execute($query_id11);
				$row11= oci_fetch_array($query_id11, OCI_BOTH+OCI_RETURN_NULLS);			
				$f_id=$row11[0];
echo "<tr>";
     echo "<td style='color:green;'>Monday</td>";
	      echo "<td>";echo "Dinner"; echo "</td>";

	      echo "<td>";echo $row11['FOOD_NAME']; echo "</td>";
		  	      echo "<td>";echo $row11['QUANTITY']; echo "</td>";

		      echo "<td>";echo $row11['CALORIES']; echo "</td>";

     echo "</tr>";
	 
	 
	 $q11 = "select * from food_intake where dietplan_id=" .$d_id. " and day='Tuesday' and timeofmeal='Breakfast'";				
				$query_id11 = oci_parse($con, $q11);
				$r11 = oci_execute($query_id11);
				$row11= oci_fetch_array($query_id11, OCI_BOTH+OCI_RETURN_NULLS);			
				$f_id=$row11[0];
echo "<tr>";
     echo "<td style='color:red;'>Tuesday</td>";
	      echo "<td>";echo "Breakfast"; echo "</td>";

	      echo "<td>";echo $row11['FOOD_NAME']; echo "</td>";
		  	      echo "<td>";echo $row11['QUANTITY']; echo "</td>";

		      echo "<td>";echo $row11['CALORIES']; echo "</td>";

     echo "</tr>";
	 
	 $q11 = "select * from food_intake where dietplan_id=" .$d_id. " and day='Tuesday' and timeofmeal='Lunch'";				
				$query_id11 = oci_parse($con, $q11);
				$r11 = oci_execute($query_id11);
				$row11= oci_fetch_array($query_id11, OCI_BOTH+OCI_RETURN_NULLS);			
				$f_id=$row11[0];
echo "<tr>";
     echo "<td style='color:red;'>Tuesday</td>";
	      echo "<td>";echo "Lunch"; echo "</td>";

	      echo "<td>";echo $row11['FOOD_NAME']; echo "</td>";
		  	      echo "<td>";echo $row11['QUANTITY']; echo "</td>";

		      echo "<td>";echo $row11['CALORIES']; echo "</td>";

     echo "</tr>";
	 
	 $q11 = "select * from food_intake where dietplan_id=" .$d_id. " and day='Tuesday' and timeofmeal='Snack Time'";				
				$query_id11 = oci_parse($con, $q11);
				$r11 = oci_execute($query_id11);
				$row11= oci_fetch_array($query_id11, OCI_BOTH+OCI_RETURN_NULLS);			
				$f_id=$row11[0];
echo "<tr>";
     echo "<td style='color:red;'>Tuesday</td>";
	      echo "<td>";echo "Snack Time"; echo "</td>";

	      echo "<td>";echo $row11['FOOD_NAME']; echo "</td>";
		  	      echo "<td>";echo $row11['QUANTITY']; echo "</td>";

		      echo "<td>";echo $row11['CALORIES']; echo "</td>";

     echo "</tr>";
	 
	 $q11 = "select * from food_intake where dietplan_id=" .$d_id. " and day='Tuesday' and timeofmeal='Dinner'";				
				$query_id11 = oci_parse($con, $q11);
				$r11 = oci_execute($query_id11);
				$row11= oci_fetch_array($query_id11, OCI_BOTH+OCI_RETURN_NULLS);			
				$f_id=$row11[0];
echo "<tr>";
     echo "<td style='color:red;'>Tuesday</td>";
	      echo "<td>";echo "Dinner"; echo "</td>";

	      echo "<td>";echo $row11['FOOD_NAME']; echo "</td>";
		  	      echo "<td>";echo $row11['QUANTITY']; echo "</td>";

		      echo "<td>";echo $row11['CALORIES']; echo "</td>";

     echo "</tr>";
	 
	 
	 	 $q11 = "select * from food_intake where dietplan_id=" .$d_id. " and day='Wednesday' and timeofmeal='Breakfast'";				
				$query_id11 = oci_parse($con, $q11);
				$r11 = oci_execute($query_id11);
				$row11= oci_fetch_array($query_id11, OCI_BOTH+OCI_RETURN_NULLS);			
				$f_id=$row11[0];
echo "<tr>";
     echo "<td style='color:purple;'>Wednesday</td>";
	      echo "<td>";echo "Breakfast"; echo "</td>";

	      echo "<td>";echo $row11['FOOD_NAME']; echo "</td>";
		  	      echo "<td>";echo $row11['QUANTITY']; echo "</td>";

		      echo "<td>";echo $row11['CALORIES']; echo "</td>";

     echo "</tr>";
	 
	 $q11 = "select * from food_intake where dietplan_id=" .$d_id. " and day='Wednesday' and timeofmeal='Lunch'";				
				$query_id11 = oci_parse($con, $q11);
				$r11 = oci_execute($query_id11);
				$row11= oci_fetch_array($query_id11, OCI_BOTH+OCI_RETURN_NULLS);			
				$f_id=$row11[0];
echo "<tr>";
     echo "<td style='color:purple;'>Wednesday</td>";
	      echo "<td>";echo "Lunch"; echo "</td>";

	      echo "<td>";echo $row11['FOOD_NAME']; echo "</td>";
		  	      echo "<td>";echo $row11['QUANTITY']; echo "</td>";

		      echo "<td>";echo $row11['CALORIES']; echo "</td>";

     echo "</tr>";
	 
	 $q11 = "select * from food_intake where dietplan_id=" .$d_id. " and day='Wednesday' and timeofmeal='Snack Time'";				
				$query_id11 = oci_parse($con, $q11);
				$r11 = oci_execute($query_id11);
				$row11= oci_fetch_array($query_id11, OCI_BOTH+OCI_RETURN_NULLS);			
				$f_id=$row11[0];
echo "<tr>";
     echo "<td style='color:purple;'>Wednesday</td>";
	      echo "<td>";echo "Snack Time"; echo "</td>";

	      echo "<td>";echo $row11['FOOD_NAME']; echo "</td>";
		  	      echo "<td>";echo $row11['QUANTITY']; echo "</td>";

		      echo "<td>";echo $row11['CALORIES']; echo "</td>";

     echo "</tr>";
	 
	 $q11 = "select * from food_intake where dietplan_id=" .$d_id. " and day='Wednesday' and timeofmeal='Dinner'";				
				$query_id11 = oci_parse($con, $q11);
				$r11 = oci_execute($query_id11);
				$row11= oci_fetch_array($query_id11, OCI_BOTH+OCI_RETURN_NULLS);			
				$f_id=$row11[0];
echo "<tr>";
     echo "<td style='color:purple;'>Wednesday</td>";
	      echo "<td>";echo "Dinner"; echo "</td>";

	      echo "<td>";echo $row11['FOOD_NAME']; echo "</td>";
		  	      echo "<td>";echo $row11['QUANTITY']; echo "</td>";

		      echo "<td>";echo $row11['CALORIES']; echo "</td>";

     echo "</tr>";
	 
	 
	 
	 	 	 $q11 = "select * from food_intake where dietplan_id=" .$d_id. " and day='Thursday' and timeofmeal='Breakfast'";				
				$query_id11 = oci_parse($con, $q11);
				$r11 = oci_execute($query_id11);
				$row11= oci_fetch_array($query_id11, OCI_BOTH+OCI_RETURN_NULLS);			
				$f_id=$row11[0];
echo "<tr>";
     echo "<td style='color:lime;'>Thursday</td>";
	      echo "<td>";echo "Breakfast"; echo "</td>";

	      echo "<td>";echo $row11['FOOD_NAME']; echo "</td>";
		  	      echo "<td>";echo $row11['QUANTITY']; echo "</td>";

		      echo "<td>";echo $row11['CALORIES']; echo "</td>";

     echo "</tr>";
	 
	 $q11 = "select * from food_intake where dietplan_id=" .$d_id. " and day='Thursday' and timeofmeal='Lunch'";				
				$query_id11 = oci_parse($con, $q11);
				$r11 = oci_execute($query_id11);
				$row11= oci_fetch_array($query_id11, OCI_BOTH+OCI_RETURN_NULLS);			
				$f_id=$row11[0];
echo "<tr>";
     echo "<td style='color:lime;'>Thursday</td>";
	      echo "<td>";echo "Lunch"; echo "</td>";

	      echo "<td>";echo $row11['FOOD_NAME']; echo "</td>";
		  	      echo "<td>";echo $row11['QUANTITY']; echo "</td>";

		      echo "<td>";echo $row11['CALORIES']; echo "</td>";

     echo "</tr>";
	 
	 $q11 = "select * from food_intake where dietplan_id=" .$d_id. " and day='Thursday' and timeofmeal='Snack Time'";				
				$query_id11 = oci_parse($con, $q11);
				$r11 = oci_execute($query_id11);
				$row11= oci_fetch_array($query_id11, OCI_BOTH+OCI_RETURN_NULLS);			
				$f_id=$row11[0];
echo "<tr>";
     echo "<td style='color:lime;'>Thursday</td>";
	      echo "<td>";echo "Snack Time"; echo "</td>";

	      echo "<td>";echo $row11['FOOD_NAME']; echo "</td>";
		  	      echo "<td>";echo $row11['QUANTITY']; echo "</td>";

		      echo "<td>";echo $row11['CALORIES']; echo "</td>";

     echo "</tr>";
	 
	 $q11 = "select * from food_intake where dietplan_id=" .$d_id. " and day='Thursday' and timeofmeal='Dinner'";				
				$query_id11 = oci_parse($con, $q11);
				$r11 = oci_execute($query_id11);
				$row11= oci_fetch_array($query_id11, OCI_BOTH+OCI_RETURN_NULLS);			
				$f_id=$row11[0];
echo "<tr>";
     echo "<td style='color:lime;'>Thursday</td>";
	      echo "<td>";echo "Dinner"; echo "</td>";

	      echo "<td>";echo $row11['FOOD_NAME']; echo "</td>";
		  	      echo "<td>";echo $row11['QUANTITY']; echo "</td>";

		      echo "<td>";echo $row11['CALORIES']; echo "</td>";

     echo "</tr>";
	 
	 
	 	 
	 
	 	 	 $q11 = "select * from food_intake where dietplan_id=" .$d_id. " and day='Friday' and timeofmeal='Breakfast'";				
				$query_id11 = oci_parse($con, $q11);
				$r11 = oci_execute($query_id11);
				$row11= oci_fetch_array($query_id11, OCI_BOTH+OCI_RETURN_NULLS);			
				$f_id=$row11[0];
echo "<tr>";
     echo "<td style='color:magenta;'>Friday</td>";
	      echo "<td>";echo "Breakfast"; echo "</td>";

	      echo "<td>";echo $row11['FOOD_NAME']; echo "</td>";
		  	      echo "<td>";echo $row11['QUANTITY']; echo "</td>";

		      echo "<td>";echo $row11['CALORIES']; echo "</td>";

     echo "</tr>";
	 
	 $q11 = "select * from food_intake where dietplan_id=" .$d_id. " and day='Friday' and timeofmeal='Lunch'";				
				$query_id11 = oci_parse($con, $q11);
				$r11 = oci_execute($query_id11);
				$row11= oci_fetch_array($query_id11, OCI_BOTH+OCI_RETURN_NULLS);			
				$f_id=$row11[0];
echo "<tr>";
     echo "<td style='color:magenta;'>Friday</td>";
	      echo "<td>";echo "Lunch"; echo "</td>";

	      echo "<td>";echo $row11['FOOD_NAME']; echo "</td>";
		  	      echo "<td>";echo $row11['QUANTITY']; echo "</td>";

		      echo "<td>";echo $row11['CALORIES']; echo "</td>";

     echo "</tr>";
	 
	 $q11 = "select * from food_intake where dietplan_id=" .$d_id. " and day='Friday' and timeofmeal='Snack Time'";				
				$query_id11 = oci_parse($con, $q11);
				$r11 = oci_execute($query_id11);
				$row11= oci_fetch_array($query_id11, OCI_BOTH+OCI_RETURN_NULLS);			
				$f_id=$row11[0];
echo "<tr>";
     echo "<td style='color:magenta;'>Friday</td>";
	      echo "<td>";echo "Snack Time"; echo "</td>";

	      echo "<td>";echo $row11['FOOD_NAME']; echo "</td>";
		  	      echo "<td>";echo $row11['QUANTITY']; echo "</td>";

		      echo "<td>";echo $row11['CALORIES']; echo "</td>";

     echo "</tr>";
	 
	 $q11 = "select * from food_intake where dietplan_id=" .$d_id. " and day='Friday' and timeofmeal='Dinner'";				
				$query_id11 = oci_parse($con, $q11);
				$r11 = oci_execute($query_id11);
				$row11= oci_fetch_array($query_id11, OCI_BOTH+OCI_RETURN_NULLS);			
				$f_id=$row11[0];
echo "<tr>";
     echo "<td style='color:magenta;'>Friday</td>";
	      echo "<td>";echo "Dinner"; echo "</td>";

	      echo "<td>";echo $row11['FOOD_NAME']; echo "</td>";
		  	      echo "<td>";echo $row11['QUANTITY']; echo "</td>";

		      echo "<td>";echo $row11['CALORIES']; echo "</td>";

     echo "</tr>";
	 
	 
	 	 	 
	 
	 	 	 $q11 = "select * from food_intake where dietplan_id=" .$d_id. " and day='Saturday' and timeofmeal='Breakfast'";				
				$query_id11 = oci_parse($con, $q11);
				$r11 = oci_execute($query_id11);
				$row11= oci_fetch_array($query_id11, OCI_BOTH+OCI_RETURN_NULLS);			
				$f_id=$row11[0];
echo "<tr>";
     echo "<td style='color:darkblue;'>Saturday</td>";
	      echo "<td>";echo "Breakfast"; echo "</td>";

	      echo "<td>";echo $row11['FOOD_NAME']; echo "</td>";
		  	      echo "<td>";echo $row11['QUANTITY']; echo "</td>";

		      echo "<td>";echo $row11['CALORIES']; echo "</td>";

     echo "</tr>";
	 
	 $q11 = "select * from food_intake where dietplan_id=" .$d_id. " and day='Saturday' and timeofmeal='Lunch'";				
				$query_id11 = oci_parse($con, $q11);
				$r11 = oci_execute($query_id11);
				$row11= oci_fetch_array($query_id11, OCI_BOTH+OCI_RETURN_NULLS);			
				$f_id=$row11[0];
echo "<tr>";
     echo "<td style='color:darkblue;'>Saturday</td>";
	      echo "<td>";echo "Lunch"; echo "</td>";

	      echo "<td>";echo $row11['FOOD_NAME']; echo "</td>";
		  	      echo "<td>";echo $row11['QUANTITY']; echo "</td>";

		      echo "<td>";echo $row11['CALORIES']; echo "</td>";

     echo "</tr>";
	 
	 $q11 = "select * from food_intake where dietplan_id=" .$d_id. " and day='Saturday' and timeofmeal='Snack Time'";				
				$query_id11 = oci_parse($con, $q11);
				$r11 = oci_execute($query_id11);
				$row11= oci_fetch_array($query_id11, OCI_BOTH+OCI_RETURN_NULLS);			
				$f_id=$row11[0];
echo "<tr>";
     echo "<td style='color:darkblue;'>Saturday</td>";
	      echo "<td>";echo "Snack Time"; echo "</td>";

	      echo "<td>";echo $row11['FOOD_NAME']; echo "</td>";
		  	      echo "<td>";echo $row11['QUANTITY']; echo "</td>";

		      echo "<td>";echo $row11['CALORIES']; echo "</td>";

     echo "</tr>";
	 
	 $q11 = "select * from food_intake where dietplan_id=" .$d_id. " and day='Saturday' and timeofmeal='Dinner'";				
				$query_id11 = oci_parse($con, $q11);
				$r11 = oci_execute($query_id11);
				$row11= oci_fetch_array($query_id11, OCI_BOTH+OCI_RETURN_NULLS);			
				$f_id=$row11[0];
echo "<tr>";
     echo "<td style='color:darkblue;'>Saturday</td>";
	      echo "<td>";echo "Dinner"; echo "</td>";

	      echo "<td>";echo $row11['FOOD_NAME']; echo "</td>";
		  	      echo "<td>";echo $row11['QUANTITY']; echo "</td>";

		      echo "<td>";echo $row11['CALORIES']; echo "</td>";

     echo "</tr>";
	 
	 
	 	 	 	 $q11 = "select * from food_intake where dietplan_id=" .$d_id. " and day='Sunday' and timeofmeal='Breakfast'";				
				$query_id11 = oci_parse($con, $q11);
				$r11 = oci_execute($query_id11);
				$row11= oci_fetch_array($query_id11, OCI_BOTH+OCI_RETURN_NULLS);			
				$f_id=$row11[0];
echo "<tr>";
     echo "<td style='color:olive;'>Sunday</td>";
	      echo "<td>";echo "Breakfast"; echo "</td>";

	      echo "<td>";echo $row11['FOOD_NAME']; echo "</td>";
		  	      echo "<td>";echo $row11['QUANTITY']; echo "</td>";

		      echo "<td>";echo $row11['CALORIES']; echo "</td>";

     echo "</tr>";
	 
	 $q11 = "select * from food_intake where dietplan_id=" .$d_id. " and day='Sunday' and timeofmeal='Lunch'";				
				$query_id11 = oci_parse($con, $q11);
				$r11 = oci_execute($query_id11);
				$row11= oci_fetch_array($query_id11, OCI_BOTH+OCI_RETURN_NULLS);			
				$f_id=$row11[0];
echo "<tr>";
     echo "<td style='color:olive;'>Sunday</td>";
	      echo "<td>";echo "Lunch"; echo "</td>";

	      echo "<td>";echo $row11['FOOD_NAME']; echo "</td>";
		  	      echo "<td>";echo $row11['QUANTITY']; echo "</td>";

		      echo "<td>";echo $row11['CALORIES']; echo "</td>";

     echo "</tr>";
	 
	 $q11 = "select * from food_intake where dietplan_id=" .$d_id. " and day='Sunday' and timeofmeal='Snack Time'";				
				$query_id11 = oci_parse($con, $q11);
				$r11 = oci_execute($query_id11);
				$row11= oci_fetch_array($query_id11, OCI_BOTH+OCI_RETURN_NULLS);			
				$f_id=$row11[0];
echo "<tr>";
     echo "<td style='color:olive;'>Sunday</td>";
	      echo "<td>";echo "Snack Time"; echo "</td>";

	      echo "<td>";echo $row11['FOOD_NAME']; echo "</td>";
		  	      echo "<td>";echo $row11['QUANTITY']; echo "</td>";

		      echo "<td>";echo $row11['CALORIES']; echo "</td>";

     echo "</tr>";
	 
	 $q12 = "select * from food_intake where dietplan_id=" .$d_id. " and day='Sunday' and timeofmeal='Dinner'";				
				$query_id12 = oci_parse($con, $q12);
				$r12 = oci_execute($query_id12);
				$row12= oci_fetch_array($query_id12, OCI_BOTH+OCI_RETURN_NULLS);			
				$f_id=$row12[0];
				
echo "<tr>";
     echo "<td style='color:olive;'>Sunday</td>";
	      echo "<td>";echo "Dinner"; echo "</td>";

	      echo "<td>";echo $row12['FOOD_NAME']; echo "</td>";
		  	      echo "<td>";echo $row12['QUANTITY']; echo "</td>";

		      echo "<td>";echo $row12['CALORIES']; echo "</td>";

     echo "</tr>";
	 
				//echo "<center style='color:black;font-size:20px;font-family:calibri;height:15px;'>" .$dis. " </center> ";
?>

</body>

</html>