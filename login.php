<?php
// Start the session
session_start();

// Database configuration and connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "conf";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle login form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if email exists and password matches
    $stmt = $conn->prepare("SELECT * FROM participants WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Verify the password
        if (password_verify($password, $user['password'])) {
            $_SESSION['user'] = $email;
            header('Location: dashboard.php'); // Redirect to dashboard
            exit();
        } else {
            echo "<script>alert('Invalid email or password.'); window.location.href = 'login.html';</script>";
        }
    } else {
        echo "<script>alert('Invalid email or password.'); window.location.href = 'login.html';</script>";
    }

    $stmt->close();
}

// Close the database connection
$conn->close();
?>
