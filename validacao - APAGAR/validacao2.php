<?php
$nomeUsuario = "54354";
$telefoneUsuario = "(11) 2742-2216";
$celularUsuario = "(11) 97559-1454";
$emailUsuario = "Lucas@hotmail.com";
$cargoUsuario = "Dono";
$erro = 0;

function eliminaMascaraString($variavel){
    $variavel = str_replace(".", "", $variavel);
    $variavel = str_replace("-", "", $variavel);
    $variavel = str_replace("/", "", $variavel);
    $variavel = str_replace("(", "", $variavel);
    $variavel = str_replace(")", "", $variavel);
    $variavel = str_replace(" ", "", $variavel);
    $variavel = (int)$variavel;
    if($variavel != 0 ){
		print("Não pode inserir numero no lugar de letra");
		exit();
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
		print("Não pode inserir letra no lugar do número");
		exit();
    }
}

eliminaMascaraString($nomeUsuario);
eliminaMascaraInt($telefoneUsuario);
eliminaMascaraInt($celularUsuario);
eliminaMascaraString($emailUsuario);
eliminaMascaraString($cargoUsuario);

if (empty($nomeUsuario) || empty($celularUsuario) || empty($emailUsuario) || empty($cargoUsuario)){
	echo '<script>nullValue()</script>';
}else{
    print("inserindo no banco de dados");
}



print(eliminaMascaraString($nomeUsuario));
print("\n");
print(eliminaMascaraInt($telefoneUsuario));
print("\n");
print(eliminaMascaraInt($celularUsuario));
print("\n");
print(eliminaMascaraString($emailUsuario));
print("\n");
print(eliminaMascaraString($nomeUsuario));
print("\n");


?>
