<?php

session_start();

require_once "../PHP/conexao.php";
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <link rel="sortcut icon" href="../IMAGENS/logo2.png" type="image/png" />
    <title>Login</title>
    <meta charset="utf-8">
    <link rel = "stylesheet" type = "text/css" href = "../CSS/login.css">

    <script type="text/javascript">
      function loginsucessfully(){
		    setTimeout("window.location='../PHP/consultandoProduto.php'", 900);
		    alert("Logado com Sucesso!");
	    }
      //Função para remover a mensagem do ECHO depois de alguns segundos
      function removeMensagem(){
            setTimeout(function(){ 
            var msg = document.getElementById("alert");
            msg.parentNode.removeChild(msg);   
        }, 5000);
    }
        document.onreadystatechange = () => {
            if (document.readyState === 'complete') {
                // toda vez que a página carregar, vai limpar a mensagem (se houver) 
                // após 5 segundos
            removeMensagem(); 
        }
    };
    </script>

  </head>
  <body>
  <img src="../IMAGENS/nixis2.png" width="90" height="40">
  <div class="navegacao">
    <a href="../HTML/index.html">Voltar</a>
  </div>
  
  <hr/>
  <fieldset>
        <h1 id = "centro">Login</h1>
        <hr/>
        <form action = "" method = "post" autocomplete="off">
        <br>
        <div class = "centro">
            <label for = "email">*E-mail do usuário: </label>
            <input type = "email" id = "email" size="52" maxlength="40" name = "email" pattern="[A-Za-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" placeholder = "E-mail" required title = "Digite o seu E-mail completo">
        </div>
        <div class = "centro">    
            <label for = "senha">*Senha do usuário: </label>
             <input type = "password" id = "senha" size="52"  maxlength="14" name = "senha" placeholder = "Senha" pattern= "^[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ!@#$=.%¨*_~`/0-9]+"   title = "Digite a sua senha" required>
        </div>
        <br>
        <hr/>
        <br>
			  <strong id = 'obrigatorio'>Os campos marcados com asterisco são de preenchimento obrigatório.</strong>
        </div>
        <div class="button">
          <br>
          <button name = "enviar" type = "submit">Confirmar dados</button>
        </div>
        </form>
        <?php
          if(isset($_POST['enviar'])){
            $email=$_POST['email'];
            $senha=$_POST['senha'];
            $encriptografar = base64_encode($senha);
            $sql = mysqli_query($con, "SELECT * FROM usuario WHERE email = '$email' and senha = '$encriptografar'");
            $row = mysqli_num_rows($sql);
             
            if (empty($email)){
              echo "<strong id = 'alert'>Favor preencher o e-mail</strong>";
            }else if (empty($senha)){
              echo "<strong id = 'alert'>Favor preencher a senha</strong>";
            }else if (strlen($email) < 10){
              echo "<strong id = 'alert'>E-mail inválido, tente novamente</strong>";
            }else if(strlen($senha) < 5){
              echo "<strong id = 'alert'>Senha inválida</strong>";
            }else if($email == $senha){
              echo "<strong id = 'alert'>E-mail e senhas repetidos</strong>";
            }else{
              if($row == 1){
                $_SESSION['email'] = $email;
		            $_SESSION['password'] = $encriptografar;
                echo '<script>loginsucessfully()</script>';
              }else if($row == 0){
                unset ($_SESSION['email']);
                unset ($_SESSION['password']);
                echo "<strong id = 'alert'>Dados inválidos, tente novamente</strong>";
              }
            }
          }
        ?>
    </fieldset>
	<hr/>
  <p class = "centralizar">Copyright © 2019 - Nixis Tecnologia</p>
  </body>
</html>