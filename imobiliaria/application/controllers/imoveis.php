<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
class Imoveis extends CI_Controller {

    public function __construct(){
        parent::__construct();
    }

    public function index() {
        
    }
       
    public function buscar() {
        
        // Busca imovel pela categoria.
        $data['categorias'] = $this->db->get('categorias')->result();
        
        $this->load->view('html_header');
        $this->load->view('cabecalho');
        $this->load->view('menu_categorias' , $data);
        $this->load->view('imoveis');
        $this->load->view('rodape');
        $this->load->view('html_footer');
    }
    
    public function consultar_detalhe_imovel($id_imovel){

        // Busca imovel pela categoria.
        $data['categorias'] = $this->db->get('categorias')->result();

        // Busca imovel pelo id.
        $this->db->select('categorias.desc_categoria, bairros.nome as nome_bairro, cidades.nome as nome_cidade, imoveis.*');
        $this->db->from('imoveis');
        $this->db->join('categorias', 'categorias.id_categoria = imoveis.categoria');		
        $this->db->join('bairros',    'bairros.id_bairro       = imoveis.id_bairro');		
        $this->db->join('cidades',    'cidades.id_cidade       = imoveis.id_cidade');		
        $this->db->where('id_imovel', $id_imovel);

        $data['imovel'] = $this->db->get()->result();

         // Busca fotos do imovel pelo id.
        $this->db->where('id_imovel', $id_imovel);
        $data['fotos'] = $this->db->get('imoveis_fotos')->result();
        
        //Carregando as views.
        $this->load->view('html_header');
        $this->load->view('cabecalho');
        $this->load->view('imovel_detalhe', $data);
        $this->load->view('rodape');
        $this->load->view('html_footer');
    }

    public function consultar_por_categoria($id_categoria) {

        //Recebendo os dados das categoias.
        $data['categorias'] = $this->db->get('categorias')->result();

        //Recebendo os dados da receita.        
        $this->db->select('categorias.desc_categoria, bairros.nome, imoveis.*');
        $this->db->from('imoveis');
        $this->db->join('categorias', 'categorias.id_categoria = imoveis.categoria');		
        $this->db->join('bairros',    'bairros.id_bairro       = imoveis.id_bairro');		
        $this->db->where('imoveis.categoria',$id_categoria);  					
        $this->db->order_by('id_imovel','random');
        $data['imoveis'] = $this->db->get()->result();
        
        //Carregando as views.
        $this->load->view('html_header');
        $this->load->view('cabecalho');
        $this->load->view('menu_categorias' , $data);
        $this->load->view('imoveis_por_categoria', $data);
        $this->load->view('rodape');
        $this->load->view('html_footer');
    }
    
    public function agendar_visita($id_imovel) {
        
        // Busca imovel pela categoria.
        $data['categorias'] = $this->db->get('categorias')->result();

        // Busca imovel pelo id.
        $this->db->select('categorias.desc_categoria, bairros.nome as nome_bairro, cidades.nome as nome_cidade, imoveis.*');
        $this->db->from('imoveis');
        $this->db->join('categorias', 'categorias.id_categoria = imoveis.categoria');		
        $this->db->join('bairros',    'bairros.id_bairro       = imoveis.id_bairro');		
        $this->db->join('cidades',    'cidades.id_cidade       = imoveis.id_cidade');		
        $this->db->where('id_imovel', $id_imovel);

        $data['imovel'] = $this->db->get()->result();
        
        //Carregando as views.
        $this->load->view('html_header');
        $this->load->view('cabecalho');
        $this->load->view('agendar_visita', $data);
        $this->load->view('rodape');
        $this->load->view('html_footer');
        
    }
}