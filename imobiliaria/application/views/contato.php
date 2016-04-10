<div class="container">
       	<?php
		$data = array('id'=>'form_contato');
		echo form_open( base_url('contato/enviar'),$data);
			echo form_fieldset("Entre em Contato");
			
				echo "<span class='validacoes'>" . validation_errors() . "</span>";
			
				echo "<div class='row'>";
					echo "<div class='form-group col-md-8'>";							
						echo "<div class='form-group'>";
							echo form_label('Nome: ', 'nome');
							$data = array('name'=>'nome','id'=>'nome','class' =>  'form-control');
							echo form_input($data);
						echo "</div>";
					echo "</div>";
				echo "</div>";
				
				echo "<div class='row'>";
					echo "<div class='form-group col-md-8'>";							
						echo "<div class='form-group'>";		
							echo form_label('E-mail: ', 'email');
							$data = array('name'=>'email','id'=>'email', 'class' =>  'form-control');
							echo form_input($data);
						echo "</div>";
					echo "</div>";
				echo "</div>";
				
				echo "<div class='row'>";
					echo "<div class='form-group col-md-8'>";							
						echo "<div class='form-group'>";
							echo form_label('Mensagem: ', 'mensagem');
							$data = array('name'=>'mensagem','id'=>'mensagem', 'class' =>  'form-control');
							echo form_textarea($data);		
						echo "</div>";
					echo "</div>";
				echo "</div>";
				
				echo form_submit("btn_cadastro","Enviar Mensagem", "class='btn btn-primary'" );
			echo form_fieldset_close();
		echo form_close();
	echo "</div>";
	?>
</div>