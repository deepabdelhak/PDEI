<?php
// Turn off output buffering
ob_end_clean();

// Start output buffering
ob_start();

require_once('TCPDF-main/tcpdf.php');

class MYPDF extends TCPDF {
    public function Header() {
        // Set font
        $this->SetFont('dejavusans', '', 8);
        
        // Calculate widths
        $pageWidth = $this->getPageWidth();
        $columnWidth = $pageWidth / 2;
        
        // Left column (French text)
        $this->MultiCell($columnWidth - 20, 4, "Royaume Du Maroc\nMinistère de la Santé et de la Protection Sociale\nCentre Hospitalo-Universitaire Mohammed VI-Oujda\nDivision de l'Organisation des Soins et Affaires Professionnelles\nService Qualité et Gestion des Risques", 0, 'L', 0, 1, 10, 10, true, 0, false, true, 20, 'T');
        
        // Right column (Arabic text)
        $this->SetFont('dejavusans', '', 8);
        $this->MultiCell($columnWidth - 20, 4, "المملكة المغربية\nوزارة الصحة والحماية الاجتماعية\nالمركز الاستشفائي الجامعي محمد السادس وجدة\nقسم تنظيم العلاجات والشؤون المهنية\nمصلحة الجودة وإدارة المخاطر", 0, 'R', 0, 1, $columnWidth + 10, 10, true, 0, false, true, 20, 'T');
        
        // Add the logo in the center
        $logoWidth = 30;
        $logoHeight = 20;
        $logoX = ($pageWidth - $logoWidth) / 2;
        $logoY = 10;
        $this->Image('test/CHU_logo.png', $logoX, $logoY, $logoWidth, $logoHeight, 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);
        
        // Draw a line under the header
        $this->SetDrawColor(0, 0, 0);
        $this->SetLineWidth(0.5);
        $this->Line(10, 32, $pageWidth - 10, 32);
        
        // Main title
        $this->SetFont('dejavusans', 'B', 14);
        $this->SetXY(10, 35);
        $this->Cell($pageWidth - 20, 10, 'FICHE DE DECLARATION DES EVENEMENTS INDESIRABLES', 0, 1, 'C');
    }
}

// Error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pro_usermanagent";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if event_id is provided
if (!isset($_GET['event_id'])) {
    die("No event ID provided");
}

$event_id = $_GET['event_id'];

// Create new PDF document
$pdf = new MYPDF('P', 'mm', 'A4', true, 'UTF-8', false);

// Set document properties
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Your Name');
$pdf->SetTitle('Fiche de Declaration des Evenements Indesirables');
$pdf->SetSubject('Event Declaration Form');
$pdf->SetKeywords('TCPDF, PDF, event, declaration');

// Set margins
$pdf->SetMargins(15, 45, 15);
$pdf->SetHeaderMargin(5);
$pdf->SetFooterMargin(10);

// Set auto page breaks
$pdf->SetAutoPageBreak(TRUE, 25);

// Add a page
$pdf->AddPage();

// Fetch event details
$sql = "SELECT * FROM events WHERE event_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $event_id);
$stmt->execute();
$result = $stmt->get_result();
$event = $result->fetch_assoc();

if (!$event) {
    die("Event not found");
}

// Function to add a form field
function addFormField($pdf, $label, $value, $width = 0) {
    $pdf->SetFont('dejavusans', 'B', 10);
    $pdf->Cell(60, 7, $label, 0, 0);
    $pdf->SetFont('dejavusans', '', 10);
    $pdf->Cell($width, 7, $value ?? 'N/A', 0, 1);
    $pdf->Ln(1);
}

// A/ Section
$pdf->SetFont('dejavusans', 'B', 12);
$pdf->Cell(0, 10, 'A/ Date de l\'événement :', 0, 1);
$pdf->SetFont('dejavusans', '', 10);

addFormField($pdf, 'N° Ordre Registre :', $event['event_id'] ?? 'N/A');

addFormField($pdf, 'Date de l\'événement :', $event['event_date'] ?? 'N/A');
addFormField($pdf, 'Heure de l\'événement :', $event['event_time'] ?? 'N/A');
addFormField($pdf, 'Fin de l\'événement :', $event['end_time'] ?? 'N/A');
addFormField($pdf, 'Service :', $event['staff_service'] ?? 'N/A');
addFormField($pdf, 'Déclarant :', $event['staff_name'] ?? 'N/A');


// Function to fetch and add related data
function addRelatedData($pdf, $conn, $tableName, $event_id, $title, $fieldToDisplay) {
    $sql = "SELECT $fieldToDisplay FROM $tableName WHERE event_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $event_id);
    $stmt->execute();
    $result = $stmt->get_result();

    $pdf->SetFont('dejavusans', 'B', 12);
    $pdf->Ln(5);
    $pdf->Cell(0, 10, $title, 0, 1);
    $pdf->SetFont('dejavusans', '', 10);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $pdf->MultiCell(0, 7, $row[$fieldToDisplay] ?? 'N/A', 0, 'L');
        }
    } else {
        $pdf->Cell(0, 10, 'No data available', 0, 1);
    }
}
function addRelatedDataEventDetails($pdf, $conn, $tableName, $event_id, $title, $fieldToDisplay) {
    $sql = "SELECT description FROM $tableName WHERE event_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $event_id);
    $stmt->execute();
    $result = $stmt->get_result();

    $pdf->SetFont('dejavusans', 'B', 12);
    $pdf->Ln(5);
    $pdf->Cell(0, 10, $title, 0, 1);
    $pdf->SetFont('dejavusans', '', 10);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $pdf->MultiCell(0, 7, $row[$fieldToDisplay] ?? 'N/A', 0, 'L');
        }
    } else {
        $pdf->Cell(0, 10, 'No data available', 0, 1);
    }
    $fieldToDisplay ='description';
}
// Add related data
addRelatedDataEventDetails($pdf, $conn, 'eventdetails', $event_id, 'Identification de l\'évènement indésirable', 'description');

addRelatedData($pdf, $conn, 'eventcauses', $event_id, ' Causes de l\'événement', 'cause_description');
addRelatedData($pdf, $conn, 'eventconsequences', $event_id, 'D/ Conséquences de l\'événement', 'consequence_description');

// Clear any output buffers
ob_end_clean();

// Close and output PDF document
$pdf->Output('Event_Declaration_' . $event_id . '.pdf', 'I');

$conn->close();
?>