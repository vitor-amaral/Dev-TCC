<?php

class EnderecoDAO {
    private $conexao;
    
    function __construct($conexao) {
        $this->conexao = $conexao;
    }
    
    function inserir($endereco){
        
        $sql="
           INSERT INTO endereco(
               end_id
               ,end_rua
               ,end_num
			   ,end_complemento
			   ,end_bairro
			   ,end_cep
			   ,cid_id
           ) 
           VALUES(
               ".$endereco->getEnd_ID()."
               , '".$endereco->getEnd_Rua()."'
               , ".$endereco->getEnd_Num()."
			   , '".$endereco->getEnd_Complemento()."'
			   , '".$endereco->getEnd_Bairro()."'
			   , ".$endereco->getEnd_Cep()."
			   , ".$endereco->getCid_ID()."
           )";
      
        $query = mysql_query($sql,$this->conexao);
       
        return $query;
    }
    
    
    function alterar($endereco){
        
        $sql="
           UPDATE endereco SET
               end_rua 			 = '".$endereco->getEnd_Rua()."'
               , end_num  		 = ".$endereco->getEnd_Num()."
               , end_complemento = '".$endereco->getEnd_Complemento()."'
			   , end_bairro 	 = '".$endereco->getEnd_Bairro()."'
			   , end_cep  		 = ".$endereco->getEnd_Cep()."
			   , cid_id  		 = ".$endereco->getCid_ID()."
           WHERE 
               end_id =  ".$endereco->getEnd_ID()." ";
                   
        $query = mysql_query($sql,$this->conexao);

        return $query;        
    }
    
    function delete($endereco){
        $sql =" delete from endereco where end_id = ".$endereco->getEnd_ID()." ";
        
        $query = mysql_query($sql,$this->conexao);

        return $query;
    }
    
    function getEnderecos(){
        $sql = "SELECT * 
					FROM funcionario 
				ORDER BY func_nome, func_matricula, car_id";

        $enderecos = array();
		
        $query = mysql_query($sql,$this->conexao);
        while($rows = mysql_fetch_array($query)) {
            $endereco = new Endereco;
            $endereco->setEnd_ID($rows['end_id']);
            $endereco->setEnd_Rua($rows['end_rua']);
            $endereco->setEnd_Num($rows['end_num']);  
            $endereco->setEnd_Complemento($rows['end_complemento']); 
			$endereco->setEnd_Bairro($rows['end_bairro']); 
			$endereco->setEnd_Cep($rows['end_cep']); 
			$endereco->setCid_ID($rows['cid_id']); 

            $enderecos[] = $endereco;
        }
        return $enderecos;
    }
       
    function getEndereco($end_id){
        $sql = "SELECT * 
					FROM funcionario 
				WHERE end_id = ".$end_id;
				
        $query = mysql_query($sql,$this->conexao);
        
		while($rows = mysql_fetch_array($query)) {
            $endereco = new Endereco;
            $endereco->setEnd_ID($rows['end_id']);
            $endereco->setEnd_Rua($rows['end_rua']);
            $endereco->setEnd_Num($rows['end_num']);  
            $endereco->setEnd_Complemento($rows['end_complemento']); 
			$endereco->setEnd_Bairro($rows['end_bairro']); 
			$endereco->setEnd_Cep($rows['end_cep']); 
			$endereco->setCid_ID($rows['cid_id']);
        }
        return $endereco;
    }
    
    function getEnderecoByRua($end_rua){
        $sql = "SELECT * 
					FROM funcionario 
				WHERE end_rua like '%$end_rua%'";
				
        $enderecos = array();
		
		$query = mysql_query($sql,$this->conexao);
        
		while($rows = mysql_fetch_array($query)) {
            $endereco = new Endereco;
            $endereco->setEnd_ID($rows['end_id']);
            $endereco->setEnd_Rua($rows['end_rua']);
            $endereco->setEnd_Num($rows['end_num']);  
            $endereco->setEnd_Complemento($rows['end_complemento']); 
			$endereco->setEnd_Bairro($rows['end_bairro']); 
			$endereco->setEnd_Cep($rows['end_cep']); 
			$endereco->setCid_ID($rows['cid_id']);   
			
			$enderecos[] = $endereco;
        }
        return $enderecos;
    }
}

?>
