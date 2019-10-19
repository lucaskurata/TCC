<?php
require "conexao.php";

$id = $_GET["id"];

$sql = "DELETE FROM usuario WHERE codUsuario = '$id'";
mysqli_query($con, $sql);
header("Location: consultandoUsuario.php");

?>