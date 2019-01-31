<?php
	
	require 'modelajax/ajaxsistema.php';

	$consulta = new ajax();

	if($_POST['TxtCodEmp'] == 0){
		$html.= "<option value='0' selected>Todos</option>";
	}
	else {
	foreach($consulta ->EmpObt($_POST['TxtCodEmp']) as $r) :
		$html.= "<option value='".$r['CodPrf']."'>".$r['NomPrf']."</option>";
	endforeach;
	}
	echo $html;
?>