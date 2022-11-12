<?php 
$path = $_SERVER['DOCUMENT_ROOT'].'/ecommerce/';
include_once($path.'/conexao.php');

class Usuario {
	private $id;
	private $nome;
	private $email;
	private $senha;
	private $endereco;


	public function getId() {
		return $this->id;
	}

	public function setId($id) {
		return $this->id = $id;
	}

	public function getNome() {
		return $this->nome;
	}

	public function setNome($nome) {
		return $this->nome = $nome;
	}

	public function getEmail() {
		return $this->email;
	}

	public function setEmail($email) {
		return $this->email = $email;
	}

	public function getSenha() {
		return $this->senha;
	}

	public function setSenha($senha) {
		return $this->senha = $senha;
	}

	public function getEndereco() {
		return $this->endereco;
	}

	public function setEndereco($endereco) {
		return $this->endereco = $endereco;
	}

	public function Login() {
		$objConexao = new Conexao();
		$conexao = $objConexao->getConexao();

		$sql = "SELECT id, Nome, Email, Senha FROM Usuarios 
				WHERE email = '".$this->getEmail()."'";

		$resposta = $conexao->query($sql);
		$usuario = $resposta->fetch_assoc();

		if(!$usuario) {
			echo "Email não cadastrado";
			return false; 
		} elseif($usuario["Senha"] != $this->getSenha()) {
			echo "Senha incorreta.";
			return false;
		} else {
			//$this->setId($usuario["ID"]);//prestar atenção nisso.
			return true;
		}

		mysqli_close($conexao);
	}

	public function Cadastrar() {
		$objConexao = new Conexao();
		$conexao = $objConexao->getConexao();

		$sqlComand = "INSERT INTO Usuarios (Nome, Email, Senha, Endereco) 
					VALUES ('$this->nome', '$this->email', '$this->senha', '$this->endereco')";

		if(mysqli_query($conexao, $sqlComand)) {
			echo "Sucesso";
			return true;
		} else {
			echo "Erro";
			return false;
		}
		mysqli_close($conexao);
	}

	public function Editar($id) {
		$objConexao = new Conexao();
		$conexao = $objConexao->getConexao();

		$sql = "UPDATE Usuarios SET 
			Nome = '".$this->nome."', 
			Email = '".$this->email."', 
			Senha = '".$this->senha."', 
			Endereco = '".$this->endereco."' 
			WHERE id = ".$id;

		if(mysqli_query($conexao, $sql)) {
			echo "Sucesso";
			return true;
		} else {
			echo "Erro";
			return false;
		}

		mysqli_close($conexao);
	}

	public function Excluir($id) {
		$objConexao = new Conexao();
		$conexao = $objConexao->getConexao();

		$sql = "DELETE FROM Carrinhos WHERE id = ".$id;		

		$resposta = mysqli_query($conexao, $sql);

		if(mysqli_query($conexao, $sql)) {
			echo "Sucesso";
			return true;
		} else {
			echo "Erro";
			return false;
		}

		mysqli_close($conexao);

	}
}
?>