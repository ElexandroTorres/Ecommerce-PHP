<?php 
$path = $_SERVER['DOCUMENT_ROOT'].'/ecommerce/';
include_once($path.'/conexao.php');

class Pedido {
	private $id;
	private $valor;
	private $status;
	private $usuarioId;

	public function getId() {
		return $this->id;
	}

	public function getValor() {
		return $this->valor;
	}

	public function setValor($valor) {
		return $this->valor = $valor;
	}

	public function getStatus() {
		return $this->status;
	}

	public function setStatus($status) {
		return $this->status = $status;
	}

	public function getUsuarioID() {
		return $this->usuarioId;
	}

	public function setusUarioId($usuarioId) {
		return $this->usuarioId = $usuarioId;
	}

	public function Listar() {
		$objConexao = new Conexao();
		$conexao = $objConexao->getConexao();

		$sql = "SELECT * FROM Pedidos";
		$arrayPedidos = [];

		$resposta = mysqli_query($conexao, $sql);

		while($pedido = mysqli_fetch_assoc($resposta)) {
			array_push($arrayPedidos, $pedido);
		}

		mysqli_close($conexao);

		return $arrayPedidos;
	}
	
	public function FazerPedido() {
		$objConexao = new Conexao();
		$conexao = $objConexao->getConexao();

		$sql = "INSERT INTO Pedido (Valor, Status, Usuario_id) 
				VALUES ('$this->valor', '$this->status', '$this->usuarioId')";

		if(mysqli_query($conexao, $sql)) {
			echo "Pedido realizado com sucesso.";
			mysqli_close($conexao);
			return true;
		} else {
			echo "Erro ao fazer pedido.";
			mysqli_close($conexao);
			return false;
		}
	}

	public function Editar($id) {
		$objConexao = new Conexao();
		$conexao = $objConexao->getConexao();

		$sql = "UPDATE Pedidos SET 
			Valor = '".$this->valor."', 
			Status = '".$this->status."' 
			WHERE id = ".$id;

		if(mysqli_query($conexao, $sql)) {
			echo "Sucesso ao atualizar pedido";
			return true;
		} else {
			echo "Erro ao tentar atualizar o pedido";
			return false;
		}

		mysqli_close($conexao);
	}

	public function Remover($id) {
		$objConexao = new Conexao();
		$conexao = $objConexao->getConexao();

		$sql = "DELETE FROM Pedidos WHERE id = ".$id;		

		$resposta = mysqli_query($conexao, $sql);

		if(mysqli_query($conexao, $sql)) {
			echo "Sucesso ao remover pedido";
			return true;
		} else {
			echo "Erro ao tentar remover o pedido";
			return false;
		}

		mysqli_close($conexao);

	}
}
?>