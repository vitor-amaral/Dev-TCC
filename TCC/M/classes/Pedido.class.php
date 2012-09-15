<?php

class Pedido {
    private $ped_id, $ped_data, $cli_id;
    
    public function getPed_ID(){
        return $this->ped_id;
    }

    public function getPed_Data() {
        return $this->ped_data;
    }
    
    public function getCli_ID() {
        return $this->cli_id;
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

}

?>
