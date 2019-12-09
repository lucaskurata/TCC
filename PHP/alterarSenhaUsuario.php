<?php
require_once "../PHP/conexao.php";
require "../PHP/funcoesUsuario.php";

?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <title>Cadastro de usuário</title>
    <meta charset="utf-8">
    <link rel = "stylesheet" type = "text/css" href = "../CSS/alterarSenhaUsuario.css">
  </head>
  <body>
  <a href = "../HTML/menu.html"><img src="../IMAGENS/logo.png" width="100" height="50"></a>
  <div id = "navbar">
    <a href = "../PHP/consultandoUsuario.php">Cancelar</a>
  </div>
  
  <hr/>
  <fieldset>
        <h1 id = "centro">Alterar senha</h1>
        <hr/>
        <h2 id = "tituloCinza">Para continuar, primeiro confirme que é realmente você</h2>
        <br>
        <form action = "" method = "post" autocomplete="off">
        <div>
            <label for = "email">*E-mail: </label>
            <input type = "email" id = "email" size="52" maxlength="40" name = "email_usuario" pattern="[A-Za-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" placeholder = "E-mail" required title = "E-mail completo">
            <label for = "senha_usuario" >*Senha: </label>
            <input type = "password" id = "senha_usuario" size="52" min = "5" maxlength="30" name = "senha_usuario"  pattern= "^[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ!@#=$%¨*_.~`/0-9 ]+" placeholder = "Digite a senha" required title = "Apenas números e letras">
        </div>
        <br><br>
        	  <strong id = "obrigatorio">Os campos marcados com asterisco são de preenchimento obrigatório.</strong>
              <hr/>
              <div class="button">
                  <button name = "enviar" type = "submit" >Próxima</button>
              </div>
          </form>

                <?php
                if(isset($_POST['enviar'])){
                    $id = $_POST['crud'];
                    $emailUsuario = $_POST['email_usuario'];
                    $senhaUsuario = $_POST['senha_usuario'];

                    $encriptografar = base64_encode($senhaUsuario);

                    $query = "SELECT
                            codUsuario,
                            senha
                            FROM usuario
                            WHERE senha = '$encriptografar'";
                    $result = mysqli_query($con, $query) or die('Query failed: ' . mysql_error());

                    while ($indice = mysqli_fetch_array($result)){
                        $idp = $indice['codUsuario'];
                        $senha= $indice['senha'];
                    }

                    $decriptografar = base64_decode($senha);
                    
                    $sql = mysqli_query($con, "SELECT * FROM usuario WHERE email = '$emailUsuario' and senha = '$senha'");
                    $row = mysqli_num_rows($sql);

                    if($row == 1){
                        header("Location: alterarSenha.php");
                    }if($row == 0){
                        header("Location: consultandoUsuario.php");
                    }
                }    
                
                ?>
    </fieldset>
	<hr/>
    <p class = "centralizar">Copyright © 2019 - Nixis Tecnologia</p>
  </body>
</html>