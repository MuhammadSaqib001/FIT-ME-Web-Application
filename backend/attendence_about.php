
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
						//echo "<center style='color:black;font-size:20px;font-family:calibri;height:15px;'>" .$dis. " </center> ";
?>
<html> 
 <head>
    <title>Attendence LMS About Page</title>
    <link rel="stylesheet" href="about2.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
  </head>

     <header>

         <div class="left_area">
             <h3><i>Attendence Profile</i></h3>
         </div>


		 
         <div class="right_area">
             <a href="attendence.php" class="logout_btn">Logout</a>
         </div>
		 
		 <div >
             <a href="dashboard_attendence.php" class="mytext"><?php echo $nam ?></a>
         </div>
		

	</header> 
	
 <body>
 <div class="sidebar">

         <a href="dashboard_attendence.php"><i class="fas fa-desktop"></i><span>Dashboard</span></a>
         <a href="daily_attendence.php"><i class="fas fa-clock"></i><span>Daily Attendence</span></a>
         <a href="attendence_record.php"><i class="fas fa-heart"></i><span>Attendence Record</span></a>
        
     </div>

     <div class="sidebar1">
         <a href="attendence_about.php"><i class="fas fa-info-circle"></i><span>About</span></a>
     </div>

	 <div class="slidebar2">
         <a href="#"><i class="fas fa-sliders-h"></i><span>23</span></a>

     </div>
	 
     <img src="attend.png">


     <img class="img1" src="buzdar.png">

     <div>
     </div>
 </body>
 </html>
 <br><br> 
