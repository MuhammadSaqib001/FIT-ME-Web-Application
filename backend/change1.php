
		
<html lang="en" dir="ltr">
<head>
    <title>Update UserName</title>
    <link rel="stylesheet" href="register.css">
</head>
<body>
    <div class="wrapper">
        <div class="title">
            Update User Name
        </div>
<form method="POST">
            <div class="field">
                User Name<input type="text" name="name" required>
                
            </div>
            

            <div class="field">
                <input type="submit" name="update" value="update">
            </div>
			
        </form>
		</div>
</body>
</html>		

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
  
				if(isset($_POST['update']))
				{
					$myfile = fopen("test1", "r") or die("Unable to open file!");
					$x=fgets($myfile);		
					fclose($myfile); 
			 
					$num = (int)$x;
					$sql = "update users set user_name='" .$_POST['name']. "' where user_id=" .$num. "";
					$query_id = oci_parse($con, $sql);
					$r = oci_execute($query_id);
					
					if($r)
					{
						
						header ("Location: home.php");
					}
				}		
						//echo "<center style='color:black;font-size:20px;font-family:calibri;height:15px;'>" .$dis. " </center> ";
?>