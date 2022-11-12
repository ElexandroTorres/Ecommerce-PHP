<?php 
	$path = $_SERVER['DOCUMENT_ROOT'].'/ecommerce/';
	include_once($path.'/models/Produto.php');
	
	class ProdutoController {

		public function listarProdutos($objProduto) {
			return $objProduto->Listar();
		}
		/*
		public function cadastrarUsuario($objUsuario) {
			if(validaNome($objUsuario->getNome()) && validaEmail($objUsuario->getEmail()) && validaSenha($objUsuario->getSenha())) {
				return $objUsuario->Cadastrar();
			}	
		}
		*/
	}
	/*
	function validaSenha($senha) {
		if($senha == null) {
			echo "É necessario informar a senha";
			return false;
		} elseif(strlen($senha) > 100) {
			echo "A senha deve conter no maximo 100 caracteres";
			return false;
		} else if(strlen($senha) < 4) {
			echo "A senha deve conter no minimo 4 caracteres";
			return false;
		}
		return true;
	}

	function validaEmail($email) {
		if($email == null) {
			echo "O email é obrigatorio";
			return false;
		} elseif(strlen($email) > 100) {
			echo "O meial de conter no maximo 100 caracteres";
			return false;
		}
		return true;
	}

	function validaNome($nome) {
		if($nome == null) {
			echo "O nome é obrigatorio";
			return false;
		} elseif(strlen($nome) > 100) {
			echo "O nome deve conter no maximo 100 caracteres";
			return false;
		}
		return true;	
	}
	*/
?>