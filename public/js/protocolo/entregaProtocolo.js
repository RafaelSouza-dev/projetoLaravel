$(function(){
    $('#boxPessoaConfianca').hide()
    $('#radioSim').click(function(){
        $('#nome_pessoa_confianca').prop('disabled',false)
        $('#rg_pessoa_confianca').prop('disabled',false)
        $('#cpf_pessoa_confianca').prop('disabled',false)
        $('#boxPessoaConfianca').show()
    })

    $('#radioNao').click(function(){
        $('#nome_pessoa_confianca').prop('disabled',true)
        $('#rg_pessoa_confianca').prop('disabled',true)
        $('#cpf_pessoa_confianca').prop('disabled',true)
        $('#boxPessoaConfianca').hide()
    })
})
