/*  DESABILITANDO O REQUIRED PARA LISTAR OS PACIENTES */
$(function(){

    $('#listarPacientes').click(function(){
        $('#inputPesquisarCpf').prop('required',false);
    })
})


// MODAL DADOS
$('#exampleModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var recipient = button.data('whatever') // Extract info from data-* attributes
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)
    modal.find('.modal-title').text('Teste ' + recipient)
    modal.find('.modal-body input').val(recipient)
})


/* MODAL EXCLUIR */
$('#exampleModalExcluir').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var recipient = button.data('whatever') // Extract info from data-* attributes
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)
    modal.find('.modal-title').text('Excluir dados da entrega da data ' + recipient)
    modal.find('.modal-body input').val(recipient)

})
