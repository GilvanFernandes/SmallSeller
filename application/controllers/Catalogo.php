<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Catalogo extends CI_Controller {


    public function __construct(){
        parent::__construct();

        $this->load->model('catalogo_model');
    }


	public function index($bRetorno = FALSE){

		// Carrega os model com dados para foreach
		$aData['rsProdutosDia']             = $this->catalogo_model->getDoDia();
		$aData['rsProdutosDiasAnteriores']  = $this->catalogo_model->getDoDiaAnteriores();

		// Carrega o design e com envio dos dados via variável $aData
		$this->load->view('template_header');
		$this->load->view('catalogo', $aData);
		$this->load->view('template_footer');

	}

	public function admProdutos($bRetorno = FALSE){

		$aData = array();

		if($bRetorno){
			$aData['sRetorno'] = 'Enviado com Sucesso!';
		}

		$aData['rsProdutos'] = $this->catalogo_model->getProduto();
		$aData['rsProdutosDoDia'] = $this->catalogo_model->getProdutoDoDia();

		$this->load->view('template_header');
		$this->load->view('adm_produto',$aData);
		$this->load->view('template_footer');

	}


	public function admProdutosCriar(){

		$aData = array();

		$config['upload_path']   = './upload/produtos/';
		$config['allowed_types'] = 'jpeg|jpg|png';
		$config['max_size']      = 1000;
		$config['max_width']     = 1024;
		$config['max_height']    = 768;

		$this->load->library('upload', $config);

		$this->form_validation->set_rules('nomepro', 'nome do produto', 'required|min_length[3]|max_length[40]');

		if ($this->form_validation->run() === FALSE || !$this->upload->do_upload('foto')){

			$aData['rsProdutos'] = $this->catalogo_model->getProduto();

			$aData['error'] = $this->upload->display_errors();
			$this->load->view('template_header');
			$this->load->view('adm_produto', $aData);
			$this->load->view('template_footer');

		}else{

			$this->catalogo_model->setProduto();
			return $this->admProdutos(TRUE);

		}
	}

	public function admProdutosDoDiaCriar(){

		$aData = array();

		$this->form_validation->set_rules('idproduto', 'ID do Produto', 'required|integer');
		$this->form_validation->set_rules('valor', 'valor', 'required|decimal');
		$this->form_validation->set_rules('quantidade', 'quantidade', 'required|integer');
		$this->form_validation->set_rules('dia', 'data de venda', 'required|min_length[9]|max_length[10]');

		if ($this->form_validation->run() === FALSE){

			$aData['rsProdutosDoDia'] = $this->catalogo_model->getProdutoDoDia();
			$aData['rsProdutos']      = $this->catalogo_model->getProduto();

			$this->load->view('template_header');
			$this->load->view('adm_produto', $aData);
			$this->load->view('template_footer');

		}else{

			$this->catalogo_model->setProdutoDoDia();
			return $this->admProdutos(TRUE);

		}
	}


	public function admProdutosAlterar(){
		$this->catalogo_model->setAtualizarProduto($this->uri->segment(3));
		return $this->admProdutos(TRUE);
	}


	public function admProdutosDoDiaAlterar(){
		$this->catalogo_model->setAtualizarProdutoDoDia($this->uri->segment(3));
		return $this->admProdutos(TRUE);
	}

	public function admUsuario($bRetorno = FALSE){

		if($bRetorno){
			$aData['sRetorno'] = 'Criado com Sucesso!';
		}

		$aData['rsClientes'] = $this->catalogo_model->getUsuario(TRUE);

		$this->load->view('template_header');
		$this->load->view('adm_usuario', $aData);
		$this->load->view('template_footer');

	}

	public function admUsuarioCriar($bRetorno = FALSE){

		$this->form_validation->set_rules('nome',  'nome',  'required|min_length[5]|max_length[45]');
		$this->form_validation->set_rules('email',  'email',  'required|valid_email|min_length[5]|max_length[45]');
		$this->form_validation->set_rules('senha', 'senha', 'trim|required');
		$this->form_validation->set_rules('tipo',  'tipo',  'trim|integer');

		if ($this->form_validation->run() === FALSE){

			$aData['rsClientes'] = $this->catalogo_model->getUsuario(TRUE);

			// Carrega o design e com envio dos dados via variável $aData
			$this->load->view('template_header');
			$this->load->view('adm_usuario',$aData);
			$this->load->view('template_footer');

		}else{
			$this->catalogo_model->setUsuario();
			return $this->admUsuario(TRUE);
		}
	}

	public function admLerContato(){

		$aData['rsMensagem'] = $this->catalogo_model->getContato();

		// Carrega o design e com envio dos dados via variável $aData
		$this->load->view('template_header');
		$this->load->view('adm_contato',$aData);
		$this->load->view('template_footer');

	}

	public function admVenda($bRetorno = FALSE, $sRetorno = ''){


		if(trim($sRetorno) != '' && $bRetorno == FALSE){
			$aData['sRetorno'] = $sRetorno;
		}

		if($bRetorno){
			$aData['sRetorno'] = 'Enviado com Sucesso!';
		}

		$aData['rsProdutosDia']     = $this->catalogo_model->getProdutoDoDia(TRUE, TRUE);
		$aData['rsClientes']        = $this->catalogo_model->getUsuario(TRUE);
		$aData['rsVendasDoDiaHoje'] = $this->catalogo_model->getVendas(TRUE);
		$aData['rsVendasGeral']     = $this->catalogo_model->getVendas();

		$this->load->view('template_header');
		$this->load->view('adm_venda',$aData);
		$this->load->view('template_footer');

	}

	public function admVendaCriar(){

		$aData = array();

		$this->form_validation->set_rules('idprodutov', 'ID do Produto', 'required|integer');
		$this->form_validation->set_rules('idclientev', 'ID do Cliente', 'required|integer');
		$this->form_validation->set_rules('quantidadev', 'Quantidade Vendida', 'required|integer');

		if ($this->form_validation->run() === FALSE){

			$aData['rsProdutosDia'] = $this->catalogo_model->getProdutoDoDia(TRUE,TRUE);
			$aData['rsClientes'] = $this->catalogo_model->getUsuario(TRUE);

			// Carrega o design e com envio dos dados via variável $aData
			$this->load->view('template_header');
			$this->load->view('adm_venda',$aData);
			$this->load->view('template_footer');

		}else{

			if(!$this->catalogo_model->setVenda()){
				$this->admVenda(FALSE, 'Não foi possível efetuar venda, verificar a quantidade sendo informada.');
			}else{
				$this->admVenda(TRUE);
			}


		}
	}




	public function contato($bRetorno = FALSE){

		$aData = array();

		if($bRetorno){
			$aData['sRetorno'] = 'Enviado com Sucesso!';
		}

		// Carrega o design e com envio dos dados via variável $aData
		$this->load->view('template_header');
		$this->load->view('contato',$aData);
		$this->load->view('template_footer');

	}

	public function contatoCriar(){

		$aData = array();

		$this->form_validation->set_rules('nome', 'nome', 'required|min_length[5]|max_length[45]');
		$this->form_validation->set_rules('email', 'email', 'trim|required|valid_email');
		$this->form_validation->set_rules('mensagem', 'mensagem', 'required');

		if ($this->form_validation->run() === FALSE){

			// Carrega o design e com envio dos dados via variável $aData
			$this->load->view('template_header');
			$this->load->view('contato',$aData);
			$this->load->view('template_footer');

		}else{

			$this->catalogo_model->setContato();
			$this->contato(TRUE);

		}

	}
}
