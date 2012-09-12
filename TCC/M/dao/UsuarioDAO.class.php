<?php

class UsuarioDAO {
    private $conexao;
    
    function __construct($conexao) {
        $this->conexao = $conexao;
    }
    
    function inserir($usuario){
        
        $sql="
           INSERT INTO usuario(
               usu_login
               ,usu_senha
               ,tpa_id
               ,func_id
           ) 
           VALUES(
               '".$usuario->getUsuario_Login()."'
               , '".$usuario->getUsuario_Senha()."'
               , ".$usuario->getTipoAcesso_ID()."
               , ".$usuario->getFuncionario_ID()."
           )";
      
        $query = mysql_query($sql,$this->conexao);
       
        return $query;
    }
    
    
    function alterar($usuario){
        
        $sql="
           UPDATE usuario SET
               usu_login = '".$usuario->getUsuario_Login()."'
               , usu_senha = '".$usuario->getUsuario_Senha()."'
               , tpa_id = ".$usuario->getTipoAcesso_ID()."
               , func_id = ".$usuario->getFuncionario_ID()."  
           WHERE 
               usu_id =  ".$usuario->getUsuario_ID()." ";
                   
        $query = mysql_query($sql,$this->conexao);

        return $query;        
    }
    
    function delete($usuario){
        $sql =" delete from usuario where usu_id = ".$usuario->getUsuario_ID()." ";
        
        $query = mysql_query($sql,$this->conexao);

        return $query;
    }
    
    function getUsuarios(){
        $sql = "SELECT  
                   usu_id              
                   ,usu_login
                   ,usu_senha
                   ,tpa_id
                   ,func_id 
                FROM USUARIO 
                ORDER BY usu_login";

        $usuarios = array();
  
        $query = mysql_query($sql,$this->conexao);
        while($rows = mysql_fetch_array($query)) {
            $usuario = new Usuario;
            $usuario->setUsuario_ID($rows['usu_id']);
            $usuario->setUsuario_Login($rows['usu_login']);
            $usuario->setUsuario_Senha($rows['usu_senha']);  
            $usuario->setTipoAcesso_ID($rows['tpa_id']);
            $usuario->setFuncionario_ID($rows['func_id']); 

            $usuarios[] = $usuario;
        }
        return $usuarios;
    }
       
    function getUsuario($usu_id){
        
        $sql = "SELECT  
                   usu_id              
                   ,usu_login
                   ,usu_senha
                   ,tpa_id
                   ,func_id 
                FROM USUARIO 
                WHERE usu_id = ".$usu_id;
                        
        $query = mysql_query($sql,$this->conexao);
        while($rows = mysql_fetch_array($query)) {
            $usuario = new Usuario;
            $usuario->setUsuario_ID($rows['usu_id']);
            $usuario->setUsuario_Login($rows['usu_login']);
            $usuario->setUsuario_Senha($rows['usu_senha']);  
            $usuario->setTipoAcesso_ID($rows['tpa_id']);
            $usuario->setFuncionario_ID($rows['func_id']);             
        }
        return $usuario;
    }
    
    function getUsuarios_Filtro($usu_login, $tpa_id, $func_id){
       
        $sql = "SELECT  
                   u.usu_id              
                   , u.usu_login
                   , u.usu_senha
                   , u.tpa_id
                   , t.tpa_tipo
                   , u.func_id 
                   , f.func_nome
                FROM USUARIO u     
                INNER JOIN TipoAcesso t ON u.tpa_id = t.tpa_id
                INNER JOIN Funcionario f ON u.func_id = f.func_id
                WHERE 1 ";
        
        if(isset($usu_login) and $usu_login != "") {
            $sql.=  " AND u.usu_login = '".$usu_login."'";             
        }
        
        if(isset($tpa_id) and $tpa_id != "") {
            $sql.=  " AND u.tpa_id = '".$tpa_id."'";             
        }
        
        if(isset($func_id) and $func_id != "") {
            $sql.=  " AND u.func_id = ".$func_id;             
        }
         
        $sql.= " ORDER BY u.usu_login ";        

        $query = mysql_query($sql,$this->conexao);
        while($rows = mysql_fetch_array($query)) {
            $usuario = new Usuario;
            $usuario->setUsuario_ID($rows['usu_id']);
            $usuario->setUsuario_Login($rows['usu_login']);
            $usuario->setUsuario_Senha($rows['usu_senha']);  
            $usuario->setTipoAcesso_ID($rows['tpa_id']);
            $usuario->setTipoAcesso_Tipo($rows['tpa_tipo']); 
            $usuario->setFuncionario_ID($rows['func_id']); 
            $usuario->setFuncionario_Nome($rows['func_nome']);      
            
            $usuarios[] = $usuario;     

        }
        return $usuarios;
    }

}

?>
