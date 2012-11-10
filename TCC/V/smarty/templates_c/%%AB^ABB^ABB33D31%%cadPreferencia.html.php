<?php /* Smarty version 2.6.26, created on 2012-11-10 22:55:20
         compiled from cadPreferencia.html */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "menu.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>       
<html>
    <?php echo '
    <head>
        <title>Preferencias</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="../V/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="../V/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../V/css/processo.css">                      
       
        <script type="text/javascript" language="JavaScript" src="../V/js/jquery.js"></script> 
        <script type="text/javascript" language="JavaScript" src="../V/js/_preferencia.js"></script>
        <script type="text/javascript" language="JavaScript" src="../V/js/bootstrap-modal.js"></script> 

                
        <script type="text/javascript">
            function abreListagem(){
                window.location.href="listaClientes.php";
            }
            
            function addSinonimo (){
                alert("baiba");                   

            }
      
        </script>
    </head>
    '; ?>

    <body>
        <div id="conteudo">
            <div class="container1">
                <div class="asdf">
                    <?php if ($this->_tpl_vars['ret'] == 'sc'): ?>
                            <span class="label label-success">SUCESSO</span>
                            <span> A preferência foi Cadastrada com Sucesso!</span>
                    <?php endif; ?>
                    <?php if ($this->_tpl_vars['ret'] == 'ec'): ?>
                            <span class="label label-important">ERRO</span>
                            <span> Não foi possivel Cadastrar.</span>  
                    <?php endif; ?>                                           
                <fieldset id="tabelaCadastro">
                    <legend id="textoNavegacao">&nbsp;&nbsp;Preferências :: <?php echo $this->_tpl_vars['msg']; ?>
</legend>
                    <form class="well form-inline" name="formPreferencia" id="formPreferencia" method="POST" action="salvaPreferencia.php">
                        <div class="control-group">
                            <input type="hidden" name="Save" id="Save" value="<?php echo $this->_tpl_vars['Save']; ?>
" />
                            <input type="hidden" name="idCliente" id="idCliente" value="<?php echo $this->_tpl_vars['idCliente']; ?>
" />                                
                            <p><span class="label">Preferências Objetivas</span></p>   
                            <div class="well" id="fpref" style="border:1px;color:#4D9DA8;border-style:solid; display:none;">
                                <div class="controls" style="margin-bottom:10px;">
                                    
                                   <label class="control-label" id="pergunta" for="pergid"></label>

                                   <input type="hidden" name="pergid" id="pergid" />
                                   <input type="hidden" name="catresp" id="catresp" />
                                   
                                   <?php $_from = $this->_tpl_vars['categorias']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['cat']):
?> 
                                    <?php $this->assign('categoria', $this->_tpl_vars['cat']->getCatResp_ID()); ?>
                                       <select id= "resposta_<?php echo $this->_tpl_vars['cat']->getCatResp_ID(); ?>
" class="arrendondaInputSelect" style="display:none;" >
                                          <option value="">Selecione</option>
                                           <?php $_from = $this->_tpl_vars['respostas'][$this->_tpl_vars['categoria']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['resp']):
?>
                                           <option id="resp_<?php echo $this->_tpl_vars['resp']->getResp_ID(); ?>
" value="<?php echo $this->_tpl_vars['resp']->getResp_ID(); ?>
" > <?php echo $this->_tpl_vars['resp']->getResp_Valor(); ?>
 </option> 
                                           <?php endforeach; endif; unset($_from); ?>
                                       </select>
                                   <?php endforeach; endif; unset($_from); ?>  
                                   
                                   <label for="opcao" class="control-label" >Prioridade/Opção:</label>
                                   <input type="text" id="opcao" name="opcao" class="input-small arrendondaInputSelect" disabled/>
                                                                      
                                </div>
                                <div class="controls" style="margin-bottom:10px;"> 
                                                                    
                                   <label for="comentario" class="control-label" >Observação:</label>
                                   <textarea  id="comentario" name="comentario" class="input-xlarge"></textarea>
                                    
                                   <p>
                                       <input type="button" value="Salvar" class="btn btn-small" onClick="salva()">
                                   </p>
                                </div>
                            </div>
                       
                            <table id="tabelaPreferencia" class="table tablepref table-bordered table-condensed">
                                <tr>
                                    <th>Pergunta</th>
                                    <th>Resposta</th> 
                                    <th>Observação</th>                                     
                                    <th>Ações</th>
                                </tr>
                                            
                                <?php $_from = $this->_tpl_vars['preferencias']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['loop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['loop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['pref']):
        $this->_foreach['loop']['iteration']++;
?>
                                <?php if ($this->_tpl_vars['pref']->getPref_Opcao() > 1): ?>
                                    <tr id="pref_<?php echo $this->_tpl_vars['pref']->getPerg_ID(); ?>
_<?php echo $this->_tpl_vars['pref']->getPref_Opcao(); ?>
" style="display:none;" class="trdetail">
                                        <td style="text-align:right;"><?php echo $this->_tpl_vars['pref']->getPref_Opcao(); ?>
°</td>
                                        <td><?php echo $this->_tpl_vars['pref']->getResp_Valor(); ?>
</td>
                                        <td><?php echo $this->_tpl_vars['pref']->getPref_Comentario(); ?>
</td>
                                        <td>
                                            <a href="#" id="<?php echo $this->_tpl_vars['pref']->getPerg_ID(); ?>
" onclick="editar(this);"><i id="edit" class="icon-edit"></i></a>
                                            <a href='#' id="<?php echo $this->_tpl_vars['pref']->getPerg_ID(); ?>
" onclick='excluir(this);'><i id="trash" class='icon-trash'></i></a>
                                        </td>
                                        <input type='hidden' name='perg[]' id='perg' value='<?php echo $this->_tpl_vars['pref']->getPerg_ID(); ?>
' />
                                        <input type='hidden' name='pergdesc[]' id='pergdesc' value='<?php echo $this->_tpl_vars['pref']->getPerg_Descricao(); ?>
' />
                                        <input type='hidden' name='catresp[]' id='catresp' value='<?php echo $this->_tpl_vars['pref']->getCatResp_ID(); ?>
' />
                                        <input type='hidden' name='resp[]' id='resp' value='<?php echo $this->_tpl_vars['pref']->getResp_ID(); ?>
' />
                                        <input type='hidden' name='op[]' id='op' value='<?php echo $this->_tpl_vars['pref']->getPref_Opcao(); ?>
' />
                                        <input type='hidden' name='com[]' id='com' value='<?php echo $this->_tpl_vars['pref']->getPref_Comentario(); ?>
' />
                                        <input type='hidden' name='idlinha[]' id='idlinha' value='pref_<?php echo $this->_tpl_vars['pref']->getPerg_ID(); ?>
_<?php echo $this->_tpl_vars['pref']->getPref_Opcao(); ?>
' />
                                    </tr>
                                <?php else: ?>
                                    <tr id="pref_<?php echo $this->_tpl_vars['pref']->getPerg_ID(); ?>
_<?php echo $this->_tpl_vars['pref']->getPref_Opcao(); ?>
">
                                        <td>
                                            <a href='#' id="<?php echo $this->_tpl_vars['pref']->getPerg_ID(); ?>
" onclick='opcoes(this);'><i id="open" class='icon-chevron-down'></i></a>
                                            <?php echo $this->_tpl_vars['pref']->getPerg_Descricao(); ?>

                                        </td>
                                        <td><?php echo $this->_tpl_vars['pref']->getResp_Valor(); ?>
</td>
                                        <td><?php echo $this->_tpl_vars['pref']->getPref_Comentario(); ?>
</td> 
                                        <td>
                                            <a href="#" id="<?php echo $this->_tpl_vars['pref']->getPerg_ID(); ?>
" onclick="editar(this);"><i id="edit" class="icon-edit"></i></a>
                                            <?php if ($this->_tpl_vars['pref']->getResp_Valor() != ''): ?>
                                                <a href='#' id="<?php echo $this->_tpl_vars['pref']->getPerg_ID(); ?>
" onclick='adiciona(this);'><i id="plus" class='icon-plus'></i></a>
                                            <?php endif; ?>
                                        </td>
                                        <input type='hidden' name='perg[]' id='perg' value='<?php echo $this->_tpl_vars['pref']->getPerg_ID(); ?>
' />
                                        <input type='hidden' name='pergdesc[]' id='pergdesc' value='<?php echo $this->_tpl_vars['pref']->getPerg_Descricao(); ?>
' />
                                        <input type='hidden' name='catresp[]' id='catresp' value='<?php echo $this->_tpl_vars['pref']->getCatResp_ID(); ?>
' />
                                        <input type='hidden' name='resp[]' id='resp' value='<?php echo $this->_tpl_vars['pref']->getResp_ID(); ?>
' />
                                        <input type='hidden' name='op[]' id='op' value='<?php echo $this->_tpl_vars['pref']->getPref_Opcao(); ?>
' />
                                        <input type='hidden' name='com[]' id='com' value='<?php echo $this->_tpl_vars['pref']->getPref_Comentario(); ?>
' />
                                        <input type='hidden' name='idlinha[]' id='idlinha' value='pref_<?php echo $this->_tpl_vars['pref']->getPerg_ID(); ?>
_<?php echo $this->_tpl_vars['pref']->getPref_Opcao(); ?>
' />
                                    </tr>
                                <?php endif; ?>   
                                <?php endforeach; endif; unset($_from); ?>
                                <input type="hidden" name="nomeLi" id="nomeLi" value=""/>
                                <input type='hidden' name='total' id='total' value='<?php echo $this->_tpl_vars['total']; ?>
' />
                                <input type='hidden' name='maiorid' id='maiorid' value='<?php echo $this->_tpl_vars['maiorid']; ?>
' />                                    
                            </table>  
        <!----------------------------------------------------------------------------------------------------------------------------------------------------------------> 
                            <p><span class="label">Preferências Refência</span></p>   
                            
                            <table id="tabelaPreferenciaref" class="table tablepref table-bordered table-condensed">
                                <tr>
                                    <th>Pergunta</th>
                                    <th>Resposta</th> 
                                    <th>Observação</th>                                     
                                    <th>Ações</th>
                                </tr>
                                            
                                <?php $_from = $this->_tpl_vars['preferenciasref']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['loopref'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['loopref']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['prefref']):
        $this->_foreach['loopref']['iteration']++;
?>
                                <?php if ($this->_tpl_vars['prefref']->getPref_Opcao() > 1): ?>
                                    <tr id="prefref_<?php echo $this->_tpl_vars['prefref']->getPerg_ID(); ?>
_<?php echo $this->_tpl_vars['prefref']->getPref_Opcao(); ?>
" class="trdetail">
                                        <td style="text-align:right;"><?php echo $this->_tpl_vars['prefref']->getPref_Opcao(); ?>
°</td>
                                        <td><?php echo $this->_tpl_vars['prefref']->getResp_Valor(); ?>
</td>
                                        <td><?php echo $this->_tpl_vars['prefref']->getPref_Comentario(); ?>
</td>
                                        <td>
                                            <a href="#windowTitleDialog" id="<?php echo $this->_tpl_vars['prefref']->getPerg_ID(); ?>
" onclick="editarref(this);" data-toggle="modal"><i id="edit" class="icon-edit"></i></a>
                                            <a href='#' id="<?php echo $this->_tpl_vars['prefref']->getPerg_ID(); ?>
" onclick='excluirref(this);'><i id="trash" class='icon-trash'></i></a>
                                        </td>
                                        <input type='hidden' name='pergref[]' id='pergref' value='<?php echo $this->_tpl_vars['prefref']->getPerg_ID(); ?>
' />
                                        <input type='hidden' name='pergdescref[]' id='pergdescref' value='<?php echo $this->_tpl_vars['prefref']->getPerg_Descricao(); ?>
' />
                                        <input type='hidden' name='catrespref[]' id='catrespref' value='<?php echo $this->_tpl_vars['prefref']->getCatResp_ID(); ?>
' />
                                        <input type='hidden' name='catresptab[]' id='catresptab' value='<?php echo $this->_tpl_vars['prefref']->getCatresp_tabReferencia(); ?>
' />
                                        <input type='hidden' name='respref[]' id='respref' value='<?php echo $this->_tpl_vars['prefref']->getPref_Resp(); ?>
' />
                                        <input type='hidden' name='opref[]' id='opref' value='<?php echo $this->_tpl_vars['prefref']->getPref_Opcao(); ?>
' />
                                        <input type='hidden' name='comref[]' id='comref' value='<?php echo $this->_tpl_vars['prefref']->getPref_Comentario(); ?>
' />
                                        <input type='hidden' name='idlinharef[]' id='idlinharef' value='prefref_<?php echo $this->_tpl_vars['prefref']->getPerg_ID(); ?>
_<?php echo $this->_tpl_vars['prefref']->getPref_Opcao(); ?>
' />
                                    </tr>
                                <?php else: ?>
                                    <tr id="prefref_<?php echo $this->_tpl_vars['prefref']->getPerg_ID(); ?>
_<?php echo $this->_tpl_vars['prefref']->getPref_Opcao(); ?>
">
                                        <td>
                                            <a href='#' id="<?php echo $this->_tpl_vars['prefref']->getPerg_ID(); ?>
" onclick='opcoesref(this);'><i id="open" class='icon-chevron-down'></i></a>
                                            <?php echo $this->_tpl_vars['prefref']->getPerg_Descricao(); ?>

                                        </td>
                                        <td><?php echo $this->_tpl_vars['prefref']->getResp_Valor(); ?>
</td> 
                                        <td><?php echo $this->_tpl_vars['prefref']->getPref_Comentario(); ?>
</td> 
                                        <td>
                                            <a href="#windowTitleDialog" id="<?php echo $this->_tpl_vars['prefref']->getPerg_ID(); ?>
" onclick="editarref(this);" data-toggle="modal"><i id="edit" class="icon-edit"></i></a>
                                            <?php if ($this->_tpl_vars['prefref']->getPref_Resp() != ''): ?> 
                                                <a href='#windowTitleDialog' id="<?php echo $this->_tpl_vars['prefref']->getPerg_ID(); ?>
" onclick='adicionaref(this);' data-toggle="modal"><i id="plus" class='icon-plus'></i></a>
                                            <?php endif; ?>
                                        </td>
                                        <input type='hidden' name='pergref[]' id='pergref' value='<?php echo $this->_tpl_vars['prefref']->getPerg_ID(); ?>
' />
                                        <input type='hidden' name='pergdescref[]' id='pergdescref' value='<?php echo $this->_tpl_vars['prefref']->getPerg_Descricao(); ?>
' />
                                        <input type='hidden' name='catrespref[]' id='catrespref' value='<?php echo $this->_tpl_vars['prefref']->getCatResp_ID(); ?>
' />
                                        <input type='hidden' name='catresptab[]' id='catresptab' value='<?php echo $this->_tpl_vars['prefref']->getCatresp_tabReferencia(); ?>
' />
                                        <input type='hidden' name='respref[]' id='respref' value='<?php echo $this->_tpl_vars['prefref']->getPref_Resp(); ?>
' />  
                                        <input type='hidden' name='opref[]' id='opref' value='<?php echo $this->_tpl_vars['prefref']->getPref_Opcao(); ?>
' />
                                        <input type='hidden' name='comref[]' id='comref' value='<?php echo $this->_tpl_vars['prefref']->getPref_Comentario(); ?>
' />
                                        <input type='hidden' name='idlinharef[]' id='idlinharef' value='prefref_<?php echo $this->_tpl_vars['prefref']->getPerg_ID(); ?>
_<?php echo $this->_tpl_vars['prefref']->getPref_Opcao(); ?>
' />
                                    </tr>
                                <?php endif; ?>   
                                <?php endforeach; endif; unset($_from); ?>
                                <input type="hidden" name="nomeLiref" id="nomeLiref" value=""/>
                                <input type='hidden' name='totalref' id='totalref' value='<?php echo $this->_tpl_vars['totalref']; ?>
' />
                                <input type='hidden' name='maioridref' id='maioridref' value='<?php echo $this->_tpl_vars['maioridref']; ?>
' />                                    
                            </table>
                                
                                
                                
                          <div id="windowTitleDialog" class="modal hide fade">
                            <div class="modal-header">
                                <a data-dismiss="modal" class="close" href="#">×</a>
                                <h5>Edita Preferência Referência</h5>  
                            </div>
                            <div class="modal-body" style="overflow:auto;height:400px;">  
                                <div class="divDialogElements">
                                    <label class="control-label" id="perguntaref" for="pergidref"></label>
                                    <input type="hidden" name="pergidref" id="pergidref" />
                                    <input type="hidden" name="catrespref" id="catrespref" />
                                    <input type="hidden" name="catresptab" id="catresptab" />
                                </div>
                                <div id="retorno" class="divDialogElements">
                                    <!-- tabela com as opções que podem ser selecionadas - carregada por ajax-->   
                                </div>
                                <div class="divDialogElements">                                     
                                    <label for="opcaoref" class="control-label" >Prioridade/Opção:</label>
                                    <input type="text" id="opcaoref" name="opcaoref" class="input-small arrendondaInputSelect" disabled/>
                                    </br></br>                               
                                    <label for="comentarioref" class="control-label" >Observação:</label>
                                    <textarea  id="comentarioref" name="comentarioref" class="input-xlarge"></textarea>                                            
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn" data-dismiss="modal" aria-hidden="true">Sair</button>
                                <button class="btn btn-primary" data-dismiss="modal" aria-hidden="true" onClick="salvaref()">Salvar</button>
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