<?php

// Conectando
require "conexao.php";
?>
<html>
 <head>
 <link href="../CSS/formataTabelaCrud.css" rel="stylesheet" type="text/css">
 <title>Consultando Usuários</title>
</head>
<body>
<h1>Consultar Usuários</h1>
<div id = "navbar">
  <a href="../HTML/menu.html">Voltar para Menu</a>
  <a href="../HTML/index.html">Sair do sistema</a>
</div>
<a class = "navbaresquerda" href= "../HTML/cadastrarUsuario.php">Novo Usuário</a>

 <hr/>
 <form action = "editarUsuario.php" method = "get">
 <table>
  <thead>
    <tr>
      <th>ID</th>
      <th>Nome completo</th>
      <th>Senha</th>
      <th>Telefone</th>
      <th>Celular</th>
      <th>E-mail</th>
      <th>Cargo</th>
      <th>Alterar</th>
      <th>Excluir</th>
    </tr>
  </thead>
  <tbody>
<?php

// Executando consulta SQL
$query = 'SELECT 
        codUsuario,
        nome,
        senha,
        CONCAT ("(", SUBSTR(telefone, 1, 2), ")", " ", SUBSTR(telefone, 3, 4) , "-", SUBSTR(telefone, 7, 6)) AS telefone,
        CONCAT ("(", SUBSTR(celular, 1, 2), ")", " ", SUBSTR(celular, 3, 5), "-", SUBSTR(celular, 8, 7))AS celular,
        email,
        cargo
        FROM usuario
        ORDER BY codUsuario';
$result = mysqli_query($con, $query) or die('Query failed: ' . mysql_error());

// Imprimindo resultados em HTML


while ($registro = mysqli_fetch_array($result)){
 
 ?>

<tr>
    <td><?php echo $registro['codUsuario']; ?></td>
    <td><?php echo $registro['nome']; ?></td>
    <td><?php echo $registro['senha']; ?></td>
    <td><?php echo $registro['telefone']; ?></td>
    <td><?php echo $registro['celular']; ?></td>
    <td><?php echo $registro['email']; ?></td>
    <td><?php echo $registro['cargo']; ?></td>
    <td id = "excluir"><a href = "editarUsuario.php?id=<?php echo $registro['codUsuario'] ?>">Alterar</a></td>
    <td id = "editar"><a href="deletarUsuario.php?id=<?php echo $registro['codUsuario'] ?>" 
    onclick="return confirm('Tem certeza que deseja excluir este registro?')">Excluir</a></td>
  </tr>
    <?php } ?>
</form>

