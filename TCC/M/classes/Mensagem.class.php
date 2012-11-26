<?php

class Mensagem {
    private $mens_id, $mens_titulo, $mens_texto, $usu_id, $mens_email;
    
    public function getMens_Email(){
        return $this->mens_email;
    }
    
    public function getMens_ID(){
        return $this->mens_id;
    }

    public function getMens_Titulo() {
        return $this->mens_titulo;
    }
    
    public function getMens_Texto() {
        return $this->mens_texto;
    }

    public function getUsu_ID() {
        return $this->usu_id;
    }
    
    public function setMens_Email($mens_email) {
        $this->mens_email = $mens_email;
    }
    
    public function setMens_ID($mens_id) {
        $this->mens_id = $mens_id;
    }
          
    public function setMens_Titulo($mens_titulo) {
        $this->mens_titulo = $mens_titulo;
    }
    
    public function setMens_Texto($mens_texto) {
        $this->mens_texto = $mens_texto;
    }

    public function setUsu_ID($usu_id) {
        $this->usu_id = $usu_id;
    }
    
}

?>
