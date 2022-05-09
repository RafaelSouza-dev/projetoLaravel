<?php

namespace App\Http\Controllers;

use App\Models\M_area;
use App\Models\Microarea;
use App\Models\Paciente;
use App\Models\Rua;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MicroareaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('gerenciar.microarea.searchMicroarea');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $agente = User::all();
        return view('gerenciar.microarea.createMicroarea',['agente'=>$agente]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $microarea = new M_area;

        $microarea->id_m_areas = $request->id_m_areas;
        $microarea->numero_microarea = $request->numero_microarea;

        $microarea->save();

        return redirect('microarea/show')
        ->with('msgSucesso', 'Microarea '.$microarea->numero_microarea.' cadastrada com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $pesquisarMicroarea = request('pesquisarMicroarea');


       if('pesquisarMicroarea'){

            $microarea = M_area::with('rua','usuario')->where([
                ['numero_microarea','like','%'.$pesquisarMicroarea.'%'],
            ])->orderByRaw('id_m_areas  DESC')
            ->paginate(5);

        }
        return view('gerenciar.microarea.showMicroarea',['microarea'=>$microarea,'pesquisarMicroarea'=>$pesquisarMicroarea]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_m_areas)
    {
        $microarea = M_area::findOrFail($id_m_areas);
        return view('gerenciar.microarea.editMicroarea',['microarea'=>$microarea]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_m_areas)
    {
        $microarea = M_area::findOrFail($request->id_m_areas)
        ->update($request->all());

        return redirect('microarea/show')->with('msgSucesso', 'Microarea '.$request->numero_microarea.' editada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_m_areas)
    {
        if(M_area::findOrFail($id_m_areas)->delete()){

            return redirect('microarea/show')->with('msgSucesso', 'Microarea excluída!');

        }else{
            return redirect('microarea/show')->with('msgFracasso', 'Erro ao excluir. Tente novamente!');

        }
    }
}
