<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
class Usuarios extends CI_Controller {
	
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
		$data['usuarios'] = $this->db->get('usuarios',$mostrar_por_pagina,$pagina)->result();	
		
		$this->db->select('count(*) as total');
		$this->db->from('usuarios');		
		$numero_itens = $this->db->get()->result();		
		 		
		$config['base_url']   = base_url("administracao/usuarios");
		$config['total_rows'] = $numero_itens[0]->total;
		$config['per_page']   = $mostrar_por_pagina;
		$config['uri_segment']     = 3;		
		$config['first_link'] = 'Primeiro';
		$config['last_link'] = 'Ultimo';
		$this->pagination->initialize($config);		
		$data['paginacao'] = $this->pagination->create_links();	
		
		$this->load->view('administracao/html_header');
		$this->load->view('administracao/menu');
		$this->load->view('administracao/usuarios',$data);
		$this->load->view('administracao/html_footer');
	}
	
	public function adicionar(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('usuario', 'Usuário', 'required');
		$this->form_validation->set_rules('senha', 'Senha', 'required');
		if($this->form_validation->run() == FALSE)
		{
			$this->index();
		}
		else
		{
			$data['usuario'] = $this->input->post('usuario');
			$data['senha'] = $this->input->post('senha');
		    $data['ativo'] = 1;
			$this->db->insert('usuarios',$data);
		
			redirect(base_url()."administracao/usuarios");
		}
	}
	
	public function editar($id){
		$this->db->where('id_usuario',$id);
		$data['usuarios'] = $this->db->get('usuarios')->result();
		$this->load->view('administracao/html_header');
		$this->load->view('administracao/menu');
		$this->load->view('administracao/editar_usuario',$data);
		$this->load->view('administracao/html_footer');
	}
	
	public function salvar_alteracao(){		
		$id = $this->input->post('id_usuario');				
		$this->load->library('form_validation');
		$this->form_validation->set_rules('usuario', 'Nome do usuário', 'required');
		$this->form_validation->set_rules('senha', 'Senha do usuário', 'required');
		if($this->form_validation->run() == FALSE)
		{			
			$this->editar($id);
		}
		else
		{
			$data['usuario'] = $this->input->post('usuario');
			$data['senha']   = $this->input->post('senha');
			$this->db->where('id_usuario',$id);
			$this->db->update('usuarios',$data);
			redirect(base_url()."administracao/usuarios");
		}
	}
	
	function excluir($id){
		$this->db->where('id_usuario',$id);
		$this->db->delete('usuarios');
		redirect(base_url()."administracao/usuarios");
	}
}