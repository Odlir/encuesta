<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Carreras_model extends CI_Model{

	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function getCarreras(){
		$query = $this->db->where('estado', '1')->get('carreras');
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

	function getAlumnoById($id){
		$query = $this->db->where('id', $id)->get('alumnos');
		return $query->result();
	}

	function getCarreraById($id){
		$query = $this->db->where('id', $id)->get('carreras');
		return $query->result();
	}

	function getUbigeo(){
		$query = $this->db->get('ubigeo');
		return $query->result();
	}

	function insertarOpciones($arr){
		$query = $this->db->insert_batch('carreras_seleccionadas', $arr);
		return $query;
	}

	function deleteOptiones($id){
		$this->db->delete('carreras_seleccionadas', array('id_alumno' => $id));
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

	function insertAlumno($obj){
		$this->db->insert('alumnos', $obj);
		return $this->db->insert_id();
	}

	function insertCarreraFinal($al, $caID, $caID1, $caID2){
		$this->db->insert('carrera_final', array("alumno_id" => $al, "carrera_id" => $caID));
		$this->db->insert('carrera_final', array("alumno_id" => $al, "carrera_id" => $caID1));
		$this->db->insert('carrera_final', array("alumno_id" => $al, "carrera_id" => $caID2));
		return $this->db->insert_id();
	}

	function deleteLastoptions($id){
		$this->db->delete('carrera_final', array('alumno_id' => $id));
	}

	function getCarreraLast($id){
		$this->db->join('carreras','carreras.id = carrera_final.carrera_id');
		$query = $this->db->where('alumno_id', $id)->get('carrera_final');
		return $query->result();
	}

}
