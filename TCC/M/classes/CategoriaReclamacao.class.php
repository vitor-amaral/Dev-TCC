<?php

class CategoriaReclamacao {
    private $catReclamacao_id, $catReclamacao_desc;
    
    public function getCatReclamacao_ID() {
        return $this->catReclamacao_id;
    }

    public function getCatReclamacao_Desc() {
        return $this->catReclamacao_desc;
    }
    
   
    
    public function setCatReclamacao_ID($catReclamacao_id) {
        $this->catReclamacao_id = $catReclamacao_id;
    }
          
    public function setCatReclamacao_Desc($catReclamacao_desc) {
        $this->catReclamacao_desc = $catReclamacao_desc;
    }
    
}

?>
