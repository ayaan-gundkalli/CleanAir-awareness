<?php
$servername = "localhost";
$username = "root"; // default in XAMPP
$password = "";     // default in XAMPP
$dbname = "clean_air_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$full_name = $_POST['full_name'];
$email = $_POST['email'];
$location = $_POST['location'];
$reason = $_POST['reason'];

// Simple validation
if (!empty($full_name) && !empty($email) && !empty($reason)) {
    $sql = "INSERT INTO join_movement (full_name, email, location, reason)
            VALUES ('$full_name', '$email', '$location', '$reason')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Thanks for joining the movement!'); window.location.href='join.html';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "<script>alert('Please fill all required fields.'); window.history.back();</script>";
}

$conn->close();
?>
