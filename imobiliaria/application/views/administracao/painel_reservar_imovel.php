<div class="container">
    <div class="painel">
        <div class="row">
            <div class="col-sm-10">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2 class="panel-title">Reserva de Imóvel</h2>
                    </div>
                    <div class="panel-body">
                        <?php
                        $attributes = array('class' => 'formcadastros', 'id' => 'formcadastro');
                        echo form_open('administracao/imoveis/salvar_reserva_imovel/'.$imovel[0]->id_imovel, $attributes);

                        echo "<span class='validacoes'>" . validation_errors() . "</span>";

                        echo "<div class= 'row'>";
                        echo "   <ul class='nav nav-tabs'>";
                        echo "      <li class='nav active'>";
                        echo "        <a href='#imovel' data-toggle='tab'>Informações do Imovel</a>";
                        echo "      </li>";
                        echo "      <li class='nav'>";
                        echo "        <a href='#cliente' data-toggle='tab'>Dados do Cliente</a>";
                        echo "      </li>";
                        echo "      <li class='nav'>";
                        echo "        <a href='#reserva' data-toggle='tab'>Dados da Reserva</a>";
                        echo "      </li>";
                        echo "   </ul>";

                        echo form_hidden("id_imovel", $imovel[0]->id_imovel);

                        echo "<div class='tab-content'>";
                        echo "<div class='tab-pane fade in active' id='imovel'>";
                        echo "<br>";
                        echo "<div class='row'>";
                        echo "<div class='form-group col-md-6'>";
                        echo form_label("Categoria: ", "categoria");
                        $atributos = array('name' => 'categoria',
                            'id' => 'categoria',
                            'class' => 'form-control',
                            'value' => $imovel[0]->nome_categoria,
                            'disabled' => 'disabled'
                        );
                        echo form_input($atributos);
                        echo "</div>";

                        echo "<div class='form-group col-md-6'>";
                        echo "<img class='img-responsive img-thumbnail' width='200px' height='150px' src='" . base_url() . $imovel[0]->foto . "' alt='" . $imovel[0]->foto . "'>";
                        echo "</div>";
                        echo "</div>";

                        echo "<div class='row'>";

                        echo "<div class='form-group col-md-4'>";
                        echo form_label("Valor do Imóvel: ", "vlr_imovel");
                        $atributos = array(
                            "name" => "vlr_imovel",
                            "id" => "vlr_imovel",
                            "class" => "form-control",
                            'disabled' => 'disabled',
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
                            'disabled' => 'disabled',
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
                            'disabled' => 'disabled',
                            "value" => $imovel[0]->vlr_condominio
                        );
                        echo form_input($atributos);
                        echo "</div>";
                        echo "</div>";

                        echo "<div class='row'>";
                        echo "<div class='form-group col-md-4'>";
                        echo form_label("CEP: ", "cep_imovel");
                        $atributos = array(
                            "name" => "cep_imovel",
                            "id" => "cep_imovel",
                            "class" => "form-control",
                            'disabled' => 'disabled',
                            "value" => set_value($imovel[0]->cep)
                        );
                        echo form_input($atributos);
                        echo "</div>";

                        echo "<div class='form-group col-md-4'>";
                        echo form_label("Logradouro: ", "logradouro_imovel");
                        $atributos = array(
                            "name" => "logradouro_imovel",
                            "id" => "logradouro_imovel",
                            "class" => "form-control",
                            'disabled' => 'disabled',
                            "value" => set_value($imovel[0]->logradouro)
                        );
                        echo form_input($atributos);
                        echo "</div>";

                        echo "<div class='form-group col-md-4'>";
                        echo form_label("Número: ", "numero_imovel");
                        $atributos = array(
                            "name" => "numero_imovel",
                            "id" => "numero_imovel",
                            "class" => "form-control",
                            'disabled' => 'disabled',
                            "value" => set_value($imovel[0]->numero)
                        );
                        echo form_input($atributos);
                        echo "</div>";
                        echo "</div>";

                        echo "<div class='row'>";
                        echo "<div class='form-group col-md-6'>";
                        echo form_label("Cidade: ", "nome_cidade_imovel");
                        $atributos = array(
                            "name" => "nome_cidade_imovel",
                            "id" => "nome_cidade_imovel",
                            "class" => "form-control",
                            'disabled' => 'disabled',
                            "value" => set_value($imovel[0]->nome_cidade)
                        );
                        echo form_input($atributos);
                        echo "</div>";

                        echo "<div class='form-group col-md-6'>";
                        echo form_label("Bairro: ", "nome_bairro_imovel");
                        $atributos = array(
                            "name" => "nome_bairro_imovel",
                            "id" => "nome_bairro_imovel",
                            "class" => "form-control",
                            'disabled' => 'disabled',
                            "value" => set_value($imovel[0]->nome_bairro)
                        );
                        echo form_input($atributos);

                        echo "</div>";
                        echo "</div>";
                        echo "</div>";

                        echo "<div class='tab-pane fade' id='cliente'>";
                        echo "<br>";
                        echo "<div class='row'>";
                        echo "<div class='form-group col-md-4'>";
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

                        echo "<div class='form-group col-md-8'>";
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
                        echo form_label("CEP: ", "cep");
                        $atributos = array(
                            "name" => "cep",
                            "id" => "cep",
                            "class" => "form-control",
                            "value" => set_value('cep')
                        );
                        echo form_input($atributos);
                        echo "</div>";
                        echo "</div>";

                        echo "<div class='form-group col-md-6'>";
                        echo "<div class='form-group'>";
                        echo form_label("Logradouro: ", "logradouro");
                        $atributos = array(
                            "name" => "logradouro",
                            "id" => "logradouro",
                            "class" => "form-control",
                            "value" => set_value('logradouro')
                        );
                        echo form_input($atributos);
                        echo "</div>";
                        echo "</div>";

                        echo "<div class='form-group col-md-3'>";
                        echo "<div class='form-group'>";
                        echo form_label("Numero: ", "numero");
                        $atributos = array(
                            "name" => "numero",
                            "id" => "numero",
                            "class" => "form-control",
                            "value" => set_value('numero')
                        );
                        echo form_input($atributos);
                        echo "</div>";
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

                        echo "<div class='tab-pane fade' id='reserva'>";
                        echo "<br>";
                        echo "<div class='row'>";
                        echo "<div class='form-group col-md-3'>";
                        echo "<div class='form-group'>";
                        echo form_label('Data da Reserva: ', 'data');
                        $data = array('type' => 'date', 'name' => 'data', 'id' => 'data', 'class' => 'form-control');
                        echo form_input($data);
                        echo "</div>";
                        echo "</div>";
                        echo "</div>";

                        echo "<div class='row'>";
                        echo "<div class='form-group col-md-3'>";
                        echo "<div class='form-group'>";
                        echo form_label('Valor do Sinal: ', 'vlr_sinal');
                        $data = array('type' => 'number', 'name' => 'vlr_sinal', 'id' => 'vlr_sinal', 'class' => 'form-control');
                        echo form_input($data);
                        echo "</div>";
                        echo "</div>";
                        echo "</div>";

                        echo "</div>";

                        echo "<hr>";

                        echo "<div class='row'>";
                        echo "<div class='col-md-12'>";
                        echo "<button type='submit' class='btn btn-primary'>Salvar</button>   ";
                        echo "<a href='" . base_url() . "administracao/home/painel" . "' class='btn btn-default'>Cancelar</a>";
                        echo "</div>";
                        echo "</div>";

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
        $('#numero').mask('00000', {reverse: true});
        $('#cep').mask('00000-000', {reverse: true});
        $('#numero_imovel').mask('00000', {reverse: true});
        $('#cep_imovel').mask('00000-000', {reverse: true});
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