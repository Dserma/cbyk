$(document).ready(function() {
    
    
    $('#navClientes').addClass('active');
    
    if( $('#tabClientes').length && !$('#telefone').length ){
        
        $('#tabClientes').DataTable({
                "scrollY"           : "300px",
                "scrollX"           : false,
                "scrollCollapse"    : false,
                "paging"            : false,
                "processing"        : true
            });
        
    }
    
    $('[data-toggle="tooltip"]').tooltip({container: 'body'});
    
    $('.btn-novo').on('click', function(){
        
        $('#modalProd').modal();
        $('.modal-title').html('<span class="glyphicon glyphicon-pencil"></span> &nbsp; Inclusão de Cliente');
        
        $.ajax({
            
            url:  'Clientes/New',
            method: 'POST',
            data: {sid: Math.random()},
            success: function(data) {
              $('.modal-body-form').html(data); 
            },
            beforeSend: function(){
              $('.modal-body-form').html('<p><span class="glyphicon glyphicon-refresh glyphicon-refresh-animate"></span> Aguarde, lendo Cliente...</p>');
            },
            complete: function(){
            }
        });
        
    });
    
    $('.btn-edita').on('click', function(){
        
        $('#modalProd').modal();
        var id = $(this).attr('data-target');
        
        $.ajax({
            
            url:  'Clientes/Edit',
            method: 'POST',
            data: {sid: Math.random(), id: id},
            success: function(data) {
              $('.modal-body-form').html(data); 
            },
            beforeSend: function(){
              $('.modal-body-form').html('<p><span class="glyphicon glyphicon-refresh glyphicon-refresh-animate"></span> Aguarde, lendo Cliente...</p>');
            },
            complete: function(){
            }
                
        });
        
    });
    
    $('.btn-grava').on('click', function(){
        
        var idCli  = $('#id').val();
        
        $.ajax({
            
            url:  'Clientes/Save',
            method: 'POST',
            data: {sid: Math.random(), id: idCli, n: $('#nome').val(), e:$('#email').val(), t:$('#telefone').val()},
            success: function(data) {
              
            },
            
            beforeSend: function(){
                
                $('.modal-body-form').html('<p><span class="glyphicon glyphicon-refresh glyphicon-refresh-animate"></span> Aguarde, salvando Cliente...</p>');
            
            },
            
            complete: function(){
                
                if( idCli !== '' ){
                    $('.modal-body-form').html('<p class="text-success"><h3> Cliente alterado com sucesso!</h3></p>');
                }else{
                    $('.modal-body-form').html('<p class="text-success"><h3> Cliente incluído com sucesso!</h3></p>');
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
            
                url:  'Clientes/Delete',
                method: 'POST',
                data: {sid: Math.random(), id: id},
                success: function(data) {

                    $('.modal-body').html(data); 

                },

                beforeSend: function(){

                  $('.modal-body').html('<p><span class="glyphicon glyphicon-refresh glyphicon-refresh-animate"></span> Aguarde, excluindo o Cliente...</p>');

                },

                complete: function(){

                    $('.modal-body').html('<p class="text-success"><h3> Cliente apagado com sucesso!</h3></p>');
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
