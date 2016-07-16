<div class="container">
    <div class="painel">
        <div class="row">
            <div class="col-sm-10">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2 class="panel-title">Cadastro de Categorias</h2>
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
                        echo heading("Cadastrar Categoria ", 2, "class='divisor'");

                        $attributes = array('class' => 'formcadastros', 'id' => 'formcadastro');
                        echo form_open('administracao/categorias/adicionar/1', $attributes);

                        echo "<span class='validacoes'>" . validation_errors() . "</span>";

                        echo form_fieldset("Informações da Categoria");

                        echo form_hidden("id_categoria", $categorias[0]->id_categoria);

                        echo "<div class='form-group'>";
                        echo form_label("Categoria: ", "categoria");
                        $atributos = array(
                            "name" => "categoria",
                            "id" => "categoria",
                            "class" => "form-control",
                            "value" => ""
                        );
                        echo form_input($atributos);
                        echo "</div>";

                        echo "<div class='form-group'>";
                        echo form_label("Descrição: ", "slug_categoria");
                        $atributos = array(
                            "name" => "slug_categoria",
                            "id" => "slug_categoria",
                            "class" => "form-control",
                            "value" => ""
                        );
                        echo form_input($atributos);
                        echo "</div>";

                        echo "<div class='row'>";
                        echo "<div class='col-md-12'>";
                        echo "<button type='submit' class='btn btn-primary'>Salvar</button>    ";
                        echo "<a href='" . base_url() . "administracao/categorias/1" . "' class='btn btn-default'>Cancelar</a>";
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
        $('#cep').mask('00000-000', {reverse: true});
        $('#telefone').mask('(00)0000-00000', {reverse: true});
        $('#celular').mask('(00)0000-00000', {reverse: true});
    });
</script>
