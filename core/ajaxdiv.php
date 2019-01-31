<?php
	
	require 'modelajax/ajaxsistema.php';

	$consulta = new ajax();
	
	$html= "<option selected disabled></option>";
	
	foreach($consulta ->ObtDiv($_POST['TxtCodDiv']) as $r) :
		if ($r['CodDiv']==5) {
			$html.= "<option value='".$r['CodEmp']."'>Fuera de Alcance</option>";
		}
		else if ($r['CodDiv']==6) {
			$html.= "<option value='".$r['CodEmp']."'>Todos</option>";
		}
		else {
			$html.= "<option value='".$r['CodEmp']."'>".$r['NomEmp']."</option>";
		}
	endforeach;
	
	echo $html;
?>