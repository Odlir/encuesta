<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Alumnos_model extends CI_Model{

	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function getAlumnos($s, $o, $start, $length){
		$this->db->select('*');
		if (!empty($s)){
			$this->db->like('nombre', $s);
			$this->db->like('apellido', $s);
			$this->db->like('colegio', $s);
			$this->db->like('email', $s);
			$this->db->like('dni', $s);
		}
		$this->db->order_by($o['column'], $o['dir']);
		$this->db->limit($start, $length);
		$query = $this->db->get('alumnos1');
		return $query->result();
	}

}
