<?php
class Telefone{

	private $tel_id, $tel_telefone, $tel_tipo, $tel_tipoDesc, $tel_observacao, $cli_id;
	
    
	public function getTel_ID(){ return $this->tel_id; }
	
	public function getTel_Telefone(){ return $this->tel_telefone; }
	
	public function getTel_Tipo(){ return $this->tel_tipo; }
    
    public function getTel_TipoDesc(){ return $this->tel_tipoDesc; } 
	
	public function getTel_Observacao(){ return $this->tel_observacao; }

    public function getCli_ID(){ return $this->cli_id; }
   
        
	public function setTel_ID($tel_id){ $this->tel_id = $tel_id; }
	
	public function setTel_Telefone($tel_telefone){ $this->tel_telefone = $tel_telefone; }
	
	public function setTel_Tipo($tel_tipo)
    { 
        $this->tel_tipo = $tel_tipo; 
        
        switch ($tel_tipo) {
            case 1:
                $this->tel_tipoDesc = "Fixo";
                break;
            case 2:
                $this->tel_tipoDesc = "Celular";
                break;                                     
        }
    }
	
	public function setTel_Observacao($tel_observacao){ $this->tel_observacao = $tel_observacao; }
	   
    public function setCli_ID($cli_id){ $this->cli_id = $cli_id; } 
}
?>