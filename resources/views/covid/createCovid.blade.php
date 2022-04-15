@extends('templates.main')
@section('title', 'COVID')
@section('titleEsf', 'ESF Santo Expedito')

<link rel="stylesheet" href="../../css/covid/createCovid.css">

@section('content')

    <h1>Cadastrando dados de COVID de <span class="azul">{{$pacientes->nome_paciente}}</span></h1>
    <form action="/covid/{{$pacientes->id_paciente}}" class="formulario" method="POST">
        @csrf
        <div class="boxCampos">
            <h3>Vacinas que já tomou</h3>
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label>Primeira dose <span class="azul">*</span></label>
                    <select class="form-control" name="primeira_dose" id="dose" required>
                        <option selected>Selecione</option>
                        @foreach ($vacina as $v1 )
                            <option value="{{$v1->nome_vacina}}">{{$v1->nome_vacina}}</option>
                        @endforeach
                        <option value="nao vacinou">Ainda não se vacinou</option>
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label>Segunda dose <span class="azul">*</span></label>
                    <select class="form-control" name="segunda_dose" id="dose" required>
                        <option selected>Selecione</option>
                        @foreach ($vacina as $v1 )
                            <option value="{{$v1->nome_vacina}}">{{$v1->nome_vacina}}</option>
                        @endforeach
                        <option value="nao vacinou">Ainda não se vacinou</option>
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label>Terceira dose <span class="azul">*</span></label>
                    <select class="form-control" name="terceira_dose" id="dose" required>
                        <option selected>Selecione</option>
                        @foreach ($vacina as $v1 )
                            <option value="{{$v1->nome_vacina}}">{{$v1->nome_vacina}}</option>
                        @endforeach
                        <option value="nao vacinou">Ainda não se vacinou</option>
                    </select>
                </div>
            </div>

            <h3>Teste de COVID</h3>
            <div class="form-group">
                <label for="teste">Já realizou o teste de COVID?</label>
                <input type="radio" name="fez_teste" id="testeSim" value="sim">Sim
                <input type="radio" name="fez_teste" id="testeNao" value="nao">Não
            </div>
            <div class="resultadoEData">
                <div class="form-group" id="resultadoTeste">
                <h3>Resultado do teste</h3>
                    <input type="radio" name="resultado_teste" id="positivo" value="positivo">Positivo
                    <input type="radio" name="resultado_teste" id="Negativo" value="negativo">Negativo
                </div>
                <div class="form-group">
                    <h3>Data que realizou o teste</h3>
                    <input type="date" name="data_testagem" class="form-control col-md-3">
                </div>
            </div>

            <h3>Sintomas que ainda sente</h3>
            <legend class="legend"></legend>
            <div id="containerSintomasPaciente">
                <div class="boxSintomasPaciente" id="box1">
                    <h5>Sintomas mais comuns</h5>
                    <div class="form-group" >
                        <input type="checkbox" id="checkSintomas" name="sintomas[]" value="febre">Febre
                    </div>
                    <div class="form-group">
                        <input type="checkbox" id="checkSintomas" name="sintomas[]" value="tosse">Tosse
                    </div>
                    <div class="form-group">
                        <input type="checkbox" id="checkSintomas" name="sintomas[]" value="cansaco">Cansaço
                    </div>
                    <div class="form-group">
                        <input type="checkbox" id="checkSintomas" name="sintomas[]" value="perda de olfato">Perda de olfato
                    </div>
                    <div class="form-group">
                        <input type="checkbox" id="checkSintomas" name="sintomas[]" value="perda de paladar">Perda de paladar
                    </div>
                </div>

                <div class="boxSintomasPaciente" id="box2">
                    <h5>Sintomas menos comuns</h5>
                    <div class="form-group">
                        <input type="checkbox" id="checkSintomas" name="sintomas[]" value="dor de garganta">Dor de garganta
                    </div>
                    <div class="form-group">
                        <input type="checkbox" id="checkSintomas" name="sintomas[]" value="dor de cabeca">Dor de cabeça
                    </div>
                    <div class="form-group">
                        <input type="checkbox" id="checkSintomas" name="sintomas[]" value="dores e desconfortos">Dores e desconfortos
                    </div>
                    <div class="form-group">
                        <input type="checkbox" id="checkSintomas" name="sintomas[]" value="diarreia">Diarréia
                    </div>
                    <div class="form-group">
                        <input type="checkbox" id="checkSintomas" name="sintomas[]" value="olhos irritados">Olhos irritados ou vermelhos
                    </div>
                    <div class="form-group">
                        <input type="checkbox" id="checkSintomas" name="sintomas[]" value="irritacao na pele">Irritação na pele
                    </div>
                </div><br>

                <div class="boxSintomasPaciente" id="box3">
                    <h5>Sintomas mais graves</h5>
                    <div class="form-group">
                        <input type="checkbox" id="checkSintomas" name="sintomas[]" value="dificuldade de respirar">Dificuldade de respirar,falta de ar
                    </div>
                    <div class="form-group">
                        <input type="checkbox" id="checkSintomas" name="sintomas[]" value="perda da fala mobilidade ou confusao">Perda da fala,mobilidade ou confusão
                    </div>
                    <div class="form-group">
                        <input type="checkbox" id="checkSintomas" name="sintomas[]" value="dores no peito">Dores no peito
                    </div>
                </div>
                <div class="boxSintomasPaciente" id="box4">
                    <div class="form-group">
                        <input type="checkbox" id="checkSintomas" name="sintomas[]" value="nenhum"><strong>Nenhum sintoma</strong>
                    </div>
                </div>
            </div><br>

            <h3>Contatos</h3>
            <div class="form-row">
                <div class="form-group">
                    <label>Celular:<span class="azul">*</span></label>
                    <input type="text" name="celular" id="contato" class="form-control" required>
                </div>
                <div class="form-group" id="telefoneResidencial">
                    <label>Residencial</label>
                    <input type="text" name="residencial" id="residencial" class="form-control">
                </div>
            </div>
            <a href="{{ url()->previous() }}" class="cancelar btnGrupo btn btn-outline-danger">Cancelar</a>
            <button type="submit" class="salvar btnGrupo btn btn-outline-success">Salvar</button>
        </div>
    </form>
    <script src="../../js/jquery-3.4.1.min.js"></script>
    <script src="../../js/covid/createCovid.js"></script>
@endsection
