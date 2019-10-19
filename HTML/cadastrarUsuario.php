<?php
require_once "../PHP/conexao.php";
require "../PHP/funcoesUsuario.php";
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <title>Cadastro de usuário</title>
    <meta charset="utf-8">
    <link rel = "stylesheet" type = "text/css" href = "../CSS/cadastrarUsuario.css">
    <script src = "../JQuery/jquery-3.4.1.min.js" ></script>
    <script src = "../JQuery/jquery.mask.js" ></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#telefone_usuario').mask('(00) 0000-0000');
    })
        $(document).ready(function(){
           $('#celular_usuario').mask('(00) 00000-0000');
    })
    //Função para remover a mensagem do ECHO depois de alguns segundos
        function removeMensagem(){
            setTimeout(function(){ 
            var msg = document.getElementById("alert");
            var msg2 = document.getElementById("cadastradoSucesso");
            msg.parentNode.removeChild(msg);
            msg2.parentNode.removeChild(msg2);   
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
  <a href = "../HTML/menu.html"><img src="../IMAGENS/logo.png" width="100" height="50"></a>
  <div id = "navbar">
    <a href = "../PHP/consultandoUsuario.php">Consultar Usuários</a>
    <a href="../HTML/menu.html">Voltar para Menu</a>
    <a href="../HTML/index.html">Sair do sistema</a>
  </div>
  
  <hr/>
  <fieldset>
        <h1 id = "centro">Cadastrar usuário</h1>
        <hr/>
        <form action = "" method = "post" autocomplete="off">
        <div>
            <label for = "nome_usuario" >*Novo completo: </label>
            <input type = "text" id = "nome_usuario" size="52" maxlength="40" autocomplete="off" name = "nome_usuario"  pattern= "^[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]+" placeholder = "Digite o nome completo" required title = "Nome completo">
            <label for = "senha_usuario" >*Nova senha: </label>
            <input type = "password" id = "senha_usuario" size="52" min = "5" maxlength="30" name = "senha_usuario"  pattern= "^[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ!@#=$%¨*_.~`/0-9 ]+" placeholder = "Digite a senha" required title = "Apenas números e letras">
        </div>
        <div>
            <label for = "telefone">Telefone: </label>
            <input type="tel" id = "telefone_usuario" size = "52" maxlength="15" autocomplete="off" name = "telefone_usuario" placeholder = "(xx) xxxxx-xxxx"  title = "Campo opcional">
            <label for = "celular">*Celular: </label>
            <input type="tel" id = "celular_usuario" size = "52" maxlength="15" autocomplete="off" name = "celular_usuario" placeholder = "(xx) xxxxx-xxxx"  required title = "(DDD) + 00000-0000">
        </div>
        <div>
            <label for = "email">*E-mail: </label>
            <input type = "email" id = "email" size="52" maxlength="40" name = "email_usuario" pattern="[A-Za-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" placeholder = "E-mail" required title = "E-mail completo">
            <label for = "categoria">*Cargo: </label>
            <select name="cargo" required>
                <option value = "Dono">Dono</option>
                <option value = "Gerente">Gerente</option>
                <option value = "Estoquista">Estoquista</option>
                <option value = "Balconista/Vendedor">Balconista/Vendedor</option>
            </select> 
        </div>
        <br>
			  <strong id = "obrigatorio">Os campos marcados com asterisco são de preenchimento obrigatório.</strong>
              <hr/>
              <div class="button">
                  <button name = "enviar" type = "submit" >Confirmar cadastro</button>
              </div>
          </form>
                <?php
                if(isset($_POST['enviar'])){
                    $nomeUsuario = $_POST['nome_usuario'];
                    $senhaUsuario = $_POST['senha_usuario'];
                    $criptografado = base64_encode($senhaUsuario);
                    $telefoneUsuario = $_POST['telefone_usuario'];
                    $celularUsuario = $_POST['celular_usuario'];
                    $emailUsuario = $_POST['email_usuario'];
                    $cargoUsuario = $_POST['cargo'];
                   
                    eliminaMascaraInt($telefoneUsuario);
                    eliminaMascaraInt($celularUsuario);
        
                    $compara = mysqli_query($con, "SELECT email FROM usuario WHERE email = '$emailUsuario'");
                    $row = mysqli_num_rows($compara);
                                            

                    if (empty($nomeUsuario) || empty($senhaUsuario) || empty($celularUsuario) || empty($emailUsuario) || empty($cargoUsuario)){
                        echo "<strong id = 'alert'>Campos obrigatórios vazios, favor preencher</strong>";
                    }else if(verificaEntradaInt($celularUsuario)){
                        echo "<strong id = 'alert'>Não alterar código fonte</strong>";    
                    }else if(verificaEntradaString($nomeUsuario) || verificaEntradaString($emailUsuario) || verificaEntradaString($cargoUsuario)){
                        echo "<strong id = 'alert'>Não alterar código fonte</strong>";                    
                    }else if (strlen($nomeUsuario) < 6 || strlen($senhaUsuario) <= 5|| strlen($celularUsuario) < 11 || strlen($emailUsuario) <= 10 || strlen($cargoUsuario) < 4){
                        echo "<strong id = 'alert'>Algum campo apresenta tamanho inválido</strong>";
                    }else if(strtolower($senhaUsuario) == "senha123" || strtolower($senhaUsuario) == "abc123" || strtolower($senhaUsuario) == "senha" || strtolower($senhaUsuario) == "pekeri" || strtolower($senhaUsuario) == "pekericalcados" || strtolower($senhaUsuario) == "pekeri_calçados" || strtolower($senhaUsuario) == "senha2019" || strtolower($senhaUsuario) == "teste" || strtolower($senhaUsuario) == "teste123"){
                        echo "<strong id = 'alert'>Senha inválida, tente novamente</strong>";
                    }else if($emailUsuario == $senhaUsuario || strtolower($nomeUsuario) == strtolower($senhaUsuario) || $nomeUsuario == $emailUsuario){
                        echo "<strong id = 'alert'>Alguns campos estão repetidos, tente novamente</strong>";
                    }else{
                        if($row > 0){
                            echo "<strong id = 'alert'>Dados já cadastrados, tente novamente com novos dados</strong>";
                        }if($row == 0){
                            echo "<strong id = 'cadastradoSucesso'>Usuário cadastrado com sucesso!</strong>";
                            $sql = "insert into usuario(nome, senha, telefone, celular, email, cargo) values ('$nomeUsuario', '$criptografado', '$telefoneUsuario', '$celularUsuario',
                            '$emailUsuario', '$cargoUsuario')";
                            //$mensagem = "E-mail de acesso: $emailUsuario\n";
                            //$mensagem .= "Senha de acesso: $senhaUsuario";
                            //mail("lucas.kurata@hotmail.com", "Dados para entrar no sistema", $mensagem);
                            $result = mysqli_query($con, $sql);
                        }
                    }
                }
                    
                
                ?>
                </fieldset>
	<hr/>
    <p class = "centralizar">Copyright © 2019 - Nixis Tecnologia</p>
  </body>
</html>