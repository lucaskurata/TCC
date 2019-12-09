<?php

session_start();
if((!isset ($_SESSION['email']) == true) and (!isset ($_SESSION['password']) == true)){
  unset($_SESSION['email']);
  unset($_SESSION['password']);
  header("location: ../HTML/login.php");
  
}

$logado = $_SESSION['email'];

require "conexao.php";

$id = $_GET["id"];

$sql = "DELETE FROM produtos WHERE codProduto = '$id'";
mysqli_query($con, $sql);
header("Location: consultandoProduto.php");

?>