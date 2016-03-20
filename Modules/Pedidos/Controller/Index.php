<?php
    
    namespace Pedidos;

    use System\Template\Template;
    use Modules\Pedidos\Model\Pedido as pModel;
    use Modules\Pedidos\DAO\PedidoDAO;
    use Modules\Clientes\Model\Cliente as cModel;
    use Modules\Clientes\DAO\ClienteDAO;
    
    $tpl    = new Template();
    $tpl    ->setFile( __NAMESPACE__, 'Index' );

    $js     = $tpl->makeResource(__NAMESPACE__, 'JS', 'Pedido');
    $js1    = $tpl->makeResource(__NAMESPACE__, 'JS', 'dataTable');
    $js2    = $tpl->makeResource(__NAMESPACE__, 'JS', 'dataTableB');
    $css    = $tpl->makeResource(__NAMESPACE__, 'CSS', 'dataTable');
    $rsrc   = array( $js, $js1, $js2, $css );

    $pDAO   = new PedidoDAO;
    $conn   = unserialize(CONN);
    $list   = $pDAO->listPedidos($conn->conn);
    
    if( !empty( $list[0]) ){
        
        $cDAO       = new ClienteDAO();
        
        foreach( $list as $l ){
            
            $c          = new cModel;
            $c          ->setId( $l->getIdCliente() );
            $cli        = $cDAO->getClienteById($conn->conn,$c);
            $l          ->setNmCliente( $cli->getNome() );
            $lista[]    = $l;
            
        }
        
        $Pedidos   =  pModel::listPedidos($lista);
        
    }else{
        
        $Pedidos   = '';
        
    }
    
    $tpl    ->setData('Pedidos', $Pedidos );
    $tpl    ->setData('nameSpace', __NAMESPACE__);
    $tpl    ->publish('main', 'Serma FrameWork :: Pedidos', $rsrc);
    
    
        
        
    