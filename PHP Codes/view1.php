<?php   
session_start();  
if(!isset($_SESSION["sess_user"])){  
    header("location:member.php");  
}
?> 
<!doctype html>	
<html>  
<head>  
<title>View</title>  
<link rel="stylesheet" type="text/css" href="emp.css">
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
   color: red;}
        h3 {  
    color: rgb(44,62,80);  
    font-family: verdana;  
    font-size: 100%;  
}
		 a {
    color: rgb(102, 51, 153);
}
fieldset {
  background-color: black;
  color: white;
  opacity: 0.8;
} 
table {
    border-collapse: collapse;
    width: 80%;
	color: #00332E;
}

th, td {
    text-align: left;
    padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}
tr:nth-child(odd){background-color: #f2f2f2}

th {
    background-color: #4CAF50;
    color: white;
}
</style>

</head>  
<body>  
<center><h1><u> AIRLINE RESERVATION SYSTEM </u></h1></center>

<div class="right"><button class="button">
	<a href="logout1.php"  style="color:black">Logout</a></button>
</div><br>
<br><br><br>
<center>
<h3> Booked Details: </h3><br>
<form action="" method="POST"> 
<!--	<input type="submit" value="View Booking" name="view" /><br><br>-->
<?php
//}
//if(isset($_POST["view"])){

 $con=@mysqli_connect('localhost','root','','airline') or die(mysql_error());  
  
//$lastInsertID =  mysqli_insert_id($con);
$usrname = $_SESSION["sess_user"];
		
$sql="select * FROM records WHERE User_Name='$usrname'";
	if($result=mysqli_query($con,$sql)){
	$numrows=mysqli_num_rows($result);  
    if($numrows > 0){
echo "<table border='1'>";
		echo "<tr>";
		echo "<table border='1'>";
		echo "<tr>";
		echo "<th>Username</th>";
		echo "<th>Booking id</th>";
		echo "<th>Departure date</th>";
		echo "<th>Pyment Type</th>";
		echo "<th>Pid</th>";
		echo "<th>Pickup</th>";
		echo "<th>Destination</th>";
		//echo "<th>Email</th>";
		echo "<th>Fare</th>";
		echo "</tr>";
		while($row=mysqli_fetch_assoc($result)){ 

			$deptime = $row['Dep_Time'];    
            $flightid = $row['Flight_ID'];
            $query1="SELECT * from Aircraft where Dep_Time='$deptime' AND Flight_ID='$flightid'"; 
            $result1=mysqli_query($con,$query1);    
			$row1=mysqli_fetch_assoc($result1);
                ?>
              <?php echo "<tr>";?>
              <td><b><?php echo $row['User_Name'];?></b></td>
			  <td><?php echo $row['Book_ID'];?></td>
			  <td><b><?php echo $row['Dep_Time'];?></b></td>
			  <td><b><?php echo $row['Payment_Type'];?></b></td>			  
			  <td><?php echo $row['Flight_ID'];?></td>
			  <td><b><?php echo $row1['Src'];?></b></td>
			  <td><b><?php echo $row1['Dstn'];?></b></td>
			  <td><b><?php echo $row1['Fare'];?></b></td>
			  <?php echo "</tr>";?>
<?php			  
                }
				echo "</table>";
	}
	mysqli_free_result($result);
//}
}
 	
?>
<br><br>

<?php
//if(isset($_POST["view"])){
//$con=@mysqli_connect('localhost','root','','airline') or die(mysql_error());  
//$result=mysqli_query($con,"CALL no_of_Users") or die("Query Fail:".mysql_error());
//while($row=mysqli_fetch_array($result)){
	//echo $row[0];
//}
//}
?>
<br><br>

</form>
</center>
</body>  
</html>
