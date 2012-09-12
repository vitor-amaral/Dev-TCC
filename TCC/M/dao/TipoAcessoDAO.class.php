<?php

class TipoAcessoDAO {
    private $conexao;
    
    function __construct($conexao) {
        $this->conexao = $conexao;
    }
    
    function inserir($tipo){
        $sql="
           insert into tipoacesso
                    (tpa_tipo) 
             values 
                ('".$tipo->getTipoAcesso_Tipo()."')  
             ";
      
        $query = mysql_query($sql,$this->conexao);
       
        return $query;
    }
    
    
    function alterar($tipo){
        $sql="
            update tipoacesso set tpa_tipo ='".$tipo->getTipoAcesso_Tipo()."' 
                where tpa_id = ".$tipo->getTipoAcesso_ID()." ";
        
        $query = mysql_query($sql,$this->conexao);

        return $query;
       
    }
    
    function delete($tipo){
        $sql =" delete from tipoacesso where tpa_id = ".$tipo->getTipoAcesso_ID()." ";
        
        $query = mysql_query($sql,$this->conexao);

        return $query;
    }
    
    function getTipoAcesso_all(){
        $sql = "select tpa_id, tpa_tipo from tipoacesso order by tpa_tipo";

        $tipos = array();
  
        $query = mysql_query($sql,$this->conexao);
        while($rows = mysql_fetch_array($query)) {
            $tipo = new TipoAcesso;
            $tipo->setTipoAcesso_ID($rows['tpa_id']);
            $tipo->setTipoAcesso_Tipo($rows['tpa_tipo']);

            $tipos[] = $tipo;
        }
        return $tipos;
    }
       
    function getTipoAcesso($tpa_id){
        $sql = "select tpa_id, tpa_tipo from tipoacesso where tpa_id = ".$tpa_id;

        $query = mysql_query($sql,$this->conexao);
        while($rows = mysql_fetch_array($query)) {
            $tipo = new TipoAcesso;
            $tipo->setTipoAcesso_ID($rows['tpa_id']);
            $tipo->setTipoAcesso_Tipos($rows['tpa_tipos']); 

        }
        return $tipo;
    }
    
    function getTipoAcessoByTipo($tpa_tipo){
        
        $sql = "               
            select tpa_id, tpa_tipo from tipoacesso 
                where tpa_tipo like '%$tpa_tipo%' 
            order by tpa_tipo";

        $query = mysql_query($sql,$this->conexao);
        while($rows = mysql_fetch_array($query)) {
            $tipo = new TipoAcesso;
            $tipo->setTipoAcesso_ID($rows['tpa_id']);
            $tipo->setTipoAcesso_Tipo($rows['tpa_tipo']); 
            
            $tipos[] = $tipo;     

        }
        return $tipos;
    }

}

?>
