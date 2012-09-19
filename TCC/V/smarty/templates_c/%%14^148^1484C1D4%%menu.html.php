<?php /* Smarty version 2.6.26, created on 2012-09-18 18:03:49
         compiled from menu.html */ ?>
<!doctype html>
<!--[if lt IE 7 ]> <html class="no-js ie6" dir="ltr" lang="en-US"> <![endif]-->
<!--[if IE 7 ]>    <html class="no-js ie7" dir="ltr" lang="en-US"> <![endif]-->
<!--[if IE 8 ]>    <html class="no-js ie8" dir="ltr" lang="en-US"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> 
<html class="no-js" dir="ltr" lang="en-US"> <!--<![endif]--> 
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <script src="../V/js/jquery.js"></script>
        <script src="../V/js/bootstrap-dropdown.js"></script>
        <link rel='stylesheet' id='bootstrap-styles-css'  href='../V/css/bootstrap.css' type='text/css' media='all' />
        <link rel='stylesheet' id='bootstrap-responsive-styles-css'  href='../V/css/bootstrap-responsive.css' type='text/css' media='all' />
       <?php echo '
        <script type="text/javascript">
        
        $(document).ready(function() {
            $(\'.dropdown-toggle\').dropdown();   
        });
      
    </script>
    '; ?>

    </head>
     
     <div id="topo">
        <div class="container1">
            <h1><a href="#">Logo</a></h1>
            <h2>Gar&ccedil;om Nota 10</h2>                                   
            <h3>Sistema de Gerenciamento de Perfil de Clientes</h3>
        </div>
     </div>
     
    <body class="home blog">
        <div id="header">
        
            <div class="navbar navbar-fixed-top">
                <div class="navbar-inner">
                
                    <div class="container">
                        <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </a>
                        <div class="nav-collapse">

                            <ul id="menu-menu" class="nav">
                                <!--Links da area aberta -->
                                <li id="menu-item-1" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-22"><a href="home.php">Home</a></li>
                            </ul>
                            
                            
                            <?php if ($this->_tpl_vars['pagina'] != 'index.php'): ?>
                            <!--Links da area fechada -->  
                            <ul id="menu-menu" class="nav"> 
                                <li id="menu-item-3" class="menu-item menu-item-type-custom menu-item-object-custom dropdown menu-item-3">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Clientes<b class="caret"></b></a>
                                    <ul class="dropdown-menu"> 
                                        <li id="menu-item-8" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-8"><a href="listaClientes.php">Gerenciar</a></li> 
                                        <li id="menu-item-8" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-8"><a href="#">Frequencia</a></li>
                                        <li id="menu-item-8" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-8"><a href="#">Pedidos</a></li>
                                    </ul>
                                </li>
                                                                    
                                <li id="menu-item-2" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-22"><a href="listaEventos.php">Eventos</a></li>
                                <li id="menu-item-2" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-22"><a href="listaMensagens.php">Mensagens</a></li>
                               
                                <li id="menu-item-3" class="menu-item menu-item-type-custom menu-item-object-custom dropdown menu-item-3">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Reclama&ccedil;&otilde;es<b class="caret"></b></a>
                                    <ul class="dropdown-menu"> 
                                        <li id="menu-item-8" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-8"><a href="listaReclamacoes.php">Gerenciar</a></li> 
                                        <li id="menu-item-8" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-8"><a href="#">Categoria</a></li>
                                    </ul>
                                </li>   
                                                           
                              <li id="menu-item-3" class="menu-item menu-item-type-custom menu-item-object-custom dropdown menu-item-3">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Estabelecimento<b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                        <li id="menu-item-8" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-8"><a href="listaFuncionarios.php">Funcionarios</a></li>
                                        <li id="menu-item-8" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-8"><a href="#">Cargos</a></li>
                                        
                                        <li class="divider"></li>
                                        <li id="menu-item-8" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-8"><a href="listaProdutos.php">Produtos</a></li>
                                        <li id="menu-item-8" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-8"><a href="listaAmbientes.php">Ambientes</a></li>                                                                                
                                    </ul>
                                </li>
                            </ul>           
                            
                            <ul class="nav pull-right">
                                <li class="divider-vertical"></li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Administração<b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="listaUsuarios.php">Usu&aacute;rios</a></li>
                                        <li><a href="#">Tipo Acesso</a></li>
                                        
                                        <li class="divider"></li>
                                        <li><a href="#">Prefer&ecirc;ncias</a></li> 
                                        
                                        <li class="divider"></li>
                                        <li><a href="listaCidades.php">Cidades</a></li>                                     
                                        <li><a href="#">Parâmetros</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">Contato</a></li>
                                <li><a href="index.php">Sair</a></li>
                            </ul>
                            <?php endif; ?> 
                        </div>
                    </div>
                 
                </div>
            </div>           
       
        </div><!-- end of #header -->
    </body>
</html>