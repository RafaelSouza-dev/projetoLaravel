<?php

namespace App\Http\Controllers;

use App\Models\EntregaProtocolo;
use App\Models\Paciente;
use App\Models\Protocolo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Entrega_ProtocolosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('protocoloentregue.searchEntrega');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id_paciente)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $entrega = new EntregaProtocolo;
        $paciente = Paciente::findOrFail($request->id_paciente);
        $protocolo = request('id_protocolo');

        $entrega->id_entrega = $request->id_entrega;
        $entrega->id_paciente_fk = $request['id_paciente_fk'] = $paciente->id_paciente;
        $entrega->id_protocolo_fk = $request['id_protocolo_fk'] = $protocolo;
        $entrega->tipo_documento = $request->tipo_documento;
        $entrega->data_entrega = $request->data_entrega;
        $entrega->entrega_pessoa_confianca = $request->entrega_pessoa_confianca;
        $entrega->nome_pessoa_confianca = $request->nome_pessoa_confianca;
        $entrega->rg_pessoa_confianca = $request->rg_pessoa_confianca;
        $entrega->cpf_pessoa_confianca = $request->cpf_pessoa_confianca;
        $entrega->cpf_paciente = $request->cpf_paciente;

        $entrega->save();

        return redirect('pacientes/show')
        ->with('msgSucesso', 'Documento entregue a '.$paciente->nome_paciente.'');
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


        if ('pesquisarPaciente') {
            $paciente = Paciente::where([
                ['cpf_paciente','like','%'.$pesquisarPaciente.'%']
            ])->orderByRaw('id_paciente  DESC')
            ->paginate(5);

            $entrega = EntregaProtocolo::all();
        }

        return view('protocoloentregue.showEntrega',['paciente'=>$paciente,'pesquisarPaciente'=>$pesquisarPaciente,'entrega'=>$entrega]);


        /*$entrega = EntregaProtocolo::with('pacientes','protocolos')->find(10);
         $entrega = EntregaProtocolo::all();
         $paciente = Protocolo::find(8);
         dd($paciente);
         $protocolo = DB::table('entrega_protocolos')->join('pacientes', 'join pacientes on pacientes.id_paciente', '=', 'entrega_protocolo.id_paciente_fk')->join('protocolos', 'join protocolos on protocolo.id_protocolo', '=', 'entrega_protocolos.id_protocolo_fk')
        ->select('documento','nome_paciente')->get();*/



    }
    /*public function showAll($id_entrega)
    {
        $dados = EntregaProtocolo::findOrFail($id_entrega);
        return view('protocoloentregue.dadosEntrega',['dados'=>$dados]);
    }*/
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_entrega)
    {
        $dados = EntregaProtocolo::with('protocolos')->findOrFail($id_entrega);
        $protocolo = Protocolo::all();
        return view('protocoloentregue.editEntrega',['dados'=>$dados,'protocolo'=>$protocolo]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $dados = EntregaProtocolo::findOrFail($request->id_entrega)
        ->update($request->all());
        //dd($request);
        return redirect('protocoloentregue/search')->with('msgSucesso', 'Editado com sucesso!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_entrega)
    {
        if(EntregaProtocolo::findOrFail($id_entrega)->delete()){

            return redirect('protocoloentregue/search')->with('msgSucesso', 'Dados da entrega excluídos!');

        }else{
            return redirect('protocoloentregue/search')->with('msgFracasso', 'Erro ao excluir. Tente novamente!');

        }
    }
}
