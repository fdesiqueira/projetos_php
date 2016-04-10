<!-- Navigation - Menu Principal -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Alexandre Monteiro Imóveis</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <?php echo anchor(base_url('default_controller'),"Inicio") ?>
                    </li>
                    <li>
                        <?php echo anchor(base_url('sobre'),"Sobre a Empresa") ?>                        
                    </li>
                    <li>
                        <?php echo anchor(base_url('imoveis'),"Busca Imoveis") ?>                        
                    </li>
                    <li> 
                        <?php echo anchor(base_url('contato'),"Contato") ?>                        
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
