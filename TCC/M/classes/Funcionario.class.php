<?php

class Funcionario {
    private $func_id, $func_nome, $func_matricula, $car_id, $car_descricao;
    
    public function getFuncionario_ID(){
        return $this->func_id;
    }

    public function getFuncionario_Nome() {
        return $this->func_nome;
    }
    
    public function getFuncionario_Matricula() {
        return $this->func_matricula;
    }

    public function getCargo_ID() {
        return $this->car_id;
    }
    
    public function getCargo_Descricao() {
        return $this->car_descricao;
    }
        
    public function setFuncionario_ID($func_id) {
        $this->func_id = $func_id;
    }
          
    public function setFuncionario_Nome($func_nome) {
        $this->func_nome = $func_nome;
    }
    
    public function setFuncionario_Matricula($func_matricula) {
        $this->func_matricula = $func_matricula;
    }

    public function setCargo_ID($car_id) {
        $this->car_id = $car_id;
    }
    
    public function setCargo_Descricao($car_descricao) {
        $this->car_descricao = $car_descricao;
    }
    
}

?>
