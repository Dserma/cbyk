<?php

    namespace Modules\Clientes\DAO;
    
    use \Modules\Clientes\Model\Cliente;
    
    class ClienteDAO{
        
        public function listClientes($conn){
            
            $sql    = " SELECT
                            *
                        FROM
                            Cliente
                      ";
            
            try{
                
                $rs = $conn->prepare($sql);
                $rs->execute();
                $regs = $rs->fetchAll();
                $count  = count($regs);
                
                if( $count > 0 ){

                  foreach ($regs as $reg){
                      
                      $cliente     = new Cliente();
                      $cliente     ->setId( $reg->id );
                      $cliente     ->setNome( $reg->nome );
                      $cliente     ->setEmail( $reg->email );
                      $cliente     ->setTelefone( $reg->telefone );
                      $list[]       = $cliente;
                      
                  }
                  
                }else{
                      
                      $list  = '';
                      
                  }
                  
                  return $list;
                
            } catch (\PDOException $err) {
                
                \DAO\Conn\PDO::makeError($err);

            }
            
        }
        
        public function getClienteById($conn,$cli){
            
            $sql    = " SELECT
                            *
                        FROM
                            Cliente
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
                      
                      $cliente     = new Cliente();
                      $cliente     ->setId( $reg->id );
                      $cliente     ->setNome( $reg->nome );
                      $cliente     ->setEmail( $reg->email );
                      $cliente     ->setTelefone( $reg->telefone );
                      
                  }
                  
                }else{
                      
                      $cliente  = '';
                      
                  }
                  
                  return $cliente;
                
            } catch (\PDOException $err) {
                
                \DAO\Conn\PDO::makeError($err);

            }
            
        }
        
        
        public function insertCliente($conn, $cliente){
            
            $sql    = " INSERT INTO Cliente (
                            nome, 
                            email, 
                            telefone
                        )VALUES(
                            :nome,
                            :email,
                            :telefone
                        )
                      ";
            
            try{
                
                $rs = $conn->prepare($sql);
                $rs->bindParam(':nome', $cliente->getNome(), \PDO::PARAM_STR);
                $rs->bindParam(':email', $cliente->getEmail(), \PDO::PARAM_STR);
                $rs->bindParam(':telefone', $cliente->getTelefone(), \PDO::PARAM_STR);
                $rs->execute();
            
            }catch (\PDOException $err) {
                
                \DAO\Conn\PDO::makeError($err);

            }
            
        }
        
        public function updateCliente($conn, $cliente){
            
            $sql    = " UPDATE
                            Cliente 
                        SET
                            nome        = :nome,
                            email       = :email,
                            telefone    = :telefone
                        WHERE
                            id          = :idCli
                      ";
            
            try{
                
                $rs = $conn->prepare($sql);
                $rs->bindParam(':idCli', $cliente->getId(), \PDO::PARAM_INT);
                $rs->bindParam(':nome', $cliente->getNome(), \PDO::PARAM_STR);
                $rs->bindParam(':email', $cliente->getEmail(), \PDO::PARAM_STR);
                $rs->bindParam(':telefone', $cliente->getTelefone(), \PDO::PARAM_STR);
                $rs->execute();
            
            }catch (\PDOException $err) {
                
                \DAO\Conn\PDO::makeError($err);

            }
            
        }
        
        public function deleteCliente($conn, $cliente){
            
            $sql    = " DELETE FROM
                            Cliente
                        WHERE
                            id  = :idCli
                      ";
            
            try{
                
                $rs = $conn->prepare($sql);
                $rs->bindParam(':idCli', $cliente->getId(), \PDO::PARAM_STR);
                $rs->execute();
            
            }catch (\PDOException $err) {
                
                \DAO\Conn\PDO::makeError($err);

            }
            
        }
        
        public function getClienteByNome($conn,$cli){
            
            $sql    = " SELECT
                            *
                        FROM
                            Cliente
                        WHERE
                            nome  LIKE :nmCli
                      ";
            
            try{
                
                $rs = $conn->prepare($sql);
                $nome   = $cli->getNome();
                $like   = "%".$nome."%";
                $rs->bindParam(':nmCli', $like, \PDO::PARAM_STR);
                $rs->execute();
                $regs = $rs->fetchAll();
                $count  = count($regs);
                
                if( $count > 0 ){

                  foreach ($regs as $reg){
                      
                      $cliente      = new Cliente();
                      $cliente      ->setId( $reg->id );
                      $cliente      ->setNome( $reg->nome );
                      $lista[]      = $cliente;    
                      
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

