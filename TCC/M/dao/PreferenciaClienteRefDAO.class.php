<?php

class PreferenciaClienteRefDAO {
    private $conexao;
    
    function __construct($conexao) {
        $this->conexao = $conexao;
    }
    
    function inserir($preferencia){
        
        $sql="
           INSERT INTO PreferenciaCliente_Referencia(
           cli_id, perg_id, pref_opcao, pref_comentario, pref_resp
           ) 
           VALUES(
                ".$preferencia->getCli_ID()."
               , ".$preferencia->getPerg_ID()."                
               , ".$preferencia->getPref_Opcao()."              
               , '".$preferencia->getPref_Comentario()."'
               , ".$preferencia->getPref_Resp()." 
           )";
     
     echo($sql);
        $query = mysql_query($sql,$this->conexao);
       
        return $query;
    }
    
    
    function alterar($preferencia){
        
        $sql="
           UPDATE PreferenciaCliente_Referencia SET
               , cli_id = ".$preferencia->getCli_ID()."
               , perg_id = ".$preferencia->getPerg_ID()."
               , pref_opcao = ".$preferencia->getPref_Opcao()."
               , pref_comentario = '".$preferencia->getPref_Comentario()."'
               , pref_resp = ".$preferencia->getPref_Resp()."
           WHERE 
               cli_id =  ".$preferencia->getCli_ID()."
               AND perg_id =  ".$preferencia->getPerg_ID()." ";
                   
        $query = mysql_query($sql,$this->conexao);

        return $query;        
    }
    
    function delete($preferencia){
        $sql =" delete from PreferenciaCliente_Referencia
                where 
                    cli_id =  ".$preferencia->getCli_ID()."
                    AND perg_id =  ".$preferencia->getPerg_ID()."
                    AND pref_opcao =  ".$preferencia->getPref_Opcao()." ";
        
        $query = mysql_query($sql,$this->conexao);

        return $query; 
    }
    
    function delete_cliente($preferencia){
        $sql =" delete from PreferenciaCliente_Referencia
                where 
                    cli_id =  ".$preferencia->getCli_ID();
        

        $query = mysql_query($sql,$this->conexao);

        return $query;      
    }
        
    function getPreferencias_all(){
        $sql = "select 
                cli_id, perg_id, pref_opcao, pref_comentario, pref_resp
                from PreferenciaCliente_Referencia ";

        $preferencias = array();
  
        $query = mysql_query($sql,$this->conexao);
        while($rows = mysql_fetch_array($query)) {
            $preferencia = new PreferenciaCliente;
            $preferencia->setCli_ID($rows['cli_id']);
            $preferencia->setPerg_ID($rows['perg_id']);
            $preferencia->setPref_Opcao($rows['pref_opcao']);
            $preferencia->setPref_Comentario($rows['pref_comentario']); 
            $preferencia->setPref_Resp($rows['pref_resp']); 

            $preferencias[] = $preferencia;
        }
        return $preferencia;
    }
       
    function getPreferencias_Filtro($cli_id, $perg_id, $pref_opcao){
       $where = " WHERE 1 ";
        
        if(isset($cli_id) and $cli_id != "") {
            $where.=  " AND pc.cli_id = ".$cli_id;             
        }
        
        if(isset($perg_id) and $perg_id != "") {
            $where.=  " AND pc.perg_id = ".$perg_id;             
        }
        
        if(isset($pref_opcao) and $pref_opcao != "") {
            $where.=  " AND pc.pref_opcao = ".$pref_opcao;             
        }    
        
        $sql = " SELECT 
                    pc.cli_id, 
                    pc.perg_id, 
                    p.perg_descricao,
                    p.catresp_id,
                    pc.pref_opcao, 
                    pc.pref_comentario,
                    pc.pref_resp,
                    cat.catresp_tabReferencia
                FROM PreferenciaCliente_Referencia pc
                INNER JOIN pergunta p ON p.perg_id = pc.perg_id 
                INNER JOIN categoriaresposta cat on p.catresp_id = cat.catresp_id ";
        $sql.= $where;
        
        $sql.= " UNION 
                SELECT 
                    null, 
                    p.perg_id, 
                    p.perg_descricao, 
                    p.catresp_id, 
                    1 as pref_opcao, 
                    null,
                    null ,
                    cat.catresp_tabReferencia
                FROM pergunta p
                INNER JOIN categoriaresposta cat ON cat.catresp_id = p.catresp_id
                WHERE p.perg_id not in (
                    SELECT DISTINCT
                        pc.perg_id 
                    FROM PreferenciaCliente_Referencia pc
                    WHERE pc.cli_id = ".$cli_id."
                )
                and cat.catresp_referencia = 1
                ORDER BY perg_id, pref_opcao";
        
        $preferencias = array();

        $query = mysql_query($sql,$this->conexao);

        while($rows = mysql_fetch_array($query)) {
            $preferencia = new PreferenciaClienteRef;
            $preferencia->setCli_ID($rows['cli_id']);
            $preferencia->setPerg_ID($rows['perg_id']);
            $preferencia->setPerg_Descricao($rows['perg_descricao']); 
            $preferencia->setCatResp_ID($rows['catresp_id']); 
            $preferencia->setPref_Opcao($rows['pref_opcao']);
            $preferencia->setPref_Comentario($rows['pref_comentario']); 
            $preferencia->setPref_Resp($rows['pref_resp']);
            $preferencia->setCatresp_tabReferencia($rows['catresp_tabReferencia']);

            $preferencias[] = $preferencia;  
        }
       
       
       foreach($preferencias as $v){
             if($v->getCatresp_tabReferencia() == 'funcionario'){
                //TODO: Chamar a pesquisa direto da classe funcionario 
                 $sql = "select func_nome from funcionario where func_id = ".$v->getPref_Resp();
                 $query = mysql_query($sql,$this->conexao); 
                 
                while($rows = mysql_fetch_array($query)) {
                    $v->setResp_Valor($rows['func_nome']);
                }
             }
        }
        
        
        return $preferencias;
    }
          
}

?>
