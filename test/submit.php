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

// Retrieve and sanitize form data
$event_date = $conn->real_escape_string($_POST['date']);
$event_time = $conn->real_escape_string($_POST['time']);
$end_time = $conn->real_escape_string($_POST['end_time']);
$professional = $conn->real_escape_string($_POST['professional']);
$order_number = $conn->real_escape_string($_POST['order_number']);
$service = $conn->real_escape_string($_POST['service']);
$formation = isset($_POST['formation']) ? implode(",", array_map([$conn, 'real_escape_string'], $_POST['formation'])) : '';
$declarant_name = $conn->real_escape_string($_POST['declarant_name']);
$declarant_function = $conn->real_escape_string($_POST['declarant_function']);
$user_name = $conn->real_escape_string($_POST['user_name'] ?? '');
$user_ip = $conn->real_escape_string($_POST['user_ip'] ?? '');
$user_gender = $conn->real_escape_string($_POST['user_gender'] ?? '');
$user_service = $conn->real_escape_string($_POST['user_service'] ?? '');
$staff_name = $conn->real_escape_string($_POST['staff_name'] ?? '');
$staff_service = $conn->real_escape_string($_POST['staff_service'] ?? '');
$staff_function = $conn->real_escape_string($_POST['staff_function'] ?? '');
$other_signalements = $conn->real_escape_string($_POST['other_signalements'] ?? '');
$event_description = $conn->real_escape_string($_POST['event_description'] ?? '');


// Get the current user's session ID
session_start();
$user_id = session_id();

// Insert into Events table
$sql = "INSERT INTO events (event_date, event_time, end_time, professional, order_number, formation, service, declarant_name, declarant_function, user_name, user_ip, user_gender, user_service, staff_name, staff_service, staff_function, description, other_details)
VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssssssssssssssss", $event_date, $event_time, $end_time, $professional, $order_number, $formation, $service, $declarant_name, $declarant_function, $user_name, $user_ip, $user_gender, $user_service, $staff_name, $staff_service, $staff_function, $event_description, $other_signalements);

if ($stmt->execute()) {
    $event_id = $conn->insert_id; // Get the last inserted ID
    echo "New record created successfully. Event ID: $event_id<br>";

    // Insert event types into EventDetails table
    if (isset($_POST['event_types']) && is_array($_POST['event_types'])) {
        $stmtDetails = $conn->prepare("INSERT INTO EventDetails (event_id, subcategory_id, description) VALUES (?, (SELECT id FROM Subcategories WHERE name = ?), ?)");

        foreach ($_POST['event_types'] as $event_type) {
            $event_type = $conn->real_escape_string($event_type);
            $stmtDetails->bind_param("iss", $event_id, $event_type, $event_type);

            if (!$stmtDetails->execute()) {
                echo "Error inserting event type: " . $stmtDetails->error . "<br>";
            }
        }
        $stmtDetails->close();
    }

    // Insert causes
    if (isset($_POST['cause']) && is_array($_POST['cause'])) {
        $stmtCause = $conn->prepare("INSERT INTO EventCauses (event_id, cause_id ,cause_description) VALUES (?, (SELECT id FROM incident_causes WHERE description = ?), ?)");

        foreach ($_POST['cause'] as $cause) {
            $cause = $conn->real_escape_string($cause);
            $stmtCause->bind_param("iss", $event_id, $cause, $cause);

            if (!$stmtCause->execute()) {
                echo "Error inserting cause: " . $stmtCause->error . "<br>";
            }
        }
        $stmtCause->close();
    }

    // Insert consequences
    if (isset($_POST['consequence']) && is_array($_POST['consequence'])) {
        $stmtConsequence = $conn->prepare("INSERT INTO EventConsequences (event_id, consequence_id,consequence_description) VALUES (?, (SELECT id FROM incident_consequences WHERE description = ?), ?)");

        foreach ($_POST['consequence'] as $consequence) {
            $consequence = $conn->real_escape_string($consequence);
            $stmtConsequence->bind_param("iss", $event_id, $consequence, $consequence);

            if (!$stmtConsequence->execute()) {
                echo "Error inserting consequence: " . $stmtConsequence->error . "<br>";
            }
        }
        $stmtConsequence->close();
    }

    // Check if 'other_cause' is an array and convert it to a string
    $other_cause = is_array($_POST['other_cause']) ? implode(', ', $_POST['other_cause']) : $_POST['other_cause'];
    $other_cause = $conn->real_escape_string($other_cause ?? '');

    // Same for 'other_consequence'
    $other_consequence = is_array($_POST['other_consequence']) ? implode(', ', $_POST['other_consequence']) : $_POST['other_consequence'];
    $other_consequence = $conn->real_escape_string($other_consequence ?? '');

    // For 'declaration_accident' and 'depot_plainte', they are likely strings
    $declaration_accident = $conn->real_escape_string($_POST['declaration_accident'] ?? '');
    $depot_plainte = $conn->real_escape_string($_POST['depot_plainte'] ?? '');

    // Prepare the statement and bind the parameters
    $stmtOther = $conn->prepare("INSERT INTO EventOtherDetails (event_id, other_cause, other_consequence, declaration_accident, depot_plainte) VALUES (?, ?, ?, ?, ?)");
    $stmtOther->bind_param("issss", $event_id, $other_cause, $other_consequence, $declaration_accident, $depot_plainte);

    if (!$stmtOther->execute()) {
        echo "Error inserting other details: " . $stmtOther->error . "<br>";
    }


    $stmtOther->close();

} else {
    echo "Error: " . $stmt->error;
}

$stmt->close(); // Close the Events statement
$conn->close(); // Close the connection
?>