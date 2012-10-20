
<?php
    class Conexao{
        
        function getConexao(){
            $con = mysql_connect("localhost","root","") or die (mysql_error());
                                
            $banco = mysql_select_db("sc_tccprofiletracer", $con);
            return $con;
        }
    }
?>

