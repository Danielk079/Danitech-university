
<?php


$host = "localhost";
$user = "root";
$password = "";
$database="danitech_db";


$conn = new mysqli($host, $user, $password, $database);

if(!$conn){
    die("Failed to connect to the database");
}

//require "db.inc.php"; // Ensure database connection

if (isset($_POST["submit"])) {
	$username = $_POST["username"];
	$email = $_POST['email'];
	$subject = $_POST['subject'];
	$message = $_POST['message'];
	$gender = $_POST[ 'gender' ];

   // $errors = array();

    // Check for empty fields
    if (empty($username) || empty($email) || empty($subject) || empty($message)|| empty($gender)) {
        array_push($errors, "All fields are required.");
    }

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        array_push($errors, "Email is not valid.");
    }

    // Validate password length (fixed: changed from 4 to 8)
   /* if (strlen($password) < 8) {
        array_push($errors, "Password must be at least 8 characters long.");
    }

    // Validate password match
    if ($password !== $confirmpass) {
        array_push($errors, "Passwords do not match.");
    }*/

    // Display errors if any exist
    /*if (count($errors) > 0) {
        foreach ($errors as $error) {
            echo "<div class='alert alert-danger'>$error</div>";
        }
    } else {*/
        // Hash the password for security
       // $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Insert user into the 'wanga' table inside the 'elias' database
        $sql = "INSERT INTO contact_tb (username, email, subject, message, gender) VALUES(?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        if ($stmt) {
            $stmt->bind_param("sssss", $username, $email, $subject, $message, $gender );
            if ($stmt->execute()) {
                echo "<div class='alert alert-success'>Message sent successful!</div>";
            } else {
                echo "<div class='alert alert-danger'>Error: " . $stmt->error . "</div>";
            }
            $stmt->close();
        } else {
            echo "<div class='alert alert-danger'>Database error.</div>";
        }
    }
?>