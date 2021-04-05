<?php
require('../../../extensiones/FPDF/fpdf.php');

$_POST = array_merge($_POST, (array) json_decode(file_get_contents('php://input')));

class PDF extends FPDF
{
// Cabecera de página
	function Header()
	{
		// require_once "../../common/include.php";
		// $conn=getConnection();

		// $sql = "select mm.id,mm.fecha ,mm.horaInicio ,mm.horaTermino ,mm.tiempoMuerto ,mm.comentarios ,mm.nomenclatura ,mm.folio
		// 		, maq.numMaquina, maq.descripcion, maq.modelo,p.descripcion as frecuencia
		// 		from mttomaestro mm
		// 		JOIN mttodetalle md ON mm.id=md.idMttoMaestro
		// 		JOIN maquinas maq ON maq.idMaquina=mm.idMaquina
		// 		JOIN periodo p ON mm.idFrecuencia=p.id
		// 		where mm.id = '".$_GET["Id"]."' order by mm.id Limit 1";

		// $result = mysqli_query($conn,$sql);
		// $idMtto=0;
	    // Logo
	    $this->Image('../../../vistas/img/plantilla/logoFirecap.png',10,8,60);
	    // Arial bold 15
	    $this->SetFont('Arial','I',8);
	    // Movernos a la derecha
	    $this->Cell(50);
	    // Título
	    $this->Cell(140,7,utf8_decode('Asesoría en Seguridad Industrial - Capacitación & Adiestramiento'),0,0,'R');
        $this->Ln(5);
        $this->Cell(190,3,utf8_decode('Extintores & Equipos contra Incendio - Insumos EPP'),0,0,'R');
        $this->Ln(3);
        $this->Cell(190,3,utf8_decode('Instalación & Mantenimiento - Señalética Industrial'),0,0,'R');
        $this->Ln(3);
        $this->SetFont('Arial','',8);
        $this->Cell(190,3,utf8_decode('Cordillera 409 Fracc Cerro Lindo Gómez Palacio, Dgo.  Tel.- 2952107'),0,0,'R');
        $this->Ln(3);
        $this->Cell(190,3,utf8_decode('email: servicios.firecap@gmail.com   Asesoría directa al 8717898915 - 8711394454'),0,0,'R');
	    // Salto de línea
	    $this->Ln(10);
        $this->SetFont('Arial','B',10);
        $this->SetTextColor(220,50,50);
        $this->Cell(158,3,utf8_decode('Cotización'),0,0,'R');
        //Fecha
        $meses = [1 => "Enero", 2 => "Febrero", 3 => "Marzo", 4 => "Abril", 5 => "Mayo", 6 => "Junio", 7 => "Julio", 8 => "Agosto", 9 => "Septiembre", 10 => "Octubre", 11 => "Noviembre", 12 => "Diciembre"] ;
        $fecha = "Torreón Coahuila, a " . date("j") . " de " . $meses[intval(date("m"))] . " del " . date("Y");
        $this->Ln(5);
        $this->SetFont('Arial','I',8);
        $this->SetTextColor(0,0,0);
        $this->Cell(170,3,utf8_decode($fecha),0,0,'R');
        
        $this->SetTextColor(0,0,128);
        $this->SetFont('Arial','B',8);
        $this->Ln(10);
        $this->Cell(73,3,utf8_decode('A fin de dar cumplimiento a la Norma Oficial Mexicana'),0,0,'R'); 
        $this->SetFont('Arial','U',8);
        //$this->Ln(10);
        $this->Cell(30,3,utf8_decode('NOM 002 STSP 2010 '),0,0,'R'); 
        $this->SetFont('Arial','I',6);
        $this->Cell(51,3,utf8_decode('(Condiciones de seguridad - Prevención y protección'),0,0,'R'); 
        $this->Ln(5);        
        $this->Cell(40,3,utf8_decode('contra incendios en los centros de trabajo)'),0,0,'R');
        
        $this->SetFont('Arial','B',8);
        $this->Cell(103,3,utf8_decode(', nos es grato poner a su consideración la siguiente cotización de servicios:'),0,0,'R');
	    //
	    
	    // while($row = $result->fetch_assoc()) {
		//     $this->Cell(40,8,'No.Maquina',1,0,'L',0);
		//     $this->Cell(140,8,$row['numMaquina'],1,0,'L',0);
		//     $this->Cell(50,8,'Fecha',1,0,'L',0);
		//     $this->Cell(40,8,$row['fecha'],1,1,'L',0);
		//     $this->Cell(40,8,'Tipo de Maquina',1,0,'L',0);
		//     $this->Cell(60,8,$row['descripcion'],1,0,'L',0);
		//     $this->Cell(40,8,'Modelo',1,0,'L',0);
		//     $this->Cell(40,8,$row['modelo'],1,0,'L',0);
		//     $this->Cell(50,8,'Hora de Inicio',1,0,'L',0);
		//     $this->Cell(40,8,$row['horaInicio'],1,1,'L',0);
		//     $this->Cell(40,8,'Area',1,0,'L',0);
		//     $this->Cell(140,8,'',1,0,'L',0);
		//     $this->Cell(50,8,'Hora de Terminacion',1,0,'L',0);
		//     $this->Cell(40,8,$row['horaTermino'],1,1,'L',0);
		//     $this->Cell(40,8,'Frecuencia',1,0,'L',0);
		//     $this->Cell(140,8,$row['frecuencia'],1,0,'L',0);
		//     $this->Cell(50,8,'Tiempo de Realizacion',1,0,'L',0);
		//     $this->Cell(40,8,$row['tiempoMuerto'],1,1,'L',0);
		//     //$this->Cell(50,10,'No.Maquina',1,0,'C',0);

		//     $idMtto=$row['id'];
		// }

	    
	}

// Pie de página
	function Footer()
	{
		// 
		// $sql = "SELECT id, nombre, firma, fecha from mttofirmas where idMttoMaestro ='".$_GET["Id"]."' and tipoUsuario='OP' order by id desc Limit 1";

		// $result = mysqli_query($conn,$sql);

		// while($row = $result->fetch_assoc()) {

			
		// 	$data = $row['firma'];
		// 	$file = fopen("firmaOP.png", "w+");

		// 	fwrite($file, base64_decode($data));
		// 	fclose($file);
		// 	$nameOP = $row["nombre"];
		// 	$fechaOP= $row["fecha"];
		// }
		// $conn=getConnection();

		// $saql = "SELECT id, nombre, firma, fecha from mttofirmas where idMttoMaestro ='".$_GET["Id"]."' and tipoUsuario='SU' order by id desc Limit 1";

		// $result = mysqli_query($conn,$saql);

		// while($row = $result->fetch_assoc()) {

			
		// 	$data = $row['firma'];
		// 	$file = fopen("firmaSU.png", "w+");

		// 	fwrite($file, base64_decode($data));
		// 	fclose($file);
		// 	$nameSU = $row["nombre"];
		// 	$fechaSU= $row["fecha"]; 
			
		// 	// $this->Cell(62,8, $this->Image('logomaintenance.png', 110, 185,25),1);
		// }

		// $sql = "SELECT id, nombre, firma, fecha from mttofirmas where idMttoMaestro ='".$_GET["Id"]."' and tipoUsuario='TE' order by id desc Limit 1";

		// $result = mysqli_query($conn,$sql);

		// while($row = $result->fetch_assoc()) {

			
		// 	$data = $row['firma'];
		// 	$file = fopen("firmaTE.png", "w+");

		// 	fwrite($file, base64_decode($data));
		// 	fclose($file);
		// 	$nameTE = $row["nombre"];
		// 	$fechaTE= $row["fecha"];
		// }

		// $sql = "SELECT id, nombre, firma, fecha from mttofirmas where idMttoMaestro ='".$_GET["Id"]."' and tipoUsuario='EHS' order by id desc Limit 1";

		// $result = mysqli_query($conn,$sql);

		// while($row = $result->fetch_assoc()) {

			
		// 	$data = $row['firma'];
		// 	$file = fopen("firmaEHS.png", "w+");

		// 	fwrite($file, base64_decode($data));
		// 	fclose($file);
		// 	$nameEHS = $row["nombre"];
		// 	$fechaEHS= $row["fecha"];
		// }

		// $this->SetY(-40);
		// $this->Cell(20,8,'',0,0,'L',0);
		// $this->Cell(62,8,'Operador',1,0,'C',0);
		// $this->Cell(62,8,'Supervisor de Turno',1,0,'C',0);
		// $this->Cell(62,8,'Tecnico de Mantenimiento',1,0,'C',0);
		// $this->Cell(62,8,'EHS',1,1,'C',0);	
		// $this->Cell(20,8,'Nombre',1,0,'L',0);
		// $this->Cell(62,8,$nameOP,1,0,'C',0);
		// $this->Cell(62,8,$nameSU,1,0,'C',0);
		
		

		// $this->Cell(62,8,$nameTE,1,0,'C',0);
		// $this->Cell(62,8,$nameEHS,1,1,'C',0);
		// $this->Cell(20,8,'Firma',1,0,'L',0);
		// $this->Cell(62,8,'',1,0,'C',0);
		// $this->Cell(62,8,'',1,0,'C',0);
		// if($nameOP!=null){
		// 	$this->Cell(62,8, $this->Image('firmaOP.png', 45, 185,25),1);	
		// }
		// if($nameSU!=null){
		// 	$this->Cell(62,8, $this->Image('firmaSU.png', 110, 185,25),1);
		// }
		
		// if($nameTE!=null){
		// 	$this->Cell(62,8,$this->Image('firmaTE.png', 175, 185,25),1);
		// }	
		
		// if($nameEHS!=null){
		// 	$this->Cell(62,8,$this->Image('firmaEHS.png', 235, 185,25),1);	
		// }
			
		// $this->Ln(6);	
		// $this->Cell(92,8,$fechaOP,0,0,'C',0);
		// $this->Cell(52,8,$fechaSU,0,0,'C',0);
		// $this->Cell(62,8,$fechaTE,0,0,'C',0);
		// $this->Cell(52,8,$fechaEHS,0,0,'C',0);
		// //$this->Cell(62,8,'',1,1,'C',0);
	    // // Posición: a 1,5 cm del final
	    // $this->SetY(-15);
	    // Arial italic 8
	    $this->SetFont('Arial','I',8);
	    // Número de página
	    $this->Cell(0,10,utf8_decode('Página ').$this->PageNo().'/{nb}',0,0,'C');

	}
}

//require('../../common/include.php');

$pdf=new PDF('P','mm','A4');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);


//$conn=getConnection();

// $sql = "SELECT id, tarea, comentario,action from mttodetalle where idMttoMaestro ='".$_GET["Id"]."'  Limit 10";

// $result = mysqli_query($conn,$sql);

    	
		
		//Body
    $pdf->SetDrawColor(0,80,180);
    $pdf->SetFont('Arial','B',8);
    $pdf->SetFillColor(34,113,179);
    $pdf->SetTextColor(225,225,225);
    $pdf->SetLineWidth(1);
    $pdf->Cell(30,6,'',0,1,'L',0);

    $pdf->Cell(10,5,'No.',1,0,'L',1);
    $pdf->Cell(20,5,'Cantidad',1,0,'L',1);
    $pdf->Cell(100,5,'Servicio',1,0,'L',1);
    $pdf->Cell(30,5,'P.U.',1,0,'L',1);
    $pdf->Cell(30,5,'Total',1,1,'L',1);

    $pdf->SetTextColor(0,0,0);
    //$pdf->Cell(20,6,'P.U',1,1,'C',1);
    //$pdf->Cell(20,6,'Total',1,0,'L',0);
	
// global $title;
// $title = '20000 Leguas de Viaje Submarino';
//     $pdf->SetFont('Arial','B',15);
//     $w = $pdf->GetStringWidth($title)+6;
//     $pdf->SetX((210-$w)/2);
//     //$pdf->SetDrawColor(0,80,180);
//     //$pdf->SetFillColor(230,230,0);
//     $pdf->SetTextColor(220,50,50);
//     $pdf->SetLineWidth(1);
//     //$pdf->Cell($w,9,$title,1,1,'C',true);
//     $pdf->Ln(10);
//     // Guardar ordenada
//     $pdf->y0 = $pdf->GetY();


$index = 1;
// while($row = $result->fetch_assoc()) {
	

// 	$pdf->Cell(10,8,$index,1,0,'L',0);
// 	$pdf->Cell(150,8,$row['tarea'],1,0,'L',0);

// 	if($row['action'] == '1'){
// 		$pdf->Cell(10,8,'X',1,0,'C',0);
// 		$pdf->Cell(10,8,'',1,0,'C',0);
// 	}else{
// 		$pdf->Cell(10,8,'',1,0,'C',0);
// 		$pdf->Cell(10,8,'X',1,0,'C',0);
// 	}
// 	$pdf->Cell(90,8,$row['comentario'],1,1,'L',0);

// 	$index=$index+1;
// }

		
    
$pdf->Output();


?>
