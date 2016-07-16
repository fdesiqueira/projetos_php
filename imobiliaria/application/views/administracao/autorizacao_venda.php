<div class="container">
    <div class="painel">
        <div class="row">
            <div class="col-sm-10">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2 class="panel-title">Cadastro de Imóveis</h2>
                    </div>
                    <div class="panel-body">
                        <div> 
                            <?php if ($this->session->flashdata("sucesso")) : ?>
                                <p class="alert alert-success"><?= $this->session->flashdata("sucesso") ?></p>
                            <?php endif ?>
                            <?php if ($this->session->flashdata("erro")) : ?>
                                <p class="alert alert-danger"><?= $this->session->flashdata("erro") ?></p>
                            <?php endif ?>      
                        </div>
                        <?php
                            echo form_open_multipart('administracao/imoveis/emitir_autorizacao_venda/'.$imovel, $attributes);
                            echo "<div class= 'row'>";                            
                            echo "<div class='col-md-12'>";
                            echo "<button type='submit' class='btn btn-primary'>Gerar Autorização de Venda</button>      ";
                            echo "<a href='" . base_url() . "administracao/imoveis/1" . "' class='btn btn-default'>Retornar</a>";
                            echo "</div>";
                            echo "</div>";
                            echo form_close();
                        ?>
                    </div>							
                </div>						
            </div>
        </div>
    </div>                                    
</div>
