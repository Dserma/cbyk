$(document).ready(function() {
    
    $('#cliente').on('keyup', function(){
        
        if( $('#cliente').val().length > 0 ){
        
            $.ajax({

                url:  'Pedidos/GetCliente',
                method: 'POST',
                data: {sid: Math.random(), n: $('#cliente').val()},
                success: function(data) {
                    $('#respCliente').css('zIndex', '5000'); 
                    $('#respCliente').css('position', 'absolute');
                    $('#respCliente').css('width', '400px');
                    $('#respCliente').addClass('in'); 
                    $('#respCliente').html(data); 
                  
                },
                beforeSend: function(){
                  $('#respCliente').html('<p><span class="glyphicon glyphicon-refresh glyphicon-refresh-animate"></span> Aguarde, pesquisando clientes...</p>');
                },
                complete: function(){
                }
            });
            
        }else{
            
            $('#respCliente').removeClass('in'); 
            $('#respCliente').html(''); 
            
        }

    });
    
    $('#produto').on('keyup', function(){
        
        if( $('#produto').val().length > 0 ){
        
            $.ajax({

                url:  'Pedidos/GetProduto',
                method: 'POST',
                data: {sid: Math.random(), n: $('#produto').val()},
                success: function(data) {
                    $('#respProduto').css('zIndex', '5000'); 
                    $('#respProduto').css('position', 'absolute');
                    $('#respProduto').css('width', '400px');
                    $('#respProduto').addClass('in'); 
                    $('#respProduto').html(data); 
                },
                beforeSend: function(){
                  $('#respProduto').html('<p><span class="glyphicon glyphicon-refresh glyphicon-refresh-animate"></span> Aguarde, pesquisando produtos...</p>');
                },
                complete: function(){
                }
            });
            
        }else{
            
            $('#respProduto').removeClass('in'); 
            $('#respProduto').html(''); 
            
        }

    });
    
});

    function pegaCliente(id){
        
        $.ajax({

            url:  'Pedidos/GetClienteById',
            method: 'POST',
            data: {sid: Math.random(), id: id},
            dataType: 'json',
            success: function(json) {
                $('#idCli').val(json.id);
                $('#email').val(json.email);
                $('#telefone').val(json.telefone);
                $('#cliente').val(json.nome);
                $('#cliente').attr('readonly', 'readonly');
                $('#respCliente').removeClass('in'); 
                $('#blocoCliente').addClass('in');
                $('#blocoProdutos').addClass('in');
                if( $('#alterar').length > 0 ){
                    
                   $('#alterar').removeAttr('disabled');
                    
                }
            },
            beforeSend: function(){
              $('#respCliente').html('<p><span class="glyphicon glyphicon-refresh glyphicon-refresh-animate"></span> Aguarde, pesquisando clientes...</p>');
            },
            complete: function(){
                $('#respCliente').html('');
            }
            
        });
        
    }
    
    function pegaProduto(id){
        
        $.ajax({

            url:  'Pedidos/GetProdutoById',
            method: 'POST',
            data: {sid: Math.random(), id: id},
            dataType: 'json',
            success: function(json) {
                $('#idProd').val(json.id);
                $('#preco').val(json.preco);
                $('#produto').val(json.nome);
                $('#produto').attr('readonly', 'readonly');
                $('#respProduto').removeClass('in'); 
                $('#blocoProdutos_').addClass('in');
                if( $('#alterarp').length > 0 ){
                    
                   $('#alterarp').removeAttr('disabled');
                    
                }
            },
            beforeSend: function(){
                $('#respProduto').html('<p><span class="glyphicon glyphicon-refresh glyphicon-refresh-animate"></span> Aguarde, pesquisando clientes...</p>');
            },
            complete: function(){
                $('#respProduto').html('');
            }
            
        });
        
    }
