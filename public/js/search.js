/* HABILITANDO OS INPUT´S PESQUISAR POR NOME E CPF */
$(function(){
    $('#radioPesquisaCpf').click(function(){
        $('#inputPesquisarCpf').prop('disabled',false);
        $('#inputPesquisarNome').prop('disabled',true);
    })

    $('#radioPesquisaNome').click(function(){
        $('#inputPesquisarCpf').prop('disabled',true);
        $('#inputPesquisarNome').prop('disabled',false);
    })

})


/*  DESABILITANDO O REQUIRED PARA LISTAR OS PACIENTES */
$(function(){

    $('#listarPacientes').click(function(){
        $('#inputPesquisarNome').prop('required',false);
        $('#inputPesquisarCpf').prop('required',false);
    })
})


