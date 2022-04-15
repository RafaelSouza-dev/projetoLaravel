<?php

namespace App\Http\Controllers;

use App\Models\EntregaProtocolo;
use App\Models\Paciente;
use App\Models\Protocolo;
use Illuminate\Http\Request;

class ProtocoloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('gerenciar.protocolo.searchProtocolo');

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $protocolo = Protocolo::all();
        return view('gerenciar.protocolo.createProtocolo',['protocolo'=>$protocolo]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $protocolo = new Protocolo;

        $protocolo->id_protocolo = $request->id_protocolo;
        $protocolo->documento = $request->documento;
        $protocolo->tipo_documento = $request->tipo_documento;

        $protocolo->save();


        return redirect('protocolo/show')
        ->with('msgSucesso', 'Protocolo '.$protocolo->documento.' cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $pesquisarProtocolo = request('pesquisarProtocolo');
        $pesquisarTipo = request('pesquisarTipo');


       if('pesquisarProtocolo'){

            $protocolo = Protocolo::where([
                ['documento','like','%'.$pesquisarProtocolo.'%'],
                ['tipo_documento','like','%'.$pesquisarTipo.'%']
            ])->orderByRaw('id_protocolo  DESC')
            ->paginate(10);
        }

        return view('gerenciar.protocolo.showProtocolo',['protocolo'=>$protocolo,'pesquisarProtocolo'=>$pesquisarProtocolo,
        'pesquisarTipo'=>$pesquisarTipo]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_protocolo)
    {
        $protocolo = Protocolo::findOrFail($id_protocolo);
        return view('gerenciar.protocolo.editProtocolo',['protocolo'=>$protocolo]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_protocolo)
    {
        $protocolo = Protocolo::findOrFail($request->id_protocolo)
        ->update($request->all());

        return redirect('protocolo/show')->with('msgSucesso', 'Documento '.$request->documento.' editado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_protocolo)
    {
        if(Protocolo::findOrFail($id_protocolo)->delete()){

            return redirect('protocolo/show')->with('msgSucesso', 'protocolo excluído!');

        }else{
            return redirect('protocolo/show')->with('msgFracasso', 'Erro ao excluir. Tente novamente!');

        }
    }

    public function entrega($id_paciente)
    {
        /*$pacientes = $protocolo->paciente()->get();

        if ($pacientes) {
            foreach ($pacientes as $paciente) {
                echo"<p>{$paciente->tipo_documento}</p>";
            }
        }*/
        $pacientes = Paciente::findOrFail($id_paciente);
        $protocolo = Protocolo::all();
        return view('gerenciar.protocolo.entregaProtocolo',['pacientes' =>$pacientes,'protocolo'=>$protocolo]);
    }

    /*public function entregaconcluida(Request $request)
    {
        $entrega = new EntregaProtocolo;
        $paciente = Paciente::findOrFail($request->id_paciente);
        $protocolo = request('descricao_documento');

        $entrega->id_entrega = $request->id_entrega;
        $entrega->id_paciente_fk = $request['id_paciente_fk'] = $paciente->id_paciente;
        $entrega->id_protocolo_fk = $request['id_protocolo_fk'] = $protocolo;
        $entrega->descricao_documento = $request->descricao_documento;
        $entrega->tipo_documento = $request->tipo_documento;
        $entrega->data_entrega = $request->data_entrega;
        $entrega->entrega_pessoa_confianca = $request->entrega_pessoa_confianca;
        $entrega->nome_pessoa_confianca = $request->nome_pessoa_confianca;
        $entrega->rg_pessoa_confianca = $request->rg_pessoa_confianca;
        $entrega->cpf_pessoa_confianca = $request->cpf_pessoa_confianca;

        $entrega->save();

        return redirect('pacientes/show')
        ->with('msgSucesso', 'Documento entregue a '.$paciente->nome_paciente.'');
    }*/

}
