<?php

function eliminaMascaraInt(&$variavel){
	//"11975591454" --> 11975591454 
    $variavel = str_replace(".", "", $variavel);
    $variavel = str_replace("-", "", $variavel);
    $variavel = str_replace("/", "", $variavel);
    $variavel = str_replace("(", "", $variavel);
    $variavel = str_replace(")", "", $variavel);
    $variavel = str_replace(" ", "", $variavel);
    $variavel = $variavel;
}
function verificaEntradaString($variavel){
	$variavel = (int)$variavel;
	if($variavel != 0 ){
		return true;
	}
}
function verificaEntradaInt($variavel){
    $variavel = (int)$variavel;
	if($variavel == 0){
		return true;
    }
}
?>
