@extends('templates.main')
@section('title', 'Editar rua')
@section('titleEsf', 'ESF Santo Expedito')

<link rel="stylesheet" href="/css/rua/editRua.css">
@section('content')

    <h1>Editando a rua <span class="azul">{{$rua->nome_rua}}</span></h1>
    <form action="/rua/update/{{$rua->id_rua}}" class="formulario" method="POST">
        @csrf
        @method('put')
        <div class="boxCampos">
            <div class="form-row">
                <div class="form-group col-md-5">
                    <label for="lote">Nome da rua: <span class="azul">*</span></label>
                    <input type="text" name="nome_rua" id="lote" class="form-control" value="{{$rua->nome_rua}}" required>
                </div>
                <div class="form-group">
                    <label for="nome_bairro">Bairro: <span class="azul">*</span></label>
                    <input type="text" name="nome_bairro" id="nomeBairro" class="form-control" value="{{$rua->nome_bairro}}" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label>CEP: <span class="azul">*</span></label>
                    <input type="text" name="cep" id="cep" class="form-control" maxlength="8" placeholder="sem pontos e traços" value="{{$rua->cep}}" required>
                </div>
                <div class="form-group col-md-3">
                    <label>Microarea <span class="azul">*</span></label>
                    <select class="form-control" name="id_microarea_fk" id="dose" required>
                        <option selected>{{$rua->microarea->numero_microarea}}</option>
                        @foreach ($microarea as $m1 )
                            <option value="{{$m1->id_m_areas}}">{{$m1->numero_microarea}}</option>
                        @endforeach
                    </select>
                </div>
            </div>


        <a href="{{ url()->previous() }}" class="cancelar btnGrupo btn btn-outline-danger">Cancelar</a>
        <button type="submit" class="salvar btnGrupo btn btn-outline-success">Salvar</button>
    </form>
    <script src="../../js/jquery-3.4.1.min.js"></script>
    <script src="https://unpkg.com/ionicons@5.5.1/dist/ionicons.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/bootstrap.bundle.min.js"></script>

@endsection
