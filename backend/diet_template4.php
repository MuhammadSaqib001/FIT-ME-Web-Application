
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
  
			 
				$myfile = fopen("test", "r") or die("Unable to open file!");
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
         <a href="#" class="ptext"><i></i><span>Templatized Diet Plan # 4</span></a>
		 <br><br><br> <br>
<table style="width:600px; align:left;margin-left:-200px;margin-top:-80px;border:black;border: 1px solid black;border-collapse: collapse;border-spacing: 5px;spacing:0 15px;">
  
  <tr style="text-align:center;">
    <td style="color:blue;"><b>Diet Plan Name</b></td>
    <td>Body Building</td>
    
  </tr>
     <tr style="text-align:center;">
<td style="color:blue;"><b>Nutrients Included</b></td>
  <td>Carbohydrates , Fats & Proteins</td>
  
  </tr>
  
  <tr style="text-align:center;">
  <td style="color:blue;"><b>Daily Calorie Intake</b></td>
    <td>Full Body</td>
  
  </tr>
   <tr style="text-align:center;">
<td style="color:blue;"><b>Complexity Level</td>
   <td>Easy</td>
  
  </tr>
  <tr style="text-align:center;">
<td style="color:blue;"><b>Duration</b></td>
  <td>3 months</td>
  
  </tr>
  
  </tr>
</table>

<table style="width:600px; align:left;margin-left:420px;margin-top:-156px;border:black;border: 1px solid black;border-collapse: collapse;border-spacing: 5px;spacing:0 15px;">
  
   <tr style="text-align:center;">
    <td style="color:blue;"><b>Day_of_Week</b></td>
        <td style="color:blue;"><b>Food Intake</b></td>
    <td style="color:blue;"><b>Time of the Meal</b></td>
    <td style="color:blue;"><b>Calories Gained</b></td>
	
	</tr>
	
  <tr style="text-align:center;">
    <td style="color:blue;"><b>Monday</b></td>
        <td>Chest & Abs</td>
    <td> Wide grip pull-down & DeadLift</td>
    <td>Extreme level deadlifts and pull-downs</td>

  </tr>
  <tr style="text-align:center;">
  <td style="color:blue;"><b>Tuesday</b></td>
    <td>Body Packs</td>
      <td>Decline press & Incline Press</td>
    <td>1 Complete Set</td>

  </tr>
   <tr style="text-align:center;">
<td style="color:blue;"><b>Wednesday</td>
   <td>Legs & Traps</td>
      <td>High-impact treadmills</td>
    <td>1 hour 30 cycles Treadmill</td>

  </tr>
  <tr style="text-align:center;">
<td style="color:blue;"><b>Thursday</b></td>
  <td>Chest & Shoulders</td>
      <td>RESISTANCE BAND & MOBILITY SHOULDER</td>
    <td>For building the resistance & flexibility within body</td>

  </tr>
  <tr style="text-align:center;">
<td style="color:blue;"><b>Friday</b></td>
  <td>Lower Body</td>
      <td>Ellipticals & Bent-over row</td>
    <td>50 count Elliptical and 30 Bent Overs</td>

  </tr>
  
  </tr>
  <tr style="text-align:center;">
<td style="color:blue;"><b>Saturday</b></td>
  <td>Full Body</td>
      <td>Dumbbell lateral raise & Flat bench fly</td>
    <td>Strenous DUMBELL rise & 25 Bench Fly</td>

  </tr>
  </tr>
  <tr style="text-align:center;">
<td style="color:blue;"><b>Sunday</b></td>
  <td>Rest</td>
      <td>N/A</td>
    <td>Bed Rest</td>

  </tr>
</table>

<div class="right_area">
             <a class="logout_btn">Add as Diet Plan</a>
         </div>
		
		<div class="right_area">
             <a href="diet_template1.php" class="logout_btn1">Back to Start</a>
         </div>
 </body>
 </html>
 <br><br> 
