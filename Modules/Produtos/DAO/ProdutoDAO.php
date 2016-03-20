<?php

    namespace Modules\Produtos\DAO;
    
    use \Modules\Produtos\Model\Produto;
    
    class ProdutoDAO{
        
        public function listProdutos($conn){
            
            $sql    = " SELECT
                            *
                        FROM
                            Produto
                      ";
            
            try{
                
                $rs = $conn->prepare($sql);
                $rs->execute();
                $regs = $rs->fetchAll();
                $count  = count($regs);
                
                if( $count > 0 ){

                  foreach ($regs as $reg){
                      
                      $produto     = new Produto();
                      $produto     ->setId( $reg->id );
                      $produto     ->setNome( $reg->nome );
                      $produto     ->setPreco( $reg->preco );
                      $produto     ->setDescricao( $reg->descricao );
                      $list[]   = $produto;
                      
                  }
                  
                }else{
                      
                      $list  = '';
                      
                  }
                  
                  return $list;
                
            } catch (\PDOException $err) {
                
                \DAO\Conn\PDO::makeError($err);

            }
            
        }
        
        public function getProdutoById($conn,$prod){
            
            $sql    = " SELECT
                            *
                        FROM
                            Produto
                        WHERE
                            id  = :idProd
                      ";
            
            try{
                
                $rs = $conn->prepare($sql);
                $rs->bindParam(':idProd', $prod->getId(), \PDO::PARAM_INT);
                $rs->execute();
                $regs = $rs->fetchAll();
                $count  = count($regs);
                
                if( $count > 0 ){

                  foreach ($regs as $reg){
                      
                      $produto     = new Produto();
                      $produto     ->setId( $reg->id );
                      $produto     ->setNome( $reg->nome );
                      $produto     ->setPreco( $reg->preco );
                      $produto     ->setDescricao( $reg->descricao );
                      
                  }
                  
                }else{
                      
                      $produto  = '';
                      
                  }
                  
                  return $produto;
                
            } catch (\PDOException $err) {
                
                \DAO\Conn\PDO::makeError($err);

            }
            
        }
        
        
        public function insertProduto($conn, $produto){
            
            $sql    = " INSERT INTO Produto (
                            nome, 
                            preco, 
                            descricao
                        )VALUES(
                            :nome,
                            :preco,
                            :descricao
                        )
                      ";
            
            try{
                
                $rs = $conn->prepare($sql);
                $rs->bindParam(':nome', $produto->getNome(), \PDO::PARAM_STR);
                $rs->bindParam(':preco', $produto->getPreco(), \PDO::PARAM_STR);
                $rs->bindParam(':descricao', $produto->getDescricao(), \PDO::PARAM_STR);
                $rs->execute();
            
            }catch (\PDOException $err) {
                
                \DAO\Conn\PDO::makeError($err);

            }
            
        }
        
        public function updateProduto($conn, $produto){
            
            $sql    = " UPDATE
                            Produto 
                        SET
                            nome        = :nome,
                            preco       = :preco,
                            descricao   = :descricao
                        WHERE
                            id          = :idProd
                      ";
            
            try{
                
                $rs = $conn->prepare($sql);
                $rs->bindParam(':idProd', $produto->getId(), \PDO::PARAM_INT);
                $rs->bindParam(':nome', $produto->getNome(), \PDO::PARAM_STR);
                $rs->bindParam(':preco', $produto->getPreco(), \PDO::PARAM_STR);
                $rs->bindParam(':descricao', $produto->getDescricao(), \PDO::PARAM_STR);
                $rs->execute();
            
            }catch (\PDOException $err) {
                
                \DAO\Conn\PDO::makeError($err);

            }
            
        }
        
        public function deleteProduto($conn, $produto){
            
            $sql    = " DELETE FROM
                            Produto
                        WHERE
                            id  = :idProd
                      ";
            
            try{
                
                $rs = $conn->prepare($sql);
                $rs->bindParam(':idProd', $produto->getId(), \PDO::PARAM_STR);
                $rs->execute();
            
            }catch (\PDOException $err) {
                
                \DAO\Conn\PDO::makeError($err);

            }
            
        }
        
        public function getProdutoByNome($conn,$pro){
            
            $sql    = " SELECT
                            *
                        FROM
                            Produto
                        WHERE
                            nome  LIKE :nmPro
                      ";
            
            try{
                
                $rs = $conn->prepare($sql);
                $nome   = $pro->getNome();
                $like   = "%".$nome."%";
                $rs->bindParam(':nmPro', $like, \PDO::PARAM_STR);
                $rs->execute();
                $regs = $rs->fetchAll();
                $count  = count($regs);
                
                if( $count > 0 ){

                  foreach ($regs as $reg){
                      
                      $produto      = new Produto();
                      $produto      ->setId( $reg->id );
                      $produto      ->setNome( $reg->nome );
                      $lista[]      = $produto;    
                      
                  }
                  
                }else{
                      
                      $lista[]  = '';
                      
                  }
                  
                  return $lista;
                
            } catch (\PDOException $err) {
                
                \DAO\Conn\PDO::makeError($err);

            }
            
        }

    }

