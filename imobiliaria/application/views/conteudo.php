<div class="col-md-9">
<!--  Carrousel de Imoveis em Destaque-->
    <p class="lead">Imóveis em Destaque</p>
    <div class="row carousel-holder">
        <div class="col-md-12">
            <div id="carousel" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                     <?php 
                        $item=0;
                        foreach($destaques as $destaque):?>
                         <?php                                       
                            echo " <li data-target='#carousel' data-slide-to='".$item."'></li> ";
                            $item++;
                         ?>
                      <?php endforeach;?>                               
                </ol>
                <div class="carousel-inner" role="listbox">
                    <?php 
                        $item=0;
                        foreach($destaques as $destaque):?>
                         <?php
                            if($item==0){
                                echo "<div class='item active'>";
                            }
                            else {
                                echo "<div class='item'>";
                            }                                        
                            echo "<img class='slide-image' height='300px' src='".base_url().$destaque->foto."' alt='".$destaque->desc_imovel."'>";
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

<!--            Oportunidades de Imoveis-->
                <p class="lead">Oportunidades</p>
                <div class="row">                    
                    <?php foreach($oportunidade as $oportunidade):?>
                        <?php
                            echo "<div class='col-sm-4 col-lg-4 col-md-4'>";
                            echo "   <div class='thumbnail'>";
                            echo "      <img class='img-responsive img-thumbnail' height='320px' width='150px' src='".base_url().$oportunidade->foto."' alt='".$oportunidade->desc_imovel."'>";
                            echo "      <div class='caption'>";
                            echo "          <h4 class='pull-right'>".reais($oportunidade->vlr_imovel)."</h4>";
                            echo "          <h4><a href='#'>". word_limiter($oportunidade->desc_imovel,20)."</a></h4>";
                            echo "          <p>".$oportunidade->desc_imovel."</p>";
                            echo "      </div>";
                            echo "   </div>";
                            echo "</div>";
                        ?>
                    <?php endforeach;?>  
                </div>
            </div>
        </div>
    </div>