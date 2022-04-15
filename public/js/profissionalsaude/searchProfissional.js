/* HABILITANDO OS INPUT´S PESQUISAR POR NOME E CPF */
$(function(){
    $('#radioPesquisaConselho').click(function(){
        $('#inputPesquisarConselho').prop('disabled',false);
        $('#inputPesquisarNome').prop('disabled',true);
    })

    $('#radioPesquisaNome').click(function(){
        $('#inputPesquisarConselho').prop('disabled',true);
        $('#inputPesquisarNome').prop('disabled',false);
    })

})


/*  DESABILITANDO O REQUIRED PARA LISTAR OS PACIENTES */
$(function(){

    $('#listarProfisional').click(function(){
        $('#inputPesquisarNome').prop('required',false);
        $('#inputPesquisarConselho').prop('required',false);
    })
})
