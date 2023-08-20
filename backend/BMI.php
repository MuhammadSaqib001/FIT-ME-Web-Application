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
    <link rel="stylesheet" href="BMI.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
  </head>
 

      
 
    
	
 <body>
 
          <a href="#" class="ptext"><i></i><span>Reports of BMI Change</span></a>

 <?php				
	echo "<table style='width:1100px; margin-left:100px;margin-top:100px;border:black;border: 1px solid black;border-collapse: separate;border-spacing: 8px;spacing:0 15px;'>";


      
   echo "<tr>";
      echo "<td style='color:blue;'>";echo "<b>";echo "Sr. Number";echo "</b>";echo "</td>"; 

   echo "<td style='color:blue;'>";echo "<b>";echo "BMI Value";echo "</b>";echo "</td>"; 
     echo "<td style='color:blue;'>";echo "<b>";echo "Recorded Date";echo "</b>";echo "</td>"; 
	    echo "<td style='color:blue;'>";echo "<b>";echo "Recorded Day";echo "</b>";echo "</td>"; 

   echo "<td style='color:blue;'>";echo "<b>";echo "Workout_id";echo "</b>";echo "</td>"; 

     echo "</tr>";
   
				$loop=1;
				
				$q11 = "select * from workout_track where workout_id = ".$id ;
		 
				$query_id11 = oci_parse($con, $q11);
				$r11 = oci_execute($query_id11);
		
				while($row3=oci_fetch_array($query_id11, OCI_BOTH+OCI_RETURN_NULLS))
				{
					
						echo "<tr>";
						echo "<td style='color:red;'>";echo $loop;echo"</td>";
						echo "<td>";echo $row3['BMI']; echo "</td>";

						echo "<td>";echo $row3['DAY_OF']; echo "</td>";
						echo "<td>";echo $row3['DAY']; echo "</td>";
						echo "<td>";echo $row3['WORKOUT_ID']; echo "</td>";

						echo "</tr>";
						$loop++;

						
				//	$loop++;
				}
					// echo "<td>";echo $wa; echo"</td>";

			  echo "</table>";
?>
</body>
</html>

		