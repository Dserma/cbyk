<?php

    namespace Pedidos;

    use Modules\Clientes\Model\Cliente as cModel;
    use Modules\Clientes\DAO\ClienteDAO;
    
    $cDAO   = new ClienteDAO;
    $conn   = unserialize(CONN);
    $cli    = new cModel();
    $cli    ->setNome( $_POST['n'] );
    $resp   = $cDAO->getClienteByNome($conn->conn, $cli);
    
    $div    = '<div class="col-md-20">';
    $div    .= '<div class="list-group">';
  
    foreach( $resp as $r ){
        
        $div    .= '<a href="#" onclick="pegaCliente(\''.$r->getId().'\');"  class="list-group-item list-nome">'.$r->getNome().'</a>';
        
    }
    
    $div    .= '</div>';
    $div    .= '</div>';
    
    echo $div;
            
    
    