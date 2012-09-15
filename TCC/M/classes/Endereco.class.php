<?
class Endereco{

	private $tpa_id, $tpa_tipo;
	
	public function getEnd_ID(){
		return $this->end_id;
	}
	
	public function getEnd_Rua(){
		return $this->end_rua;

	}
	
	public function getEnd_Num(){
		return $this->end_num;

	}
	
	public function getEnd_Complemento(){
		return $this->end_complemento;

	}
	
	public function getEnd_Bairro(){
		return $this->end_bairro;

	}
	
	public function getEnd_Cep(){
		return $this->end_cep;

	}

	public function getCid_ID(){
		return $this->cid_id;

	}
	
	public function setEnd_ID($end_id){
		$this->end_id = $end_id;
	}
	
	public function setEnd_Rua($end_rua){
		$this->end_rua = $end_rua;
	}
	
	public function setEnd_Num($end_num){
		$this->end_num = $end_num;
	}
	
	public function setEnd_Complemento($end_complemento){
		$this->end_complemento = $end_complemento;
	}
	
	public function setEnd_Bairro($end_bairro){
		$this->end_bairro = $end_bairro;
	}
	
	public function setEnd_Cep($end_cep){
		$this->end_cep = $end_cep;
	}
	
	public function setCid_ID($cid_id){
		$this->cid_id = $cid_id;
	}
}
?>