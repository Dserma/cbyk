<?php

    namespace Pedidos;

    use Modules\Pedidos\Model\Pedido as pModel;
    use Modules\Pedidos\DAO\PedidoDAO;
    
    $pDAO       = new PedidoDAO();
    $conn       = unserialize(CONN);
    
    $Pedido    = new pModel();
    
    $Pedido    ->setIdCliente( $_POST['idC'] );
    $Pedido    ->setIdProduto( $_POST['idP'] );
    
    if ( $_POST['id'] !== '' ){
        
        $Pedido    ->setId( $_POST['id'] );
        $pDAO      ->updatePedido($conn->conn, $Pedido );
        
    }else{
    
        $pDAO       ->insertPedido($conn->conn, $Pedido );
        
    }
    
    echo $_POST['id'];
    
