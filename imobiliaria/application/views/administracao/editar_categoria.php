<div class="container">
    <div class="painel">
        <div class="row">
            <div class="col-md-10">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2 class="panel-title">Editar Categoria</h2>
                    </div>
                    <div class="panel-body">
                        <?php
                        //echo heading("Editar Categoria ", 2, "class='divisor'");

                        $attributes = array('class' => 'formcadastros', 'id' => 'formcadastro');
                        echo form_open('administracao/categorias/salvar_alteracao/'.$categorias[0]->id_categoria, $attributes);

                        echo "<span class='validacoes'>" . validation_errors() . "</span>";

                        echo form_fieldset("Informações da Categoria");

                        echo form_hidden("id_categoria", $categorias[0]->id_categoria);

                        echo "<div class='form-group'>";
                        echo form_label("Categoria: ", "categoria");
                        $atributos = array(
                            "name" => "categoria",
                            "id" => "categoria",
                            "class" => "form-control",
                            "value" => $categorias[0]->categoria
                        );
                        echo form_input($atributos);
                        echo "</div>";

                        echo "<div class='form-group'>";
                        echo form_label("Descrição: ", "slug_categoria");
                        $atributos = array(
                            "name" => "slug_categoria",
                            "id" => "slug_categoria",
                            "class" => "form-control",
                            "value" => $categorias[0]->slug_categoria
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
