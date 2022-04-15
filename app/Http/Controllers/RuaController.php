<?php

namespace App\Http\Controllers;

use App\Models\M_area;
use App\Models\Rua;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RuaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('gerenciar.rua.searchRua');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $microarea = M_area::all();
        return view('gerenciar.rua.createRua',['microarea'=>$microarea]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rua = new Rua;
        $microarea = M_area::findOrFail($request->id_m_areas);

        $rua->id_rua = $request->id_rua;
        $rua->id_microarea_fk = $request['id_microarea_fk'] = $microarea->id_m_areas;
        $rua->nome_rua = $request->nome_rua;
        $rua->nome_bairro = $request->nome_bairro;
        $rua->cep= $request->cep;

        $rua->save();

        return redirect('rua/show') ->with('msgSucesso', 'Rua '.$rua->nome_rua.' cadastrada com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $pesquisarRua= request('pesquisarRua');
        $pesquisarCep = request('pesquisarCep');


       if('pesquisarRua'){

            $rua = Rua::with('microarea')->where([
                ['nome_rua','like','%'.$pesquisarRua.'%'],
                ['cep','like','%'.$pesquisarCep.'%'],
            ])->orderByRaw('id_rua  DESC')
            ->paginate(10);

        }

        return view('gerenciar.rua.showRua',['rua'=>$rua,'pesquisarRua'=>$pesquisarRua,
        'pesquisarCep'=>$pesquisarCep]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_rua)
    {
        $rua = Rua::findOrFail($id_rua);
        $microarea = M_area::all();
        return view('gerenciar.rua.editRua',['rua'=>$rua,'microarea'=>$microarea]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_rua)
    {
        $rua = Rua::findOrFail($request->id_rua)
        ->update($request->all());

        return redirect('rua/show')->with('msgSucesso', 'Rua editada ' .$request->nome_rua.' com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_rua)
    {

        if(Rua::findOrFail($id_rua)->delete()){

            return redirect('rua/show')->with('msgSucesso', 'Rua ' .$id_rua. ' excluída!');

        }else{
            return redirect('rua/show')->with('msgFracasso', 'Erro ao excluir. Tente novamente!');
;
        }
    }
}
