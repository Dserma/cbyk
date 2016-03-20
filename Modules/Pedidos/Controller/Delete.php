<?php

    namespace Pedidos;

    use Modules\Pedidos\Model\Pedido as pModel;
    use Modules\Pedidos\DAO\PedidoDAO;
    
    $pDAO       = new PedidoDAO();
    $conn       = unserialize(CONN);
    
    $Pedido    = new pModel();
    $Pedido    ->setId( $_POST['id'] );
    
    $pDAO       ->deletePedido($conn->conn, $Pedido ); 
        
    
