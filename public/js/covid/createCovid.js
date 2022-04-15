/* MOSTRANDO DATA E RESULTADO DE ACORDO COM A SELEÇÃO */
$(function(){
    $('.resultadoEData').hide()
    $('#testeSim').click(function(){
        $('.resultadoEData').show()
    })
    $('#testeNao').click(function(){
        $('.resultadoEData').hide()
    })
})
