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

	public function saveOptions(){
		$datos = $this->input->post('data');
		$alumno = $this->input->post('alumno');
		foreach ($datos as $i =>$val){
			$objeto = new stdClass();
			$objeto->id_alumno = $alumno;
			$objeto->carrera_id = $val;
			$arr[$i] = $objeto;
		}
		$res = $this->carreras_model->insertarOpciones($arr);
		echo json_encode(array('res'=>$res));
	}

	public function stepTwo($id){
		$data['preguntas'] = $this->carreras_model->getQuestions();
		$data['carreras'] = $this->carreras_model->getOpciones($id);
		$this->load->view('stepTwo', $data);
	}

	public function stepThree(){
		$dts = $this->input->post('carrera');
		$id = explode('_', $dts);
		$data['carrera'] = $this->carreras_model->getCarreraById($id[1]);
		$this->load->view('stepThree', $data);
	}

}
