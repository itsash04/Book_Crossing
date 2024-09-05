<?php
if (isset($_POST['signupBtn'])) {
    // Include the database connection file
    include 'dbConnection.php';  // Ensure this file contains the $connection variable

    // Check if $connection is established correctly
    if (!$connection) {
        die("Database connection failed: " . mysqli_connect_error());
    }

    // Sanitize user input
    $username = mysqli_real_escape_string($connection, $_POST['username']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);
    $birthday = mysqli_real_escape_string($connection, $_POST['birthday']);
    $gender = mysqli_real_escape_string($connection, $_POST['gender']);
    $email = mysqli_real_escape_string($connection, $_POST['email']);

    // Check if username already exists
    $count = mysqli_query($connection, "SELECT * FROM user WHERE username='$username'");
    if (mysqli_num_rows($count) > 0) {
        header('location:index.php?regerr=username_taken');
        die(0);
    } else {
        // Insert new user into the database
        $sql = "INSERT INTO user (username, password, birthday, gender, email) 
                VALUES ('$username', '$password', '$birthday', '$gender', '$email')";
        if (mysqli_query($connection, $sql)) {
            header('location:index.php?regsuccess');
        } else {
            die("Error: " . mysqli_error($connection));
        }
    }
}
?>

<!DOCTYPE HTML>
<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" href="./css/userhome.css">
</head>
<body>
    <?php include "header.php"; ?>

    <div id="outContainer">
        <h3 class="titleBar">Sign Up</h3>
        <form method="POST" onsubmit="return checkForm()" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="inContainer" style="width:40%;">
                <p class="titleForm">
                    <i class="fa fa-user-circle"></i> Username:
                    <input type="text" name="username" id="username" required="required" />
                    <span style="color:tomato">*</span>
                </p>
                <p class="titleForm">
                    <i class="fa fa-key"></i> Password:
                    <input type="password" name="password" id="password" required="required" />
                    <span style="color:tomato">*</span>
                </p>
                <p class="titleForm">
                    <i class="fa fa-check-circle"></i> Confirm password:
                    <input type="password" name="confirm" id="confirm" required="required" />
                    <span style="color:tomato">*</span>
                </p>
                <p class="titleForm">
                    <i class="fa fa-envelope"></i> Email:
                    <input type="email" name="email" id="email" required="required" />
                    <span style="color:tomato">*</span>
                </p>
                <p class="titleForm">
                    <i class="fa fa-calendar"></i> Birthday:
                    <input type="date" name="birthday" />
                </p>
                <p class="titleForm">
                    <i class="fa fa-transgender"></i> Gender:
                    <select name="gender">
                        <option value="-" selected>--</option>
                        <option value="m">Male</option>
                        <option value="f">Female</option>
                    </select>
                </p>
                <br />
                <input class="btn" type="submit" value="Sign up!" name="signupBtn" />
                <br /><br />
            </div>
        </form>
        <br>
        <script>
            function checkForm() {
                var password = document.getElementById("password").value;
                var confirm = document.getElementById("confirm").value;

                if (password != confirm) {
                    alert("The passwords you have entered are different!");
                    document.getElementById("password").value = "";
                    document.getElementById("confirm").value = "";
                    return false;
                }
                
                return true;
            }
        </script>
    </div>
</body>
</html>
