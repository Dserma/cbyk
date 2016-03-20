<?php

    use Modules\Clientes\Model\Cliente as cModel;
    use Modules\Clientes\DAO\ClienteDAO;
    
    $cDAO   = new ClienteDAO;
    $conn   = unserialize(CONN);
    $cli    = new cModel();
    $cli    ->setId( $_POST['id'] );
    $resp   = $cDAO->getClienteById($conn->conn, $cli);
    
    $cliente                = array();
    $cliente['id']          = $resp->getId();
    $cliente['nome']        = $resp->getNome();
    $cliente['email']       = $resp->getEmail();
    $cliente['telefone']    = $resp->getTelefone();
    
    echo json_encode( $cliente );
            
    
    