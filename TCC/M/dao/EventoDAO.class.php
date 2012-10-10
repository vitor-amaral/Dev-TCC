<?php

class EventoDAO {
    private $conexao;
    
    function __construct($conexao) {
        $this->conexao = $conexao;
    }
    
    function inserir($evento){
        
        if($evento->getEv_Data() != "")                                       
                
            $data = implode("-",array_reverse(explode("/",$evento->getEv_Data())));
            
        else
           $data = null;
       
        
        $sql="
           INSERT INTO evento(
               ev_nome
               ,ev_tema
               ,ev_descricao
			   ,ev_data
               ,ev_hora
               ,usu_id
           ) 
           VALUES(                          
               '".$evento->getEv_Nome()."'
               , '".$evento->getEv_Tema()."'
               , '".$evento->getEv_Descricao()."'
			   , '".$data."'
               , '".$evento->getEv_Hora()."'
               , '".$evento->getUsu_ID()."'
           )";
      
        $query = mysql_query($sql,$this->conexao);
       
        return $query;
    }     
     
    function alterar($evento){
        
        if($evento->getEv_Data() != "")               
            $data = implode("-",array_reverse(explode("/",$evento->getEv_Data())));
        else
           $data = null;
        
        $sql="
           UPDATE evento SET
               ev_nome = '".$evento->getEv_Nome()."'
               ,ev_tema = '".$evento->getEv_Tema()."'
               ,ev_descricao = '".$evento->getEv_Descricao()."'
               ,ev_data = '".$data."'
               ,ev_hora = '".$evento->getEv_Hora()."'
               ,usu_id = '".$evento->getUsu_ID()."' 
           WHERE 
               ev_id =  ".$evento->getEv_ID()." ";
                   
        $query = mysql_query($sql,$this->conexao);

        return $query;        
    }
    
    function delete($evento){
        $sql =" delete from evento where ev_id = ".$evento->getEv_ID()." ";
        
        $query = mysql_query($sql,$this->conexao);

        return $query;
    }
    
    function getEventos(){
        
             
        
        $sql = "SELECT 
					ev_id
					,ev_nome
					,ev_tema
					,ev_descricao
					,ev_data
                    ,ev_hora
					,usu_id                    
				FROM evento 
				ORDER BY ev_data, ev_nome";

        $eventos = array();
  
        $query = mysql_query($sql,$this->conexao);
        while($rows = mysql_fetch_array($query)) {
            
            $data = implode("/",array_reverse(explode("-",$rows['ev_data'])));
            
            
            $evento = new Evento;
            $evento->setEv_ID($rows['ev_id']);
            $evento->setEv_Nome($rows['ev_nome']);
            $evento->setEv_Tema($rows['ev_tema']);  
            $evento->setEv_Descricao($rows['ev_descricao']); 
			$evento->setEv_Data($data);
            $evento->setEv_Hora($rows['ev_hora']);  
                                                       
            $eventos[] = $evento;
        }
        return $eventos;
    }
       
    function getEvento($ev_id){        
        
        $sql = "SELECT 
					ev_id
					,ev_nome
					,ev_tema
					,ev_descricao
					,ev_data
                    ,ev_hora
					,usu_id
				FROM evento 
				WHERE ev_id = ".$ev_id;
				
        $query = mysql_query($sql,$this->conexao);
        while($rows = mysql_fetch_array($query)) {
            $evento = new Evento;
            $evento->setEv_ID($rows['ev_id']);
            $evento->setEv_Nome($rows['ev_nome']);
            $evento->setEv_Tema($rows['ev_tema']);  
            $evento->setEv_Descricao($rows['ev_descricao']); 
			$evento->setEv_Data(implode("/",array_reverse(explode("-",$rows['ev_data']))));
            $evento->setEv_Hora($rows['ev_hora']); 
        }
        return $evento;
    }
    
    function getEvento_Filtro($ev_nome,$ev_tema,$ev_descricao,$ev_data,$ev_hora){
        $sql = "SELECT 
                    ev_id
                    ,ev_nome
                    ,ev_tema
                    ,ev_descricao
                    ,ev_data
                    ,ev_hora                    
                FROM EVENTO e 
                WHERE 1";
                
         if(isset($ev_nome) and $ev_nome != "") {
            $sql.=  " AND e.ev_nome like '%".$ev_nome."%'";             
        }
        
        if(isset($ev_tema) and $ev_tema != "") {
            $sql.=  " AND e.ev_tema like '%".$ev_tema."%'";             
        }                
        
        if(isset($ev_data) and $ev_data != "") {
            $sql.=  " AND e.ev_data = '".$ev_data."'";             
        }
        
        if(isset($ev_descricao) and $ev_descricao != "") {
            $sql.=  " AND e.ev_descricao like '%".$ev_descricao."%'";             
        }
         
        if(isset($ev_hora) and $ev_hora != "") {
            $sql.=  " AND e.ev_hora = '".$ev_hora."'";             
        } 
         
        $sql.= " ORDER BY e.ev_nome ";   
                   
        $eventos = array();
           
        $query = mysql_query($sql,$this->conexao);
        while($rows = mysql_fetch_array($query)) {
            
            $data = implode("/",array_reverse(explode("-",$rows['ev_data'])));            
            
            $evento = new Evento;
            $evento->setEv_ID($rows['ev_id']);
            $evento->setEv_Nome($rows['ev_nome']);
            $evento->setEv_Tema($rows['ev_tema']);  
            $evento->setEv_Descricao($rows['ev_descricao']); 
            $evento->setEv_Data($data); 
            $evento->setEv_Hora($rows['ev_hora']); 
           
           $eventos[] = $evento;  
           
           
        }
        return $eventos;
    }
    /*
    function getFuncionarioByNome($ev_nome){
       
        $sql = "SELECT 
					ev_id
					,ev_nome
					,ev_tema
					,ev_descricao
					,ev_data
					,usu_id
				FROM evento 
                WHERE ev_nome like '%$ev_nome%' 
				ORDER BY ev_nome ";

        $query = mysql_query($sql,$this->conexao);
        while($rows = mysql_fetch_array($query)) {
            $evento = new Evento;
            $evento->setEv_ID($rows['ev_id']);
            $evento->setEv_Nome($rows['ev_nome']);
            $evento->setEv_Tema($rows['ev_tema']);  
            $evento->setEv_Descricao($rows['ev_descricao']); 
			$evento->setEv_Data($rows['ev_data']); 

            $eventos[] = $evento;
        }
        return $eventos;
    }
    function getFuncionarioByTema($ev_tema){
       
        $sql = "SELECT
					ev_id
					,ev_nome
					,ev_tema
					,ev_descricao
					,ev_data
					,usu_id
				FROM evento 
                WHERE ev_tema like '%$ev_tema%' 
				ORDER BY ev_tema ";

        $query = mysql_query($sql,$this->conexao);
        while($rows = mysql_fetch_array($query)) {
            $evento = new Evento;
            $evento->setEv_ID($rows['ev_id']);
            $evento->setEv_Nome($rows['ev_nome']);
            $evento->setEv_Tema($rows['ev_tema']);  
            $evento->setEv_Descricao($rows['ev_descricao']); 
			$evento->setEv_Data($rows['ev_data']); 

            $eventos[] = $evento;
        }
        return $eventos;
    }                            */
}

?>
