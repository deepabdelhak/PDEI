<?php
// Database connection
$servername = "localhost"; // Change if needed
$username = "root"; // Your database username
$password = ""; // Your database password
$dbname = "pro_usermanagent"; // Your database name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch events from the database
$sql = "SELECT * FROM events";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Events</title>
    <link rel="stylesheet" href="styles.css"> <!-- Include your CSS file -->
    <style>
        body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f9;
    margin: 0;
    padding: 20px;
}

.container {
    max-width: 800px;
    margin: auto;
    background: white;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}

.title {
    text-align: center;
    color: #333;
    margin-bottom: 20px;
}

.event-list {
    display: flex;
    flex-direction: column;
    gap: 15px;
}

.event-card {
    background-color: #eaeaea;
    padding: 15px;
    border-radius: 8px;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.2);
    transition: transform 0.2s;
}

.event-card:hover {
    transform: scale(1.02);
}

.event-title {
    margin: 0;
    font-size: 1.5em;
    color: #333;
}

.view-button {
    background-color: #007bff;
    color: white;
    border: none;
    padding: 10px 15px;
    border-radius: 5px;
    cursor: pointer;
    font-size: 1em;
    transition: background-color 0.3s;
}

.view-button:hover {
    background-color: #0056b3;
}

.details-container {
    margin-top: 20px;
    padding: 15px;
    border: 1px solid #ccc;
    border-radius: 5px;
    background-color: #f9f9f9;
}

    </style>
</head>
<body>
    <h1>Events</h1>
    <table>
        <thead>
            <tr>
                <th>Event ID</th>
                <th>Description</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['event_id']}</td>
                            <td>{$row['description']}</td>
                            <td>{$row['event_date']}</td>
                            <td><button onclick=\"showEventDetails({$row['event_id']})\">View Details</button></td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No events found</td></tr>";
            } ?>
        </tbody>
    </table>

    <div id="eventDetails" style="display:none;"></div>

    <script>
    function showEventDetails(eventId) {
        // Fetch event details using AJAX
        const xhr = new XMLHttpRequest();
        xhr.open("GET", "fetch_event_details.php?event_id=" + eventId, true);
        xhr.onload = function() {
            if (this.status === 200) {
                document.getElementById('eventDetails').innerHTML = this.responseText;
                document.getElementById('eventDetails').style.display = 'block';
            }
        };
        xhr.send();
    }
    </script>
    <script src="script.js"></script>
</body>
</html>

<?php
$conn->close();
?>
