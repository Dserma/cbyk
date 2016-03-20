<?php
    
    namespace Main;

    use System\Template\Template;
    
    $tpl        = new Template();
    $tpl        ->setFile( __NAMESPACE__, 'Index' );
    $rsrc       = array( $js, $js1 );
    
    $tpl        ->setData( "nameSpace", __NAMESPACE__);
    $tpl        ->publish('main', 'Serma FrameWork :: Home', $rsrc);