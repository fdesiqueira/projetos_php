<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
class Clientes extends CI_Controller {
	
	public function __construct(){
		parent::__construct();			
		if(!$this->session->userdata('session_id') || !$this->session->userdata('logado')){
			redirect(base_url()."administracao/home");
		}
	}
	
	public function index($pagina=null){
		$this->load->library('table');
		$this->load->library('pagination');
				
		$mostrar_por_pagina = 3;	
		$data['clientes'] = $this->db->get('clientes',$mostrar_por_pagina,$pagina)->result();	
		
		$this->db->select('count(*) as total');
		$this->db->from('clientes');		
		$numero_itens = $this->db->get()->result();		
		 		
		$config['base_url']   = base_url("administracao/clientes");
		$config['total_rows'] = $numero_itens[0]->total;
		$config['per_page']   = $mostrar_por_pagina;
		$config['uri_segment']     = 3;		
		$config['first_link'] = 'Primeiro';
		$config['last_link'] = 'Ultimo';
		$this->pagination->initialize($config);		
		$data['paginacao'] = $this->pagination->create_links();	
		
		
		$data['cidades']    = $this->db->get('cidades')->result();
		$data['bairros']    = $this->db->get('bairros')->result();
		
		$this->load->view('administracao/html_header');
		$this->load->view('administracao/menu');
		$this->load->view('administracao/clientes',$data);
		$this->load->view('administracao/html_footer');
	}
	
	public function cadastrar($param=null){
		
		$dados['cidades']    = $this->db->get('cidades')->result();
		$dados['bairros']    = $this->db->get('bairros')->result();
		
		$this->load->view('administracao/html_header');
		$this->load->view('administracao/menu');
		$this->load->view('administracao/cadastrar_cliente', $dados);
		$this->load->view('administracao/html_footer');
	}
	
	public function salvar_inclusao(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nome', 'Nome do Cliente', 'required');
		$this->form_validation->set_rules('cpf',  'CPF do Cliente',  'required');
		if($this->form_validation->run() == FALSE)
		{
			$this->cadastrar();
		}
		else
		{
			$data['nome']       = $this->input->post('nome');
			$data['telefone']   = $this->input->post('telefone');
			$data['celular']    = $this->input->post('celular');
			$data['email']      = $this->input->post('email');
			$data['logradouro'] = $this->input->post('logradouro');
			$data['numero']     = $this->input->post('numero');
			$data['id_bairro']  = $this->input->post('id_bairro');
			$data['cep']        = $this->input->post('cep');
			$data['id_cidade']  = $this->input->post('id_cidade');
			$data['cpf']        = $this->input->post('cpf');
			$this->db->insert('clientes',$data);
			redirect(base_url()."administracao/clientes/1");
		}
	}
	
	public function editar($id){
		$this->db->where('id_cliente',$id);
		$data['clientes'] = $this->db->get('clientes')->result();
		$data['cidades']    = $this->db->get('cidades')->result();
		$data['bairros']    = $this->db->get('bairros')->result();
	
		$this->load->view('administracao/html_header');
		$this->load->view('administracao/menu');
		$this->load->view('administracao/editar_cliente',$data);
		$this->load->view('administracao/html_footer');
	}
	
	public function salvar_alteracao(){		
		$id = $this->input->post('id_cliente');				
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nome', 'Nome do Cliente', 'required');
		$this->form_validation->set_rules('cpf', 'CPF do Cliente', 'required');
		if($this->form_validation->run() == FALSE)
		{			
			$this->editar($id);
		}
		else
		{
			$data['nome']       = $this->input->post('nome');
			$data['telefone']   = $this->input->post('telefone');
			$data['celular']    = $this->input->post('celular');
			$data['email']      = $this->input->post('email');
			$data['logradouro'] = $this->input->post('logradouro');
			$data['numero']     = $this->input->post('numero');
			$data['id_bairro']     = $this->input->post('id_bairro');
			$data['cep']        = $this->input->post('cep');
			$data['id_cidade']     = $this->input->post('id_cidade');
			$data['cpf']        = $this->input->post('cpf');
			$this->db->where('id_cliente',$id);
			$this->db->update('clientes',$data);
			redirect(base_url()."administracao/clientes/1");
		}
	}
	
	function excluir($id){
		$this->db->where('id_cliente',$id);
		$this->db->delete('clientes');
		redirect(base_url()."administracao/clientes/1");
	}
}