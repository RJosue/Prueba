<?php 
define('FPDF_FONTPATH', 'font/');
require ('fpdf.php');
include 'conexion.php';
echo "<p>prueba</p>";
$idCurso = $_POST['curso'];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	echo "<p>prueba</p>";
    if (isset($_POST['btnCertificar'])) {
        if(!empty($_POST['estudiante'])){
			foreach($_POST['estudiante'] as $id){
		$stmt = $conexion->prepare("select u.id, u.nombre, u.apellido, u.cedula from usuarios u inner join usuarios_capacitaciones uc on u.id = uc.id_usuario inner join capacitaciones c on c.id = uc.id_capacitacion where uc.id_capacitacion = ? and uc.id_usuario = ? ");
				$stmt->execute([$idCurso, $id]); 
				$user = $stmt->fetchAll();
				foreach ($user as $row) {
					return GenerarCertificado($row['nombre']." ".$row['apellido'],$row['cedula'],"25","Marzo","2019","40","Conferencia Latinoamericana");
				}
			}
			
		}else{
			header("Location: ../../php/gestioncursos.php");
		}
    } elseif (isset($_POST['btnListar'])){
		// if(!empty($_POST['estudiante'])){
				$stmt = $conexion->prepare("SELECT u.id, u.nombre, u.apellido, u.cedula from usuarios u inner join usuarios_capacitaciones uc on u.id = uc.id_usuario inner join capacitaciones c on c.id = uc.id_capacitacion where uc.id_capacitacion = ? ");
				$stmt->execute([$idCurso]); 
				$est = $stmt->fetchAll();
				ListaEst($est);
		// }else{
		// 	header("Location: ../../php/gestioncursos.php");
		// }
		
    }
}





/* Para enviarlo por PHPMailer
$mail->addStringAttachment($pdfdoc, 'certificado.pdf');
*/
function ListaEst($est)
{
	ob_start();
	$pdf = new FPDF(); 
	$pdf->AddPage();

	$width_cell=array(20,50,40,40,40);
	$pdf->SetFont('Arial','B',16);

	//Background color of header//
	$pdf->SetFillColor(193,229,252);

	// Header starts /// 
	//First header column //
	$pdf->Cell($width_cell[3],10,'NOMBRE',1,0,"C",true);
	//Second header column//
	$pdf->Cell($width_cell[2],10,'APELLIDO',1,0,"C",true);
	//Third header column//
	$pdf->Cell($width_cell[2],10,'CEDULA',1,1,"C",true); 

	$pdf->SetFont('Arial','',14);
	//Background color of header//
	$pdf->SetFillColor(235,236,236); 
	//to give alternate background fill color to rows// 
	$fill=false;

	/// each record is one row  ///
	foreach ($est as $row) {
	$pdf->Cell($width_cell[3],10,$row['nombre'],1,0,"C",$fill);
	$pdf->Cell($width_cell[2],10,$row['apellido'],1,0,"C",$fill);
	$pdf->Cell($width_cell[2],10,$row['cedula'],1,1,"C",$fill);
	//to give alternate background fill  color to rows//
	$fill = !$fill;
	}
	/// end of records /// 

	$pdf->Output('certificado.pdf','I');
	ob_end_flush();
}


function generarCertificado($nombre,$cedula,$dia,$mes,$year,$hora,$tema)
{
ob_start();
$pdf=new FPDF('L','mm','A4');
$pdf->SetTextColor(255,255,255);

$pdf->AddPage();
$pdf->Image('img/certificado4.jpg',0,0,297,210,'JPG');

// Nombre y Apellido
$pdf->SetFont('Arial','I',36);
$pdf->Text(90,105,$nombre." ".$cedula);

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
$pdf->Text(210,156,$hora." horas");


$pdf->Output('certificado_'.$nombre.".pdf",'I');
}
ob_end_flush();
?>