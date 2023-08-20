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
				$sql = "select * from our_user NATURAL JOIN student where user_id=" .$num;  
				$query_id = oci_parse($con, $sql);
				$r = oci_execute($query_id);
				$row = oci_fetch_array($query_id, OCI_BOTH+OCI_RETURN_NULLS);
					
				$nam=$row['NAME'];	
				$roll=$row['ROLL_NO'];
				
				if(isset($_POST['done']))
				{
					if($_POST['attend']=='P')	
					{
						$status=0;
					}
					else
					{
						$status=1;
					}
					$sql = "insert into attendence values (" .$status. " ,'" .$roll. "' ,'" .date("Y-m-d"). "' )" ;
					$query_id = oci_parse($con, $sql);
					$r = oci_execute($query_id);	
				}
	
			
?>				
				

<html> 
 <head>
    <title>Daily Attendence</title>
    <link rel="stylesheet" href="daily_attendence.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
  </head>

  <header>

<div class="left_area">
	<h3><i>Attendence Profile</i></h3>
</div>



<div class="right_area">
	<a href="Attendence.php" class="logout_btn">Logout</a>
</div>

<div >
	<a href="dashboard_attendence.php" class="mytext"><?php echo $nam ?></a>
</div>


</header> 
	
 <body>
  <div class="sidebar">

         <a href="dashboard_attendence.php"><i class="fas fa-desktop"></i><span>Dashboard</span></a>
     </div>

     <div class="sidebar1">
         <a href="daily_attendence.php"><i class="fas fa-clock"></i><span>Daily Attendence</span></a>



     </div>
     <div class="sidebar2">
         
         <a href="attendence_record.php"><i class="fas fa-heart"></i><span>Attendence Record</span></a>
         <a href="attendence_about.php"><i class="fas fa-info-circle"></i><span>About</span></a>
     </div>
	 
	  <a href="#" class="ptext"><i></i><span>Today's Attendence</span></a>
<?php	  

$sql1 = "select * from student NATURAL JOIN attendence where attendence_date ='" .date("Y-m-d"). "' and user_id=" .$num;  
$query_id1= oci_parse($con, $sql1);
$r1 = oci_execute($query_id1);
$row1 = oci_fetch_array($query_id1, OCI_BOTH+OCI_RETURN_NULLS);

echo "<br>";
			
	echo "<table style='width:1000px; margin-left:350px;margin-top:150px;border:black;border: 1px solid black;border-collapse: collapse;border-spacing: 8px;spacing:0 15px;'>";
echo "<tr>";
  echo"<b>"; echo "<td colspan='5'>";  echo"<b>"; echo "Mark Attendence for "; echo date("l");echo " ";echo date("Y-m-d");  echo"</b>"; echo "</td>";
    
     echo "</tr>"; 	

	 
	 echo "<tr>";
	echo "<td>Attendence</td>";
	echo "<td>Details (if any)</td>";
	echo "<td>Action</td>";
				
	 echo "</tr>";
			
	 if(!$row1)
	 {
echo "<form action='daily_attendence.php' method='POST'>";
	echo "<tr>";

		echo"<td>";
			echo 
			"<select name='attend' id='attend' value='Select Your Workout Plan Plan'>
				<option value='P' >Present</option>
				<option value='L.R' >Request a Leave</option>
			</select>";

		echo "</td>";

		echo "<td>";
			echo "<input type='text' name='det' id='det' >";
		echo "</td>";	
		echo "<td>";
			echo "<br><br>";
	echo "	<input type='submit' name='done' id='done' class='logout_btn'  style='margin-left:-50px'>";	
	echo	"</form>";	

	echo "</td>";
	echo "</tr>";
	echo "</table>";	
}
else
{
	echo "<tr>";
	
		echo "<td colspan='3'>";
		//echo "<br>";
		if($row1['STATUS']==0)
		{
				echo "< style='color:green'>";echo "You have been marked "; echo "<b>";echo "PRESENT ";echo "</b>";echo "</p>";
		}
		if($row1['STATUS']==1)
		{
			echo "<p style='color:red'>";echo "Your request for LEAVE is being processed by ADMIN";echo "</p>";
		}
		if($row1['STATUS']==2)
		{
			echo "<p style='color:green'>";echo "Your request for LEAVE has been approved ";echo "</p>";
		}
		echo	"</td>";	

echo "</tr>";
}
?>
</body>
</html>
