/*  DESABILITANDO O REQUIRED PARA LISTAR OS PACIENTES */
$(function(){

    $('#listarPacientes').click(function(){
        $('#inputPesquisarCpf').prop('required',false);
    })
})
