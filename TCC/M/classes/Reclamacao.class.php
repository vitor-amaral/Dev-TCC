<?php

class Reclamacao {
    private $rec_id, $rec_descricao,$rec_titulo,$rec_status,$cat_id,$cli_id,$cli_nome,$cat_descricao,$rec_status_desc;
    
    public function getReclamacao_status_desc() {
        return $this->rec_status_desc;
    }
    
    public function getCliente_nome() {
        return $this->cli_nome;
    }
    
    public function getCategoria_desc() {
        return $this->cat_descricao;
    }
    
    public function getReclamacao_id() {
        return $this->rec_id;
    }

    public function getReclamacao_desc() {
        return $this->rec_descricao;
    }
    
    public function getReclamacao_titulo() {
        return $this->rec_titulo;
    }
    
    public function getReclamacao_status() {
        return $this->rec_status;
    }
    
    public function getCategoria_id() {
        return $this->cat_id;
    }
    
    public function getCliente_id() {
        return $this->cli_id;
    }
    
    public function setReclamacao_id($rec_id) {
        $this->rec_id = $rec_id;
    }
          
    public function setReclamacao_desc($rec_descricao) {
        $this->rec_descricao = $rec_descricao;
    }
    
    public function setReclamacao_titulo($rec_titulo) {
        $this->rec_titulo = $rec_titulo;
    }
    
    public function setReclamacao_status($rec_status) {
        $this->rec_status = $rec_status;
        
        switch ($rec_status) {
            case 1:
                $this->rec_status_desc = "Positiva";
                break;
            case 2:
                $this->rec_status_desc = "Negativa";
                break;
        }
    }
    
    public function setCategoria_id($cat_id) {
        $this->cat_id = $cat_id;
    }
    
    public function setCliente_id($cli_id) {
        $this->cli_id = $cli_id;
    }
    
    public function setCliente_nome($cli_nome) {
        $this->cli_nome = $cli_nome;
    }
    
    public function setCategoria_desc($cat_descricao) {
        $this->cat_descricao = $cat_descricao;
    }
    
    public function setReclamacao_status_desc($rec_status_desc) {
        $this->rec_status_desc = $rec_status_desc;
    }
    
}

?>
