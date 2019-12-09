<?php
require_once "../PHP/conexao.php";
require "../PHP/funcoesProduto.php";

session_start();
if((!isset ($_SESSION['email']) == true) and (!isset ($_SESSION['password']) == true)){
  unset($_SESSION['email']);
  unset($_SESSION['password']);
  header("location: login.php");

}

$logado = $_SESSION['email'];

?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <link rel="sortcut icon" href="../IMAGENS/logo2.png" type="image/png" />
    <title>Cadastro de produto</title>
    <meta charset="utf-8">
    <link rel = "stylesheet" type = "text/css" href = "../CSS/cadastrarProduto.css">
    <script src = "../JQuery/jquery-3.4.1.min.js" ></script>
    <script src = "../JQuery/jquery.mask.js" ></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#valor_custo').mask('0000.00', {reverse: true});
    })
        $(document).ready(function(){
           $('#valor_venda').mask('0000.00', {reverse: true});
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
        <a href = "../PHP/consultandoProduto.php">Consultar Produtos</a>
        <a href="../PHP/consultandoProduto.php">Voltar para Início</a>
        <a href="../HTML/logout.php">Sair do sistema</a>
    </div>

  <hr/>
  <fieldset>
        <h1 id = "centro">Cadastrar produto</h1>
        <hr/>
        <form action = "" method = "post" autocomplete="off">
        <div>
            <input type = "hidden" name = "txtid" value  = "<?php echo $registro['codProduto']; ?>">
            <label for = "produto" >*Nome do produto: </label>
            <input type = "text" id = "nome_produto" size="52" maxlength="30" name = "nome_produto"  pattern= "^[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ0-9 ]+" placeholder = "Digite o nome do produto" required title = "Nome do produto">
            <label for = "marca">*Marca: </label>
            <input type="text" id = "marca" size = "52" maxlength="25" name = "marca" pattern= "^[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ0-9 ]+" placeholder = "Digite a marca"  title = "Marca do produto" required>
        </div>
        <div>
            <label for = "numeracao">Numeração: </label>
            <input type = "text" id = "numeracao" size = "3" maxlength ="3" name = "numeracao" placeholder = "Digite a numeração" pattern= "[A-Za-z0-9]+$" title = "Campo opcional" >
            <label for = "quantidade" >*Quantidade: </label>
            <input type = "text" id = "quantidade" size="3" maxlength="3" name = "quantidade"  pattern= "[0-9]+$" placeholder = "Digite a quantidade" required title = "Quantidade do produto">
        </div>
        <div>
            <label for = "valor_custo">*Preço de compra: </label>
            <input type="text" id = "valor_custo" size = "52" maxlength="15" name = "valor_custo" placeholder = "Preço unitário"  required title = "Preço bruto unitário">
            <label for = "valor_venda">*Preço de venda: </label>
            <input type = "text" id = "valor_venda" size=" 52" maxlength="15" name = "valor_venda" placeholder = "Preço unitário" title = "Preço unitário a ser vendido" required>
        </div>
        <div>
		    <label for = "fornecedor">Fornecedor: </label>
			<input type = "text" id = "fornecedor"  maxlength="30" name = "fornecedor" placeholder = "(Opcional)" pattern= "^[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]+" title = "Campo opcional">
            <label for = "categoria">*Categoria: </label>
            <select name="categoria_produto" required>
                <option value = "Botas">Botas</option>
                <option value = "Chinelos">Chinelos</option>
                <option value = "Sandálias">Sandálias</option>
				<option value = "Chuteiras">Chuteiras</option>
                <option value = "Casual">Sapato Casual</option>
                <option value = "Social">Sapato Social</option>
                <option value = "Sapatenis">Sapatenis</option>
                <option value = "Tênis">Tênis</option>
                <option value = "Performance">Tênis Performance</option>
                <option value = "Sapatilhas">Sapatilhas</option>
                <option value = "Cinto">Cinto</option>
                <option value = "Meia">Meia</option>
                <option value = "Meião">Meião</option>
                <option value = "Caneleira">Caneleira</option>
                <option value = "Bola">Bola</option>
                <option value = "Calção">Calção</option>
            </select>
        </div>
        <div>
        <label for = "cor">*Cor: </label>
             <select name="cor" required>
                <option value = "Branco">Branco</option>
                <option value = "Azul">Azul</option>
                <option value = "Verde">Verde</option>
				<option value = "Preto">Preto</option>
                <option value = "Rosa">Rosa</option>
                <option value = "Laranja">Laranja</option>
                <option value = "Vermelho">Vermelho</option>
                <option value = "Amarelo">Amarelo</option>
                <option value = "Cinza">Cinza</option>
                <option value = "Marrom">Marrom</option>
            </select>
        </div>
        <br>
			  <strong id = "obrigatorio">Os campos marcados com asterisco são de preenchimento obrigatório.</strong>
        <hr/>
        <div class="button">
            <button name = "enviar" type = "submit" >Confirmar cadastro</button>
        </div>

        <?php
             if(isset($_POST['enviar'])){
                $nomeProduto = ucwords($_POST['nome_produto']);
                $marcaProduto = ucwords($_POST['marca']);
                $numeracaoProduto = ucwords($_POST['numeracao']);
                $quantidadeProduto = ucwords($_POST['quantidade']);
                $valorCusto = ucwords($_POST['valor_custo']);
                $valorVenda = ucwords($_POST['valor_venda']);
                $fornecedorProduto = ucwords($_POST['fornecedor']);
                $categoriaProduto = ucwords($_POST['categoria_produto']);
                $corProduto = ucwords($_POST['cor']);


                eliminaMascaraInt($valorCusto);
                eliminaMascaraInt($valorVenda);
                eliminaMascaraInt($quantidadeProduto);

                $compara = mysqli_query($con, "SELECT * FROM produtos WHERE marca = '$marcaProduto' and numeracao = '$numeracaoProduto' and categoria_produto = '$categoriaProduto' and cor = '$corProduto' and quantidade = '$quantidadeProduto'");
                $row = mysqli_num_rows($compara);

                if (empty($nomeProduto) || empty($marcaProduto) || empty($quantidadeProduto) || empty($valorCusto) || empty($valorVenda) || empty($categoriaProduto) || empty($corProduto)){
                    echo "<strong id = 'alert'>Campos obrigatórios vazios, favor preencher</strong>";
                }else if(verificaEntradaInt($quantidadeProduto) /*|| verificaEntradaInt($valorCusto) || verificaEntradaInt($valorVenda)*/){
                    echo "<strong id = 'alert'>Não alterar código fonte</strong>";
                }else if(verificaEntradaString($categoriaProduto) || verificaEntradaString($corProduto)){
                    echo "<strong id = 'alert'>Não alterar código fonte</strong>";
                }else if ((strlen($nomeProduto) < 4|| strlen($marcaProduto) < 3|| strlen($quantidadeProduto) < 1|| strlen($valorCusto) < 3|| strlen($valorVenda) < 3 || strlen($categoriaProduto) < 4 || strlen($corProduto) < 4)){
                    echo "<strong id = 'alert'>Algum campo apresenta tamanho inválido</strong>";
                //}else if($valorCusto == 0.00 || $valorCusto = 00.00 || $valorVenda == 0.00 || $valorVenda == 00.00 || strtolower($nomeProduto) == "nome" || strtolower($marcaProduto) == "marca" || strtolower($numeracaoProduto) == "numeracao"){
                //    echo "<strong id = 'alert'>Valores inválidos, tente novamente</strong>";
                }else if(strtolower($nomeProduto) == strtolower($numeracaoProduto) || strtolower($nomeProduto) == strtolower($marcaProduto) || strtolower($nomeProduto) == strtolower($quantidadeProduto) || $valorCusto == $valorVenda ||  strtolower($nomeProduto) == strtolower($corProduto) || strtolower($marcaProduto) == strtolower($corProduto)){
                    echo "<strong id = 'alert'>Alguns campos estão repetidos, tente novamente</strong>";
                }else{
                    if($row > 0){
                        echo "<strong id = 'alert'>Produto já cadastrado, tente novamente com novos dados</strong>";
                    }if($row == 0){
                        echo "<strong id = 'cadastradoSucesso'>Produto cadastrado com sucesso!</strong>";
                        $sql = "insert into produtos(nome_produto, marca, numeracao, quantidade, valor_custo, valor_venda, fornecedor,
	                    categoria_produto, cor) values ('$nomeProduto ', '$marcaProduto', '$numeracaoProduto', '$quantidadeProduto', '$valorCusto',
	                    '$valorVenda', '$fornecedorProduto', '$categoriaProduto', '$corProduto')";
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