<?php 
	session_start();
	include 'dbConnection.php';
		
	//Check login of admin
	if(!isset($_SESSION['admin_login'])||$_SESSION["admin_login"]=='0') 
		header('location:admin_login.php'); 
	//Insert the ownership into the database  
	if(isset($_REQUEST['addBtn'])){
		$owner_id=mysql_real_escape_string($_REQUEST['owner_id']);
		$ISBN=mysql_real_escape_string($_REQUEST['ISBN']);
		$date =  date("Y-m-d h:i:sa");
		$sql="INSERT into ownership values('','$owner_id','','$ISBN','','$date')";
		mysql_query($sql) or die("An error occurs.");
		
		header('location:admin_home.php');
	}
?>


<?php
	$admin_id=$_SESSION['admin_id'];
	include 'dbConnection.php';
	$sql="SELECT * FROM admin WHERE admin_id='$admin_id'";
	$result=  mysql_query($sql) or die(mysql_error());
	$rws=  mysql_fetch_array($result);
	
	
	$adminname = $rws[1];
	
	$_SESSION['adminname']  = $adminname;
?>

<!DOCTYPE HTML>
<html>
<head>
<title>Home Page</title>
<link rel='stylesheet' href="./css/userhome.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<p style="color:Maroon;font-weight:bold;">
Welcome,
<?php
    echo $_SESSION["adminname"];
?>
</p>

<div id="outContainer">
	<a href="admin_home.php"><i class="fa fa-chevron-circle-left"></i>&nbsp;Back to Admin Control Panel</a><br/><br/>

	<div class="inContainer">
        <h3 class="titleBar">Add a record</h3>
    <form style="color:Maroon;font-weight:bold;">
        Owner ID:<input type="number" name="owner_id"/>
        ISBN:<input type="number" name="ISBN"/></br></br>
        <input class="btn" type="submit" value="Submit" name="addBtn"/></br></br>
    </form>
	</div>
	</div>
</body>
</html>