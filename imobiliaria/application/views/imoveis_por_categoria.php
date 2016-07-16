<div class="col-md-9">
                <!-- Imoveis da Categoria -->
                <p class="lead">Imoveis da Categoria</p>
                <div class="row">                    
                    <?php foreach($imoveis as $imovel):?>
                     <?php
                            echo "<div class='col-sm-4 col-lg-4 col-md-4'>";
                            echo "   <div class='thumbnail'>";
                            echo "      <img class='img-responsive img-thumbnail' height='320px' width='150px' src='".base_url().$imovel->foto."' alt='".$imovel->categoria."'>";
                            echo "      <div class='caption'>";
                            echo "          <p>".$imovel->desc_categoria." em ".$imovel->nome."</p>";
                            echo "          <p>".word_limiter($imovel->desc_imovel, 120)."</p>";
                            echo "          <p class='pull-right'><b>".reais($imovel->vlr_imovel)."</b></p>";
                            echo anchor('imoveis/consultar_detalhe_imovel/'.$imovel->id_imovel, "Detalhes do Imóvel" );
                            echo "      </div>";
                            echo "   </div>";
                            echo "</div>";
                        ?>
                    <?php endforeach;?>  
                </div>
            </div>
        </div>
    </div>