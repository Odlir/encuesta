<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('carreras_model');
	}

	public function index(){
		$year = (int)date("Y");
		$years = array();
		for ($x=$year-2; $x <= $year+2; $x++){
			$years[] = $x;
		}
		$data['titulo'] = 'UPC';
		$data['years'] = $years;
		$this->load->view('welcome_message', $data);
	}

	public function validar(){
		$objeto = new stdClass();
		$objeto->nombre = $this->input->post('nombres');
		$objeto->apellido = $this->input->post('apellidos');
		$objeto->sexo = $this->input->post('genero');
		$objeto->email = $this->input->post('email');
		$objeto->colegio = $this->input->post('colegio');
		$objeto->ubigeo_colegio = $this->input->post('distrito_col');
		$objeto->year_egreso = $this->input->post('egreso');
		$objeto->dni = $this->input->post('dni');
		$objeto->domicio = $this->input->post('domicilio');
		$objeto->celular = $this->input->post('celular');
		$objeto->cel_apoderado = $this->input->post('cel_apoderado');
		$objeto->telf_fijo = $this->input->post('tel_fijo');
		$objeto->fecha_nacimiento = $this->input->post('fecha_nacimiento');
		$res = $this->carreras_model->insertAlumno($objeto);
		echo json_encode(array('result' => $res, 'id' => $res, 'nombre' => $this->input->post('apellidos').' '.$this->input->post('nombres')));
	}

	public function test($id){
		$alumno = $this->carreras_model->getAlumnoById($id);
		$data['alumno'] = $alumno[0]->nombre.' '.$alumno[0]->apellido;
		$data['id'] = $alumno[0]->id;
		$this->load->view('encuesta',$data);
	}

	public function getCarreras(){
		$data['carreras'] = $this->carreras_model->getCarreras();
		$this->load->view('carrusel',$data);
	}

	public function stepOne(){
		$id         = $this->input->post('id_alumno');
		$mas        = $this->input->post('mas');
		$intermedio = $this->input->post('intermedio');
		$menos      = $this->input->post('menos');

		$arrayMas           = explode(',', $mas);
		$arrayIntermedio    = explode(',', $intermedio);
		$arrayMenos         = explode(',', $menos);

		$res = $arrayMas; //array_merge($arrayMas, $arrayIntermedio, $arrayMenos);
		$result = $this->carreras_model->getFullCarreras($res);

		$alumno = $this->carreras_model->getAlumnoById($id);
		$data['alumno'] = $alumno[0]->nombre.' '.$alumno[0]->apellido;
		$data['id'] = $id;
		$data['carreras'] = $result;
		$data['total'] = count($result);
		$data['mas'] = $arrayMas;
		$data['intermedio'] = $arrayIntermedio;
		$data['menos'] = $arrayMenos;
		$this->load->view('stepOne',$data);
	}

	public function saveOptions(){
		$datos = $this->input->post('data');
		$alumno = $this->input->post('alumno');
		foreach ($datos as $i =>$val){
			$objeto = new stdClass();
			$objeto->id_alumno = $alumno;
			$objeto->carrera_id = $val;
			$arr[$i] = $objeto;
		}
		$this->carreras_model->deleteOptiones($alumno);
		$res = $this->carreras_model->insertarOpciones($arr);
		echo json_encode(array('res'=>$res));
	}

	public function stepTwo($id){
		$data['preguntas'] = $this->carreras_model->getQuestions();
		$data['carreras'] = $this->carreras_model->getOpciones($id);
		$alumno = $this->carreras_model->getAlumnoById($id);
		$data['alumno_id'] = $id;
		$data['alumno'] = $alumno[0]->nombre.' '.$alumno[0]->apellido;
		$this->load->view('stepTwo', $data);
	}

	public function stepThree(){
		$dts = $this->input->post('carrera1');
		$dts1 = $this->input->post('carrera2');
		$dts2 = $this->input->post('carrera3');
		$alumno_id = $this->input->post('alumno_id');
		$id = explode('_', $dts['carrera']);
		$id1 = explode('_', $dts1['carrera']);
		$id2 = explode('_', $dts2['carrera']);
		$data['carrera'] = $this->carreras_model->getCarreraById($id[1]);
		$data['carrera1'] = $this->carreras_model->getCarreraById($id1[1]);
		$data['carrera2'] = $this->carreras_model->getCarreraById($id2[1]);
		$data['alu_id'] = $alumno_id;
		$this->carreras_model->insertCarreraFinal($alumno_id, $id[1], $id1[1], $id2[1]);
		$this->enviarCorreo($alumno_id, $id, $id1, $id2);
		$this->load->view('stepThree', $data);
	}

	public function getUbigeo(){
		$ubigeo = $this->carreras_model->getUbigeo();
		$arr = array();
		foreach ($ubigeo as $i => $ubi){
			$arr[] = array('id' => $ubi->id, 'text' => $ubi->departamento . ' - ' . $ubi->provincia . ' - ' . $ubi->distrito);
		}
		echo json_encode($arr);
	}

	public function enviarCorreo($alumno_id, $id, $id1, $id2){
		/*$alumno = $this->carreras_model->getAlumnoById($alumno_id);
		$carrera = $this->carreras_model->getCarreraById($id_carrera);*/
		$data['alumno1'] = 'asd';
		$this->load->library("phpmailer_library");

		$mail = $this->phpmailer_library->load();
		$mail->isSMTP();
		$mail->SMTPDebug = 0;
		$mail->SMTPAuth = true;
		$mail->SMTPSecure = 'tls';//tls or ssl
		$mail->Host     = 'mail.gaf.com.pe';//'smtp.example.com';
		$mail->Username = 'rildo.gomez@gaf.com.pe';
		$mail->Password = 'rtqDKYM6';
		$mail->Port     = 587; //587 or 465

		$mail->setFrom('rildo.gomez@gaf.com.pe');
		$mail->addReplyTo('odlirgz@gmail.com', 'CodexWorld');

		// Add a recipient
		$mail->addAddress('odlirgz@gmail.com');

		// Add cc or bcc
		/*$mail->addCC('cc@example.com');
		$mail->addBCC('bcc@example.com');*/

		$mail->Subject = 'Resultado Test Email';
		$mail->isHTML(true);

		$mailContent = $this->load->view('mail', $data , TRUE);
		$mail->Body = $mailContent;

		// Send email
		if(!$mail->send()){
			echo 'Message could not be sent.';
			echo 'Mailer Error: ' . $mail->ErrorInfo;
		}else{
			echo 'Message has been sent';
		}

	}

	public function createpdf($id){
		$alumno = $this->carreras_model->getAlumnoById($id);
		$id_carrera = $this->carreras_model->getCarreraLast($id);
		$carrera = $this->carreras_model->getCarreraById($id_carrera[0]->carrera_id);

		$this->load->library(array('Pdf'));
		$pdf = new Pdf('P','mm','A4');
		$pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor('OdLir Gomez');
		$pdf->SetTitle('Reporte de Documento Eletrónico');

		$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE . ' 001', PDF_HEADER_STRING, array(0, 64, 255), array(0, 64, 128));
		$pdf->setFooterData($tc = array(0, 64, 0), $lc = array(0, 64, 128));

		$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
		$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

		// se pueden modificar en el archivo tcpdf_config.php de libraries/config
		$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

		// se pueden modificar en el archivo tcpdf_config.php de libraries/config
		$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
		$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
		$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

		// se pueden modificar en el archivo tcpdf_config.php de libraries/config
		$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

		//relación utilizada para ajustar la conversión de los píxeles
		$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

		// ---------------------------------------------------------
		// establecer el modo de fuente por defecto
		$pdf->setFontSubsetting(true);

		//Si tienes que imprimir carácteres ASCII estándar, puede utilizar las fuentes básicas como
		// Helvetica para reducir el tamaño del archivo.
		$pdf->SetFont('Helvetica', '', 12, '', true);

		// Añadir una página
		// Este método tiene varias opciones, consulta la documentación para más información.
		$pdf->Open();
		$pdf->AddPage();

		$style = array(
			'border' => 0,
			'vpadding' => 'auto',
			'hpadding' => 'auto',
			'fgcolor' => array(0,0,0),
			'bgcolor' => false, //array(255,255,255)
			'module_width' => 1, // width of a single module in points
			'module_height' => 1 // height of a single module in points
		);

		$pdf->SetFont('helvetica', 'b', 14);
		$pdf->setLineWidth(14);
		$pdf->Text(75,35,'TEST DE CARRERAS UPC',FALSE,FALSE,TRUE,0,0,'L');

		$pdf->SetFont('helvetica', 'b', 12);
		$pdf->setLineWidth(14);
		$pdf->Text(35,55,'Nombre de postulante: '.$alumno[0]->nombre.' '.$alumno[0]->apellido,FALSE,FALSE,TRUE,0,0,'L');
		$pdf->Text(35,65,'Fecha de evaluación: '. date("d-m-Y", strtotime($alumno[0]->fecha_reg)),FALSE,FALSE,TRUE,0,0,'L');

		$pdf->Text(35,70,'______________________________________________________________',FALSE,FALSE,TRUE,0,0,'L');

		$pdf->SetFont('helvetica', '', 10);
		$pdf->setLineWidth(14);
		$pdf->Text(35,80,'Los resultados obtenidos en el test de carreras, nos llevan a recomendarte una profesión que',FALSE,FALSE,TRUE,0,0,'L');
		$pdf->Text(35,85,'potencie tu talento y vidas con pasión tu experiencia universitaria y esta es la carrera de: ',FALSE,FALSE,TRUE,0,0,'L');
		//$pdf->Text(35,90,'carrera de: ',FALSE,FALSE,TRUE,0,0,'L');
		$pdf->SetFont('helvetica', 'b', 14);
		$pdf->Text(65,105, $carrera[0]->descripcion,FALSE,FALSE,TRUE,0,0,'L');

		$pdf->SetFont('helvetica', '', 10);
		//$pdf->Text(35,125, $carrera[0]->totaltexto,FALSE,FALSE,TRUE,0,0,'L');
		$pdf->MultiCell(148,0,$carrera[0]->totaltexto,null,'',null, null,35,120,'','','','','','','');
		$pdf->SetFont('helvetica', 'b', 10);
		$pdf->Text(35,170, 'Si deseas mayor información ingresa a :',FALSE,FALSE,TRUE,0,0,'L');
		$pdf->Text(35,177, $carrera[0]->url,FALSE,FALSE,TRUE,0,0,'L');

		$pdf->Output('PDF/Reporte.pdf', 'D');
	}

}
















