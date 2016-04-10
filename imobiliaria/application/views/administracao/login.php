<div class="container">
    <div class="row"><br></div>
    <div class="row"><br></div>
    <div class="row"><br></div>
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div> 
             <?php if($this->session->flashdata("erro")) : ?>
                 <p class="alert alert-danger"><?= $this->session->flashdata("erro") ?></p>
             <?php endif ?>      
            </div>
            <div class="login-panel panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title text-center">Acesso à Administração da Imobiliária</h3>
                </div>
                <div class="panel-body">
                    <!--Inserir formulário de login aqui -->
		    <?php
                    echo form_open(base_url().'administracao/home/login') .
                        "<span class='validacoes'>" . validation_errors() . "</span>".                           
                        "<fieldset>" .
                            "<div class='form-group'>" .
                                form_label("Usuário: ","usuario").
                                form_input(array("name"=>"usuario","type"=>"text","placeholder"=>"Entre com o nome do Usuário","class"=>"form-control")) .
                            "</div>" .
                            "<div class='form-group'>" .
                                form_label("Senha: ","usuario").
                                form_input(array("name"=>"senha","type"=>"password","placeholder"=>"Entre com a Senha do Usuário","class"=>"form-control")) .
                            "</div>" .
                            form_input(array("type"=>"submit","value"=>"Acessar Administração","class"=>"btn btn-lg btn-success btn-block")) .
                        "</fieldset>".
                    form_close();
                    ?> 
                </div>
            </div>
        </div>
    </div>
</div>