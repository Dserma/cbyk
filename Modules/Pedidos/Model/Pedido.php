<?php

    namespace Modules\Pedidos\Model;

    class Pedido{
        
        private $id;
        private $idCliente;
        private $nmCliente;
        private $idProduto;
        
        public static function listPedidos( $list ){
            
            $div    = '';
            
            foreach( $list as $c ){
                
                $div    .= '<tr>';
                    $div    .= '<td>';
                        $div    .= $c->getId();
                    $div    .= '</td>';
                    $div    .= '<td>';
                        $div    .= $c->getNmCliente();
                    $div    .= '</td>';
                    $div    .= '<td>';
                        $div    .= '<button class="btn btn-danger btn-sm btn-exclui" data-target="'.$c->getId().'" data-toggle="tooltip" data-placement="top" title="Excluir o Pedido">';
                        $div    .= '<span class="glyphicon glyphicon-remove"></span>';
                        $div    .= '</button>';
                        $div    .= '&nbsp;<button class="btn btn-primary btn-sm btn-edita" data-target="'.$c->getId().'" data-toggle="tooltip" data-placement="top" title="Editar o Pedido">';
                        $div    .= '<span class="glyphicon glyphicon-pencil"></span>';
                        $div    .= '</button>';
                    $div    .= '</td>';
                    
            }
            
            return $div;
            
        }
        
        function getId() {
            return $this->id;
        }

        function getIdCliente() {
            return $this->idCliente;
        }
        
        function getNmCliente() {
            return $this->nmCliente;
        }

        function getIdProduto() {
            return $this->idProduto;
        }

        function setId($id) {
            $this->id = $id;
        }

        function setIdCliente($idCliente) {
            $this->idCliente = $idCliente;
        }
        
        function setNmCliente($nmCliente) {
            $this->nmCliente = $nmCliente;
        }
        
        function setIdProduto($idProduto) {
            $this->idProduto = $idProduto;
        }

        
    }