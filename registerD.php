<?php
// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Database configuration
$host = "localhost";
$username = "root";
$password = "";


// Establish a database connection
$conn = new mysqli($host, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// Create database if it doesn't exist
$db_create_query = "CREATE DATABASE IF NOT EXISTS conf";
if ($conn->query($db_create_query) === TRUE) {
    echo "Database created successfully <br>";
} else {
    echo "Error creating database: " . $conn->error;
}

// Select the database
$conn->select_db("conf");

// Create the  participants table if it doesn't exist
$table_create_query = "CREATE TABLE IF NOT EXISTS participants (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    userType ENUM('participant', 'admin') NOT NULL,
    nic INT(11) NOT NULL,
    email VARCHAR(255) NOT NULL,
    mobile INT(11) NOT NULL,
    password VARCHAR(255) NOT NULL
)";

if ($conn->query($table_create_query) === TRUE) {
    echo "Table participants created successfully <br>";
} else {
    echo "Error creating table: " . $conn->error; 
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize input data
    $name = $conn->real_escape_string($_POST["name"]);
    $userType = $conn->real_escape_string($_POST["userType"]);
    $nic = $conn->real_escape_string($_POST["nic"]);
    $email = $conn->real_escape_string($_POST["email"]);
    $mobile = $conn->real_escape_string($_POST["mobile"]);
    $password = password_hash($_POST["password"], PASSWORD_BCRYPT); // Hash the password

    // Check if the email already exists
    $check_email = "SELECT id FROM participants WHERE email = ?";
    $stmt = $conn->prepare($check_email);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        echo "This email is already registered.";
        $stmt->close();
    } else {
        // Insert the new participant
        $stmt->close();
        $sql = "INSERT INTO participants (name, userType, nic, email, mobile, password) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssss", $name, $userType, $nic, $email, $mobile, $password);

        if ($stmt->execute()) {
            // Redirect to login page
            header("Location: login.html");
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    }
}

// Close the connection
$conn->close();
?>
