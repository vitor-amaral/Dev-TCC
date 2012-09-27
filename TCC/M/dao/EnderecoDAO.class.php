<?php

class EnderecoDAO {
    private $conexao;
    
    function __construct($conexao) {
        $this->conexao = $conexao;
    }
    
    function inserir($endereco){
        
        $sql="
           INSERT INTO endereco(
               end_rua
               ,end_num
			   ,end_complemento
			   ,end_bairro
			   ,end_cep
			   ,cid_id
               ,cli_id
           ) 
           VALUES(
             '".$endereco->getEnd_Rua()."'
               , ".$endereco->getEnd_Num()."
			   , '".$endereco->getEnd_Complemento()."'
			   , '".$endereco->getEnd_Bairro()."'
			   , '".$endereco->getEnd_Cep()."'
			   , ".$endereco->getCid_ID()."
               , ".$endereco->getCli_ID()."
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
			   , end_cep  		 = '".$endereco->getEnd_Cep()."'
			   , cid_id  		 = ".$endereco->getCid_ID()."
               , cli_id           = ".$endereco->getCli_ID()."
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
    
    function getEnderecosCliente($cli_id){       
        $sql = "SELECT                
                   end.end_id
                   ,end.end_rua
                   ,end.end_num
                   ,end.end_complemento
                   ,end.end_bairro
                   ,end.end_cep
                   ,end.cid_id
                   ,cid.cid_nome
                   ,cid.uf_sigla
                   ,end.cli_id 
                FROM Endereco end
                INNER JOIN Cidade cid ON end.cid_id = cid.cid_id 
				WHERE end.cli_id = ".$cli_id;

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
            $endereco->setCid_Nome($rows['cid_nome']);
            $endereco->setUf_Sigla($rows['uf_sigla']);
            $endereco->setCli_ID($rows['cli_id']); 

            $enderecos[] = $endereco;
        }
        return $enderecos;
    }
       
    function getEndereco($end_id){
        $sql = "SELECT                
                   end.end_id
                   ,end.end_rua
                   ,end.end_num
                   ,end.end_complemento
                   ,end.end_bairro
                   ,end.end_cep
                   ,end.cid_id
                   ,cid.cid_nome
                   ,cid.uf_sigla
                   ,end.cli_id 
                FROM Endereco end
                INNER JOIN Cidade cid ON end.cid_id = cid.cid_id 
				WHERE end.end_id = ".$end_id;
				
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
            $endereco->setCid_Nome($rows['cid_nome']);
            $endereco->setUf_Sigla($rows['uf_sigla']);            
            $endereco->setCli_ID($rows['cli_id']);
        }
        return $endereco;
    }
    
}

?>
