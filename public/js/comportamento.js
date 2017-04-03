function getDisabled(){
    return $('#btn-incluir').prop('disabled');
}
function atualizaBotoes(){
  var selecionados=0;

  $('.chk-acao').each(function(){
      if ($(this).prop('checked') === true){
          selecionados++;
      } else {
          $('#chk-all').prop('checked',false);
      }
  });
  if(selecionados === 1){
      if(getDisabled()){
            $('.btn-single').addClass('disabled');
            $('.btn-multi').addClass('disabled');
      } else {
            $('.btn-single').removeClass('disabled');
            $('.btn-multi').removeClass('disabled');
      }
      
  } else if(selecionados > 1){
      $('.btn-single').addClass('disabled');
      if(getDisabled()){
          $('.btn-multi').addClass('disabled');
      } else {
          $('.btn-multi').removeClass('disabled');
      }
  } else {
    $('.btn-single').addClass('disabled');
    $('.btn-multi').addClass('disabled');
  }
}

$(document).ready(function(){
   var ctrl = false;
   $(document).keydown(function(event){
       ctrl = event.keyCode === 17;
   });
   $(document).keyup(function(event){
      ctrl = false; 
   });
   
   atualizaBotoes();    
   
    $('.chk-acao').on('click',function(){
       atualizaBotoes();
   });

   $('.linha').on('click',function(){
       var tdCheck = $(this).children()[0];
       var check = $(tdCheck).children();
       var checked = check.prop('checked');
       if(!ctrl){
            $('.chk-acao').each(function(){
               $(this).prop('checked',false);
            });
        }
       check.prop('checked',!checked);
       atualizaBotoes();
   });
   $('#chk-all').on('click',function(){
       var inputs, x;
        inputs = $('.chk-acao').get();
        for(x=0;x<inputs.length;x++){
            inputs[x].checked = this.checked;
        }
        atualizaBotoes();
   });
   
   $('#div_inicial').on('click','#reset-filter',function(event){
       event.preventDefault();
       $('#fr-filtro').each(function(){
        this.reset();
      });
   });   
   
   $('#div_inicial').on('click','#add-filter',function(event){
       event.preventDefault();
       $('#fr-filtro').append('<div class="filtro-adicional">'+$('#novo-filtro').html()+'</div>');
   });
   
    $('#div_inicial').on('click','#remove-filter',function(event){
       event.preventDefault();
       $('.filtro-adicional').each(function(){
          $(this).remove();
      });
   });
   
   $('.dropdown-submenu .dropdown-toggle').on('click',function(){
       $('.dropdown-submenu .dropdown-menu').css('display','none');
       $(this).siblings().css('display','block');
       return false;
   });

  
//   $('td').on('click',function(){
//       console.log($(this));
//       if($(this).children()[0] === undefined){
//            var checked = $(this).parent().children().children().prop('checked');
//            
//            if(!ctrl){
//                $('.chk-acao').each(function(){
//                   $(this).prop('checked',false);
//                });
//            }
//            $(this).parent().children().children().prop('checked',!checked);
//             atualizaBotoes();
//        }
//   });
   
   $('body').on('click','#btn-validacep',function(){
       var cep = document.getElementById('pencep[]').value;
       var sUrl = 'https://viacep.com.br/ws/'+cep+'/json/';
       console.log(sUrl);
       $.ajax({
         url: sUrl,
         success: function(data){
             var estados = document.getElementById('estcodigo[]');
             for(i = 0; i < estados.length; i++){
                 if(data.uf === estados.options[i].text){
                     estados.options[i].selected = true;
                     break;
                 }
             } 
             document.getElementById('pencep[]').value = data.cep;
             document.getElementById('bainome[]').value = data.bairro;
             document.getElementById('cidnome[]').value = data.localidade;
             document.getElementById('lognome[]').value = data.logradouro;
         }
       }); 
    });
    
    $('.btn-alterar').on('click', function(){
        var form = $(this).parent().parent().parent();
        form.attr('action', form.prop('action') + '/alterar');
        form.submit();
    });
    $('.btn-excluir').on('click', function(){
        var form = $(this).parent('form');
        form.action = form.action+'/excluir';
        form.submit();
    });
});
