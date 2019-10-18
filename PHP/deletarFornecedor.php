<?php
require "conexao.php";

$id = $_GET["id"];

$sql = "DELETE FROM fornecedor WHERE codFornecedor = '$id'";
mysqli_query($con, $sql);
header("Location: consultandoFornecedor.php");

?>