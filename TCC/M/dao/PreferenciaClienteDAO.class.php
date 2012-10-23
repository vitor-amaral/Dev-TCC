<?php

class PreferenciaClienteDAO {
    private $conexao;
    
    function __construct($conexao) {
        $this->conexao = $conexao;
    }
    
    function inserir($preferencia){
        
        $sql="
           INSERT INTO PreferenciaCliente(
           cli_id, perg_id, resp_id, pref_opcao, pref_comentario
           ) 
           VALUES(
               , ".$preferencia->getCli_ID()."
               , ".$preferencia->getPerg_ID()."
               , ".$preferencia->getResp_ID()."  
               , ".$preferencia->getPref_Opcao()."              
               , '".$preferencia->getPref_Comentario()."'
           )";
      
        $query = mysql_query($sql,$this->conexao);
       
        return $query;
    }
    
    
    function alterar($preferencia){
        
        $sql="
           UPDATE PreferenciaCliente SET
               , cli_id = ".$preferencia->getCli_ID()."
               , perg_id = ".$preferencia->getPerg_ID()."
               , resp_id = ".$preferencia->getResp_ID()."
               , pref_opcao = ".$preferencia->getPref_Opcao()."
               , pref_comentario = '".$preferencia->getPref_Comentario()."'
           WHERE 
               cli_id =  ".$preferencia->getCli_ID()."
               AND perg_id =  ".$preferencia->getPerg_ID()." ";
                   
        $query = mysql_query($sql,$this->conexao);

        return $query;        
    }
    
    function delete($preferencia){
        $sql =" delete from PreferenciaCliente
                where 
                    cli_id =  ".$preferencia->getCli_ID()."
                    AND perg_id =  ".$preferencia->getPerg_ID()."
                    AND pref_opcao =  ".$preferencia->getPref_Opcao()." ";
        
        $query = mysql_query($sql,$this->conexao);

        return $query; 
    }
        
    function getPreferencias_all(){
        $sql = "select 
                cli_id, perg_id, resp_id, pref_opcao, pref_comentario
                from PreferenciaCliente ";

        $preferencias = array();
  
        $query = mysql_query($sql,$this->conexao);
        while($rows = mysql_fetch_array($query)) {
            $preferencia = new PreferenciaCliente;
            $preferencia->setCli_ID($rows['cli_id']);
            $preferencia->setPerg_ID($rows['perg_id']);
            $preferencia->setResp_ID($rows['resp_id']);
            $preferencia->setPref_Opcao($rows['pref_opcao']);
            $preferencia->setPref_Comentario($rows['pref_comentario']); 

            $preferencias[] = $preferencia;
        }
        return $preferencia;
    }
       
    function getPreferencias_Filtro($cli_id, $perg_id, $resp_id, $pref_opcao){
       $where = " WHERE 1 ";
        
        if(isset($cli_id) and $cli_id != "") {
            $where.=  " AND pc.cli_id = ".$cli_id;             
        }
        
        if(isset($perg_id) and $perg_id != "") {
            $where.=  " AND pc.perg_id = ".$perg_id;             
        }

        if(isset($resp_id) and $resp_id != "") {
            $where.=  " AND pc.resp_id = ".$resp_id;             
        }
        
        if(isset($pref_opcao) and $pref_opcao != "") {
            $where.=  " AND pc.pref_opcao = ".$pref_opcao;             
        }    
        
        $sql = " SELECT 
                    pc.cli_id, 
                    pc.perg_id, 
                    p.perg_descricao,
                    p.catresp_id,
                    pc.resp_id, 
                    r.resp_valor,
                    pc.pref_opcao, 
                    pc.pref_comentario
                FROM preferenciaCliente pc
                INNER JOIN pergunta p ON p.perg_id = pc.perg_id
                INNER JOIN resposta r ON r.resp_id = pc.resp_id ";
        $sql.= $where;
        
        $sql.= " UNION 
                SELECT 
                    null, 
                    perg_id, 
                    perg_descricao, 
                    catresp_id, 
                    null, 
                    null, 
                    1 as pref_opcao, 
                    null
                FROM pergunta p
                WHERE p.perg_id not in (
                    SELECT DISTINCT
                        pc.perg_id 
                    FROM preferenciaCliente pc
                    INNER JOIN pergunta p ON p.perg_id = pc.perg_id
                    INNER JOIN resposta r ON r.resp_id = pc.resp_id";
        $sql.= $where; 
         
        $sql.= ") ORDER BY perg_id, pref_opcao";        

        $preferencias = array();
  
        $query = mysql_query($sql,$this->conexao);
        while($rows = mysql_fetch_array($query)) {
            $preferencia = new PreferenciaCliente;
            $preferencia->setCli_ID($rows['cli_id']);
            $preferencia->setPerg_ID($rows['perg_id']);
            $preferencia->setPerg_Descricao($rows['perg_descricao']); 
            $preferencia->setCatResp_ID($rows['catresp_id']); 
            $preferencia->setResp_ID($rows['resp_id']);
            $preferencia->setResp_Valor($rows['resp_valor']); 
            $preferencia->setPref_Opcao($rows['pref_opcao']);
            $preferencia->setPref_Comentario($rows['pref_comentario']); 

            $preferencias[] = $preferencia;  
        }
        return $preferencias;
    }
          
}

?>
