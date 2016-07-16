<div class="container">
    <div class="painel">
        <div class="row">
            <div class="col-sm-10">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2 class="panel-title">Cadastro de Clientes</h2>
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
                        //echo heading("Clientes Cadastrados", 2, "class='divisor'");
                        //Início da listagem de categorias...
                        $array_clientes = array();
                        foreach ($clientes as $cliente) {
                            $array_clientes[] = array(
                                $cliente->id_cliente,
                                $cliente->nome,
                                $cliente->telefone,
                                $cliente->celular,
                                $cliente->email,
                                anchor(
                                        base_url() . "administracao/clientes/excluir/" . $cliente->id_cliente, "Excluir", array('onclick' => "return confirm('Confirma a exclusão deste Cliente?');",
                                    'class' => "btn btn-danger btn-xs")
                                ) . "  " .
                                anchor(
                                        base_url() . "administracao/clientes/editar/" . $cliente->id_cliente, "Editar", array('class' => "btn btn-warning btn-xs")
                                ) . "  " .
                                anchor(
                                        base_url() . "administracao/clientes/consultar/" . $cliente->id_imovel, "Consultar", array('class' => "btn btn-success btn-xs")
                                )
                            );
                        }

                        $template = array('table_open' => '<table class="table table-striped">');
                        $this->table->set_template($template);
                        $this->table->set_heading('Código', 'Nome', 'Telefone', 'Celular', 'Email', 'Ações');
                        echo "<div class='wrapertable-responsive wraper_table'>";
                        echo $this->table->generate($array_clientes);
                        echo "</div>";

                        echo "<div class='row'>";
                        echo "<div class='form-group col-md-11'>";
                        echo anchor(base_url() . "administracao/clientes/cadastrar/1", "Cadastrar Cliente", array('class' => "btn btn-primary"));
                        echo "</div>";
                        echo "<div class='form-group col-md-1'>";
                        echo "<div>" . $paginacao . "</div>";
                        echo "</div>";
                        echo "</div>";
                        ?>
                    </div>							
                </div>						
            </div>
        </div>
    </div>                                    
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $('#cpf').mask('000.000.000-00', {reverse: true});
        $('#identidade').mask('00000000-0', {reverse: true});
        $('#cep').mask('00000-000', {reverse: true});
        $('#telefone').mask('(00)0000-00000', {reverse: true});
        $('#celular').mask('(00)0000-00000', {reverse: true});
    });
</script>