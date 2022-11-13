<?php 
	$path = $_SERVER['DOCUMENT_ROOT'].'/ecommerce/';
	include_once($path.'/models/Carrinho.php');
	
	class CarrinhoController {

		public function listarProdutosNoCarrinho($objCarrinho) {
			return $objProduto->Listar();
		}

		public function adicionarProdutoNoCarrinho($objProduto, $objCarrinho) {
			return $objCarrinho->Adicionar($objProduto);
		}
	}
			
?>