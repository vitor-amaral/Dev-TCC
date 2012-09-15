<?php

class ProdutoPedidoDAO {
    private $conexao;
    
    function __construct($conexao) {
        $this->conexao = $conexao;
    }
    
    function inserir($produtopedido){
        
        $sql="
           INSERT INTO produtopedido(
               proped_qtde
               ,proped_comentario
           ) 
           VALUES(
               ".$produtopedido->getProped_Qtde()."
               , '".$produtopedido->getProped_Comentario()."'
           )";
      
        $query = mysql_query($sql,$this->conexao);
       
        return $query;
    }
    
    
    function alterar($produtopedido){
        
        $sql="
           UPDATE produtopedido SET
               proped_qtde = ".$produtopedido->getProped_Qtde()."
               , produtopedido = '".$produtopedido->getProped_Comentario()."'
           WHERE 
               pro_id =  ".$produtopedido->getPro_ID()."
		   AND ped_id =  ".$produtopedido->getPed_ID()." ";
                   
        $query = mysql_query($sql,$this->conexao);

        return $query;        
    }
    
    function delete($produtopedido){
        $sql =" delete from produtopedido where pro_id = ".$produtopedido->getPro_ID()." 
											and ped_id = ".$produtopedido->getPed_ID();
        
        $query = mysql_query($sql,$this->conexao);

        return $query;
    }
    
    function getProdutoPedidos(){
        $sql = "select * from produtopedido order by pro_id, ped_id";

        $produtopedidos = array();
	
        $query = mysql_query($sql,$this->conexao);
        while($rows = mysql_fetch_array($query)) {
            $produtopedido = new Produtopedido;
            $produtopedido->setPro_ID($rows['pro_id']);
            $produtopedido->setPed_ID($rows['ped_id']);
            $produtopedido->setProped_Qtde($rows['proped_qtde']);  
            $produtopedido->setProped_Comentario($rows['proped_comentario']); 

            $produtopedidos[] = $produtopedido;
        }
        return $produtopedidos;
    }
       
    function getProdutopedido($func_id){
        $sql = "select * from produtopedido where pro_id = ".$pro_id."
											  and ped_id = ".$ped_ed;
        $query = mysql_query($sql,$this->conexao);
        while($rows = mysql_fetch_array($query)) {
            $produtopedido = new Produtopedido;
            $produtopedido->setPro_ID($rows['pro_id']);
            $produtopedido->setPed_ID($rows['ped_id']);
            $produtopedido->setProped_Qtde($rows['proped_qtde']);  
            $produtopedido->setProped_Comentario($rows['proped_comentario']); 
        }
        return $produtopedido;
    }
}

?>
