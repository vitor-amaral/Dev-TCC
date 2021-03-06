<?php

class Cliente {
    private $cli_id, $cli_nome, $cli_referencia, $cli_dtNasc, $cli_email, $usu_id, $usu_login, $cli_estCivil='null', $cli_estCivilDesc, $cli_apelido, $cli_id_indicador='null', $cli_indicador;
    private $enderecos = array();
    private $telefones = array();
        
    public function getCli_ID() { return $this->cli_id; }

    public function getCli_Nome() { return $this->cli_nome; }
    
    public function getCli_referencia() { return $this->cli_referencia; }
    
    public function getCli_dtNasc() { return $this->cli_dtNasc; }
    
    public function getCli_email() { return $this->cli_email; }
    
    public function getUsu_id() { return $this->usu_id; }
    
    public function getUsu_login() { return $this->usu_login; }
        
    public function getCli_estCivil() { return $this->cli_estCivil; }
    
    public function getCli_estCivilDesc() { return $this->cli_estCivilDesc; }
    
    public function getCli_apelido() { return $this->cli_apelido; }
    
    public function getCli_id_indicador() { return $this->cli_id_indicador; }
    
    public function getCli_indicador() { return $this->cli_indicador; } 

    public function getEnderecos() { return $this->enderecos; }
    
    public function getTelefones() {  return $this->telefones; }  
         
    
    public function setCli_ID($cli_id) { $this->cli_id = $cli_id; }

    public function setCli_Nome($cli_nome) { $this->cli_nome = $cli_nome; }
    
    public function setCli_referencia($cli_referencia) { $this->cli_referencia = $cli_referencia; }
    
    public function setCli_dtNasc($cli_dtNasc) { $this->cli_dtNasc = $cli_dtNasc; }
    
    public function setCli_email($cli_email) { $this->cli_email = $cli_email; }
    
    public function setUsu_id($usu_id) { $this->usu_id = $usu_id; }
    
    public function setUsu_login($usu_login) { $this->usu_login = $usu_login; }
    
    public function setCli_estCivil($cli_estCivil) {
        $this->cli_estCivil = $cli_estCivil;
        
        switch ($cli_estCivil) {
            case 1:
                $this->cli_estCivilDesc = "Solteiro";
                break;
            case 2:
                $this->cli_estCivilDesc = "Casado/Uni�o Est�vel";
                break;   
            case 3:
                $this->cli_estCivilDesc = "Divorciado";
                break;
            case 4:
                $this->cli_estCivilDesc = "Namorando";
                break;
            case 5:
                $this->cli_estCivilDesc = "Vi�vo";
                break;                                                             
        }         
    }
    
    public function setCli_apelido($cli_apelido) { $this->cli_apelido = $cli_apelido; }
    
    public function setCli_id_indicador($cli_id_indicador) { $this->cli_id_indicador = $cli_id_indicador; }
    
    public function setCli_indicador($cli_indicador) { $this->cli_indicador = $cli_indicador; }
    
    public function setEnderecos($enderecos) { $this->enderecos = $enderecos;  }
    
    public function setTelefones($telefones) { $this->telefones = $telefones;  }    
       
}

?>
