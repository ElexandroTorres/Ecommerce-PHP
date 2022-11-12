<!DOCTYPE html>
<html>
	<body>
		<form action="" method="post">
			Nome: <input type="text" name="nome" value=""> <br>
			Email: <input type="text" name="email" value=""> <br>
			Senha: <input type="text" name="senha" value=""> <br>
			<button type="submit" name="cadastrar">Cadastrar</button>
		</form>
	</body>
</html>

<?php
	$path = $_SERVER['DOCUMENT_ROOT'].'/ecommerce/';
	include_once($path.'/controllers/usuario_controller.php');

	//Verificar se uma variavel foi inicializada.
	if(isset($_POST['cadastrar'])) {
		$objUsuario = new Usuario();
		$objUsuario->setNome($_POST['nome']);
		$objUsuario->setEmail($_POST['email']);
		$objUsuario->setSenha($_POST['senha']);

		$controllerUsuario = new UsuarioController();

		$resposta = $controllerUsuario->cadastrarUsuario($objUsuario);

		if($resposta == "Sucesso") {
			header("Location: http://localhost/ecommerce/Views/Produto/listagem_produtos.php");
		} else {
			echo $resposta;
		}
	}
?>