<?php
	
	require 'modelajax/ajaxsistema.php';

	$consulta = new ajax();
	
	$NomCont = $_REQUEST['TxtNomCont'];

	$html = "";
	
	foreach($consulta ->ObtCont($_POST['TxtCodCliUpd']) as $r) :
		$html.= "<option value='".$r['CodCont']."'";
			if($r['NomCont']==$NomCont) {
		$html.= " selected";
			}
		$html.= ">".$r['NomCont']."</option>";
	endforeach;
	
	echo $html;
?>