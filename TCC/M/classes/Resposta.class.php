<?php

class Resposta {
    private $resp_id, $resp_valor, $catresp_id;
    
    public function getResp_ID() { return $this->resp_id; }

    public function getResp_Valor() { return $this->resp_valor; }
    
    public function getCatResp_ID() { return $this->catresp_id; }      
    
    
    public function setResp_ID($resp_id) { $this->resp_id = $resp_id; }
    
    public function setResp_Valor($resp_valor) { $this->resp_valor = $resp_valor; }
    
    public function setCatResp_ID($catresp_id) { $this->catresp_id = $catresp_id; }  
  
}

?>
