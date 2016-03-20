<?php

    namespace Produtos;

    use System\Template\Template;
    
    $tpl    = new Template();
    $tpl    ->setFile( __NAMESPACE__, 'Edit' );
    
    $js     = $tpl->makeResource(__NAMESPACE__, 'JS', 'New');
    $rsrc   = array( $js );
    
    
    $tpl        ->setData('id', '');
    $tpl        ->setData('nome', '');
    $tpl        ->setData('preco', '' );
    $tpl        ->setData('descricao', '' );
    
    $tpl    ->publish('ajax', '', $rsrc);

