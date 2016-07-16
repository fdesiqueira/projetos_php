<div class="container">
       	<?php
		$data = array('id'=>'form_contato');
		echo form_open( base_url('visitas/cadastrar_visita'),$data);
                    echo form_fieldset("Agendar Visita");			
                    echo "<span class='validacoes'>" . validation_errors() . "</span>";	
                    echo form_hidden("id_imovel",$id_imovel);
                    echo "<div class='row'>";
                        echo "<div class='form-group col-md-6'>";							
                            echo "<div class='form-group'>";
                                echo form_label('Nome: ', 'nome');
                                $data = array('name'=>'nome','id'=>'nome','class' =>  'form-control');
                                echo form_input($data);
                            echo "</div>";
                        echo "</div>";
                    echo "</div>";

                    echo "<div class='row'>";
                        echo "<div class='form-group col-md-6'>";							
                            echo "<div class='form-group'>";		
                                echo form_label('E-mail: ', 'email');
                                $data = array('name'=>'email','id'=>'email', 'class' =>  'form-control');
                                echo form_input($data);
                            echo "</div>";
                        echo "</div>";
                    echo "</div>";

                    echo "<div class='row'>";
                        echo "<div class='form-group col-md-2'>";							
                            echo "<div class='form-group'>";		
                                echo form_label('Telefone: ', 'telefone');
                                $data = array('name'=>'telefone','id'=>'telefone', 'class' =>  'form-control');
                                echo form_input($data);
                            echo "</div>";
                        echo "</div>";
                    echo "</div>";

                    echo "<div class='row'>";
                        echo "<div class='form-group col-md-2'>";							
                            echo "<div class='form-group'>";		
                                echo form_label('Data da Visita: ', 'data');
                                $data = array('type' => 'date', 'name'=>'data','id'=>'data',  'class' =>  'form-control');
                                echo form_input($data);
                            echo "</div>";
                        echo "</div>";
                        
                        echo "<div class='form-group col-md-2'>";							
                            echo "<div class='form-group'>";		
                                echo form_label('Hora da Visita: ', 'hora');
                                $data = array('type' => 'time', 'name'=>'hora','id'=>'hora',  'class' =>  'form-control');
                                echo form_input($data);
                            echo "</div>";
                        echo "</div>";
                    echo "</div>";

                    echo "<div class='row'>";
                        echo "<div class='form-group col-md-6'>";							
                            echo "<div class='form-group'>";
                                echo form_label('Mensagem: ', 'mensagem');
                                $data = array('name'=>'mensagem','id'=>'mensagem', 'class' =>  'form-control');
                                echo form_textarea($data);		
                            echo "</div>";
                        echo "</div>";
                    echo "</div>";

                    echo form_submit("btn_cadastro","Enviar", "class='btn btn-primary'" );
                echo form_fieldset_close();
            echo form_close();
	echo "</div>";
	?>
</div>
<script type="text/javascript">
$(document).ready(function(){
    $('#telefone').mask('(00)0000-0000', {reverse: true});
});    
</script>