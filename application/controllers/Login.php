<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('login_model');
    }

    public function index(){
        $this->load->view('template_header');
        $this->load->view('login');
        $this->load->view('template_footer');
    }

    public function validacao(){

        $this->form_validation->set_rules('email', 'E-mail', 'required');
        $this->form_validation->set_rules('senha', 'Senha', 'required');

        if ($this->form_validation->run() === FALSE){

            $this->load->view('template_header');
            $this->load->view('login');
            $this->load->view('template_footer');

        }else{

            $aData = $this->login_model->getValidacao();

            $cont = $aData;

            if(count($cont) == 1){

                foreach ($aData as $aPessoa) {
                     $aDadosSessao = array('id_usuario'  => $aPessoa->id,
                                            'nome'       => $aPessoa->nome_completo,
                                            'email'      => $aPessoa->email,
                                            'logado'     => TRUE);
                }

                $this->session->set_userdata($aDadosSessao);

                redirect('catalogo');

            }else{
                redirect('login');
            }
        }
    }

    public function deslogar(){
        $this->session->sess_destroy();
        redirect(base_url());
    }

}
