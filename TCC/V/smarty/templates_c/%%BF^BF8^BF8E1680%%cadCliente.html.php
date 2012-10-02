<?php /* Smarty version 2.6.26, created on 2012-10-02 02:26:47
         compiled from cadCliente.html */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "menu.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>       
<html>
    <?php echo '
    <head>
        <title>Cliente</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="../V/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="../V/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../V/css/processo.css">
        
        
        <script type="text/javascript" language="JavaScript" src="../V/js/jquery.js"></script>
        <script type="text/javascript" language="JavaScript" src="../V/js/jquery.maskedinput.js"></script>
        <script type="text/javascript" language="JavaScript" src="../V/js/_cliente.js"></script> 
                
        <script type="text/javascript">
            $(function(){
                $("#dtNasc").mask("99/99/9999");
                $("#telefone").mask("(99) 9999-9999");
                $("#cep").mask("99999-999");
            });
            
            function abreListagem(){
                window.location.href="listaClientes.php";
            }
        </script>
    </head>
    '; ?>

    <body>
        <div id="conteudo">
            <div class="container1">
                <div class="asdf">
                    <?php if ($this->_tpl_vars['ret'] == 'sa'): ?>
                            <span class="label label-success">SUCESSO</span>
                            <span> O Cliente foi Alterado com Sucesso!</span>
                    <?php endif; ?>
                    <?php if ($this->_tpl_vars['ret'] == 'sc'): ?>
                            <span class="label label-success">SUCESSO</span>
                            <span> O Cliente foi Cadastrado com Sucesso!</span>
                    <?php endif; ?>
                    <?php if ($this->_tpl_vars['ret'] == 'ea'): ?>
                            <span class="label label-important">ERRO</span>
                            <span> Não foi possivel Alterar. Confira se ja existe um cliente com esses dados (Nome e Referencia).</span>
                    <?php endif; ?>                     
                    <?php if ($this->_tpl_vars['ret'] == 'ec'): ?>
                            <span class="label label-important">ERRO</span>
                            <span> Não foi possivel Cadastrar. Confira se ja existe um cliente com esses dados (Nome e Referencia).</span>
                    <?php endif; ?>                                           
                <fieldset id="tabelaCadastro">
                    <legend id="textoNavegacao">&nbsp;&nbsp;Cliente :: <?php echo $this->_tpl_vars['msg']; ?>
</legend>
                    <form class="well form-inline" name="formCliente" id="formCliente" method="POST" action="salvaCliente.php">
                        <div class="control-group">
                            <input type="hidden" name="Save" id="Save" value="<?php echo $this->_tpl_vars['Save']; ?>
" />
                            <input type="hidden" name="idCliente" id="idCliente" value="<?php echo $this->_tpl_vars['cliente']->getCli_id(); ?>
" />
                            
                            <div class="controls" style="margin-bottom:10px;">
                                <label for="nomeCliente" class="control-label" >Nome:</label>
                                <input type="text" id="nomeCliente" name="nomeCliente" class="input-xlarge arrendondaInputSelect" value="<?php echo $this->_tpl_vars['cliente']->getCli_nome(); ?>
">      
 
                                <label for="referenciaCliente" class="control-label" >Referência:</label>
                                <input type="text" id="referenciaCliente" name="referenciaCliente" class="input-xlarge arrendondaInputSelect" placeholder="Como lembrar do cliente..." value="<?php echo $this->_tpl_vars['cliente']->getCli_referencia(); ?>
"> 
                            </div> 
                                                        
                            <div class="controls" style="margin-bottom:10px;">                                 
                                <label for="dtNasc" class="control-label" >Data Nascimento:</label>
                                <input type="text" id="dtNasc" name="dtNasc" class="input-small arrendondaInputSelect" value="<?php echo $this->_tpl_vars['cliente']->getCli_dtNasc(); ?>
">

                                <label for="apelido" class="control-label" >Apelido:</label>
                                <input type="text" id="apelido" name="apelido"  class="input-medium arrendondaInputSelect" value="<?php echo $this->_tpl_vars['cliente']->getCli_apelido(); ?>
" />
                                                                                
                                <br/><br/>
                                <label for="email" class="control-label" >Email:</label>
                                <input type="text" name="email" id="email" class="input-xxlarge arrendondaInputSelect" value="<?php echo $this->_tpl_vars['cliente']->getCli_email(); ?>
" />
                                                                                
                                <br/><br/> 
                                <label for="estCivil" class="control-label" >Relacionamento:</label>
                                <select id="estCivil" name="estCivil" class="arrendondaInputSelect">
                                   <option value=""></option>
                                   <option value="1" <?php if ($this->_tpl_vars['cliente']->getCli_estCivil() == 1): ?> selected='selected' <?php endif; ?> >Solteiro</option> 
                                   <option value="2" <?php if ($this->_tpl_vars['cliente']->getCli_estCivil() == 2): ?> selected='selected' <?php endif; ?> >Casado/União Estável</option>
                                   <option value="3" <?php if ($this->_tpl_vars['cliente']->getCli_estCivil() == 3): ?> selected='selected' <?php endif; ?> >Divorciado</option>
                                   <option value="4" <?php if ($this->_tpl_vars['cliente']->getCli_estCivil() == 4): ?> selected='selected' <?php endif; ?> >Namorando</option>
                                   <option value="5" <?php if ($this->_tpl_vars['cliente']->getCli_estCivil() == 5): ?> selected='selected' <?php endif; ?> >Viúvo</option>
                                </select>
                                
                                <label for="idIndicador" class="control-label" >Indicador:</label>
                                <select id="idIndicador" name="idIndicador" class="arrendondaInputSelect" >
                                   <option value=""></option>
                                    <?php $_from = $this->_tpl_vars['indicadores']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['indicador']):
?>
                                    <option value="<?php echo $this->_tpl_vars['indicador']->getCli_id(); ?>
" <?php if ($this->_tpl_vars['indicador']->getCli_id() == $this->_tpl_vars['cliente']->getCli_id_indicador()): ?> selected='selected' <?php endif; ?> >
                                    <?php echo $this->_tpl_vars['indicador']->getCli_nome(); ?>
 -- <?php echo $this->_tpl_vars['indicador']->getCli_referencia(); ?>
  
                                    </option> 
                                    <?php endforeach; endif; unset($_from); ?>
                                </select> 

                            </div>
                            
                            <div class="well" id="end" style="border:1px;color:#4D9DA8;border-style:solid;">
                                <p><span class="label">Endereço</span></p>

                                <div class="controls" style="margin-bottom:10px;"> 
                                    <label for="endereco" class="control-label" >Logradouro:</label>  
                                    <input type="text" name="endereco" id="endereco" class="input-xxlarge arrendondaInputSelect"/>  
                                                                 
                                    <label for="numero" class="control-label" >Nº</label>
                                    <input type="text" name="numero" id="numero" class="input-mini arrendondaInputSelect"/>
                                    
                                </div>                  

                                <div class="controls" style="margin-bottom:10px;">
                                 
                                    <label for="complemento" class="control-label" >Complemento:</label>
                                    <input type="text" name="complemento" id="complemento" class="input-medium arrendondaInputSelect"/>
                                                                     
                                    <label for="bairro" class="control-label" >Bairro:</label>
                                    <input type="text" name="bairro" id="bairro" class="input-medium arrendondaInputSelect"/>                                    

                                    <label for="cep" class="control-label" >Cep:</label>
                                    <input type="text" id="cep" name="cep" class="input-small arrendondaInputSelect" />         
                                    
                                    <label for="cidade" class="control-label" >Cidade:</label>
                                    <!--<input type="text" name="cidade" id="cidade" class="input-medium arrendondaInputSelect"/>-->
                                    <select name="cidade" id="cidade" class="input-medium arrendondaInputSelect">
                                        <option value=""></option>
                                        <?php $_from = $this->_tpl_vars['cidades']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['cidade']):
?>
                                        <option id="<?php echo $this->_tpl_vars['cidade']->getCidade_ID(); ?>
" value="<?php echo $this->_tpl_vars['cidade']->getCidade_ID(); ?>
"><?php echo $this->_tpl_vars['cidade']->getCidade_Nome(); ?>
 / <?php echo $this->_tpl_vars['cidade']->getUf_Sigla(); ?>
</option> 
                                        <?php endforeach; endif; unset($_from); ?>                                        
                                    </select>

                                    <!-- Combo UF                                    
                                    <label for="uf" class="control-label" >UF:</label>
                                    <select name="uf" id="uf" class="input-mini arrendondaInputSelect">
                                        <option value=""></option>                                      
                                       <option value="AC"> AC </option>
                                        <option value="AL"> AL </option>
                                        <option value="AM"> AM </option>
                                        <option value="AP"> AP </option>
                                        <option value="BA"> BA </option>
                                        <option value="CE"> CE </option>
                                        <option value="DF"> DF </option>
                                        <option value="ES"> ES </option>
                                        <option value="GO"> GO </option>
                                        <option value="MA"> MA </option>
                                        <option value="MG"> MG </option>
                                        <option value="MS"> MS </option>
                                        <option value="MT"> MT </option>
                                        <option value="PA"> PA </option>
                                        <option value="PB"> PB </option>
                                        <option value="PE"> PE </option>
                                        <option value="PI"> PI </option>
                                        <option value="PR"> PR </option>
                                        <option value="RJ"> RJ </option>
                                        <option value="RN"> RN </option>
                                        <option value="RO"> RO </option>
                                        <option value="RR"> RR </option>
                                        <option value="RS"> RS </option>
                                        <option value="SC"> SC </option>
                                        <option value="SE"> SE </option>
                                        <option value="SP" selected> SP </option>
                                        <option value="TO"> TO </option>
                                    </select> -->    
                                </div>
                                <div class="controls" style="margin-bottom:10px;">
                                    <!--                                    <label for="obs" class="control-label" >Observação:</label>
                                    <textarea rows="3" id="obsEnd" name="obsEnd" cols="60" class="input-xlarge"></textarea>-->
                                    <p>
                                        <input type="button" value="Adicionar Endereço" class="btn btn-small" onClick="adicionaEndereco();">
                                    </p>
                                </div>
                                
                                <!-- Grid Endereço-->                                   
                                <div id="enderecos"  <?php if ($this->_tpl_vars['totalEndereco'] < 1): ?> style="display:none;" <?php endif; ?>>

                                        <table id="tabelaEndereco" class="table table-striped table-bordered table-condensed">
                                            <tr>
                                                <th>Logradouro</th>
                                                <th>Nº</th>
                                                <th>Complemento</th>
                                                <th>Bairro</th>
                                                <th>Cep</th>
                                                <th>Cidade</th>
                                                <!--<td>Obs</td> -->
                                                <th>Ações</th>
                                            </tr>
                                            <?php if ($this->_tpl_vars['totalEndereco'] >= 1): ?>
                                                <?php $_from = $this->_tpl_vars['endereco']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['loopend'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['loopend']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['end']):
        $this->_foreach['loopend']['iteration']++;
?>
                                                <tr id="endereco_<?php echo $this->_foreach['loopend']['iteration']; ?>
_<?php echo $this->_tpl_vars['end']->getEnd_ID(); ?>
">
                                                    <td><?php echo $this->_tpl_vars['end']->getEnd_Rua(); ?>
</td>
                                                    <td><?php echo $this->_tpl_vars['end']->getEnd_Num(); ?>
</td>
                                                    <td><?php echo $this->_tpl_vars['end']->getEnd_Complemento(); ?>
</td>
                                                    <td><?php echo $this->_tpl_vars['end']->getEnd_Bairro(); ?>
</td>
                                                    <td><?php echo $this->_tpl_vars['end']->getEnd_Cep(); ?>
</td>
                                                    <td><?php echo $this->_tpl_vars['end']->getCid_Nome(); ?>
 / <?php echo $this->_tpl_vars['end']->getUf_Sigla(); ?>
</td>
                                                    <td>
                                                        <a href="#" id="<?php echo $this->_tpl_vars['end']->getEnd_ID(); ?>
" onclick="editarEndereco(this);"><i class="icon-edit"></i></a>
                                                        <a href='#' id="<?php echo $this->_tpl_vars['end']->getEnd_ID(); ?>
" onclick='excluirEndereco(this);'><i class='icon-trash'></i></a>
                                                    </td>
                                                    <input type='hidden' name='end[]' id='end' value='<?php echo $this->_tpl_vars['end']->getEnd_Rua(); ?>
' />
                                                    <input type='hidden' name='comp[]' id='comp' value='<?php echo $this->_tpl_vars['end']->getEnd_Complemento(); ?>
' />
                                                    <input type='hidden' name='num[]' id='num' value='<?php echo $this->_tpl_vars['end']->getEnd_Num(); ?>
' />
                                                    <input type='hidden' name='ceptab[]' id='ceptab' value='<?php echo $this->_tpl_vars['end']->getEnd_Cep(); ?>
' />
                                                    <input type='hidden' name='bairrotab[]' id='bairrotab' value='<?php echo $this->_tpl_vars['end']->getEnd_Bairro(); ?>
' />
                                                    <input type='hidden' name='cid[]' id='cid' value='<?php echo $this->_tpl_vars['end']->getCid_ID(); ?>
' />
                                                    <input type='hidden' name='idEnd[]' id='idEnd' value='<?php echo $this->_foreach['loopend']['iteration']; ?>
' />
                                                    <input type='hidden' name='idEndbd[]' id='idEndbd' value='<?php echo $this->_tpl_vars['end']->getEnd_ID(); ?>
' />
                                                </tr>
                                                <?php endforeach; endif; unset($_from); ?>
                                                
                                            <?php endif; ?>
                                            <input type="hidden" name="nomeLiEnd" id="nomeLiEnd" value=""/>
                                            <input type='hidden' name='totalEndereco' id='totalEndereco' value='<?php echo $this->_tpl_vars['totalEndereco']; ?>
' />
                                            <input type='hidden' name='maiorEndid' id='maiorEndid' value='<?php echo $this->_tpl_vars['maiorEndid']; ?>
' />  
                                        </table>
                                          
                                    </div>
                            
                            </div>                                                            
                        
                                <div class="well" id="fone" style="border:1px;color:#4D9DA8;border-style:solid;">
                                    <p><span class="label">Telefone</span></p>
                                    
                                    <div class="controls" style="margin-bottom:10px;">
                                        <label for="telefone" class="control-label" >Número:</label>
                                        <input type="text" name="telefone" id="telefone" class="input-medium arrendondaInputSelect" value=""/>

                                        <label for="tipoTelefone" class="control-label" >Tipo:</label>
                                        <select name="tipoTelefone" id="tipoTelefone" class="input-small arrendondaInputSelect">
                                            <option value="">--Selecione--</option>
                                            <option id="tel_1" value="1">Fixo</option>
                                            <option id="tel_2" value="2">Celular</option>
                                            
                                        </select>
                                        <label for="obsTelefone" class="control-label" >Observação:</label>
                                        <textarea rows="1"  id="obsTelefone" name="obsTelefone" class="input-xlarge"></textarea>
                                        <p>
                                            <input type="button" value="Adicionar Telefone" class="btn btn-small" onClick="adicionaTelefone()">
                                        </p>
                                    </div>
                                    
                                    <div id="telefones" <?php if ($this->_tpl_vars['totalTelefone'] < 1): ?> style="display:none;" <?php endif; ?>>

                                        <table id="tabelaTelefone" class="table table-striped table-bordered table-condensed">
                                            <tr>
                                                <th>Número</th>
                                                <th>Tipo</th> 
                                                <th>Obs</th>
                                                <th>Ações</th>
                                            </tr>
                                            <?php if ($this->_tpl_vars['totalTelefone'] >= 1): ?>
                                                <?php $_from = $this->_tpl_vars['telefone']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['loop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['loop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['fone']):
        $this->_foreach['loop']['iteration']++;
?>
                                                <tr id="telefone_<?php echo $this->_foreach['loop']['iteration']; ?>
_<?php echo $this->_tpl_vars['fone']->getTel_ID(); ?>
">
                                                    <td><?php echo $this->_tpl_vars['fone']->getTel_Telefone(); ?>
</td>
                                                    <td><?php echo $this->_tpl_vars['fone']->getTel_TipoDesc(); ?>
</td>
                                                    <td><?php echo $this->_tpl_vars['fone']->getTel_Observacao(); ?>
</td>
                                                    <td>
                                                        <a href="#" id="<?php echo $this->_tpl_vars['fone']->getTel_ID(); ?>
" onclick="editarTelefone(this);"><i class="icon-edit"></i></a>
                                                        <a href='#' id="<?php echo $this->_tpl_vars['fone']->getTel_ID(); ?>
" onclick='excluirTelefone(this);'><i class='icon-trash'></i></a>
                                                    </td>
                                                    <input type='hidden' name='tel[]' id='tel' value='<?php echo $this->_tpl_vars['fone']->getTel_Telefone(); ?>
' />
                                                    <input type='hidden' name='tipoTel[]' id='tipoTel' value='<?php echo $this->_tpl_vars['fone']->getTel_Tipo(); ?>
' />
                                                    <input type='hidden' name='obsTel[]' id='obsTel' value='<?php echo $this->_tpl_vars['fone']->getTel_Observacao(); ?>
' />
                                                    <input type='hidden' name='idTel[]' id='idTel' value='<?php echo $this->_foreach['loop']['iteration']; ?>
' />
                                                    <input type='hidden' name='idTelbd[]' id='idTelbd' value='<?php echo $this->_tpl_vars['fone']->getTel_ID(); ?>
' />                                                     
                                                </tr>
                                                <?php endforeach; endif; unset($_from); ?>
                                                 
                                            <?php endif; ?>
                                            <input type="hidden" name="nomeLiTel" id="nomeLiTel" value=""/>
                                            <input type='hidden' name='totalTelefone' id='totalTelefone' value='<?php echo $this->_tpl_vars['totalTelefone']; ?>
' />
                                            <input type='hidden' name='maiortelid' id='maiortelid' value='<?php echo $this->_tpl_vars['maiortelid']; ?>
' />
                                            
                                        </table>

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