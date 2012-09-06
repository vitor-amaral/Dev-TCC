<?php

class Cidade {
    private $cid_id, $cid_nome, $uf_sigla;
    
    public function getCidade_ID() {
        return $this->cid_id;
    }

    public function getCidade_Nome() {
        return $this->cid_nome;
    }
    
    public function getUf_Sigla() {
        return $this->uf_sigla;
    }
    
    public function setCidade_ID($cid_id) {
        $this->cid_id = $cid_id;
    }
          
    public function setCidade_Nome($cid_nome) {
        $this->cid_nome = $cid_nome;
    }
    
    public function setUf_Sigla($uf_sigla) {
        $this->uf_sigla = $uf_sigla;
    }
    
}

?>
