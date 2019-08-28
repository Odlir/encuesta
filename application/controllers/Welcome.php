<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('carreras_model');
	}

	public function index(){
		$data['titulo'] = 'UPC';
		$this->load->view('welcome_message', $data);
	}

	public function validar(){
		echo json_encode(array('result' => true));
	}

	public function test(){
		$data['Chestter'] = 4;
		$this->load->view('encuesta',$data);
	}

	public function getCarreras($id){
		$data['carreras'] = $this->carreras_model->getCarreras($id);
		$this->load->view('carrusel',$data);
	}

	public function stepOne(){
		$data['carreras'] = 'odlir';
		$this->load->view('stepOne',$data);
	}

}
