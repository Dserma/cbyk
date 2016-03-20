<?php
    
    namespace Clientes;

    use System\Template\Template;
    use Modules\Clientes\Model\Cliente as cModel;
    use Modules\Clientes\DAO\ClienteDAO;
    
    $tpl    = new Template();
    $tpl    ->setFile( __NAMESPACE__, 'Index' );

    $js     = $tpl->makeResource(__NAMESPACE__, 'JS', 'Cliente');
    $js1    = $tpl->makeResource(__NAMESPACE__, 'JS', 'dataTable');
    $js2    = $tpl->makeResource(__NAMESPACE__, 'JS', 'dataTableB');
    $css    = $tpl->makeResource(__NAMESPACE__, 'CSS', 'dataTable');
    $rsrc   = array( $js, $js1, $js2, $css );

    $pDAO   = new ClienteDAO;
    $conn   = unserialize(CONN);
    $list   = $pDAO->listClientes($conn->conn);
    
    if( !empty( $list[0]) ){
        
        $Clientes   =  cModel::listClientes($list);
        
    }else{
        
        $Clientes   = '';
        
    }
    
    $tpl    ->setData('clientes', $Clientes );
    
    
    $tpl    ->setData('nameSpace', __NAMESPACE__);
    $tpl    ->publish('main', 'Serma FrameWork :: Clientes', $rsrc);
    
    
        
        
    