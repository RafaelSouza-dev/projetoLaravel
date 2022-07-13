@extends('templates.main')
@section('title', 'Editar paciente')
@section('titleEsf', 'ESF Santo Expedito')

<link rel="stylesheet" href="../../css/usuario/editUsuario.css">



@section('content')

    <h1>Editando usuário <span class="azul">{{$usuario->name}}</span></h1>
    <form action="/usuario/update/{{$usuario->id}}" class="formulario" method="POST">
        @csrf
        @method('put')
        <div class="boxCampos">
            <div class="form-group">
                <label for="">Nome:</label>
                <input ype="text" name="name" id="name" class="form-control col-md-5" value="{{$usuario->name}}" required>
            </div>
            <div class="form-group">
                <label for="">Email:</label>
                <input ype="text" name="email" id="email" class="form-control col-md-5" value="{{$usuario->email}}" required>
            </div>
             <div class="form-group">
                <label for="">Senha:</label>
                <input ype="text" name="password" id="senha" class="form-control col-md-5" value="{{$usuario->password}}" required>
             </div>
        </div>
        <a href="{{ url()->previous() }}" class="cancelar btnGrupo btn btn-outline-danger">Cancelar</a>
        <button type="submit" class="editar btnGrupo btn btn-outline-success">Salvar edição</button>
    </form>

@endsection
