<div id="content">
	<?php
	
			
		echo heading("Usuários Cadastrados ", 2,"class='divisor'");
		
		//Início da listagem de usuarios...
		$array_usuarios = array();
		foreach($usuarios as $usuario){
			$array_usuarios[] = array(
			
				$usuario->id_usuario,
				
				$usuario->usuario,
				
				anchor(
					base_url() . "administracao/usuarios/excluir/" . $usuario->id_usuario,
					"Excluir",
					array('onclick'=>"return confirm('Confirma a exclusão deste usuário?');",
					'class' => "btn btn-danger btn-xs")
				)."  "	.						
				anchor(
					base_url() . "administracao/usuarios/editar/".$usuario->id_usuario,
					"Editar",
					array('class' => "btn btn-warning btn-xs")
				). "  " .
				anchor(
					base_url() . "administracao/usuarios/consultar/".$usuario->id_usuario,
					"Consultar",
					array('class' => "btn btn-success btn-xs")
				)					
		
			);
		}
		
		$template = array ( 'table_open' => '<table class="table table-striped">' );		
		$this->table->set_template($template);
		$this->table->set_heading('Código', 'Nome do usuário', 'Ações');
		echo "<div class='wrapertable-responsive wraper_table'>";
			echo $this->table->generate($array_usuarios);
		echo "</div>"; 
		echo "<div id='paginacao'>" . $paginacao . "</div>"; 
		
		echo heading("Cadastrar Usuários ", 2,"class='divisor'");
		
		$attributes = array('class' => 'formcadastros', 'id' => 'formcadastro');
		echo form_open('administracao/usuarios/adicionar', $attributes);		
			
			echo "<span class='validacoes'>" . validation_errors() . "</span>";
			
			echo form_fieldset("Informações do Usuário");
				
			echo "<div class='row'>";
				echo "<div class='form-group col-md-8'>";							
					echo "<div class='form-group'>";
					echo form_label("Nome","usuario");
					$atributos = array(
						"name"	=>	"usuario",
						"id"	=>	"usuario",
						"class" =>  "form-control",
						"value"	=>	set_value('usuario')
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
						"value"	=>	set_value('senha')
					);
					echo form_input($atributos);
					echo "</div>";
				echo "</div>";
			echo "</div>";
			
			echo form_submit("btnSubmit","Cadastrar Usuário", "class='btn btn-primary'");
			echo form_fieldset_close();
		echo form_close();
		//Fim do formulário...

	?>
</div>