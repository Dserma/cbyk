<?php

    namespace Modules\Clientes\Model;

    class Cliente{
        
        private $id;
        private $nome;
        private $email;
        private $telefone;
        
        public static function listClientes( $list ){
            
            $div    = '';
            
            foreach( $list as $c ){
                
                $div    .= '<tr>';
                    $div    .= '<td>';
                        $div    .= $c->getId();
                    $div    .= '</td>';
                    $div    .= '<td>';
                        $div    .= $c->getNome();
                    $div    .= '</td>';
                    $div    .= '<td>';
                        $div    .= $c->getEmail();
                    $div    .= '</td>';
                    $div    .= '<td>';
                        $div    .= $c->getTelefone();
                    $div    .= '</td>';
                    $div    .= '<td>';
                        $div    .= '<button class="btn btn-danger btn-sm btn-exclui" data-target="'.$c->getId().'" data-toggle="tooltip" data-placement="top" title="Excluir o Cliente">';
                        $div    .= '<span class="glyphicon glyphicon-remove"></span>';
                        $div    .= '</button>';
                        $div    .= '&nbsp;<button class="btn btn-primary btn-sm btn-edita" data-target="'.$c->getId().'" data-toggle="tooltip" data-placement="top" title="Editar o Cliente">';
                        $div    .= '<span class="glyphicon glyphicon-pencil"></span>';
                        $div    .= '</button>';
                    $div    .= '</td>';
                    
            }
            
            return $div;
            
        }
        
        function getId() {
            return $this->id;
        }

        function getNome() {
            return $this->nome;
        }

        function getEmail() {
            return $this->email;
        }

        function getTelefone() {
            return $this->telefone;
        }

        function setId($id) {
            $this->id = $id;
        }

        function setNome($nome) {
            $this->nome = $nome;
        }

        function setEmail($email) {
            $this->email = $email;
        }

        function setTelefone($telefone) {
            $this->telefone = $telefone;
        }


        
    }