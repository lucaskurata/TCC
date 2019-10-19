<?php

// Conectando
require "conexao.php";
?>
<html>
 <head>
 <link href="../CSS/formataTabelaCrud.css" rel="stylesheet" type="text/css">
 <title>Consultando fornecedores</title>
</head>
<body>
<h1>Consultar Fornecedores</h1>
<div id = "navbar">
  <a href="../HTML/menu.html">Voltar para Menu</a>
  <a href="../HTML/index.html">Sair do sistema</a>
</div>
<a class = "navbaresquerda" href= "../HTML/cadastrarFornecedor.php">Novo Fornecedor</a>

 <hr/>
 <form action = "editarFornecedor.php" method = "get">
 <table>
  <thead>
    <tr>
      <th>ID</th>
      <th>Nome</th>
      <th>Email</th>
      <th>Telefone</th>
      <th>Celular</th>
      <th>Endereço</th>
      <th>Número</th>
      <th>CEP</th>
      <th>CNPJ</th>
      <th>Cidade</th>
      <th>Estado</th>
      <th>Alterar</th>
      <th>Excluir</th>
    </tr>
  </thead>
  <tbody>
<?php

// Executando consulta SQL
$query = 'SELECT codFornecedor,
        nomeFornecedor,
        emailFornecedor,
        CONCAT ("(", SUBSTR(telefoneFornecedor, 1, 2), ")", " ", SUBSTR(telefoneFornecedor, 3, 4) , "-", SUBSTR(telefoneFornecedor, 7, 6)) AS telefoneFornecedor,
        CONCAT ("(", SUBSTR(celularFornecedor, 1, 2), ")", " ", SUBSTR(celularFornecedor, 3, 5), "-", SUBSTR(celularFornecedor, 8, 7))AS celularFornecedor,
        enderecoFornecedor,
        numeroFornecedor,
        CONCAT (SUBSTR(cepFornecedor, 1 , 5), "-", SUBSTR(cepFornecedor,6,9)) AS cepFornecedor,
        CONCAT (SUBSTR(cnpjFornecedor, 1, 2), ".", SUBSTR(cnpjFornecedor,3, 3), ".", SUBSTR(cnpjFornecedor,6, 3), "/", SUBSTR(cnpjFornecedor, 9, 4), "-", SUBSTR(cnpjFornecedor, 13, 14)) AS cnpjFornecedor,
        cidadeFornecedor,
        estadoFornecedor
        FROM fornecedor
        ORDER BY codFornecedor';

$result = mysqli_query($con, $query) or die('Query failed: ' . mysql_error());

// Imprimindo resultados em HTML


while ($registro = mysqli_fetch_array($result)){
 
 ?>

<tr>
    <td><?php echo $registro['codFornecedor']; ?></td>
    <td><?php echo $registro['nomeFornecedor']; ?></td>
    <td><?php echo $registro['emailFornecedor']; ?></td>
    <td><?php echo $registro['telefoneFornecedor']; ?></td>
    <td><?php echo $registro['celularFornecedor']; ?></td>
    <td><?php echo $registro['enderecoFornecedor']; ?></td>
    <td><?php echo $registro['numeroFornecedor']; ?></td>
    <td><?php echo $registro['cepFornecedor']; ?></td>
    <td><?php echo $registro['cnpjFornecedor']; ?></td>
    <td><?php echo $registro['estadoFornecedor']; ?></td>
    <td><?php echo $registro['cidadeFornecedor']; ?></td>
    <td id = "excluir"><a href = "editarFornecedor.php?id=<?php echo $registro['codFornecedor'] ?>">Alterar</a></td>
    <td id = "editar"><a href="deletarFornecedor.php?id=<?php echo $registro['codFornecedor'] ?>" 
    onclick="return confirm('Tem certeza que deseja excluir este registro?')">Excluir</a></td>
  </tr>
    <?php } ?>
</form>

