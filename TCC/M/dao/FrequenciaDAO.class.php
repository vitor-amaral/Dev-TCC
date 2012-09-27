<?php

class FrequenciaDAO {
    private $conexao;
    
    function __construct($conexao) {
        $this->conexao = $conexao;
    }
    
    function inserir($frequencia){
        
        $sql="
           INSERT INTO frequencia(
               freq_data
               ,cli_id
           ) 
           VALUES(
               '".$frequencia->getFreq_Data()."'
               , ".$frequencia->getCli_ID()."
           )";
      
        $query = mysql_query($sql,$this->conexao);
       
        return $query;
    }
    
    function delete($frequencia){
        $sql =" delete from frequencia where freq_data = '".$frequencia->getFreq_Data()."' 
									     and cli_id = ".$frequencia->getCli_ID();
        
        $query = mysql_query($sql,$this->conexao);

        return $query;
    }
    
    function getFrequencias(){
        $sql = "SELECT 
					freq_id
					,cli_id
				FROM frequencia 
				ORDER BY freq_data, cli_id";

        $frequencias = array();
  
        $query = mysql_query($sql,$this->conexao);
        while($rows = mysql_fetch_array($query)) {
            $frequencia = new Frequencia;
            $frequencia->setFreq_Data($rows['freq_data']);
            $frequencia->setCli_ID($rows['cli_id']);

            $frequencias[] = $frequencia;
        }
        return $frequencias;
    }
       
    function getFrequenciaByData($freq_data){
        $sql = "SELECT 
					freq_id
					,cli_id
				FROM frequencia 
				WHERE freq_data = ".$freq_data;
				
        $query = mysql_query($sql,$this->conexao);
        while($rows = mysql_fetch_array($query)) {
            $frequencia = new Frequencia;
            $frequencia->setFreq_Data($rows['freq_data']);
            $frequencia->setCli_ID($rows['cli_id']);

            $frequencias[] = $frequencia;
        }
        return $frequencias;
    }
    
	function getFrequenciaByCliente($cli_id){
        $sql = "SELECT 
					freq_id
					,cli_id
				FROM frequencia 
				WHERE cli_id = ".$cli_id;
				
        $query = mysql_query($sql,$this->conexao);
        while($rows = mysql_fetch_array($query)) {
            $frequencia = new Frequencia;
            $frequencia->setFreq_Data($rows['freq_data']);
            $frequencia->setCli_ID($rows['cli_id']);

            $frequencias[] = $frequencia;
        }
        return $frequencias;
    }
	
}

?>
