<?php

function eliminaMascaraString($variavel){
    $variavel = str_replace(".", "", $variavel);
    $variavel = str_replace("-", "", $variavel);
    $variavel = str_replace("/", "", $variavel);
    $variavel = str_replace("(", "", $variavel);
    $variavel = str_replace(")", "", $variavel);
    $variavel = str_replace(" ", "", $variavel);
    $variavel = (int)$variavel;
    if($variavel != 0 ){
        return ("Não pode inserir número no lugar da letra");
    }
}
function eliminaMascaraInt(&$variavel){
    $variavel = str_replace(".", "", $variavel);
    $variavel = str_replace("-", "", $variavel);
    $variavel = str_replace("/", "", $variavel);
    $variavel = str_replace("(", "", $variavel);
    $variavel = str_replace(")", "", $variavel);
    $variavel = str_replace(" ", "", $variavel);
    $variavel = (int)$variavel;
    if($variavel == 0){
        return ("Não pode inserir letra no lugar de número");
    }
}

$nomeUsuario = "Lucas";
$telefoneUsuario = "(11) 2742-2216";
$celularUsuario =  "(11) 97559-1454";
//email poder conter número
$emailUsuario = "lucas@hotmail.com";
$cargoUsuario = "gerente";

print(eliminaMascaraString($nomeUsuario));
print("\n");
print(eliminaMascaraInt($telefoneUsuario));
print("\n");
print(eliminaMascaraInt($celularUsuario));
print("\n");
print(eliminaMascaraString($emailUsuario));
print("\n");
print(eliminaMascaraString($cargoUsuario));
print("\n");

var_dump($nomeUsuario);
var_dump($telefoneUsuario);
var_dump($celularUsuario);
var_dump($emailUsuario);
var_dump($cargoUsuario);

?>
