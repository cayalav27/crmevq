<?php
	
	require 'modelajax/ajaxsistema.php';

	$consulta = new ajax();
	
	$html= "<option selected disabled></option>";
	
	foreach($consulta ->StkObt($_POST['TxtCodRol'], $_POST['TxtCodVnt']) as $r) :
		$html.= "<option value='".$r['CodStk']."'>".$r['NomStk']."</option>";
	endforeach;
	
	echo $html;
?>