<div class="container-fluid">
    <div class="row-fluid">
        <div class="col-md-6">
            <fieldset>
                <legend>Fotos</legend>
                <div class="panel panel-default">
                    <div class="panel-body">
                        <center>
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
                        </center>
                    </div>
                </div>    
            </fieldset>
        </div>     
        <div class="col-md-6">
            <fieldset>
                <legend>Localização</legend>
                <div class="panel panel-default">
                    <div class="panel-body">
                        <center>
                            <div id="googleMap" style="width:600px;height:280px;"></div>
                        </center>
                    </div>
                </div>            
            </fieldset>
        </div>
    </div>
    <div class="row-fluid">        
        <div class="col-md-6">            
            <?php            
                $attributes = array('class' => 'formcadastros', 'id' => 'formcadastro');
                echo form_open_multipart('visitas/agendar_visita/'.$imovel[0]->id_imovel, $attributes);
                
                echo form_hidden("id_imovel",$imovel[0]->id_imovel);                
                        
                echo "<div class='row'>";	
                    echo "<div class='form-group col-md-4'>";
                    echo form_label("Valor do Imóvel: ","vlr_imovel");
                    $atributos = array(
                            "name"	=> "vlr_imovel",
                            "id"	=> "vlr_imovel",
                            "class" => "form-control",
                            "disabled" => "disabled",
                            "value"	=> reais($imovel[0]->vlr_imovel)
                    );
                    echo form_input($atributos);
                    echo "</div>";

                    echo "<div class='form-group col-md-4'>";
                    echo form_label("Valor do IPTU: ","vlr_iptu");
                    $atributos = array(
                            "name"  => "vlr_iptu",
                            "id"    => "vlr_iptu",
                            "class" => "form-control",
                            "disabled" => "disabled",
                            "value" => reais($imovel[0]->vlr_iptu)
                    );
                    echo form_input($atributos);
                    echo "</div>";

                    echo "<div class='form-group col-md-4'>";
                    echo form_label("Valor do Condomínio: ","vlr_condominio");
                    $atributos = array(
                            "name"	=> "vlr_condominio",
                            "id"	=> "vlr_condominio",
                            "class" => "form-control",
                            "disabled" => "disabled",
                            "value"	=> reais($imovel[0]->vlr_condominio)
                    );
                    echo form_input($atributos);
                    echo "</div>";

                echo "</div>"	;

                echo "<div class='row'>";	
                        echo "<div class='form-group col-md-3'>";
                        echo form_label("Quartos: ","qt_quartos");
                        $atributos = array(
                                "name"	=>  "qt_quartos",
                                "id"	=>  "qt_quartos",
                                "class" =>  "form-control",
                                "disabled" => "disabled",
                                "value"	=> $imovel[0]->qt_quartos
                        );
                        echo form_input($atributos);
                        echo "</div>";

                        echo "<div class='form-group col-md-3'>";
                        echo form_label("Vagas de Garagem: ","qt_garagens");
                        $atributos = array(
                                "name"	=> "qt_garagens",
                                "id"	=> "qt_garagens",
                                "class" => "form-control",
                                "disabled" => "disabled",
                                "value"	=> $imovel[0]->qt_garagens
                        );
                        echo form_input($atributos);
                        echo "</div>";

                        echo "<div class='form-group col-md-3'>";
                        echo form_label("Banheiros: ","qt_banheiros");
                        $atributos = array(
                                "name"	=> "qt_banheiros",
                                "id"	=> "qt_banheiros",
                                "class" => "form-control",
                                "disabled" => "disabled",
                                "value"	=> $imovel[0]->qt_banheiros
                        );
                        echo form_input($atributos);
                        echo "</div>";                                        

                        echo "<div class='form-group col-md-3'>";
                        echo form_label("Suite: ","qt_suites");
                        $atributos = array(
                                "name"	=> "qt_suites",
                                "id"	=> "qt_suites",
                                "class" => "form-control",
                                "disabled" => "disabled",
                                "value"	=> $imovel[0]->qt_suites
                        );
                        echo form_input($atributos);
                        echo "</div>";
                echo "</div>";

                echo "<div class='row'>";	
                        echo "<div class='form-group col-md-4'>";
                        echo form_label("Ano de Construção: ","ano_contrucao");
                        $atributos = array(
                                "name"	=>  "ano_contrucao",
                                "id"	=>  "ano_contrucao",
                                "class" =>  "form-control",
                                "disabled" => "disabled",
                                "value"	=> $imovel[0]->ano_contrucao
                        );
                        echo form_input($atributos);
                        echo "</div>";

                        echo "<div class='form-group col-md-4'>";
                        echo form_label("Andares: ","nu_andares");
                        $atributos = array(
                                "name"	=>  "nu_andares",
                                "id"	=>  "nu_andares",
                                "class" =>  "form-control",
                                "disabled" => "disabled",
                                "value"	=> $imovel[0]->nu_andares
                        );
                        echo form_input($atributos);
                        echo "</div>";

                        echo "<div class='form-group col-md-4'>";
                        echo form_label("Andar do Imóvel: ","nu_andar_apto");
                        $atributos = array(
                                "name"	=> "nu_andar_apto",
                                "id"	=> "nu_andar_apto",
                                "class" => "form-control",
                                "disabled" => "disabled",
                                "value"	=> $imovel[0]->nu_andar_apto
                        );
                        echo form_input($atributos);
                        echo "</div>";       
                echo "</div>";
                
                echo "<div class='row'>";            
                	if($imovel[0]->in_financiamento == 1) {
                            $in_financiamento = "Aceita Financiamento";
			}				   
			else {
                            $in_financiamento = "Não aceita Financiamento";	
			}
                        echo "<div class='form-group col-md-6'>";
                        echo form_label("Aceita Financiamento: ","in_financiamento");
                        $atributos = array(
                            "name"        => "in_financiamento",
                            "id"          => "in_financiamento",
                            "class" 	  =>  "form-control",
                            "disabled"    => "disabled",
                            "value"       => $in_financiamento
                            );
                        echo form_input($atributos);
                        echo "</div>";

                        if($imovel[0]->in_carta_credito == 1) {
                            $in_carta_credito = "Aceita Carta de Crédito";
			}				   
			else {
                            $in_carta_credito = "Não aceita Carta de Crédito";	
			}
                        echo "<div class='form-group col-md-6'>";
                        echo form_label("Aceita Carta de Crédito: ","in_carta_credito");
                        $atributos = array(
                            "name"        => "in_carta_credito",
                            "id"          => "in_carta_credito",
                            "class" 	  =>  "form-control",
                            "disabled"    => "disabled",
                            "value"       =>  $in_carta_credito
                            );
                        echo form_input($atributos);
                        echo "</div>";

                        if($imovel[0]->in_destaque == 1) {
                            $in_destaque = TRUE;
			}				   
			else {
                            $in_destaque = FALSE;	
			}
                        
                echo "</div>";
             ?>        
        </div>
        
        <div class="col-md-6">
            <?php
                echo "<div class='row'>";	
                    echo "<div class='form-group col-md-12'>";
                     echo form_label("Detalhes: ","texto");
                     $atributos = array(
                             "name"	=> "texto",
                             "id"	=> "texto",
                             "class"    => "form-control",
                             "disabled" => "disabled",
                             "rows"     => "3",
                             "value"	=> $imovel[0]->texto
                     );
                     echo form_textarea($atributos);
                     echo "</div>";
                echo "</div>";
                
                echo "<div class='row'>";	
                    echo "<div class='form-group col-md-12'>";
                    echo form_label("Documentação: ","documentacao");
                    $atributos = array(
                            "name"     => "documentacao",
                            "id"       => "documentacao",
                            "class"    =>  "form-control",
                            "disabled" => "disabled",
                            "rows"     => "2",
                            "value"    => $imovel[0]->documentacao
                    );
                    echo form_textarea($atributos);
                    echo "</div>";
                echo "</div>";
            echo "    </div>";
    
            echo form_submit("btnSubmit","Quero Visitar o Imóvel", "class='btn btn-primary center-block'");
            echo form_close();
            ?>
        </div>        
    </div>
</div>

<?php          
    $bairro=$imovel[0]->nome_bairro;
    $cidade=$imovel[0]->nome_cidade;
    $endereco = $bairro."+".$cidade."+brasil";
    $geocode = file_get_contents('http://maps.google.com/maps/api/geocode/json?address='.$endereco.'&sensor=false');

    $output= json_decode($geocode);

    $latitude = $output->results[0]->geometry->location->lat;
    $longitude = $output->results[0]->geometry->location->lng;
?>

<script>
     function initialize() {
       var mapProp = {
         center:new google.maps.LatLng(<?php echo $latitude ?>, <?php echo $longitude ?>),
         zoom:15,
         mapTypeId:google.maps.MapTypeId.ROADMAP
       };
       var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
     }
     google.maps.event.addDomListener(window, 'load', initialize);
 </script>