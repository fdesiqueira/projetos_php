<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('session_id') || !$this->session->userdata('logado')) {
            redirect(base_url() . "administracao/login");
        }
    }

    public function index($pagina = null) {
        if (!$this->session->userdata('session_id') || !$this->session->userdata('logado')) {
            redirect(base_url() . "administracao/login");
        } else {
            $this->painel();
        }
    }

    public function painel($pagina = null) {
        $this->load->library('table');
        $this->load->library('pagination');

        $mostrar_por_pagina = 3;
        $data['visitas'] = $this->db->get('visitas', $mostrar_por_pagina, $pagina)->result();

        $this->db->select('count(*) as total');
        $this->db->from('visitas');
        $numero_itens = $this->db->get()->result();

        $config['base_url'] = base_url("administracao/home/painel");
        $config['total_rows'] = $numero_itens[0]->total;
        $config['per_page'] = $mostrar_por_pagina;
        $config['uri_segment'] = 4;
        $config['first_link'] = 'Primeiro';
        $config['last_link'] = 'Ultimo';
        $this->pagination->initialize($config);

        $data['paginacao'] = $this->pagination->create_links();

        $this->load->view('administracao/html_header');
        $this->load->view('administracao/menu');
        $this->load->view('administracao/painel', $data);
        $this->load->view('administracao/html_footer');
    }    
}
