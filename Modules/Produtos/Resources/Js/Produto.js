$(document).ready(function() {
    
    $('#navProdutos').addClass('active');
    
    $('.collProd').on('show.bs.collapse', function () {
        
         $(this).prev().find(".collProdHead").removeClass("glyphicon-chevron-right").addClass("glyphicon-chevron-down");
        
    });
    
    $('.collProd').on('hide.bs.collapse', function () {
        
         $(this).prev().find(".collProdHead").removeClass("glyphicon-chevron-down").addClass("glyphicon-chevron-right");
        
    });
    
    $('.btn-novo').on('click', function(){
        
        $('#modalProd').modal();
        $('.modal-title').html('<span class="glyphicon glyphicon-pencil"></span> &nbsp; Inclusão de Produto');
        
        $.ajax({
            
            url:  'Produtos/New',
            method: 'POST',
            data: {sid: Math.random()},
            success: function(data) {
              $('.modal-body-form').html(data); 
            },
            beforeSend: function(){
              $('.modal-body-form').html('<p><span class="glyphicon glyphicon-refresh glyphicon-refresh-animate"></span> Aguarde, lendo produto...</p>');
            },
            complete: function(){
            }
        });
        
    });
    
    $('.btn-edita').on('click', function(){
        
        $('#modalProd').modal();
        var id = $(this).attr('data-target');
        
        $.ajax({
            
            url:  'Produtos/Edit',
            method: 'POST',
            data: {sid: Math.random(), id: id},
            success: function(data) {
              $('.modal-body-form').html(data); 
            },
            beforeSend: function(){
              $('.modal-body-form').html('<p><span class="glyphicon glyphicon-refresh glyphicon-refresh-animate"></span> Aguarde, lendo produto...</p>');
            },
            complete: function(){
            }
                
        });
        
    });
    
    $('.btn-grava').on('click', function(){
        
        var id  = $('#id').val();
        
        $.ajax({
            
            url:  'Produtos/Save',
            method: 'POST',
            data: {sid: Math.random(), id: id, n: $('#nome').val(), p:$('#preco').val(), d:$('#descricao').val()},
            success: function(data) {
              
            },
            
            beforeSend: function(){
                
                $('.modal-body-form').html('<p><span class="glyphicon glyphicon-refresh glyphicon-refresh-animate"></span> Aguarde, salvando produto...</p>');
            
            },
            
            complete: function(){
                
                if( id !== '' ){
                    $('.modal-body-form').html('<p class="text-success"><h3> Produto alterado com sucesso!</h3></p>');
                }else{
                    $('.modal-body-form').html('<p class="text-success"><h3> Produto incluído com sucesso!</h3></p>');
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
            
                url:  'Produtos/Delete',
                method: 'POST',
                data: {sid: Math.random(), id: id},
                success: function(data) {

                    $('.modal-body').html(data); 

                },

                beforeSend: function(){

                  $('.modal-body').html('<p><span class="glyphicon glyphicon-refresh glyphicon-refresh-animate"></span> Aguarde, excluindo o produto...</p>');

                },

                complete: function(){

                    $('.modal-body').html('<p class="text-success"><h3> Produto apagado com sucesso!</h3></p>');
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
