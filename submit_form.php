<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pro_usermanagent";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$event_date = $_POST['event_date'];
$event_time = $_POST['event_time'];
$service = $_POST['service'];
$declarant_name = $_POST['declarant_name'];
$declarant_function = $_POST['declarant_function'];
$usager = $_POST['usager'];
$usager_ip = $_POST['usager_ip'];
$sex = $_POST['sexe'];
$usager_service = $_POST['usager_service'];
$event_types = isset($_POST['event_types']) ? $_POST['event_types'] : [];
$other_event = $_POST['other_event'];
$event_description = $_POST['event_description'];

// Insert into Events table
$sql = "INSERT INTO Events (description, other_details)
VALUES ('$event_description', '$other_event')";
if ($conn->query($sql) === TRUE) {
    $event_id = $conn->insert_id;
    foreach ($event_types as $event_type) {
        // Insert into EventDetails table
        $sql = "INSERT INTO EventDetails (event_id, subcategory_id, description)
        VALUES ($event_id, (SELECT subcategory_id FROM Subcategories WHERE subcategory_name = '$event_type'), '$event_description')";
        $conn->query($sql);
    }
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
