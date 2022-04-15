/*  DESABILITANDO O REQUIRED PARA LISTAR AS MICROAREAS */
$(function(){

    $('#listarMicroareas').click(function(){
        $('#inputPesquisarNumero').prop('required',false);
    })
})
