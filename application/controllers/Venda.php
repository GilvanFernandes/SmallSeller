<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Venda extends CI_Controller {


    public function __construct(){
        parent::__construct();

        $this->load->model('venda_model');
    }


	public function index(){

		$this->load->view('template_header');
		$this->load->view('venda');
		$this->load->view('template_footer');

	}
}
