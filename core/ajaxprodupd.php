<?php
	
	require 'modelajax/ajaxsistema.php';

	$consulta = new ajax();
	
	$NomProd = $_REQUEST['TxtNomProd'];

	$html = "";
	
	foreach($consulta ->ObtProd($_POST['TxtCodDetMrcUpd']) as $r) :
		$html.= "<option value='".$r['CodProd']."'";
			if($r['NomProd']==$NomProd) {
		$html.= " selected";
			}
		$html.= ">".$r['FabProd'].' - '.$r['NomProd']."</option>";
	endforeach;

	echo $html;
?>