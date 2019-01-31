<?php
	
	require 'modelajax/ajaxsistema.php';

	$consulta = new ajax();
	
	$html= "<option selected disabled></option>";
	
	foreach($consulta ->ObtEmp($_POST['TxtCodCrg']) as $r) :
		$html.= "<option value='".$r['CodEmp']."'>".$r['NomEmp']."</option>";
	endforeach;
	
	echo $html;
?>