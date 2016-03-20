<?php

    namespace Produtos;

    use Modules\Produtos\Model\Produto as pModel;
    use Modules\Produtos\DAO\ProdutoDAO;
    
    $pDAO       = new ProdutoDAO();
    $conn       = unserialize(CONN);
    
    $produto    = new pModel();
    $produto    ->setId( $_POST['id'] );
    
    $pDAO       ->deleteProduto($conn->conn, $produto ); 
        
    
