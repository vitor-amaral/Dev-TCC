<?php

class PedidoDAO {
    private $conexao;
    
    function __construct($conexao) {
        $this->conexao = $conexao;
    }
    
    function inserir($pedido){
        
        $sql="
           INSERT INTO pedido(
               ped_data
               ,cli_id
           ) 
           VALUES(
               '".$pedido->getPed_Data()."'
               , ".$pedido->getCli_ID()."
           )";
      
        $query = mysql_query($sql,$this->conexao);
       
        return $query;
    }
    
    
    function alterar($pedido){
        
        $sql="
           UPDATE pedido SET
               ped_data = '".$pedido->getPed_Data()."'
               , cli_id = ".$pedido->getCli_ID()."
           WHERE 
               ped_id =  ".$pedido->getPed_ID()." ";
                   
        $query = mysql_query($sql,$this->conexao);

        return $query;        
    }
    
    function delete($pedido){
        $sql =" delete from pedido where ped_id = ".$pedido->getPed_ID()." ";
        
        $query = mysql_query($sql,$this->conexao);

        return $query;
    }
    
    function getPedidos(){
        $sql = "select * from pedido order by ped_data, cli_id";

        $pedidos = array();
	
        $query = mysql_query($sql,$this->conexao);
        while($rows = mysql_fetch_array($query)) {
            $pedido = new Pedido;
            $pedido->setPed_ID($rows['ped_id']);
            $pedido->setPed_Data($rows['ped_data']);
            $pedido->setCli_ID($rows['cli_id']);  

            $pedidos[] = $pedido;
        }
        return $pedidos;
    }
       
    function getPedido($ped_id){
        $sql = "select * from pedido where ped_id = ".$ped_id;
        $query = mysql_query($sql,$this->conexao);
        while($rows = mysql_fetch_array($query)) {
            $pedido = new Pedido;
            $pedido->setPed_ID($rows['ped_id']);
            $pedido->setPed_Data($rows['ped_data']);
            $pedido->setCli_ID($rows['cli_id']);  
        }
        return $pedido;
    }
    
    function getPedidoByCliente($cli_id){
       
        $sql = "
            select * from pedido 
                where cli_id = ".$cli_id 
            "order by ped_data ";

        $query = mysql_query($sql,$this->conexao);
        while($rows = mysql_fetch_array($query)) {
            $pedido = new Pedido;
            $pedido->setPed_ID($rows['ped_id']);
            $pedido->setPed_Data($rows['ped_data']);
            $pedido->setCli_ID($rows['cli_id']);  

            $pedidos[] = $pedido;
        }
        return $pedidos;
    }
	
	function getPedidoByData($ped_data){
       
        $sql = "
            select * from pedido 
                where ped_data like '%$cli_id%'
            order by cli_id ";

        $query = mysql_query($sql,$this->conexao);
        while($rows = mysql_fetch_array($query)) {
            $pedido = new Pedido;
            $pedido->setPed_ID($rows['ped_id']);
            $pedido->setPed_Data($rows['ped_data']);
            $pedido->setCli_ID($rows['cli_id']);  

            $pedidos[] = $pedido;
        }
        return $pedidos;
    }

}

?>
