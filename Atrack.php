<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];

    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'conf');

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insert query
    $sql = "INSERT INTO Tracks (title, description) VALUES ('$title', '$description')";

    // Execute query and handle response
    if ($conn->query($sql) === TRUE) {
        echo "<p class='success'>Track added successfully!</p>";
    } else {
        echo "<p class='error'>Error: " . $conn->error . "</p>";
    }

    $conn->close();
}
?>
