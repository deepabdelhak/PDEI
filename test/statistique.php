<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pro_usermanagent";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to get event counts by status


// Function to get top causes
function getTopCauses($conn, $limit = 17) {
    $sql = "SELECT cause_description, COUNT(*) as count 
            FROM eventcauses 
            GROUP BY cause_description 
            ORDER BY count DESC 
            LIMIT ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $limit);
    $stmt->execute();
    $result = $stmt->get_result();
    $causes = array();
    while ($row = $result->fetch_assoc()) {
        $causes[$row['cause_description']] = $row['count'];
    }
    return $causes;
}

// Function to get top consequences
function getTopConsequences($conn, $limit = 100) {
    $sql = "SELECT consequence_description, COUNT(*) as count 
            FROM eventconsequences 
            GROUP BY consequence_description 
            ORDER BY count DESC 
            LIMIT ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $limit);
    $stmt->execute();
    $result = $stmt->get_result();
    $consequences = array();
    while ($row = $result->fetch_assoc()) {
        $consequences[$row['consequence_description']] = $row['count'];
    }
    return $consequences;
}

// Get statistics
$topCauses = getTopCauses($conn);
$topConsequences = getTopConsequences($conn);

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Statistics</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 1200px;
            margin: auto;
            overflow: hidden;
            padding: 0 20px;
        }
        .chart-container {
            width: 100%;
            max-width: 600px;
            margin: 20px auto;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h1, h2 {
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Event Statistics</h1>

        <h2>Event Counts by Status</h2>
        <table>
            <tr>
                <th>Status</th>
                <th>Count</th>
            </tr>
            <?php foreach ($eventCounts as $status => $count): ?>
            <tr>
                <td><?php echo htmlspecialchars($status); ?></td>
                <td><?php echo $count; ?></td>
            </tr>
            <?php endforeach; ?>
        </table>

        <div class="chart-container">
            <canvas id="eventStatusChart"></canvas>
        </div>

        <h2>Top 5 Causes</h2>
        <table>
            <tr>
                <th>Cause</th>
                <th>Count</th>
            </tr>
            <?php foreach ($topCauses as $cause => $count): ?>
            <tr>
                <td><?php echo htmlspecialchars($cause); ?></td>
                <td><?php echo $count; ?></td>
            </tr>
            <?php endforeach; ?>
        </table>

        <div class="chart-container">
            <canvas id="topCausesChart"></canvas>
        </div>

        <h2>Top 5 Consequences</h2>
        <table>
            <tr>
                <th>Consequence</th>
                <th>Count</th>
            </tr>
            <?php foreach ($topConsequences as $consequence => $count): ?>
            <tr>
                <td><?php echo htmlspecialchars($consequence); ?></td>
                <td><?php echo $count; ?></td>
            </tr>
            <?php endforeach; ?>
        </table>

        <div class="chart-container">
            <canvas id="topConsequencesChart"></canvas>
        </div>
    </div>

    <script>
    // Event Status Chart
    new Chart(document.getElementById('eventStatusChart'), {
        type: 'pie',
        data: {
            labels: <?php echo json_encode(array_keys($eventCounts)); ?>,
            datasets: [{
                data: <?php echo json_encode(array_values($eventCounts)); ?>,
                backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', '#9966FF']
            }]
        },
        options: {
            responsive: true,
            title: {
                display: true,
                text: 'Event Counts by Status'
            }
        }
    });

    // Top Causes Chart
    new Chart(document.getElementById('topCausesChart'), {
        type: 'bar',
        data: {
            labels: <?php echo json_encode(array_keys($topCauses)); ?>,
            datasets: [{
                label: 'Number of Events',
                data: <?php echo json_encode(array_values($topCauses)); ?>,
                backgroundColor: '#36A2EB'
            }]
        },
        options: {
            responsive: true,
            title: {
                display: true,
                text: 'Top 5 Causes'
            },
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    // Top Consequences Chart
    new Chart(document.getElementById('topConsequencesChart'), {
        type: 'bar',
        data: {
            labels: <?php echo json_encode(array_keys($topConsequences)); ?>,
            datasets: [{
                label: 'Number of Events',
                data: <?php echo json_encode(array_values($topConsequences)); ?>,
                backgroundColor: '#FFCE56'
            }]
        },
        options: {
            responsive: true,
            title: {
                display: true,
                text: 'Top 5 Consequences'
            },
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
    </script>
</body>
</html>