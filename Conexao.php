<?php  
	class Conexao {
		public function getConexao() {
			//Dados da conexão.
			$host = "localhost";
			$bd = "ecommerce";
			$usuariobd = "root";
			$senhabd = "";

			//Criando a conexão.
			$conexao = new mysqli($host, $usuariobd, $senhabd, $bd);

			//Verifica se a conexão deu certo.
			if(!$conexao) {
				die("Erro de conexão com local host -> ".mysqli_error($conexao));
			}

			return $conexao;
		}
	}
?>