<!DOCTYPE html>
<html>
	<body>
		<table border="1">
	      <thead>
	        <tr><th>Id</th><th>Descrição<th>Valor</th><th>Categoria</th><th>Quantidade</th></tr>
	      </thead>
      		<tbody>
      			<?php  
					$path = $_SERVER['DOCUMENT_ROOT'].'/ecommerce/';
					include_once($path.'/controllers/produto_controller.php');

					$objProduto = new Produto();
					$controllerProduto = new ProdutoController();

					$produtos = $controllerProduto->listarProdutos($objProduto);

					if(sizeof($produtos) > 0) {
						foreach($produtos as $produto) {
							echo "<tr>";
								echo "<td>";
									echo $produto['ID'];
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
      		</tbody>
    	</table>
    	<form action="" method="post">
			<button type="submit" name="novoProduto">Novo Produto</button>
		</form>

	</body>
</html>
<?php  
	if(isset($_POST['novoProduto'])) {
		header("Location: http://localhost/ecommerce/Views/produto/cadastro_produto.php");
	}
?>