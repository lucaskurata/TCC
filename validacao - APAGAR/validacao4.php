<?php
$nomeUsuario = "rrthrth";
$telefoneUsuario = "(11) 97559-1454";
$celularUsuario = "(11) 97559-1454";
$emailUsuario = "Lucas@hotmail.com";
$cargoUsuario = "Dono";

function eliminaMascaraString($variavel){
    $variavel = str_replace(".", "", $variavel);
    $variavel = str_replace("-", "", $variavel);
    $variavel = str_replace("/", "", $variavel);
    $variavel = str_replace("(", "", $variavel);
    $variavel = str_replace(")", "", $variavel);
    $variavel = str_replace(" ", "", $variavel);
    $variavel = (int)$variavel;
    if($variavel != 0 ){
		return true;
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
		return true;
		exit();
    }
}

if(eliminaMascaraString($nomeUsuario) == true || eliminaMascaraInt($telefoneUsuario) == true){
    print("proibido");
    //<script</script>
    }else{
        if (empty($nomeUsuario) || empty($celularUsuario) || empty($emailUsuario) || empty($cargoUsuario)){
	    echo '<script>nullValue()</script>';
    }else{
        print("inserindo no banco de dados");
    }
}




eliminaMascaraInt($celularUsuario);
eliminaMascaraString($emailUsuario);
eliminaMascaraString($cargoUsuario);




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
