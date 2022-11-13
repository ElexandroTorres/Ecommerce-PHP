<?php 
$path = $_SERVER['DOCUMENT_ROOT'].'/ecommerce/';
include_once($path.'/conexao.php');

class Carrinho {
	private $id;
	private $usuarioId;
	private $produtoId;

	public function getId() {
		return $this->id;
	}

	public function getUsuarioId() {
		return $this->usuario_id;
	}

	public function setUsuarioId($usuarioId) {
		return $this->usuarioId = $usuarioId;
	}

	public function getProdutoId() {
		return $this->produtoId;
	}

	public function setProdutoId($produtoId) {
		return $this->produtoId = $produtoId;
	}

	public function Listar() {
		$objConexao = new Conexao();
		$conexao = $objConexao->getConexao();

		$sql = "SELECT * FROM Carrinho WHERE id = ".$this->id;
		$arrayProdutos = [];

		$resposta = mysqli_query($conexao, $sql);

		while($produto = mysqli_fetch_assoc($resposta)) {
			array_push($arrayProdutos, $produto);
		}

		mysqli_close($conexao);

		return $arrayProdutos;
	}
	
	
	public function Adicionar() {
		$objConexao = new Conexao();
		$conexao = $objConexao->getConexao();

		$sql = "INSERT INTO Carrinhos (Usuario_id, Produto_id) 
				VALUES ('$this->usuarioId', '$this->ProdutoId')";

		if(mysqli_query($conexao, $sql)) {
			echo "Produto adicionado no carrinho";
			mysqli_close($conexao);
			return true;
		} else {
			echo "Erro ao adicionar produto no carrinho";
			mysqli_close($conexao);
			return false;
		}
	}
	
}
?>