
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
    <link rel="stylesheet" href="workout.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
  </head>



     <div class="dashboard">
		<div>
         <a href="#" class="ptext"><i></i><span>Templatized Workout Plan # 3</span></a>
		 <br><br><br> <br>
<table style="width:600px; align:left;margin-left:-200px;margin-top:-80px;border:black;border: 1px solid black;border-collapse: collapse;border-spacing: 5px;spacing:0 15px;">
  
  <tr style="text-align:center;">
    <td style="color:blue;"><b>Workout Plan Name</b></td>
    <td>Body Shapping</td>
    
  </tr>
  <tr style="text-align:center;">
  <td style="color:blue;"><b>Exercises</b></td>
    <td>Abs & Chest</td>
  
  </tr>
   <tr style="text-align:center;">
<td style="color:blue;"><b>Difficulty Level</td>
   <td>Medium</td>
  
  </tr>
  <tr style="text-align:center;">
<td style="color:blue;"><b>Duration</b></td>
  <td>4 months</td>
  
  </tr>
  <tr style="text-align:center;">
<td style="color:blue;"><b>Rest Days</b></td>
  <td>1 day</td>
  
  </tr>
</table>

<table style="width:600px; align:left;margin-left:420px;margin-top:-156px;border:black;border: 1px solid black;border-collapse: collapse;border-spacing: 5px;spacing:0 15px;">
  
  <tr style="text-align:center;">
    <td style="color:blue;"><b>Day_of_Week</b></td>
        <td style="color:blue;"><b>Exercises</b></td>
    <td style="color:blue;"><b>Equiment</b></td>
    <td style="color:blue;"><b>Details</b></td>
	
  <tr style="text-align:center;">
    <td style="color:blue;"><b>Monday</b></td>
        <td>Chest & Abs</td>
    <td>SEATED RUSSIAN TWIST WITH BALL</td>
    <td>Sets of 15 reps</td>

  </tr>
  <tr style="text-align:center;">
  <td style="color:blue;"><b>Tuesday</b></td>
    <td>Shoulders</td>
      <td>SKULL CRUSHER EZ</td>
    <td>A set of 10 to 20 reps</td>

  </tr>
   <tr style="text-align:center;">
<td style="color:blue;"><b>Wednesday</td>
   <td>Legs& Traps</td>
      <td>Medium-impact treadmills</td>
    <td>1.5 hour Treadmill</td>

  </tr>
  <tr style="text-align:center;">
<td style="color:blue;"><b>Thursday</b></td>
  <td>Tricep and Packs</td>
      <td>TRICEO PULL PUSH DOWN</td>
    <td>Repeat 20 to times</td>

  </tr>
  <tr style="text-align:center;">
<td style="color:blue;"><b>Friday</b></td>
  <td>Bicep & Back</td>
    <td>REAR DELT CABLE FLY SEATED</td>
    <td>50 set and reps REAR DELT CABLE</td>

  </tr>
  
  </tr>
  <tr style="text-align:center;">
<td style="color:blue;"><b>Saturday</b></td>
  <td>Back & Abs</td>
      <td>LYING ABS CRUNCHES</td>
    <td>50 Pushups && 10 set Crunches</td>

  </tr>
  </tr>
  <tr style="text-align:center;">
<td style="color:blue;"><b>Sunday</b></td>
  <td>Rest</td>
      <td>N/A</td>
    <td>Bed Rest</td>

  </tr>
</table>

<br><br> 
<div class="right_area">
             <a href="home.php" class="logout_btn">Add as Workout Plan</a>
         </div>
		
		<div class="right_area">
             <a href="workout_template4.php" class="logout_btn1">View Next -></a>
         </div>
 </body>
 </html>
