<div class="container">
    <div class="painel">
        <div class="row">
            <div class="col-sm-10">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2 class="panel-title">Manter Fotos do Imóvel</h2>
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
                        //echo heading("Fotos do Imóvel ", 2, "class='divisor'");

                        $attributes = array('class' => 'formcadastros', 'id' => 'formcadastro');

                        echo form_open_multipart('administracao/imoveis/salvar_foto/1', $attributes);

                        echo "<span class='validacoes'>" . validation_errors() . "</span>";

                        echo form_hidden("id_imovel", $imovel[0]->id_imovel);

                        echo "<div class='form-group'>";
                        echo form_label("Foto: ", "userfile");
                        echo "<br/>";

                        $atributos = array("name" => "userfile",
                            "id" => "userfile",
                            "class" => "form-control",
                        );
                        echo form_upload($atributos);
                        echo "<br/>";
                        echo "</div>";

                        echo form_submit("btnSubmit", "Cadastrar Foto", "class='btn btn-primary'");
                        echo form_close();

                        //Início da listagem de fotos do imovel               
                        $array_fotos = array();
                        $atributos = array("width" => "300", "heigth" => "200");
                        foreach ($fotos as $foto) {
                            $array_fotos[] = array(
                                $foto->id_foto,
                                "<img class='img-responsive img-thumbnail' width='200px' height='150px' src='" . base_url() . $foto->foto . "' alt='" . $foto->foto . "'>",
                                anchor(
                                        base_url() . "administracao/imoveis/excluir_foto/" . $foto->id_foto . "/" . $foto->id_imovel, "Excluir Foto", array('onclick' => "return confirm('Confirma a exclusão desta Foto do Imóvel?');",
                                    'class' => "btn btn-danger btn-xs")
                                )
                            );
                        }

                        $template = array('table_open' => '<table class="table table-striped">');
                        $this->table->set_template($template);
                        $this->table->set_heading('Código', 'Arquivo da Foto', 'Ações');
                        echo "<div class='wrapertable-responsive wraper_table'>";
                        echo $this->table->generate($array_fotos);
                        echo "</div>";
                        ?>
                    </div>							
                </div>						
            </div>
        </div>
    </div>                                    
</div>