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
 <li class="active"><a href="#">Menu</a></li>
 <li><a href="#">Products</a>
  <ul>
   <li><a href="#">Products Sub Menu 1</a></li>
   <li><a href="#">Products Sub Menu 2</a></li>
   <li><a href="#">Products Sub Menu 3</a></li>
   <li><a href="#">Products Sub Menu 4</a></li>
  </ul>
 </li>
 <li><a href="#">Services</a>
  <ul>
   <li><a href="#">Services Sub Menu 1</a></li>
   <li><a href="#">Services Sub Menu 2</a></li>
   <li><a href="#">Services Sub Menu 3</a></li>
   <li><a href="#">Services Sub Menu 4</a></li>
  </ul>
 </li>
 <li><a href="#">About</a></li>
 <li><a href="#">Contact Us</a></li>
</ul>
  <button type="button" class="btn btn-info"><a href = "../HTML/cadastrarProduto.php">Cadastrar novo produto</a></button>
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
$query = 'SELECT codProduto, nome_produto, marca, numeracao, quantidade, 
    valor_custo, valor_venda, fornecedor, categoria_produto, cor FROM produtos';
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