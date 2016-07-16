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
            <a class="navbar-brand" href="#">DSW3 Imóveis</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li>
                    <?php echo anchor(base_url() . 'administracao/home/painel', 'Início', 'title="Voltar para a Página inicial da Administracao"'); ?>
                </li>
                <li>
                    <?php echo anchor(base_url() . 'administracao/categorias', 'Categorias', 'title="Administrar Categorias de Imóveis"'); ?>
                </li>
                <li>
                    <?php echo anchor(base_url() . 'administracao/imoveis', 'Imóveis', 'title="Administrar Imóveis"'); ?>
                </li>
                <li>
                    <?php echo anchor(base_url() . 'administracao/clientes', 'Clientes', 'title="Administrar Clientes"'); ?>
                </li>
                <li>
                    <?php echo anchor(base_url() . 'administracao/usuarios', 'Corretores', 'title="Administrar Corretores"'); ?>
                </li>
            </ul>
            <span class='saudacao'>
                Seja bem vindo: 
                <?php
                echo $this->session->userdata('usuario');
                echo " | ";
                echo anchor(base_url() . 'administracao/login/encerrar_sessao', 'Sair', 'title="Sair da Administração"');
                ?>
            </span>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>