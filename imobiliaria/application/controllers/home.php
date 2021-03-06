<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
class Home extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
	}
	
	public function index(){		
                $this->load->helper('text'); 
		$data['categorias'] = $this->db->get('categorias')->result();
		
		$this->db->order_by('id_imovel','random');
		$this->db->where('in_destaque', 1);            
                $data['destaques'] = $this->db->get('imoveis', 5)->result(); 
            
                $this->db->select('categorias.desc_categoria, bairros.nome, imoveis.*');
		$this->db->from('imoveis');
		$this->db->join('categorias', 'categorias.id_categoria = imoveis.categoria');		
                $this->db->join('bairros',    'bairros.id_bairro       = imoveis.id_bairro');		
					
                $this->db->order_by('id_imovel','random');
		$this->db->where('in_oportunidade', 1);            
                $data['oportunidade'] = $this->db->get()->result();
                
		$this->load->view('html_header');
		$this->load->view('cabecalho');
		$this->load->view('menu_categorias' , $data);
		$this->load->view('conteudo', $data);
		$this->load->view('rodape');
		$this->load->view('html_footer');
	}
        
        public function sobre() {
            $this->load->view('html_header');
            $this->load->view('cabecalho');
            $this->load->view('sobre');
            $this->load->view('rodape');
            $this->load->view('html_footer');
        }
                
}