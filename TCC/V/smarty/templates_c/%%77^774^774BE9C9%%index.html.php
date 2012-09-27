<?php /* Smarty version 2.6.26, created on 2012-09-27 03:16:14
         compiled from index.html */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "menu.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<html>
    <?php echo '
    <head>
        <title>Garçom Nota 10!</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="../V/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="../V/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../V/css/processo.css">
    </head>
    '; ?>

    <body align="center">
        <div id="conteudo" >
            <div class="container1" style="width:20%;padding-top:10%; margin-left:40%;">     

        <form class="well" action="Home.php" method="POST">
            <div class="control-group">                                                              
                <div class="controls" align="center">
                    <label>Login</label>
                    <input type="text" class="span2 mcg" id="loginUser"/>
                    <label>Senha</label>
                    <input type="password" class="span2 mcg" id="passUser"/>
                    <center>
                    <button type="submit" class="btn">Entrar</button>
                    </center>
                </div>    
            </div>        
        </form>            

                         </div>
        </div>
    </body>
</html>