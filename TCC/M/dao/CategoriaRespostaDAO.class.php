<?php

class CategoriaRespostaDAO {
    private $conexao;
    
    function __construct($conexao) {
        $this->conexao = $conexao;
    }
    
    function getCategoriaResposta_all(){
        $sql = "select 
        catresp_id, catresp_descricao, catresp_referencia, catresp_tabreferencia
        from CategoriaResposta ";

        $categorias = array();
  
        $query = mysql_query($sql,$this->conexao);
        while($rows = mysql_fetch_array($query)) {
            $categoria = new CategoriaResposta;
            $categoria->setCatResp_ID($rows['catresp_id']);
            $categoria->setCatResp_Descricao($rows['catresp_descricao']);
            $categoria->getCatResp_Referencia($rows['catresp_referencia']);
            $categoria->setCatResp_TabReferencia($rows['catresp_tabreferencia']);

            $categorias[] = $categoria;
        }
        return $categorias;
    }
       
    function getCategoriaResposta($catresp_id){
        $sql = "select 
        catresp_id, catresp_descricao, catresp_referencia, catresp_tabreferencia
        from CategoriaResposta 
        where catresp_id = ".$catresp_id;

        $query = mysql_query($sql,$this->conexao);
        while($rows = mysql_fetch_array($query)) {
            $categoria = new CategoriaResposta;
            $categoria->setCatResp_ID($rows['catresp_id']);
            $categoria->setCatResp_Descricao($rows['catresp_descricao']);
            $categoria->getCatResp_Referencia($rows['catresp_referencia']);
            $categoria->setCatResp_TabReferencia($rows['catresp_tabreferencia']);

        }
        return $categoria;
    }
    
}

?>
