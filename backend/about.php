
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
				$i=$row['USER_ID'];	
				$p=$row['PHONE'];	
				$a=$row['ADDRESS'];	
				$h=(float)$row['HEIGHT'];	
				$w=(float) $row['WEIGHT'];	
						//echo "<center style='color:black;font-size:20px;font-family:calibri;height:15px;'>" .$dis. " </center> ";
?>
<html> 
 <head>
    <title>FITME About Page</title>
    <link rel="stylesheet" href="about1.css">
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
         <a href="target.php"><i class="fas fa-clock"></i><span>Daily Log</span></a>
         <a href="diet.php"><i class="fas fa-heart"></i><span>Diet Plan</span></a>
         <a href="excercise.php"><i class="fas fa-table"></i><span>Workout Plan</span></a>
         <a href="setting.php"><i class="fas fa-cogs"></i><span>Settings</span></a>
     </div>

     <div class="sidebar1">
         <a href="about.php"><i class="fas fa-info-circle"></i><span>About</span></a>
     </div>



     <div class="slidebar2">
         <a href="#"><i class="fas fa-sliders-h"></i><span>23</span></a>

     </div>

     <img src="gym.png">


     <img class="img1" src="services.png">

     <div>
     </div>
 </body>
 </html>
 <br><br> 
