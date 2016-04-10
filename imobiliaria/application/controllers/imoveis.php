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
        $this->db->where('id_imovel', $id_imovel);
        $data['imovel'] = $this->db->get('imoveis')->result();

         // Busca fotos do imovel pelo id.
        $this->db->where('id_imovel', $id_imovel);
        $data['fotos'] = $this->db->get('imoveis_fotos')->result();
        //print_r($data2);
        
        //Carregando as views.
        $this->load->view('html_header');
        $this->load->view('cabecalho');
        //$this->load->view('menu_categorias' , $data);
        $this->load->view('imovel_detalhe', $data);
        $this->load->view('rodape');
        $this->load->view('html_footer');
    }

    public function consultar_por_categoria($id_categoria) {

        //Recebendo os dados das categoias.
        $this->db->where('id_categoria',$id_categoria);
        $data['categorias'] = $this->db->get('categorias')->result();

        //Recebendo os dados da receita.
        $this->db->where('categoria',$id_categoria);
        $data['imoveis'] = $this->db->get('imoveis')->result();

        //print_r($data2);
        
        //Carregando as views.
        $this->load->view('html_header');
        $this->load->view('cabecalho');
        $this->load->view('menu_categorias' , $data);
        $this->load->view('imoveis_por_categoria', $data);
        $this->load->view('rodape');
        $this->load->view('html_footer');
    }
}