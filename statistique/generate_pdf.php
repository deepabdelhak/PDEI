<?php
// generate_pdf.php
require_once('database_functions.php');
require_once('pdf_generator.php');

// Get database connection
$conn = getConnection();

// Get parameters
$reportType = $_GET['type'] ?? 'all';
$month = $_GET['month'] ?? date('n');
$year = $_GET['year'] ?? date('Y');

// Get events
if ($reportType === 'monthly') {
    $events = getMonthlyEvents($conn, $month, $year);
    $filename = "events_register_" . date('Y_m', mktime(0, 0, 0, $month, 1, $year)) . ".pdf";
} else {
    $events = getAllEvents($conn);
    $filename = "events_register_all.pdf";
}

// Generate and output PDF
$pdfContent = generateEventsRegisterPDF($events, $reportType === 'monthly');

header('Content-Type: application/pdf');
header('Content-Disposition: attachment; filename="' . $filename . '"');
header('Cache-Control: private, max-age=0, must-revalidate');
header('Pragma: public');

echo $pdfContent;
exit();