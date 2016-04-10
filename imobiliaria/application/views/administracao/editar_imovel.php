<div id="content">
	<?php
		echo heading("Editar Imóvel ", 2,"class='divisor'");
		
		$attributes = array('class' => 'formcadastros', 'id' => 'formcadastro');
		echo form_open_multipart('administracao/imoveis/salvar_alteracao', $attributes);		
			
			echo "<span class='validacoes'>" . validation_errors() . "</span>";
			
			echo form_fieldset("Informações do Imóvel");
				
				echo form_hidden("id_imovel",$imovel[0]->id_imovel);
				
				echo "<div class='row'>";
					echo "<div class='form-group col-md-6'>";
					echo form_label("Categoria: ","categoria");				
					foreach($categorias as $categoria){
						$array_cat[$categoria->id_categoria] = $categoria->categoria;
					}				
					echo form_dropdown('categoria', $array_cat, $imovel[0]->categoria, 'class="form-control" id="categoria"');
					echo "</div>";
					
					echo "<div class='form-group col-md-6'>";
					echo form_label("Cliente: ","id_cliente");				
					foreach($clientes as $cliente){
						$array_cli[$cliente->id_cliente] = $cliente->nome;
					}				
					echo form_dropdown('id_cliente', $array_cli, $imovel[0]->id_cliente, 'class="form-control" id="id_cliente"');
					echo "</div>";
				echo "</div>";
				
				echo "<div class='row'>";
					echo "<div class='form-group col-md-6'>";
					echo form_label("Cidade: ","id_cidade");				
					foreach($cidades as $cidade){
						$array_cidade[$cidade->id_cidade] = $cidade->nome;
					}				
					echo form_dropdown('id_cidade', $array_cidade, $imovel[0]->id_cidade, 'class="form-control" id="id_cidade"');
					echo "</div>";
					
					echo "<div class='form-group col-md-6'>";
					echo form_label("Bairro: ","id_bairro");				
					foreach($bairros as $bairro){
						$array_bairro[$bairro->id_bairro] = $bairro->nome;
					}				
					echo form_dropdown('id_bairro', $array_bairro, $imovel[0]->id_bairro, 'class="form-control" id="id_bairro"');
					echo "</div>";
				echo "</div>";
				
				echo "<div class='form-group'>";
				echo form_label("Descrição: ","desc_imovel");
				$atributos = array(
					"name"	=>	"desc_imovel",
					"id"	=>	"desc_imovel",
					"class" =>  "form-control",
					"value"	=>	$imovel[0]->desc_imovel
				);
				echo form_input($atributos);
				echo "</div>";
				
				echo "<div class='form-group'>";
				echo form_label("Detalhes do Imóvel: ","texto");
				$atributos = array(
					"name"	=>	"texto",
					"id"	=>	"texto",
					"class" =>  "form-control",
					"value"	=>	$imovel[0]->texto
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
						"value"	=>	$imovel[0]->vlr_imovel
					);
					echo form_input($atributos);
					echo "</div>";
					
					echo "<div class='form-group col-md-4'>";
					echo form_label("Quartos: ","qt_quartos");
					$atributos = array(
						"name"	=>	"qt_quartos",
						"id"	=>	"qt_quartos",
						"class" =>  "form-control",
						"value"	=>	$imovel[0]->qt_quartos
					);
					echo form_input($atributos);
					echo "</div>";
					
					echo "<div class='form-group col-md-4'>";
					echo form_label("Vagas de Garagem: ","qt_garagens");
					$atributos = array(
						"name"	=>	"qt_garagens",
						"id"	=>	"qt_garagens",
						"class" =>  "form-control",
						"value"	=>	$imovel[0]->qt_garagens
					);
					echo form_input($atributos);
					echo "</div>";
				echo "</div>";
				
				if($imovel[0]->in_financiamento == 1)  {
					$in_financiamento = TRUE;
				}				   
				else {
					$in_financiamento = FALSE;	
				}
				echo "<div class='row'>";
					echo "<div class='form-group col-md-3'>";
					echo form_label("Aceita Financiamento: ","in_financiamento");
					$atributos = array(
					    "name"        => "in_financiamento",
					    "id"          => "in_financiamento",
					    "class" 	  =>  "form-control",
					    "value"       => "1",
					    "checked"     => $in_financiamento
					    );
					echo form_checkbox($atributos);
					echo "</div>";
					
					if($imovel[0]->in_carta_credito == 1) {
						$in_carta_credito = TRUE;
					}				   
					else {
						$in_carta_credito = FALSE;	
					}
					echo "<div class='form-group col-md-3'>";
					echo form_label("Aceita Carta de Crédito: ","in_carta_credito");
					$atributos = array(
					    "name"        => "in_carta_credito",
					    "id"          => "in_carta_credito",
					    "class" 	  =>  "form-control",
					    "value"       => "1",
					    "checked"     => $in_carta_credito
					    );
					echo form_checkbox($atributos);
					echo "</div>";
					
					if($imovel[0]->in_destaque == 1) {
						$in_destaque = TRUE;
					}				   
					else {
						$in_destaque = FALSE;	
					}
					echo "<div class='form-group col-md-3'>";
					echo form_label("Destaque: ","in_destaque");
					$atributos = array(
					    "name"        => "in_destaque",
					    "id"          => "in_destaque",
					    "class" 	  =>  "form-control",
					    "value"       => "1",
					    "checked"     => $in_destaque
					    );
					echo form_checkbox($atributos);
					echo "</div>";
					
					if($imovel[0]->in_oportunidade == 1) {
						$in_oportunidade = TRUE;
					}				   
					else {
						$in_oportunidade = FALSE;	
					}
					echo "<div class='form-group col-md-3'>";
					echo form_label("Oportunidade: ","in_oportunidade");
					$atributos = array(
					    "name"        => "in_oportunidade",
					    "id"          => "in_oportunidade",
					    "class" 	  =>  "form-control",
					    "value"       => "1",
					    "checked"     => $in_oportunidade
					    );
					echo form_checkbox($atributos);
					echo "</div>";
				echo "</div>";
			echo "<div class='row'>";	
				echo "<div class='form-group col-md-6'>";
				echo form_label("Foto: ","userfile");
				echo "<br/>";
				$atributos = array(
					"name"	=>	"userfile",
					"id"	=>	"userfile",
					"class" =>  "form-control",
				);
				echo form_upload($atributos);
				echo "<br/>";
				echo "</div>";
                                echo "<div class='form-group col-md-6'>";
                                //echo img($imovel[0]->foto);
                                echo "<img class='img-responsive img-thumbnail' width='300px' height='250px' src='".base_url().$imovel[0]->foto."' alt='".$imovel[0]->foto."'>";
                                echo "</div>";
			echo "</div>"	;
				echo form_submit("btnSubmit","Alterar Imóvel", "class='btn btn-primary'");
				echo form_submit("btnSubmit","Cancelar Alteração", "class='btn btn-default'");
			echo form_fieldset_close();
		echo form_close();
	?>
</div>