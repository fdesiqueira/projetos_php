<!-- Menu Categoria de Imoveis  -->
    <div class="container">

        <div class="row">

            <div class="col-md-3">
                <p class="lead">Categorias de Imóveis</p>
                <div class="list-group">
                	<?php foreach($categorias as $cat):?>
                            <?php
                                $atts = array('class' => 'list-group-item');
                                echo anchor('imoveis/consultar_por_categoria/'.$cat->id_categoria, $cat->categoria, $atts);
                            ?>
			<?php endforeach;?>            
                </div>
		<p class="lead">Encontre seu Imóvel</p>
                <form role="form">
                   <div class="form-group">
	                	<label for="tipo">Tipo de imóvel:</label>
	      				<select class="form-control" id="tipo">
					        <option>Apartamento</option>
					        <option>Casa</option>
					        <option>Sala Comercial</option>
					        <option>Terreno</option>
					    </select>
        		  </div>
                  <div class="form-group">
	                	<label for="bairro">Localização:</label>
	      				<select class="form-control" id="bairro">
	      					<option>Selecione o bairro</option>
					        <option>Icaraí</option>
					        <option>Santa Rosa</option>
					        <option>Centro</option>
					        <option>São Francisco</option>
					        <option>Ingá</option>
					        <option>Jardim Icaraí</option>
					    </select>
        		  </div>
        		  <div class="form-group">
	                	<label for="bairro">Faixa de Preço:</label>
	      				<select class="form-control" id="bairro">
					        <option>Valores</option>
					        <option>Até R$ 50.000,00</option>
					        <option>De R$ 50.000,00 a R$ 150.000,00</option>
					        <option>De R$ 150.000,00 a R$ 250.000,00</option>
					        <option>De R$ 250.000,00 a R$ 300.000,00</option>
					        <option>De R$ 300.000,00 a R$ 350.000,00</option>
					    </select>
        		  </div>
                  <br>
                  <div class="form-group">
                    <label for="quartos">Quartos:</label><br>
                    <label class="checkbox-inline">
				      <input type="checkbox" value="">1</label>
				    <label class="checkbox-inline">
				      <input type="checkbox" value="">2</label>
				    <label class="checkbox-inline">
				      <input type="checkbox" value="">3</label>
				       <label class="checkbox-inline">
				      <input type="checkbox" value="">4</label>
				    <label class="checkbox-inline">
				      <input type="checkbox" value="">5</label>
                  </div>
                      <div class="form-group">
                    <label for="quartos">Vagas na Garagem:</label><br>
                    <label class="checkbox-inline">
				      <input type="checkbox" value="">1</label>
				    <label class="checkbox-inline">
				      <input type="checkbox" value="">2</label>
				    <label class="checkbox-inline">
				      <input type="checkbox" value="">3</label>
				       <label class="checkbox-inline">
				      <input type="checkbox" value="">4</label>
				    <label class="checkbox-inline">
				      <input type="checkbox" value="">5</label>
              	  </div>
                  <div class="checkbox">
                    <label><input type="checkbox" id="financiamento">Aceita Financiamento</label>
                  </div>
                  <div class="checkbox">
                    <label><input type="checkbox" id="fotos">Somente com fotos</label>
                  </div><br>
                    <button type="button" class="btn btn-primary btn-md">Pesquisar Imóvel</button>    
                </form>

            </div>

