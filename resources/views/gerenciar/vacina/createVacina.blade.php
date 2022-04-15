@extends('templates.main')
@section('title', 'Cadastrar vacina')
@section('titleEsf', 'ESF Santo Expedito')

<link rel="stylesheet" href="/css/vacina/createVaccine.css">
@section('content')

    <h1>Cadastrar Vacina</h1>

    <form action="../vacina" class="formulario" method="POST">
        @csrf
        <div class="boxCampos">
            <div class="form-row">
                <div class="form-group">
                    <label for="lote">Lote: <span class="azul">*</span></label>
                    <input type="text" name="lote_vacina" id="lote" class="form-control" maxlength="15" required>
                </div>
                <div class="form-group">
                    <label for="validade">Validade: <span class="azul">*</span></label>
                    <input type="date" name="validade_vacina" id="validade" class="form-control" required>
                </div>
            </div>

            <div class="form-group">
                <label>Descrição: <span class="azul">*</span></label>
                <input type="text" name="nome_vacina" id="descricao" class="form-control col-md-4" placeholder="Aztrazeneca" required>
            </div>

        <a href="{{ url()->previous() }}" class="cancelar btnGrupo btn btn-outline-danger">Cancelar</a>
        <button type="submit" class="salvar btnGrupo btn btn-outline-success">Salvar</button>
    </form>
    <script src="../../js/jquery-3.4.1.min.js"></script>
    <script src="https://unpkg.com/ionicons@5.5.1/dist/ionicons.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/bootstrap.bundle.min.js"></script>
@endsection
