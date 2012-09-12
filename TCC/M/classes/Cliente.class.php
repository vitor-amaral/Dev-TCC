<?php

class Cliente {
    private $cli_id, $cli_nome, $cli_referencia, $cli_dtNasc, $cli_telefone, $cli_email, $end_id;
	private $usu_id, $cli_estCivil, $cli_apelido, $cli_id_indicador;
    
    public function getCliente_ID() {
        return $this->cli_id;
    }

    public function getCliente_Nome() {
        return $this->cli_nome;
    }
    
    public function getCli_referencia() {
        return $this->cli_referencia;
    }
	
	public function getCli_dtNasc() {
        return $this->cli_dtNasc;
    }
	
	public function getCli_telefone() {
        return $this->cli_telefone;
    }
	
	public function getCli_email() {
        return $this->cli_email;
    }
	
	public function getEnd_id() {
        return $this->end_id;
    }
	
	public function getUsu_id() {
        return $this->usu_id;
    }
	
	public function getCli_estCivil() {
        return $this->cli_estCivil;
    }
	
	public function getCli_apelido() {
        return $this->cli_apelido;
    }
	
	public function getCli_id_indicador() {
        return $this->cli_id_indicador;
    }
    
	public function setCliente_ID($cli_id) {
        $this->cli_id = $cli_id;
    }

    public function setCliente_Nome($cli_nome) {
        $this->cli_nome = $cli_nome;
    }
    
    public function setCli_referencia($cli_referencia) {
        $this->cli_referencia = $cli_referencia;
    }
	
	public function setCli_dtNasc($cli_dtNasc) {
        $this->cli_dtNasc = $cli_dtNasc;
    }
	
	public function setCli_telefone($cli_telefone) {
        $this->cli_telefone = $cli_telefone;
    }
	
	public function setCli_email($cli_email) {
        $this->cli_email = $cli_email;
    }
	
	public function setEnd_id($end_id) {
        $this->end_id = $end_id;
    }
	
	public function setUsu_id($usu_id) {
        $this->usu_id = $usu_id;
    }
	
	public function setCli_estCivil($cli_estCivil) {
        $this->cli_estCivil = $cli_estCivil;
    }
	
	public function setCli_apelido($cli_apelido) {
        this->cli_apelido = $cli_apelido;
    }
	
	public function setCli_id_indicador($cli_id_indicador) {
        $this->cli_id_indicador = $cli_id_indicador;
    }
	   
}

?>
