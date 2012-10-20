<?php

class CategoriaReclamacaoDAO {
    private $conexao;
    
    function __construct($conexao) {
        $this->conexao = $conexao;
    }
    
    function inserir($catReclamacao){
        $sql="
           insert into categoriareclamacao
                    (cat_descricao) 
             values 
                ('".$catReclamacao->getCatReclamacao_Desc()."')  
             ";
      
        $query = mysql_query($sql,$this->conexao);
       
        return $query;
    }
    
    
    function alterar($catReclamacao){
        $sql="
            update categoriareclamacao set  cat_descricao ='".$catReclamacao->getCatReclamacao_Desc()."' 
                where cat_id = ".$catReclamacao->getCatReclamacao_ID()." ";
        
        $query = mysql_query($sql,$this->conexao);

        return $query;
       
    }
    
    function delete($catReclamacao){
        $sql =" delete from categoriareclamacao where cat_id = ".$catReclamacao->getCatReclamacao_ID()." ";
        
        $query = mysql_query($sql,$this->conexao);

        return $query;
    }
    
    function getCatReclamacoes(){
        $sql = "SELECT
					cat_id
					,cat_descricao					
				FROM categoriareclamacao 
				ORDER BY cat_descricao";

        $categorias = array();
  
        $query = mysql_query($sql,$this->conexao);
        while($rows = mysql_fetch_array($query)) {
            $catReclamacao = new CategoriaReclamacao;
            $catReclamacao->setCatReclamacao_ID($rows['cat_id']);
            $catReclamacao->setCatReclamacao_Desc($rows['cat_descricao']); 

            $categorias[] = $catReclamacao;
        }
        return $categorias;
    }
       
    function getCatReclamacao($cat_id){
        $sql = "SELECT
					cat_id
					,cat_descricao
				FROM categoriareclamacao 
				WHERE cat_id = ".$cat_id;

        $query = mysql_query($sql,$this->conexao);
        while($rows = mysql_fetch_array($query)) {
            $catReclamacao = new CategoriaReclamacao;
            $catReclamacao->setCatReclamacao_ID($rows['cat_id']);
            $catReclamacao->setCatReclamacao_Desc($rows['cat_descricao']);  

        }
        return $catReclamacao;
    }
    
    function getCatReclamacaoByDesc($cat_desc){
        
        $sql = "SELECT 
					cat_id
					,cat_descricao
				FROM categoriareclamacao 
                WHERE cat_descricao like '%$cat_desc%' 
				ORDER BY cat_descricao ";

        $query = mysql_query($sql,$this->conexao);
        while($rows = mysql_fetch_array($query)) {
            $catReclamacao = new CategoriaReclamacao;
            $catReclamacao->setCatReclamacao_ID($rows['cat_id']);
            $catReclamacao->setCatReclamacao_Desc($rows['cat_descricao']);
            
            $categorias[] = $catReclamacao;     

        }
        return $categorias;
    }

}

?>
