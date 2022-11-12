<?php 
	$path = $_SERVER['DOCUMENT_ROOT'].'/ecommerce/';
	include_once($path.'/models/Produto.php');
	
	class ProdutoController {

		public function listarProdutos($objProduto) {
			return $objProduto->Listar();
		}

		public function cadastrarProduto($objProduto) {
			if(validaDescricao($objProduto->getDescricao()) && validaValor($objProduto->getValor()) 
				&& validaCategoria($objProduto->getCategoria()) && validaQuantidade($objProduto->getQuantidade())) {
				return $objProduto->Cadastrar();
			}
		}
	}

	function validaDescricao($descricao) {
		if($descricao == null) {
			echo "É necessario adicionar uma descricao para o produto";
			return false;
		} elseif(strlen($descricao) < 5) {
			echo "A descrição deve conter pelo menos 5 caracteres";
			return false;
		}
		return true;
	}

	function validaValor($valor) {
		if($valor == null) {
			echo "É necessario informar um valor para o produto";
			return false;
		}
		return true;
	}

	function validaCategoria($categoria) {
		if($categoria == null) {
			echo "É necessario informar a categoria do produto";
			return false;
		} 
		return true;
	}

	function validaQuantidade($quantidade) {
		if($quantidade == null) {
			echo "É necessario informar a quantidade do produto=";
			return false;
		} 
		return true;
	}
?>