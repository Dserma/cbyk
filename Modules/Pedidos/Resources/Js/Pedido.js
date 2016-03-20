$(document).ready(function() {
    
    $('#navPedidos').addClass('active');
    
    if( $('#tabPedidos').length && !$('#telefone').length ){
        
        $('#tabPedidos').DataTable({
                "scrollY"           : "300px",
                "scrollX"           : false,
                "scrollCollapse"    : false,
                "paging"            : false,
                "processing"        : true
            });
        
    }
    
    $('[data-toggle="tooltip"]').tooltip({container: 'body'});
    
    $('.btn-novo').on('click', function(){
        
        $('#modalPed').modal();
        $('.modal-title-ped').html('<span class="glyphicon glyphicon-pencil"></span> &nbsp; Inclusão de Pedido');
        
        $.ajax({
            
            url:  'Pedidos/New',
            method: 'POST',
            data: {sid: Math.random()},
            success: function(data) {
              $('.modal-body-form').html(data); 
            },
            beforeSend: function(){
              $('.modal-body-form').html('<p><span class="glyphicon glyphicon-refresh glyphicon-refresh-animate"></span> Aguarde, lendo Pedido...</p>');
            },
            complete: function(){
            }
        });
        
    });
    
    $('.btn-edita').on('click', function(){
        
        $('#modalPed').modal();
        $('.modal-title-ped').html('<span class="glyphicon glyphicon-pencil"></span> &nbsp; Edição de Pedido');
        var id = $(this).attr('data-target');
        
        $.ajax({
            
            url:  'Pedidos/Edit',
            method: 'POST',
            data: {sid: Math.random(), id: id},
            success: function(data) {
              $('.modal-body-form').html(data); 
            },
            beforeSend: function(){
              $('.modal-body-form').html('<p><span class="glyphicon glyphicon-refresh glyphicon-refresh-animate"></span> Aguarde, lendo Pedido...</p>');
            },
            complete: function(){
            }
                
        });
        
    });
    
    $('.btn-grava').on('click', function(){
        
        var id  = $('#id').val();
        
        $.ajax({
            
            url:  'Pedidos/Save',
            method: 'POST',
            data: {sid: Math.random(), id: id, idC: $('#idCli').val(), idP:$('#idProd').val()},
            success: function(data) {
              
            },
            
            beforeSend: function(){
                
                $('.modal-body-form').html('<p><span class="glyphicon glyphicon-refresh glyphicon-refresh-animate"></span> Aguarde, salvando o Pedido...</p>');
            
            },
            
            complete: function(){
                
                if( id !== '' ){
                    $('.modal-body-form').html('<p class="text-success"><h3> Pedido alterado com sucesso!</h3></p>');
                }else{
                    $('.modal-body-form').html('<p class="text-success"><h3> Pedido incluído com sucesso!</h3></p>');
                }
                
                $('.modal-footer .text-right').html('<button class="btn btn-success btn-ok"> <span class="glyphicon glyphicon-ok"></span>&nbsp;OK </button>');
                $('.btn-cancel').hide();
                $('.btn-ok').on('click', function(){
                  
                  $('#modalProd').modal('hide');
                  window.location.reload();
                  
              });
            }
        });
        
    });
    
    $('.btn-exclui').on('click', function(){
        
        $('#modalMsg').modal();
        var id = $(this).attr('data-target');
        
        $('.btn-sim').on('click', function(){
            
            $.ajax({
            
                url:  'Pedidos/Delete',
                method: 'POST',
                data: {sid: Math.random(), id: id},
                success: function(data) {

                    $('.modal-body').html(data); 

                },

                beforeSend: function(){

                  $('.modal-body').html('<p><span class="glyphicon glyphicon-refresh glyphicon-refresh-animate"></span> Aguarde, excluindo o Pedido...</p>');

                },

                complete: function(){

                    $('.modal-body').html('<p class="text-success"><h3> Pedido apagado com sucesso!</h3></p>');
                    $('.modal-footer .text-right').html('<button class="btn btn-success btn-ok"> <span class="glyphicon glyphicon-ok"></span>&nbsp;OK </button>');
                    $('.btn-cancel').hide();
                    $('.btn-ok').on('click', function(){

                      $('#mymodal').modal('hide');
                      window.location.reload();

                  });
                }
            });   
            
        });
        
    });
    
});
