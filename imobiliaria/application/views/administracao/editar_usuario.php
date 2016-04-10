<div id="content">
	<?php
		echo heading("Editar Usuário ",2,"class='divisor'");
		
		$attributes = array('class' => 'formcadastros', 'id' => 'formcadastro');
		echo form_open('administracao/usuarios/salvar_alteracao', $attributes);		
			
			echo "<span class='validacoes'>" . validation_errors() . "</span>";
			
			echo form_fieldset("Informações do Usuário");
				
				echo form_hidden("id_usuario",$usuarios[0]->id_usuario);
				echo "<div class='row'>";
				echo "<div class='form-group col-md-8'>";							
					echo "<div class='form-group'>";
					echo form_label("Nome","usuario");
					$atributos = array(
						"name"	=>	"usuario",
						"id"	=>	"usuario",
						"class" =>  "form-control",
						"value"	=>	$usuarios[0]->usuario
					);
					echo form_input($atributos);
					echo "</div>";
				echo "</div>";
				
				echo "<div class='form-group col-md-4'>";					
					echo "<div class='form-group'>";
					echo form_label("Senha","senha");
					$atributos = array(
						"name"	=>	"senha",
						"id"	=>	"senha",
						"size"  =>  "10",
						"class" =>  "form-control",
						"value"	=>	$usuarios[0]->senha
					);
					echo form_input($atributos);
					echo "</div>";
				echo "</div>";
			echo "</div>";
				
				echo form_submit("btnSubmit","Alterar Usuário", "class='btn btn-primary'");
				echo form_submit("btnSubmit","Cancelar Alteração", "class='btn btn-default'");
			echo form_fieldset_close();
		echo form_close(); 
	?>
</div>