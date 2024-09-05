<?php
	session_start();
	if(isset($_SESSION['user_login'])){
		if($_SESSION['user_login'] == '1'){
			header("location:user_home.php");
		}
	}

	if(isset($_REQUEST['signinBtn'])){
		include 'dbConnection.php';

		// Use the mysqli_real_escape_string to prevent SQL Injection
		$username = mysqli_real_escape_string($connection, $_REQUEST['username']);
		$password = mysqli_real_escape_string($connection, $_REQUEST['password']);

		// Create an SQL query
		$sql = "SELECT user_id, username, password FROM user WHERE username='$username' AND password='$password'";

		// Execute the query
		$result = mysqli_query($connection, $sql);

		// Check if the query returned any result
		if(mysqli_num_rows($result) > 0) {
			$rws = mysqli_fetch_array($result);
			$id = $rws['user_id'];
			$unm = $rws['username'];
			$pwd = $rws['password'];

			// Check if the provided username and password match the database values
			if($unm == $username && $pwd == $password){
				$_SESSION['user_login'] = 1;
				$_SESSION['user_id'] = $id;
				header('location:user_home.php'); 
			} else {
				header('location:index.php?loginerr=1');
			}
		} else {
			header('location:index.php?loginerr=1');
		}
	}
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>Sign in</title>
	<link rel="stylesheet" href="./css/userhome.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
<?php
	include "header.php";
?>

<div id="outContainer">
        <h3 class="titleBar">Sign in</h3>
	<div class="inContainer">
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <p class="titleForm"><i class="fa fa-user-circle"></i>
                Username:<input type="text" name="username" id="username" required="required" oninvalid="setCustomValidity('Please input your username!')" oninput="setCustomValidity('')"/>
            </p>
            <p class="titleForm"><i class="fa fa-key"></i>
                Password:<input type="password" name="password" id="password" required="required" oninvalid="setCustomValidity('Please input your password!')" oninput="setCustomValidity('')"/>
            </p>
            <input class="btn" type="submit" value="Sign in!" name="signinBtn"/><br><br>
        </form>
	</div>
</div>
    </body>
</html>
