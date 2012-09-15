<?php

class Ambiente {
    private $amb_id, $amb_descricao, $amb_nome;
    
    public function getAmb_ID(){
        return $this->amb_id;
    }

    public function getAmb_Descricao() {
        return $this->amb_descricao;
    }
    
    public function getAmb_Nome() {
        return $this->amb_nome;
    }

    public function setAmb_ID($amb_id) {
        $this->amb_id = $amb_id;
    }
          
    public function setAmb_Descricao($amb_descricao) {
        $this->amb_descricao = $amb_descricao;
    }
    
    public function setAmb_Nome($amb_nome) {
        $this->amb_nome = $amb_nome;
    }

}

?>
