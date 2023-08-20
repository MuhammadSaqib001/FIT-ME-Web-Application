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
    <link rel="stylesheet" href="attendence_record.css">
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
		 <a href="daily_attendence.php"><i class="fas fa-clock"></i><span>Daily Attendence</span></a>

     </div>

     <div class="sidebar1">
	 <a href="attendence_record.php"><i class="fas fa-heart"></i><span>Attendence Record</span></a>



     </div>
     <div class="sidebar2">
         
         <a href="attendence_about.php"><i class="fas fa-info-circle"></i><span>About</span></a>
     </div>
	 
	  <a href="#" class="ptext"><i></i><span>Attendence Record</span></a>
<?php	  



echo "<br>";
			
	echo "<table style='width:1000px; margin-left:350px;margin-top:150px;border:black;border: 1px solid black;border-collapse: collapse;border-spacing: 8px;spacing:0 15px;'>";
echo "<tr>";
  echo"<b>"; echo "<td colspan='5'>";  echo"<b>"; echo "Attendence Record of "; echo $nam ;echo " ( ";echo $roll;echo " ) ";  echo"</b>"; echo "</td>";
    
     echo "</tr>"; 	

	 
	echo "<tr>";
	echo "<td>Date</td>";
	echo "<td>Attendence </td>";
	echo "<td>Details</td>";			
    echo "</tr>";
	
	$sql1 = "select * from student NATURAL JOIN attendence where user_id=" .$num;  
$query_id1= oci_parse($con, $sql1);
$r1 = oci_execute($query_id1);

while($row1 = oci_fetch_array($query_id1, OCI_BOTH+OCI_RETURN_NULLS))
{
	echo "<b>";
	if($row1['STATUS']==0)
		{
			
			echo "<tr>";
	echo "<td style='color:green'>";echo "<b>";echo $row1['ATTENDENCE_DATE'];echo "</b>";echo"</td>";
	echo "<td style='color:green'>";
	echo "<b>";echo "PRESENT";echo "</b>";
				echo "</td>";
				echo "<td style='color:green'><b>N/A</b></td>";			
				echo "</tr>";
				echo "</b>";
		}
		if($row1['STATUS']==1)
		{
			echo "<tr>";
	echo "<td style='color:red'>";echo "<b>";echo $row1['ATTENDENCE_DATE'];echo "</b>";echo"</td>";
	echo "<td style='color:red'>";
	echo "<b>";echo "LEAVE REQUESTED";echo "</b>";
				echo "</td>";
				echo "<td style='color:red'><b>N/A</b></td>";			
				echo "</tr>";
		}
		if($row1['STATUS']==2)
		{
			echo "<tr>";
			echo "<td style='color:green'>";echo "<b>";echo $row1['ATTENDENCE_DATE'];echo "</b>";echo"</td>";
			echo "<td style='color:green'>";
			echo "<b>";echo "LEAVE APPROVED";echo "</b>";
						echo "</td>";
						echo "<td style='color:green'><b>N/A</b></td>";			
						echo "</tr>";		}
	
	}
echo "</b>";
?>
</body>
</html>
