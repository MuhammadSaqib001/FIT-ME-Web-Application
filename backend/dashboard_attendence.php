
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
				$i=$row['USER_ID'];	
				$p=$row['PHONE'];	
				$a=$row['ADDRESS'];	
		
        $s=$row['ATTENDENCE_PERCENTAGE'];	
				$b=$row['ROLL_NO'];	

        $sql1 = "select * from student NATURAL JOIN attendence where user_id=" .$num;  
        $query_id = oci_parse($con, $sql1);
				$r = oci_execute($query_id);
        $absent=0;
        $present=0;
				while($row = oci_fetch_array($query_id, OCI_BOTH+OCI_RETURN_NULLS))
        {
            if($row['STATUS']==0)
            {
              $present=$present+1;
            }
            if($row['STATUS']==3)
            {
              $absent=$absent+1;
            }
        }
        $total=$absent+$present;
        $percent=$present/$total;
        $percent=$percent*100;
        
?>
<html> 
 <head>
    <title>FITME HomePage</title>
    <link rel="stylesheet" href="dashboard_attendence.css">
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

         <a href="dash_board_attendence.php"><i class="fas fa-desktop"></i><span>Dashboard</span></a>
     </div>

     <div class="sidebar1">
         <a href="daily_attendence.php"><i class="fas fa-clock"></i><span>Daily Attendence</span></a>
         <a href="attendence_record.php"><i class="fas fa-heart"></i><span>Attendence Record</span></a>
         <a href="attendence_about.php"><i class="fas fa-info-circle"></i><span>About</span></a>

     </div>


     <div class="dashboard">
		<div>
         <a href="#" class="ptext"><i></i><span>Personal Information</span></a>
		 <br><br><br> <br>
<table style="width:600px; margin-left:100px;margin-right:-50px;margin-top:-15px;border:black;border: 1px solid black;border-collapse: collapse;border-spacing: 5px;spacing:0 15px;">
  
</tr>
  <tr style="text-align:center;">
  <td style="color:blue;"><b>User ID</b></td>
    <td><?php echo $i ?> </td>
  </tr>

  <tr style="text-align:center;">
    <td style="color:blue;"><b>User Name</b></td>
    <td><?php echo $nam ?> </td>
    
  
  </tr>
  <tr style="text-align:center;">
  <td style="color:blue;"><b>Roll No </b></td>
    <td><?php echo $b ?> </td>
  </tr>

  </tr>
  <tr style="text-align:center;">
  <td style="color:blue;"><b>Attendence Percentage</b></td>
    <td><?php echo $percent ; echo "%";?> </td>
  </tr>

   
     <td colspan="2"><a href="BMI.php" target="_blank"><center>View Profile Picture</center></a></td>
 </tr>
</table>
<br><br> 

 
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
 

		</div>


 </body>
 </html>
