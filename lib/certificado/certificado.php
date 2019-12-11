<?php 

define('FPDF_FONTPATH', 'font/');
require ('fpdf.php');
//require ('config.php');

$nombre= $_POST['nombre'];


//Propiedades
//$cedula = $_POST['cedula'];
$dia = '28';
$mes = 'noviembre';
$duracion = "40";
$year = "2019";
$tema = "AAAAAAAAAAAAAAAAAAAAAAA";
//$ano = '2013';

//$pdf = new FPDF('L','cm',array(29.700,21));
$pdf=new FPDF('L','mm','A4');
$pdf->SetTextColor(255,255,255);

$pdf->AddPage();
$pdf->Image('img/certificado4.jpg',0,0,297,210,'JPG');

// Nombre y Apellido
$pdf->SetFont('Arial','I',36);
$pdf->Text(90,105,$nombre);

// Cedula
//$pdf->SetFont('helvetica','',8);
//$pdf->Text(1.7,6.1,$cedula);

// Tema
$pdf->SetFont('Arial','',30);
$pdf->Text(70,135,$tema);


// Dia
$pdf->SetFont('Arial','B',15);
$pdf->Text(210,143,$dia);

// Mes

$pdf->SetFont('Arial','B',15);
$pdf->Text(230,143,$mes);

//Año
$pdf->SetFont('Arial','B',15);
$pdf->Text(273,143,$year);


//Duracion
$pdf->SetFont('Arial','B',15);
$pdf->Text(210,156,$duracion." horas");


$pdf->Output('certificado_'.$nombre.".pdf",'I');


?>