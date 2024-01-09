<?php
    

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Capture form data
        $full_name = isset($_POST['full_name']) ? strtoupper($_POST['full_name']) : '';
        $role = isset($_POST['role']) ? strtoupper($_POST['role']) : '';
        $email = isset($_POST['email']) ? strtolower($_POST['email']) : '';
        $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
        $address = isset($_POST['address']) ? ucwords($_POST['address']): '';
        $linkedin_url = isset($_POST['linkedin_url']) ? $_POST['linkedin_url'] : '';
        $graduation_degree = isset($_POST['graduation_degree']) ? ucwords($_POST['graduation_degree']) : '';
        $university_name_graduation = isset($_POST['university_name_graduation']) ? strtoupper($_POST['university_name_graduation']) : '';
        $year_of_passing_graduation = isset($_POST['year_of_passing_graduation']) ? $_POST['year_of_passing_graduation'] : '';
        $diploma = isset($_POST['diploma']) ? ucwords($_POST['diploma']) : '';
        $university_name_diploma = isset($_POST['university_name_diploma']) ? strtoupper($_POST['university_name_diploma'] ): '';
        $year_of_passing_diploma = isset($_POST['year_of_passing_diploma']) ? $_POST['year_of_passing_diploma'] : '';
        $skills = isset($_POST['skills']) ? ucwords($_POST['skills']) : '';
        $profile_summary = isset($_POST['profile_summary']) ? $_POST['profile_summary'] : '';
        $project1_name = isset($_POST['project1_name']) ? ucwords($_POST['project1_name']) : '';
        $project1_description = isset($_POST['project1_description']) ? ucwords($_POST['project1_description']) : '';
        $project1_role = isset($_POST['project1_role']) ? ucwords($_POST['project1_role']) : '';
        $project1_tool = isset($_POST['project1_tool']) ? ucwords($_POST['project1_tool']) : '';
        $project2_name = isset($_POST['project2_name']) ? ucwords($_POST['project2_name']) : '';
        $project2_description = isset($_POST['project2_description']) ? $_POST['project2_description'] : '';
        $project2_role = isset($_POST['project2_role']) ? ucwords($_POST['project2_role']) : '';
        $project2_tool = isset($_POST['project2_tool']) ? ucwords($_POST['project2_tool']) : '';

      
        

    






    require_once('C:\xampp\htdocs\sublime new\tcpdf.php');

// Create instance of TCPDF
$pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8');

// Disable header
$pdf->setPrintHeader(false);

// Set document information
$pdf->SetCreator('Your Name');
$pdf->SetAuthor('Jaid Beg');
$pdf->SetTitle('Jaid Beg - Full Stack Developer Resume');
$pdf->SetSubject('Resume PDF');
$pdf->SetKeywords('resume, TCPDF, example');

// Add FreeSans font
$fontPath = 'C:\xampp\htdocs\sublime new\freesans.ttf';
$pdf->AddFont('FreeSans', '', $fontPath);

// Set font to FreeSans
$pdf->SetFont('FreeSans', '', 12);

// Add a page
$pdf->AddPage();

// Name
$pdf->SetFont('FreeSans', 'B', 28);
$pdf->Cell(0, 10, $full_name, 0, 1, 'L');

// Role
$pdf->SetFont('FreeSans', '', 15);
$pdf->Cell(0, 10, $role, 0, 1, 'L');

// Simulate a thinner underline
$lastPosX = $pdf->GetX();
$lastPosY = $pdf->GetY();

// Move the cursor to a new Y position
$newYPosition = $lastPosY - 1.5; // Adjust the Y position as needed

// Set the new Y position for the line
$lineYPosition = $newYPosition - 1; // Adjust the Y position of the line
$pdf->SetY($newYPosition);

// Simulate a thinner underline at the new Y position
$pdf->SetLineWidth(0.2); // Adjust the line width as needed
$pdf->Line($lastPosX , $lineYPosition, $lastPosX + $pdf->GetStringWidth('FULL STACK DEVELOPER') + 1.5, $lineYPosition);


$pdf->SetFont('FreeSans', 'B', 18);
$pdf->Cell(0, 28, 'CONTACT', 0, 1, 'L');

$pdf->SetLineWidth(0.3); // Set line width
$pdf->Line(10, 48, 100, 48);


// Set XY position for the link
$pdf->SetXY(17,50.5); // Adjust the X and Y coordinates as needed

// HTML content with a link
$html = '<a href="mailto:' . $email . '" style="text-decoration: underline; color: #0362fc; font-size: medium; font-weight: normal;">' . $email . '</a>';


// Add HTML content to the PDF 
$pdf->writeHTML($html);
$pdf->Image('C:\xampp\htdocs\sublime new\images\mail.png', 10, 52, 5, 0);


$pdf->SetXY(16, 60);
$pdf->SetFont('FreeSans', '', 17);
// Add text using Cell() method at the new position
$pdf->Image('C:\xampp\htdocs\sublime new\images\call.png', 9.5, 62, 5.5, 0);
$pdf->Cell(0, 10,'+91'.$phone, 0, 1, 'L');



$pdf->SetXY(16, 69);
$pdf->SetFont('FreeSans', '', 16);
// Add text using Cell() method at the new position
$pdf->Image('C:\xampp\htdocs\sublime new\images\location.png', 9.6, 71, 5.5, 0);
$pdf->Cell(0, 10, $address, 0, 1, 'L');

$pdf->SetXY(16, 80);
$pdf->SetFont('FreeSans', '', 16);
// Add text using Cell() method at the new position
$pdf->Image('C:\xampp\htdocs\sublime new\images\linkedin.png', 9.6, 81.5, 4.8, 0);
$html = '<a href="" style="text-decoration: underline; color: #0362fc;  font-size: medium; font-weight: normal;
">' .$linkedin_url. '</a>';

// Add HTML content to the PDF 
$pdf->writeHTML($html);


$pdf->SetFont('FreeSans', 'B', 18);
$pdf->Cell(0, 28, 'EDUCATION', 0, 1, 'L');

$pdf->SetLineWidth(0.3); // Set line width
$pdf->Line(10, 104, 100, 104);

$pdf->SetXY(10, 110);
$pdf->SetFont('FreeSans', '', 16);
$pdf->MultiCell(95, 10,'- ' .$graduation_degree, 0, 'L');

$pdf->SetXY(9, 129);
$pdf->SetFont('FreeSans', 'I', 15);
$pdf->MultiCell(80,10,$university_name_graduation .' Graduated in '.$year_of_passing_graduation,0,'C');

$pdf->SetXY(10, 143);
$pdf->SetFont('FreeSans', '', 16);
$pdf->MultiCell(95, 10, '- '.$diploma, 0, 'L');

$pdf->SetXY(9, 162);
$pdf->SetFont('FreeSans', 'I', 15);
$pdf->MultiCell(80, 10, $university_name_diploma. ' Graduated in '.$year_of_passing_diploma, 0, 'C');


$pdf->SetXY(9, 184.5);
$pdf->SetFont('FreeSans', 'B', 18);
$pdf->Cell(0, 0, 'SKILLS', 0, 1, 'L');

$pdf->SetLineWidth(0.3); // Set line width
$pdf->Line(10, 192, 100, 192);

$pdf->SetXY(10, 196);
$text = $skills;
$wordArray = explode(' ', $text);

$pdf->SetFont('FreeSans', '', 15);

foreach ($wordArray as $word) {
    $pdf->MultiCell(80, 12, '- '.$word , 0, 'L');
}


$pdf->SetXY(110, 0);

$pdf->SetFont('FreeSans', 'B', 18);
$pdf->Cell(0, 28, 'PROFILE', 0, 1, 'L');

$pdf->SetXY(110, 0);
$pdf->SetLineWidth(0.3); // Set line width
$pdf->Line(110, 17.5, 203, 17.5);



$pdf->SetFont('FreeSans', '', 16);

$html = '<p style="line-height:1.4;">'.$profile_summary.'</p>';

$pdf->writeHTMLCell(95, 0, 110, 20, $html, 0, 1, false, true, 'J', false);




$pdf->SetXY(110, 63);
$pdf->SetFont('FreeSans', 'B', 18);
$pdf->Cell(0, 28, 'PROJECTS', 0, 1, 'L');

$pdf->SetLineWidth(0.3); // Set line width
$pdf->Line(110, 80.5, 203, 80.5);


$pdf->SetXY(110, 86);
$pdf->SetFont('FreeSans', 'B', 16);
$pdf->Cell(0, 0, 'Project: ', 0, 1, 'L');


$pdf->SetXY(130, 86.5);
$pdf->SetFont('FreeSans', '', 15);
$pdf->Cell(0, 0, ' '.$project1_name, 0, 1, 'L');


$pdf->SetXY(110, 96);
$pdf->SetFont('FreeSans', 'B', 16);
$pdf->Cell(0, 0, 'Description: ', 0, 0, 'L');

$pdf->SetFont('FreeSans', '', 14);

$html = '<p style="line-height:1.3;">'.$project1_description.'</p>';

$pdf->writeHTMLCell(95, 0, 110, 103, $html, 0, 1, false, true, 'J', false);






$pdf->SetXY(110, 141);
$pdf->SetFont('FreeSans', 'B', 16);
$pdf->Cell(0, 0, 'Role:', 0, 1, 'L');


$pdf->SetXY(125, 141.5);
$pdf->SetFont('FreeSans', '', 15);
$pdf->Cell(0, 0, $project1_role, 0, 1, 'L');



$pdf->SetXY(110, 150);
$pdf->SetFont('FreeSans', 'B', 16);
$pdf->Cell(0, 0, 'Tool:', 0, 1, 'L');



$pdf->SetFont('FreeSans', '', 15);
$pdf->SetXY(125, 150.5);
$pdf->MultiCell(80, 8,$project1_tool, 0, 'L');




$pdf->SetXY(110, 164);
$pdf->SetFont('FreeSans', 'B', 15);
$pdf->Cell(0, 28, 'Project: ', 0, 1, 'L');


$pdf->SetXY(130, 164.3);
$pdf->SetFont('FreeSans', '', 14);

$pdf->Cell(0, 28,$project2_name, 0, 1, 'L');



$pdf->SetXY(110, 184.5);
$pdf->SetFont('FreeSans', 'B', 16);
$pdf->Cell(0, 0, 'Description:  ', 0, 1, 'L');

$pdf->SetFont('FreeSans', '', 14);
$html = '<p style="line-height:1.3;">'.$project2_description.'</p>';
$pdf->writeHTMLCell(98, 0, 110, 191.8, $html, 0, 1, false, true, 'J', false);




$pdf->SetXY(110, 233);
$pdf->SetFont('FreeSans', 'B', 16);
$pdf->Cell(0, 0, 'Role:', 0, 1, 'L');


$pdf->SetXY(125, 233.4);
$pdf->SetFont('FreeSans', '', 15);
$pdf->Cell(0, 0,$project2_role , 0, 1, 'L');



$pdf->SetXY(110, 243);
$pdf->SetFont('FreeSans', 'B', 16);
$pdf->Cell(0, 0, 'Tool:', 0, 1, 'L');



$pdf->SetFont('FreeSans', '', 15);
$pdf->SetXY(125, 243.3);
$pdf->MultiCell(95, 8, $project1_tool, 0, 'L');







// Custom height for the vertical line
$lineHeightStart = 10; // Adjust the starting Y coordinate of the line
$lineHeightEnd = $pdf->getPageHeight() - 10; // Adjust the ending Y coordinate of the line

// Draw a thin vertical line at a custom height
$pdf->SetLineWidth(0.2); // Adjust the line width as needed
$pdf->Line($pdf->getPageWidth() / 2, $lineHeightStart, $pdf->getPageWidth() / 2, $lineHeightEnd);

// Output the PDF to the browser
$pdf->Output('resume_freesans_thin_underline_custom_height.pdf', 'I');

}
?>

