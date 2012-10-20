<?php

class ReclamacaoDAO {
    private $conexao;
    
    function __construct($conexao) {
        $this->conexao = $conexao;
    }
    
    function inserir($reclamacao){
        $sql="
           insert into reclamacao
                    (
                    rec_descricao,
                    rec_titulo,
                    rec_status,
                    cat_id,
                    cli_id                    
                    ) 
             values 
                (
                '".$reclamacao->getReclamacao_desc()."',
                '".$reclamacao->getReclamacao_titulo()."',
                '".$reclamacao->getReclamacao_status()."',
                '".$reclamacao->getCategoria_id()."',
                '".$reclamacao->getCliente_id()."'           
                )  
             ";
      
        $query = mysql_query($sql,$this->conexao);
       
        return $query;
    }
    
    
    function alterar($reclamacao){
        $sql="
            update reclamacao set  
                rec_descricao ='".$reclamacao->getReclamacao_desc()."',
                rec_titulo ='".$reclamacao->getReclamacao_titulo()."',
                rec_status ='".$reclamacao->getReclamacao_status()."',
                cat_id ='".$reclamacao->getCategoria_id()."',
                cli_id ='".$reclamacao->getCliente_id()."' 
                    where 
                        rec_id = ".$reclamacao->getReclamacao_id()."                                                
                    ";
        
        $query = mysql_query($sql,$this->conexao);

        return $query;
       
    }
            
    
    function delete($reclamacao){
        $sql =" delete from reclamacao where rec_id = ".$reclamacao->getReclamacao_ID()." ";
        
        $query = mysql_query($sql,$this->conexao);

        return $query;
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
       
    function getReclamacao($rec_id){
        $sql = "SELECT
					rec_id
					,rec_descricao
                    ,rec_titulo
                    ,rec_status
                    ,cat_id
                    ,cli_id
				FROM reclamacao 
				WHERE rec_id = ".$rec_id;

        $query = mysql_query($sql,$this->conexao);
        while($rows = mysql_fetch_array($query)) {
            $reclamacao = new Reclamacao;
            $reclamacao->setReclamacao_id($rows['rec_id']);
            $reclamacao->setReclamacao_desc($rows['rec_descricao']); 
            $reclamacao->setReclamacao_titulo($rows['rec_titulo']);
            $reclamacao->setReclamacao_status($rows['rec_status']);
            $reclamacao->setCategoria_id($rows['cat_id']);
            $reclamacao->setCliente_id($rows['cli_id']); 

        }
        return $reclamacao;      
    }
    
     function getReclamacoesByFiltro($rec_descricao,$rec_titulo,$rec_status,$cliente_id,$categoria_id){
       
        $sql = "SELECT  
                   r.rec_id              
                   , r.rec_descricao
                   , r.rec_titulo
                   , r.rec_status
                   , r.cli_id
                   , r.cat_id
                   , cli.cli_nome
                   , cat.cat_descricao                   
                FROM RECLAMACAO r     
                INNER JOIN CLIENTE cli ON cli.cli_id = r.cli_id
                INNER JOIN CATEGORIARECLAMACAO cat ON cat.cat_id = r.cat_id
                WHERE 1 ";
        
        if(isset($rec_descricao) and $rec_descricao != "") {
            $sql.=  " AND r.rec_descricao like '%".$rec_descricao."%'";             
        }
        
        if(isset($rec_titulo) and $rec_titulo != "") {
            $sql.=  " AND r.rec_titulo like '%".$rec_titulo."%'";             
        }
        
        if(isset($rec_status) and $rec_status != "") {
            $sql.=  " AND r.rec_status = '".$rec_status."'";             
        }
        
        if(isset($rec_autor) and $rec_autor != "") {
            $sql.=  " AND cli.cli_id = '".$rec_autor."'";             
        }                                                                   
        
        if(isset($cat_reclamacao) and $cat_reclamacao != "") {
            $sql.=  " AND cat.cat_id = ".$cat_reclamacao;             
        }
                                                                   
        $sql.= " ORDER BY cli.cli_nome ";        

        $query = mysql_query($sql,$this->conexao);
        while($rows = mysql_fetch_array($query)) {
            $reclamacao = new Reclamacao;
            $reclamacao->setReclamacao_id($rows['rec_id']);
            $reclamacao->setReclamacao_desc($rows['rec_descricao']);
            $reclamacao->setReclamacao_titulo($rows['rec_titulo']);  
            $reclamacao->setReclamacao_status($rows['rec_status']);
            $reclamacao->setCategoria_id($rows['cat_id']); 
            $reclamacao->setCliente_id($rows['cli_id']); 
            $reclamacao->setCategoria_desc($rows['cat_descricao']);                                     
            $reclamacao->setCliente_nome($rows['cli_nome']);                                     
            
            $reclamacoes[] = $reclamacao;     

        }
        return $reclamacoes;
    }

}

?>
