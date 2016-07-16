<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Imoveis extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('session_id') || !$this->session->userdata('logado')) {
            redirect(base_url() . "administracao/home");
        }
    }

    public function index($pagina = null) {

        $this->load->library('table');
        $this->load->library('pagination');

        $mostrar_por_pagina = 3;
        $data['imoveis'] = $this->db->get('imoveis', $mostrar_por_pagina, $pagina)->result();

        $this->db->select('count(*) as total');
        $this->db->from('imoveis');
        $numero_itens = $this->db->get()->result();

        $config['base_url'] = base_url("administracao/imoveis");
        $config['total_rows'] = $numero_itens[0]->total;
        $config['per_page'] = $mostrar_por_pagina;
        $config['first_link'] = 'Primeiro';
        $config['prev_link'] = 'Anterior';
        $config['next_link'] = 'Proximo';
        $config['last_link'] = 'Ultimo';
        $config['uri_segment'] = 3;
        $this->pagination->initialize($config);
        $data['paginacao'] = $this->pagination->create_links();

        $data['categorias'] = $this->db->get('categorias')->result();
        $data['clientes'] = $this->db->get('clientes')->result();
        $data['cidades'] = $this->db->get('cidades')->result();
        $data['bairros'] = $this->db->get('bairros')->result();

        $this->load->view('administracao/html_header');
        $this->load->view('administracao/menu');
        $this->load->view('administracao/imoveis', $data);
        $this->load->view('administracao/html_footer');
    }

    public function salvar_alteracao() {

        $this->load->library('form_validation');

        $this->form_validation->set_rules('categoria', 'Categoria', 'required');
        $this->form_validation->set_rules('desc_imovel', 'Descrição do Imóvel', 'required');
        $this->form_validation->set_rules('texto', 'Texto', 'required');
        $this->form_validation->set_rules('vlr_imovel', 'Valor do Imóvel', 'required');

        $this->form_validation->set_rules('logradouro', 'Logradouro do Imóvel', 'required');
        $this->form_validation->set_rules('numero', 'Número do Logradouro do Imóvel', 'required');
        $this->form_validation->set_rules('cep', 'CEP', 'required');
        $this->form_validation->set_rules('id_bairro', 'Bairro', 'required');
        $this->form_validation->set_rules('id_cidade', 'Cidade', 'required');

        $this->form_validation->set_rules('cpf', 'CPF', 'required|is_unique[proprietarios.cpf]');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[proprietarios.email]');


        if ($this->form_validation->run() == FALSE) {
            $this->editar();
        } else {
            $config['upload_path'] = './assets/imgs/imoveis';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '1024';
            $config['max_width'] = '800';
            $config['max_height'] = '600';
            $config['encrypt_name'] = true;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload()) {
                $arquivo_upado = $this->upload->data();
                $dados_imovel['foto'] = $arquivo_upado['file_name'];
            }

            // Obtem os dados do Proprietario
            $dados_proprietario['cpf'] = $this->input->post('cpf');
            $dados_proprietario['identidade'] = $this->input->post('identidade');
            $dados_proprietario['orgao_emissor'] = $this->input->post('orgao_emissor');
            $dados_proprietario['nome'] = $this->input->post('nome');
            $dados_proprietario['telefone'] = $this->input->post('telefone');
            $dados_proprietario['celular'] = $this->input->post('celular');
            $dados_proprietario['email'] = $this->input->post('email');
            $dados_proprietario['cep'] = $this->input->post('cep');
            $dados_proprietario['logradouro'] = $this->input->post('logradouro');
            $dados_proprietario['numero'] = $this->input->post('numero');
            $dados_proprietario['id_bairro'] = $this->input->post('id_bairro');
            $dados_proprietario['id_cidade'] = $this->input->post('id_cidade');

            // Obtem os dados do Imovel
            $dados_imovel['desc_imovel'] = $this->input->post('desc_imovel');
            $dados_imovel['texto'] = $this->input->post('texto');
            $dados_imovel['categoria'] = $this->input->post('categoria');
            $dados_imovel['id_cliente'] = $this->input->post('id_cliente');
            $dados_imovel['id_cidade'] = $this->input->post('id_cidade');
            $dados_imovel['id_bairro'] = $this->input->post('id_bairro');
            $dados_imovel['vlr_imovel'] = $this->input->post('vlr_imovel');
            $dados_imovel['vlr_iptu'] = $this->input->post('vlr_iptu');
            $dados_imovel['vlr_condominio'] = $this->input->post('vlr_condominio');
            $dados_imovel['qt_quartos'] = $this->input->post('qt_quartos');
            $dados_imovel['qt_garagens'] = $this->input->post('qt_garagens');
            $dados_imovel['qt_banheiros'] = $this->input->post('qt_banheiros');
            $dados_imovel['qt_suites'] = $this->input->post('qt_suites');
            $dados_imovel['ano_construcao'] = $this->input->post('ano_construcao');
            $dados_imovel['nu_andares'] = $this->input->post('nu_andares');
            $dados_imovel['nu_andar_apto'] = $this->input->post('nu_andar_apto');
            $dados_imovel['documentacao'] = $this->input->post('documentacao');
            $dados_imovel['fachada'] = $this->input->post('fachada');

            if ($this->input->post('in_financiamento')) {
                $dados_imovel['in_financiamento'] = 1;
            } else {
                $dados_imovel['in_financiamento'] = 0;
            }

            if ($this->input->post('in_carta_credito')) {
                $dados_imovel['in_carta_credito'] = 1;
            } else {
                $dados_imovel['in_carta_credito'] = 0;
            }

            if ($this->input->post('in_oportunidade')) {
                $dados_imovel['in_oportunidade'] = 1;
            } else {
                $dados_imovel['in_oportunidade'] = 0;
            }

            if ($this->input->post('in_destaque')) {
                $dados_imovel['in_destaque'] = 1;
            } else {
                $dados_imovel['in_destaque'] = 0;
            }

            if ($this->input->post('in_piscina')) {
                $dados_imovel['in_piscina'] = 1;
            } else {
                $dados_imovel['in_piscina'] = 0;
            }

            if ($this->input->post('in_sauna')) {
                $dados_imovel['in_sauna'] = 1;
            } else {
                $dados_imovel['in_sauna'] = 0;
            }

            if ($this->input->post('in_churrasqueira')) {
                $dados_imovel['in_churrasqueira'] = 1;
            } else {
                $dados_imovel['in_churrasqueira'] = 0;
            }

            if ($this->input->post('in_playground')) {
                $dados_imovel['in_playground'] = 1;
            } else {
                $dados_imovel['in_playground'] = 0;
            }

            if ($this->input->post('in_salao_festas')) {
                $dados_imovel['in_salao_festas'] = 1;
            } else {
                $dados_imovel['in_salao_festas'] = 0;
            }

            if ($this->input->post('in_elevadores')) {
                $dados_imovel['in_elevadores'] = 1;
            } else {
                $dados_imovel['in_elevadores'] = 0;
            }

            // Atualiza o Proprietario 
            $this->db->where('id_proprietario', $this->input->post('id_proprietario'));
            $this->db->update('proprietarios', $dados_proprietario);

            // Atualiza o Imovel
            $this->db->where('id_imovel', $this->input->post('id_imovel'));
            $retorno = $this->db->update('imoveis', $dados_imovel);
            if ($retorno) {
                $this->session->set_flashdata("sucesso", "Imóvel atualizado com sucesso.");
            } else {
                $this->session->set_flashdata("erro", "Houve um erro ao atualizar o Imóvel.");
            }

            redirect(base_url() . "administracao/imoveis/1");
        }
    }

    public function cadastrar($param = null) {

        $data['categorias'] = $this->db->get('categorias')->result();
        $data['clientes'] = $this->db->get('clientes')->result();
        $data['cidades'] = $this->db->get('cidades')->result();
        $data['bairros'] = $this->db->get('bairros')->result();

        $this->load->view('administracao/html_header');
        $this->load->view('administracao/menu');
        $this->load->view('administracao/cadastrar_imovel', $data);
        $this->load->view('administracao/html_footer');
    }

    public function salvar_inclusao() {


        $id_cliente = $this->input->post('id_cliente');

        $this->load->library('form_validation');

        $this->form_validation->set_rules('categoria', 'Categoria', 'required');
        $this->form_validation->set_rules('desc_imovel', 'Descrição do Imóvel', 'required');
        $this->form_validation->set_rules('texto', 'Texto', 'required');
        $this->form_validation->set_rules('vlr_imovel', 'Valor do Imóvel', 'required');
        $this->form_validation->set_rules('logradouro', 'Logradouro do Imóvel', 'required');
        $this->form_validation->set_rules('numero', 'Número do Logradouro do Imóvel', 'required');
        $this->form_validation->set_rules('cep', 'CEP', 'required');
        $this->form_validation->set_rules('id_bairro', 'Bairro', 'required');
        $this->form_validation->set_rules('id_cidade', 'Cidade', 'required');
        $this->form_validation->set_rules('cpf', 'CPF', 'required|is_unique[proprietarios.cpf]');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[proprietarios.email]');

        if ($this->form_validation->run() == FALSE) {
            $this->cadastrar();
        } else {
            $config['upload_path'] = './assets/imgs/imoveis';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '1024';
            $config['max_width'] = '800';
            $config['max_height'] = '600';
            $config['encrypt_name'] = true;

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload()) {
                echo $this->upload->display_errors();
                echo "<a href='javascript:history.go(-1)'>Voltar e corrigir.</a>";
            } else {
                // Obtem os dados do Proprietario
                $dados_proprietario['cpf'] = $this->input->post('cpf');
                $dados_proprietario['identidade'] = $this->input->post('identidade');
                $dados_proprietario['orgao_emissor'] = $this->input->post('orgao_emissor');
                $dados_proprietario['nome'] = $this->input->post('nome');
                $dados_proprietario['telefone'] = $this->input->post('telefone');
                $dados_proprietario['celular'] = $this->input->post('celular');
                $dados_proprietario['email'] = $this->input->post('email');
                $dados_proprietario['cep'] = $this->input->post('cep_proprietario');
                $dados_proprietario['logradouro'] = $this->input->post('logradouro_proprietario');
                $dados_proprietario['numero'] = $this->input->post('numero_proprietario');
                $dados_proprietario['id_bairro'] = $this->input->post('id_bairro_proprietario');
                $dados_proprietario['id_cidade'] = $this->input->post('id_cidade_proprietario');

                // Obtem os dados do Imovel
                $dados_imovel['desc_imovel'] = $this->input->post('desc_imovel');
                $dados_imovel['texto'] = $this->input->post('texto');
                $dados_imovel['categoria'] = $this->input->post('categoria');
                $dados_imovel['id_cliente'] = $this->input->post('id_cliente');
                $dados_imovel['cep'] = $this->input->post('cep');
                $dados_imovel['logradouro'] = $this->input->post('logradouro');
                $dados_imovel['numero'] = $this->input->post('numero');
                $dados_imovel['id_cidade'] = $this->input->post('id_cidade');
                $dados_imovel['id_bairro'] = $this->input->post('id_bairro');
                $dados_imovel['vlr_imovel'] = $this->input->post('vlr_imovel');
                $dados_imovel['vlr_iptu'] = $this->input->post('vlr_iptu');
                $dados_imovel['vlr_condominio'] = $this->input->post('vlr_condominio');
                $dados_imovel['qt_quartos'] = $this->input->post('qt_quartos');
                $dados_imovel['qt_garagens'] = $this->input->post('qt_garagens');
                $dados_imovel['qt_banheiros'] = $this->input->post('qt_banheiros');
                $dados_imovel['qt_suites'] = $this->input->post('qt_suites');
                $dados_imovel['ano_construcao'] = $this->input->post('ano_construcao');
                $dados_imovel['nu_andares'] = $this->input->post('nu_andares');
                $dados_imovel['nu_andar_apto'] = $this->input->post('nu_andar_apto');
                $dados_imovel['documentacao'] = $this->input->post('documentacao');
                $dados_imovel['fachada'] = $this->input->post('fachada');

                if ($this->input->post('in_financiamento')) {
                    $dados_imovel['in_financiamento'] = 1;
                } else {
                    $dados_imovel['in_financiamento'] = 0;
                }

                if ($this->input->post('in_carta_credito')) {
                    $dados_imovel['in_carta_credito'] = 1;
                } else {
                    $dados_imovel['in_carta_credito'] = 0;
                }

                if ($this->input->post('in_oportunidade')) {
                    $dados_imovel['in_oportunidade'] = 1;
                } else {
                    $dados_imovel['in_oportunidade'] = 0;
                }

                if ($this->input->post('in_destaque')) {
                    $dados_imovel['in_destaque'] = 1;
                } else {
                    $dados_imovel['in_destaque'] = 0;
                }

                if ($this->input->post('in_piscina')) {
                    $dados_imovel['in_piscina'] = 1;
                } else {
                    $dados_imovel['in_piscina'] = 0;
                }

                if ($this->input->post('in_sauna')) {
                    $dados_imovel['in_sauna'] = 1;
                } else {
                    $dados_imovel['in_sauna'] = 0;
                }

                if ($this->input->post('in_churrasqueira')) {
                    $dados_imovel['in_churrasqueira'] = 1;
                } else {
                    $dados_imovel['in_churrasqueira'] = 0;
                }

                if ($this->input->post('in_playground')) {
                    $dados_imovel['in_playground'] = 1;
                } else {
                    $dados_imovel['in_playground'] = 0;
                }

                if ($this->input->post('in_salao_festas')) {
                    $dados_imovel['in_salao_festas'] = 1;
                } else {
                    $dados_imovel['in_salao_festas'] = 0;
                }

                if ($this->input->post('in_elevadores')) {
                    $dados_imovel['in_elevadores'] = 1;
                } else {
                    $dados_imovel['in_elevadores'] = 0;
                }

                // Obtem a Foto de Anuncio do Imovel
                $arquivo_upado = $this->upload->data();
                $dados_imovel['foto'] = "assets/imgs/imoveis/" . $arquivo_upado['file_name'];

                // Cadastra o Proprietario
                $retorno = $this->db->insert('proprietarios', $dados_proprietario);
                if($retorno) {
 
                    // Associa o Imovel ao Proprietario
                    $proprietario = $this->db->insert_id();
                    $dados_imovel['id_proprietario'] = $proprietario;

                    // Cadastra o Imovel
                    $retorno = $this->db->insert('imoveis', $dados_imovel);
                    if ($retorno) {
                        $this->session->set_flashdata("sucesso", "Imóvel cadastrado com sucesso.");
                    } else {
                        $this->session->set_flashdata("erro", "Houve um erro ao cadastrar o Imóvel.");
                    }
                }
                else {
                    $this->session->set_flashdata("erro", "Houve um erro ao cadastrar o Proprietário do Imóvel.");
                }
                // Apresenta a pagina do Cadastro de Imoveis
                redirect(base_url() . "administracao/imoveis/1");                    

            }
        }
    }

    public function editar($imovel = null) {

        $data['categorias'] = $this->db->get('categorias')->result();
        $data['clientes'] = $this->db->get('clientes')->result();
        $data['cidades'] = $this->db->get('cidades')->result();
        $data['bairros'] = $this->db->get('bairros')->result();

        // Busca o Imovel
        $this->db->where('id_imovel', $imovel);
        $data['imovel'] = $this->db->get('imoveis')->result();

        // Busca o Proprietario do Imovel
        $proprietario = $data['imovel'][0]->id_proprietario;
        $this->db->where('id_proprietario', $proprietario);
        $data['proprietario'] = $this->db->get('proprietarios')->result();

        $this->load->view('administracao/html_header');
        $this->load->view('administracao/menu');
        $this->load->view('administracao/editar_imovel', $data);
        $this->load->view('administracao/html_footer');
    }

    public function fotos($imovel = null) {

        $this->load->library('table');
        $this->load->library('pagination');

        // Busca o Imovel
        $this->db->where('id_imovel', $imovel);
        $data['imovel'] = $this->db->get('imoveis')->result();

        // Busca as Fotos do Imovel
        $this->db->where('id_imovel', $imovel);
        $data['fotos'] = $this->db->get('imoveis_fotos')->result();

        $this->load->view('administracao/html_header');
        $this->load->view('administracao/menu');
        $this->load->view('administracao/imoveis_fotos', $data);
        $this->load->view('administracao/html_footer');
    }

    public function salvar_foto($imovel = null) {

        $id_imovel = $this->input->post('id_imovel');

        $config['upload_path'] = './assets/imgs/imoveis';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '1024';
        $config['max_width'] = '800';
        $config['max_height'] = '600';
        $config['encrypt_name'] = true;

        $this->load->library('upload', $config);
        if (!$this->upload->do_upload()) {
            echo $this->upload->display_errors();
            echo "<a href='javascript:history.go(-1)'>Voltar e corrigir.</a>";
        } else {
            $dados_imovel['id_imovel'] = $id_imovel;

            $arquivo_upado = $this->upload->data();
            $dados_imovel['foto'] = "assets/imgs/imoveis/" . $arquivo_upado['file_name'];
            $retorno = $this->db->insert('imoveis_fotos', $dados_imovel);
            if ($retorno) {
                $this->session->set_flashdata("sucesso", "Foto cadastrada com sucesso.");
            } else {
                $this->session->set_flashdata("erro", "Houve um erro ao cadastrar a Foto.");
            }
        }
        $this->fotos($id_imovel);
    }

    public function excluir($id) {

        // Exclui as Fotos
        $this->db->where('id_imovel', $id);
        $this->db->delete('imoveis_fotos');

        // Exclui o Imovel
        $this->db->where('id_imovel', $id);
        $retorno = $this->db->delete('imoveis');
        if ($retorno) {
            $this->session->set_flashdata("sucesso", "Imóvel excluído com sucesso.");
        } else {
            $this->session->set_flashdata("erro", "Houve um erro ao excluir o Imóvel.");
        }

        redirect(base_url() . "administracao/imoveis/1");
    }

    public function excluir_foto($id_foto, $id_imovel) {

        $this->db->where('id_foto', $id_foto);
        $retorno = $this->db->delete('imoveis_fotos');
        if ($retorno) {
            $this->session->set_flashdata("sucesso", "Foto excluída com sucesso.");
        } else {
            $this->session->set_flashdata("erro", "Houve um erro ao excluir a Foto.");
        }
        $this->fotos($id_imovel);
    }

    public function reservar_imovel($id_imovel) {

        $dados['cidades'] = $this->db->get('cidades')->result();
        $dados['bairros'] = $this->db->get('bairros')->result();

        // Busca dados do imovel pelo id.
        $this->db->select('categorias.desc_categoria as nome_categoria, bairros.nome as nome_bairro, cidades.nome as nome_cidade, imoveis.*');
        $this->db->from('imoveis');
        $this->db->join('categorias', 'categorias.id_categoria = imoveis.categoria');
        $this->db->join('bairros', 'bairros.id_bairro       = imoveis.id_bairro');
        $this->db->join('cidades', 'cidades.id_cidade       = imoveis.id_cidade');
        $this->db->where('id_imovel', $id_imovel);

        $dados['imovel'] = $this->db->get()->result();

        $this->load->view('administracao/html_header');
        $this->load->view('administracao/menu');
        $this->load->view('administracao/painel_reservar_imovel', $dados);
        $this->load->view('administracao/html_footer');
    }

    public function salvar_reserva_imovel($id_imovel) {

        $this->load->library('form_validation');

        // Validacao dos dados do Cliente
        $this->form_validation->set_rules('nome', 'Nome do Cliente', 'required');
        $this->form_validation->set_rules('cpf', 'CPF do Cliente', 'required');
        $this->form_validation->set_rules('email', 'Email do Cliente', 'required');

        // Validacao dos dados da Reserva
        $this->form_validation->set_rules('data',      'Data da Reserva', 'required');
        $this->form_validation->set_rules('vlr_sinal', 'Valor do Sinal', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->reservar_imovel($id_imovel);
        } else {
            //Cadastra o Cliente
            $cliente['nome']       = $this->input->post('nome');
            $cliente['telefone']   = $this->input->post('telefone');
            $cliente['celular']    = $this->input->post('celular');
            $cliente['email']      = $this->input->post('email');
            $cliente['logradouro'] = $this->input->post('logradouro');
            $cliente['numero']     = $this->input->post('numero');
            $cliente['id_bairro']  = $this->input->post('id_bairro');
            $cliente['cep']        = $this->input->post('cep');
            $cliente['id_cidade']  = $this->input->post('id_cidade');
            $cliente['cpf']        = $this->input->post('cpf');
            
            $this->db->insert('clientes', $cliente);

            // Obtem o identificador do cliente
            $id_cliente = $this->db->insert_id();

            // Cadastra a Reserva
            $reserva['id_cliente'] = $id_cliente;
            $reserva['id_imovel']  = $id_imovel;
            $reserva['data']       = $this->input->post('data');
            $reserva['vlr_sinal']  = $this->input->post('vlr_sinal');
            
            $retorno = $this->db->insert('reservas', $reserva);
            
            if ($retorno) {
                $this->session->set_flashdata("sucesso", "Imóvel reservado com sucesso.");
            } else {
                $this->session->set_flashdata("sucesso", "Erro ao reservar o Imóvel.");
            }
        }
        redirect(base_url() . "administracao/home/painel/");
    }
    
    public function autorizar_venda($imovel=null) {;

        $dados['imovel'] = $imovel;
        
        $this->load->view('administracao/html_header');
        $this->load->view('administracao/menu');
        $this->load->view('administracao/autorizacao_venda', $dados);
        $this->load->view('administracao/html_footer'); 
        
    }
    
    public function emitir_autorizacao_venda($imovel=null) {    
     
        $this->load->library('table');        

        // Busca o Imovel
        $this->db->where('id_imovel', $imovel);
        $dados['imovel'] = $this->db->get('imoveis')->result();
        
        // Busca o proprietario do imovel
        $proprietario = $dados['imovel'][0]->id_proprietario;
        $this->db->where('id_proprietario', $proprietario);
        $dados['proprietario'] = $this->db->get('proprietarios')->result();
        
        //Carregando a biblioteca mPDF
        $this->load->library('mpdf/mpdf');     
        
        //Inicia o buffer, qualquer HTML que for sair agora sera capturado para o buffer
        ob_start();
          
        //Limpa o buffer jogando todo o HTML em uma variavel.
        $html = $this->load->view('administracao/autorizacao_venda_imovel', $dados);
       
        $html = ob_get_clean();
  
        $mpdf=new mPDF();
        $mpdf->WriteHTML($html);
        
        //Colocando o rodape
        $mpdf->SetFooter('{DATE j/m/Y H:i}|Página {PAGENO} de {nb}|www.dsw3.com.br');
        $mpdf->Output();
        
    }
}
