<?php /* Smarty version 2.6.26, created on 2012-09-13 01:29:11
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
     <?php if ($this->_tpl_vars['pagina'] != 'index.php'): ?>
         <div id="topo">
            <div class="container1">
                <h1><a href="#">Logo</a></h1>
                <h2>Sistema de Gerenciamento de Perfil de Clientes</h2>
            </div>
         </div>
     <?php endif; ?>
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
                            <ul id="menu-menu" class="nav"><li id="menu-item-22" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-22"><a href="./index.php">Home</a></li>
<!--                                <li id="menu-item-7" class="menu-item menu-item-type-custom menu-item-object-custom dropdown menu-item-7"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Réu<b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                        <li id="menu-item-8" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-8"><a href="cadAutor.php?tipoPessoa=R">Cadastrar</a></li>
                                        <li id="menu-item-8" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-8"><a href="listaAutor.php?tipoPessoa=R">Consultar</a></li>
                                    </ul>
                                </li>
                                <li id="menu-item-7" class="menu-item menu-item-type-custom menu-item-object-custom dropdown menu-item-7"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Autor<b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                        <li id="menu-item-8" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-8"><a href="cadAutor.php?tipoPessoa=A">Cadastrar</a></li>
                                        <li id="menu-item-8" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-8"><a href="listaAutor.php?tipoPessoa=A">Consultar</a></li>
                                    </ul>
                                </li>
                                <li id="menu-item-7" class="menu-item menu-item-type-custom menu-item-object-custom dropdown menu-item-7"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Processo<b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                        <li id="menu-item-8" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-8"><a href="cadProcesso.php">Cadastrar</a></li>
                                        <li id="menu-item-8" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-8"><a href="listaProcessos.php">Consultar</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">Pendências</a></li>  -->
                            </ul>            

                            <ul class="nav pull-right">
                                <li class="divider-vertical"></li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Administração<b class="caret"></b></a>
                                    <ul class="dropdown-menu">
<!--                                    <li><a href="listaTipos.php">Tipos</a></li>
                                        <li><a href="listaComarcas.php">Comarcas</a></li>
                                        <li><a href="listaVaras.php">Varas</a></li>
                                        <li><a href="listaAdvogados.php">Advogados</a></li>  -->
                                        <li><a href="listaCidades.php">Cidades</a></li>
                                        <li><a href="listaFuncionarios.php">Funcionarios</a></li>
                                        <li><a href="listaUsuarios.php">Usuarios</a></li>  
                                        <li><a href="listaClientes.php">Clientes</a></li>                                        
                                        <!--<li><a href="#">�?ndices</a></li>       --> 
                                        
                                        <li class="divider"></li>
                                        
                                        <li><a href="#">Parâmetros</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">Contato</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>           
        </div><!-- end of #header -->
    </body>
</html>