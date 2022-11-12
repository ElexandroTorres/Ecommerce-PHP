<html>
	<body>
		<form action="" method="post">
			<h1>Cadastro de usuarios</h1>
			Nome: <input type="text" name="nome" value="<?php echo $usuario['Nome'] ?>"><br>
			Email: <input type="text" name="email" value="<?php echo $usuario['Email'] ?>"><br
			>
			Senha: <input type="text" name="senha" value="<?php echo $usuario['Senha'] ?>"><br>
			Endereco: <input type="text" name="endereco" value="<?php echo $usuario['Endereco'] ?>"><br>
			<button type="submit" name="editar">Editar</button>
		</form>
		<a href="http://localhost/ecommerce/Views/Produto/listagem_produtos.php"><button type="submit">Listagem de produtos</button></a>
	</body>

</html>

<?php  
session_start();
$usuario = $controllerUsuario->getUsuario($_SESSION['usuario_id']);

if(isset($_POST['editar'])) {
	$objUsuario = new Usuario($_POST['nome'], $_POST['email'], $_POST['senha'], $_POST['endereco']);

	$controllerUsuario = new UsuarioController();

	$resposta = $controllerUsuario->editarUsuario($usuario['id'], $objUsuario);

	if($resposta == "Sucesso") {
		$usuario = $controllerUsuario->getUsuario($_SESSION['usuario_id']);
		echo "Conta salva com suceso";
	} else {
		echo $resposta;
	}
}

?>