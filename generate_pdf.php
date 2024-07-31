<?php
require('fpdf/fpdf.php');
include_once('include/conexao.php');

if ($conexao->connect_error) {
    die("Conexão falhou: " . $conexao->connect_error);
}

$notafiscal = $_GET['id'];
$sql = "SELECT * FROM nota_fiscal WHERE id = $notafiscal";
$resultado = $conexao->query($sql);

if ($resultado->num_rows > 0) {
    $row = $resultado->fetch_assoc();
    
    // Criação do PDF
    $pdf = new FPDF();
    $pdf->AddPage();
    
    $pdf->SetFont('Arial', 'B', 16);
    $pdf->Cell(0, 10, 'Nota Fiscal', 0, 1, 'C');
    
    $pdf->SetFont('Arial', '', 12);
    
    foreach($row as $key => $value) {
        $pdf->Cell(50, 10, strtoupper(str_replace('_', ' ', $key)) . ': ', 0, 0);
        $pdf->Cell(0, 10, $value, 0, 1);
    }
    
    $pdf->Output('D', 'nota_fiscal.pdf');
}

$conexao->close();
?>
