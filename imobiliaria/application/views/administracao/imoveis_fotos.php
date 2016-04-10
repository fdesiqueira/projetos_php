<div id="content">
	<?php		
            echo heading("Fotos do Imóvel ",2,"class='divisor'");

            $attributes = array('class' => 'formcadastros', 'id' => 'formcadastro');

            echo form_open_multipart('administracao/imoveis/salvar_foto/1', $attributes);					

            echo "<span class='validacoes'>" . validation_errors() . "</span>";			
            echo form_fieldset("Informações do Imóvel");
            echo form_hidden("id_imovel",$imovel[0]->id_imovel);

            echo "<div class='form-group'>";
            echo form_label("Foto: ","userfile");
            echo "<br/>";

            $atributos = array( "name"  =>  "userfile",
                                "id"    =>  "userfile",
                                "class" =>  "form-control",
            );
            echo form_upload($atributos);
            echo "<br/>";
            echo "</div>";

            echo form_submit("btnSubmit","Cadastrar Foto", "class='btn btn-primary'");                                
            echo form_fieldset_close();
            echo form_close();
            
            //Início da listagem de fotos do imovel               
            $array_fotos = array();
            $atributos = array("width" => "300", "heigth" => "200");
            foreach($fotos as $foto){
                $array_fotos[] = array(				
                        $foto->id_foto,				
                        "<img class='img-responsive img-thumbnail' width='200px' height='150px' src='".base_url().$foto->foto."' alt='".$foto->foto."'>",				
                        anchor(
                                base_url() . "administracao/imoveis/excluir_foto/" .$foto->id_foto."/".$foto->id_imovel,
                                "Excluir Foto",
                                array('onclick'=>"return confirm('Confirma a exclusão desta Foto do Imóvel?');",
                                'class' => "btn btn-danger btn-xs")				
                        )	
                );
            }
            
            $template = array ( 'table_open' => '<table class="table table-striped">' );		
            $this->table->set_template($template);
            $this->table->set_heading('Código', 'Arquivo da Foto', 'Ações');
            echo "<div class='wrapertable-responsive wraper_table'>";
            echo $this->table->generate($array_fotos);
            echo "</div>";                 
	?>
</div>