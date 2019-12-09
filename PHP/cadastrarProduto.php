<?php
$con = mysqli_connect("localhost", "root", "", "NIXIS");
mysqli_set_charset($con,"utf8");
?>

<html>
<head>
<title></title>
<script type="text/javascript">
	function cadastrado(){
		setTimeout("window.location='../HTML/cadastrarProduto.html'", 900);
		alert("Cadastrado com Sucesso!");
	}

	function failed(){
		setTimeout("window.location='../HTML/cadastrarProduto.html'", 1000);
		alert("Dados já existente, tente novamente!");
	}
</script>
</head>
<body>

<?php
$nomeProduto = $_POST['nome_produto'];
$marcaProduto = $_POST['marca'];
$numeracaoProduto = $_POST['numeracao'];
$quantidadeProduto = $_POST['quantidade'];
$valorCusto = $_POST['valor_custo'];
$valorVenda = $_POST['valor_venda'];
$fornecedorProduto = $_POST['fornecedor'];
$categoriaProduto = $_POST['categoria_produto'];
$corProduto = $_POST['cor'];

$compara = mysqli_query($con, "SELECT * FROM produtos WHERE marca = '$marcaProduto' and numeracao = '$numeracaoProduto' and categoria_produto = '$categoriaProduto' and cor = '$corProduto' and quantidade = '$quantidadeProduto'");
$row = mysqli_num_rows($compara);

if($row > 0){
	echo "<script>failed()</script>";
}if($row == 0){
	$sql = "insert into produtos(nome_produto, marca, numeracao, quantidade, valor_custo, valor_venda, fornecedor,
	categoria_produto, cor) values ('$nomeProduto ', '$marcaProduto', '$numeracaoProduto', '$quantidadeProduto', '$valorCusto',
	 '$valorVenda', '$fornecedorProduto', '$categoriaProduto', '$corProduto')";
	 echo '<script>cadastrado()</script>';
}
$result = mysqli_query($con, $sql);



?>
</html>
</body>