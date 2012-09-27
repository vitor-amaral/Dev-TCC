<?php

class AmbienteDAO {
    private $conexao;
    
    function __construct($conexao) {
        $this->conexao = $conexao;
    }
    
    function inserir($ambiente){
        
        $sql="
           INSERT INTO ambiente(
               amb_descricao
               ,amb_nome
           ) 
           VALUES(
               '".$ambiente->getAmb_Descricao()."'
               , '".$ambiente->getAmb_Nome()."'
           )";
      
        $query = mysql_query($sql,$this->conexao);
       
        return $query;
    }
    
    
    function alterar($ambiente){
        
        $sql="
           UPDATE ambiente SET
               amb_descricao = '".$ambiente->getAmb_Descricao()."'
               , amb_nome = '".$ambiente->getAmb_Nome()."'
           WHERE 
               amb_id =  ".$ambiente->getAmb_ID()." ";
                   
        $query = mysql_query($sql,$this->conexao);

        return $query;        
    }
    
    function delete($ambiente){
        $sql =" delete from ambiente where amb_id = ".$ambiente->getAmb_ID()." ";
        
        $query = mysql_query($sql,$this->conexao);

        return $query;
    }
    
    function getAmbientes(){
        $sql = "SELECT 
					amb_id
					,amb_descricao
					,amb_nome
				FROM ambiente 
				ORDER BY amb_nome";

        $ambientes = array();
	
        $query = mysql_query($sql,$this->conexao);
        while($rows = mysql_fetch_array($query)) {
            $ambiente = new Ambiente;
            $ambiente->setAmb_ID($rows['amb_id']);
            $ambiente->setAmb_Descricao($rows['amb_descricao']);
            $ambiente->setAmb_Nome($rows['amb_nome']);  

            $ambientes[] = $ambiente;
        }
        return $ambientes;
    }
       
    function getAmbiente($amb_id){
        $sql = "SELECT 
					amb_id
					,amb_descricao
					,amb_nome 
				FROM ambiente 
				WHERE amb_id = ".$amb_id;
        
		$query = mysql_query($sql,$this->conexao);
        while($rows = mysql_fetch_array($query)) {
            $ambiente = new Ambiente;
            $ambiente->setAmb_ID($rows['amb_id']);
            $ambiente->setAmb_Descricao($rows['amb_descricao']);
            $ambiente->setAmb_Nome($rows['amb_nome']);  
        }
        return $ambiente;
    }
    
    function getAmbienteByNome($amb_nome){
       
        $sql = "
            SELECT 
				amb_id
				,amb_descricao
				,amb_nome
			FROM ambiente
            WHERE amb_nome like '%$amb_nome%' 
            ORDER BY amb_nome, amb_descricao";

        $query = mysql_query($sql,$this->conexao);
        while($rows = mysql_fetch_array($query)) {
            $ambiente = new Ambiente;
            $ambiente->setAmb_ID($rows['amb_id']);
            $ambiente->setAmb_Descricao($rows['amb_descricao']);
            $ambiente->setAmb_Nome($rows['amb_nome']);  

            $ambientes[] = $ambiente;
        }
        return $ambientes;
    }

}

?>
