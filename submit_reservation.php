<?php
// Database connection parameters
$servername = "localhost";
$username = "root"; 
$password = "";     
$dbname = "The_Outer_Clove";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


function sanitizeData($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$phpResponse = ""; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = sanitizeData($_POST["name"]);
    $phone = sanitizeData($_POST["phone"]);
    $person = sanitizeData($_POST["person"]);
    $reservationDate = sanitizeData($_POST["reservation-date"]);
    $reservationTime = sanitizeData($_POST["reservation-time"]);
    $message = sanitizeData($_POST["message"]);


    $stmt = $conn->prepare("INSERT INTO reservations (name, phone, person, reservation_date, reservation_time, message) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $name, $phone, $person, $reservationDate, $reservationTime, $message);

    if ($stmt->execute()) {
        $phpResponse = "Reservation successfully submitted!";
    } else {

        error_log("Error: " . $stmt->error);
        $phpResponse = "An error occurred while processing your reservation. Please try again later.";
    }


    $stmt->close();


    $conn->close();
}

echo $phpResponse;
?>
