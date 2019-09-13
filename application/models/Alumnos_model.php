<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Alumnos_model extends CI_Model{

	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function getAlumnos($search){
		$this->db->select('*');
		$this->db->order_by('id', 'desc');
		if ($search != ''){
			$this->db->or_like('nombre', $search);
			$this->db->or_like('apellido', $search);
			$this->db->or_like('email', $search);
			$this->db->or_like('colegio', $search);
			$this->db->or_like('dni', $search);
		}
		$query = $this->db->get('alumnos');
		return $query->result();
	}

	function getAlumnos1($start, $length, $search){
		$this->db->select('*');
		$this->db->order_by('id', 'desc');
		$this->db->limit($start, $length);
		if ($search != ''){
			$this->db->or_like('nombre', $search);
			$this->db->or_like('apellido', $search);
			$this->db->or_like('email', $search);
			$this->db->or_like('colegio', $search);
			$this->db->or_like('dni', $search);
		}
		$query = $this->db->get('alumnos');
		return $query->result();
	}

	function getCarreras($id){
		$query = $this->db->where('alumno_id', $id)->get('carrera_final');
		return $query->result();
	}


}
