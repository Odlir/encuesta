<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require 'vendor/autoload.php';
use \Mailjet\Resources;

class Evaluados extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('alumnos_model');
		$this->load->model('carreras_model');
		$this->load->library('pagination');
	}

	public function index($p = 0){
		$search = trim($this->input->post('search'));

		$config = array();
		$config["base_url"] = site_url("evaluados/index");
		$config["per_page"] = 10;
		$config["uri_segment"] = 3;
		$config["total_rows"] = count($this->alumnos_model->getAlumnos($search));
		/* */
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		$config['attributes'] = array('class' => 'page-link');
		$config['first_link'] = false;
		$config['last_link'] = false;
		$config['first_tag_open'] = '<li class="page-item">';
		$config['first_tag_close'] = '</li>';
		$config['prev_link'] = '&laquo';
		$config['prev_tag_open'] = '<li class="page-item">';
		$config['prev_tag_close'] = '</li>';
		$config['next_link'] = '&raquo';
		$config['next_tag_open'] = '<li class="page-item">';
		$config['next_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li class="page-item">';
		$config['last_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="page-item active"><a href="#" class="page-link">';
		$config['cur_tag_close'] = '<span class="sr-only">(current)</span></a></li>';
		$config['num_tag_open'] = '<li class="page-item">';
		$config['num_tag_close'] = '</li>';
		/* */
		$data["data"] = $this->alumnos_model->getAlumnos1($config["per_page"], $p, $search);
		$this->pagination->initialize($config);
		$data["links"] = $this->pagination->create_links();
		$this->load->view('encuesta/encuesta', $data);
	}

	public function getAlumnos(){
		$draw   = $this->input->get_post('draw');
		$search = $this->input->get_post('search');
		$order = $this->input->get_post('order');
		$start = $this->input->get_post('start');
		$length = $this->input->get_post('length');
		$data = $this->alumnos_model->getAlumnos($search['value'], $order[0], $start, $length);
		$json_data = array(
			"draw"            => intval($draw),
			"recordsTotal"    => intval(count($data)),
			"recordsFiltered" => intval(count($data)),
			"data"            => $data,
			'start'           => $start,
			'len'             => $length,
			'search'          => $search,
			'order'           => $order
		);
		echo json_encode($json_data);
	}

	public function reenviar($alumno_id){
		$data = $this->alumnos_model->getCarreras($alumno_id);
		$mailSend = $this->jmail($alumno_id, $data[0]->carrera_id, $data[1]->carrera_id, $data[2]->carrera_id);
		$this->carreras_model->updateEstadoMail($alumno_id, ($mailSend)?'1':'0');
	}


	public function jmail($alumno_id, $id, $id1, $id2){
		$alumno = $this->carreras_model->getAlumnoById($alumno_id);
		$carrera = $this->carreras_model->getCarreraById($id);
		$carrera1 = $this->carreras_model->getCarreraById($id1);
		$carrera2 = $this->carreras_model->getCarreraById($id2);

		$nombres = $alumno[0]->nombre . ' ' . $alumno[0]->apellido;
		$data['alumno'] = $nombres;
		$data['carrera'] = $carrera;
		$data['carrera1'] = $carrera1;
		$data['carrera2'] = $carrera2;

		$mj = new \Mailjet\Client('0b48a1d28754c4e80c8a0cb4d9680256','71ac82232962ecac6dee66cf2909714f',true, array('version' => 'v3.1'));
		$attachment =  $this->createpdf($alumno_id, 'S');
		$mailContent = $this->load->view('mailer', $data , TRUE);
		$body = array(
			'Messages' => array(
				array(
					'From' => array(
						'Email' => "encuestas.upc@gaf.com.pe",
						'Name' => "UPC - IEVocacional"
					),
					'To' => array(
						array(
							'Email' => $alumno[0]->email,
							'Name' => $nombres
						)
					),
					'Subject' => "Resultado Instrumento de Exploración Vocacional UPC",
					'TextPart' => "UPC",
					'HTMLPart' => $mailContent,
					'CustomID' => "AppGettingStartedTest",
					'Attachments' => array(
						array(
							'ContentType' => "application/pdf",
							'Filename' => $nombres.".pdf",
							'Base64Content' => base64_encode($attachment)
						)
					)
				)
			)
		);

		$response = $mj->post(Resources::$Email, array('body' => $body));
		return $response->success();
	}

	public function createpdf($id, $vista = 'D'){
		$alumno = $this->carreras_model->getAlumnoById($id);
		$carreras = $this->carreras_model->getCarreraLast($id);
		$carrera = $this->carreras_model->getCarreraById($carreras[0]->carrera_id);
		$carrera1 = $this->carreras_model->getCarreraById($carreras[1]->carrera_id);
		$carrera2 = $this->carreras_model->getCarreraById($carreras[2]->carrera_id);
		$nombres = $alumno[0]->nombre . ' ' . $alumno[0]->apellido;
		$data['alumno'] = $nombres;
		$data['carrera'] = $carrera;
		$data['carrera1'] = $carrera1;
		$data['carrera2'] = $carrera2;

		$this->load->library(array('Pdf'));
		$pdf = new Pdf('P','mm','A4');
		$pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor('OdLir Gomez');
		$pdf->SetTitle('Instrumento de Exploración Vocacional (IEV)');

		$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE . ' 001', PDF_HEADER_STRING, array(0, 64, 255), array(0, 64, 128));
		$pdf->setFooterData($tc = array(0, 64, 0), $lc = array(0, 64, 128));

		$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
		$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

		$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

		$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
		$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
		$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
		$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
		$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
		$pdf->setFontSubsetting(true);
		$pdf->SetFont('Helvetica', '', 12, '', true);
		$pdf->Open();
		$pdf->AddPage();

		$pdf->SetFont('helvetica', 'b', 14);
		$pdf->setLineWidth(14);
		$pdf->Text(55,35,'Instrumento de Exploración Vocacional (IEV)',FALSE,FALSE,TRUE,0,0,'L');

		$pdf->SetFont('helvetica', 'b', 12);
		$pdf->setLineWidth(14);
		$pdf->Text(35,55,'Nombre de postulante: '.$alumno[0]->nombre.' '.$alumno[0]->apellido ,FALSE,FALSE,TRUE,0,0,'L');
		$pdf->Text(35,65,'Fecha de evaluación: '. date("d-m-Y", strtotime($alumno[0]->fecha_reg)),FALSE,FALSE,TRUE,0,0,'L');

		$pdf->Text(35,70,'______________________________________________________________',FALSE,FALSE,TRUE,0,0,'L');

		$pdf->SetFont('helvetica', '', 10);
		$pdf->setLineWidth(14);
		$pdf->Text(35,80,'Los resultados obtenidos en el Instrumento de Exploración Vocacional, nos llevan a',FALSE,FALSE,TRUE,0,0,'L');
		$pdf->Text(35,85,'recomendarte las siguientes profesiones que potenciarán tu talento:',FALSE,FALSE,TRUE,0,0,'L');

		$mailContent = $this->load->view('mail', $data , TRUE);
		$pdf->writeHTMLCell(140,'','35','65', $mailContent,'','','','','','');

		if($vista == 'S'){
			return $pdf->Output($nombres.'.pdf', 'S');
		}else{
			$pdf->Output($nombres.'.pdf', 'D');
		}

	}

}
















