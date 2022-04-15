
/*  DESABILITANDO O REQUIRED PARA LISTAR OS PACIENTES */
$(function(){

    $('#listarComorbidades').click(function(){
        $('#inputPesquisarNome').prop('required',false);
    })
})
