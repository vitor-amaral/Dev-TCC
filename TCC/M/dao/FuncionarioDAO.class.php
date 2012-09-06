<?php

class FuncionarioDAO {
    private $conexao;
    
    function __construct($conexao) {
        $this->conexao = $conexao;
    }
    
    function inserir($funcionario){
        
        $sql="
           INSERT INTO funcionario(
               func_nome
               ,func_matricula
               ,car_id
           ) 
           VALUES(
               '".$funcionario->getFuncionario_Nome()."'
               , '".$funcionario->getFuncionario_Matricula()."'
               , ".$funcionario->getCargo_ID()."
           )";
      
        $query = mysql_query($sql,$this->conexao);
       
        return $query;
    }
    
    
    function alterar($funcionario){
        
        $sql="
           UPDATE funcionario SET
               func_nome = '".$funcionario->getFuncionario_Nome()."'
               , func_matricula = '".$funcionario->getFuncionario_Matricula()."'
               , car_id = ".$funcionario->getCargo_ID()."
           WHERE 
               func_id =  ".$funcionario->getFuncionario_ID()." ";
                   
        $query = mysql_query($sql,$this->conexao);

        return $query;        
    }
    
    function delete($funcionario){
        $sql =" delete from funcionario where func_id = ".$funcionario->getFuncionario_ID()." ";
        
        $query = mysql_query($sql,$this->conexao);

        return $query;
    }
    
    function getFuncionarios(){
        $sql = "select func_id, func_nome, func_matricula, car_id from funcionario order by func_nome, func_matricula, car_id";

        $funcionarios = array();
;  
        $query = mysql_query($sql,$this->conexao);
        while($rows = mysql_fetch_array($query)) {
            $funcionario = new Funcionario;
            $funcionario->setFuncionario_ID($rows['func_id']);
            $funcionario->setFuncionario_Nome($rows['func_nome']);
            $funcionario->setFuncionario_Matricula($rows['func_matricula']);  
            $funcionario->setCargo_ID($rows['car_id']); 

            $funcionarios[] = $funcionario;
        }
        return $funcionarios;
    }
       
    function getFuncionario($func_id){
        $sql = "select func_id, func_nome, func_matricula, car_id from funcionario where func_id = ".$func_id;
        $query = mysql_query($sql,$this->conexao);
        while($rows = mysql_fetch_array($query)) {
            $funcionario = new Funcionario;
            $funcionario->setFuncionario_ID($rows['func_id']);
            $funcionario->setFuncionario_Nome($rows['func_nome']);
            $funcionario->setFuncionario_Matricula($rows['func_matricula']);  
            $funcionario->setCargo_ID($rows['car_id']); 
            
        }
        return $funcionario;
    }
    
    function getFuncionarioByNome($func_nome){
       
        $sql = "
            select func_id, func_nome, func_matricula, car_id from funcionario 
                where func_nome like '%$func_nome%' 
            order by func_nome ";

        $query = mysql_query($sql,$this->conexao);
        while($rows = mysql_fetch_array($query)) {
            $funcionario = new Funcionario;
            $funcionario->setFuncionario_ID($rows['func_id']);
            $funcionario->setFuncionario_Nome($rows['func_nome']);
            $funcionario->setFuncionario_Matricula($rows['func_matricula']);  
            $funcionario->setCargo_ID($rows['car_id']); 
            
            $funcionarios[] = $funcionario;     

        }
        return $funcionarios;
    }
    
    function getFuncionarios_Filtro($func_nome, $func_matricula, $car_id){
       
        $sql = " SELECT 
                    f.func_id 
                    , f.func_nome
                    , f.func_matricula
                    , f.car_id 
                    , c.car_descricao
                 FROM funcionario f       
                 INNER JOIN cargo c ON f.car_id = c.car_id
                 WHERE 1 ";
        
        if(isset($func_nome) and $func_nome != "") {
            $sql.=  " AND f.func_nome like '%$func_nome%'";             
        }
        
        if(isset($func_matricula) and $func_matricula != "") {
            $sql.=  " AND f.func_matricula = '".$func_matricula."'";             
        }
        
        if(isset($car_id) and $car_id != "") {
            $sql.=  " AND f.car_id = ".$car_id;             
        }
         
        $sql.= " ORDER BY f.func_nome ";        

        $query = mysql_query($sql,$this->conexao);
        while($rows = mysql_fetch_array($query)) {
            $funcionario = new Funcionario;
            $funcionario->setFuncionario_ID($rows['func_id']);
            $funcionario->setFuncionario_Nome($rows['func_nome']);
            $funcionario->setFuncionario_Matricula($rows['func_matricula']);  
            $funcionario->setCargo_ID($rows['car_id']); 
            $funcionario->setCargo_Descricao($rows['car_descricao']); 
            
            $funcionarios[] = $funcionario;     

        }
        return $funcionarios;
    }

}

?>
