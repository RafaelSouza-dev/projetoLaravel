@extends('templates.main')
@section('title', 'Editar paciente')
@section('titleEsf', 'ESF Santo Expedito')

<link rel="stylesheet" href="../../css/edit.css">



@section('content')

    <h1>Editando paciente <span class="azul">{{$pacientes->nome_paciente}}</span></h1>
    <form action="/pacientes/update/{{$pacientes->id_paciente}}" class="formulario" method="POST">
        @csrf
        @method('put')
        <div class="boxCampos">
            <div class="form-group">
                <label for="sus">SUS: <span class="azul">*</span></label>
                <input type="text" name="sus" id="sus" class="form-control col-md-3" maxlength="15" value="{{$pacientes->sus}}" required>
            </div><br>

            <div class="form-row">
                <div class="form-group col-md-5">
                    <label>Nome: <span class="azul">*</span></label>
                    <input type="text" name="nome_paciente" id="nome" class="form-control" value="{{$pacientes->nome_paciente}}" required>
                </div>
                <div class="form-group">
                    <label>Nascimento: <span class="azul">*</span></label>
                    <input type="date" name="datanascimento_paciente" id="datanascimento" class="form-control" value="{{$pacientes->datanascimento_paciente}}" required>
                </div>
                <div class="form-group col-md-3">
                    <label>Sexo: <span class="azul">*</span></label>
                    <select class="form-control" name="sexo_paciente" id="sexo" required>
                        <option selected>Selecione</option>
                        <option value="M"  {{$pacientes->sexo_paciente == "M" ? "selected='selected'" : "" }}>Masculino</option>
                        <option value="F" {{$pacientes->sexo_paciente == "F" ? "selected='selected'" : "" }}>Feminino</option>
                    </select>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-3">
                    <label>RG:<span class="azul">*</span></label>
                    <input type="text" name="rg_paciente" id="rg" class="form-control" maxlength="9"  value="{{$pacientes->rg_paciente}}" required>
                </div>
                <div class="form-group col-md-3">
                    <label>CPF: <span class="azul">*</span></label>
                    <input type="text" name="cpf_paciente" id="cpf" class="form-control" maxlength="11"  value="{{$pacientes->cpf_paciente}}" required>
                </div>
            </div>

            <div class="form-group">
                <label>Nome da Mãe: <span class="azul">*</span></label>
                <input type="text" name="nome_mae_paciente" id="nome_mae" class="form-control col-md-5"  value="{{$pacientes->nome_mae_paciente}}" required>
            </div>
            <div class="form-group">
                <label>Nome do pai: <span class="azul">*</span></label>
                <input type="text" name="nome_pai_paciente" id="nome_pai" class="form-control col-md-5"  value="{{$pacientes->nome_pai_paciente}}" required>
            </div>
        </div><br>

        <div class="boxCampos">
            <h3>Endereço</h3>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label>Rua: <span class="azul">*</span></label>
                    <input type="text" name="rua" id="rua" class="form-control" value="{{$pacientes->endereco->rua}}" required>
                </div>
                <div class="form-group col-md-3">
                    <label>Complemento:</label>
                    <input type="text" name="complemento" id="complemento" class="form-control" value="{{$pacientes->endereco->complemento == "" ? "Sem complemento" : $pacientes->endereco->complemento }} ">
                </div>
                <div class="form-group col-md-1">
                    <label for="inputZip">Número:</label>
                    <input type="text" name="numero" id="numero" class="form-control" value="{{$pacientes->endereco->numero}}">
                </div>
                <div class="form-group col-md-4">
                    <label>Bairro: <span class="azul">*</span></label>
                    <input type="text" name="bairro" id="bairro" class="form-control" value="{{$pacientes->endereco->bairro}}" required>
                </div>
                <div class="form-group col-md-3">
                    <label>Cidade: <span class="azul">*</span></label>
                    <input type="text" name="cidade" id="cidade" class="form-control" value="{{$pacientes->endereco->cidade}}" required>
                </div>
                <div class="form-group col-md-1">
                    <label for="inputZip">UF: <span class="azul">*</span></label>
                    <input type="text" name="uf" id="uf" class="form-control" value="{{$pacientes->endereco->uf}}" required>
                </div>
            </div>
            <div class="form-group">
                <label>Microarea <span class="azul">*</span></label>
                <select class="form-control col-2" name="id_microarea_fk" id="dose" required>
                    <option selected>{{$pacientes->microarea->numero_microarea}}</option>
                    @foreach ($microarea as $m1 )
                        <option value="{{$m1->id_m_areas}}">{{$m1->numero_microarea}}</option>
                    @endforeach
                </select>
            </div>
        </div><br>

        <div class="boxCampos">
            <h3>Situação do(a) Paciente</h3>
            <legend class="legend"></legend>
            <div id="containerSituacaoPaciente">
                <div id="boxSituacaoPaciente">
                    <div class="form-group" >
                        <input type="checkbox" name="comorbidades[]" value="hipertensao">Hipertenso(a)
                    </div>
                    <div class="form-group">
                        <input type="checkbox" name="comorbidades[]" value="diabetes">Diabético(a)
                    </div>
                    <div class="form-group">
                        <input type="checkbox" name="comorbidades[]" value="acamado">Acamado(a)
                    </div>
                    <div class="form-group">
                        <input type="checkbox" name="comorbidades[]" value="domiciliado">Domiciliado(a)
                    </div>
                    <div class="form-group">
                        <input type="checkbox" name="comorbidades[]" value="gestante">Gestante
                    </div>
                    <div class="form-group">
                        <input type="checkbox" name="comorbidades[]" value="deficiente_visual">Deficiente Visual
                    </div>
                </div>

                <div id="boxSituacaoPaciente">
                    <div class="form-group">
                        <input type="checkbox" name="comorbidades[]" value="deficiente_auditivo">Deficiente Auditivo(a)
                    </div>
                    <div class="form-group">
                        <input type="checkbox" name="comorbidades[]" value="deficiente_fisico">Deficiente Físico(a)
                    </div>
                    <div class="form-group">
                        <input type="checkbox" name="comorbidades[]" value="deficiente_fala">Deficiente da Fala
                    </div>
                    <div class="form-group">
                        <input type="checkbox" name="comorbidades[]" value="cancer">Câncer
                    </div>
                    <div class="form-group">
                        <input type="checkbox" name="comorbidades[]" value="hiv">HIV
                    </div>
                    <div class="form-group">
                        <input type="checkbox" name="comorbidades[]" value="nenhuma"><Strong>Nenhuma Comorbidade</Strong>
                    </div>
                </div>
            </div>
        </div><br>

        <div class="boxCampos">
            <h3>Contatos</h3>
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label>Celular:<span class="azul">*</span></label>
                    <input type="text" name="contato" id="contato" class="form-control"
                        @foreach ($pacientes->contato as $cont)
                        value="{{$cont->contato}}"
                        @endforeach
                    required>
                </div>
                <div class="form-group col-md-3">
                    <label>Residencial</label>
                    <input type="text" name="residencial" id="residencial" class="form-control inputCResidencial"
                        @foreach ($pacientes->contato as $cont)
                        value="{{$cont->residencial}}"
                        @endforeach
                    >
                </div>
            </div>
        </div>
        <a href="{{ url()->previous() }}" class="cancelar btnGrupo btn btn-outline-danger">Cancelar</a>
        <button type="submit" class="editar btnGrupo btn btn-outline-success">Salvar edição</button>
    </form>
    <?php /*
     var_dump($pacientes->contato["residencial"]);*/
    ?>

@endsection
