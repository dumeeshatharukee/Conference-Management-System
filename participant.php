
    <?php
    // Database connection
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

    // Fetch participant data from the database
    $sql = "SELECT * FROM participants";  // Assuming a 'participants' table
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Output data for each participant
        while ($row = $result->fetch_assoc()) {
            echo '<div class="participant-card">';
            echo '<h3>' . htmlspecialchars($row['name']) . '</h3>';
            echo '<p>' . htmlspecialchars($row['email']) . '</p>';
            echo '<button class="btn">View Details</button>';
            echo '</div>';
        }
    } else {
        echo '<p>No participants found.</p>';
    }

    $conn->close();
    ?>
</section>
