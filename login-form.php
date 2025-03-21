<?php
include("connection.php");
$msg = '';
if(isset($_POST["submit"])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $select1 = "SELECT * FROM `register_tb` WHERE username= '$username' AND password= '$password'";
    $select_user = mysqli_query($conn, $select1);
    if(mysqli_num_rows($select_user) > 0){
        $row1 = mysqli_fetch_assoc($select_user);
        header('location:home.html');
    }
    else{
        $msg = "Incorrect username and password!";
    }
}

?>
<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login page</title>
        <link rel="stylesheet" href="style1.css">
    </head>
    <body class="form-body">
       
        <form class="login-form" action="" method="post">
            <h1>Login Form</h1>
            <p class="msg"><?=$msg?></p>
            <div class="form-container">
                <label class="login-label">USERNAME </label>
                <input type="text" class="common-input" name="username" placeholder="Enter Username" name="Username" required>
                <label class="login-label">PASSWORD </label>
                <input type="password" class="common-input" name="password" placeholder="Enter Password" name="Password" required>
                <input type="checkbox" checked="checked">Remember me
                <p class="shift-login3">  Forgot password? <a href="#">click here</a></p>
                <button name="submit" type="submit" class="submit-button">Login</button>
                <p class="shift-login2">Don't have an account? <a href="registration-form.php">Register now</a></p>
              
            </div>
        </form>
    </body>
</html>