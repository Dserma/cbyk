<?php

    namespace Produtos;

    use Modules\Produtos\Model\Produto as pModel;
    use Modules\Produtos\DAO\ProdutoDAO;
    
    $pDAO       = new ProdutoDAO();
    $conn       = unserialize(CONN);
    
    $produto    = new pModel();
    $produto    ->setNome( $_POST['n'] );
    $produto    ->setPreco( $_POST['p'] );
    $produto    ->setDescricao( $_POST['d'] );
    
    if ( $_POST['id'] !== '' ){
        
        $produto    ->setId( $_POST['id'] );
        $pDAO       ->updateProduto($conn->conn, $produto );
        
    }else{
    
       $pDAO       ->insertProduto($conn->conn, $produto ); 
        
    }
    
