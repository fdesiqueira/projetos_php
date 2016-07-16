<div class="container">
    <div class="row">
        <div class="col-md-10">

            <div class="painel">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2 class="panel-title">Painel de Administracao</h2>
                    </div>
                    <div class="panel-body">                        
                        <div> 
                            <?php if($this->session->flashdata("sucesso")) : ?>
                            <p class="alert alert-success"><?= $this->session->flashdata("sucesso") ?></p>
                            <?php endif ?>
                            <?php if ($this->session->flashdata("erro")) : ?>
                                <p class="alert alert-danger"><?= $this->session->flashdata("erro") ?></p>
                            <?php endif ?>      
                        </div>
                        <?php
                        echo heading("Agenda de Visitas ", 4, "class='divisor'");

                        //Início da listagem de visitas...
                        $array_visitas = array();
                        foreach ($visitas as $visita) {
                            $array_visitas[] = array(
                                $visita->id_visita,
                                $visita->data,
                                $visita->hora,
                                $visita->nome,
                                $visita->email,
                                $visita->telefone,
                                anchor(
                                        base_url() . "administracao/imoveis/reservar_imovel/" . $visita->id_imovel, "Reservar Imóvel", array('class' => "btn btn-warning btn-xs")
                                ) . "  " .
                                anchor(
                                        base_url() . "administracao/visitas/remarcar_visita/" . $visita->id_visita, "Remarcar Visita", array('class' => "btn btn-success btn-xs")
                                )
                            );
                        }

                        $template = array('table_open' => '<table class="table table-striped">');
                        $this->table->set_template($template);
                        $this->table->set_heading('Número', 'Data', 'Hora', 'Nome', 'Email', 'Telefone', 'Ações');
                        echo "<div class='wrapertable-responsive wraper_table'>";
                        echo $this->table->generate($array_visitas);
                        echo "</div>";
                        echo "<center><div id='paginacao'>" . $paginacao . "</div></center>";
                        ?>
                    </div>							
                </div>						

            </div>
        </div>
    </div>                                    
</div>