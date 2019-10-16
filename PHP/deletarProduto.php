<?php
require "conexao.php";

$id = $_GET["id"];

$sql = "DELETE FROM produtos WHERE codProduto = '$id'";
mysqli_query($con, $sql);
header("Location: consultandoProduto.php");

?>