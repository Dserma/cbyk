<?php

    namespace Clientes;

    use Modules\Clientes\Model\Cliente as pModel;
    use Modules\Clientes\DAO\ClienteDAO;
    
    $pDAO       = new ClienteDAO();
    $conn       = unserialize(CONN);
    
    $Cliente    = new pModel();
    $Cliente    ->setId( $_POST['id'] );
    
    $pDAO       ->deleteCliente($conn->conn, $Cliente ); 
        
    
