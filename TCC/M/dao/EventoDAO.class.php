<?php

class EventoDAO {
    private $conexao;
    
    function __construct($conexao) {
        $this->conexao = $conexao;
    }
    
    function inserir($evento){
        
        $sql="
           INSERT INTO evento(
               ev_nome
               ,ev_tema
               ,ev_descricao
			   ,ev_data
           ) 
           VALUES(
               '".$evento->getEv_Nome()."'
               , '".$evento->getEv_Tema()."'
               , '".$evento->getEv_Descricao()."'
			   , '".$evento->getEv_Data()."'
           )";
      
        $query = mysql_query($sql,$this->conexao);
       
        return $query;
    }
    
    
    function alterar($evento){
        
        $sql="
           UPDATE evento SET
               ev_nome        = '".$evento->getEvento_Nome()."'
               , ev_tema      = '".$evento->getEv_Tema()."'
               , ev_descricao = '".$evento->getEv_Descricao()."'
			   , ev_data      = '".$evento->getEv_Data()."'
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
					,usu_id
				FROM evento 
				ORDER BY ev_data, ev_nome";

        $eventos = array();
  
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
       
    function getEvento($ev_id){
        $sql = "SELECT 
					ev_id
					,ev_nome
					,ev_tema
					,ev_descricao
					,ev_data
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
			$evento->setEv_Data($rows['ev_data']); 
        }
        return $evento;
    }
    
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
    }
}

?>
