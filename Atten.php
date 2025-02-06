<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $participant_id = $_POST['participant_id'];
    $session_id = $_POST['session_id'];
    $time = $_POST['time'];

    // Connect to the database
    $conn = new mysqli('localhost', 'root', '', 'conf');

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insert query
    $sql = "INSERT INTO Attendance (participant_id, session_id, time)
            VALUES ('$participant_id', '$session_id', '$time')";

    // Execute query and handle response
    if ($conn->query($sql) === TRUE) {
        echo "<p class='success'>Attendance added successfully!</p>";
    } else {
        echo "<p class='error'>Error: " . $conn->error . "</p>";
    }

    $conn->close();
}
?>
