<?php

namespace App\Http\Controllers;

use App\Models\Covid;
use App\Models\Paciente;
use App\Models\Vacina;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CovidController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('covid.searchCovid');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id_paciente)
    {
        $pacientes = Paciente::findOrFail($id_paciente);
        $vacina = Vacina::all();
        return view('covid.createCovid',['pacientes' =>$pacientes,'vacina'=>$vacina]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $covid = new Covid;
        $paciente = Paciente::findOrFail($request->id_paciente);

        $covid->id_covid = $request->id_covid;
        $covid->id_paciente_fk = $request['id_paciente_fk'] = $paciente->id_paciente;
        $covid->primeira_dose = $request->primeira_dose;
        $covid->segunda_dose = $request->segunda_dose;
        $covid->terceira_dose = $request->terceira_dose;
        $covid->fez_teste = $request->fez_teste;
        $covid->resultado_teste = $request->resultado_teste;
        $covid->data_testagem = $request->data_testagem;
        $covid->sintomas = $request->sintomas;
        $covid->celular = $request->celular;
        $covid->residencial = $request->residencial;

        $covid->save();

        return redirect('covid/show')
        ->with('msgSucesso', 'Dados sobre COVID de '.$paciente->nome_paciente.' cadastrados com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $pesquisarPaciente = request('pesquisarPaciente');
        $pesquisarCpf = request('pesquisarCpf');


       if('pesquisarPaciente'){
            /*$pacientes = Paciente::where([
                ['nome_paciente','like','%'.$pesquisarPaciente.'%'],
                ['cpf_paciente','like','%'.$pesquisarCpf.'%'],
            ])->orderByRaw('id_paciente  DESC')
            ->paginate(5);*/

            $pacientes = DB::table('pacientes')
            ->join('covids', 'id_paciente', '=', 'id_paciente_fk')
            ->where([
                ['nome_paciente','like','%'.$pesquisarPaciente.'%'],
                ['cpf_paciente','like','%'.$pesquisarCpf.'%'],
            ])->orderByRaw('id_paciente  DESC')
            ->paginate(5);
        }

        return view('covid.showCovid',['pacientes'=>$pacientes,'pesquisarPaciente'=>$pesquisarPaciente,
        'pesquisarCpf'=>$pesquisarCpf]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_covid)
    {
        $covid = Covid::findOrFail($id_covid);
        $vacina = Vacina::all();
        return view('covid.editCovid',['covid'=>$covid,'vacina'=>$vacina]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_covid)
    {
        $covid = Covid::findOrFail($request->id_covid)
        ->update($request->all());

        return redirect('covid/show')->with('msgSucesso', 'Dados de COVID editado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_covid)
    {
        if(Covid::findOrFail($id_covid)->delete()){

            return redirect('covid/show')->with('msgSucesso', 'Dados excluídos!');

        }else{
            return redirect('covid/show')->with('msgFracasso', 'Erro ao excluir. Tente novamente!');
;
        }
    }
}
