<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Login Page</title>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>
		<div class="loginBox">
			<img src="download.png" class="user" height="100" width="100">
			<h2>Log In Here</h2>
			<form action="login.php" method="post">
				<p>User Name</p>
				<input type="text" name="email" placeholder="Enter User Name">
				<p>Password</p>
				<input type="Password" name="pass" placeholder=".....">
				<input type="submit" name="submit" value="Sign In">
				<a href="signup.php">Signup</a>
			</form>
		</div>
	</body>
</html>
<?php
	$con=mysqli_connect("localhost","root","","airline");
	//mysql_select_db("Practice")
	//if (isset($_POST['email']))

	if(isset($_POST['submit']))
	{
		$email = $_POST['email'];
		$pass = $_POST['pass'];

		$sql="SELECT * FROM customer WHERE User_Name='".$email."' AND Pswd='".$pass."'";
    	$query=mysqli_query($con,$sql);  
    	$numrows=mysqli_num_rows($query);  
    	if($numrows!=0)  
    	{  
    		while($row=mysqli_fetch_assoc($query))  
    		{  
    			$dbename=$row['User_Name'];  
    			$dbpassword=$row['Pswd'];  
    		}  
  
    		if($email == $dbename && $pass == $dbpassword)  
    		{  
    			session_start();  
    			$_SESSION['sess_user']=$email;  
     
    			/* Redirect browser */  
    			header("Location: page1.php");  
    		}  
    	} 
    	else 
    	{  
    		echo "Invalid username or password!";  
    	}  
  }
//<!https://www.youtube.com/watch?v=ylFLVBbB9AM>
?>
