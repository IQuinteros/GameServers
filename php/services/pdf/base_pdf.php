<?php

/* Get ID from GET */
$isEmpty = false;
if(!isset($_GET['items'])){
    printEmpty();
    $isEmpty = true;
    return;
}
$items = $_GET['items'];

function printEmpty($message = 'El servidor no ha logrado obtener datos de este elemento'){
    ?>
    <style>
        body{
            display: flex;
            flex-flow: column;
            align-items: center;
            justify-content: center;

            min-height: 90vh;

            font-family: Arial, Helvetica, sans-serif;

            background-color: rgb(0, 108, 103);
            color: white;

            text-shadow: 4px 4px 4px rgba(0, 0, 0, .25);
        }

        .message{
            order: -1;
            text-align: center;
        }

        p{
            font-size: 1.2rem;
            text-align: center;
        }
    </style>

    <h1 class='message'><?= $message?></h1>
    <p id='counter'>Cerrando página en 10 segundos</p>

    <script>
        let counter = document.getElementById('counter');

        function timer(){
            for (let i = 0; i < 9; i++) {
                setTimeout(() => {
                    counter.textContent = `Cerrando página en ${ 9 - i } segundos`;
                }, 1000 * (i + 1));
            }

            setTimeout(() => {
                window.close();
            }, 1000 * 10);
        }

        timer();
    </script>
    <?php
    return;
}

// Include the main TCPDF library (search for installation path).
require_once __DIR__.('/../../libraries/tcpdf/tcpdf.php');

// Create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// Set document information
$pdf->SetCreator('GameServers');
$pdf->SetAuthor('GameServers');
$pdf->SetTitle('Base PDF');
$pdf->SetSubject('Base PDF Subject');
$pdf->SetKeywords('PDF');

// Set default header data
$pdf->setFooterData(array(0,64,0), array(0,64,128));

// Set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', 14));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// Set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// Set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// Set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// Set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// Set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// -----------------------------------------------

// Set default font subsetting mode
$pdf->setFontSubsetting(true);

// Set font
// dejavusans is a UTF-8 Unicode font, if you only need to
// print standard ASCII chars, you can use core fonts like
// helvetica or times to reduce file size.
$pdf->SetFont('dejavusans', '', 14, '', true);

$pdf->SetFillColor(169, 229, 85);
$pdf->SetDrawColor(114, 176, 29);
$pdf->SetLineWidth(0.3);

// -----------------------------------------------

function initBasePDF(TCPDF $pdf, string $subtitle){
    $pdf->SetHeaderData('logo/favicon.png', 10, '  GameServers', '  '.$subtitle, array(0,108,103), array(114,176,29));

    // Add a page
    // This method has several options, check the source code documentation for more information.
    $pdf->AddPage();

    // set text shadow effect
    //$pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));
}