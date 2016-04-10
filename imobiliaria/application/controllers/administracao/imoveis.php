<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
class Imoveis extends CI_Controller {
	
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
		$data['imoveis'] = $this->db->get('imoveis',$mostrar_por_pagina,$pagina)->result();	
		
		$this->db->select('count(*) as total');
		$this->db->from('imoveis');		
		$numero_itens = $this->db->get()->result();		
		 		
		$config['base_url']   = base_url("administracao/imoveis");
		$config['total_rows'] = $numero_itens[0]->total;
		$config['per_page']   = $mostrar_por_pagina;
		$config['uri_segment']     = 3;		
		$config['first_link'] = 'Primeiro';
		$config['last_link'] = 'Ultimo';
		$this->pagination->initialize($config);		
		$data['paginacao'] = $this->pagination->create_links();	
		
		$data['categorias'] = $this->db->get('categorias')->result();		
		$data['clientes']   = $this->db->get('clientes')->result();
		$data['cidades']    = $this->db->get('cidades')->result();
		$data['bairros']    = $this->db->get('bairros')->result();
		
		$this->load->view('administracao/html_header');
		$this->load->view('administracao/menu');
		$this->load->view('administracao/imoveis',$data);
		$this->load->view('administracao/html_footer');
	}
	
	public function salvar_alteracao(){
			
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('categoria', 		'Categoria', 			'required');
		$this->form_validation->set_rules('id_cliente',   	'Cliente', 				'required');
		$this->form_validation->set_rules('desc_imovel', 	'Descrição do Imóvel', 	'required');
		$this->form_validation->set_rules('texto', 			'Texto', 				'required');
		$this->form_validation->set_rules('id_cidade',   	'Cidade', 				'required');
		$this->form_validation->set_rules('id_bairro',   	'Bairro', 				'required');
		
		if($this->form_validation->run() == FALSE)
		{
			$this->index();
		}
		else
		{
			$config['upload_path'] = './assets/imgs/imoveis';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']	= '1024';
			$config['max_width']  = '800';
			$config['max_height']  = '600';
			$config['encrypt_name'] = true;		
			
			$this->load->library('upload', $config);
			
			if($this->upload->do_upload()) {
				$arquivo_upado = $this->upload->data();
				$dados['foto'] = $arquivo_upado['file_name'];
			}	
			
			$dados['desc_imovel']  = $this->input->post('desc_imovel');
			$dados['texto']        = $this->input->post('texto');
			$dados['categoria']    = $this->input->post('categoria');
			$dados['id_cliente']   = $this->input->post('id_cliente');
			$dados['id_cidade']    = $this->input->post('id_cidade');
			$dados['id_bairro']    = $this->input->post('id_bairro');
			$dados['qt_quartos']   = $this->input->post('qt_quartos');
			$dados['qt_garagens']   = $this->input->post('qt_garagens');
			
			if($this->input->post('in_financiamento')) {
				$dados['in_financiamento']   = 1;
			}	
			else {
				$dados['in_financiamento']   = 0;
			}		
			
			if($this->input->post('in_carta_credito')) {
				$dados['in_carta_credito']   = 1;
			}	
			else {
				$dados['in_carta_credito']   = 0;
			}

			if($this->input->post('in_oportunidade')) {
				$dados['in_oportunidade']   = 1;
			}	
			else {
				$dados['in_oportunidade']   = 0;
			}
			
			if($this->input->post('in_destaque')) {
				$dados['in_destaque']   = 1;
			}	
			else {
				$dados['in_destaque']   = 0;
			}

			$this->db->where('id_imovel',$this->input->post('id_imovel'));
			$this->db->update('imoveis',$dados);
			
			redirect(base_url()."administracao/imoveis/1");
		}
	}
	
	public function cadastrar($param=null){
		
		$data['categorias'] = $this->db->get('categorias')->result();		
		$data['clientes']   = $this->db->get('clientes')->result();
		$data['cidades']    = $this->db->get('cidades')->result();
		$data['bairros']    = $this->db->get('bairros')->result();
		
		$this->load->view('administracao/html_header');
		$this->load->view('administracao/menu');
		$this->load->view('administracao/cadastrar_imovel', $data);
		$this->load->view('administracao/html_footer');
	}

	public function salvar_inclusao() {
		

		$id_cliente = $this->input->post('id_cliente');
		
		$this->load->library('form_validation');
		$this->form_validation->set_rules('categoria', 	 'Categoria', 			'required');
		$this->form_validation->set_rules('id_cliente',  'Cliente', 			'required');
		$this->form_validation->set_rules('desc_imovel', 'Descrição do Imóvel', 'required');
		$this->form_validation->set_rules('texto', 		 'Texto', 				'required');
		$this->form_validation->set_rules('id_cidade',   'Cidade', 				'required');
		$this->form_validation->set_rules('id_bairro',   'Bairro', 				'required');	
		
		if($this->form_validation->run() == FALSE)
		{
                    $this->cadastrar();	
		}
		else
		{
                    $config['upload_path'] = './assets/imgs/imoveis';
                    $config['allowed_types'] = 'gif|jpg|png';
                    $config['max_size']	= '1024';
                    $config['max_width']  = '800';
                    $config['max_height']  = '600';
                    $config['encrypt_name'] = true;
                    
                    $this->load->library('upload', $config);                    
                    if ( ! $this->upload->do_upload()) {
                        echo $this->upload->display_errors();			
                        echo "<a href='javascript:history.go(-1)'>Voltar e corrigir.</a>";
                    }
                    else {
                        $dados['desc_imovel'] 		 = $this->input->post('desc_imovel');
                        $dados['texto']       		 = $this->input->post('texto');
                        $dados['categoria']   		 = $this->input->post('categoria');
                        $dados['id_cliente']  		 = $this->input->post('id_cliente');
                        $dados['id_cidade']   		 = $this->input->post('id_cidade');
                        $dados['id_bairro']   		 = $this->input->post('id_bairro');
                        $dados['vlr_imovel']   		 = $this->input->post('vlr_imovel');
                        $dados['qt_quartos']   		 = $this->input->post('qt_quartos');
                        $dados['qt_garagens']   	 = $this->input->post('qt_garagens');

                        if($this->input->post('in_financiamento')) {
                                $dados['in_financiamento']   = 1;
                        }	
                        else {
                                $dados['in_financiamento']   = 0;
                        }		

                        if($this->input->post('in_carta_credito')) {
                                $dados['in_carta_credito']   = 1;
                        }	
                        else {
                                $dados['in_carta_credito']   = 0;
                        }

                        if($this->input->post('in_oportunidade')) {
                                $dados['in_oportunidade']   = 1;
                        }	
                        else {
                                $dados['in_oportunidade']   = 0;
                        }

                        if($this->input->post('in_destaque')) {
                                $dados['in_destaque']   = 1;
                        }	
                        else {
                                $dados['in_destaque']   = 0;
                        }

                        $arquivo_upado        = $this->upload->data();
                        $dados['foto']        = "assets/imgs/imoveis/".$arquivo_upado['file_name'];				
                        $this->db->insert('imoveis', $dados);
                        redirect(base_url()."administracao/imoveis");			   
                    }                   
		}
	}

	public function editar($imovel = null) {
		 
		$data['categorias'] = $this->db->get('categorias')->result();
		$data['clientes']   = $this->db->get('clientes')->result();
		$data['cidades']    = $this->db->get('cidades')->result();
		$data['bairros']    = $this->db->get('bairros')->result();	
		
		$this->db->where('id_imovel',$imovel);
		$data['imovel'] = $this->db->get('imoveis')->result();
		
		$this->load->view('administracao/html_header');
		$this->load->view('administracao/menu');
		$this->load->view('administracao/editar_imovel',$data);
		$this->load->view('administracao/html_footer');
	}
	
        public function fotos($imovel = null) {
		
                $this->load->library('table');
		$this->load->library('pagination');
                
		$this->db->where('id_imovel',$imovel);
		$data['imovel'] = $this->db->get('imoveis')->result();
		
                //var_dump($data['imovel']);
                
                $this->db->where('id_imovel',$imovel);
		$data['fotos'] = $this->db->get('imoveis_fotos')->result();
                
                //var_dump($data['fotos']);
                
		$this->load->view('administracao/html_header');
		$this->load->view('administracao/menu');
		$this->load->view('administracao/imoveis_fotos',$data);
		$this->load->view('administracao/html_footer');
	}
        
        public function salvar_foto($imovel = null) {		

            $id_imovel = $this->input->post('id_imovel');

            $config['upload_path'] = './assets/imgs/imoveis';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']	= '1024';
            $config['max_width']  = '800';
            $config['max_height']  = '600';
            $config['encrypt_name'] = true;

            $this->load->library('upload', $config);                    
            if ( ! $this->upload->do_upload()) {
                echo $this->upload->display_errors();			
                echo "<a href='javascript:history.go(-1)'>Voltar e corrigir.</a>";
            }
            else {
                $dados['id_imovel']  = $id_imovel;

                $arquivo_upado        = $this->upload->data();
                $dados['foto']        = "assets/imgs/imoveis/".$arquivo_upado['file_name'];				
                $this->db->insert('imoveis_fotos', $dados);                
            } 
            $this->fotos($id_imovel);
	}
        
	public function excluir($id){		
            $this->db->where('id_imovel',$id);
            $this->db->delete('imoveis');
            redirect(base_url()."administracao/imoveis/1");
	} 
        
        public function excluir_foto($id_foto, $id_imovel){		
            $this->db->where('id_foto',$id_foto);
            $this->db->delete('imoveis_fotos');
             $this->fotos($id_imovel);
	} 
}