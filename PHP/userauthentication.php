<?php
$con = mysqli_connect("localhost", "root", "", "NIXIS");
mysqli_set_charset($con,"utf8");

?>

<html>
<head>
<title></title>
<script type="text/javascript">
	function loginsucessfully(){
		setTimeout("window.location='../HTML/menu.html'", 900);
		alert("Logado com Sucesso!");
	}

	function loginfailed(){
		setTimeout("window.location='../HTML/login_lucas.php'", 1200);
		alert("Dados não cadastrados, tente novamente!");
	}
	function emailInvalid(){
		setTimeout("window.location='../login/HTML/login_lucas.php'", 1200);
		alert("E-mail inválido, tente novamente!");
	}
	function passwordInvalid(){
		setTimeout("window.location='../login/HTML/login_lucas.php'", 1200);
		alert("Senha inválida, tente novamente!");
	}
	function valuesEquals(){
		setTimeout("window.location='../login/HTML/login_lucas.php'", 1200);
		alert("E-mail e Senha repetidos, tente novamente!");
	}
	function valuesZeros(){
		setTimeout("window.location='../login/HTML/login_lucas.php'", 1200);
		alert("Favor preencher os dados corretamente, tente novamente!");
	}
</script>
</head>
	<body>

<?php
session_start();
$email=$_POST['email'];
$senha=$_POST['senha'];
$encriptografar = base64_encode($senha);
$sql = mysqli_query($con, "SELECT * FROM usuario WHERE email = '$email' and senha = '$encriptografar'");
$row = mysqli_num_rows($sql);


if (empty($email)){
	echo '<script>valuesZeros()</script>';
}if (empty($senha)){
	echo '<script>emailInvalid()</script>';
}if (strlen($email) < 15){
	echo '<script>emailInvalid()</script>';
}if(strlen($senha) <= 5){
	echo '<script>passwordInvalid()</script>';
}if($email == $senha){
	echo '<script>valuesEquals()</script>';
}else{
	if($row > 0){
		$_SESSION['email'] = $email;
		$_SESSION['password'] = $encriptografar;
		echo '<script>loginsucessfully()</script>';
	}if($row == 0){
		unset ($_SESSION['email']);
		unset ($_SESSION)['password'];
		echo "<script>loginfailed()</script>";
	}
}


?>
	</body>
</html>
