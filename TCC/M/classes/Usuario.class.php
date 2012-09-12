<?php

class Usuario {
    private $usu_id, $usu_login, $usu_senha, $tpa_id, $tpa_tipo, $func_id, $func_nome;
    
    public function getUsuario_ID(){
        return $this->usu_id;
    }

    public function getUsuario_Login() {
        return $this->usu_login;
    }
    
    public function getUsuario_Senha() {
        return $this->usu_senha;
    }

    public function getTipoAcesso_ID() {
        return $this->tpa_id;
    }
    
    public function getTipoAcesso_Tipo() {
        return $this->tpa_tipo;
    }
        
    public function getFuncionario_ID() {
        return $this->func_id;
    }

    public function getFuncionario_Nome() {
        return $this->func_nome;
    }       
        
    public function setUsuario_ID($usu_id) {
        $this->usu_id = $usu_id;
    }
          
    public function setUsuario_Login($usu_login) {
        $this->usu_login = $usu_login;
    }
    
    public function setUsuario_Senha($usu_senha) {
        $this->usu_senha = $usu_senha;
    }

    public function setTipoAcesso_ID($tpa_id) {
        $this->tpa_id = $tpa_id;
    }

    public function setTipoAcesso_Tipo($tpa_tipo) {
        $this->tpa_tipo = $tpa_tipo;
    }    
    
    public function setFuncionario_ID($func_id) {
        $this->func_id = $func_id;
    }

    public function setFuncionario_Nome($func_nome) {
        $this->func_nome = $func_nome;
    }    
    
}

?>
