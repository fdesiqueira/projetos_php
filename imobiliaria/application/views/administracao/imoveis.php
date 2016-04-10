<div id="content">
	<?php
		
		echo heading("Imóveis Cadastrados ",2,"class='divisor'");
		
		//Início da listagem de imoveis cadastrados...
		$array_imoveis = array();
		foreach($imoveis as $imovel){
			$array_imoveis[] = array(
				
				$imovel->id_imovel,
				
				$imovel->desc_imovel,
				
				anchor(
					base_url() . "administracao/imoveis/excluir/" . $imovel->id_imovel,
					"Excluir",
					array('onclick'=>"return confirm('Confirma a exclusão deste Imóvel?');",
					'class' => "btn btn-danger btn-xs")
				). " ".
										
				anchor(
					base_url() . "administracao/imoveis/editar/".$imovel->id_imovel,
					"Editar",
					array('class' => "btn btn-warning btn-xs")
				). " ".
				
				anchor(
					base_url() . "administracao/imoveis/fotos/".$imovel->id_imovel,
					"Fotos",
					array('class' => "btn btn-success btn-xs")
				)	
			);
		}
		
		$template = array ( 'table_open' => '<table class="table table-striped">' );		
		$this->table->set_template($template);
		$this->table->set_heading('Código', 'Descrição', 'Ações');
		echo "<div class='wrapertable-responsive wraper_table'>";
		echo $this->table->generate($array_imoveis);
		echo "</div>"; 
		
		echo "<div class='row'>";
			echo "<div class='form-group col-md-11'>";
				echo anchor(base_url() . "administracao/imoveis/cadastrar/1", "Cadastrar Imóvel", array('class' => "btn btn-primary"));
			echo "</div>";
			echo "<div class='form-group col-md-1'>";
				echo "<div>" . $paginacao . "</div>";
			echo "</div>";
		echo "</div>";
	?>
</div>