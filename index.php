<!DOCTYPE html>
<html>
<body>
	<form action="" method="post">
		Email: <input type="text" name="email" value=""> <br>
		Senha: <input type="text" name="senha" value=""> <br>
		<button type="submit" name="logar">Entrar</button>
		<button type="submit" name="cadastrar">Cadastrar</button>
	</form>
</body>
</html>

<?php
	$path = $_SERVER['DOCUMENT_ROOT'].'/ecommerce/';
	include_once($path.'/controllers/usuario_controller.php');

	if(isset($_POST['logar'])) {
		$objUsuario = new Usuario();
		$objUsuario->setEmail($_POST['email']);
		$objUsuario->setSenha($_POST['senha']);

		$controllerUsuario = new UsuarioController();
		$resposta = $controllerUsuario->validaUsuario($objUsuario);

		if($resposta == true) {
			session_start();
			$_SESSION['usuario_id'] = $objUsuario->getId();
			header("Location: http://localhost/ecommerce/Views/Produto/listagem_produtos.php");
		} else {
			echo $resposta;
		}
	}

	if(isset($_POST['cadastrar'])) {
		header("Location: http://localhost/ecommerce/Views/usuario/cadastro_usuario.php");
	}
?>