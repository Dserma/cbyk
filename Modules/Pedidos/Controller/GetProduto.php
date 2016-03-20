<?php

    namespace Pedidos;

    use Modules\Produtos\Model\Produto as pModel;
    use Modules\Produtos\DAO\ProdutoDAO;
    
    $pDAO   = new ProdutoDAO();
    $conn   = unserialize(CONN);
    $pro    = new pModel();
    $pro    ->setNome( $_POST['n'] );
    $resp   = $pDAO->getProdutoByNome($conn->conn, $pro);
    
    $div    = '<div class="col-md-20">';
    $div    .= '<div class="list-group">';
  
    foreach( $resp as $r ){
        
        $div    .= '<a href="#" onclick="pegaProduto(\''.$r->getId().'\');"  class="list-group-item list-nome">'.$r->getNome().'</a>';
        
    }
    
    $div    .= '</div>';
    $div    .= '</div>';
    
    echo $div;
            
    
    