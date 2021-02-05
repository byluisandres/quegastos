<?php
$pdf = new FPDF('L', 'mm', 'A4');
$pdf->AddPage();
$pdf->SetFont('Arial', 'B');
$pdf->Cell(278, 10, "Listado de Gastos", 1, 0, 'C', 0);
$pdf->Ln(10);
$pdf->Cell(56, 10, 'Gasto', 1, 0, 'C');
$pdf->Cell(110, 10, 'Tipo de gasto', 1, 0, 'C');
$pdf->Cell(56, 10, 'Fecha', 1, 0, 'C');
$pdf->Cell(56, 10, 'Cantidad', 1, 0, 'C');
$total = 0;
$pdf->SetFont('Arial', '');
foreach ($data as $row) {
    $pdf->Ln(10);
    $pdf->Cell(56, 10, $row['nombre'], 1, 0, 'L');
    $pdf->Cell(110, 10, $row['tipo_gasto'], 1, 0, 'l');
    $pdf->Cell(56, 10, $row['fecha'], 1, 0, 'C');
    $pdf->Cell(56, 10, $row['cantidad'], 1, 0, 'C');
    $total += $row['cantidad']; //mirar total 
}
$pdf->Ln(10);
$pdf->Cell(222, 10, "Total: ", 1, 0, 'L', 0);
$pdf->SetFont('Arial', 'B');
$pdf->Cell(56, 10, $total . " euros", 1, 0, 'C', 0);
$pdf->Output("I", "listado_de_gastos.pdf", true);
