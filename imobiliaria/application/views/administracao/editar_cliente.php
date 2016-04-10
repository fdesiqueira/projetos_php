<div id="content">
	<?php
		echo heading("Alterar Cliente ",2,"class='divisor'");
		
		$attributes = array('class' => 'formcadastros', 'id' => 'formcadastro');
		
		echo form_open('administracao/clientes/salvar_alteracao', $attributes);		
			
			echo "<span class='validacoes'>" . validation_errors() . "</span>";
			
			echo form_fieldset("Informações do Cliente");
				
				echo form_hidden("id_cliente",$clientes[0]->id_cliente);
				
			echo "<div class='row'>";				
				echo "<div class='form-group col-md-4'>";	
					echo "<div class='form-group'>";
					echo form_label("CPF: ","cpf");
					$atributos = array(
						"name"	=>	"cpf",
						"id"	=>	"cpf",
						"class" =>  "form-control",
						"value"	=>	$clientes[0]->cpf
					);
					echo form_input($atributos);
					echo "</div>";
				echo "</div>";
				
				echo "<div class='form-group col-md-8'>";
					echo "<div class='form-group'>";				
					echo form_label("Nome: ","nome");
					$atributos = array(
						"name"	=>	"nome",
						"id"	=>	"nome",
						"class" =>  "form-control",
						"value"	=>	$clientes[0]->nome
					);
					echo form_input($atributos);
					echo "</div>";
				echo "</div>";
			echo "</div>";

			echo "<div class='row'>";				
				echo "<div class='form-group col-md-3'>";				
					echo "<div class='form-group'>";
					echo form_label("Telefone: ","telefone");
					$atributos = array(
						"name"	=>	"telefone",
						"id"	=>	"telefone",
						"class" =>  "form-control",
						"value"	=>	$clientes[0]->telefone
					);
					echo form_input($atributos);
					echo "</div>";
				echo "</div>";
				
				echo "<div class='form-group col-md-3'>";
					echo "<div class='form-group'>";
					echo form_label("Celular: ","celular");
					$atributos = array(
						"name"	=>	"celular",
						"id"	=>	"celular",
						"class" =>  "form-control",
						"value"	=>	$clientes[0]->celular
					);
					echo form_input($atributos);
					echo "</div>";
				echo "</div>";
				
				echo "<div class='form-group col-md-6'>";
					echo "<div class='form-group'>";
					echo form_label("Email: ","email");
					$atributos = array(
						"name"	=>	"email",
						"id"	=>	"email",
						"class" =>  "form-control",
						"value"	=>	$clientes[0]->email
					);
					echo form_input($atributos);
					echo "</div>";
				echo "</div>";
			echo "</div>";
					
				echo "<div class='row'>";				
					echo "<div class='form-group col-md-6'>";
						echo "<div class='form-group'>";
						echo form_label("Logradouro: ","logradouro");
						$atributos = array(
							"name"	=>	"logradouro",
							"id"	=>	"logradouro",
							"class" =>  "form-control",
							"value"	=>	$clientes[0]->logradouro
						);
						echo form_input($atributos);
						echo "</div>";
					echo "</div>";
				
					echo "<div class='form-group col-md-3'>";
						echo "<div class='form-group'>";
						echo form_label("Numero: ","numero");
						$atributos = array(
							"name"	=>	"numero",
							"id"	=>	"numero",
							"class" =>  "form-control",
							"value"	=>	$clientes[0]->numero
						);
						echo form_input($atributos);
						echo "</div>";
					echo "</div>";
				
					echo "<div class='form-group col-md-3'>";
						echo "<div class='form-group'>";
						echo form_label("CEP: ","cep");
						$atributos = array(
							"name"	=>	"cep",
							"id"	=>	"cep",
							"class" =>  "form-control",
							"value"	=>	$clientes[0]->cep
						);
						echo form_input($atributos);
						echo "</div>";
					echo "</div>";
				echo "</div>";
				
			echo "<div class='row'>";	
				echo "<div class='form-group col-md-6'>";
				echo form_label("Cidade: ","id_cidade");				
				foreach($cidades as $cidade){
					$array_cidade[$cidade->id_cidade] = $cidade->nome;
				}				
				echo form_dropdown('id_cidade', $array_cidade, $clientes[0]->id_cidade, 'class="form-control" id="id_cidade"');
				echo "</div>";
				
				echo "<div class='form-group col-md-6'>";
				echo form_label("Bairro: ","id_bairro");				
				foreach($bairros as $bairro){
					$array_bairro[$bairro->id_bairro] = $bairro->nome;
				}				
				echo form_dropdown('id_bairro', $array_bairro, $clientes[0]->id_bairro, 'class="form-control" id="id_bairro"');
				echo "</div>";
			echo "</div>";
				
			echo form_submit("btnSubmit", "Alterar Cliente",    "class='btn btn-primary'");
			echo form_submit("btnSubmit", "Cancelar Alteração", "class='btn btn-default'");
			echo form_fieldset_close();
		echo form_close(); 
	?>
</div>