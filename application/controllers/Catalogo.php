<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Catalogo extends CI_Controller {

	public function index(){
		$this->load->view('template_header');
		$this->load->view('catalogo');
		$this->load->view('template_footer');
	}
}
