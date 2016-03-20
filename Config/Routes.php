<?php

    namespace Config;
    
    use System\Router\Router;
    use System\Load\Load;

    class Routes{
        
        public function __construct() {
           
            $router  = new Router();
            
            $router->add('/', function() {
                 new Load('Main');
            });
            
            $router->add('/Produtos', function() {
                new Load('Produtos');
            });
            
            $router->add('/Produtos/.+', function($action) {
                new Load('Produtos', array( 'action' => $action ) );
            });
            
            $router->add('/Clientes', function() {
                new Load('Clientes');
            });
            
            $router->add('/Clientes/.+', function($action) {
                new Load('Clientes', array( 'action' => $action ) );
            });
            
            $router->add('/Pedidos', function() {
                new Load('Pedidos');
            });
            
            $router->add('/Pedidos/.+', function($action) {
                new Load('Pedidos', array( 'action' => $action ) );
            });
            
            
            $router->submit();
            
        }
       
        
    }
