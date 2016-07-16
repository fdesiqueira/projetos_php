<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
	
    public function __construct(){
        parent::__construct();
    }

    public function index(){
        $this->load->view('administracao/html_header');
        $this->load->view('administracao/login');		
        $this->load->view('administracao/html_footer');
    }

    public function autenticar(){		

        $this->load->library('form_validation');
        $this->form_validation->set_rules('usuario', 'Usuário',  'required');
        $this->form_validation->set_rules('senha',   'Senha',    'required');

        if($this->form_validation->run() == FALSE)
        {
               $this->index();
        }
        else {
            $usuario = $this->input->post('usuario');
            $senha = $this->input->post('senha');
            $this->db->where('usuario',$usuario);
            $this->db->where('senha',$senha);
            $this->db->where('ativo',1);
            $usuario = $this->db->get('usuarios')->result();	
            
            if(count($usuario)===1){
                $dados = array( 'usuario'  => $usuario[0]->usuario,
                                'logado' => TRUE );
                $this->session->set_userdata($dados);
                redirect(base_url()."administracao/home/painel");
            }
            else{
                $this->session->set_flashdata("erro","Usuario ou Senha inválido.");
                redirect(base_url()."administracao/login");
            }
        }
    }

    public function encerrar_sessao(){
        $this->session->sess_destroy();
        redirect(base_url()."administracao/login");
    }
}