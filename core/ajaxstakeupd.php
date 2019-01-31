<?php
	
	require 'modelajax/ajaxsistema.php';

	$consulta = new ajax();
	
	$NomStk = $_REQUEST['TxtNomStk'];

	$html = "";

	foreach($consulta ->StkObt($_POST['TxtCodRolUpd'], $_POST['TxtCodVnt']) as $r) :
		$html.= "<option value='".$r['CodStk']."'";
			if($r['NomStk']==$NomStk) {
		$html.= " selected";
			}
			else {
		$html.= "";		
			}
		$html.= ">".$r['NomStk']."</option>";
	endforeach;
	
	echo $html;
?>