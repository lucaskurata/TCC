<html>
<body>
<?php
require_once "conexao.php";

$con = mysqli_connect("localhost", "root", "", "NIXIS");
mysqli_set_charset($con,"utf8");


$login = $_POST['nome_usuario'];
$senha = MD5($_POST['senha_usuario']);
$entrar = $_POST['entrar'];



if($con)
	echo "Conectado";
else 
	echo "Não comectado";


$result = mysqli_query($con, $sql);

if($result)
	echo "Imserido";
else
	echo "Erro";
header("Location: ../HTML/fornecedor.html");


?>
</html>
</body>