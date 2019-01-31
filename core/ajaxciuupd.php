<?php
	
	require 'modelajax/ajaxsistema.php';

	$consulta = new ajax();
	
	$NomCiu = $_REQUEST['TxtNomCiu'];

	$html = "";

	foreach($consulta ->ObtCiu($_POST['TxtCodPaisUpd']) as $r) :
		$html.= "<option value='".$r['CodCiu']."'";
			if($r['NomCiu']==$NomCiu) {
		$html.= " selected";
			}
		$html.= ">".$r['NomCiu']."</option>";
	endforeach;
	
	echo $html;
?>