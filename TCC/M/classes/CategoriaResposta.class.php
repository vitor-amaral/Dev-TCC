<?php

class CategoriaResposta {
    private $catresp_id, $catresp_descricao, $catresp_referencia, $catresp_tabReferencia;
    
    public function getCatResp_ID() { return $this->catresp_id; }

    public function getCatResp_Descricao() { return $this->catresp_descricao; }
    
    public function getCatResp_Referencia() { return $this->catresp_referencia; }  
     
    public function getCatResp_TabReferencia() { return $this->catresp_tabreferencia; }      
    
    
    public function setCatResp_ID($catresp_id) { $this->catresp_id = $catresp_id; }
    
    public function setCatResp_Descricao($catresp_descricao) { $this->catresp_descricao = $catresp_descricao; }
    
    public function setCatResp_Referencia($catresp_referencia) { $this->catresp_referencia = $catresp_referencia; }  
     
    public function setCatResp_TabReferencia($catresp_tabreferencia) { $this->catresp_tabreferencia = $catresp_tabreferencia; }
  
}

?>
