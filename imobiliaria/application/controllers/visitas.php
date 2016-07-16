<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Visitas extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        
    }

    public function agendar_visita($id_imovel) {

        // Busca imovel pela categoria.
        $data['categorias'] = $this->db->get('categorias')->result();

        // Busca imovel pelo id.
        $this->db->select('categorias.desc_categoria, bairros.nome as nome_bairro, cidades.nome as nome_cidade, imoveis.*');
        $this->db->from('imoveis');
        $this->db->join('categorias', 'categorias.id_categoria = imoveis.categoria');
        $this->db->join('bairros', 'bairros.id_bairro       = imoveis.id_bairro');
        $this->db->join('cidades', 'cidades.id_cidade       = imoveis.id_cidade');
        $this->db->where('id_imovel', $id_imovel);

        $data['imovel'] = $this->db->get()->result();

        $data['id_imovel'] = $id_imovel;

        //Carregando as views.
        $this->load->view('html_header');
        $this->load->view('cabecalho');
        $this->load->view('agendar_visita', $data);
        $this->load->view('rodape');
        $this->load->view('html_footer');
    }

    public function cadastrar_visita($id_imovel = null) {

        $this->load->library('form_validation');
        $this->form_validation->set_rules('nome', 'Nome', 'required');
        $this->form_validation->set_rules('data', 'Data da Visita', 'required');
        $this->form_validation->set_rules('hora', 'Hora da Visita', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('mensagem', 'Mensagem', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->agendar_visita($id_imovel);
        } else {
            $data['id_imovel'] = $this->input->post('id_imovel');
            $data['nome'] = $this->input->post('nome');
            $data['email'] = $this->input->post('email');
            $data['data'] = $this->input->post('data');
            $data['hora'] = $this->input->post('hora');
            $data['telefone'] = $this->input->post('telefone');
            $data['mensagem'] = $this->input->post('mensagem');

            $retorno = $this->db->insert('visitas', $data);

            $mensagem = $this->load->view('visita_mensagem', $data, TRUE);

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
            $this->email->subject('DSW3 Imoveis - Solicitação de Visita feita por ' . $this->input->post('nome'));
            $this->email->message($mensagem);

            if ($this->email->send()) {
                $this->sucesso();
            } else {
                $this->falha();
            }
        }
    }

    public function sucesso() {
        $dados_header = array(
            'titulo' => 'DSW3 Imoveis - Visita agendada com sucesso',
            'descricao' => 'Agenda Visita Imovel',
            'palavras_chave' => 'Imovel, Visita, Contato, fale conosco, atendimento'
        );
        $dados["mensagem"] = 'Sua Visita foi agendada com sucesso. Em breve entraremos em contato.';

        $this->load->view('html_header');
        $this->load->view('cabecalho');
        $this->load->view('visita_sucesso', $dados);
        $this->load->view('rodape');
        $this->load->view('html_footer');
    }

    public function falha() {
        $dados_header = array(
            'titulo' => 'DSW3 Imoveis - Fale Conosco',
            'descricao' => 'Fale conosco.',
            'palavras_chave' => 'Contato, fale conosco, atendimento'
        );

        $dados_cabecalho = array('titulo_h2' => 'Desculpe...');

        $this->load->view('html_header');
        $this->load->view('cabecalho');
        $this->load->view('visita_falha');
        $this->load->view('rodape');
        $this->load->view('html_footer');
    }
}
