<?php

class PreferenciaClienteRef {
    private $cli_id, $perg_id, $perg_descricao, $catresp_id, $catresp_tabReferencia, $pref_resp, $pref_opcao, $pref_comentario, $resp_valor;
    
    public function getCli_ID() { return $this->cli_id; }
    
    public function getPerg_ID() { return $this->perg_id; }
    public function getPerg_Descricao() { return $this->perg_descricao; }   
    
    public function getCatResp_ID() { return $this->catresp_id; }  
    public function getCatresp_tabReferencia() { return $this->catresp_tabReferencia; }   
    
    public function getPref_Resp() { return $this->pref_resp; }
    public function getResp_Valor() { return $this->resp_valor; }

    public function getPref_Opcao() { return $this->pref_opcao; }    
    public function getPref_Comentario() { return $this->pref_comentario; }      
    
    
    public function setCli_ID($cli_id) { $this->cli_id = $cli_id; }
    
    public function setPerg_ID($perg_id) { $this->perg_id = $perg_id; } 
    public function setPerg_Descricao($perg_descricao) { $this->perg_descricao = $perg_descricao; }
    
    public function setCatResp_ID($catresp_id) { $this->catresp_id = $catresp_id; }
    public function setCatresp_tabReferencia($catresp_tabReferencia) { $this->catresp_tabReferencia = $catresp_tabReferencia; }
    
    public function setPref_Resp($pref_resp) { $this->pref_resp = $pref_resp; }
    public function setResp_Valor($resp_valor) { $this->resp_valor = $resp_valor; } 


    public function setPref_Opcao($pref_opcao) { $this->pref_opcao = $pref_opcao; }    
    public function setPref_Comentario($pref_comentario) { $this->pref_comentario = $pref_comentario; }  
  
}

?>
