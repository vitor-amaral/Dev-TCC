<?php

class PerguntaDAO {
    private $conexao;
    
    function __construct($conexao) {
        $this->conexao = $conexao;
    }
    
    function getPerguntas_all(){
        $sql = "select 
        perg_id, perg_descricao, catresp_id
        from Pergunta ";

        $perguntas = array();
  
        $query = mysql_query($sql,$this->conexao);
        while($rows = mysql_fetch_array($query)) {
            $pergunta = new Pergunta;
            $pergunta->setPerg_ID($rows['perg_id']);
            $pergunta->setPerg_Descricao($rows['perg_descricao']);
            $pergunta->setCatResp_ID($rows['catresp_id']); 

            $perguntas[] = $pergunta;
        }
        return $perguntas;
    }
       
    function getPergunta($perg_id){
        
        $sql = "select 
        perg_id, perg_descricao, catresp_id
        from Pergunta 
        where perg_id = ".$perg_id;
 
        $query = mysql_query($sql,$this->conexao);
        while($rows = mysql_fetch_array($query)) {
            $pergunta = new Pergunta;
            $pergunta->setPerg_ID($rows['perg_id']);
            $pergunta->setPerg_Descricao($rows['perg_descricao']);
            $pergunta->setCatResp_ID($rows['catresp_id']); 
        }
        return $pergunta;
    }

    function getPerguntabyCategoria($catresp_id){
        $sql = "select 
        perg_id, perg_descricao, catresp_id
        from Pergunta 
        where catresp_id = ".$catresp_id; 
 
        $perguntas = array();
  
        $query = mysql_query($sql,$this->conexao);
        while($rows = mysql_fetch_array($query)) {
            $pergunta = new Pergunta;
            $pergunta->setPerg_ID($rows['perg_id']);
            $pergunta->setPerg_Descricao($rows['perg_descricao']);
            $pergunta->setCatResp_ID($rows['catresp_id']); 

            $perguntas[] = $pergunta;
        }
        return $perguntas;
    }    
    
}

?>
