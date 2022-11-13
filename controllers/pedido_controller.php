<?php 
	$path = $_SERVER['DOCUMENT_ROOT'].'/ecommerce/';
	include_once($path.'/models/Produto.php');
	
	class PedidoController {

		public function listarPedidos($objPedido) {
			return $objPedido->Listar();
		}

		public function cadastrarPedido($objPedido) {
			return $objPedido->FazerPedido($objPedido);
		}

		public function editarPedido($objPedido) {
			return $objPedido->Editar($objPedido->getId());	
		}

		public function excluirPedido($objPedido) {
			return $objPedido->Remover($objPedido->getId());
		}
	}

	
?>