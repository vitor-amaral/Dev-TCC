<?php /* Smarty version 2.6.26, created on 2012-11-14 02:03:03
         compiled from listaFrequencia.html */ ?>
 <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "menu.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>           
<html>
    <?php echo '
    <head>
        <title>Frequencia</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="../V/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="../V/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../V/css/processo.css">
        
        <link rel="stylesheet" type="text/css" href="../V/css/fullcalendar.css">  
        
        <script type="text/javascript" language="JavaScript" src="../V/js/bootstrap.js"></script>
        
        <script type="text/javascript" language="JavaScript" src="../V/js/jquery.js"></script> 
        <script type="text/javascript" language="JavaScript" src="../V/js/jquery-ui-1.8.23.custom.min.js"></script> 
        <script type="text/javascript" language="JavaScript" src="../V/js/fullcalendar.js"></script> 

        <script type=\'text/javascript\'>

           /* function addTestEvents() {

                    var date = new Date();
                    var d = date.getDate();
                    var m = date.getMonth();
                    var y = date.getFullYear();
                   
                        $(\'#calendar\').fullCalendar(\'renderEvent\', 
                        {
                                    title : \'my pickup slot\',
                                    start : new Date(y,m,d, 12, 30),
                                    end   : new Date(y,m,d, 13, 00),
                        });
                   

                   
            }  */
           
	        $(document).ready(function() {
	            

                
	            var date = new Date();
                var d = date.getDate();
                var m = date.getMonth();
                var y = date.getFullYear();
                
                

              
                
		        /* initialize the external events
		        -----------------------------------------------------------------*/
	        
		        $(\'#external-events div.external-event\').each(function() {
		        
			        // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
			        // it doesn\'t need to have a start or end
			        var eventObject = {
				        title: $.trim($(this).text()) // use the element\'s text as the event title
			        };
			        
			        // store the Event Object in the DOM element so we can get to it later
			        $(this).data(\'eventObject\', eventObject);
			        
			        // make the event draggable using jQuery UI
			        $(this).draggable({
				        zIndex: 999,
				        revert: true,      // will cause the event to go back to its
				        revertDuration: 0  //  original position after the drag
			        });
			        
		        });
	        
	        
		        /* initialize the calendar
		        -----------------------------------------------------------------*/
		        
		        $(\'#calendar\').fullCalendar({
			        header: {
				        left: \'prev,next today\',
				        center: \'title\',
				        right: \'month,agendaWeek,agendaDay\'
			        },
			        editable: true,
			        droppable: true, // this allows things to be dropped onto the calendar !!!
                    
                    events: "b.php",  
                                                          
			        drop: function(date, allDay) { // this function is called when something is dropped
			        
				        // retrieve the dropped element\'s stored Event Object
				        var originalEventObject = $(this).data(\'eventObject\');
				        
				        // we need to copy it, so that multiple events don\'t have a reference to the same object
				        var copiedEventObject = $.extend({}, originalEventObject);
				        
				        // assign it the date that was reported
				        copiedEventObject.start = date;
				        copiedEventObject.allDay = allDay;
				        
				        // render the event on the calendar
				        // the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
				        $(\'#calendar\').fullCalendar(\'renderEvent\', copiedEventObject, true);
				        
				        // is the "remove after drop" checkbox checked?
				        if ($(\'#drop-remove\').is(\':checked\')) {
					        // if so, remove the element from the "Draggable Events" list
					        $(this).remove();                 
				        }
                        
                      // Trocar     por ajax que salva no bd.
                      // alert(originalEventObject.title + " Adicionado em " + date + " with allDay=" + allDay);
				        
			        }
		        });
		        
 
	        });

        </script>
    <style type=\'text/css\'>
		    
	    #external-events {
		    float: left;
		    width: 80px;
		    padding: 0 10px;
		    border: 1px solid #ccc;
		    background: #eee;
		    text-align: left;
		    }
		    
	    
	    .external-event { /* try to mimick the look of a real event */
		    margin: 10px 0;
		    padding: 2px 4px;
		    background: #3366CC;
		    color: #fff;
		    font-size: .85em;
		    cursor: pointer;
		    }
		    
	    #external-events p {
		    margin: 1.5em 0;
		    font-size: 11px;
		    color: #666;
		    }
		    
	    #external-events p input {
		    margin: 0;
		    vertical-align: middle;
		    }

	    #calendar {
		    float: right;
		    width: 800px;
		    }

    </style>
</head>
'; ?>
 
<body>
<div id="conteudo">
    <div class="container1">
    <?php if ($this->_tpl_vars['ret'] == 'se'): ?>
            <span class="label label-success">SUCESSO</span>
            <span> A Cidade foi Excluida com Sucesso!</span>
    <?php endif; ?>

    <?php if ($this->_tpl_vars['ret'] == 'ee'): ?>
            <span class="label label-important">ERRO</span>
            <span> Não foi possivel excluir.</span>
    <?php endif; ?>    


    <div id='external-events'>
        <h3>Clientes</h3>

        <?php $_from = $this->_tpl_vars['clientes']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['cliente']):
?>
            <div class='external-event'><?php echo $this->_tpl_vars['cliente']->getCli_Nome(); ?>
</div>
        <?php endforeach; endif; unset($_from); ?>

    </div>

    <div id='calendar'></div>
    
<!--<input type='button' value='add test events' onclick='addTestEvents()' />-->

</div>   
</div>   
</body>
</html>