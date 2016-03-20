<?php

    namespace Modules\Pedidos\DAO;
    
    use \Modules\Pedidos\Model\Pedido;
    
    class PedidoDAO{
        
        public function listPedidos($conn){
            
            $sql    = " SELECT
                            *
                        FROM
                            Pedido
                      ";
            
            try{
                
                $rs = $conn->prepare($sql);
                $rs->execute();
                $regs = $rs->fetchAll();
                $count  = count($regs);
                
                if( $count > 0 ){

                  foreach ($regs as $reg){
                      
                      $Pedido     = new Pedido();
                      $Pedido     ->setId( $reg->id );
                      $Pedido     ->setIdCliente( $reg->id_cliente );
                      $Pedido     ->setIdProduto( $reg->id_produto );
                      $list[]   = $Pedido;
                      
                  }
                  
                }else{
                      
                      $list  = '';
                      
                  }
                  
                  return $list;
                
            } catch (\PDOException $err) {
                
                \DAO\Conn\PDO::makeError($err);

            }
            
        }
        
        public function getPedidoById($conn,$cli){
            
            $sql    = " SELECT
                            *
                        FROM
                            Pedido
                        WHERE
                            id  = :idCli
                      ";
            
            try{
                
                $rs = $conn->prepare($sql);
                $rs->bindParam(':idCli', $cli->getId(), \PDO::PARAM_INT);
                $rs->execute();
                $regs = $rs->fetchAll();
                $count  = count($regs);
                
                if( $count > 0 ){

                  foreach ($regs as $reg){
                      
                      $Pedido     = new Pedido();
                      $Pedido     ->setId( $reg->id );
                      $Pedido     ->setIdCLiente( $reg->id_cliente );
                      $Pedido     ->setIdProduto( $reg->id_produto );
                      
                  }
                  
                }else{
                      
                      $Pedido  = '';
                      
                  }
                  
                  return $Pedido;
                
            } catch (\PDOException $err) {
                
                \DAO\Conn\PDO::makeError($err);

            }
            
        }
        
        
        public function insertPedido($conn, $Pedido){
            
            $sql    = " INSERT INTO Pedido (
                            id_cliente, 
                            id_produto 
                        )VALUES(
                            :idCliente,
                            :idProduto
                        )
                      ";
            
            try{
                
                $rs = $conn->prepare($sql);
                $rs->bindParam(':idCliente', $Pedido->getIdCliente(), \PDO::PARAM_INT);
                $rs->bindParam(':idProduto', $Pedido->getIdProduto(), \PDO::PARAM_INT);
                $rs->execute();
            
            }catch (\PDOException $err) {
                
                \DAO\Conn\PDO::makeError($err);

            }
            
        }
        
        public function updatePedido($conn, $Pedido){
            
            $sql    = " UPDATE
                            Pedido 
                        SET
                            id_cliente  = :idCli,
                            id_produto  = :idProd
                        WHERE
                            id          = :id
                      ";
            
            try{
                
                $rs = $conn->prepare($sql);
                $rs->bindParam(':id', $Pedido->getId(), \PDO::PARAM_INT);
                $rs->bindParam(':idCli', $Pedido->getIdCliente(), \PDO::PARAM_INT);
                $rs->bindParam(':idProd', $Pedido->getIdProduto(), \PDO::PARAM_INT);
                $rs->execute();
            
            }catch (\PDOException $err) {
                
                \DAO\Conn\PDO::makeError($err);

            }
            
        }
        
        public function deletePedido($conn, $Pedido){
            
            $sql    = " DELETE FROM
                            Pedido
                        WHERE
                            id  = :idCli
                      ";
            
            try{
                
                $rs = $conn->prepare($sql);
                $rs->bindParam(':idCli', $Pedido->getId(), \PDO::PARAM_STR);
                $rs->execute();
            
            }catch (\PDOException $err) {
                
                \DAO\Conn\PDO::makeError($err);

            }
            
        }

    }

