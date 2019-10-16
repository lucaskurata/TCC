<?php
$con = mysqli_connect("localhost", "root", "", "NIXIS");
mysqli_set_charset($con,"utf8");
?>

<html>
<head>
<title></title>
<script type="text/javascript">
	function loginsucessfully(){
		setTimeout("window.location='painel.php'", 5000);
	}

	function loginfailed(){
		setTimeout("window.location='login.php'", 5000);

	}

</script>
</head>
	<body>

<?php
$email=$_POST['email'];
$senha=$_POST['senha'];
$sql = mysqli_query($con, "SELECT * FROM usuario WHERE email = '$email' and senha = '$senha'");
$row = mysqli_num_rows($sql);

if($row > 0){
	echo 'Logado com Sucesso !';
	echo '<script>loginsucessfully()</script>';
}if($row == 0){
	echo "<center>Nome de usuario ou senha inválido</center>";
	echo "<script>loginfailed</script>";
}


?>
	</body>
</html>
