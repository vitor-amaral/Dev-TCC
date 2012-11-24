<?php

class PedidoDAO {
    private $conexao;
    
    function __construct($conexao) {
        $this->conexao = $conexao;
    }
    
    function inserir($pedido){
        
        if($pedido->getPed_Data() != "")               
            $data = implode("-",array_reverse(explode("/",$pedido->getPed_Data())));
        else
           $data = null;
        
        $sql="
           INSERT INTO pedido(
               ped_data
               ,cli_id
           ) 
           VALUES(
               '".$data."'
               , ".$pedido->getCli_ID()."
           )";
      
        //Retorna o ID do pedido novo
            if (mysql_query($sql,$this->conexao)){
               $ultimo_id = mysql_insert_id($this->conexao);
               return $ultimo_id;
            }else{
               return "0";
            } 
        
    }
    
    
    function alterar($pedido){
        
        if($pedido->getPed_Data() != "")               
            $data = implode("-",array_reverse(explode("/",$pedido->getPed_Data())));
        else
           $data = null;
        
        $sql="
           UPDATE pedido SET
               ped_data = '".$data."'
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
        $sql = "SELECT 
					ped_id
					,ped_data
					,cli_id
				FROM pedido 
				ORDER BY ped_data, cli_id";

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
        $sql = "SELECT 
                    ped.ped_id
                    ,ped.cli_id
                    ,ped.ped_data
                    ,cli.cli_id
                    ,cli.cli_nome
                    ,prod.pro_id
                    ,prod.pro_nome
                    ,pp.ped_id
                    ,pp.proped_comentario
                    ,pp.proped_qtde
                    ,pp.pro_id
                FROM PEDIDO ped, CLIENTE cli, PRODUTO prod, PRODUTOPEDIDO pp
                WHERE ped.cli_id = cli.cli_id and
                       ped.ped_id = pp.ped_id and
                       pp.pro_id = prod.pro_id and
                       ped.ped_id = ".$ped_id; 				
				
        $query = mysql_query($sql,$this->conexao);
        while($rows = mysql_fetch_array($query)) {
            $data = implode("/",array_reverse(explode("-",$rows['ped_data']))); 
            
            $pedido = new Pedido;
            $pedido->setPed_ID($rows['ped_id']);
            $pedido->setPed_Data($data);
            $pedido->setCli_ID($rows['cli_id']);  
            $pedido->setCli_Nome($rows['cli_nome']);  
            $pedido->setPro_Nome($rows['pro_nome']);  
            $pedido->setPro_Qtde($rows['proped_qtde']);  
            $pedido->setPro_ID($rows['pro_id']);  
            $pedido->setPed_Coment($rows['proped_comentario']);   
                                                    
        }
        return $pedido;
    }
    
    function getPedidoByCliente($cli_id){
       
        $sql = "SELECT
					ped_id
					,ped_data
					,cli_id
				FROM pedido 
                WHERE cli_id = ".$cli_id.
				"ORDER BY ped_data ";

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
       
        $sql = "SELECT 
					ped_id
					,ped_data
					,cli_id
				FROM pedido 
                WHERE ped_data like '%$cli_id%'
				ORDER BY cli_id ";

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
    
    function getProdutoByTipo($pro_tipo){
       
        $sql = "
            select * from produto
                where pro_tipo like '%$pro_tipo%' 
            order by pro_tipo ";

        $query = mysql_query($sql,$this->conexao);
        while($rows = mysql_fetch_array($query)) {
            $produto = new Produto;
            $produto->setPro_ID($rows['pro_id']);
            $produto->setPro_Nome($rows['pro_nome']);
            $produto->setPro_Preco($rows['pro_preco']);  
            $produto->setPro_Tipo($rows['pro_tipo']); 

            $produtos[] = $produto;
        }
        return $produtos;
    }

    function getPedidoByFiltro($autorPedido,$idProduto,$qtdeProduto,$dataPedido,$comentPedido){
        $sql = "SELECT 
                    ped.ped_id
                    ,ped.cli_id
                    ,ped.ped_data
                    ,cli.cli_id
                    ,cli.cli_nome
                    ,prod.pro_id
                    ,prod.pro_nome
                    ,pp.ped_id
                    ,pp.proped_comentario
                    ,pp.proped_qtde
                    ,pp.pro_id
                FROM PEDIDO ped, CLIENTE cli, PRODUTO prod, PRODUTOPEDIDO pp
                WHERE ped.cli_id = cli.cli_id and
                       ped.ped_id = pp.ped_id and
                       pp.pro_id = prod.pro_id";
                       
                       if(isset($autorPedido) and $autorPedido != "") {
                         $sql.=  " AND cli.cli_id = '".$autorPedido."'";             
                       }
                       if(isset($idProduto) and $idProduto != "") {
                         $sql.=  " AND prod.pro_id = '".$idProduto."'";             
                       }
                       if(isset($qtdeProduto) and $qtdeProduto != "") {
                         $sql.=  " AND pp.proped_qtde = '".$qtdeProduto."'";             
                       }                                                                                                                                                             
         
        $sql.= " ORDER BY ped.ped_data, ped.cli_id";  

        $pedidos = array();
    
        $query = mysql_query($sql,$this->conexao);
        while($rows = mysql_fetch_array($query)) {
            
            $data = implode("/",array_reverse(explode("-",$rows['ped_data']))); 
            
            $pedido = new Pedido;
            $pedido->setPed_ID($rows['ped_id']);
            $pedido->setPed_Data($data);
            $pedido->setCli_ID($rows['cli_id']);  
            $pedido->setCli_Nome($rows['cli_nome']);  
            $pedido->setPro_Nome($rows['pro_nome']);  
            $pedido->setPro_Qtde($rows['proped_qtde']);  
            $pedido->setPed_Coment($rows['proped_comentario']);                             

            $pedidos[] = $pedido;
        }
        return $pedidos;
    }
    
}

?>
