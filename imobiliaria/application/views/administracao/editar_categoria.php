<div id="content">
	<?php
		echo heading("Editar Categoria ",2,"class='divisor'");
		
		$attributes = array('class' => 'formcadastros', 'id' => 'formcadastro');
		echo form_open('administracao/categorias/salvar_alteracao', $attributes);		
			
			echo "<span class='validacoes'>" . validation_errors() . "</span>";
			
			echo form_fieldset("Informações da Categoria");
				
				echo form_hidden("id_categoria",$categorias[0]->id_categoria);
				
				echo "<div class='form-group'>";
				echo form_label("Categoria: ","categoria");
				$atributos = array(
					"name"	=>	"categoria",
					"id"	=>	"categoria",
					"class" =>  "form-control",					
					"value"	=>	$categorias[0]->categoria
				);
				echo form_input($atributos);
				echo "</div>";
				
				echo "<div class='form-group'>";
				echo form_label("Descrição: ","slug_categoria");
				$atributos = array(
					"name"	=>	"slug_categoria",
					"id"	=>	"slug_categoria",
					"class" =>  "form-control",
					"value"	=>	$categorias[0]->slug_categoria
				);
				echo form_input($atributos);
				echo "</div>";
				echo form_submit("btnSubmit","Alterar Categoria", "class='btn btn-primary'");
				echo form_submit("btnSubmit","Cancelar Alteração", "class='btn btn-default'");
			echo form_fieldset_close();
		echo form_close(); 
	?>
</div>