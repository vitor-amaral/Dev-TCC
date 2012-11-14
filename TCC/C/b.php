<?php
        //fazer pesquisa no banco
	$year = date('Y');
	$month = date('m');

	echo json_encode(array(
	
		array(
			'id' => 111,
			'title' => "Joao",
			'start' => "$year-$month-10"
 		),
		
		array(
			'id' => 222,
			'title' => "Mario",
			'start' => "$year-$month-20",
			'end' => "$year-$month-22"
		)
	
	));

?>
