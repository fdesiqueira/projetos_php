<div class="container">
    <div class="row">
        <div class="col-md-6">
            <p class="lead">Fotos do Imóvel</p>
            <div class="row carousel-holder">
                <div class="col-md-12">
                    <div id="carousel" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                             <?php 
                                $item=0;
                                foreach($fotos as $foto):?>
                                 <?php                                       
                                    echo " <li data-target='#carousel' data-slide-to='".$item."'></li> ";
                                    $item++;
                                 ?>
                              <?php endforeach;?>                               
                        </ol>
                        <div class="carousel-inner" role="listbox">
                            <?php 
                                $item=0;
                                foreach($fotos as $foto):?>
                                 <?php
                                    if($item==0){
                                        echo "<div class='item active'>";
                                    }
                                    else {
                                        echo "<div class='item'>";
                                    }                                        
                                    echo "<img class='slide-image' height='300px' src='".base_url().$foto->foto."' alt='".$foto->id_foto."'>";
                                    echo "</div>";                                                                
                                    $item++;
                                ?>
                            <?php endforeach;?>     
                        </div>
                        <a class="left carousel-control" href="#carousel" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left"></span>
                        </a>
                        <a class="right carousel-control" href="#carousel" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right"></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>     
        <div class="col-md-6">
            <?php	        
            $attributes = array('class' => 'formcadastros', 'id' => 'formcadastro');
            echo form_open_multipart('administracao/imoveis/salvar_alteracao', $attributes);		

            echo "<span class='validacoes'>" . validation_errors() . "</span>";

            echo form_fieldset("Detalhe do Imóvel");

            echo form_hidden("id_imovel",$imovel[0]->id_imovel);

            echo "<div class='row'>";
            echo "<div class='form-group col-md-6'>";
            echo form_label("Categoria: ","categoria");
            echo "<p class='form-control-static'>".$imovel[0]->categoria."</p>";                                        
            echo "</div>";

            echo "<div class='form-group col-md-6'>";
            echo form_label("Proprietário: ","id_cliente");				
            echo "<p class='form-control-static'>".$imovel[0]->id_cliente."</p>";                                        
            echo "</div>";
            echo "</div>";

            echo "<div class='row'>";
            echo "<div class='form-group col-md-6'>";
            echo form_label("Cidade: ","id_cidade");
            echo "<p class='form-control-static'>".$imovel[0]->id_cidade."</p>";
            echo "</div>";

            echo "<div class='form-group col-md-6'>";
            echo form_label("Bairro: ","id_bairro");				
            echo "<p class='form-control-static'>".$imovel[0]->id_bairro."</p>";				
            echo "</div>";
            echo "</div>";

            echo "<div class='form-group'>";
            echo form_label("Descrição: ","desc_imovel");
            echo "<p class='form-control-static'>".$imovel[0]->desc_imovel."</p>";				
            echo "</div>";

            echo "<div class='form-group'>";
            echo form_label("Detalhes do Imóvel: ","texto");
            echo "<p class='form-control-static'>".$imovel[0]->texto."</p>";
            echo "</div>";

            echo "<div class='row'>";
            echo "<div class='form-group col-md-4'>";
            echo form_label("Preço do Imóvel: ","vlr_imovel");
            echo "<p class='form-control-static'>".$imovel[0]->vlr_imovel."</p>";	
            echo "</div>";

            echo "<div class='form-group col-md-4'>";
            echo form_label("Quartos: ","qt_quartos");
            echo "<p class='form-control-static'>".$imovel[0]->qt_quartos."</p>";	
            echo "</div>";

            echo "<div class='form-group col-md-4'>";
            echo form_label("Vagas de Garagem: ","qt_garagens");
            echo "<p class='form-control-static'>".$imovel[0]->qt_garagens."</p>";	
            echo "</div>";
            echo "</div>";

            if($imovel[0]->in_financiamento == 1)  {
                    $in_financiamento = 'SIM';
            }				   
            else {
                    $in_financiamento = 'NÃO';	
            }
            echo "<div class='row'>";
            echo "<div class='form-group col-md-3'>";
            echo form_label("Aceita Financiamento: ","in_financiamento");
            echo "<p class='form-control-static'>".$in_financiamento."</p>";	
            echo "</div>";

            if($imovel[0]->in_carta_credito == 1) {
                    $in_carta_credito = 'SIM';
            }				   
            else {
                    $in_carta_credito = 'NÃO';	
            }

            echo "<div class='form-group col-md-3'>";
            echo form_label("Aceita Carta de Crédito: ","in_carta_credito");
            echo "<p class='form-control-static'>".$in_carta_credito."</p>";	
            echo "</div>";
            echo "</div>";


            echo "</div>";
            echo "</div>";				
            echo form_fieldset_close();

            echo form_close();
        ?>
        </div>
    </div>
</div>