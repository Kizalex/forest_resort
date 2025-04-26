<?php
// Database connection settings
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "forest_escape";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['cust_name'];
    $address = $_POST['address'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $room_type = $_POST['room_type'];
    $payment_type = $_POST['payment_type'];

    $stmt = $conn->prepare("INSERT INTO customers (name, address, age, gender, room_type, payment_type) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssisss", $name, $address, $age, $gender, $room_type, $payment_type);

    if ($stmt->execute()) {
        echo "<h2>Profile saved successfully!</h2>";
        echo '<a href="profile.html">Back to Profile Entry</a>';
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}
$conn->close();
?> 