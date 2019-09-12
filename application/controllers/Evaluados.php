<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require 'vendor/autoload.php';
use \Mailjet\Resources;

class Evaluados extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('alumnos_model');
	}

	public function listar(){
		$year = (int)date("Y");
		$years = array();
		for ($x=$year-2; $x <= $year+2; $x++){
			$years[] = $x;
		}
		$data['titulo'] = 'UPC';
		$data['years'] = $years;
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

}
















