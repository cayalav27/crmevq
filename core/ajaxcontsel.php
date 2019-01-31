<?php
	
	require 'modelajax/ajaxsistema.php';

	$consulta = new ajax();
	
	$html= "<option selected disabled></option>";
	
	foreach($consulta ->ObtCont($_POST['TxtCodCliUp']) as $r) :
		$html.= "<option value='".$r['CodCont']."'>".$r['NomCont']."</option>";
	endforeach;
	
	echo $html;
?>