
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
    <title>FITME HomePage</title>
    <link rel="stylesheet" href="home.css">
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
         <a href="diet.php"><i class="fas fa-heart"></i><span>Diet Plan</span></a>
         <a href="excercise.php"><i class="fas fa-table"></i><span>Workout Plan</span></a>
         <a href="setting.php"><i class="fas fa-cogs"></i><span>Settings</span></a>
         <a href="about.php"><i class="fas fa-info-circle"></i><span>About</span></a>

     </div>


     <div class="dashboard">
		<div>
         <a href="#" class="ptext"><i></i><span>Personal Information</span></a>
		 <br><br><br> <br>
<table style="width:600px; margin-left:100px;margin-right:-50px;border:black;border: 1px solid black;border-collapse: collapse;border-spacing: 5px;spacing:0 15px;">
  
  <tr style="text-align:center;">
    <td style="color:blue;"><b>User Name</b></td>
    <td><?php echo $nam ?> </td>
    
  </tr>
  <tr style="text-align:center;">
  <td style="color:blue;"><b>User ID</b></td>
    <td><?php echo $i ?> </td>
  
  </tr>
   <tr style="text-align:center;">
<td style="color:blue;"><b>Height</td>
   <td><?php echo $h ?> </td>
  
  </tr>
  <tr style="text-align:center;">
<td style="color:blue;"><b>Weight</b></td>
  <td><?php echo $w ?> </td>
  </tr>
   <tr >
   
     <td colspan="2"><a href="BMI.php" target="_blank"><center>View BMI Change</center></a></td>
 </tr>
</table>
<br><br> 
 <div class="right_area">
             <a href="Personal.html" class="logout_btn">Change Personal Details</a>
         </div>

		</div>
         <a href="#" class="ctext"><i></i><span>Contact Information</span></a>
		 <table style="width:600px; margin-left:100px;margin-right:-50px;border:black;border: 1px solid black;border-collapse: collapse;border-spacing: 5px;spacing:0 15px;">
  <br><br><br><br><br><br><br>
  <tr style="text-align:center;">
    <td style="color:blue;"><b>Phone Number</b></td>
    <td><?php echo $p ?> </td>
    
  </tr>
  <tr style="text-align:center;">
  <td style="color:blue;"><b>Address</b></td>
    <td><?php echo $a ?> </td>
  
</table>
     <br><br>
 <div class="right_area">
             <a href="Contact.html" class="logout_btn">Change Contact Details</a>
         </div>

		</div>


 </body>
 </html>
