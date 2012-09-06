<?php

class Cargo {
    private $car_id, $car_descricao;
    
    public function getCargo_ID() {
        return $this->car_id;
    }

    public function getCargo_Descricao() {
        return $this->car_descricao;
    }
    
    public function setCargo_ID($car_id) {
        $this->car_id = $car_id;
    }
          
    public function setCargo_Descricao($car_descricao) {
        $this->car_descricao = $car_descricao;
    }
  
}

?>
