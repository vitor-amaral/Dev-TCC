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
    
    function getClientes(){
        $sql = "SELECT
                    cli_id
                    ,cli_nome                    
                FROM cliente
                ORDER BY cli_nome";

        $categorias = array();
  
        $query = mysql_query($sql,$this->conexao);
        while($rows = mysql_fetch_array($query)) {
            $cliente = new Cliente;
            $cliente->setCli_Nome($rows['cli_nome']);
            $cliente->setCli_ID($rows['cli_id']); 

            $clientes [] = $cliente;
        }
        return $clientes;
    }
    
    function getMensagensByFiltro($tituloMensagem,$mensagem){
        $sql = "SELECT 
                    m.mens_id
                    ,m.mens_titulo
                    ,m.mens_texto
                    ,m.usu_id        
                FROM MENSAGEM m 
                WHERE 1 ";                
                
        if(isset($tituloMensagem) and $tituloMensagem != "") {
            $sql.=  " AND m.mens_titulo like '%".$tituloMensagem."%'";             
        } 
        if(isset($mensagem) and $mensagem != "") {
            $sql.=  " AND m.mens_texto like '%".$mensagem."%'";             
        }               
  
        $sql.= " ORDER BY mens_titulo ";
  
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
    
    function getClientesEmail(){
        $sql = "SELECT
                    cli_id
                    ,cli_nome                    
                    ,cli_email
                FROM cliente
                WHERE cli_email != ''        
                ORDER BY cli_nome";

        $categorias = array();
  
        $query = mysql_query($sql,$this->conexao);
        while($rows = mysql_fetch_array($query)) {
            $cliente = new Cliente;
            $cliente->setCli_Nome($rows['cli_nome']);
            $cliente->setCli_ID($rows['cli_id']); 
            $cliente->setCli_Email($rows['cli_email']); 

            $clientes [] = $cliente;
        }
        return $clientes;
    }
    
}

?>
