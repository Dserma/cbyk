<?php

    namespace Modules\Produtos\Model;

    class Produto{
        
        private $id;
        private $nome;
        private $descricao;
        private $preco;
        
        public static function listProdutos( $list ){
            
            $div    = '';
            
            foreach( $list as $p ){
                
                $div    .= '<div class="panel panel-primary">';
                    $div    .= '<div class="panel-heading">';
                        $div    .= '<div class="panel-title">';
                            $div    .= '<a role="button" data-toggle="collapse" data-parent="#accordion" href="#produto_'.$p->getId().'" aria-expanded="false" aria-controls="produto_'.$p->getId().'">';
                                $div    .= '<span class="glyphicon glyphicon-chevron-right collProdHead"> </span>';
                                $div    .= '&nbsp;'.$p->getNome();
                            $div    .= '</a>';
                        $div    .= '</div>';
                    $div    .= '</div>';
                    $div    .= '<div id="produto_'.$p->getId().'" class="panel-collapse collapse collProd" role="tabpanel" aria-labelledby="">';
                        $div    .= '<div class="panel-body">';
                            $div    .= '<form role="form" class="form-horizontal">';
                                $div    .= '<div class="form-group">';
                                    $div    .= '<div class="col-md-2">';
                                        $div    .= '<label for="preco">Preço (R$):</label>';
                                        $div    .= '<input type="text" class="form-control" readonly id="" value ="'.$p->getPreco().'">';
                                    $div    .= '</div>';
                                $div    .= '</div>';
                                $div    .= '<div class="form-group">';
                                    $div    .= '<div class="col-md-6">';
                                        $div    .= '<label for="descricao">Descrição:</label>';
                                        $div    .= '<textarea cols="40" class="form-control" readonly rows="5" id="">'.$p->getDescricao().'</textarea>';
                                    $div    .= '</div>';
                                $div    .= '</div>';
                              $div    .= '</form>';
                        $div    .= '</div>';
                        $div    .= '<div class="panel-footer">';
                            $div    .= '<div class="text-right">';
                                $div    .= '<button class="btn btn-danger btn-exclui" data-target="'.$p->getId().'">';
                                $div    .= '<span class="glyphicon glyphicon-remove"> </span>';
                                    $div    .= '&nbsp;Excluir';
                                $div    .= '</button>&nbsp';
                                $div    .= '<button class="btn btn-primary btn-edita" data-target="'.$p->getId().'">';
                                    $div    .= '<span class="glyphicon glyphicon-pencil"> </span>';
                                    $div    .= '&nbsp;Editar';
                                $div    .= '</button>';
                            $div    .= '</div>';
                        $div    .= '</div>';
                    $div    .= '</div>';
                $div    .= '</div>';
                
            }
            
            return $div;
            
        }
        
        
        function getId() {
            return $this->id;
        }

        function getNome() {
            return $this->nome;
        }

        function getDescricao() {
            return $this->descricao;
        }

        function getPreco() {
            return $this->preco;
        }
        
        function setId($id) {
            $this->id = $id;
        }

        function setNome($nome) {
            $this->nome = $nome;
        }

        function setDescricao($descricao) {
            $this->descricao = $descricao;
        }

        function setPreco($preco) {
            $this->preco = $preco;
        }


        
    }