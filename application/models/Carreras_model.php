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

}
