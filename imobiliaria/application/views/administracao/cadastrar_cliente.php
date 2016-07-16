<div class="container">
    <div class="painel">
        <div class="row">
            <div class="col-sm-10">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2 class="panel-title">Cadastro de Clientes</h2>
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
                        echo heading("Cadastrar Cliente ", 2, "class='divisor'");

                        $attributes = array('class' => 'formcadastros', 'id' => 'formcadastro');
                        echo form_open('administracao/clientes/adicionar/1', $attributes);

                        echo "<span class='validacoes'>" . validation_errors() . "</span>";

                        echo form_fieldset("Informações do Cliente");

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

                        echo "<div class='row'>";
                        echo "<div class='col-md-12'>";
                        echo "<button type='submit' class='btn btn-primary'>Salvar</button>    ";
                        echo "<a href='" . base_url() . "administracao/clientes/1" . "' class='btn btn-default'>Cancelar</a>";
                        echo "</div>";
                        echo "</div>";

                        echo form_fieldset_close();
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