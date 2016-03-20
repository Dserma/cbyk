<?php

    namespace Clientes;

    use System\Template\Template;
    use Modules\Clientes\Model\Cliente as cModel;
    use Modules\Clientes\DAO\ClienteDAO;
    
    $tpl    = new Template();
    $tpl    ->setFile( __NAMESPACE__, 'Edit' );
    $js     = $tpl->makeResource(__NAMESPACE__, 'JS', 'mask');
    $js1    = $tpl->makeResource(__NAMESPACE__, 'JS', 'Edit');
    $rsrc   = array( $js, $js1 );
    
    $pro    = new cModel();
    $pro    ->setId( $_POST['id'] );
    
    $cDAO       = new ClienteDAO();
    $conn       = unserialize(CONN);
    $cliente    = $cDAO->getClienteById($conn->conn, $pro);
    
    $tpl        ->setData('id', $cliente->getId() );
    $tpl        ->setData('nome', $cliente->getNome() );
    $tpl        ->setData('email', $cliente->getEmail() );
    $tpl        ->setData('telefone', $cliente->getTelefone() );
    
    $tpl    ->publish('ajax', '', $rsrc);

