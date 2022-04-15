/*  ADICIONANDO E REMOVENDO DEPENDENTES E SEUS CAMPOS */
$(function(){
    let cont =1

    $('#btnAddDependente').click(function(){


        cont ++
        $('.dependentes').append('<div class="form-group" id="campo' + cont + '"><label for=""> Nome do dependente:</label><input type="text"name="dependentes[]"class="form-control col-7"><label>NIS: </label><input type="text" class="form-control col-3" name="dependentes[]"><label>SUS: </label><input type="text" class="form-control col-3" name="dependentes[]"><label>Data de nascimento: </label><input type="text" class="form-control col-2" name="dependentes[]"><button class="btn btn-outline-danger" id="btnRemoverDependente"' + cont + '"> - Remover dependente </button><hr></div>');
    });
    $('form').on('click', '#btnRemoverDependente', function () {
        let button_id = $(this).attr("id");
        $('#campo' + button_id + '').remove();
    })

});
