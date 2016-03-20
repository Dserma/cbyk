<?php

    namespace Clientes;

    use Modules\Clientes\Model\Cliente as cModel;
    use Modules\Clientes\DAO\ClienteDAO;
    
    $cDAO       = new ClienteDAO();
    $conn       = unserialize(CONN);
    
    $Cliente    = new cModel();
    $Cliente    ->setNome( $_POST['n'] );
    $Cliente    ->setEmail( $_POST['e'] );
    $Cliente    ->setTelefone( $_POST['t'] );
    
    if ( $_POST['id'] !== '' ){
        
        $Cliente    ->setId( $_POST['id'] );
        $cDAO       ->updateCliente($conn->conn, $Cliente );
        
    }else{
    
       $cDAO       ->insertCliente($conn->conn, $Cliente ); 
        
    }
    
    echo $_POST['id'];
    
