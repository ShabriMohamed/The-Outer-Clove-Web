<?php
$servername = "localhost";
$db_username = "root"; 
$db_password = "";     
$dbname = "The_Outer_Clove";

// Create connection
$conn = new mysqli($servername, $db_username, $db_password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//sanitize user input
function sanitizeInput($conn, $data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return mysqli_real_escape_string($conn, $data);
}

//  Registration
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["register"])) {
    $firstName = sanitizeInput($conn, $_POST["firstName"]);
    $lastName = sanitizeInput($conn, $_POST["lastName"]);
    $username = sanitizeInput($conn, $_POST["username"]);
    $email = sanitizeInput($conn, $_POST["email"]);
    $contactNo = sanitizeInput($conn, $_POST["contactNo"]);
    $password = $_POST["password"]; 

    $checkEmailQuery = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($checkEmailQuery);

    if ($result->num_rows > 0) {
        echo "Email is already registered. Please use a different email.";
    } else {
        $insertQuery = "INSERT INTO users (firstName, lastName, username, email, contactNo, password)
                        VALUES ('$firstName', '$lastName', '$username', '$email', '$contactNo', '$password')";

        if ($conn->query($insertQuery) === TRUE) {
            echo '<script>alert("Registration successful!"); window.location.href = "login-resister.html";</script>';
        } else {
            echo "Error: " . $insertQuery . "<br>" . $conn->error;
        }
    }
}

// Login
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["login"])) {
    $email = sanitizeInput($conn, $_POST["email"]);
    $enteredPassword = $_POST["password"]; 

    $getUserQuery = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($getUserQuery);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $storedPassword = $row["password"];
        if ($enteredPassword == $storedPassword) {
            // Redirect to userHome.html
            echo '<script>alert("Login successful!");</script>';
            header("Location: userHome.html");
            exit();
        } else {
            echo "Invalid password. Please try again.";
        }
    } else {
        echo "User not found. Please register.";
    }
}

// Display JavaScript alert for successful login


$conn->close();

