<?php

class ProdutoPedido {
    private $pro_id, $ped_id, $proped_qtde, $proped_comentario;
    
    public function getPro_ID(){
        return $this->pro_id;
    }

    public function getPed_ID() {
        return $this->ped_id;
    }
    
    public function getProped_Qtde() {
        return $this->proped_qtde;
    }

    public function getProped_Comentario() {
        return $this->proped_cometario;
    }
    
    public function setPro_ID($pro_id) {
        $this->pro_id = $pro_id;
    }
          
    public function setPed_ID($ped_id) {
        $this->ped_id = $ped_id;
    }
    
    public function setProped_Qtde($proped_qtde) {
        $this->proped_qtde = $proped_qtde;
    }

    public function setProped_Comentario($proped_comentario) {
        $this->proped_comentario = $proped_comentario;
    }
    
}

?>
