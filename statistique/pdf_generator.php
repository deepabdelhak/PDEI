<?php
// pdf_generator.php
require_once('../TCPDF-main/tcpdf.php');

class EventsRegisterPDF extends TCPDF {
    public function Header() {
        // Add Arabic text on right
        $this->SetFont('dejavusans', '', 8);
        $this->Cell(0, 5, 'المملكة العربية', 0, 1, 'R');
        $this->Cell(0, 5, 'وزارة الصحة / مجلة اإلجتماعية', 0, 1, 'R');
        $this->Cell(0, 5, 'المركز التنفيذي للمؤسسة السعودية', 0, 1, 'R');
        $this->Cell(0, 5, 'اسم المواطن والدكتوراهي للتعاون', 0, 1, 'R');
        $this->Cell(0, 5, 'مكتبة المجلد وزارة التعامل', 0, 1, 'R');
        
        // Add French text on left
        $this->SetFont('helvetica', '', 8);
        $this->Cell(0, 5, 'Signature De Mare', 0, 1, 'L');
        $this->Cell(0, 5, 'Ministère de la Seine et de la Protection Sanctis', 0, 1, 'L');
        $this->Cell(0, 5, 'Comme Hospitale Universitaire Mohammed VI Voglio', 0, 1, 'L');
        $this->Cell(0, 5, 'Dixième de l’Organisation des Suites et Affaires Professionnelles', 0, 1, 'L');
        $this->Cell(0, 5, 'Service Qualité et Gestion des Risques', 0, 1, 'L');
        
        // Logo in center
        $logoPath = __DIR__ . '/assets/logo.png';
        if (file_exists($logoPath)) {
            $this->Image($logoPath, 85, 5, 40);
        }
        
        $this->Ln(15);
        
        // Main title
        $this->SetFont('helvetica', 'B', 11);
        $this->Cell(0, 10, 'REGISTRE DE DECLARATION DES EVENEMENTS INDESIRABLES', 0, 1, 'C');
        
        // Structure and Date line
        $this->SetFont('helvetica', '', 10);
        $this->Cell(90, 10, 'Structure : DG .... / Formation Hospitalière ............................', 0, 0, 'L');
        $this->Cell(100, 10, 'DATE : ..................', 0, 1, 'R');
        
        // Move cursor below the header section
        $this->Ln(10);
    }
    protected function RotatedText($x, $y, $txt, $angle) {
        $this->StartTransform();
        $this->Rotate($angle, $x, $y);
        $this->Text($x, $y, $txt);
        $this->StopTransform();
    }
    
   
}
function generateEventsRegisterPDF($events, $isMonthly = false) {
    $pdf = new EventsRegisterPDF('P', 'mm', 'A4', true, 'UTF-8', false);
    
    $pdf->SetCreator('Your System');
    $pdf->SetAuthor('Your Organization');
    $pdf->SetTitle($isMonthly ? 'Monthly Events Register' : 'Events Register');
    
    $pdf->AddPage();
    $pdf->SetFont('helvetica', '', 8);
    
    // Define table headers
    $header = ['N°', 'Date', 'Lieu', 'Declarant', 'SOINS ET USAGERS', 'MEDICO-TECHNIQUES', 'ADMISSION-HOTELLERIE', 'Autres'];
    
    // Set table header styles
    $pdf->SetFillColor(200, 220, 255); // Light blue background for headers
    $pdf->SetTextColor(0); // Black text
    $pdf->SetFont('helvetica', 'B', 8);
    
    // Draw table headers
    $columnWidths = [10, 15, 20, 25, 35, 35, 35, 35]; // Adjust widths as needed
    foreach ($header as $index => $col) {
        $pdf->Cell($columnWidths[$index], 10, $col, 1, 0, 'C', true);
    }
    $pdf->Ln(); // Move to the next line after headers
    
    // Set data row styles
    $pdf->SetFillColor(255, 255, 255); // White background for data rows
    $pdf->SetTextColor(0); // Black text
    $pdf->SetFont('helvetica', '', 8);
    
    // Draw data rows
    $rowHeight = 10;
    $n = 1;
    foreach ($events as $event) {
        // N° d'ordre
        $pdf->Cell($columnWidths[0], $rowHeight, $n, 1, 0, 'C', true);
        
        // Date
        $pdf->Cell($columnWidths[1], $rowHeight, date('d/m/Y', strtotime($event['event_date'])), 1, 0, 'C', true);
        
        // Lieu
        $pdf->Cell($columnWidths[2], $rowHeight, $event['location'] ?? '', 1, 0, 'C', true);
        
        // Declarant
        $pdf->Cell($columnWidths[3], $rowHeight, $event['declarant'], 1, 0, 'C', true);
        
        // SOINS ET USAGERS
        $soinsUsagers = ($event['principal_title'] === 'SOINS ET USAGERS') ? $event['event_description'] ?? '' : '';
        $pdf->Cell($columnWidths[4], $rowHeight, $soinsUsagers, 1, 0, 'C', true);
        
        // MEDICO-TECHNIQUES
        $medicoTechniques = ($event['principal_title'] === 'MEDICO-TECHNIQUES') ? $event['event_description'] ?? '' : '';
        $pdf->Cell($columnWidths[5], $rowHeight, $medicoTechniques, 1, 0, 'C', true);
        
        // ADMISSION-HOTELLERIE
        $admissionHotellerie = ($event['principal_title'] === 'ADMISSION-HOTELLERIE') ? $event['event_description'] ?? '' : '';
        $pdf->Cell($columnWidths[6], $rowHeight, $admissionHotellerie, 1, 0, 'C', true);
        
        // Autres
        $autres = (!in_array($event['principal_title'], ['SOINS ET USAGERS', 'MEDICO-TECHNIQUES', 'ADMISSION-HOTELLERIE'])) ? $event['event_description'] ?? '' : '';
        $pdf->Cell($columnWidths[7], $rowHeight, $autres, 1, 0, 'C', true);
        
        $pdf->Ln(); // Move to the next line after each row
        $n++;
    }
    
    return $pdf->Output('events_register.pdf', 'S');
}