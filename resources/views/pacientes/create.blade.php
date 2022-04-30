@extends('templates.main')
@section('title', 'Cadastrar paciente')
@section('titleEsf', 'ESF Santo Expedito')

<link rel="stylesheet" href="../css/create.css">
@section('content')

    <h1>Cadastrar paciente</h1>
    <form action="/pacientes" class="formulario" method="POST">
        @csrf

        <div class="boxCampos">
            <div class="form-group">
                <label for="sus">SUS</label>
                <input type="text" name="sus" id="sus" class="form-control col-md-3" maxlength="15" required>
            </div><br>

            <div class="form-row">
                <div class="form-group col-md-5">
                    <label>Nome: <span class="azul">*</span></label>
                    <input type="text" name="nome_paciente" id="nome" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Nascimento: <span class="azul">*</span></label>
                    <input type="date" name="datanascimento_paciente" id="datanascimento" class="form-control" required>
                </div>
                <div class="form-group col-md-3">
                    <label>Sexo: <span class="azul">*</span></label>
                    <select class="form-control" name="sexo_paciente" id="sexo" required>
                        <option selected>Selecione</option>
                        <option value="M">Masculino</option>
                        <option value="F">Feminino</option>
                    </select>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-3">
                    <label>RG:<span class="azul">*</span></label>
                    <input type="text" name="rg_paciente" id="rg" class="form-control" maxlength="9" required>
                </div>
                <div class="form-group col-md-3">
                    <label>CPF: <span class="azul">*</span></label>
                    <input type="text" name="cpf_paciente" id="cpf" class="form-control" maxlength="11" required>
                </div>
            </div>

            <div class="form-group">
                <label>Nome da Mãe: <span class="azul">*</span></label>
                <input type="text" name="nome_mae_paciente" id="nome_mae" class="form-control col-md-5" required>
            </div>
            <div class="form-group">
                <label>Nome do pai: <span class="azul">*</span></label>
                <input type="text" name="nome_pai_paciente" id="nome_pai" class="form-control col-md-5" required>
            </div>
        </div><br>

        <div class="boxCampos">
            <h3>Endereço</h3>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label>Rua: <span class="azul">*</span></label>
                    <input type="text" name="rua" id="rua" class="form-control">
                </div>
                <div class="form-group col-md-3">
                    <label>Complemento:</label>
                    <input type="text" name="complemento" id="complemento" class="form-control">
                </div>
                <div class="form-group col-md-1">
                    <label for="inputZip">Número:</label>
                    <input type="text" name="numero" id="numero" class="form-control">
                </div>
                <div class="form-group col-md-4">
                    <label>Bairro: <span class="azul">*</span></label>
                    <input type="text" name="bairro" id="bairro" class="form-control">
                </div>
                <div class="form-group col-md-3">
                    <label>Cidade: <span class="azul">*</span></label>
                    <input type="text" name="cidade" id="cidade" class="form-control" required>
                </div>
                <div class="form-group col-md-1">
                    <label for="inputZip">UF: <span class="azul">*</span></label>
                    <input type="text" name="uf" id="uf" class="form-control" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-3">
                    <label>Microárea: <span class="azul">*</span></label>
                    <select class="form-control" name="id_m_areas" id="dose" required>
                        <option selected>Selecione</option>
                        @foreach ($microarea as $m1 )
                            <option value="{{$m1->id_m_areas}}">{{$m1->numero_microarea}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="agente">Agente Comunitário <span class="azul">*</span></label>
                    <input type="text" name="agentecomunitario" class="form-control" required>
                </div>
            </div>
        </div><br>

        <div class="boxCampos">
            <h3>Situação do(a) Paciente</h3>
            <legend class="legend"></legend>
            <div id="containerSituacaoPaciente">
                <div id="boxSituacaoPaciente">
                    <div class="form-group" >
                        <input type="checkbox" id="checkboxComorbidades" name="comorbidades[]" value="hipertensao">Hipertenso(a)
                    </div>
                    <div class="form-group">
                        <input type="checkbox" id="checkboxComorbidades" name="comorbidades[]" value="diabetes">Diabético(a)
                    </div>
                    <div class="form-group">
                        <input type="checkbox" id="checkboxComorbidades" name="comorbidades[]" value="acamado">Acamado(a)
                    </div>
                    <div class="form-group">
                        <input type="checkbox" id="checkboxComorbidades" name="comorbidades[]" value="domiciliado">Domiciliado(a)
                    </div>
                    <div class="form-group">
                        <input type="checkbox" id="checkboxComorbidades" name="comorbidades[]" value="gestante">Gestante
                    </div>
                    <div class="form-group">
                        <input type="checkbox" id="checkboxComorbidades" name="comorbidades[]" value="deficiente visual">Deficiente Visual
                    </div>
                </div>

                <div id="boxSituacaoPaciente">
                    <div class="form-group">
                        <input type="checkbox" id="checkboxComorbidades" name="comorbidades[]" value="deficiente auditivo">Deficiente Auditivo(a)
                    </div>
                    <div class="form-group">
                        <input type="checkbox" id="checkboxComorbidades" name="comorbidades[]" value="deficiente fisico">Deficiente Físico(a)
                    </div>
                    <div class="form-group">
                        <input type="checkbox" id="checkboxComorbidades" name="comorbidades[]" value="deficiente da fala">Deficiente da Fala
                    </div>
                    <div class="form-group">
                        <input type="checkbox" id="checkboxComorbidades" name="comorbidades[]" value="cancer">Câncer
                    </div>
                    <div class="form-group">
                        <input type="checkbox" id="checkboxComorbidades" name="comorbidades[]" value="hiv">HIV
                    </div>
                    <div class="form-group">
                        <input type="checkbox" id="checkboxComorbidades" name="comorbidades[]" value="nenhuma"><Strong>Nenhuma Comorbidade</Strong>
                    </div>
                </div>
            </div>
        </div><br>

        <div class="boxCampos">
            <h3>Contatos</h3>
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label>Celular:<span class="azul">*</span></label>
                    <input type="text" name="contato" id="contato" class="form-control">
                </div>
                <div class="form-group col-md-3">
                    <label>Residencial</label>
                    <input type="text" name="residencial" id="residencial" class="form-control inputCResidencial">
                </div>
            </div>
        </div>
        <a href="{{ url()->previous() }}" class="cancelar btnGrupo btn btn-outline-danger">Cancelar</a>
        <button type="submit" class="salvar btnGrupo btn btn-outline-success">Salvar</button>
    </form>
    <script src="../js/create.js"></script>
@endsection
