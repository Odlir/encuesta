<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Carreras_model extends CI_Model{

	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function getCarreras($id){
		$query = $this->db->where('area_id', $id)->where('estado', '1')->get('carreras');
		return $query->result();
	}

	function getFullCarreras($arr){
		$query = $this->db->where_in('descripcion', $arr)->get('carreras');
		return $query->result();
	}

	function getCarrerasById($arr){
		$query = $this->db->where_in('id', $arr)->get('carreras');
		return $query->result();
	}

	function getCarreraById($id){
		$query = $this->db->where('id', $id)->get('carreras');
		return $query->result();
	}

	function insertarOpciones($arr){
		$query = $this->db->insert_batch('carreras_seleccionadas', $arr);
		return $query;
	}

	function getOpciones($id){
		$this->db->join('carreras', 'carreras.id = carreras_seleccionadas.carrera_id', 'left');
		$query = $this->db->where_in('id_alumno', $id)->get('carreras_seleccionadas');
		return $query->result();
	}

	function getQuestions(){
		$query = $this->db->get('preguntas');
		return $query->result();
	}

}
