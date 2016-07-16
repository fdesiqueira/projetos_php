<div id="content">
	<?php
		echo heading("Editar Corretor de Imóveis ",2,"class='divisor'");
		
		$attributes = array('class' => 'formcadastros', 'id' => 'formcadastro');
		echo form_open('administracao/usuarios/salvar_alteracao/1', $attributes);		
			
			echo "<span class='validacoes'>" . validation_errors() . "</span>";
			
			//echo form_fieldset("Informações do Usuário");
				
			echo form_hidden("id_usuario",$usuarios[0]->id_usuario);
                                
                        echo "<div class='row'>";    
                        
                        echo "<div class='form-group col-md-4'>";					
					echo "<div class='form-group'>";
					echo form_label("CRECI","creci");
					$atributos = array(
						"name"	=>	"creci",
						"id"	=>	"creci",
						"size"  =>  "5",
						"class" =>  "form-control",
						"value"	=>	$usuarios[0]->creci
					);
					echo form_input($atributos);
                                        echo "</div>";
				echo "</div>";
                                
                                echo "<div class='form-group col-md-8'>";					
					echo "<div class='form-group'>";
					echo form_label("Email","email");
					$atributos = array(
						"name"	=>	"email",
						"id"	=>	"email",
						"size"  =>  "60",
                                                "length" => "60",
						"class" =>  "form-control",
						"value"	=>	$usuarios[0]->email
					);
					echo form_input($atributos);
                                        echo "</div>";                          
                                echo "</div>";
			echo "</div>";
                        
                        echo "<div class='row'>";
				echo "<div class='form-group col-md-6'>";							
					echo "<div class='form-group'>";
					echo form_label("Identidade","identidade");
					$atributos = array(
						"name"	=>	"identidade",
						"id"	=>	"identidade",
						"class" =>  "form-control",
						"value"	=>	$usuarios[0]->identidade
					);
					echo form_input($atributos);
					echo "</div>";
				echo "</div>";
				
				echo "<div class='form-group col-md-6'>";					
					echo "<div class='form-group'>";
					echo form_label("CPF","cpf");
					$atributos = array(
						"name"	=>	"cpf",
						"id"	=>	"cpf",
						"size"  =>  "10",
						"class" =>  "form-control",
						"value"	=>	$usuarios[0]->cpf
					);
					echo form_input($atributos);
					echo "</div>";
				echo "</div>";                                
                        echo "</div>"; 
                        
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
					echo form_password($atributos);
					echo "</div>";
				echo "</div>";                                
                        echo "</div>";   
                        
                        echo "<div class='row'>";
				echo "<div class='form-group col-md-6'>";							
					echo "<div class='form-group'>";
					echo form_label("Telefone","telefone");
					$atributos = array(
						"name"	=>	"telefone",
						"id"	=>	"telefone",
						"class" =>  "form-control",
						"value"	=>	$usuarios[0]->telefone
					);
					echo form_input($atributos);
					echo "</div>";
				echo "</div>";
				
				echo "<div class='form-group col-md-6'>";					
					echo "<div class='form-group'>";
					echo form_label("Celular","celular");
					$atributos = array(
						"name"	=>	"celular",
						"id"	=>	"celular",
						"size"  =>  "10",
						"class" =>  "form-control",
						"value"	=>	$usuarios[0]->celular
					);
					echo form_input($atributos);
					echo "</div>";
				echo "</div>";                                
                        echo "</div>";     
				
                        echo "<div class='row'>";
                        echo    "<div class='col-md-12'>";
                        echo        "<button type='submit' class='btn btn-primary'>Salvar</button>    ";
                        echo        "<a href='".base_url()."administracao/usuarios/1"."' class='btn btn-default'>Cancelar</a>";
                        echo    "</div>";
                        echo "</div>";
                        
			echo form_fieldset_close();
		echo form_close(); 
	?>
</div>
<script type="text/javascript">
$(document).ready(function(){
    $('#cpf').mask('000.000.000-00', {reverse: true});
    $('#identidade').mask('00000000-0', {reverse: true});
    $('#cep').mask('00000-000', {reverse: true});
    $('#telefone').mask('(00)0000-00000', {reverse: true});
    $('#celular').mask('(00)0000-00000', {reverse: true});    
});    
</script>