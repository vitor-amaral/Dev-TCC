<?php

class MensagemDAO {
    private $conexao;
    
    function __construct($conexao) {
        $this->conexao = $conexao;
    }
    
    function inserir($mensagem){
        
        $sql="
           INSERT INTO mensagem(
               mens_titulo
               ,mens_texto
               ,usu_id
           ) 
           VALUES(
               '".$mensagem->getMens_Titulo()."'
               , '".$mensagem->getMens_Texto()."'
               , ".$mensagem->getUsu_ID()."
           )";
      
        $query = mysql_query($sql,$this->conexao);
       
        return $query;
    }
    
    
    function alterar($mensagem){
        
        $sql="
           UPDATE mensagem SET
               mens_titulo = '".$mensagem->getMens_Titulo()."'
               , mens_texto = '".$mensagem->getMens_Texto()."'
               , usu_id = ".$mensagem->getUsu_ID()."
           WHERE 
               mens_id =  ".$mensagem->getMens_ID()." ";
                   
        $query = mysql_query($sql,$this->conexao);

        return $query;        
    }
    
    function delete($mensagem){
        $sql =" delete from mensagem where mens_id = ".$mensagem->getMens_ID()." ";
        
        $query = mysql_query($sql,$this->conexao);

        return $query;
    }
    
    function getMensagems(){
        $sql = "SELECT 
					mens_id
					,mens_titulo
					,mens_texto
					,usu_id
				FROM mensagem
				ORDER BY mens_titulo, mens_titulo";

        $mensagens = array();
  
        $query = mysql_query($sql,$this->conexao);
        while($rows = mysql_fetch_array($query)) {
            $mensagem = new Mensagem;
            $mensagem->setMens_ID($rows['mens_id']);
            $mensagem->setMens_Titulo($rows['mens_titulo']);
            $mensagem->setMens_Texto($rows['mens_texto']);  
            $mensagem->setUsu_ID($rows['usu_id']); 

            $mensagens[] = $mensagem;
        }
        return $mensagens;
    }
       
    function getMensagem($mens_id){
        $sql = "SELECT 
					mens_id
					,mens_titulo
					,mens_texto
					,usu_id
				FROM mensagem 
				WHERE mens_id = ".$mens_id;
				
        $query = mysql_query($sql,$this->conexao);
        while($rows = mysql_fetch_array($query)) {
            $mensagem = new Mensagem;
            $mensagem->setMens_ID($rows['mens_id']);
            $mensagem->setMens_Titulo($rows['mens_titulo']);
            $mensagem->setMens_Texto($rows['mens_texto']);  
            $mensagem->setUsu_ID($rows['usu_id']); 
        }
        return $mensagem;
    }
    
    function getMensagemByTitulo($mens_titulo){
       
        $sql = "SELECT
					mens_id
					,mens_titulo
					,mens_texto
					,usu_id
				FROM mensagem 
                WHERE mens_titulo like '%$mens_titulo%' 
				ORDER BY mens_titulo ";

        $query = mysql_query($sql,$this->conexao);
        while($rows = mysql_fetch_array($query)) {
            $mensagem = new Mensagem;
            $mensagem->setMens_ID($rows['mens_id']);
            $mensagem->setMens_Titulo($rows['mens_titulo']);
            $mensagem->setMens_Texto($rows['mens_texto']);  
            $mensagem->setUsu_ID($rows['usu_id']); 

            $mensagens[] = $mensagem;
        }
        return $mensagens;
    }

}

?>
