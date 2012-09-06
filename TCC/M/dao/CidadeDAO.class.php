<?php

class CidadeDAO {
    private $conexao;
    
    function __construct($conexao) {
        $this->conexao = $conexao;
    }
    
    function inserir($cidade){
        $sql="
           insert into cidade
                    (cid_nome) 
             values 
                ('".$cidade->getCidade_Nome()."')  
             ";
      
        $query = mysql_query($sql,$this->conexao);
       
        return $query;
    }
    
    
    function alterar($cidade){
        $sql="
            update cidade set  cid_nome ='".$cidade->getCidade_Nome()."' 
                where cid_id = ".$cidade->getCidade_ID()." ";
        
        $query = mysql_query($sql,$this->conexao);

        return $query;
       
    }
    
    function delete($cidade){
        $sql =" delete from cidade where cid_id = ".$cidade->getCidade_ID()." ";
        
        $query = mysql_query($sql,$this->conexao);

        return $query;
    }
    
    function getCidades(){
        $sql = "select * from cidade order by uf_sigla, cid_nome";

        $cidades = array();
;  
        $query = mysql_query($sql,$this->conexao);
        while($rows = mysql_fetch_array($query)) {
            $cidade = new Cidade;
            $cidade->setCidade_ID($rows['cid_id']);
            $cidade->setCidade_Nome($rows['cid_nome']);
            $cidade->setUf_Sigla($rows['uf_sigla']);  

            $cidades[] = $cidade;
        }
        return $cidades;
    }
       
    function getCidade($cid_id){
        $sql = "select * from cidade where cid_id = ".$cid_id;

        $query = mysql_query($sql,$this->conexao);
        while($rows = mysql_fetch_array($query)) {
            $cidade = new Cidade;
            $cidade->setCidade_ID($rows['cid_id']);
            $cidade->setCidade_Nome($rows['cid_nome']);
            $cidade->setUf_Sigla($rows['uf_sigla']);  
            
           // $cidades[] = $cidade;     

        }
        return $cidade;
    }
    
    function getCidadeByNome($cid_nome){
        //$sql = "select * from cidade where cid_nome = '".$cid_nome."'";
        
        $sql = "
            select * from cidade 
                where cid_nome like '%$cid_nome%' 
            order by cid_nome ";

        $query = mysql_query($sql,$this->conexao);
        while($rows = mysql_fetch_array($query)) {
            $cidade = new Cidade;
            $cidade->setCidade_ID($rows['cid_id']);
            $cidade->setCidade_Nome($rows['cid_nome']);
            $cidade->setUf_Sigla($rows['uf_sigla']); 
            
            $cidades[] = $cidade;     

        }
        return $cidades;
    }

}

?>
