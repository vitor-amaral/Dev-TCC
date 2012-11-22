<?php

class Pedido {
    private $ped_id, $ped_data, $cli_id, $cli_nome, $pro_nome, $pro_qtde, $ped_coment, $pro_id;
    
    public function getPro_ID(){
        return $this->pro_id;
    }
    
    public function getPed_ID(){
        return $this->ped_id;
    }

    public function getPed_Data() {
        return $this->ped_data;
    }
    
    public function getCli_ID() {
        return $this->cli_id;
    }
    
    public function getCli_Nome() {
        return $this->cli_nome;
    }
    
    public function getPro_Nome() {
        return $this->pro_nome;
    }
    
    public function getPro_Qtde() {
        return $this->pro_qtde;
    }
    
    public function getPed_Coment() {
        return $this->ped_coment;
    }
    
    public function setPro_ID($pro_id) {
        $this->pro_id = $pro_id;
    }
    
    public function setPed_ID($ped_id) {
        $this->ped_id = $ped_id;
    }
          
    public function setPed_Data($ped_data) {
        $this->ped_data	= $ped_data;
    }
    
    public function setCli_ID($cli_id) {
        $this->cli_id = $cli_id;
    }
    
    public function setCli_Nome($cli_nome) {
        $this->cli_nome = $cli_nome;
    }
    
    public function setPro_Nome($pro_nome) {
        $this->pro_nome = $pro_nome;
    }
    
    public function setPro_Qtde($pro_qtde) {
        $this->pro_qtde = $pro_qtde;
    }
    
    public function setPed_Coment($ped_coment) {
        $this->ped_coment = $ped_coment;
    }

}

?>
