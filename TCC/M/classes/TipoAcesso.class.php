<?php

class TipoAcesso {
    private $tpa_id, $tpa_tipo;
    
    public function getTipoAcesso_ID() {
        return $this->tpa_id;
    }

    public function getTipoAcesso_Tipo() {
        return $this->tpa_tipo;
    }
    
    public function setTipoAcesso_ID($tpa_id) {
        $this->tpa_id = $tpa_id;
    }
          
    public function setTipoAcesso_Tipo($tpa_tipo) {
        $this->tpa_tipo = $tpa_tipo;
    }
  
}

?>
