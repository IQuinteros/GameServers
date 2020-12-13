<?php

/* Require base pdf */
require_once ('base_pdf.php');
require_once __DIR__.('/../../utils/login.php');
require_once __DIR__.('/../../repositories/user_repository.php');

if($isEmpty){return;}

// Check current admin
$currentAdmin = Login::getCurrentAdmin();

if($currentAdmin == null){ printEmpty('No tiene permisos suficientes para acceder a esta página'); return; }

// Get clients
if(gettype($_REQUEST['items']) != 'array'){
    printEmpty('No se ha pedido correctamente la solicitud'); return;
}
$users = UserRepository::getUsersById($_REQUEST['items']);

if(count($users) <= 0){
    printEmpty('No hay clientes encontrados');
    return;
}

/* Set header subtitle */
initBasePDF($pdf, 'Informe de clientes');
$pdf->SetTitle('GameServers: Clientes');
$pdf->SetSubject('GameServers: Clientes');

// ---------------------------------------------------------

// Set some content to print
$html = <<<EOD
<br>
<h1 style="text-align: center">Informe de clientes</h1><br>
EOD;

// Print text using writeHTMLCell()
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

$first = true;

foreach($users as $userRef){

    if(!$first){
        $pdf->AddPage();
    }

    $userSubtitle = '<h3 style="text-align: center">'.$userRef->name.'</h3><br>';

    $pdf->writeHTMLCell(0, 0, '', '', $userSubtitle, 0, 1, 0, true, '', true);
    
    $pdf->Cell(58, 10, 'Nombre', 1, 0, 'L', 1);
    $pdf->Cell(0, 10, $userRef->name, 1, 0, 'C', 0);
    $pdf->Ln();
    $pdf->Cell(58, 10, 'Email', 1, 0, 'L', 1);
    $pdf->Cell(0, 10, $userRef->email, 1, 0, 'C', 0);
    $pdf->Ln();
    $pdf->Cell(58, 10, 'Número de miembros', 1, 0, 'L', 1);
    $pdf->Cell(0, 10, $userRef->membersNum, 1, 0, 'C', 0);
    $pdf->Ln();
    $pdf->Cell(58, 10, 'Número de contacto', 1, 0, 'L', 1);
    $pdf->Cell(0, 10, $userRef->contactNum, 1, 0, 'C', 0);
    $pdf->Ln();
    $pdf->Cell(58, 10, 'Ubicación', 1, 0, 'L', 1);
    $pdf->Cell(0, 10, $userRef->location, 1, 0, 'C', 0);
    $pdf->Ln();
    $pdf->Cell(58, 10, 'Fecha de registro', 1, 0, 'L', 1);
    $pdf->Cell(0, 10, $userRef->registerDate, 1, 0, 'C', 0);
    $pdf->Ln();
    $pdf->Cell(58, 10, 'Última conexión', 1, 0, 'L', 1);
    $pdf->Cell(0, 10, $userRef->lastConnectionDate, 1, 0, 'C', 0);
    $pdf->Ln();

    $first = false;

}


// ---------------------------------------------------------

// Close and output PDF document
// This method has several options, check the source code documentation for more information.
$pdf->Output('country.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+