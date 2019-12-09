<html>
<body>
<?php
$con = mysqli_connect("localhost", "root", "", "NIXIS");
mysqli_set_charset($con,"utf8");
?>
<script type="text/javascript">
	function sucessfully(){
		setTimeout("window.location='../HTML/cadastrarFornecedor.html'", 900);
		alert("Cadastrado com sucesso!");
	}

	function failed(){
		setTimeout("window.location='../HTML/cadastrarFornecedor.html'", 1300);
		alert("Esse fornecedor já está cadastrado!");
	}
</script>

<?php
if($con)
	echo "Conectado";
else 
	echo "Não comectado";

$nomeFornecedor = $_POST['nome_fantasia'];
$emailFornecedor = $_POST['email_fornecedor'];
$telefoneFornecedor = $_POST['telefone_fornecedor'];
$celularFornecedor = $_POST['celular_fornecedor'];
$enderecoFornecedor = $_POST['endereco_fornecedor'];
$numeroFornecedor = $_POST['numero_fornecedor'];
$cepFornecedor = $_POST['cep_fornecedor'];
$cnpjFornecedor = $_POST['cnpj_fornecedor'];
$cidadeFornecedor = $_POST['cidade_fornecedor'];
$estadoFornecedor = $_POST['estado_fornecedor'];


$compara = mysqli_query($con, "SELECT * FROM fornecedor WHERE cnpjFornecedor = '$cnpjFornecedor'");
$row = mysqli_num_rows($compara);

if (empty($nomeUsuario)){
	echo '<script>nameInvalid()</script>';
}if (empty($senhaUsuario)){
	echo '<script>passwordInvalid()</script>';
}
if (strlen($nomeUsuario) < 8){
	echo '<script>nameInvalid()</script>';
}if(strlen($senha) <= 5){
	echo '<script>passwordInvalid()</script>';
}if($email == $senha){
	echo '<script>valuesEquals()</script>';
}else{
	if($row == 1){
		echo "<script>failed()</script>";
	}if($row == 0){
		echo '<script>sucessfully()</script>';
		$sql = "insert into fornecedor(nomeFornecedor, emailFornecedor, telefoneFornecedor, celularFornecedor, enderecoFornecedor, numeroFornecedor,
			cepFornecedor, cnpjFornecedor, cidadeFornecedor, estadoFornecedor) values ('$nomeFornecedor', '$emailFornecedor', '$telefoneFornecedor', '$celularFornecedor', '$enderecoFornecedor',
			'$numeroFornecedor', '$cepFornecedor', '$cnpjFornecedor', '$cidadeFornecedor', '$estadoFornecedor')"; 
	}
}


$result = mysqli_query($con, $sql);

if($result)
	echo "Imserido";
else
	echo "Erro";



?>

</html>
</body>