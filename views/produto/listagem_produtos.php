<?php  
	$path = $_SERVER['DOCUMENT_ROOT'].'/ecommerce/';
	include_once($path.'/controllers/produto_controller.php');

	$objProduto = new Produto();
	$controllerProduto = new ProdutoController();

	$produtos = $controllerProduto->listarProdutos($objProduto);

	if(sizeof($produtos) > 0) {
		foreach($protudos as $produto) {
			echo "<tr>";
				echo "<td>";
					echo $produto['id'];
				echo "</td>";
				echo "<td>";
					echo $produto['Descricao'];
				echo "</td>";
				echo "<td>";
					echo $produto['Valor'];
				echo "</td>";
				echo "<td>";
					echo $produto['Categoria'];
				echo "</td>";
				echo "<td>";
					echo $produto['Quantidade'];
				echo "</td>";
			echo "</tr>";
		}
	} else {
		echo "Lista Vazia";
	}
?>
<!DOCTYPE html>
<html>
	<body>
		<form action="" method="post">
			<button type="submit" name="novoProduto">Novo Produto</button>
		</form>
	</body>
</html>
<?php  
	if(isset($_POST['novoProduto'])) {
		header("Location: http://localhost/ecommerce/Views/produto/cadastro_produto.php");
		echo "deu bom botão";
	}
?>