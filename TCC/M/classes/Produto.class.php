<?php

class Produto {
    private $pro_id, $pro_nome, $pro_preco, $pro_tipo, $pro_tipo_desc;
    
    public function getPro_Tipo_Desc(){
        return $this->pro_tipo_desc;
    }
    
    public function getPro_ID(){
        return $this->pro_id;
    }

    public function getPro_Nome() {
        return $this->pro_nome;
    }
    
    public function getPro_Preco() {
        return $this->pro_preco;
    }

    public function getPro_Tipo() {
        return $this->pro_tipo;
    }
    
    
    public function setPro_Tipo_Desc($pro_tipo_desc) {
        $this->pro_tipo_desc = $pro_tipo_desc;
    }
    
    public function setPro_ID($pro_id) {
        $this->pro_id = $pro_id;
    }
          
    public function setPro_Nome($pro_nome) {
        $this->pro_nome = $pro_nome;
    }
    
    public function setPro_Preco($pro_preco) {
        $this->pro_preco = $pro_preco;
    }

    public function setPro_Tipo($pro_tipo) {
        $this->pro_tipo = $pro_tipo;
        
        switch ($pro_tipo) {
            case 1:
                $this->pro_tipo_desc = "Alimento";
                break;
            case 2:
                $this->pro_tipo_desc = "Bebida";
                break;
            case 3:
                $this->pro_tipo_desc = "Outros";
                break;    
        }
    }
    
}

?>
