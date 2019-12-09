<?php
session_start();
if((!isset ($_SESSION['email']) == true) and (!isset ($_SESSION['password']) == true)){
  unset($_SESSION['email']);
  unset($_SESSION['password']);
  header("location: ../HTML/login.php");

}

$logado = $_SESSION['email'];

// Conectando
require "conexao.php";
?>
<html>
 <head>
 <link rel="sortcut icon" href="../IMAGENS/logo2.png" type="image/png" />
 <link href="../CSS/formataTabelaCrud.css" rel="stylesheet" type="text/css">
 <title>Consultando Produtos</title>
</head>
<body>
<div id = "menu">
    <ul>
      <li><a href= "../HTML/cadastrarProduto.php">Cadastrar Produtos</a></li>
      <li><a href= "../PHP/consultandoUsuario.php">Consultar Usuários</a></li>
      <li><a href= "../HTML/cadastrarUsuario.php">Cadastrar Usuários</a></li>
      <li><a href= "../PHP/consultandoFornecedor.php">Consultar Fornecedores</a></li>
      <li><a href= "../HTML/cadastrarFornecedor.php">Cadastrar Fornecedores</a></li>
      <li><a href="../HTML/logout.php">Sair do sistema</a></li>
    </ul>
  </div>
  <br>
  <br>
<a class = "navbaresquerda" href= "../HTML/cadastrarProduto.php">Novo Produto</a>
<br>
<br>
 <hr/>
 <form action = "editarProduto.php" method = "get">
 <table>
  <thead>
    <tr>
      <th>ID</th>
      <th>Nome</th>
      <th>Marca</th>
      <th>Numeração</th>
      <th>Quantidade</th>
      <th>Valor custo</th>
      <th>Valor venda</th>
      <th>Fornecedor</th>
      <th>Categoria</th>
      <th>Cor</th>
      <th>Alterar</th>
      <th>Excluir</th>
    </tr>
  </thead>
  <tbody>
<?php

// Executando consulta SQL
$query = 'SELECT
          codProduto,
          nome_produto,
          marca,
          numeracao,
          quantidade,
          CONCAT("R$ ", valor_custo) AS valor_custo,
          CONCAT("R$ ", valor_venda) AS valor_venda,
          fornecedor,
          categoria_produto,
          cor
          FROM produtos
          ORDER BY codProduto';
$result = mysqli_query($con, $query) or die('Query failed: ' . mysql_error());

// Imprimindo resultados em HTML


while ($registro = mysqli_fetch_array($result)){

 ?>

<tr>
    <td><?php echo $registro['codProduto']; ?></td>
    <td><?php echo $registro['nome_produto']; ?></td>
    <td><?php echo $registro['marca']; ?></td>
    <td><?php echo $registro['numeracao']; ?></td>
    <td><?php echo $registro['quantidade']; ?></td>
    <td><?php echo $registro['valor_custo']; ?></td>
    <td><?php echo $registro['valor_venda']; ?></td>
    <td><?php echo $registro['fornecedor']; ?></td>
    <td><?php echo $registro['categoria_produto']; ?></td>
    <td><?php echo $registro['cor']; ?></td>
    <td id = "excluir"><a href = "editarProduto.php?id=<?php echo $registro['codProduto'] ?>">Alterar</a></td>
    <td id = "editar"><a href="deletarProduto.php?id=<?php echo $registro['codProduto'] ?>"
    onclick="return confirm('Tem certeza que deseja excluir este registro?')">Excluir</a></td>
  </tr>
    <?php } ?>
</form>

