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
		$mas        = $this->input->post('mas');
		$intermedio = $this->input->post('intermedio');
		$menos      = $this->input->post('menos');

		$arrayMas           = explode(',', $mas);
		$arrayIntermedio    = explode(',', $intermedio);
		$arrayMenos         = explode(',', $menos);

		$res = array_merge($arrayMas, $arrayIntermedio, $arrayMenos);
		$result = $this->carreras_model->getFullCarreras($res);

		$data['carreras'] = $result;
		$data['total'] = count($result);
		$data['mas'] = $arrayMas;
		$data['intermedio'] = $arrayIntermedio;
		$data['menos'] = $arrayMenos;
		$this->load->view('stepOne',$data);
	}

	public function stepTwo(){
		$datos = $this->input->post('data');
		$data['carreras'] = $this->carreras_model->getCarrerasById($datos);
		$this->load->view('stepTwo',$data);
	}

}
