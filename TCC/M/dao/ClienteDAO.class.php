<?php

class ClienteDAO {
    private $conexao;
    
    function __construct($conexao) {
        $this->conexao = $conexao;
    }
    
    function inserir($cliente){
        $sql="
           INSERT INTO cliente(
               cli_nome
               ,cli_referencia
               ,cli_dtNasc
               ,cli_email
               ,usu_id
               ,cli_estCivil
               ,cli_apelido
               ,cli_id_indicador
           ) 
           VALUES(
               '".$cliente->getCli_Nome()."'
               , '".$cliente->getCli_referencia()."'
               , '".$cliente->getCli_dtNasc()."'
               , '".$cliente->getCli_email()."'
               , ".$cliente->getUsu_ID()."
               , '".$cliente->getCli_estCivil()."' 
               , '".$cliente->getCli_apelido()."'  
               , ".$cliente->getCli_id_indicador()."      
           )";
      
        $query = mysql_query($sql,$this->conexao);
       
        return $query;
    }
    
    
    function alterar($cliente){
        
        $sql="
           UPDATE cliente SET
               cli_nome = '".$cliente->getCli_Nome()."' 
               ,cli_referencia = '".$cliente->getCli_referencia()."' 
               ,cli_dtNasc = '".$cliente->getCli_dtNasc()."' 
               ,cli_email = '".$cliente->getCli_email()."' 
               ,usu_id = ".$cliente->getUsu_ID()." 
               ,cli_estCivil = '".$cliente->getCli_estCivil()."' 
               ,cli_apelido = '".$cliente->getCli_apelido()."' 
               ,cli_id_indicador = ".$cliente->getCli_id_indicador()." 
                          
           WHERE 
               cli_id =  ".$cliente->getCli_ID()." ";
                       
        $query = mysql_query($sql,$this->conexao);

        return $query;
       
    }
    
    function delete($cliente){
        $sql =" delete from cliente where cli_id = ".$cliente->getCli_ID()." ";   
        
        $query = mysql_query($sql,$this->conexao);

        return $query;
    }
    
    function getClientes(){
        $sql = "SELECT 
                    cli_id             
                    ,cli_nome
                    ,cli_referencia
                    ,cli_dtNasc
                    ,cli_email
                    ,usu_id
                    ,cli_estCivil
                    ,cli_apelido
                    ,cli_id_indicador                
                FROM cliente 
                ORDER BY by cli_nome";

        $clientes = array();

        $query = mysql_query($sql,$this->conexao);
        while($rows = mysql_fetch_array($query)) {
            $cliente = new Cliente;
            $cliente->setCli_ID($rows['cli_id']);
            $cliente->setCli_Nome($rows['cli_nome']);
            $cliente->setCli_referencia($rows['cli_referencia']);  
			$cliente->setCli_dtNasc($rows['cli_dtNasc']);  
			$cliente->setCli_email($rows['cli_email']);  
			$cliente->setUsu_id($rows['usu_id']);
			$cliente->setCli_estCivil($rows['cli_estCivil']);  
			$cliente->setCli_apelido($rows['cli_apelido']);  
			$cliente->setCli_id_indicador($rows['cli_id_indicador']);  

            $clientes[] = $cliente;
        }
        return $clientes;
    }
       
    function getCliente($cli_id){
        $sql = "SELECT 
                    cli_id             
                    ,cli_nome
                    ,cli_referencia
                    ,cli_dtNasc
                    ,cli_email
                    ,usu_id
                    ,cli_estCivil
                    ,cli_apelido
                    ,cli_id_indicador                
                FROM cliente 
                WHERE cli_id = ".$cli_id;
                                              

        $query = mysql_query($sql,$this->conexao);
        while($rows = mysql_fetch_array($query)) {
           $cliente = new Cliente;
           $cliente->setCli_ID($rows['cli_id']);
           $cliente->setCli_Nome($rows['cli_nome']);
           $cliente->setCli_referencia($rows['cli_referencia']);  
           $cliente->setCli_dtNasc($rows['cli_dtNasc']);  
           $cliente->setCli_email($rows['cli_email']);  
           $cliente->setUsu_id($rows['usu_id']);
           $cliente->setCli_estCivil($rows['cli_estCivil']);  
           $cliente->setCli_apelido($rows['cli_apelido']);  
           $cliente->setCli_id_indicador($rows['cli_id_indicador']);
           
        }
        return $cliente;
    }
    
    
    function getClientes_Filtro($cli_nome, $cli_referencia, $cli_dtNasc, $cli_email, $usu_id, $cli_estCivil, $cli_apelido, $cli_id_indicador){
       
        $sql = "SELECT 
                    c.cli_id             
                    ,c.cli_nome
                    ,c.cli_referencia
                    ,c.cli_dtNasc
                    ,c.cli_email
                    ,c.usu_id
                    ,u.usu_login
                    ,c.cli_estCivil
                    ,c.cli_apelido
                    ,c.cli_id_indicador
                    ,ci.cli_nome AS cli_indicador 
                FROM cliente c
                INNER JOIN usuario u ON c.usu_id = u.usu_id
                LEFT JOIN cliente ci ON c.cli_id_indicador = ci.cli_id_indicador
                WHERE 1";
        
        if(isset($cli_nome) and $cli_nome != "") {
            $sql.=  " AND c.cli_nome like '%$cli_nome%'";             
        }
        
        if(isset($cli_referencia) and $cli_referencia != "") {
            $sql.=  " AND c.cli_referencia like '%$cli_referencia%'";             
        }
        
        if(isset($usu_id) and $usu_id != "") {
            $sql.=  " AND c.usu_id = ".$usu_id;             
        }
                                                                                              
        //TODO: Falta os filtros por:
        /*  $cli_dtNasc
        *   $cli_email
        *   $cli_estCivil
        */
        
        if(isset($cli_apelido) and $cli_apelido != "") {
            $sql.=  " AND c.cli_apelido like '%$cli_apelido%'";             
        }
                
        if(isset($cli_id_indicador) and $cli_id_indicador != "") {
            $sql.=  " AND c.cli_id_indicador = '".$cli_id_indicador."'";             
        }
                                     
        $sql.= " ORDER BY c.cli_nome";
        
        $query = mysql_query($sql,$this->conexao);
        while($rows = mysql_fetch_array($query)) {
           $cliente = new Cliente;
           $cliente->setCli_ID($rows['cli_id']);
           $cliente->setCli_Nome($rows['cli_nome']);
           $cliente->setCli_referencia($rows['cli_referencia']);  
           $cliente->setCli_dtNasc($rows['cli_dtNasc']);  
           $cliente->setCli_email($rows['cli_email']);  
           $cliente->setUsu_id($rows['usu_id']);
           $cliente->setUsu_login($rows['usu_login']);  
           $cliente->setCli_estCivil($rows['cli_estCivil']);  
           $cliente->setCli_apelido($rows['cli_apelido']);  
           $cliente->setCli_id_indicador($rows['cli_id_indicador']);  
           $cliente->setCli_indicador($rows['cli_indicador']);    
            
           $clientes[] = $cliente;
            
        }
        return $clientes;
    }
        
    function getClienteByNome($cli_nome){
       
        $sql = "
            select * from cliente 
                where cli_nome like '%$cli_nome%' 
            order by cli_nome ";

        $query = mysql_query($sql,$this->conexao);
        while($rows = mysql_fetch_array($query)) {
            $cliente = new Cliente;
            $cliente->setCli_ID($rows['cli_id']);
            $cliente->setCli_Nome($rows['cli_nome']);
            $cliente->setCli_referencia($rows['cli_referencia']); 
            $cliente->setCli_dtNasc($rows['cli_dtNasc']);  
            $cliente->setCli_email($rows['cli_email']);  
            $cliente->setUsu_id($rows['usu_id']);
            $cliente->setCli_estCivil($rows['cli_estCivil']);  
            $cliente->setCli_apelido($rows['cli_apelido']);  
            $cliente->setCli_id_indicador($rows['cli_id_indicador']);  
            
            $clientes[] = $cliente;     

        }
        return $clientes;
    }
	
	function getClienteByReferencia($cli_referencia){
        
        $sql = "
            select * from cliente 
                where cli_referencia like '%$cli_referencia%' 
            order by cli_referencia ";

        $query = mysql_query($sql,$this->conexao);
        while($rows = mysql_fetch_array($query)) {
            $cliente = new Cliente;
            $cliente->setCli_ID($rows['cli_id']);
            $cliente->setCli_Nome($rows['cli_nome']);
            $cliente->setCli_referencia($rows['cli_referencia']);  
            $cliente->setCli_dtNasc($rows['cli_dtNasc']);  
            $cliente->setCli_email($rows['cli_email']);  
            $cliente->setUsu_id($rows['usu_id']);
            $cliente->setCli_estCivil($rows['cli_estCivil']);  
            $cliente->setCli_apelido($rows['cli_apelido']);  
            $cliente->setCli_id_indicador($rows['cli_id_indicador']);    
            
            $clientes[] = $cliente;     

        }
        return $clientes;
    }

}

?>
