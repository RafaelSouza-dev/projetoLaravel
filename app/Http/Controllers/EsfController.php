<?php

namespace App\Http\Controllers;

use App\Models\Comorbidade;
use App\Models\Contato;
use App\Models\Endereco;
use App\Models\M_area;
use Illuminate\Http\Request;
use App\Models\Paciente;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;

class EsfController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $Paciente;

    public function __construct()
    {
       /* $this->Paciente = new Paciente();*/

    }

    public function index()
    {
        //Paciente::all();
        return view('pacientes.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pacientes = Paciente::all();
        $microarea = M_area::all();
        $usuario = User::all();
        return view('pacientes.create', ['pacientes' => $pacientes,'microarea'=>$microarea, 'usuario'=>$usuario]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $paciente = new Paciente;
        $microarea = M_area::findOrFail($request->id_m_areas);

        $paciente->id_paciente =   $request->id_paciente;
        $paciente->sus =   $request->sus;
        $paciente->nome_paciente =   $request->nome_paciente;
        $paciente->rg_paciente =   $request->rg_paciente;
        $paciente->cpf_paciente =   $request->cpf_paciente;
        $paciente->datanascimento_paciente =   $request->datanascimento_paciente;
        $paciente->nome_pai_paciente =   $request->nome_pai_paciente;
        $paciente->nome_mae_paciente =   $request->nome_mae_paciente;
        $paciente->sexo_paciente =   $request->sexo_paciente;
        $paciente->comorbidades = $request->comorbidades;
        $paciente->id_microarea_fk = $request['id_microarea_fk'] = $microarea->id_m_areas;

        $paciente->save();

        $endereco = new Endereco;

        $endereco->id_endereco = $request->id_endereco;
        $endereco->id_paciente_fk = $request['id_paciente_fk'] = $paciente->id_paciente;
        $endereco->rua = $request->rua;
        $endereco->complemento = $request->complemento;
        $endereco->numero = $request->numero;
        $endereco->bairro = $request->bairro;
        $endereco->cidade = $request->cidade;
        $endereco->uf = $request->uf;

        $endereco->save();

        $contato = new Contato;

        $contato->id_contato = $request->id_contato;
        $contato->id_paciente_fk = $request['id_paciente_fk'] = $paciente->id_paciente;
        $contato->contato = $request->contato;
        $contato->residencial = $request->residencial;

        $contato->save();

        return redirect('pacientes/show')
        ->with('msgSucesso', 'Paciente '.$paciente->nome_paciente.' cadastrado com sucesso!');


    }

    public function show()
    {
        $pesquisarPaciente = request('pesquisarPaciente');
        $pesquisarCpf = request('pesquisarCpf');


       if('pesquisarPaciente'){

            $pacientes = Paciente::where([
                ['nome_paciente','like','%'.$pesquisarPaciente.'%'],
                ['cpf_paciente','like','%'.$pesquisarCpf.'%']
            ])->orderByRaw('id_paciente  DESC')
            ->paginate(5);
        }

        /*$microarea = Microarea::where('id_paciente_fk','id_paciente');
        $contato = Contato::where('id_paciente_fk','id_paciente');*/

        return view('pacientes.show',['pacientes'=>$pacientes,'pesquisarPaciente'=>$pesquisarPaciente,
        'pesquisarCpf'=>$pesquisarCpf]);

    }

    public function search()
    {

        return view('pacientes.search');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_paciente)
    {
        $pacientes = Paciente::findOrFail($id_paciente);
        $microarea = M_area::all();

        return view('pacientes.edit', ['pacientes' => $pacientes,'microarea'=>$microarea]);



       /* if ($contato) {
            dd($pacientes->contato);
        }

        $microarea = $pacientes->microarea();
        echo "<p> {$pacientes->microarea->microarea} </p>";
        $microarea = Microarea::where('id_paciente_fk',$id_paciente);
        if ($microarea) {
            echo "<p> {$pacientes->microarea->microarea} </p>";
        }*/


        /*$pacientes = Paciente::with(['endereco','contato','microarea'])->findOrFail($id_paciente);
        $endereco = Endereco::all();
        $contato = Contato::all();
        $microarea = Microarea::all();

        return view('pacientes.edit',compact('pacientes','endereco','contato','microarea'));*/
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_paciente)
    {
       $paciente = Paciente::findOrFail($request->id_paciente)
        ->update($request->all());

       /*$microarea = DB::table('microareas')
       ->where('id_paciente_fk', $id_paciente)
       ->update($request->only('microarea','updated_at'));*/

       $contato = DB::table('contatos')
        ->where('id_paciente_fk', $id_paciente)
        ->update($request->only('contato','residencial','updated_at'));

       $endereco = DB::table('enderecos')
        ->where('id_paciente_fk', $id_paciente)
        ->update($request->only('rua','complemento','numero','bairro','cidade','uf','updated_at'));

   return redirect('pacientes/show')->with('msgSucesso', 'Paciente '.$request->nome_paciente.' editado com sucesso!');



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_paciente)
    {
        if(Paciente::findOrFail($id_paciente)->delete()){

            return redirect('pacientes/show')->with('msgSucesso', 'Paciente excluído!');

        }else{
            return redirect('pacientes/show')->with('msgFracasso', 'Erro ao excluir. Tente novamente!');

        }

    }

}
