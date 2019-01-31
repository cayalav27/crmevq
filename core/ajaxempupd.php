<?php
	
	require 'modelajax/ajaxsistema.php';

	$consulta = new ajax();
	
	$NomEmp = $_REQUEST['TxtNomEmp'];

	$html = "";
	
	foreach($consulta ->ObtDiv($_POST['TxtCodDivUpd']) as $r) :
		if ($r['CodDiv']==5) {
			$html.= "<option value='".$r['CodEmp']."' selected>Fuera de Alcance</option>";
		}
		elseif ($r['CodDiv']==6) {
			$html.= "<option value='".$r['CodEmp']."' selected>Todos</option>";
		}
		else {
			$html.= "<option value='".$r['CodEmp']."'";
			if($r['NomEmp']==$NomEmp) {
			$html.= " selected";
				}
			$html.= ">".$r['NomEmp']."</option>";
		}
	endforeach;
	
	echo $html;
?>