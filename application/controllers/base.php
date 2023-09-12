<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Base extends CI_Controller {

	public function index()
	{
		/*
		$lista=$this->medicion_model->listamediciones;
		$data['mediciones']=$lista;
		*/
		$this->load->view('inicio');
	}
	public function resumen()
	{
		$this->load->view('resumen');
	}
	public function objetivo()
	{
		$this->load->view('objetivo');
	}

	/*
	public function pruebabd()
	{
		$query=$this->db->get('mediciones');
		$execonsulta=$query->result();
		print_r($execonsulta);
	}
	*/
}
