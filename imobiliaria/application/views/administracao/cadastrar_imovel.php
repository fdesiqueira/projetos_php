<div id="content">
	<?php
		echo heading("Cadastrar Imóvel ",2, "class='divisor'");
		
		$attributes = array('class' => 'formcadastros', 'id' => 'formcadastro');
		
		echo form_open_multipart('administracao/imoveis/adicionar/1', $attributes);		
			
			echo "<span class='validacoes'>" . validation_errors() . "</span>";
			
			echo form_fieldset("Informações do Imóvel");				
				
			echo "<div class='row'>";				
					echo "<div class='form-group col-md-6'>";
					echo form_label("Categoria: ","categoria");						
					foreach($categorias as $categoria){
						$array_cat[$categoria->id_categoria] = $categoria->categoria;
					}				
					echo form_dropdown('categoria', $array_cat, '', 'class="form-control" id="categoria"');
					echo "</div>";
					
					echo "<div class='form-group col-md-6'>";
					echo form_label("Cliente: ","id_cliente");							
					foreach($clientes as $cliente){
						$array_cli[$cliente->id_cliente] = $cliente->nome;
					}				
					echo form_dropdown('id_cliente', $array_cli, '', 'class="form-control" id="id_cliente"');
					echo "</div>";				
			echo "</div>";
				
			echo "<div class='row'>";	
				echo "<div class='form-group col-md-6'>";
				echo form_label("Cidade: ","id_cidade");				
				foreach($cidades as $cidade){
					$array_cidade[$cidade->id_cidade] = $cidade->nome;
				}				
				echo form_dropdown('id_cidade', $array_cidade, '', 'class="form-control" id="id_cidade"');
				echo "</div>";
				
				echo "<div class='form-group col-md-6'>";
				echo form_label("Bairro: ","id_bairro");				
				foreach($bairros as $bairro){
					$array_bairro[$bairro->id_bairro] = $bairro->nome;
				}				
				echo form_dropdown('id_bairro', $array_bairro, '', 'class="form-control" id="id_bairro"');
				echo "</div>";
			echo "</div>";
				
				echo "<div class='form-group'>";
				echo form_label("Descrição: ","desc_imovel");
				$atributos = array(
					"name"	=>	"desc_imovel",
					"id"	=>	"desc_imovel",
					"class" =>  "form-control",
					"value"	=>	set_value('desc_imovel')
				);
				echo form_input($atributos);
				echo "</div>";
				
				echo "<div class='form-group'>";
				echo form_label("Detalhes do Imóvel: ","texto");
				$atributos = array(
					"name"	=>	"texto",
					"id"	=>	"texto",
					"class" =>  "form-control",
					"value"	=>	set_value('texto')
				);
				echo form_textarea($atributos);
				echo "</div>";
				
				echo "<div class='row'>";	
					echo "<div class='form-group col-md-4'>";
					echo form_label("Preço do Imóvel: ","vlr_imovel");
					$atributos = array(
						"name"	=>	"vlr_imovel",
						"id"	=>	"vlr_imovel",
						"class" =>  "form-control",
						"value"	=>	set_value('vlr_imovel')
					);
					echo form_input($atributos);
					echo "</div>";
					
					echo "<div class='form-group col-md-4'>";
					echo form_label("Quartos: ","qt_quartos");
					$atributos = array(
						"name"	=>	"qt_quartos",
						"id"	=>	"qt_quartos",
						"class" =>  "form-control",
						"value"	=>	set_value('qt_quartos')
					);
					echo form_input($atributos);
					echo "</div>";
					
					echo "<div class='form-group col-md-4'>";
					echo form_label("Vagas de Garagem: ","qt_garagens");
					$atributos = array(
						"name"	=>	"qt_garagens",
						"id"	=>	"qt_garagens",
						"class" =>  "form-control",
						"value"	=>	set_value('qt_garagens')
					);
					echo form_input($atributos);
					echo "</div>";
				echo "</div>";
				
				echo "<div class='row'>";
					echo "<div class='form-group col-md-3'>";
					echo form_label("Aceita Financiamento: ","in_financiamento");
					$atributos = array(
					    "name"        => "in_financiamento",
					    "id"          => "in_financiamento",
					    "class" 	  =>  "form-control",
					    "value"       => "1",
					    "checked"     => FALSE
					    );
					echo form_checkbox($atributos);
					echo "</div>";
					
					echo "<div class='form-group col-md-3'>";
					echo form_label("Aceita Carta de Crédito: ","in_carta_credito");
					$atributos = array(
					    "name"        => "in_carta_credito",
					    "id"          => "in_carta_credito",
					    "class" 	  =>  "form-control",
					    "value"       => "1",
					    "checked"     => FALSE
					    );
					echo form_checkbox($atributos);
					echo "</div>";
					
					echo "<div class='form-group col-md-3'>";
					echo form_label("Destaque: ","in_destaque");
					$atributos = array(
					    "name"        => "in_destaque",
					    "id"          => "in_destaque",
					    "class" 	  =>  "form-control",
					    "value"       => "1",
					    "checked"     => FALSE
					    );
					echo form_checkbox($atributos);
					echo "</div>";
					
					echo "<div class='form-group col-md-3'>";
					echo form_label("Oportunidade: ","in_oportunidade");
					$atributos = array(
					    "name"        => "in_oportunidade",
					    "id"          => "in_oportunidade",
					    "class" 	  =>  "form-control",
					    "value"       => "1",
					    "checked"     => FALSE
					    );
					echo form_checkbox($atributos);
					echo "</div>";
				echo "</div>";					
                                
                                echo form_label("Foto","userfile");
                                echo "<br/>";
                                $atributos = array(
                                     "name" => "userfile",
                                     "id"   => "userfile"
                                );
				echo form_upload($atributos);
				echo    "<br/>";                                
				
				echo "<div class='row'>";
				echo    "<div class='col-md-12'>";
				echo        "<button type='submit' class='btn btn-primary'>Salvar</button>      ";
				echo        "<a href='".base_url()."administracao/imoveis/1"."' class='btn btn-default'>Cancelar</a>";
				echo    "</div>";
				echo "</div>";
			echo form_fieldset_close();
		echo form_close();
		//Fim do formulário...
	
	?>
</div>