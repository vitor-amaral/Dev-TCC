<?php
require_once("SmartyConf.php");                 
//Consultas SQL

$con = mysql_connect("localhost","root","");
mysql_select_db("sc_tccprofiletracer", $con);   

if(isset($_REQUEST['alimento'])){   
    $pro_id = $_REQUEST['alimento'];
    $smarty->assign("alimento",$pro_id);
}
if(isset($_REQUEST['bebida'])){   
    $pro_id = $_REQUEST['bebida'];
    $smarty->assign("bebida",$pro_id);
}

if(1 == 1){
$title = "Consumo por Cliente";        
$vertical = "Produto";
    
        $sql="
           select p.cli_id,
              c.cli_nome,     
              pp.pro_id, 
              pr.pro_nome,
              sum(pp.proped_qtde) as qtde_produtos
               from pedido p
               inner join produtopedido pp on (pp.ped_id = p.ped_id)
               inner join cliente c on p.cli_id = c.cli_id
               inner join produto pr on pp.pro_id = pr.pro_id
               where
                  pp.pro_id =".$pro_id."
               group by 
                   cli_id, 
                   pp.pro_id";
                    
        $produtos = array();
        $clientes = array();
  
        $query = mysql_query($sql,$con);        
        while($rows = mysql_fetch_array($query)) {
            
            $cliente = $rows['cli_nome'];
            $produto = $rows['qtde_produtos'];                                            

            $clientes[] = $cliente; 
            $produtos[] = (int)$produto;            
        }
}        

// Include the library
        require_once('highcharts.php');      
        
        // Convert your data arrays by doing:                
        
        $prod = new HighchartsArray($produtos);
        $cli = new HighchartsArray($clientes);
          
        // Create an option array for your graph.
        // Refers to the official Highcharts reference page for a list of the available options.
        // The page is available at:
        // http://www.highcharts.com/ref/
        $options = array(
                         'chart' => array(
                                          'renderTo' => 'my_graph',
                                          'defaultSeriesType' => 'column'                                            
                                          ),
                         'title' => array(
                                          'text' => $title
                                          ),
                         'xAxis' => array(
                                          'categories' => $cli,
                                          'title' => 'clientes'
                                          ),
                         'yAxis' => array(
                                          'title' => array(
                                                           'text' => 'produtos'
                                                           )
                                          ),
                         'series' => array(
                                           array(
                                                 'name' => 'Produtos',
                                                 'data' => $prod,
                                                 'dataLabels' => array(
                                                    'enabled' => 'true',
                                                    'rotation' => '-90',
                                                    'color' => '#FFFFFF',
                                                    'align' => 'right',
                                                    'x' => '4',
                                                    'y' => '10',
                                                    'style' => array(
                                                        'fontSize' => '13px',
                                                        'fontFamily' => 'Verdana, sans-serif'
                                                    )             
                                                    
                                                 )                
                                                 )
                                           )
                         );

        // Generate your chart
        $chart = new Highcharts('my_graph', $options);

       // Enjoy your new chart
        echo '<script src="../V/js/jquery.min.js" type="text/javascript"></script>';
        echo '<script src="../V/js/highcharts.js" type="text/javascript"></script>';
       
        echo $chart->getCode();
        echo '<div id="my_graph" width="500" height="300"> </div>';
?>