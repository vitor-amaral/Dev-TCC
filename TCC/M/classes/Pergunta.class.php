<?php

class Pergunta {
    private $perg_id, $perg_descricao, $catresp_id;
    
    public function getPerg_ID() { return $this->perg_id; }

    public function getPerg_Descricao() { return $this->perg_descricao; }
    
    public function getCatResp_ID() { return $this->catresp_id; }      
    
    
    public function setPerg_ID($perg_id) { $this->perg_id = $perg_id; }
    
    public function setPerg_Descricao($perg_descricao) { $this->perg_descricao = $perg_descricao; }
    
    public function setCatResp_ID($catresp_id) { $this->catresp_id = $catresp_id; }  
  
}

?>
