<?php

class CargoDAO {
    private $conexao;
    
    function __construct($conexao) {
        $this->conexao = $conexao;
    }
    
    function inserir($cargo){
        $sql="
           insert into cargo
                    (car_descricao) 
             values 
                ('".$cargo->getCargo_Descricao()."')  
             ";
      
        $query = mysql_query($sql,$this->conexao);
       
        return $query;
    }
    
    
    function alterar($cargo){
        $sql="
            update cargo set car_descricao ='".$cargo->getCargo_Descricao()."' 
                where car_id = ".$cargo->getCargo_ID()." ";
        
        $query = mysql_query($sql,$this->conexao);

        return $query;
       
    }
    
    function delete($cargo){
        $sql =" delete from cargo where car_id = ".$cargo->getCargo_ID()." ";
        
        $query = mysql_query($sql,$this->conexao);

        return $query;
    }
    
    function getCargos(){
        $sql = "select * from cargo order by car_descricao";

        $cargos = array();
  
        $query = mysql_query($sql,$this->conexao);
        while($rows = mysql_fetch_array($query)) {
            $cargo = new Cargo;
            $cargo->setCargo_ID($rows['car_id']);
            $cargo->setCargo_Descricao($rows['car_descricao']);

            $cargos[] = $cargo;
        }
        return $cargos;
    }
       
    function getCargo($car_id){
        $sql = "select * from cargo where car_id = ".$car_id;

        $query = mysql_query($sql,$this->conexao);
        while($rows = mysql_fetch_array($query)) {
            $cargo = new Cargo;
            $cargo->setCargo_ID($rows['car_id']);
            $cargo->setCargo_Descricao($rows['car_descricao']); 

        }
        return $cargo;
    }
    
    function getCargoByDescricao($car_descricao){
        
        $sql = "               
            select * from cargo 
                where car_descricao like '%$car_descricao%' 
            order by car_descricao";

        $query = mysql_query($sql,$this->conexao);
        while($rows = mysql_fetch_array($query)) {
            $cargo = new Cargo;
            $cargo->setCargo_ID($rows['car_id']);
            $cargo->setCargo_Descricao($rows['car_descricao']); 
            
            $cargos[] = $cargo;     

        }
        return $cargos;
    }

}

?>
