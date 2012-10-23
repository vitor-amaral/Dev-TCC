<?php

class RespostaDAO {
    private $conexao;
    
    function __construct($conexao) {
        $this->conexao = $conexao;
    }
    
    function getRespostas_all(){
        $sql = "select 
        resp_id, resp_valor, catresp_id
        from Resposta ";

        $respostas = array();
  
        $query = mysql_query($sql,$this->conexao);
        while($rows = mysql_fetch_array($query)) {
            $resposta = new Resposta;
            $resposta->setResp_ID($rows['resp_id']);
            $resposta->setResp_Valor($rows['resp_valor']);
            $resposta->setCatResp_ID($rows['catresp_id']); 

            $respostas[] = $resposta;
        }
        return $respostas;
    }
       
    function getResposta($resp_id){
        $sql = "select 
        resp_id, resp_valor, catresp_id
        from Resposta 
        where resp_id = ".$resp_id; 
 
        $query = mysql_query($sql,$this->conexao);
        while($rows = mysql_fetch_array($query)) {
            $resposta = new Resposta;
            $resposta->setResp_ID($rows['resp_id']);
            $resposta->setResp_Valor($rows['resp_valor']);
            $resposta->setCatResp_ID($rows['catresp_id']); 
        }
        return $resposta;
    }

    function getRespostabyCategoria($catresp_id){
        $sql = "select 
        resp_id, resp_valor, catresp_id
        from Resposta 
        where catresp_id = ".$catresp_id; 
 
        $respostas = array();
  
        $query = mysql_query($sql,$this->conexao);
        while($rows = mysql_fetch_array($query)) {
            $resposta = new Resposta;
            $resposta->setResp_ID($rows['resp_id']);
            $resposta->setResp_Valor($rows['resp_valor']);
            $resposta->setCatResp_ID($rows['catresp_id']); 

            $respostas[] = $resposta;
        }
        return $respostas;
    }    
    
}

?>
