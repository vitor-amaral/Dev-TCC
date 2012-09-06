<?php /* Smarty version 2.6.26, created on 2012-08-25 20:34:52
         compiled from cadProcesso.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'math', 'cadProcesso.html', 122, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "menu.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<html>
    <?php echo '
    <head>
        <title>Processo</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="../V/css/datepicker.css">
        <link rel="stylesheet" type="text/css" href="../V/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../V/css/processo.css">
        <script  type="text/javascript" src="../V/js/processo.js" ></script>
        <link rel="stylesheet" type="text/css" href="../V/css/jquery-ui-1.8.20.custom.css" />
        <script type="text/javascript" >
            function mostraUsuarios(valor){
                if(valor == "R"){
                    $("#habilitaReu").show();
                    $("#habilitaAutor").hide();
                }
                
                if(valor == "A"){
                   $("#habilitaReu").hide();
                   $("#habilitaAutor").show();
                }
                if(valor == ""){
                   $("#habilitaReu").hide();
                   $("#habilitaAutor").hide();
                }
            }
         </script>
         <script type="text/javascript" src="../V/js/jquery.js"></script>
         <script type="text/javascript" src="../V/js/jquery-ui-1.8.20.custom.min.js"></script>
                          
         <script type="text/javascript" src="../V/js/bootstrap-datepicker.js"></script>
        <script type="text/javascript">
            $(function(){
			$(\'#id_date1\').datepicker({
				format: \'dd/mm/yyyy\'
			});
                        $(\'#id_date2\').datepicker({
				format: \'dd/mm/yyyy\'
			});
		});
         </script>
    </head>
    '; ?>

    <body>
        <div id="conteudo" style="height:100%;">
            <div class="container1">
                <div class="asdf">
                    <?php if ($this->_tpl_vars['ret'] == 'sa'): ?>
                            <span class="label label-success">SUCESSO</span>
                            <span> O Processo foi Alterado com Sucesso</span>
                     <?php endif; ?>
                     <?php if ($this->_tpl_vars['ret'] == 's'): ?>
                            <span class="label label-success">SUCESSO</span>
                            <span>O Processo foi Cadastrado com Sucesso</span>
                     <?php endif; ?>
                <fieldset id="tabelaCadastroProcesso">
                    <legend id="textoNavegacao">&nbsp;&nbsp;Processo :: <?php echo $this->_tpl_vars['msg']; ?>
</legend>
                    <form class="well form-inline" name="formProcesso" id="formProcesso" method="POST" action="salvaProcesso.php">
                            <div class="control-group">
                                <input type="hidden" name="processoSave" id="processoSave" value="<?php echo $this->_tpl_vars['processoSave']; ?>
" />
                                <input type="hidden" name="idProcesso" id="idProcesso" value="<?php echo $this->_tpl_vars['processo']->getIdProcesso(); ?>
" />
                           
                                <div class="controls" style="margin-bottom:10px;">
                                    <label for="numeroProcesso" class="control-label" style="font-size:13px;">Nº Processo:</label>
                                    <input type="text" id="numeroProcesso" name="numeroProcesso" value="<?php echo $this->_tpl_vars['processo']->getNumeroProcesso(); ?>
" class="input-medium arrendondaInputSelect">
                                    
                                    <label for="tipoPessoa" class="control-label" style="font-size:13px;margin-left:5px;" >Cliente:</label>
                                    <select id="tipoPessoa" name="tipoPessoa" class="arrendondaInputSelect">                               
                                        <option value="">&nbsp;</option>
                                        <?php if ($this->_tpl_vars['processo']->getCliente() == ''): ?>
                                            <option value="R">Reú</option>
                                            <option value="A">Autor</option>
                                        <?php endif; ?>
                                        
                                        <?php if ($this->_tpl_vars['processo']->getCliente() == 'R'): ?>
                                            <option value="R" selected="selected">Reú</option>
                                            <option value="A">Autor</option>
                                        <?php endif; ?>
                                        
                                        <?php if ($this->_tpl_vars['processo']->getCliente() == 'A'): ?>
                                            <option value="R">Reú</option>
                                            <option value="A" selected="selected" >Autor</option>
                                        <?php endif; ?>
                                    </select>
                                  
                                   <label for="comarca" class="control-label" style="font-size:13px;">Comarca</label>
                                        <select id="comarca" name="comarca" class="arrendondaInputSelect">
                                            <option value=""></option>
                                            <?php $_from = $this->_tpl_vars['comarcas']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['comarca']):
?>
                                            <option value="<?php echo $this->_tpl_vars['comarca']->getIdComarca(); ?>
" <?php if ($this->_tpl_vars['processo']->getIdComarca() == $this->_tpl_vars['comarca']->getIdComarca()): ?>selected='selected'<?php endif; ?>  ><?php echo $this->_tpl_vars['comarca']->getNomeComarca(); ?>
</option> 
                                            <?php endforeach; endif; unset($_from); ?>
                                        </select>
                                </div>
                                <div class="controls" style="margin-bottom:10px;">
                                        
                                        <label for="vara" class="control-label" style="font-size:13px;">Vara</label>
                                        <select id="vara" name="vara" class="arrendondaInputSelect">
                                            <option value=""></option>
                                            <?php $_from = $this->_tpl_vars['varas']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['vara']):
?>
                                            <option value="<?php echo $this->_tpl_vars['vara']->getIdVara(); ?>
" <?php if ($this->_tpl_vars['processo']->getIdVara() == $this->_tpl_vars['vara']->getIdVara()): ?>selected='selected'<?php endif; ?>><?php echo $this->_tpl_vars['vara']->getNomeVara(); ?>
</option> 
                                            <?php endforeach; endif; unset($_from); ?>
                                        </select>
                                        
                                </div>
                                
                           </div>
                                <div class="well" style="border:1px;color:#4D9DA8;border-style:solid;">
                                     
                                    <div class="controls" style="margin-bottom:10px;">

                                        <p>   
                                            <span class="label">Reú</span>
                                        </p>
                                        
                                        <ul class="lisFormVert">
                                            
                                            <?php $_from = $this->_tpl_vars['processoReus']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['processoReu']):
?>
                                             <?php $this->assign('contador', ($this->_tpl_vars['key'])."+1"); ?>
                                             
                                             <li class="lisFormColPeq">
                                                <select id="nomesReu_<?php echo smarty_function_math(array('equation' => 'x + y','x' => $this->_tpl_vars['key'],'y' => 1), $this);?>
" name="nomesReu_<?php echo smarty_function_math(array('equation' => 'x + y','x' => $this->_tpl_vars['key'],'y' => 1), $this);?>
" class="arrendondaInputSelect adicionaCampo">
                                                    <option value="">&nbsp;</option>
                                                        <?php $_from = $this->_tpl_vars['reus']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['reu']):
?>
                                                            <option value="<?php echo $this->_tpl_vars['reu']->getIdPessoa(); ?>
" <?php if ($this->_tpl_vars['processoReu']->getIdReu() == $this->_tpl_vars['reu']->getIdPessoa()): ?> selected="selected" <?php endif; ?> ><?php echo $this->_tpl_vars['reu']->getNomePessoa(); ?>
</option>
                                                        <?php endforeach; endif; unset($_from); ?>
                                                </select>

                                                <label for="descricaoReu" id="labelDescricao_<?php echo smarty_function_math(array('equation' => 'x + y','x' => $this->_tpl_vars['key'],'y' => 1), $this);?>
" class="control-label adicionaCampo" style="font-size:13px;">Descrição:</label> 
                                                <input type="text" id="descricaoReu_<?php echo smarty_function_math(array('equation' => 'x + y','x' => $this->_tpl_vars['key'],'y' => 1), $this);?>
" name="descricaoReu_<?php echo smarty_function_math(array('equation' => 'x + y','x' => $this->_tpl_vars['key'],'y' => 1), $this);?>
" style="width:550px;" value="<?php echo $this->_tpl_vars['processoReu']->getDescricaoReu(); ?>
" class="input-xlarge arrendondaInputSelect adicionaCampo descricaoNObrg" />
                                                <span class="lisFormIcon">
                                                        <a onclick="removeLinha(this,'Reu')" href="javascript:;" class="mini_botao botaoMenos" >
                                                                <img title="remover" alt="remover" src="../V/img/minus.png">
                                                        </a>
                                                        <a class="mini_botao botaoMais" onclick="adicionaLinha(this,'Reu');" href="javascript:;" <?php if ($this->_tpl_vars['key']+1 == $this->_tpl_vars['totalProcessoReu']): ?> style="display:block;float:right;" <?php endif; ?> <?php if ($this->_tpl_vars['key']+1 < $this->_tpl_vars['totalProcessoReu']): ?> style="display:none;" <?php endif; ?> >
                                                            <img title="adicionar" alt="adicionar" src="../V/img/plus.png">
                                                        </a>
                                                </span>
                                                <input type="hidden" name="idReu_<?php echo smarty_function_math(array('equation' => 'x + y','x' => $this->_tpl_vars['key'],'y' => 1), $this);?>
" id="idReu_<?php echo smarty_function_math(array('equation' => 'x + y','x' => $this->_tpl_vars['key'],'y' => 1), $this);?>
" value="<?php echo $this->_tpl_vars['processoReu']->getIdReuProcesso(); ?>
" />
                                             </li>
                                            
                                            <?php endforeach; endif; unset($_from); ?>
                                        </ul>
                                        <input type="hidden" name="contadorReu" id="contadorReu" value="<?php echo $this->_tpl_vars['totalProcessoReu']; ?>
">
                                    </div>
                                </div>
                                
                                 <div class="well" style="border:1px;color:#4D9DA8;border-style:solid;">
                                     
                                    <div class="controls" style="margin-bottom:10px;">

                                        <p>   
                                            <span class="label">Autor</span>
                                        </p>
                                        
                                        <ul class="lisFormVert">
                                            
                                            <?php $_from = $this->_tpl_vars['processosAutores']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['processoAutor']):
?>
                                             <?php $this->assign('contador', ($this->_tpl_vars['key'])."+1"); ?>
                                             
                                             <li class="lisFormColPeq">
                                                <select id="nomesAutor_<?php echo smarty_function_math(array('equation' => 'x + y','x' => $this->_tpl_vars['key'],'y' => 1), $this);?>
" name="nomesAutor_<?php echo smarty_function_math(array('equation' => 'x + y','x' => $this->_tpl_vars['key'],'y' => 1), $this);?>
" class="arrendondaInputSelect adicionaCampo">
                                                    <option value="">&nbsp;</option>
                                                    <?php $_from = $this->_tpl_vars['autores']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['autor']):
?>
                                                         <option value="<?php echo $this->_tpl_vars['autor']->getIdPessoa(); ?>
" <?php if ($this->_tpl_vars['processoAutor']->getIdAutor() == $this->_tpl_vars['autor']->getIdPessoa()): ?>selected="selected"<?php endif; ?> ><?php echo $this->_tpl_vars['autor']->getNomePessoa(); ?>
</option>
                                                    <?php endforeach; endif; unset($_from); ?>
                                                </select>

                                                <label for="descricaoAutor" id="labelAutor_<?php echo smarty_function_math(array('equation' => 'x + y','x' => $this->_tpl_vars['key'],'y' => 1), $this);?>
" class="control-label adicionaCampo" style="font-size:13px;">Descrição:</label> 
                                                <input type="text" id="descricaoAutor_<?php echo smarty_function_math(array('equation' => 'x + y','x' => $this->_tpl_vars['key'],'y' => 1), $this);?>
" name="descricaoAutor_<?php echo smarty_function_math(array('equation' => 'x + y','x' => $this->_tpl_vars['key'],'y' => 1), $this);?>
" style="width:550px;" value="<?php echo $this->_tpl_vars['processoAutor']->getDescricaoAutor(); ?>
" class="input-xlarge arrendondaInputSelect adicionaCampo descricaoNObrg" />
                                                <span class="lisFormIcon">
                                                        <a onclick="removeLinha(this,'Autor')" href="javascript:;" class="mini_botao botaoMenos" >
                                                                <img title="remover" alt="remover" src="../V/img/minus.png">
                                                        </a>
                                                        <a class="mini_botao botaoMais" onclick="adicionaLinha(this,'Autor');" href="javascript:;" <?php if ($this->_tpl_vars['key']+1 == $this->_tpl_vars['totalProcessoAutor']): ?> style="display:block;float:right;" <?php endif; ?> <?php if ($this->_tpl_vars['key']+1 < $this->_tpl_vars['totalProcessoAutor']): ?> style="display:none;" <?php endif; ?> >
                                                            <img title="adicionar" alt="adicionar" src="../V/img/plus.png">
                                                        </a>
                                                </span>
                                                <input type="hidden" name="idAutor_<?php echo smarty_function_math(array('equation' => 'x + y','x' => $this->_tpl_vars['key'],'y' => 1), $this);?>
" id="idAutor_<?php echo smarty_function_math(array('equation' => 'x + y','x' => $this->_tpl_vars['key'],'y' => 1), $this);?>
" value="<?php echo $this->_tpl_vars['processoAutor']->getIdAutorProcesso(); ?>
" />
                                             </li>
                                            
                                            <?php endforeach; endif; unset($_from); ?>
                                        </ul>
                                        <input type="hidden" name="contadorAutor" id="contadorAutor" value="<?php echo $this->_tpl_vars['totalProcessoAutor']; ?>
">
                                    </div>
                                </div>
                                
                                <div class="well" style="border:1px;color:#4D9DA8;border-style:solid;">
                                    <p>   
                                        <span class="label">Histórico</span>
                                        <input type="button" value="Adicionar Historico" class="btn btn-small" onClick="adicionaHistorico();">
                                    </p>
                                    
                                    <div class="controls" style="margin-bottom:10px;">
                                        <label for="id_date1" class="control-label" style="font-size:13px;">Data/Hora:</label>
                                        <input type="text" id="id_date1" name="id_date1" class="arrendondaInputSelect" />
                                       
                                        <label for="tipoDescricao" class="control-label" style="font-size:13px;margin-left:5px;">Tipo Descrição:</label>
                                        <select name="tipoDescricao" id="tipoDescricao" class="arrendondaInputSelect">
                                            <option value="">&nbsp;</option>
                                            <option value="1">Contato</option>
                                        </select>
                                    </div>
                                    
                                    <div class="controls" style="margin-bottom:10px;">
                                       <label for="descricao" class="control-label" style="font-size:13px;">Descrição:</label>
                                       <textarea name="descricao" id="descricao" class="input-xlarge arrendondaInputSelect" rows="5" cols="3" style="width:533px;height:126px;" ></textarea>                                       
                                    </div>
                                   
                                    <div class="controls">
                                        <label class="control-label" for="inlineCheckboxes">Pendente</label>
                                        <input id="inlineCheckbox1" name="pendente" type="checkbox" value="sim">
                                        
                                          
                                    </div>
                                   
                                </div>
                                
                                <div class="well" style="border:1px;color:#4D9DA8;border-style:solid;">
                                    <p>   
                                        <span class="label">Título</span>
                                        <input type="button" value="Adicionar Titulo" class="btn btn-small" onClick="adicionaTitulo();">
                                    </p>
                                    
                                    <div class="controls" style="margin-bottom:10px;">
                                        <label for="tipoTitulo" class="control-label" style="font-size:13px;">Tipo Título:</label>
                                        <select name="tipoTitulo" id="tipoTitulo" class="arrendondaInputSelect">
                                            <option value=""></option>
                                            <option value="1">Boleto</option>
                                            <option value="2">Cheque</option>
                                            <option value="3">Contrato</option>
                                            <option value="4">Duplicata</option>
                                            <option value="5">Nota Promissória</option>
                                        </select>
                                        
                                        <label for="tipoPagamento" class="control-label" style="font-size:13px;margin-left:10px;">Tipo Pagamento:</label>
                                        <select name="tipoPagamento" id="tipoPagamento" class="arrendondaInputSelect">
                                            <option value=""></option>
                                            <option value="1">IPTU</option>                              
                                        </select>
                                       
                                    </div>
                                    
                                    <div class="controls" style="margin-bottom:10px;">
                                        <label for="tipoBanco" class="control-label" style="font-size:13px;">Banco:</label>
                                        <select name="tipoBanco" id="tipoBanco" class="arrendondaInputSelect">
                                            <option value=""></option>
                                            <option value="1">Bradesco</option>
                                            <option value="2">Itau</option>
                                            <option value="3">Santander</option>
                                        </select>
                                        
                                        <label for="numero" class="control-label" style="font-size:13px;margin-left:10px;">Número:</label>
                                        <input type="text" name="numero" id="numero" class="input-medium arrendondaInputSelect" >
                                        
                                        <label for="id_date2" class="control-label" style="font-size:13px;margin-left:10px;">Data Vencimento:</label>
                                        <input type="text" id="id_date2" name="id_date2" class="input-medium arrendondaInputSelect" />
                                    </div>
                                    
                                    <div class="controls" style="margin-bottom:10px;">
                                        <label for="valorPagamento" class="control-label" style="font-size:13px;margin-left:10px;">Valor:</label>
                                        <div class="input-prepend input-append">
                                            <span class="add-on arrendondaInputSelect">$</span>
                                                <input id="appendedPrependedInput" class="span2 arrendondaInputSelect" type="text" size="16">
                                            <span class="add-on arrendondaInputSelect">.00</span>             
                                        </div>
                                    </div>
                                </div>
                                
                                 <div>
                            <button class="btn btn-primary" type="submit"><?php echo $this->_tpl_vars['nomeBotao']; ?>
</button>     
                        </div>
                    </form>
                    <button class="btn" onclick="return abreListagem();">Voltar para Listagem</button>
                </fieldset>
            </div>
                </div>
       </div>
    </body>
</html>