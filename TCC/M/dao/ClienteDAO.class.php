<?php

class ClienteDAO {
    private $conexao;
    
    function __construct($conexao) {
        $this->conexao = $conexao;
    }
    
    function inserir($cliente){
        $sql="
           insert into cliente
                    (cli_nome) 
             values 
                ('".$cliente->getCliente_Nome()."')  
             ";
      
        $query = mysql_query($sql,$this->conexao);
       
        return $query;
    }
    
    
    function alterar($cliente){
        $sql="
            update cliente set  cli_nome ='".$cliente->getCliente_Nome()."' 
                where cli_id = ".$cliente->getCliente_ID()." ";
        
        $query = mysql_query($sql,$this->conexao);

        return $query;
       
    }
    
    function delete($cliente){
        $sql =" delete from cliente where cli_id = ".$cliente->getCliente_ID()." ";
        
        $query = mysql_query($sql,$this->conexao);

        return $query;
    }
    
    function getClientes(){
        $sql = "select * from cliente order by cli_id, cli_nome, cli_referencia";

        $clientes = array();
;  
        $query = mysql_query($sql,$this->conexao);
        while($rows = mysql_fetch_array($query)) {
            $cliente = new Cliente;
            $cliente->setCliente_ID($rows['cli_id']);
            $cliente->setCliente_Nome($rows['cli_nome']);
            $cliente->setCli_refencia($rows['cli_referenci']);  
			$cliente->setCli_dtNasc($rows['cli_dtNasc']);  
			$cliente->setCli_telefone($rows['cli_telefone']);  
			$cliente->setCli_email($rows['cli_email']);  
			$cliente->setEnd_id($rows['end_id']);
			$cliente->setUsu_id($rows['usu_id']);
			$cliente->setCli_estCivil($rows['cli_estCivil']);  
			$cliente->setCli_apelido($rows['cli_apelido']);  
			$cliente->setCli_id_indicador($rows['cli_id_indicador']);  

            $clientes[] = $cliente;
        }
        return $clientes;
    }
       
    function getCliente($cli_id){
        $sql = "select * from cliente where cli_id = ".$cli_id;

        $query = mysql_query($sql,$this->conexao);
        while($rows = mysql_fetch_array($query)) {
            $cliente = new Cliente;
            $cliente->setCliente_ID($rows['cli_id']);
            $cliente->setCliente_Nome($rows['cli_nome']);
            $cliente->setCli_refencia($rows['cli_referenci']);  
			$cliente->setCli_dtNasc($rows['cli_dtNasc']);  
			$cliente->setCli_telefone($rows['cli_telefone']);  
			$cliente->setCli_email($rows['cli_email']);  
			$cliente->setEnd_id($rows['end_id']);
			$cliente->setUsu_id($rows['usu_id']);
			$cliente->setCli_estCivil($rows['cli_estCivil']);  
			$cliente->setCli_apelido($rows['cli_apelido']);  
			$cliente->setCli_id_indicador($rows['cli_id_indicador']);  
            
            //clientes[] = $cliente;     

        }
        return $cliente;
    }
    
    function getClienteByNome($cli_nome){
        //$sql = "select * from cliente where cli_nome = '".$cli_nome."'";
        
        $sql = "
            select * from cliente 
                where cli_nome like '%$cli_nome%' 
            order by cli_nome ";

        $query = mysql_query($sql,$this->conexao);
        while($rows = mysql_fetch_array($query)) {
            $cliente = new Cliente;
            $cliente->setCliente_ID($rows['cli_id']);
            $cliente->setCliente_Nome($rows['cli_nome']);
            $cliente->setCli_refencia($rows['cli_referenci']);  
			$cliente->setCli_dtNasc($rows['cli_dtNasc']);  
			$cliente->setCli_telefone($rows['cli_telefone']);  
			$cliente->setCli_email($rows['cli_email']);  
			$cliente->setEnd_id($rows['end_id']);
			$cliente->setUsu_id($rows['usu_id']);
			$cliente->setCli_estCivil($rows['cli_estCivil']);  
			$cliente->setCli_apelido($rows['cli_apelido']);  
			$cliente->setCli_id_indicador($rows['cli_id_indicador']);  
            
            $clientes[] = $cliente;     

        }
        return $clientes;
    }
	
	function getClienteByReferencia($cli_referencia){
        //$sql = "select * from cliente where cli_referencia = '".$cli_referencia."'";
        
        $sql = "
            select * from cliente 
                where cli_referencia like '%$cli_referencia%' 
            order by cli_referencia ";

        $query = mysql_query($sql,$this->conexao);
        while($rows = mysql_fetch_array($query)) {
            $cliente = new Cliente;
            $cliente->setCliente_ID($rows['cli_id']);
            $cliente->setCliente_Nome($rows['cli_nome']);
            $cliente->setCli_refencia($rows['cli_referenci']);  
			$cliente->setCli_dtNasc($rows['cli_dtNasc']);  
			$cliente->setCli_telefone($rows['cli_telefone']);  
			$cliente->setCli_email($rows['cli_email']);  
			$cliente->setEnd_id($rows['end_id']);
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
