<?php   
session_start();  
if(!isset($_SESSION["sess_user"])){  
    header("location:userlogin.php");  
} else {  
?>  
<!doctype html>  

<html>  
<head>  
<title>Welcome</title>  
<style>   
        body{  
   background-image: url("hello.jpg");      
       margin-top: 100px;  
    margin-bottom: 100px;  
    margin-right: 150px;  
    margin-left: 80px;  
    background-size: 100%;
    background-attachment: fixed; 
    color: #261A15;
    font-family: 'Yantramanav', sans-serif;;  
    font-size: 100%;  
      
        }  
         h1 {  
    color: rgb(44,62,80);  
    font-family: verdana;  
    font-size: 100%;  
}  
         h2 {  
    color: rgb(1,50,67);  
    font-family: verdana;  
    font-size: 100%;  
}
         a {
    color: rgb(102, 51, 153);
}
fieldset {
  background-color: black;
  color: white;
  opacity: 0.7;
}
</style>  
<link rel="stylesheet" type="text/css" href="page.css">
</head>  
<body>  
 <center><h1><u> AIRLINE RESERVATION SYSTEM </u></h1></center>
    <br><p> Thank you.. Successfully Logged In..</p> 
	
      
<h2>Welcome, <?php echo $_SESSION["sess_user"]; ?></h2><br>
<div class="right"> 
</div><br><br>
<div class="right"><button class="button">
	<a href="logout1.php"  style="color:black">Logout</a></button>
</div><br>

<div class="right"><button class="button">
	<a href="view1.php"  style="color:black">View Bookings</a></button>
</div><br>

<form method="POST" action="" >  	
	<legend>  
    <fieldset>
	<center>
	<br><br><br>
<b> Depart On: </b>
    <input type="date" name="depdate" value="Today"/><br><br>
<b> From: </b><input type="text" name="from1"> &nbsp; &nbsp; &nbsp; &nbsp; <b> To: </b><input type="text" name="to1"><br> 
<br> 
<br><br><input type="submit" value="Proceed" name="proceed" /> 
</center>
<p align="right"> Page 1 </p>
<?php   

if(isset($_POST["proceed"])){
if(!empty($_POST['from1']) && !empty($_POST['to1']) && !empty($_POST['depdate'])) {  
    $from=$_POST['from1'];  
    $to=$_POST['to1'];  
    $depdate=$_POST['depdate'];

	//$var = '20/04/2012';
	$date = str_replace('/', '-', $depdate);
	$depdate= date('Y-m-d', strtotime($date));

  $con=@mysqli_connect('localhost','root','','airline') or die(mysql_error());  
	$user=$_SESSION["sess_user"];
	$today = strtotime('today');
$date_timestamp = strtotime($depdate);

if ($date_timestamp < $today) {
?>
		<script>
			window.alert('Enter Valid Date!!..');
			window.history.back();
		</script>
		<?php
	} 	else{
	
	if ($from==$to){
		?>
		<script>
			window.alert('Pickup and Destination cannot be same');
			window.history.back();
		</script>
		<?php
	}
		else{
	//$sql="INSERT INTO airport(pick,dest,depdate,airportid) VALUES('$from','$to','$depdate','')";  
	
	if (mysqli_connect('localhost','root','','airline')) {
    //$last_id = mysqli_insert_id($con);
	$_SESSION['sess_depdate']=$depdate;
	$_SESSION['sess_user']=$user;  
	$_SESSION['sess_from']=$from;
	$_SESSION['sess_to']=$to;

	header("Location: page2.php");  
    
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($con);
}
mysqli_close($con);}}}
else {  
    echo "All fields are required!";  
} 
}}
?>  
</fieldset>  
</legend>
</form>
</body>  
</html>
