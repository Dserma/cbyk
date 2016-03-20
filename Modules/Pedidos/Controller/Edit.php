<?php

    namespace Pedidos;

    use System\Template\Template;
    use Modules\Pedidos\Model\Pedido as pModel;
    use Modules\Pedidos\DAO\PedidoDAO;
    use Modules\Clientes\Model\Cliente as cModel;
    use Modules\Clientes\DAO\ClienteDAO;
    use Modules\Produtos\Model\Produto as prModel;
    use Modules\Produtos\DAO\ProdutoDAO;
    
    $tpl    = new Template();
    $tpl    ->setFile( __NAMESPACE__, 'Edit' );
    $js     = $tpl->makeResource(__NAMESPACE__, 'JS', 'mask');
    $js1    = $tpl->makeResource(__NAMESPACE__, 'JS', 'Edit');
    $js2    = $tpl->makeResource(__NAMESPACE__, 'JS', 'New');
    $rsrc   = array( $js, $js1, $js2 );
    
    $pro    = new pModel();
    $pro    ->setId( $_POST['id'] );
    
    $pDAO       = new PedidoDAO();
    $conn       = unserialize(CONN);
    $pedido     = $pDAO->getPedidoById($conn->conn, $pro);
    
    $cDAO       = new ClienteDAO();
    $cli        = new cModel;
    $cli        ->setId( $pedido->getIdCliente() );
    $cliente    = $cDAO->getClienteById($conn->conn, $cli);
    
    $prDAO      = new ProdutoDAO();
    $pro        = new prModel;
    $pro        ->setId( $pedido->getIdProduto() );
    $produto    = $prDAO->getProdutoById($conn->conn, $pro);
    
    $tpl        ->setData('id', $pedido->getId());
    $tpl        ->setData('idCli', $cliente->getId());
    $tpl        ->setData('cliente', $cliente->getNome());
    $tpl        ->setData('telefone', $cliente->getTelefone());
    $tpl        ->setData('email', $cliente->getEmail());
    $tpl        ->setData('idProd', $produto->getId());
    $tpl        ->setData('produto', $produto->getNome());
    $tpl        ->setData('preco', $produto->getPreco());
    
    
    
    $tpl        ->publish('ajax', '', $rsrc);

