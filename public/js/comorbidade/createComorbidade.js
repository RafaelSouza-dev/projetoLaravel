$(function(){

    $('#vacinaPendente').hide()
    $('#vacinaFaltando').click(function(){
        $('#vacinaPendente').show()
    })
    $('#vacinaEmDia').click(function(){
        $('#vacinaPendente').hide()
    })

    $('#dum').hide()
    $('#gestanteSim').click(function(){
        $('#dum').show()
    })
    $('#gestanteNao').click(function(){
        $('#dum').hide()
    })
})
