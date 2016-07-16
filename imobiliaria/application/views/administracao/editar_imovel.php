<div class="container">
    <div class="painel">
        <div class="row">
            <div class="col-md-10">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2 class="panel-title">Editar Imóvel</h2>
                    </div>
                    <div class="panel-body">
                        <?php
                        //echo heading("Editar Imóvel ", 2, "class='divisor'");

                        $attributes = array('class' => 'formcadastros', 'id' => 'formcadastro');
                        echo form_open_multipart('administracao/imoveis/salvar_alteracao/1', $attributes);

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

                        echo form_hidden("id_imovel", $imovel[0]->id_imovel);
                        echo form_hidden("id_proprietario", $imovel[0]->id_proprietario);

                        echo "<hr>";

                        echo "<div class='row'>";
                        echo "<div class='form-group col-md-6'>";
                        echo form_label("Categoria: ", "categoria");
                        foreach ($categorias as $categoria) {
                            $array_cat[$categoria->id_categoria] = $categoria->categoria;
                        }
                        echo form_dropdown('categoria', $array_cat, $imovel[0]->categoria, 'class="form-control" id="categoria"');
                        echo "</div>";

                        echo "<div class='form-group col-md-6'>";
                        echo "<img class='img-responsive img-thumbnail' width='200px' height='150px' src='" . base_url() . $imovel[0]->foto . "' alt='" . $imovel[0]->foto . "'>";
                        echo "<br>";
                        echo "<br>";
                        echo form_label("Alterar Foto:", "userfile");
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
                            "value" => $imovel[0]->desc_imovel
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
                            "value" => $imovel[0]->texto
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
                            "value" => $imovel[0]->vlr_imovel
                        );
                        echo form_input($atributos);
                        echo "</div>";

                        echo "<div class='form-group col-md-4'>";
                        echo form_label("Valor do IPTU: ", "vlr_iptu");
                        $atributos = array(
                            "name" => "vlr_iptu",
                            "id" => "vlr_iptu",
                            "class" => "form-control",
                            "value" => $imovel[0]->vlr_iptu
                        );
                        echo form_input($atributos);
                        echo "</div>";

                        echo "<div class='form-group col-md-4'>";
                        echo form_label("Valor do Condomínio: ", "vlr_condominio");
                        $atributos = array(
                            "name" => "vlr_condominio",
                            "id" => "vlr_condominio",
                            "class" => "form-control",
                            "value" => $imovel[0]->vlr_condominio
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
                            "value" => $imovel[0]->qt_quartos
                        );
                        echo form_input($atributos);
                        echo "</div>";

                        echo "<div class='form-group col-md-3'>";
                        echo form_label("Vagas de Garagem: ", "qt_garagens");
                        $atributos = array(
                            "name" => "qt_garagens",
                            "id" => "qt_garagens",
                            "class" => "form-control",
                            "value" => $imovel[0]->qt_garagens
                        );
                        echo form_input($atributos);
                        echo "</div>";

                        echo "<div class='form-group col-md-3'>";
                        echo form_label("Banheiros: ", "qt_banheiros");
                        $atributos = array(
                            "name" => "qt_banheiros",
                            "id" => "qt_banheiros",
                            "class" => "form-control",
                            "value" => $imovel[0]->qt_banheiros
                        );
                        echo form_input($atributos);
                        echo "</div>";

                        echo "<div class='form-group col-md-3'>";
                        echo form_label("Suite: ", "qt_suites");
                        $atributos = array(
                            "name" => "qt_suites",
                            "id" => "qt_suites",
                            "class" => "form-control",
                            "value" => $imovel[0]->qt_suites
                        );
                        echo form_input($atributos);
                        echo "</div>";
                        echo "</div>";

                        echo "<div class='row'>";
                        echo "<div class='form-group col-md-4'>";
                        echo form_label("Ano de Construção: ", "ano_contrucao");
                        $atributos = array(
                            "name" => "ano_contrucao",
                            "id" => "ano_contrucao",
                            "class" => "form-control",
                            "value" => $imovel[0]->ano_contrucao
                        );
                        echo form_input($atributos);
                        echo "</div>";

                        echo "<div class='form-group col-md-4'>";
                        echo form_label("Andares: ", "nu_andares");
                        $atributos = array(
                            "name" => "nu_andares",
                            "id" => "nu_andares",
                            "class" => "form-control",
                            "value" => $imovel[0]->nu_andares
                        );
                        echo form_input($atributos);
                        echo "</div>";

                        echo "<div class='form-group col-md-4'>";
                        echo form_label("Andar do Imóvel: ", "nu_andar_apto");
                        $atributos = array(
                            "name" => "nu_andar_apto",
                            "id" => "nu_andar_apto",
                            "class" => "form-control",
                            "value" => $imovel[0]->nu_andar_apto
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
                            "value" => $imovel[0]->documentacao
                        );
                        echo form_textarea($atributos);
                        echo "</div>";
                        echo "</div>";

                        echo "<div class='row'>";
                        if ($imovel[0]->in_financiamento == 1) {
                            $in_financiamento = TRUE;
                        } else {
                            $in_financiamento = FALSE;
                        }
                        echo "<div class='form-group col-md-3'>";
                        echo form_label("Aceita Financiamento: ", "in_financiamento");
                        $atributos = array(
                            "name" => "in_financiamento",
                            "id" => "in_financiamento",
                            "class" => "form-control",
                            "value" => "1",
                            "checked" => $in_financiamento
                        );
                        echo form_checkbox($atributos);
                        echo "</div>";

                        if ($imovel[0]->in_carta_credito == 1) {
                            $in_carta_credito = TRUE;
                        } else {
                            $in_carta_credito = FALSE;
                        }
                        echo "<div class='form-group col-md-3'>";
                        echo form_label("Aceita Carta de Crédito: ", "in_carta_credito");
                        $atributos = array(
                            "name" => "in_carta_credito",
                            "id" => "in_carta_credito",
                            "class" => "form-control",
                            "value" => "1",
                            "checked" => $in_carta_credito
                        );
                        echo form_checkbox($atributos);
                        echo "</div>";

                        if ($imovel[0]->in_destaque == 1) {
                            $in_destaque = TRUE;
                        } else {
                            $in_destaque = FALSE;
                        }
                        echo "<div class='form-group col-md-3'>";
                        echo form_label("Destaque: ", "in_destaque");
                        $atributos = array(
                            "name" => "in_destaque",
                            "id" => "in_destaque",
                            "class" => "form-control",
                            "value" => "1",
                            "checked" => $in_destaque
                        );
                        echo form_checkbox($atributos);
                        echo "</div>";

                        if ($imovel[0]->in_oportunidade == 1) {
                            $in_oportunidade = TRUE;
                        } else {
                            $in_oportunidade = FALSE;
                        }
                        echo "<div class='form-group col-md-3'>";
                        echo form_label("Oportunidade: ", "in_oportunidade");
                        $atributos = array(
                            "name" => "in_oportunidade",
                            "id" => "in_oportunidade",
                            "class" => "form-control",
                            "value" => "1",
                            "checked" => $in_oportunidade
                        );
                        echo form_checkbox($atributos);
                        echo "</div>";
                        echo "</div>";

                        echo form_label("Foto", "userfile");
                        echo "<br/>";
                        $atributos = array(
                            "name" => "userfile",
                            "id" => "userfile"
                        );
                        echo form_upload($atributos);
                        echo "<br/>";
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

                        echo "<div class='form-group col-md-4'>";
                        echo form_label("Cidade: ", "id_cidade");
                        foreach ($cidades as $cidade) {
                            $array_cidade[$cidade->id_cidade] = $cidade->nome;
                        }
                        echo form_dropdown('id_cidade', $array_cidade, $imovel[0]->id_cidade, 'class="form-control" id="id_cidade"');
                        echo "</div>";

                        echo "<div class='form-group col-md-4'>";
                        echo form_label("Bairro: ", "id_bairro");
                        foreach ($bairros as $bairro) {
                            $array_bairro[$bairro->id_bairro] = $bairro->nome;
                        }
                        echo form_dropdown('id_bairro', $array_bairro, $imovel[0]->id_bairro, 'class="form-control" id="id_bairro"');
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
                            "value" => $imovel[0]->fachada
                        );
                        echo form_textarea($atributos);
                        echo "</div>";
                        echo "</div>";

                        echo "<div class='row'>";
                        if ($imovel[0]->in_piscina == 1) {
                            $in_piscina = TRUE;
                        } else {
                            $in_piscina = FALSE;
                        }
                        echo "<div class='form-group col-md-3'>";
                        echo form_label("Tem Piscina? ", "in_piscina");
                        $atributos = array(
                            "name" => "in_piscina",
                            "id" => "in_piscina",
                            "class" => "form-control",
                            "value" => "1",
                            "checked" => $in_piscina
                        );
                        echo form_checkbox($atributos);
                        echo "</div>";

                        if ($imovel[0]->in_sauna == 1) {
                            $in_sauna = TRUE;
                        } else {
                            $in_sauna = FALSE;
                        }
                        echo "<div class='form-group col-md-3'>";
                        echo form_label("Tem Sauna? ", "in_sauna");
                        $atributos = array(
                            "name" => "in_sauna",
                            "id" => "in_sauna",
                            "class" => "form-control",
                            "value" => "1",
                            "checked" => $in_sauna
                        );
                        echo form_checkbox($atributos);
                        echo "</div>";

                        if ($imovel[0]->in_churrasqueira == 1) {
                            $in_churrasqueira = TRUE;
                        } else {
                            $in_churrasqueira = FALSE;
                        }
                        echo "<div class='form-group col-md-3'>";
                        echo form_label("Tem Churrasqueira? ", "in_churrasqueira");
                        $atributos = array(
                            "name" => "in_churrasqueira",
                            "id" => "in_churrasqueira",
                            "class" => "form-control",
                            "value" => "1",
                            "checked" => $in_churrasqueira
                        );
                        echo form_checkbox($atributos);
                        echo "</div>";

                        if ($imovel[0]->in_playground == 1) {
                            $in_playground = TRUE;
                        } else {
                            $in_playground = FALSE;
                        }
                        echo "<div class='form-group col-md-3'>";
                        echo form_label("Tem Playground? ", "in_playground");
                        $atributos = array(
                            "name" => "in_playground",
                            "id" => "in_playground",
                            "class" => "form-control",
                            "value" => "1",
                            "checked" => $in_playground
                        );
                        echo form_checkbox($atributos);
                        echo "</div>";
                        echo "</div>";

                        echo "<div class='row'>";
                        if ($imovel[0]->in_salao_festas == 1) {
                            $in_salao_festas = TRUE;
                        } else {
                            $in_salao_festas = FALSE;
                        }
                        echo "<div class='form-group col-md-3'>";
                        echo form_label("Tem Salão de Festas? ", "in_salao_festas");
                        $atributos = array(
                            "name" => "in_salao_festas",
                            "id" => "in_salao_festas",
                            "class" => "form-control",
                            "value" => "1",
                            "checked" => $in_salao_festas
                        );
                        echo form_checkbox($atributos);
                        echo "</div>";

                        if ($imovel[0]->in_elevadores == 1) {
                            $in_elevadores = TRUE;
                        } else {
                            $in_elevadores = FALSE;
                        }
                        echo "<div class='form-group col-md-3'>";
                        echo form_label("Tem Elevador? ", "in_elevadores");
                        $atributos = array(
                            "name" => "in_elevadores",
                            "id" => "in_elevadores",
                            "class" => "form-control",
                            "value" => "1",
                            "checked" => $in_elevadores
                        );
                        echo form_checkbox($atributos);
                        echo "</div>";
                        echo "</div>";
                        echo "</div>";

                        echo "<div class='tab-pane fade' id='proprietario'>";

                        echo "<hr>";

                        echo "<div class='row'>";
                        echo "<div class='form-group col-md-2'>";
                        echo "<div class='form-group'>";
                        echo form_label("CPF: ", "cpf");
                        $atributos = array(
                            "name" => "cpf",
                            "id" => "cpf",
                            "class" => "form-control",
                            "value" => $proprietario[0]->cpf
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
                            "value" => $proprietario[0]->identidade
                        );
                        echo form_input($atributos);
                        echo "</div>";
                        echo "</div>";

                        echo "<div class='form-group col-md-8'>";
                        echo "<div class='form-group'>";
                        echo form_label("Nome: ", "nome");
                        $atributos = array(
                            "name" => "nome",
                            "id" => "nome",
                            "class" => "form-control",
                            "value" => $proprietario[0]->nome
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
                            "value" => $proprietario[0]->telefone
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
                            "value" => $proprietario[0]->celular
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
                            "value" => $proprietario[0]->email
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
                            "value" => $proprietario[0]->cep
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
                            "value" => $proprietario[0]->logradouro
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
                            "value" => $proprietario[0]->numero
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
                        echo form_dropdown('id_cidade_proprietario', $array_cidade, $proprietario[0]->id_cidade, 'class="form-control" id="id_cidade_proprietario"');
                        echo "</div>";

                        echo "<div class='form-group col-md-6'>";
                        echo form_label("Bairro: ", "id_bairro_proprietario");
                        foreach ($bairros as $bairro) {
                            $array_bairro[$bairro->id_bairro] = $bairro->nome;
                        }
                        echo form_dropdown('id_bairro_proprietario', $array_bairro, $proprietario[0]->id_bairro, 'class="form-control" id="id_bairro_proprietario"');
                        echo "</div>";
                        echo "</div>";

                        echo "      </div>";

                        echo "   </div>";
                        echo "</div>";

                        echo "<hr>";

                        echo "<div class='row'>";
                        echo "<div class='col-md-12'>";
                        echo "<button type='submit' class='btn btn-primary'>Salvar</button>      ";
                        echo "<a href='" . base_url() . "administracao/imoveis/1" . "' class='btn btn-default'>Cancelar</a>";
                        echo "</div>";
                        echo "</div>";

                        echo form_fieldset_close();
                        echo form_close();
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