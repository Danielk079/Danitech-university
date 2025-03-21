<?php
include("connection.php");
$msg = '';

if (isset($_POST["submit"])) {
    $fullname = htmlspecialchars(trim($_POST["fullname"]));
    $username = htmlspecialchars(trim($_POST["username"]));
    $email = htmlspecialchars(trim($_POST["email"]));
    $password = $_POST["password"];
    $confirmpassword = $_POST["confirmpassword"];
    $gender = htmlspecialchars(trim($_POST["gender"]));
    
    $errors = array();

    $select1 = "SELECT * FROM `register_tb` WHERE username= '$username' AND password= '$password'";
    $select_user = mysqli_query($conn, $select1);

if(mysqli_num_rows($select_user) > 0 ){
    $msg = "User already exists!";
}

else{
    $insert1 = "INSERT INTO `register_tb`(`fullname`, `username`, `email`, `password`, `gender`) VALUES ('$fullname','$username','$email','$password','$gender')";
    mysqli_query($conn, $insert1 );
    header('location:login-form.php');
}
}
    // Check for empty fields
   /* if (empty($fullname) || empty($username) || empty($email) || empty($password) || empty($confirmpassword) || empty($gender) ) {
        array_push($errors, "All fields are required.");
    }

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        array_push($errors, "Email is not valid.");
    }

    // Validate password length (fixed: changed from 4 to 8)
    if (strlen($password) < 8) {
        array_push($errors, "Password must be at least 8 characters long.");
    }

    // Validate password match
    if ($password !== $confirmpassword) {
        array_push($errors, "Passwords do not match.");
    }

    // Display errors if any exist
    if (count($errors) > 0) {
        foreach ($errors as $error) {
            echo "<div class='alert alert-danger'>$error</div>";
        }
    } else {
        // Hash the password for security
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Insert user into the 'register_tb' table inside the 'danitech_db' database

    }*/
       
        /*
        $stmt = $conn->prepare($sql);
        if ($stmt) {
            $stmt->bind_param("sssss", $fullname, $username, $email, $hashed_password, $gender);

            if ($stmt->execute()) {
                echo "<div class='alert alert-success'>Registration successful!</div>";
            } else {
                echo "<div class='alert alert-danger'>Error: " . $stmt->error . "</div>";
            }
            $stmt->close();
        } else {
            echo "<div class='alert alert-danger'>Database error.</div>";
        }
    }
}*/
?>



<!DOCTYPE html>
<html>
    <head>
        <title>REGISTRATION FORM</title>
        <link rel="stylesheet" type="text/css" href="style1.css">
    </head>
    <body class="register-body">
        <div class="registration-form">
          <h2>REGISTRATION FORM</h2>
          <p class="msg"><?=$msg?></p>
          <form action="" method="post" class="register">
            <div class="form-container">
            <label class="label-part">FULL NAME</label>
            <input type="text" name="fullname" placeholder="Enter your full name" required>
            <label class="label-part">USER NAME</label>
            <input type="text" name="username" placeholder="Enter your user name" required>
            <label class="label-part">EMAIL</label>
            <input type="email" name="email" placeholder="Enter your email" required>
            <label class="label-part">PASSWORD</label>
            <input type="password" name="password" placeholder="Enter your password" required>
            <label class="label-part">CONFIRM PASSWORD</label>
            <input type="password" name="confirmpassword" placeholder="Confirm your password" required>
            <div class="input-radio">
            <input class=" input-radio" type="radio" name="gender" value="male">MALE
            <input  class=" input-radio"type="radio" name="gender" value="female" required>FEMALE
        </div>
            <button name="submit" type="submit" class="register-button">Register Now</button>
            <p class="shift-login">Already have an account? <a href="login-form.php">Login now</a></p>
                 </div> 
                </form>
        </div>
    </body>
</html>