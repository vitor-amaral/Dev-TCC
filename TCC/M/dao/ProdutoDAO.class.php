<?php

class ProdutoDAO {
    private $conexao;
    
    function __construct($conexao) {
        $this->conexao = $conexao;
    }
    
    function inserir($produto){
        
        $sql="
           INSERT INTO produto(
               pro_nome
               ,pro_preco
               ,pro_tipo
           ) 
           VALUES(
               '".$produto->getPro_Nome()."'
               , ".$produto->getPro_Preco()."
               , '".$produto->getPro_Tipo()."'
           )";
      
        $query = mysql_query($sql,$this->conexao);
       
        return $query;
    }
    
    
    function alterar($produto){
            
        $sql="
           UPDATE produto SET
               pro_nome = '".$produto->getPro_Nome()."'
               , pro_preco = '".$produto->getPro_Preco()."'
               , pro_tipo = '".$produto->getPro_Tipo()."'
           WHERE 
               pro_id =  '".$produto->getPro_ID()."' ";
                   
        $query = mysql_query($sql,$this->conexao);
                
        return $query;        
    }
    
    function delete($produto){
        $sql =" delete from produto where pro_id = ".$produto->getPro_ID()." ";
        
        $query = mysql_query($sql,$this->conexao);

        return $query;
    }
    
    function getProdutos(){
        $sql = "SELECT 
					pro_id
					,pro_nome
					,pro_preco
					,pro_tipo
				FROM produto 
				ORDER BY pro_nome";

        $produtos = array();
	
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
       
    function getProduto($pro_id){
        $sql = "SELECT
					pro_id
					,pro_nome
					,pro_preco
					,pro_tipo
				FROM produto 
				WHERE pro_id = ".$pro_id;
				
        $query = mysql_query($sql,$this->conexao);
        while($rows = mysql_fetch_array($query)) {
            $produto = new Produto;
            $produto->setPro_ID($rows['pro_id']);
            $produto->setPro_Nome($rows['pro_nome']);
            $produto->setPro_Preco($rows['pro_preco']);  
            $produto->setPro_Tipo($rows['pro_tipo']); 
        }
        return $produto;
    }
    
    function getProdutoByFiltro($pro_nome,$pro_preco,$pro_tipo){
        $sql = "SELECT 
                    pro_nome
                    ,pro_preco
                    ,pro_tipo
                    ,pro_id                    
                FROM PRODUTO p 
                WHERE 1";
                
         if(isset($pro_nome) and $pro_nome != "") {
            $sql.=  " AND p.pro_nome like '%".$pro_nome."%'";             
        }
        
        if(isset($pro_preco) and $pro_preco != "") {
            $sql.=  " AND p.pro_preco = '".$pro_preco."'";             
        }                
        
        if(isset($pro_tipo) and $pro_tipo != "") {
            $sql.=  " AND p.pro_tipo = '".$pro_tipo."'";             
        }                
         
        $sql.= " ORDER BY p.pro_nome ";   
                   
        $produtos = array();
           
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
    
    function getProdutoByNome($pro_nome){
       
        $sql = "
            select * from produto
                where pro_nome like '%$pro_nome%' 
            order by pro_nome ";

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

}

?>
