$(function(){
    /*$('#boxPessoaConfianca').hide()
    $('#radioSim').click(function(){
        $('#nome_pessoa_confianca').prop('disabled',false)
        $('#rg_pessoa_confianca').prop('disabled',false)
        $('#cpf_pessoa_confianca').prop('disabled',false)
        $('#boxPessoaConfianca').show()
    })*/

    $('#radioNao').click(function(){
        $('#nome_pessoa_confianca').prop('required',false)
        $('#rg_pessoa_confianca').prop('required',false)
        $('#cpf_pessoa_confianca').prop('required',false)
    })
})
