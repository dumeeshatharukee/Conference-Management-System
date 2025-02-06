<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $track_id = $_POST['track_id'];
    $title = $_POST['title'];
    $speaker = $_POST['speaker'];
    $time = $_POST['time'];
    $venue = $_POST['venue'];
    $capacity = $_POST['capacity'];
    $registered_count = $_POST['registered_count'];

    $conn = new mysqli('localhost', 'root', '', 'conf');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO Sessions (track_id, title, speaker, time, venue, capacity, registered_count)
            VALUES ('$track_id', '$title', '$speaker', '$time', '$venue', '$capacity', '$registered_count')";

    if ($conn->query($sql) === TRUE) {
        echo "<p class='success'>Session added successfully!</p>";
    } else {
        echo "<p class='error'>Error: " . $sql . "<br>" . $conn->error . "</p>";
    }

    $conn->close();
}
?>
