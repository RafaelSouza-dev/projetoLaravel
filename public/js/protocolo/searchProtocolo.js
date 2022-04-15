/* HABILITANDO OS INPUT´S PESQUISAR POR NOME E TIPO */
$(function(){
    $('#radioPesquisaTipo').click(function(){
        $('#inputPesquisarTipo').prop('disabled',false);
        $('#inputPesquisarNome').prop('disabled',true);
    })

    $('#radioPesquisaNome').click(function(){
        $('#inputPesquisarTipo').prop('disabled',true);
        $('#inputPesquisarNome').prop('disabled',false);
    })

})


/*  DESABILITANDO O REQUIRED PARA LISTAR OS PROTOCOLOS */
$(function(){

    $('#listarProtocolo').click(function(){
        $('#inputPesquisarNome').prop('required',false);
        $('#inputPesquisarTipo').prop('required',false);
    })
})
