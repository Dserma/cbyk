<?php

    namespace Produtos;

    use System\Template\Template;
    use Modules\Produtos\Model\Produto as pModel;
    use Modules\Produtos\DAO\ProdutoDAO;
    
    $tpl    = new Template();
    $tpl    ->setFile( __NAMESPACE__, 'Edit' );
    
    $js     = $tpl->makeResource(__NAMESPACE__, 'JS', 'Edit');
    $rsrc   = array( $js );
    
    $pro    = new pModel();
    $pro    ->setId( $_POST['id'] );
    
    $pDAO       = new ProdutoDAO();
    $conn       = unserialize(CONN);
    $produto    = $pDAO->getProdutoById($conn->conn, $pro);
    
    $tpl        ->setData('id', $produto->getId() );
    $tpl        ->setData('nome', $produto->getNome() );
    $tpl        ->setData('preco', $produto->getPreco() );
    $tpl        ->setData('descricao', $produto->getDescricao() );
    
    $tpl    ->publish('ajax', '', $rsrc);

