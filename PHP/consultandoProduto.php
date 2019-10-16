<?php

// Conectando
require "conexao.php";
?>
<html>
 <head>
 <link href="../CSS/formataTabelaCrud.css" rel="stylesheet" type="text/css">
 <title>Resultado da pesquisa</title>
</head>
<body>
<ul id="menu-bar">

 <li><a href= "../HTML/cadastrarProduto.php">Cadastrar Novo Produto</a>

 <li><a href="../HTML/menu.html">Voltar para Menu</a> 

 </li>

 </li>

 <li><a href="../HTML/index.html">Sair do sistema</a></li>

</ul>

 <hr/>
 <form action = "editarProduto.php" method = "get">
 <table>
  <thead>
    <tr>
      <th>ID</th>
      <th>Nome</th>
      <th>Marca</th>
      <th>Numeracao</th>
      <th>Quantidade</th>
      <th>Valor custo</th>
      <th>Valor venda</th>
      <th>Fornecedor</th>
      <th>Categoria</th>
      <th>Cor</th>
      <th>Excluir</th>
      <th>Alterar</th>
    </tr>
  </thead>
  <tbody>
<?php

// Executando consulta SQL
$query = 'SELECT codProduto, 
          nome_produto, 
          marca, 
          numeracao, 
          quantidade, 
          CONCAT("R$ ", valor_custo) AS valor_custo, 
          CONCAT("R$ ", valor_venda) AS valor_venda, 
          fornecedor, 
          categoria_produto, 
          cor 
          FROM produtos';
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
    <td><a href="deletarProduto.php?id=<?php echo $registro['codProduto'] ?>" 
    onclick="return confirm('Tem certeza que deseja excluir este registro?')">Excluir</a></td>
    <td><a href = "editarProduto.php?id=<?php echo $registro['codProduto'] ?>">Editar</a></td>
  </tr>
    <?php } ?>
</form>

