<?php

class PreferenciaCliente {
    private $cli_id, $perg_id, $perg_descricao, $catresp_id, $resp_id, $resp_valor, $pref_opcao, $pref_comentario;
    
    public function getCli_ID() { return $this->cli_id; }
    
    public function getPerg_ID() { return $this->perg_id; }
    public function getPerg_Descricao() { return $this->perg_descricao; }   
    
    public function getCatResp_ID() { return $this->catresp_id; }     
    
    public function getResp_ID() { return $this->resp_id; }
    public function getResp_Valor() { return $this->resp_valor; }  

    public function getPref_Opcao() { return $this->pref_opcao; }
    
    public function getPref_Comentario() { return $this->pref_comentario; }      
    
    
    public function setCli_ID($cli_id) { $this->cli_id = $cli_id; }
    
    public function setPerg_ID($perg_id) { $this->perg_id = $perg_id; } 
    public function setPerg_Descricao($perg_descricao) { $this->perg_descricao = $perg_descricao; }
    
    public function setCatResp_ID($catresp_id) { $this->catresp_id = $catresp_id; }
    
    public function setResp_ID($resp_id) { $this->resp_id = $resp_id; }
    public function setResp_Valor($resp_valor) { $this->resp_valor = $resp_valor; }

    public function setPref_Opcao($pref_opcao) { $this->pref_opcao = $pref_opcao; }
    
    public function setPref_Comentario($pref_comentario) { $this->pref_comentario = $pref_comentario; }  
  
}

?>
