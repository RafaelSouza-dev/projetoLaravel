@extends('templates.main')
@section('title', 'Cadastrar microareas')
@section('titleEsf', 'ESF Santo Expedito')

<link rel="stylesheet" href="../css/microarea/createMicroarea.css">

@section('content')

    <h1>Cadastrar Microarea</h1>
    <form action="/microarea" class="formulario" method="POST">
        @csrf
        <div class="boxCampos">
            <div class="form-row">
                <div class="form-group">
                    <label for="numeroMicroarea">Número<span class="azul">*</span></label>
                    <input type="text" name="numero_microarea" id="numeroMicroarea" class="form-control" maxlength="3" required>
                </div>
                <div class="form-group col-4">
                    <label for="agenteMicroarea">Agente da microarea<span class="azul">*</span></label>
                    <select class="form-control" name="agenteMicroarea" id="agenteMicroarea">
                        <option value="">Selecione</option>
                        @foreach ($agente as $a1 )
                        <option value="{{$a1->id}}">
                            {{$a1->name}}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="btn-grupo">
                <a href="{{ url()->previous() }}" class="btnGrupo btn btn-outline-danger" id="btnCancelar">Cancelar</a>
                <button type="submit" class="btnGrupo btn btn-outline-success" id="btnSalvar">Salvar</button>
            </div>
        </div>
    </form>

@endsection
