<?php

    namespace Pedidos;

    use System\Template\Template;
    
    $tpl    = new Template();
    $tpl    ->setFile( __NAMESPACE__, 'New' );
    
    $js     = $tpl->makeResource(__NAMESPACE__, 'JS', 'mask');
    $js1    = $tpl->makeResource(__NAMESPACE__, 'JS', 'New');
    $rsrc   = array( $js, $js1 );
    
    
    $tpl        ->setData('id', '');
    $tpl        ->setData('nome', '');
    $tpl        ->setData('email', '' );
    $tpl        ->setData('telefone', '' );
    
    $tpl    ->publish('ajax', '', $rsrc);

