<div id="content">
	<?php		
		echo heading("Categorias Cadastradas ", 2,"class='divisor'");
		
		//Início da listagem de categorias...
		$array_categorias = array();
		foreach($categorias as $categoria){
			$array_categorias[] = array(
			
				$categoria->id_categoria,
				
				$categoria->categoria,
				
				$categoria->desc_categoria,		
				
				anchor(
					base_url() . "administracao/categorias/excluir/" . $categoria->id_categoria,
					"Excluir",
					array('onclick'=>"return confirm('Confirma a exclusão desta categoria');",
					'class' => "btn btn-danger btn-xs")
				)."  "	.						
				anchor(
					base_url() . "administracao/categorias/editar/".$categoria->id_categoria,
					"Editar",
					array('class' => "btn btn-warning btn-xs")
				). "  " .
				anchor(
					base_url() . "administracao/categorias/consultar/".$categoria->id_categoria,
					"Consultar",
					array('class' => "btn btn-success btn-xs")
				)				
		
			);
		}
		
		$template = array ( 'table_open' => '<table class="table table-striped">' );		
		$this->table->set_template($template);
		$this->table->set_heading('Código', 'Nome', 'Descrição', 'Ações');
		echo "<div class='wrapertable-responsive wraper_table'>";
			echo $this->table->generate($array_categorias);
		echo "</div>"; 
		
		echo "<div class='row'>";
			echo "<div class='form-group col-md-11'>";
				echo anchor(base_url() . "administracao/categorias/cadastrar/1", "Cadastrar Categoria", array('class' => "btn btn-primary"));
			echo "</div>";
			echo "<div class='form-group col-md-1'>";
				echo "<div>" . $paginacao . "</div>";
			echo "</div>";
		echo "</div>";
	?>
</div>

