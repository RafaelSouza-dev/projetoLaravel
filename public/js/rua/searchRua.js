/* HABILITANDO OS INPUT´S PESQUISAR POR NOME E LOTE */
$(function(){
    $('#radioPesquisaCep').click(function(){
        $('#inputPesquisarCep').prop('disabled',false);
        $('#inputPesquisarNome').prop('disabled',true);
    })

    $('#radioPesquisaNome').click(function(){
        $('#inputPesquisarCep').prop('disabled',true);
        $('#inputPesquisarNome').prop('disabled',false);
    })

})



/*  DESABILITANDO O REQUIRED PARA LISTAR OS PACIENTES */
$(function(){

    $('#listarRuas').click(function(){
        $('#inputPesquisarNome').prop('required',false);
        $('#inputPesquisarCep').prop('required',false);
    })
})
