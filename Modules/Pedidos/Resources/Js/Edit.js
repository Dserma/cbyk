$(document).ready(function() {
    
    $('#alterar').on('click', function(){
        
       $('#cliente').removeAttr('readonly'); 
       $('#cliente').val(''); 
       $('#cliente').focus(); 
       $('#alterar').attr('disabled', 'disabled'); 
        
    });
    
    $('#alterarp').on('click', function(){
        
       $('#produto').removeAttr('readonly'); 
       $('#produto').val(''); 
       $('#produto').focus(); 
       $('#alterarp').attr('disabled', 'disabled'); 
        
    });
    
});
