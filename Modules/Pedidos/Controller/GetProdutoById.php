<?php

    use Modules\Produtos\Model\Produto as pModel;
    use Modules\Produtos\DAO\ProdutoDAO;
    
    $pDAO   = new ProdutoDAO;
    $conn   = unserialize(CONN);
    $pro    = new pModel();
    $pro    ->setId( $_POST['id'] );
    $resp   = $pDAO->getProdutoById($conn->conn, $pro);
    
    $produto                = array();
    $produto['id']          = $resp->getId();
    $produto['nome']        = $resp->getNome();
    $produto['preco']       = $resp->getPreco();
    
    echo json_encode( $produto );
            
    
    