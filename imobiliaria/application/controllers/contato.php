<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Contato extends CI_Controller {
		
	public function __construct(){
		parent::__construct();
		$this->load->helper('form');
	}
	
	public function index(){
					
		$dados_header = array(
			'titulo' => 'DSW3 Imoveis - Fale Conosco',
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
                        
                        $config["protocol"] = "smtp";
                        $config["smtp_host"] = "ssl://smtp.gmail.com";
                        $config["smtp_user"] = "fdesiqueira.ti@gmail.com";
                        $config["smtp_pass"] = "fe150112";
                        $config["charset"] = "utf-8";
                        $config["mailtype"] = "html";
                        $config["newline"] = "\r\n";
                        $config["smtp_port"] = '465';
                        
                        $this->email->initialize($config);
			
                        $this->email->set_newline("\r\n");
			
                        $this->email->from('admin@dsw3.com.br', 'Contato Imobiliaria');
			$this->email->to('dsw3.imoveis@gmail.com'); 
			$this->email->subject('DSW3 Imoveis - Contato feito por:' . $this->input->post('nome'));
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
			'titulo' => 'DSW3 Imoveis - Mensagem encaminhada com sucesso',
			'descricao' => 'Fale conosco.',
			'palavras_chave' => 'Contato, fale conosco, atendimento'	
		);
		$dados["mensagem"] = 'Sua mensagem foi enviada com sucesso. Em breve entraremos em contato.';		
								
      	        $this->load->view('html_header');
		$this->load->view('cabecalho');
		$this->load->view('contato_sucesso',  $dados);
		$this->load->view('rodape');
		$this->load->view('html_footer');
	}
	
	public function falha(){		
		$dados_header = array(
			'titulo' => 'DSW3 Imoveis - Fale Conosco',
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