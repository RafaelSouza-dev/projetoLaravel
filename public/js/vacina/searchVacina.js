/* HABILITANDO OS INPUT´S PESQUISAR POR NOME E LOTE */
$(function(){
    $('#radioPesquisaLote').click(function(){
        $('#inputPesquisarLote').prop('disabled',false);
        $('#inputPesquisarNome').prop('disabled',true);
    })

    $('#radioPesquisaNome').click(function(){
        $('#inputPesquisarLote').prop('disabled',true);
        $('#inputPesquisarNome').prop('disabled',false);
    })

})



/*  DESABILITANDO O REQUIRED PARA LISTAR OS PACIENTES */
$(function(){

    $('#listarVacinas').click(function(){
        $('#inputPesquisarNome').prop('required',false);
        $('#inputPesquisarLote').prop('required',false);
    })
})
