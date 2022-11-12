<?php 
$path = $_SERVER['DOCUMENT_ROOT'].'/ecommerce/';
include_once($path.'/conexao.php');

class Produto {
	private $id;
	private $descricao;
	private $valor;
	private $categoria;
	private $quantidade;


	public function getId() {
		return $this->id;
	}

	public function getDescricao() {
		return $this->descricao;
	}

	public function setDescricao($descricao) {
		return $this->descricao = $descricao;
	}

	public function getValor() {
		return $this->valor;
	}

	public function setValor($valor) {
		return $this->valor = $valor;
	}

	public function getCategoria() {
		return $this->categoria;
	}

	public function setCategoria($categoria) {
		return $this->categoria = $categoria;
	}

	public function getQuantidade() {
		return $this->quantidade;
	}

	public function setQuantidade($quantidade) {
		return $this->quantidade = $quantidade;
	}
	
	public function Listar() {
		$objConexao = new Conexao();
		$conexao = $objConexao->getConexao();

		$sql = "SELECT * FROM Produtos";
		$arrayProdutos = [];

		$resposta = mysqli_query($conexao, $sql);

		while($produto = mysqli_fetch_assoc($resposta)) {
			array_push($arrayProdutos, $produto);
		}

		mysqli_close($conexao);

		return $arrayProdutos;
	}
	
	
	public function Cadastrar() {
		$objConexao = new Conexao();
		$conexao = $objConexao->getConexao();

		$sql = "INSERT INTO Produtos (Descricao, Valor, Categoria, Quantidade) 
				VALUES ('$this->descricao', '$this->valor', '$this->categoria', '$this->quantidade')";

		if(mysqli_query($conexao, $sql)) {
			echo "Produto adicionado com sucesso";
			mysqli_close($conexao);
			return true;
		} else {
			echo "Erro ao adicionar produto";
			mysqli_close($conexao);
			return false;
		}
	}
	
}
?>