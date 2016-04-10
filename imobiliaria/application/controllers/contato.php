<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Contato extends CI_Controller {
		
	public function __construct(){
		parent::__construct();
		$this->load->helper('form');
	}
	
	public function index(){
					
		$dados_header = array(
			'titulo' => 'Alexandre Monteiro ImÃ³veis - Fale Conosco',
			'descricao' => 'Fale conosco.',
			'palavras_chave' => 'Contato, fale conosco, atendimento'	
		);
		$dados_cabecalho = array('titulo_h2' => 'Fale Conosco');	
						
      	       $this->load->view('html_header');
		$this->load->view('cabecalho');
		$this->load->view('contato');
		$this->load->view('rodape');
		$this->load->view('html_footer');
	}
	
	public function enviar() {
		
		$this->load->library('form_validation');		
		
		$this->form_validation->set_rules('nome', 'Nome', 'required');
		$this->form_validation->set_rules('email', 'E-mail', 'required|valid_email');		
		$this->form_validation->set_rules('mensagem', 'Mensagem', 'required');
			
		if ($this->form_validation->run() == FALSE){
			$this->index();
		}
		else{			
			$dados['nome']     = $this->input->post('nome');
			$dados['email']    = $this->input->post('email');
			$dados['mensagem'] = $this->input->post('mensagem');
			
			$mensagem = $this->load->view('mensagem',$dados,TRUE);			
			
			$this->load->library('email');
			$this->email->set_newline("\r\n");
			$this->email->initialize();
			//$this->email->from($this->input->post('email'), $this->input->post('nome'));
                        $this->email->from('admin@dsw3.com.br', 'Contato Imobiliaria');
			$this->email->to('admin@dsw3.com.br'); 

			$this->email->subject('Mensagem encaminhada pelo website por:' . $this->input->post('nome'));
			$this->email->message($mensagem);

			if($this->email->send()){
				$this->sucesso();
			}
			else {
				$this->falha();		
	               }			
		}
	}

	public function sucesso(){		
		$dados_header = array(
			'titulo' => 'Alexandre Monteiro Imoveis - Mensagem encaminhada com sucesso',
			'descricao' => 'Fale conosco.',
			'palavras_chave' => 'Contato, fale conosco, atendimento'	
		);
		$dados_cabecalho               = array('titulo_h2' => 'Obrigado pelo contato. Retornaremos sua mensagem em breve.');		
								
      	        $this->load->view('html_header');
		$this->load->view('cabecalho');
		$this->load->view('contato_sucesso');
		$this->load->view('rodape');
		$this->load->view('html_footer');
	}
	
	public function falha(){		
		$dados_header = array(
			'titulo' => 'Alexandre Monteiro Imoveis - Fale Conosco',
			'descricao' => 'Fale conosco.',
			'palavras_chave' => 'Contato, fale conosco, atendimento'	
		);
		
		$dados_cabecalho               = array('titulo_h2' => 'Desculpe...');
		
						
		$this->load->view('html_header');
		$this->load->view('cabecalho');
		$this->load->view('contato_falha');
		$this->load->view('rodape');
		$this->load->view('html_footer');		

	}
}