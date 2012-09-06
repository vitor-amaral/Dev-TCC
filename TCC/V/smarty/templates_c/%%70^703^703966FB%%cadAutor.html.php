<?php /* Smarty version 2.6.26, created on 2012-08-25 20:32:11
         compiled from cadAutor.html */ ?>
 <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "menu.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>     
<html>
    <?php echo '
    <head>
        <title>Pessoa</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="../V/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../V/css/processo.css">
        <script type="text/javascript" language="JavaScript" src="../V/js/autor.js"></script>
        <script type="text/javascript" language="JavaScript" src="../V/js/jquery.js"></script>
        <script type="text/javascript" language="JavaScript" src="../V/js/jquery.maskedinput.js"></script>
        <script type="text/javascript" language="JavaScript">
            function abreListagem(tipo){
                window.location.href="listaAutor.php?tipoPessoa="+tipo;
            }
            function valida(){
                
                var nomePessoa = $("#nomeAutor").val();
                if(nomePessoa == ""){
                   return false;
                }else{
                    $("#formAutor").submit();
                }
            }
            function submitenter(myfield,e)
            {
                var keycode;
                if (window.event) keycode = window.event.keyCode;
                else if (e) keycode = e.which;
                else return true;

                if (keycode == 13)
                {
                    return false;
                }
                else{
                    myfield.form.submit();
                    return true;
                }
            }
            $(function($){
 
                $("#telefoneAutor").mask("(99) 9999-9999");
                $("#cpfAutor").mask("999.999.999-99");
                $("#cnpjAutor").mask("99.999.999/9999-99");
                $("#cep").mask("99999-999");
            });
        </script>
    </head>
    '; ?>

    <body>
        <div id="conteudo" style='height:100%;'>
            <div class="container1">
                <div class="asdf">
                    <?php if ($this->_tpl_vars['ret'] == 'sa'): ?>
                            <span class="label label-success">SUCESSO</span>
                            <span>O <?php echo $this->_tpl_vars['nomeTela']; ?>
 foi Alterado com Sucesso</span>
                     <?php endif; ?>
                     <?php if ($this->_tpl_vars['ret'] == 's'): ?>
                            <span class="label label-success">SUCESSO</span>
                            <span>O <?php echo $this->_tpl_vars['nomeTela']; ?>
 foi Cadastrado com Sucesso</span>
                     <?php endif; ?>
                <fieldset id="tabelaCadastro">
                    <legend id="textoNavegacao">&nbsp;&nbsp;<?php echo $this->_tpl_vars['nomeTela']; ?>
 :: <?php echo $this->_tpl_vars['msg']; ?>
</legend>
                    <form class="well form-inline"  name="formAutor" id="formAutor" method="POST" action="salvaAutor.php" onsubmit="return valida();">
                            <div class="control-group">
                                <input type="hidden" name="tipoSave" id="tipoSave" value="<?php echo $this->_tpl_vars['tipoSave']; ?>
" />
                                <input type="hidden" name="idPessoa" id="idPessoa" value="<?php echo $this->_tpl_vars['pessoa']->getIdPessoa(); ?>
" />
                                <input type="hidden" name="tipoPessoa" id="tipoPessoa" value="<?php echo $this->_tpl_vars['tipoPessoa']; ?>
" />
                                <div class="controls" style="margin-bottom:10px;">
                                    <label for="nomeAutor" class="control-label" style="font-size:13px;">Nome:</label>
                                    <input type="text" id="nomeAutor" name="nomeAutor" class="input-xlarge arrendondaInputSelect" value="<?php echo $this->_tpl_vars['pessoa']->getNomePessoa(); ?>
">

                                    <label for="tipoPessoa" class="control-label" style="font-size:13px;" >Pessoa:</label>
                                    <select id="tipoPessoa" onChange="mostraCpfCnpj(this.value)" class="arrendondaInputSelect">
                                        <option value=""></option>
                                        <?php if ($this->_tpl_vars['pessoa']->getCpfPessoa() == null && $this->_tpl_vars['pessoa']->getCnpjPessoa() == null): ?>
                                        <option value="F">Física</option>
                                        <option value="J">Jurídica</option>
                                        <?php else: ?>
                                            <?php if ($this->_tpl_vars['pessoa']->getCpfPessoa() != null): ?>
                                            <option value="F" selected="selected" >Física</option>
                                            <option value="J">Jurídica</option>
                                            <?php else: ?>
                                                <?php if ($this->_tpl_vars['pessoa']->getCnpjPessoa() != null): ?>
                                            <option value="F">Física</option>
                                            <option value="J" selected="selected">Jurídica</option>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </select>
                                </div>
                                <div id="habilitaFisica" class="controls" style="margin-bottom:10px;<?php if ($this->_tpl_vars['pessoa']->getCpfPessoa() == null): ?>display:none;"<?php endif; ?>>
                                    <label for="cpfAutor" class="control-label" style="font-size:13px;">CPF:</label>
                                    <input type="text" name="cpfAutor" id="cpfAutor" class="input-medium arrendondaInputSelect" value="<?php echo $this->_tpl_vars['pessoa']->getCpfPessoa(); ?>
" />

                                    <label for="rgAutor" class="control-label" style="font-size:13px;">RG:</label>
                                    <input type="text" id="rgAutor" name="rgAutor"  class="input-medium arrendondaInputSelect" value="<?php if ($this->_tpl_vars['pessoa']->getRgPessoa() != null): ?><?php echo $this->_tpl_vars['pessoa']->getRgPessoa(); ?>
<?php endif; ?>" />
                                </div>
                                <div id="habilitaJuridica" class="controls" style="margin-bottom:10px;<?php if ($this->_tpl_vars['pessoa']->getCnpjPessoa() == null): ?>display:none;"<?php endif; ?>>
                                    <label for="cnpjAutor" class="control-label" style="font-size:13px;">CNPJ:</label>
                                    <input type="text" id="cnpjAutor" name="cnpjAutor"  class="input-medium arrendondaInputSelect" value="<?php echo $this->_tpl_vars['pessoa']->getCnpjPessoa(); ?>
"/>
                                </div>
                                
                                <div class="controls" style="margin-bottom:10px;">
                                    <label for="emailAutor" class="control-label" style="font-size:13px;">Email:</label>
                                    <input type="text" name="emailAutor" id="emailAutor" class="input-xlarge arrendondaInputSelect" value="<?php echo $this->_tpl_vars['pessoa']->getEmailPessoa(); ?>
"/>
                                </div>
                                
                                <div class="well" id="end" style="border:1px;color:#4D9DA8;border-style:solid;">
                                    <p>  
                                        <span class="label">Endereço</span>
                                    </p>

                                    <div class="controls" style="margin-bottom:10px;">                                 
                                        <input type="text" name="endereAutor" id="endereAutor" class="input-xlarge arrendondaInputSelect" style="width:450px;"/>
                                        
                                        <label for="numero" class="control-label" style="font-size:13px;">Nº</label>
                                        <input type="text" name="numero" id="numero" class="input-mini arrendondaInputSelect"/>

                                        <label for="complemento" class="control-label" style="font-size:13px;">Complemento:</label>
                                        <input type="text" name="complemento" id="complemento" class="input-mini arrendondaInputSelect"/>

                                        <label for="cep" class="control-label" style="font-size:13px;">Cep:</label>
                                        <input type="text" id="cep" name="cep" class="input-small arrendondaInputSelect" />
                                    </div>                  

                                    <div class="controls" style="margin-bottom:10px;">
                                        <label for="bairro" class="control-label" style="font-size:13px;">Bairro:</label>
                                        <input type="text" name="bairro" id="bairro" class="input-small arrendondaInputSelect"/>

                                        <label for="cidade" class="control-label" style="font-size:13px;">Cidade:</label>
                                        <input type="text" name="cidade" id="cidade" class="input-small arrendondaInputSelect"/>

                                        <label for="uf" class="control-label" style="font-size:13px;">UF:</label>
                                        <select name="uf" id="uf" class="arrendondaInputSelect">
                                            <option value=""></option>
                                            <?php $_from = $this->_tpl_vars['estados']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['estado']):
?>
                                            <option id="<?php echo $this->_tpl_vars['estado']->getCodEstado(); ?>
" value="<?php echo $this->_tpl_vars['estado']->getCodEstado(); ?>
"><?php echo $this->_tpl_vars['estado']->getNomeEstado(); ?>
</option>
                                            <?php endforeach; endif; unset($_from); ?>                 
                                        </select>
                                    </div>
                                    <div class="controls" style="margin-bottom:10px;">
                                        <label for="efetEnd" class="control-label" style="font-size:13px;">Válido</label>
                                        <input type="checkbox" id="efetivoEnd" name="efetivoEnd">
                                       
                                        <label for="obs" class="control-label" style="font-size:13px;">Observação:</label>
                                        <textarea rows="3" id="obsEnd" name="obsEnd" class="input-xlarge"></textarea>
                                        
                                        <input type="hidden" name="nomeLiEnd" id="nomeLiEnd" value=""/>
                                        <p>
                                            <input type="button" value="Adicionar Endereço" class="btn btn-small" onClick="adicionaEndereco();">
                                        </p>
                                    </div>
                                    <div id="enderecos"  <?php if ($this->_tpl_vars['totalEndereco'] < 1): ?> style="display:none;" <?php endif; ?>>

                                        <table id="tabelaEndereco" class="table table-striped table-bordered table-condensed">
                                            <tr>
                                                <td>Logradouro</td>
                                                <td>Nº</td>
                                                <td>Complemento</td>
                                                <td>Bairro</td>
                                                <td>Cep</td>
                                                <td>Cidade</td>
                                                <td>Estado</td>
                                                <td>Efetivo</td>
                                                <td>Obs</td>
                                                <td>Ações</td>
                                            </tr>
                                            <?php if ($this->_tpl_vars['totalEndereco'] >= 1): ?>
                                                <?php $_from = $this->_tpl_vars['endereco']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['end']):
?>
                                                <tr id="endereco_<?php echo $this->_tpl_vars['end']->getIdEndereco(); ?>
">
                                                    <td><?php echo $this->_tpl_vars['end']->getDescricaoEndereco(); ?>
</td>
                                                    <td><?php echo $this->_tpl_vars['end']->getNumeroEndereco(); ?>
</td>
                                                    <td><?php echo $this->_tpl_vars['end']->getComplementoEndereco(); ?>
</td>
                                                    <td><?php echo $this->_tpl_vars['end']->getBairroEndereco(); ?>
</td>
                                                    <td><?php echo $this->_tpl_vars['end']->getCepEndereco(); ?>
</td>
                                                    <td><?php echo $this->_tpl_vars['end']->getCidadeEndereco(); ?>
</td>
                                                    <td><?php echo $this->_tpl_vars['end']->getUfEndereco(); ?>
</td>
                                                    <td><?php echo $this->_tpl_vars['end']->getFlag(); ?>
</td>
                                                    <td><?php echo $this->_tpl_vars['end']->getObsEndereco(); ?>
</td>
                                                    <td>
                                                        <a href="#" id="<?php echo $this->_tpl_vars['end']->getIdEndereco(); ?>
" onclick="editarEndereco(this);">
                                                            <i class="icon-edit"></i>
                                                        </a>
                                                        <a href='#' id="<?php echo $this->_tpl_vars['end']->getIdEndereco(); ?>
" onclick='excluirEndereco(this);'>
                                                                <i class='icon-trash'></i>
                                                        </a>
                                                    </td>
                                                    <input type='hidden' name='endeAutor[]' id='endeAutor' value='<?php echo $this->_tpl_vars['end']->getDescricaoEndereco(); ?>
' />
                                                    <input type='hidden' name='complementoAutor[]' id='complementoAutor' value='<?php echo $this->_tpl_vars['end']->getComplementoEndereco(); ?>
' />
                                                    <input type='hidden' name='numeroAutor[]' id='numeroAutor' value='<?php echo $this->_tpl_vars['end']->getNumeroEndereco(); ?>
' />
                                                    <input type='hidden' name='cepAutor[]' id='cepAutor' value='<?php echo $this->_tpl_vars['end']->getCepEndereco(); ?>
' />
                                                    <input type='hidden' name='bairroAutor[]' id='bairroAutor' value='<?php echo $this->_tpl_vars['end']->getBairroEndereco(); ?>
' />
                                                    <input type='hidden' name='cidadeAutor[]' id='cidadeAutor' value='<?php echo $this->_tpl_vars['end']->getCidadeEndereco(); ?>
' />
                                                    <input type='hidden' name='ufAutor[]' id='ufAutor' value='<?php echo $this->_tpl_vars['end']->getIdUfEndereco(); ?>
' />
                                                    <input type='hidden' name='efeEnd[]' id='efeEnd' value='<?php echo $this->_tpl_vars['end']->getFlag(); ?>
' />
                                                    <input type='hidden' name='obsEnd[]' id='obsEnd' value='<?php echo $this->_tpl_vars['end']->getObsEndereco(); ?>
' />
                                                    <input type='hidden' name='idEnd[]' id='idEnd' value='<?php echo $this->_tpl_vars['end']->getIdEndereco(); ?>
' />
                                                </tr>
                                                <?php endforeach; endif; unset($_from); ?>
                                                
                                            <?php endif; ?>
                                            <input type='hidden' name='totalEndereco' id='totalEndereco' value='<?php echo $this->_tpl_vars['totalEndereco']; ?>
' />
                                        </table>

                                    </div>
                                </div>
                                
                                <div class="well" id="fone" style="border:1px;color:#4D9DA8;border-style:solid;">
                                    <p>   
                                        <span class="label">Telefone</span>
                                    </p>
                                    
                                    <div class="controls" style="margin-bottom:10px;">
                                        <input type="text" name="telefoneAutor[]" id="telefoneAutor" class="input-medium arrendondaInputSelect" value=""/>

                                        <label for="tipoTelefone" class="control-label" style="font-size:13px;">Tipo Telefone:</label>
                                        <select name="tipoTelefone[]" id="tipoTelefone" class="arrendondaInputSelect">
                                            <option value="">--Selecione--</option>
                                            <option id="tel_1" value="1">Fixo</option>
                                            <option id="tel_2" value="2">Celular</option>
                                            
                                        </select>
                                    </div>
                                    <div class="controls" style="margin-bottom:10px;">
                                        <label for="efetivoTel" class="control-label" style="font-size:13px;">Válido:</label>
                                         <input type="checkbox" id="efetivoTel" name="efetivoTel">
                                       
                                        <label for="obs" class="control-label" style="font-size:13px;">Observação:</label>
                                        <textarea rows="3" id="obsTel" name="obsTel" class="input-xlarge"></textarea>
                                        
                                        <input type="hidden" name="nomeLiTel" id="nomeLiTel" value=""/>
                                        
                                        <p>
                                            <input type="button" value="Adicionar Telefone" class="btn btn-small" onClick="adicionaTelefone()">
                                        </p>
                                    </div>
                                    <div id="telefones" <?php if ($this->_tpl_vars['totalTelefone'] < 1): ?> style="display:none;" <?php endif; ?>>

                                        <table id="tabelaTelefone" class="table table-striped table-bordered table-condensed">
                                            <tr>
                                                <td>Telefone</td>
                                                <td>Tipo Telefone</td>
                                                <td>Efetivo</td>
                                                <td>Obs</td>
                                                <td>Excluir</td>
                                            </tr>
                                            <?php if ($this->_tpl_vars['totalTelefone'] >= 1): ?>
                                                <?php $_from = $this->_tpl_vars['telefone']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['fone']):
?>
                                                <tr id="telefone_<?php echo $this->_tpl_vars['fone']->getIdTelefone(); ?>
">
                                                    <td><?php echo $this->_tpl_vars['fone']->getTelTelefone(); ?>
</td>
                                                    <td><?php echo $this->_tpl_vars['fone']->getTipoNomeTelefone(); ?>
</td>                                                  
                                                    <td><?php echo $this->_tpl_vars['fone']->getFlagTel(); ?>
</td>
                                                    <td><?php echo $this->_tpl_vars['fone']->getObsTelefone(); ?>
</td>
                                                    <td>
                                                        <a href="#" id="<?php echo $this->_tpl_vars['fone']->getIdTelefone(); ?>
" onclick="editarTelefone(this);">
                                                            <i class="icon-edit"></i>
                                                        </a>
                                                        <a href='#' id="<?php echo $this->_tpl_vars['fone']->getIdTelefone(); ?>
" onclick='excluirTelefone(this);'>
                                                            <i class='icon-trash'></i>
                                                        </a>
                                                    </td>
                                                    <input type='hidden' name='telAutor[]' id='telAutor' value='<?php echo $this->_tpl_vars['fone']->getTelTelefone(); ?>
' />
                                                    <input type='hidden' name='tipoTelAutor[]' id='tipoTelAutor' value='<?php echo $this->_tpl_vars['fone']->getTipoTelefone(); ?>
' />
                                                    <input type='hidden' name='efetivoTel[]' id='efetivoTel' value='<?php echo $this->_tpl_vars['fone']->getFlagTel(); ?>
' />
                                                    <input type='hidden' name='obsTel[]' id='obsTel' value='<?php echo $this->_tpl_vars['fone']->getObsTelefone(); ?>
' />
                                                    <input type='hidden' name='idTel[]' id='idTel' value='<?php echo $this->_tpl_vars['fone']->getIdTelefone(); ?>
' />
                                                </tr>
                                                <?php endforeach; endif; unset($_from); ?>
                                                 
                                            <?php endif; ?>
                                            <input type='hidden' name='totalTelefone' id='totalTelefone' value='<?php echo $this->_tpl_vars['totalTelefone']; ?>
' />
                                        </table>

                                    </div>
                                </div>
                                <div>
                                    <button class="btn btn-primary" type="submit" onKeyPress="return submitenter(this,event)" ><?php echo $this->_tpl_vars['nomeBotao']; ?>
</button>
                                </div>
                            </div>
                    </form>
                    <button class="btn" onclick="return abreListagem('<?php echo $this->_tpl_vars['tipoPessoa']; ?>
');">Voltar para Listagem</button>
                </fieldset>
            </div>
                </div>
       </div>
    </body>
</html>