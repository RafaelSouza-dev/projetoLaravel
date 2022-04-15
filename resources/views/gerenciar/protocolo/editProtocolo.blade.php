@extends('templates.main')
@section('title', 'Editar Documento')
@section('titleEsf', 'ESF Santo Expedito')

<link rel="stylesheet" href="../../css/protocolo/editProtocolo.css">

@section('content')

    <h1>Editando protocolo <span class="azul">{{$protocolo->documento}}</span></h1>
    <form action="/protocolo/update/{{$protocolo->id_protocolo}}" class="formulario" method="POST">
        @csrf
        @method('put')
        <div class="boxCampos">
            <div class="form-group">
                <label>Documento: <span class="azul">*</span></label>
                <input type="text" name="documento" id="descricao" class="form-control col-md-3" placeholder="Aztrazeneca" value="{{$protocolo->documento}}" required>
            </div>
            <div class="form-group">
                <label for="tipodocumento">Tipo de documento: <span class="azul">*</span></label>
                <select name="tipo_documento" id="tipoDocumento" class="form-control col-md-5" required>
                    <option value="">Selecione</option>
                    <option value="entrega de resultado de exame">Entrega de resultado de exame</option>
                    <option value="entrega de marcacao de consulta">Entrega de marcação de consulta</option>
                    <option value="entrega de marcacao de exame">Entrega de marcação de exame</option>
                    <option value="para a Regulacao">Para a Regulação</option>
                    <option value="documento perdido">Documento perdido</option>
                </select>
            </div>

        <a href="{{ url()->previous() }}" class="cancelar btnGrupo btn btn-outline-danger">Cancelar</a>
        <button type="submit" class="salvar btnGrupo btn btn-outline-success">Salvar</button>
    </form>
    <script src="../../js/jquery-3.4.1.min.js"></script>
    <script src="https://unpkg.com/ionicons@5.5.1/dist/ionicons.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/bootstrap.bundle.min.js"></script>

@endsection
