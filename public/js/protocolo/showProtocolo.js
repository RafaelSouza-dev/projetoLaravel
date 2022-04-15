
/* HABILITANDO OS INPUT´S PESQUISAR POR NOME E TIPO
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



/*  DESABILITANDO O REQUIRED PARA LISTAR AS VACINAS */
$(function(){

    $('#listarProtocolo').click(function(){
        $('#inputPesquisarNome').prop('required',false);
        $('#inputPesquisarTipo').prop('required',false);
    })
})

$('#exampleModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var recipient = button.data('whatever') // Extract info from data-* attributes
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)
    modal.find('.modal-title').text('Excluir o protocolo ' + recipient)
    modal.find('.modal-body input').val(recipient)
})
