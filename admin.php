<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "conference_db";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch registration data
$registrations = $conn->query("SELECT * FROM registrations");
if (!$registrations) {
    die("Error fetching registrations: " . $conn->error);
}

// Fetch session data
$sessions = $conn->query("SELECT * FROM sessions");
if (!$sessions) {
    die("Error fetching sessions: " . $conn->error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Conference Management</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/admin.css">
    <script src="../js/admin.js" defer></script>
</head>
<body>
    <nav class="navbar">
        <div class="logo">Conference Management 2024</div>
        <div class="nav-links">
            <a href="../index.html">Home</a>
            <a href="schedule.php">Schedule</a>
            <a href="register.php">Register</a>
            <a href="dashboard.php">Dashboard</a>
            <a href="admin.php">Admin</a>
            <a href="#contact">Contact</a>
        </div>
    </nav>

    <div class="admin-container">
        <div class="admin-header">
            <h1>Admin Dashboard</h1>
            <button onclick="exportData()" class="edit-btn">Export Data</button>
        </div>

        <div class="stats-grid">
            <div class="stat-card">
                <h3>Total Registrations</h3>
                <div class="value"><?php echo $registrations->num_rows; ?></div>
            </div>
            <div class="stat-card">
                <h3>Available Seats</h3>
                <div class="value">152</div>
            </div>
            <div class="stat-card">
                <h3>Total Sessions</h3>
                <div class="value"><?php echo $sessions->num_rows; ?></div>
            </div>
            <div class="stat-card">
                <h3>Active Users</h3>
                <div class="value">156</div>
            </div>
        </div>

        <section class="registrations">
            <h2>Recent Registrations</h2>
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Track</th>
                        <th>Registration Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="registrationsList">
                    <?php while ($row = $registrations->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo htmlspecialchars($row['firstName'] . ' ' . $row['lastName']); ?></td>
                            <td><?php echo htmlspecialchars($row['email']); ?></td>
                            <td><?php echo htmlspecialchars($row['tracks']); ?></td>
                            <td><?php echo htmlspecialchars($row['created_at']); ?></td>
                            <td class="action-buttons">
                                <button class="edit-btn">Edit</button>
                                <button class="delete-btn">Delete</button>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </section>

        <section class="sessions">
            <h2>Session Management</h2>
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>Session</th>
                        <th>Speaker</th>
                        <th>Capacity</th>
                        <th>Registered</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="sessionsList">
                    <?php while ($row = $sessions->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['title']); ?></td>
                            <td><?php echo htmlspecialchars($row['speaker']); ?></td>
                            <td><?php echo htmlspecialchars($row['capacity']); ?></td>
                            <td><?php echo htmlspecialchars($row['registered']); ?></td>
                            <td class="action-buttons">
                                <button class="edit-btn">Edit</button>
                                <button class="delete-btn">Delete</button>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </section>
    </div>

    <footer>
        <p>&copy; 2024 International Research Conference. All rights reserved.</p>
        <p>Contact: +94472243550</p>
    </footer>
</body>
</html>
<?php
$conn->close();
?>
