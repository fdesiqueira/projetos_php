<div class="container">
    <div class="painel">
        <div class="row">
            <div class="col-md-10">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2 class="panel-title">Cadastro de Corretores</h2>
                    </div>
                    <div class="panel-body">
                        <div> 
                            <?php if ($this->session->flashdata("sucesso")) : ?>
                                <p class="alert alert-success"><?= $this->session->flashdata("sucesso") ?></p>
                            <?php endif ?>
                            <?php if ($this->session->flashdata("erro")) : ?>
                                <p class="alert alert-danger"><?= $this->session->flashdata("erro") ?></p>
                            <?php endif ?>      
                        </div>
                        <?php
                        //echo heading("Corretores de Imóveis", 3, "class='divisor'");
                        //Início da listagem de usuarios...
                        $array_usuarios = array();
                        foreach ($usuarios as $usuario) {
                            $array_usuarios[] = array(
                                $usuario->id_usuario,
                                $usuario->usuario,
                                $usuario->creci,
                                $usuario->email,
                                anchor(
                                        base_url() . "administracao/usuarios/excluir/" . $usuario->id_usuario, "Excluir", array('onclick' => "return confirm('Confirma a exclusão deste Corretor?');",
                                    'class' => "btn btn-danger btn-xs")
                                ) . "  " .
                                anchor(
                                        base_url() . "administracao/usuarios/editar/" . $usuario->id_usuario, "Editar", array('class' => "btn btn-warning btn-xs")
                                ) . "  " .
                                anchor(
                                        base_url() . "administracao/usuarios/consultar/" . $usuario->id_usuario, "Consultar", array('class' => "btn btn-success btn-xs")
                                )
                            );
                        }

                        $template = array('table_open' => '<table class="table table-striped">');
                        $this->table->set_template($template);
                        $this->table->set_heading('Código', 'Nome do Corretor', 'CRECI', 'Email', 'Ações');
                        echo "<div class='wrapertable-responsive wraper_table'>";
                        echo $this->table->generate($array_usuarios);
                        echo "</div>";

                        echo "<div id='paginacao'>" . $paginacao . "</div>";

                        //echo heading("Cadastrar Corretor de Imóveis ", 3, "class='divisor'");

                        $attributes = array('class' => 'formcadastros', 'id' => 'formcadastro');
                        echo form_open('administracao/usuarios/adicionar', $attributes);

                        echo "<span class='validacoes'>" . validation_errors() . "</span>";

                        //echo form_fieldset("Informações do Usuário");

                        echo "<div class='row'>";
                        echo "<div class='form-group col-md-4'>";
                        echo "<div class='form-group'>";
                        echo form_label("CRECI", "creci");
                        $atributos = array(
                            "name" => "creci",
                            "id" => "creci",
                            "size" => "5",
                            "class" => "form-control",
                            "value" => set_value('creci')
                        );
                        echo form_input($atributos);
                        echo "</div>";
                        echo "</div>";

                        echo "<div class='form-group col-md-8'>";
                        echo "<div class='form-group'>";
                        echo form_label("Email", "email");
                        $atributos = array(
                            "name" => "email",
                            "id" => "email",
                            "size" => "60",
                            "length" => "60",
                            "class" => "form-control",
                            "value" => set_value('email')
                        );
                        echo form_input($atributos);
                        echo "</div>";
                        echo "</div>";
                        echo "</div>";

                        echo "<div class='row'>";
                        echo "<div class='form-group col-md-6'>";
                        echo "<div class='form-group'>";
                        echo form_label("Identidade", "identidade");
                        $atributos = array(
                            "name" => "identidade",
                            "id" => "identidade",
                            "class" => "form-control",
                            "value" => set_value('identidade')
                        );
                        echo form_input($atributos);
                        echo "</div>";
                        echo "</div>";

                        echo "<div class='form-group col-md-6'>";
                        echo "<div class='form-group'>";
                        echo form_label("CPF", "cpf");
                        $atributos = array(
                            "name" => "cpf",
                            "id" => "cpf",
                            "size" => "10",
                            "class" => "form-control",
                            "value" => set_value('cpf')
                        );
                        echo form_input($atributos);
                        echo "</div>";
                        echo "</div>";
                        echo "</div>";

                        echo "<div class='row'>";
                        echo "<div class='form-group col-md-8'>";
                        echo "<div class='form-group'>";
                        echo form_label("Nome", "usuario");
                        $atributos = array(
                            "name" => "usuario",
                            "id" => "usuario",
                            "class" => "form-control",
                            "value" => set_value('usuario')
                        );
                        echo form_input($atributos);
                        echo "</div>";
                        echo "</div>";

                        echo "<div class='form-group col-md-4'>";
                        echo "<div class='form-group'>";
                        echo form_label("Senha", "senha");
                        $atributos = array(
                            "name" => "senha",
                            "id" => "senha",
                            "size" => "10",
                            "class" => "form-control",
                            "value" => set_value('senha')
                        );
                        echo form_input($atributos);
                        echo "</div>";
                        echo "</div>";
                        echo "</div>";

                        echo "<div class='row'>";
                        echo "<div class='form-group col-md-6'>";
                        echo "<div class='form-group'>";
                        echo form_label("Telefone", "telefone");
                        $atributos = array(
                            "name" => "telefone",
                            "id" => "telefone",
                            "class" => "form-control",
                            "value" => set_value('telefone')
                        );
                        echo form_input($atributos);
                        echo "</div>";
                        echo "</div>";

                        echo "<div class='form-group col-md-6'>";
                        echo "<div class='form-group'>";
                        echo form_label("Celular", "celular");
                        $atributos = array(
                            "name" => "celular",
                            "id" => "celular",
                            "size" => "10",
                            "class" => "form-control",
                            "value" => set_value('celular')
                        );
                        echo form_input($atributos);
                        echo "</div>";
                        echo "</div>";
                        echo "</div>";

                        echo form_submit("btnSubmit", "Cadastrar Corretor", "class='btn btn-primary'");
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
        $('#cep').mask('00000-000', {reverse: true});
        $('#telefone').mask('(00)0000-00000', {reverse: true});
        $('#celular').mask('(00)0000-00000', {reverse: true});
    });
</script>