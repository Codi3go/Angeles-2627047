<?php
require './fpdf/fpdf.php';
require_once("conexion.php");

$pdf = new FPDF();

$query = mysqli_query($conexion, "SELECT * FROM deportista");

$result = mysqli_num_rows($query);

// Agregar una página
$pdf->AddPage();

// Establecer la fuente y el tamaño del texto
$pdf->SetFont('Arial', 'B', 10);

$ancho_pagina = $pdf->GetPageWidth();
$ancho_total_tabla = 30 * 4; // Ancho total de las cuatro columnas
$posicion_x = ($ancho_pagina - $ancho_total_tabla) / 2;

/*
if ($result > 0) {
    while ($data = mysqli_fetch_assoc($query)) {
        $pdf->Cell(40, 10, $data['nombre']);
    }
}*/

// Título de la tabla
$pdf->Cell(0, 10, 'Informacion de deportistas', 0, 1, 'C');

$pdf->Ln(10);

// Encabezados de la tabla
$pdf->SetX($posicion_x); // Establecer la posición x para centrar la tabla
$pdf->Cell(30, 10, 'ID', 1, 0, 'C'); // Ancho de celda ajustado
$pdf->Cell(30, 10, 'Nombre', 1, 0, 'C'); // Ancho de celda ajustado
$pdf->Cell(30, 10, 'Telefono', 1, 0, 'C'); // Ancho de celda ajustado
$pdf->Cell(30, 10, 'Direccion', 1, 1, 'C');

if ($result > 0) {
    while ($data = mysqli_fetch_assoc($query)) {
        $pdf->SetX($posicion_x); // Establecer la posición x para centrar la fila
        $pdf->Cell(30, 10, $data['id_deportista'], 1, 0, 'C');
        $pdf->Cell(30, 10, $data['nombre'], 1, 0, 'C');
        $pdf->Cell(30, 10, $data['telefono'], 1, 0, 'C');
        $pdf->Cell(30, 10, $data['direccion'], 1, 1, 'C');
    }
}

// Recorrer los datos y agregar filas a la tabla
$pdf->output();

?>
