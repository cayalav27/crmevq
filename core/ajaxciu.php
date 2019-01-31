<?php
	
	require 'modelajax/ajaxsistema.php';

	$consulta = new ajax();
	
	$html= "<option selected disabled></option>";
	
	foreach($consulta ->ObtCiu($_POST['TxtCodPais']) as $r) :
		$html.= "<option value='".$r['CodCiu']."'>".$r['NomCiu']."</option>";
	endforeach;
	
	echo $html;
?>