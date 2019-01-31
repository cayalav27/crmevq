<?php
	
	require 'modelajax/ajaxsistema.php';

	$consulta = new ajax();
	
	$html= "<option selected disabled></option>";
	
	foreach($consulta ->ObtCrg($_POST['TxtCodCrg']) as $r) :
		$html.= "<option value='".$r['CodPrf']."'>".$r['NomPrf']."</option>";
	endforeach;
	
	echo $html;
?>