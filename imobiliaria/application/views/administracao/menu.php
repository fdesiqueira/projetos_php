<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
	<div class="container">
    	<!-- Collect the nav links, forms, and other content for toggling -->
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	        <ul class="nav navbar-nav">
	        	<li>
	                <?php echo anchor(base_url(), 'Home', 'title="Voltar para a Página inicial"'); ?>
	            </li>
	            <li>
	                <?php echo anchor(base_url(). 'administracao/categorias', 'Categorias', 'title="Administrar Categorias de Imóveis"'); ?>
	            </li>
	            <li>
	                <?php echo anchor(base_url(). 'administracao/imoveis', 'Imóveis', 'title="Administrar Imóveis"'); ?>
	            </li>
	            <li>
	                <?php echo anchor(base_url(). 'administracao/clientes', 'Clientes', 'title="Administrar Clientes"'); ?>
	            </li>
	            <li>
	                <?php echo anchor(base_url(). 'administracao/usuarios', 'Usuários', 'title="Administrar Usuarios"'); ?>
	            </li>
	        </ul>
	         <span class='saudacao'>
				Seja bem vindo: 
				<?php
					echo $this->session->userdata('usuario');
					echo " | ";
					echo anchor(base_url(). 'administracao/home/logout', 'Sair', 'title="Sair da Administração"');
				?>
			</span>
	    </div>
	   
	</div>
</nav>