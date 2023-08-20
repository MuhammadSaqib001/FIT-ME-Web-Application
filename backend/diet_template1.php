
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
  
			if(isset($_POST['diet']))
			{
				$myfile = fopen("test1", "r") or die("Unable to open file!");
				$x=fgets($myfile);		
				fclose($myfile); 
			 
				$num = (int)$x;
			}	
?>
<html> 
 <head>
    <title>FITME HomePage</title>
    <link rel="stylesheet" href="workout.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
  </head>



     <div class="dashboard">
		<div>
         <a href="#" class="ptext"><i></i><span>Templatized Diet Plan # 1</span></a>
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
    <td>3000</td>
  
  </tr>
   <tr style="text-align:center;">
<td style="color:blue;"><b>Complexity Level</td>
   <td>Medium</td>
  
  </tr>
  <tr style="text-align:center;">
<td style="color:blue;"><b>Duration</b></td>
  <td>3 months</td>
  
  </tr>
  
  </tr>
</table>

<table style="width:800px;height:400px; align:left;margin-left:420px;margin-top:-156px;border:black;border: 1px solid black;border-collapse: collapse;border-spacing: 0px;spacing:0 5px;">
  
  <tr style="text-align:center;">
    <td style="color:blue;"><b>Day_of_Week</b></td>
        <td style="color:blue;"><b>Food Intake</b></td>
    <td style="color:blue;"><b>Time of the Meal</b></td>
    <td style="color:blue;"><b>Calories Gained</b></td>
	
	</tr>
	
  <tr style="text-align:center;">
    <td style="color:blue;"><b>Monday</b></td>
        <td>Cucumber Detox Drink<br>1 Cup Lentils<br>100 Gram Paneer<br>1 cup Sabzi</td>
    <td>Breakfast<br>Snack<br>Lunch<br>Dinner<br></td>
    <td>3200</td>

  </tr>
   <tr style="text-align:center;">
    <td style="color:blue;"><b>Tuesday</b></td>
        <td>Mix Fruit Salad<br>ButterMilk<br>Methi Rice<br>1 Chapati</td>
    <td>Breakfast<br>Snack<br>Lunch<br>Dinner<br></td>
    <td>3312</td>

  </tr>
   <tr style="text-align:center;">
    <td style="color:blue;"><b>Wednesday</b></td>
        <td>Low Fat OatMeal<br>1 Paratha<br>Chopped Fruits</td>
    <td>Breakfast<br>Snack<br>Dinner<br></td>
    <td>3189</td>

  </tr>
   <tr style="text-align:center;">
    <td style="color:blue;"><b>Thrusday</b></td>
        <td>100g Paneer<br>1 Cup Lentils<br>Sugar Less Coffee<br>1 cup Palak</td>
    <td>Breakfast<br>Snack<br>Lunch<br>Dinner<br></td>
    <td>3090</td>
  </tr>

    <tr style="text-align:center;">
    <td style="color:blue;"><b>Friday</b></td>
        <td>Yogurt Smoothie<br>Hlaf Cup Curd<br>Methi Rice<br>1 Chapati</td>
    <td>Breakfast<br>Snack<br>Lunch<br>Dinner<br></td>
    <td>3203</td>
  
  </tr>

  <tr style="text-align:center;">
    <td style="color:blue;"><b>Saturday</b></td>
        <td>MultiGrain Toast<br>1 Cup Lentils<br>Methi Rice<br>1 cup Sabzi</td>
    <td>Breakfast<br>Snack<br>Lunch<br>Dinner<br></td>
    <td>3230</td>
	</tr>
  <tr style="text-align:center;">
    <td style="color:blue;"><b>Sunday</b></td>
        <td>1 Cup Sambhar<br>100 Gram Paneer<br>1 cup green lentils</td>
    <td>Breakfast<br>Lunch<br>Dinner<br></td>
    <td>3200</td>

  </tr>
</table>

<br><br><br><br>
<form method="POST">
<div class="right_area">
             <input type="submit" id="diet" name="diet" value="Add as Diet Plan" class="logout_btn">
         </div>
</form>	
		<div class="right_area">
             <a href="diet_template2.php" class="logout_btn1">Save to DataBase</a>
         </div>
 </body>
 </html>
