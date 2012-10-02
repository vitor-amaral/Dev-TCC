<?php

class TelefoneDAO {
    private $conexao;
    
    function __construct($conexao) {
        $this->conexao = $conexao;
    }
    
    function inserir($telefone){
        
        $sql="
           INSERT INTO telefone(
               tel_telefone
               ,tel_tipo
			   ,tel_observacao
               ,cli_id
           ) 
           VALUES(
             '".$telefone->getTel_Telefone()."'
               , ".$telefone->getTel_Tipo()."
			   , '".$telefone->getTel_Observacao()."'
               , ".$telefone->getCli_ID()."
           )";
        $query = mysql_query($sql,$this->conexao);
       
        return $query;
    }
   
    function alterar($telefone){
        
        $sql="
           UPDATE telefone SET
               tel_telefone 	 = '".$telefone->getTel_Telefone()."'
               , tel_tipo  		 = ".$telefone->getTel_Tipo()."
               , tel_observacao  = '".$telefone->getTel_Observacao()."'
               , cli_id          = ".$telefone->getCli_ID()."
           WHERE 
               tel_id =  ".$telefone->getTel_ID()." ";
                   
        $query = mysql_query($sql,$this->conexao);

        return $query;        
    }
    
    function delete($telefone){
        $sql =" delete from telefone where tel_id = ".$telefone->getTel_ID()." ";
        
        $query = mysql_query($sql,$this->conexao);

        return $query;
    }   
    
    function getTelefonesCliente($cli_id){
        
        $sql = "SELECT                
           tel_id
           ,tel_telefone
           ,tel_tipo
           ,tel_observacao
           ,cli_id
           FROM Telefone 
           WHERE cli_id = ".$cli_id;
                
        $telefones = array();  
        
        $query = mysql_query($sql,$this->conexao);
        while($rows = mysql_fetch_array($query)) {
            $telefone = new Telefone;
            $telefone->setTel_ID($rows['tel_id']);
            $telefone->setTel_Telefone($rows['tel_telefone']);
            $telefone->setTel_Tipo($rows['tel_tipo']);  
            $telefone->setTel_Observacao($rows['tel_observacao']); 
            $telefone->setCli_ID($rows['cli_id']);  
            
            $telefones[] = $telefone;    
        }           

        return $telefones; 
    }
       
    function getTelefone($tel_id){
        $sql = "SELECT                 
               tel_id
               ,tel_telefone
               ,tel_tipo
               ,tel_observacao
               ,cli_id
                    FROM Telefone 
				WHERE tel_id = ".$tel_id;
				
        $query = mysql_query($sql,$this->conexao);
        
		while($rows = mysql_fetch_array($query)) {
            $telefone = new Telefone;
            $telefone->setTel_ID($rows['tel_id']);
            $telefone->setTel_Telefone($rows['tel_telefone']);
            $telefone->setTel_Tipo($rows['tel_tipo']);  
            $telefone->setTel_Observacao($rows['tel_observacao']); 
            $telefone->setCli_ID($rows['cli_id']);
        }
        return $telefone;
    }      
    
}

?>
