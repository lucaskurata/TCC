<?php

session_start();
// Destruindo a sessão
session_destroy();
// Redireciona 
// o utilizador depois da destruição da sessão...
header("Location: index.html");
echo "<script>window.alert('Sessão finalizada com sucesso!');</script>";

?>