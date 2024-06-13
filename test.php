<?php
$fullname = $_POST['fullname'];
$email = $_POST['email'];
$number = $_POST['number'];
$username = $_POST['username'];
$password = $_POST['password'];

// Establishing a connection to the database
$conn = new mysqli('localhost', 'root', '', 'test');

// Checking the connection
if ($conn->connect_error) {
    die('Connection Failed: ' . $conn->connect_error);
} else {
    // Preparing the INSERT statement
    $stmt = $conn->prepare("INSERT INTO registration (fullname, email, number, username, password) VALUES (?, ?, ?, ?, ?)");

    // Binding parameters
    $stmt->bind_param("ssiss", $fullname, $email, $number, $username, $password);

    // Executing the statement
    $stmt->execute();

    // Providing feedback
    echo "Registration successful";

    // Closing the statement
    $stmt->close();

    // Closing the connection
    $conn->close();
}
?>
