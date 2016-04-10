<div class="col-md-9">
                <!-- Imoveis da Categoria -->
                <p class="lead">Imoveis da Categoria</p>
                <div class="row">                    
                    <?php foreach($imoveis as $imovel):?>
                        <?php
                            echo "<div class='col-sm-4 col-lg-4 col-md-4'>";
                            echo "   <div class='thumbnail'>";
                            echo "      <img class='img-responsive img-thumbnail' height='320px' width='150px' src='".base_url().$imovel->foto."' alt='".$imovel->desc_imovel."'>";
                            echo "      <div class='caption'>";
                            echo "          <h4 class='pull-right'>".reais($imovel->vlr_imovel)."</h4>";
                            echo "          <h4>".word_limiter($imovel->desc_imovel,20)."</h4>";
                            echo "          <p>".$imovel->desc_imovel."</p>";
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