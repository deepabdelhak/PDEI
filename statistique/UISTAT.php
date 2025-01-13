<?php
// Database connection parameters
$host = 'localhost';
$user = 'root';
$password = ''; 
$database = 'pro_usermanagent';

// Create connection
$conn = new mysqli($host, $user, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get total events count
function getTotalEvents($conn) {
    $query = "SELECT COUNT(*) as total FROM events";
    $result = $conn->query($query);
    return $result->fetch_assoc()['total'];
}

// Get events count by principal title
function getEventsByPrincipalTitle($conn) {
    $query = "SELECT 
        pt.title,
        COUNT(*) as event_count
    FROM events e
    JOIN eventdetails ed ON e.event_id = ed.event_id
    JOIN subcategories s ON ed.subcategory_id = s.id
    JOIN eventcategories ec ON s.category_id = ec.id
    JOIN principal_title pt ON ec.principal_title_id = pt.id
    GROUP BY pt.title
    ORDER BY pt.title";
    
    $result = $conn->query($query);
    return $result->fetch_all(MYSQLI_ASSOC);
}

// Get unique staff services
function getStaffServices($conn) {
    $query = "SELECT DISTINCT staff_service FROM events WHERE staff_service IS NOT NULL ORDER BY staff_service";
    $result = $conn->query($query);
    return $result->fetch_all(MYSQLI_ASSOC);
}

// Get filtered events
function getFilteredEvents($conn, $month, $service) {
    $query = "SELECT 
        pt.title,
        COUNT(*) as filtered_count
    FROM events e
    JOIN eventdetails ed ON e.event_id = ed.event_id
    JOIN subcategories s ON ed.subcategory_id = s.id
    JOIN eventcategories ec ON s.category_id = ec.id
    JOIN principal_title pt ON ec.principal_title_id = pt.id
    WHERE MONTH(e.event_date) = ? AND e.staff_service = ?
    GROUP BY pt.title
    ORDER BY pt.title";
    
    $stmt = $conn->prepare($query);
    $stmt->bind_param("is", $month, $service);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_all(MYSQLI_ASSOC);
}

// Get the data
$totalEvents = getTotalEvents($conn);
$eventsByTitle = getEventsByPrincipalTitle($conn);
$staffServices = getStaffServices($conn);

// Get selected values
$selectedMonth = $_POST['month'] ?? date('n');
$selectedService = $_POST['service'] ?? '';

// Get filtered results if form is submitted
$filteredEvents = null;
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($selectedService)) {
    $filteredEvents = getFilteredEvents($conn, $selectedMonth, $selectedService);
}
?>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>      
</head>

<div class="container py-4">

    <!-- Events by Principal Title -->
    <div class="row g-4">
    <div class="col-md-6 col-lg-4">
            <div class="card h-100 border-0 shadow">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-3">
                        <div class="rounded-circle bg-primary p-3 me-3">
                            <i class="fas fa-calendar text-white"></i>
                        </div>
                        <h5 class="card-title mb-0">Total Events</h5>
                    </div>
                    <h2 class="display-4 mb-0"><?php echo $totalEvents; ?></h2>
                    <p class="text-muted mb-0">Total Events</p>
                </div>  
                
            </div>
        </div>   
        <?php foreach ($eventsByTitle as $title): ?>
        <div class="col-md-6 col-lg-4">
            <div class="card h-100 border-0 shadow">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-3">
                        <div class="rounded-circle bg-success p-3 me-3">
                            <i class="fas fa-building text-white"></i>
                        </div>
                        <h5 class="card-title mb-0"><?php echo htmlspecialchars($title['title']); ?></h5>
                    </div>
                    <h2 class="display-4 mb-0"><?php echo $title['event_count']; ?></h2>
                    <p class="text-muted mb-0">Total Events</p>
                </div>
                
            </div>
        </div>
        
        <?php endforeach; ?>
    
    </div>

    <!-- Filter Section -->
    <div class="card mt-4 shadow">
        <div class="card-body">
            <h5 class="card-title mb-3">
                <i class="fas fa-filter me-2"></i>
                Filter Events
            </h5>
            <form method="POST" class="row g-3">
                <!-- Month Dropdown -->
                <div class="col-md-6">
                    <label for="month" class="form-label">Month</label>
                    <select name="month" id="month" class="form-select" required>
                        <?php 
                        $months = [
                            1 => 'January', 2 => 'February', 3 => 'March',
                            4 => 'April', 5 => 'May', 6 => 'June',
                            7 => 'July', 8 => 'August', 9 => 'September',
                            10 => 'October', 11 => 'November', 12 => 'December'
                        ];
                        foreach ($months as $num => $name): ?>
                            <option value="<?php echo $num; ?>"
                                <?php echo (int)$selectedMonth === $num ? 'selected' : ''; ?>>
                                <?php echo $name; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <!-- Service Dropdown -->
                <div class="col-md-6">
                    <label for="service" class="form-label">Staff Service</label>
                    <select name="service" id="service" class="form-select" required>
                        <option value="">Select Service</option>
                        <?php foreach ($staffServices as $service): ?>
                            <option value="<?php echo htmlspecialchars($service['staff_service']); ?>"
                                <?php echo $selectedService === $service['staff_service'] ? 'selected' : ''; ?>>
                                <?php echo htmlspecialchars($service['staff_service']); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <!-- Submit Button -->
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-search me-2"></i>
                        Filter Results
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Filtered Results Section -->
    <?php if ($filteredEvents): ?>
    <div class="card mt-4 shadow">
        <div class="card-header bg-light">
            <h5 class="mb-0">
                Filtered Results for <?php echo $months[$selectedMonth]; ?> - 
                <?php echo htmlspecialchars($selectedService); ?>
            </h5>
        </div>
        <div class="card-body">
            <div class="row g-4">
                <?php foreach ($filteredEvents as $event): ?>
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-3">
                                <div class="rounded-circle bg-info p-3 me-3">
                                    <i class="fas fa-chart-bar text-white"></i>
                                </div>
                                <h5 class="card-title mb-0"><?php echo htmlspecialchars($event['title']); ?></h5>
                            </div>
                            <h2 class="display-4 mb-0"><?php echo $event['filtered_count']; ?></h2>
                            <p class="text-muted mb-0">Filtered Events</p>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <?php endif; ?>

    <!-- Charts Section -->
    <div class="row g-4 mt-4">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-body">
                    <h5 class="card-title">Events Distribution by Principal Title</h5>
                    <canvas id="eventDistributionChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Chart Scripts -->
    <script>
        const distributionCtx = document.getElementById('eventDistributionChart').getContext('2d');
        
        new Chart(distributionCtx, {
            type: 'bar',
            data: {
                labels: [<?php echo implode(',', array_map(function($title) {
                    return '"' . addslashes($title['title']) . '"';
                }, $eventsByTitle)); ?>],
                datasets: [{
                    label: 'Number of Events',
                    data: [<?php echo implode(',', array_map(function($title) {
                        return $title['event_count'];
                    }, $eventsByTitle)); ?>],
                    backgroundColor: 'rgba(75, 192, 192, 0.6)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: { beginAtZero: true }
                }
            }
        });
    </script>
</div>

<style>
.card {
    transition: transform 0.2s;
}
.card:hover {
    transform: translateY(-5px);
}
.rounded-circle {
    width: 48px;
    height: 48px;
    display: flex;
    align-items: center;
    justify-content: center;
}
</style>
<!-- Export PDF Button -->
<div class="card mt-4 shadow">
    <div class="card-body">
        <h5 class="card-title mb-3">
            <i class="fas fa-file-pdf me-2"></i>
            Export Options
        </h5>
        <a href="generate_pdf.php?type=all" class="btn btn-danger me-2">
            <i class="fas fa-file-pdf me-2"></i>
            Export All Events Register
        </a>
        <a href="generate_pdf.php?type=monthly&month=<?php echo date('n'); ?>&year=<?php echo date('Y'); ?>" class="btn btn-danger">
            <i class="fas fa-file-pdf me-2"></i>
            Export Monthly Events Register
        </a>
    </div>
</div>