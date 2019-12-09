<?php
require_once "../PHP/conexao.php";


?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <title>Atualizar senha</title>
    <meta charset="utf-8">
    <link rel = "stylesheet" type = "text/css" href = "../CSS/alterarSenhaUsuario.css">
    <script type="text/javascript">
 
    </script>
  </head>
  <body>
  <a href = "../HTML/menu.html"><img src="../IMAGENS/logo.png" width="100" height="50"></a>
  <div class="navegacao">
    <a href="../PHP/consultandoUsuario.php">Voltar</a>
  </div>
  
  <hr/>
  <fieldset>
        <h1 id = "centro">Atualizar senha</h1>
        <hr/>
        <h2>Agora digite a sua nova senha</h2>
        <br>
        <form action = "" method = "post" autocomplete="off">
        <div>
            <input type = "hidden" name = "crud" value = "<?php echo $registro['codFornecedor']; ?>">
            <label for = "senhaUsuario" >*Nova senha </label>
            <input type = "password" id = "senha_usuario" size="52" min = "5" maxlength="30" name = "senha_usuario"  pattern= "^[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ!@#=$%¨*_.~`/0-9 ]+" placeholder = "Digite sua nova senha" required title = "Apenas números e letras" >
        </div>
        <br><br>
			  <strong id = "obrigatorio">Os campos marcados com asterisco são de preenchimento obrigatório.</strong>
              <hr/>
              <div class="button">
                  
                  <button name = "enviar" type = "submit" >Concluir</button>
              </div>
        
          </form>
                <?php
                include "../PHP/alterarSenhaUsuario.php";
                if(isset($_POST['enviar'])){
                    $apaga = $_POST['senha_usuario'];
                    $senhaUsuario = $_POST['senha_usuario'];
                    $criptografado = base64_encode($senhaUsuario);
                   
                    if (empty($senhaUsuario)){
                        echo "<strong id = 'alert'>Alguns campos estão repetidos, tente novamente</strong>";
                    }else{echo "<strong id = 'cadastradoSucesso'>Senha atualizado com sucesso!</strong>";
                          $sql = "UPDATE usuario 
                                  SET
                                  senha = '$criptografado'
                                  WHERE codUsuario = '$idp'";
                          //$mensagem = "E-mail de acesso: $emailUsuario\n";
                          //$mensagem .= "Senha de acesso: $senhaUsuario";
                          //mail("lucas.kurata@hotmail.com", "Dados para entrar no sistema", $mensagem);
                          $result = mysqli_query($con, $sql);
                          echo '<script>setTimeout(function() {
                            window.location.href = "consultandoUsuario.php";
                        }, 1000);</script>';
                        }
                    }
                
                    
                
                ?>
                </fieldset>
	<hr/>
    <p class = "centralizar">Copyright © 2019 - Nixis Tecnologia</p>
  </body>
</html>