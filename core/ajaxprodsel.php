<?php
	
	require 'modelajax/ajaxsistema.php';

	$consulta = new ajax();
	
	$html= "<option selected disabled></option>";
	
	foreach($consulta ->ObtProd($_POST['TxtCodDetMrcUpd']) as $r) :
		$html.= "<option value='".$r['CodProd']."'>".$r['FabProd'].' - '.$r['NomProd']."</option>";
	endforeach;
	
	echo $html;
?>