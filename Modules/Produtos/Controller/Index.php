<?php
    
    namespace Produtos;

    use System\Template\Template;
    use Modules\Produtos\Model\Produto as pModel;
    use Modules\Produtos\DAO\ProdutoDAO;
    
    $tpl    = new Template();
    $tpl    ->setFile( __NAMESPACE__, 'Index' );

    $js     = $tpl->makeResource(__NAMESPACE__, 'JS', 'Produto');
    $css    = $tpl->makeResource(__NAMESPACE__, 'CSS', 'Produto');
    $rsrc   = array( $js, $css );

    $pDAO   = new ProdutoDAO;
    $conn   = unserialize(CONN);
    $list   = $pDAO->listProdutos($conn->conn);
    
    if( !empty( $list[0]) ){
        
        $produtos   =  pModel::listProdutos($list);
        
    }else{
        
        $produtos   = 'Nenhum produto cadastrado!';
        
    }
    
    $tpl    ->setData('produtos', $produtos );
    $tpl    ->setData('x', count($list) );
    
    $tpl    ->setData('nameSpace', __NAMESPACE__);
    $tpl    ->publish('main', 'Serma FrameWork :: Produtos', $rsrc);
    
    
        
        
    