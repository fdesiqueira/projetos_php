<div class="container">
    <div class="painel">
        <div class="row">
            <div class="col-sm-10">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2 class="panel-title">Cadastro de Imóveis</h2>
                    </div>
                    <div class="panel-body">
                        <div> 
                            <?php if($this->session->flashdata("sucesso")) : ?>
                            <p class="alert alert-success"><?= $this->session->flashdata("sucesso") ?></p>
                            <?php endif ?>
                            <?php if ($this->session->flashdata("erro")) : ?>
                                <p class="alert alert-danger"><?= $this->session->flashdata("erro") ?></p>
                            <?php endif ?>      
                        </div>
                        <?php
                        echo heading("Cadastrar Imóvel ", 2, "class='divisor'");

                        $attributes = array('class' => 'formcadastros', 'id' => 'formcadastro');

                        echo form_open_multipart('administracao/imoveis/adicionar/1', $attributes);

                        echo "<span class='validacoes'>" . validation_errors() . "</span>";

                        echo "<div class= 'row'>";
                        echo "   <ul class='nav nav-tabs'>";
                        echo "      <li class='nav active'>";
                        echo "        <a href='#imovel' data-toggle='tab'>Informações do Imóvel</a>";
                        echo "      </li>";
                        echo "      <li class='nav'>";
                        echo "        <a href='#endereco' data-toggle='tab'>Endereço do Imóvel</a>";
                        echo "      </li>";
                        echo "      <li class='nav'>";
                        echo "        <a href='#edificio' data-toggle='tab'>Informações do Edificio</a>";
                        echo "      </li>";
                        echo "      <li class='nav'>";
                        echo "        <a href='#proprietario' data-toggle='tab'>Informações do Proprietário</a>";
                        echo "      </li>";
                        echo "   </ul>";
                        echo "   <div class='tab-content'>";
                        echo "      <div class='tab-pane fade in active' id='imovel'>";

                        // echo form_fieldset("Informações do Imóvel");				
                        echo "<hr>";

                        echo "<div class='row'>";
                        echo "<div class='form-group col-md-6'>";
                        echo form_label("Categoria: ", "categoria");
                        foreach ($categorias as $categoria) {
                            $array_cat[$categoria->id_categoria] = $categoria->categoria;
                        }
                        echo form_dropdown('categoria', $array_cat, '', 'class="form-control" id="categoria"');
                        echo "</div>";

                        echo "<div class='form-group col-md-6'>";
                        echo form_label("Foto:", "userfile");
                        $atributos = array(
                            "name" => "userfile",
                            "id" => "userfile"
                        );
                        echo form_upload($atributos);
                        echo "</div>";

                        echo "</div>";

                        echo "<div class='row'>";
                        echo "<div class='form-group col-md-12'>";
                        echo form_label("Anúncio: ", "desc_imovel");
                        $atributos = array(
                            "name" => "desc_imovel",
                            "id" => "desc_imovel",
                            "class" => "form-control",
                            "value" => set_value('desc_imovel')
                        );
                        echo form_input($atributos);
                        echo "</div>";
                        echo "</div>";

                        echo "<div class='row'>";
                        echo "<div class='form-group col-md-12'>";
                        echo form_label("Detalhes do Imóvel: ", "texto");
                        $atributos = array(
                            "name" => "texto",
                            "id" => "texto",
                            "class" => "form-control",
                            "value" => set_value('texto')
                        );
                        echo form_textarea($atributos);
                        echo "</div>";
                        echo "</div>";

                        echo "<div class='row'>";
                        echo "<div class='form-group col-md-4'>";
                        echo form_label("Valor do Imóvel: ", "vlr_imovel");
                        $atributos = array(
                            "name" => "vlr_imovel",
                            "id" => "vlr_imovel",
                            "class" => "form-control",
                            "value" => set_value('vlr_imovel')
                        );
                        echo form_input($atributos);
                        echo "</div>";

                        echo "<div class='form-group col-md-4'>";
                        echo form_label("Valor do IPTU: ", "vlr_iptu");
                        $atributos = array(
                            "name" => "vlr_iptu",
                            "id" => "vlr_iptu",
                            "class" => "form-control",
                            "value" => set_value('vlr_iptu')
                        );
                        echo form_input($atributos);
                        echo "</div>";

                        echo "<div class='form-group col-md-4'>";
                        echo form_label("Valor do Condomínio: ", "vlr_condominio");
                        $atributos = array(
                            "name" => "vlr_condominio",
                            "id" => "vlr_condominio",
                            "class" => "form-control",
                            "value" => set_value('vlr_condominio')
                        );
                        echo form_input($atributos);
                        echo "</div>";

                        echo "</div>";

                        echo "<div class='row'>";
                        echo "<div class='form-group col-md-3'>";
                        echo form_label("Quartos: ", "qt_quartos");
                        $atributos = array(
                            "name" => "qt_quartos",
                            "id" => "qt_quartos",
                            "class" => "form-control",
                            "value" => set_value('qt_quartos')
                        );
                        echo form_input($atributos);
                        echo "</div>";

                        echo "<div class='form-group col-md-3'>";
                        echo form_label("Vagas de Garagem: ", "qt_garagens");
                        $atributos = array(
                            "name" => "qt_garagens",
                            "id" => "qt_garagens",
                            "class" => "form-control",
                            "value" => set_value('qt_garagens')
                        );
                        echo form_input($atributos);
                        echo "</div>";

                        echo "<div class='form-group col-md-3'>";
                        echo form_label("Banheiros: ", "qt_banheiros");
                        $atributos = array(
                            "name" => "qt_banheiros",
                            "id" => "qt_banheiros",
                            "class" => "form-control",
                            "value" => set_value('qt_banheiros')
                        );
                        echo form_input($atributos);
                        echo "</div>";

                        echo "<div class='form-group col-md-3'>";
                        echo form_label("Suite: ", "qt_suites");
                        $atributos = array(
                            "name" => "qt_suites",
                            "id" => "qt_suites",
                            "class" => "form-control",
                            "value" => set_value('qt_suites')
                        );
                        echo form_input($atributos);
                        echo "</div>";
                        echo "</div>";

                        echo "<div class='row'>";
                        echo "<div class='form-group col-md-4'>";
                        echo form_label("Ano de Construção: ", "ano_construcao");
                        $atributos = array(
                            "name" => "ano_construcao",
                            "id" => "ano_construcao",
                            "class" => "form-control",
                            "value" => set_value('ano_construcao')
                        );
                        echo form_input($atributos);
                        echo "</div>";

                        echo "<div class='form-group col-md-4'>";
                        echo form_label("Andares: ", "nu_andares");
                        $atributos = array(
                            "name" => "nu_andares",
                            "id" => "nu_andares",
                            "class" => "form-control",
                            "value" => set_value('nu_andares')
                        );
                        echo form_input($atributos);
                        echo "</div>";

                        echo "<div class='form-group col-md-4'>";
                        echo form_label("Andar do Imóvel: ", "nu_andar_apto");
                        $atributos = array(
                            "name" => "nu_andar_apto",
                            "id" => "nu_andar_apto",
                            "class" => "form-control",
                            "value" => set_value('nu_andar_apto')
                        );
                        echo form_input($atributos);
                        echo "</div>";

                        echo "</div>";

                        echo "<div class='row'>";
                        echo "<div class='form-group col-md-12'>";
                        echo form_label("Documentação do Imóvel: ", "documentacao");
                        $atributos = array(
                            "name" => "documentacao",
                            "id" => "documentacao",
                            "class" => "form-control",
                            "value" => set_value('texto')
                        );
                        echo form_textarea($atributos);
                        echo "</div>";
                        echo "</div>";

                        echo "<div class='row'>";
                        echo "<div class='form-group col-md-3'>";
                        echo form_label("Aceita Financiamento: ", "in_financiamento");
                        $atributos = array(
                            "name" => "in_financiamento",
                            "id" => "in_financiamento",
                            "class" => "form-control",
                            "value" => "1",
                            "checked" => FALSE
                        );
                        echo form_checkbox($atributos);
                        echo "</div>";

                        echo "<div class='form-group col-md-3'>";
                        echo form_label("Aceita Carta de Crédito: ", "in_carta_credito");
                        $atributos = array(
                            "name" => "in_carta_credito",
                            "id" => "in_carta_credito",
                            "class" => "form-control",
                            "value" => "1",
                            "checked" => FALSE
                        );
                        echo form_checkbox($atributos);
                        echo "</div>";

                        echo "<div class='form-group col-md-3'>";
                        echo form_label("Destaque: ", "in_destaque");
                        $atributos = array(
                            "name" => "in_destaque",
                            "id" => "in_destaque",
                            "class" => "form-control",
                            "value" => "1",
                            "checked" => FALSE
                        );
                        echo form_checkbox($atributos);
                        echo "</div>";

                        echo "<div class='form-group col-md-3'>";
                        echo form_label("Oportunidade: ", "in_oportunidade");
                        $atributos = array(
                            "name" => "in_oportunidade",
                            "id" => "in_oportunidade",
                            "class" => "form-control",
                            "value" => "1",
                            "checked" => FALSE
                        );
                        echo form_checkbox($atributos);
                        echo "</div>";
                        echo "</div>";

                        echo "    </div>";

                        echo "<div class='tab-pane fade' id='endereco'>";

                        echo "<hr>";

                        echo "<div class='row'>";

                        echo "<div class='form-group col-md-4'>";
                        echo form_label("CEP: ", "cep");
                        $atributos = array(
                            "name" => "cep",
                            "id" => "cep",
                            "class" => "form-control",
                            "value" => set_value('cep')
                        );
                        echo form_input($atributos);
                        echo "</div>";

                        echo "<div class='form-group col-md-4'>";
                        echo form_label("Logradouro: ", "logradouro");
                        $atributos = array(
                            "name" => "logradouro",
                            "id" => "logradouro",
                            "class" => "form-control",
                            "value" => set_value('logradouro')
                        );
                        echo form_input($atributos);
                        echo "</div>";

                        echo "<div class='form-group col-md-4'>";
                        echo form_label("Número: ", "numero");
                        $atributos = array(
                            "name" => "numero",
                            "id" => "numero",
                            "class" => "form-control",
                            "value" => set_value('numero')
                        );
                        echo form_input($atributos);
                        echo "</div>";
                        echo "</div>";

                        echo "<div class='row'>";
                        echo "<div class='form-group col-md-6'>";
                        echo form_label("Cidade: ", "id_cidade");
                        foreach ($cidades as $cidade) {
                            $array_cidade[$cidade->id_cidade] = $cidade->nome;
                        }
                        echo form_dropdown('id_cidade', $array_cidade, '', 'class="form-control" id="id_cidade"');
                        echo "</div>";

                        echo "<div class='form-group col-md-6'>";
                        echo form_label("Bairro: ", "id_bairro");
                        foreach ($bairros as $bairro) {
                            $array_bairro[$bairro->id_bairro] = $bairro->nome;
                        }
                        echo form_dropdown('id_bairro', $array_bairro, '', 'class="form-control" id="id_bairro"');
                        echo "</div>";
                        echo "</div>";

                        echo "</div>";

                        echo "<div class='tab-pane fade' id='edificio'>";

                        echo "<hr>";

                        echo "<div class='row'>";
                        echo "<div class='form-group col-md-12'>";
                        echo form_label("Fachada do Edifício: ", "fachada");
                        $atributos = array(
                            "name" => "fachada",
                            "id" => "fachada",
                            "class" => "form-control",
                            "value" => set_value('fachada')
                        );
                        echo form_textarea($atributos);
                        echo "</div>";
                        echo "</div>";

                        echo "<div class='row'>";
                        echo "<div class='form-group col-md-3'>";
                        echo form_label("Tem Piscina? ", "in_piscina");
                        $atributos = array(
                            "name" => "in_piscina",
                            "id" => "in_piscina",
                            "class" => "form-control",
                            "value" => "1",
                            "checked" => FALSE
                        );
                        echo form_checkbox($atributos);
                        echo "</div>";

                        echo "<div class='form-group col-md-3'>";
                        echo form_label("Tem Sauna? ", "in_sauna");
                        $atributos = array(
                            "name" => "in_sauna",
                            "id" => "in_sauna",
                            "class" => "form-control",
                            "value" => "1",
                            "checked" => FALSE
                        );
                        echo form_checkbox($atributos);
                        echo "</div>";

                        echo "<div class='form-group col-md-3'>";
                        echo form_label("Tem Churrasqueira? ", "in_churrasqueira");
                        $atributos = array(
                            "name" => "in_churrasqueira",
                            "id" => "in_churrasqueira",
                            "class" => "form-control",
                            "value" => "1",
                            "checked" => FALSE
                        );
                        echo form_checkbox($atributos);
                        echo "</div>";

                        echo "<div class='form-group col-md-3'>";
                        echo form_label("Tem Playground? ", "in_playground");
                        $atributos = array(
                            "name" => "in_playground",
                            "id" => "in_playground",
                            "class" => "form-control",
                            "value" => "1",
                            "checked" => FALSE
                        );
                        echo form_checkbox($atributos);
                        echo "</div>";
                        echo "</div>";

                        echo "<div class='row'>";
                        echo "<div class='form-group col-md-3'>";
                        echo form_label("Tem Salão de Festas? ", "in_salao_festas");
                        $atributos = array(
                            "name" => "in_salao_festas",
                            "id" => "in_salao_festas",
                            "class" => "form-control",
                            "value" => "1",
                            "checked" => FALSE
                        );
                        echo form_checkbox($atributos);
                        echo "</div>";

                        echo "<div class='form-group col-md-3'>";
                        echo form_label("Tem Elevador? ", "in_elevadores");
                        $atributos = array(
                            "name" => "in_elevadores",
                            "id" => "in_elevadores",
                            "class" => "form-control",
                            "value" => "1",
                            "checked" => FALSE
                        );
                        echo form_checkbox($atributos);
                        echo "</div>";
                        echo "</div>";

                        echo "</div>";

                        echo "      <div class='tab-pane fade' id='proprietario'>";

                        echo "<hr>";

                        echo "<div class='row'>";
                        echo "<div class='form-group col-md-2'>";
                        echo "<div class='form-group'>";
                        echo form_label("CPF: ", "cpf");
                        $atributos = array(
                            "name" => "cpf",
                            "id" => "cpf",
                            "class" => "form-control",
                            "value" => set_value('cpf')
                        );
                        echo form_input($atributos);
                        echo "</div>";
                        echo "</div>";

                        echo "<div class='form-group col-md-2'>";
                        echo "<div class='form-group'>";
                        echo form_label("Identidade: ", "identidade");
                        $atributos = array(
                            "name" => "identidade",
                            "id" => "identidade",
                            "class" => "form-control",
                            "value" => set_value('identidade')
                        );
                        echo form_input($atributos);
                        echo "</div>";
                        echo "</div>";

                        echo "<div class='form-group col-md-2'>";
                        echo "<div class='form-group'>";
                        echo form_label("Órgão Emissor: ", "orgao_emissor");
                        $atributos = array(
                            "name" => "orgao_emissor",
                            "id" => "orgao_emissor",
                            "class" => "form-control",
                            "value" => set_value('orgao_emissor')
                        );
                        echo form_input($atributos);
                        echo "</div>";
                        echo "</div>";

                        echo "<div class='form-group col-md-6'>";
                        echo "<div class='form-group'>";
                        echo form_label("Nome: ", "nome");
                        $atributos = array(
                            "name" => "nome",
                            "id" => "nome",
                            "class" => "form-control",
                            "value" => set_value('nome')
                        );
                        echo form_input($atributos);
                        echo "</div>";
                        echo "</div>";
                        echo "</div>";

                        echo "<div class='row'>";
                        echo "<div class='form-group col-md-3'>";
                        echo "<div class='form-group'>";
                        echo form_label("Telefone: ", "telefone");
                        $atributos = array(
                            "name" => "telefone",
                            "id" => "telefone",
                            "class" => "form-control",
                            "value" => set_value('telefone')
                        );
                        echo form_input($atributos);
                        echo "</div>";
                        echo "</div>";

                        echo "<div class='form-group col-md-3'>";
                        echo "<div class='form-group'>";
                        echo form_label("Celular: ", "celular");
                        $atributos = array(
                            "name" => "celular",
                            "id" => "celular",
                            "class" => "form-control",
                            "value" => set_value('celular')
                        );
                        echo form_input($atributos);
                        echo "</div>";
                        echo "</div>";

                        echo "<div class='form-group col-md-6'>";
                        echo "<div class='form-group'>";
                        echo form_label("Email: ", "email");
                        $atributos = array(
                            "name" => "email",
                            "id" => "email",
                            "class" => "form-control",
                            "value" => set_value('email')
                        );
                        echo form_input($atributos);
                        echo "</div>";
                        echo "</div>";
                        echo "</div>";

                        echo "<div class='row'>";
                        echo "<div class='form-group col-md-3'>";
                        echo "<div class='form-group'>";
                        echo form_label("CEP: ", "cep_proprietario");
                        $atributos = array(
                            "name" => "cep_proprietario",
                            "id" => "cep_proprietario",
                            "class" => "form-control",
                            "value" => set_value('cep_proprietario')
                        );
                        echo form_input($atributos);
                        echo "</div>";
                        echo "</div>";

                        echo "<div class='form-group col-md-6'>";
                        echo "<div class='form-group'>";
                        echo form_label("Logradouro: ", "logradouro_proprietario");
                        $atributos = array(
                            "name" => "logradouro_proprietario",
                            "id" => "logradouro_proprietario",
                            "class" => "form-control",
                            "value" => set_value('logradouro_proprietario')
                        );
                        echo form_input($atributos);
                        echo "</div>";
                        echo "</div>";

                        echo "<div class='form-group col-md-3'>";
                        echo "<div class='form-group'>";
                        echo form_label("Numero: ", "numero_proprietario");
                        $atributos = array(
                            "name" => "numero_proprietario",
                            "id" => "numero_proprietario",
                            "class" => "form-control",
                            "value" => set_value('numero_proprietario')
                        );
                        echo form_input($atributos);
                        echo "</div>";
                        echo "</div>";
                        echo "</div>";

                        echo "<div class='row'>";
                        echo "<div class='form-group col-md-6'>";
                        echo form_label("Cidade: ", "id_cidade_proprietario");
                        foreach ($cidades as $cidade) {
                            $array_cidade[$cidade->id_cidade] = $cidade->nome;
                        }
                        echo form_dropdown('id_cidade_proprietario', $array_cidade, '', 'class="form-control" id="id_cidade_proprietario"');
                        echo "</div>";

                        echo "<div class='form-group col-md-6'>";
                        echo form_label("Bairro: ", "id_bairro_proprietario");
                        foreach ($bairros as $bairro) {
                            $array_bairro[$bairro->id_bairro] = $bairro->nome;
                        }
                        echo form_dropdown('id_bairro_proprietario', $array_bairro, '', 'class="form-control" id="id_bairro_proprietario"');
                        echo "</div>";
                        echo "</div>";

                        echo "</div>";

                        echo "</div>";
                        echo "</div>";

                        echo "<hr>";

                        echo "<div class='row'>";
                        echo "<div class='col-md-12'>";
                        echo "<button type='submit' class='btn btn-primary'>Salvar</button>      ";
                        echo "<a href='" . base_url() . "administracao/imoveis/1" . "' class='btn btn-default'>Cancelar</a>";
                        echo "</div>";
                        echo "</div>";
                        //echo form_fieldset_close();
                        echo form_close();
                        //Fim do formulário...
                        ?>
                    </div>							
                </div>						
            </div>
        </div>
    </div>                                    
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $('#cpf').mask('000.000.000-00', {reverse: true});
        $('#identidade').mask('00000000-0', {reverse: true});
        $('#numero').mask('00000', {reverse: true});
        $('#cep').mask('00000-000', {reverse: true});
        $('#telefone').mask('(00)0000-0000', {reverse: true});
        $('#celular').mask('(00)00000-0000', {reverse: true});
        $("#cep").blur(function () {
            $.getJSON("https://viacep.com.br/ws/" + $("#cep").val() + "/json", function (dados) {
                if (!("erro" in dados)) {
                    $("#logradouro").val(dados.logradouro);
                    $("#numero").focus();
                } else {
                    alert("CEP não encontrado.");
                }
            });
        });
    });
</script>