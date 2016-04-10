<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
class Categorias extends CI_Controller {
	
	public function __construct(){
		parent::__construct();			
		if(!$this->session->userdata('session_id') || !$this->session->userdata('logado')){
			redirect(base_url()."administracao/home");
		}
	}
	
	public function index($pagina=null){

		$this->load->library('pagination');
		$this->load->library('table');
				
		$mostrar_por_pagina = 3;	
		$data['categorias'] = $this->db->get('categorias',$mostrar_por_pagina,$pagina)->result();	
		
		$this->db->select('count(*) as total');
		$this->db->from('categorias');		
		$numero_itens_categoria = $this->db->get()->result();		
		 		
		$config['base_url']   = base_url("administracao/categorias");
		$config['total_rows'] = $numero_itens_categoria[0]->total;
		$config['per_page']   = $mostrar_por_pagina;
		$config['uri_segment']     = 3;		
		$config['first_link'] = 'Primeiro';
		$config['last_link'] = 'Ultimo';
		$this->pagination->initialize($config);		
		$data['paginacao'] = $this->pagination->create_links();	
	
		$this->load->view('administracao/html_header');
		$this->load->view('administracao/menu');
		$this->load->view('administracao/categorias',$data);
		$this->load->view('administracao/html_footer');
	}
	
	public function cadastrar($dados=null){
		$this->load->view('administracao/html_header');
		$this->load->view('administracao/menu');
		$this->load->view('administracao/cadastrar_categoria');
		$this->load->view('administracao/html_footer');
	}
		
	public function salvar_inclusao(){
		
		$this->load->library('form_validation');
		$this->form_validation->set_rules('categoria', 'Categoria', 'required');
		$this->form_validation->set_rules('slug_categoria', 'Slug', 'required');
		if($this->form_validation->run() == FALSE)
		{
			$this->cadastrar();			
		}
		else
		{
			$data['categoria'] = $this->input->post('categoria');
			$data['desc_categoria'] = $this->input->post('slug_categoria');
			$sql = $this->db->insert('categorias',$data);
			redirect(base_url()."administracao/categorias/1");
		}
	}
	
	public function editar($id){
		$this->db->where('id_categoria',$id);
		$data['categorias'] = $this->db->get('categorias')->result();
		$this->load->view('administracao/html_header');
		$this->load->view('administracao/menu');
		$this->load->view('administracao/editar_categoria',$data);
		$this->load->view('administracao/html_footer');
	}
	
	public function salvar_alteracao(){		
		$id = $this->input->post('id_categoria');				
		$this->load->library('form_validation');
		$this->form_validation->set_rules('categoria', 'Categoria', 'required');
		$this->form_validation->set_rules('slug_categoria', 'Slug', 'required');
		if($this->form_validation->run() == FALSE)
		{			
			$this->editar($id);
		}
		else
		{
			$data['categoria'] = $this->input->post('categoria');
			$data['desc_categoria'] = $this->input->post('slug_categoria');
			$this->db->where('id_categoria',$id);
			$this->db->update('categorias',$data);
			redirect(base_url()."administracao/categorias/1");
		}
	}
	
	function excluir($id){
		$this->db->where('id_categoria',$id);
		$this->db->delete('categorias');
		redirect(base_url()."administracao/categorias/1");
	}
}