<div id="content">
	<?php		
		echo heading("Clientes Cadastrados",2,"class='divisor'");
		
		//Início da listagem de categorias...
		$array_clientes = array();
		foreach($clientes as $cliente){
			$array_clientes[] = array(
			
				$cliente->id_cliente,
				
				$cliente->nome,
				
				$cliente->telefone,		
				
				$cliente->celular,
				
				$cliente->email,
				
				anchor(
					base_url() . "administracao/clientes/excluir/" . $cliente->id_cliente,
					"Excluir",
					array('onclick'=>"return confirm('Confirma a exclusão deste Cliente?');",
					'class' => "btn btn-danger btn-xs")
				)."  "	.						
				anchor(
					base_url() . "administracao/clientes/editar/".$cliente->id_cliente,
					"Editar",
					array('class' => "btn btn-warning btn-xs")
				). "  " .
				anchor(
					base_url() . "administracao/clientes/consultar/".$cliente->id_imovel,
					"Consultar",
					array('class' => "btn btn-success btn-xs")
				)				
		
			);
		}
		
		$template = array ( 'table_open' => '<table class="table table-striped">' );		
		$this->table->set_template($template);
		$this->table->set_heading('Código', 'Nome', 'Telefone', 'Celular', 'Email', 'Ações');
		echo "<div class='wrapertable-responsive wraper_table'>";
			echo $this->table->generate($array_clientes);
		echo "</div>"; 
		
		echo "<div class='row'>";
			echo "<div class='form-group col-md-11'>";
				echo anchor(base_url() . "administracao/clientes/cadastrar/1", "Cadastrar Cliente", array('class' => "btn btn-primary"));
			echo "</div>";
			echo "<div class='form-group col-md-1'>";
				echo "<div>" . $paginacao . "</div>";
			echo "</div>";
		echo "</div>";
	
	?>
</div>