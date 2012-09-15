<?php

class Evento {
    private $ev_id, $ev_nome, $ev_tema, $ev_descricao, $ev_data;
    
    public function getEv_ID(){
        return $this->ev_id;
    }

    public function getEv_Nome() {
        return $this->ev_nome;
    }
    
    public function getEv_Tema() {
        return $this->ev_tema;
    }

    public function getEv_Descricao() {
        return $this->ev_descricao;
    }
	
	public function getEv_Data() {
        return $this->ev_data;
    }
    
    public function setEv_ID($ev_id) {
        $this->ev_id = $ev_id;
    }
          
    public function setEv_Nome($ev_nome) {
        $this->ev_nome = $ev_nome;
    }
    
    public function setEv_Tema($ev_tema) {
        $this->ev_tema = $ev_tema;
    }

    public function setEv_Descricao($ev_descricao) {
        $this->ev_descricao = $ev_descricao;
    }
	
	public function setEv_Data($ev_data) {
        $this->ev_data = $ev_data;
    }   
}

?>
