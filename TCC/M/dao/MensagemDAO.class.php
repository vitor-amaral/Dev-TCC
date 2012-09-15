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
        $sql = "select * from mensagen order by mens_titulo, mens_titulo";

        $mensagens = array();
  
        $query = mysql_query($sql,$this->conexao);
        while($rows = mysql_fetch_array($query)) {
            $mensagen = new Mensagem;
            $mensagen->setMens_ID($rows['mens_id']);
            $mensagen->setMens_Titulo($rows['mens_titulo']);
            $mensagen->setMens_Texto($rows['mens_texto']);  
            $mensagen->setUsu_ID($rows['usu_id']); 

            $mensagens[] = $mensagen;
        }
        return $mensagens;
    }
       
    function getMensagem($mens_id){
        $sql = "select * from mensagen where mens_id = ".$mens_id;
        $query = mysql_query($sql,$this->conexao);
        while($rows = mysql_fetch_array($query)) {
            $mensagen = new Mensagem;
            $mensagen->setMens_ID($rows['mens_id']);
            $mensagen->setMens_Titulo($rows['mens_titulo']);
            $mensagen->setMens_Texto($rows['mens_texto']);  
            $mensagen->setUsu_ID($rows['usu_id']); 
        }
        return $mensagen;
    }
    
    function getMensagemByTitulo($mens_titulo){
       
        $sql = "
            select * from mensagem 
                where mens_titulo like '%$mens_titulo%' 
            order by mens_titulo ";

        $query = mysql_query($sql,$this->conexao);
        while($rows = mysql_fetch_array($query)) {
            $mensagen = new Mensagem;
            $mensagen->setMens_ID($rows['mens_id']);
            $mensagen->setMens_Titulo($rows['mens_titulo']);
            $mensagen->setMens_Texto($rows['mens_texto']);  
            $mensagen->setUsu_ID($rows['usu_id']); 

            $mensagens[] = $mensagen;
        }
        return $mensagens;
    }

}

?>
