<?php

namespace App\Http\Controllers;

use App\Models\Vacina;
use Illuminate\Http\Request;

class VacinaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('gerenciar.vacina.searchVacina');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $vacinas = Vacina::all();
        return view('gerenciar.vacina.createVacina',['vacinas'=>$vacinas]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $vacina = new Vacina;

        $vacina->id_vacina = $request->id_vacina;
        $vacina->nome_vacina = $request->nome_vacina;
        $vacina->lote_vacina = $request->lote_vacina;
        $vacina->validade_vacina = $request->validade_vacina;

        $vacina->save();

        return redirect('vacina/showvacina')
        ->with('msgSucesso', 'Paciente '.$vacina->nome_vacina.' cadastrada com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $pesquisarVacina = request('pesquisarVacina');
        $pesquisarLote = request('pesquisarLote');


       if('pesquisarVacina'){

            $vacina = Vacina::where([
                ['nome_vacina','like','%'.$pesquisarVacina.'%'],
                ['lote_vacina','like','%'.$pesquisarLote.'%']
            ])->orderByRaw('id_vacina  DESC')
            ->paginate(5);
        }

        /*$microarea = Microarea::where('id_paciente_fk','id_paciente');
        $contato = Contato::where('id_paciente_fk','id_paciente');*/

        return view('gerenciar.vacina.showvacina',['vacina'=>$vacina,'pesquisarVacina'=>$pesquisarVacina,
        'pesquisarLote'=>$pesquisarLote]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_vacina)
    {
        $vacina = Vacina::findOrFail($id_vacina);
        return view('gerenciar.vacina.editVacina',['vacina'=>$vacina]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_vacina)
    {
        $vacina = Vacina::findOrFail($request->id_vacina)
        ->update($request->all());

        return redirect('vacina/show')->with('msgSucesso', 'Vacina '.$request->nome_vacina.' editada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_vacina)
    {
        if(Vacina::findOrFail($id_vacina)->delete()){

            return redirect('vacina/show')->with('msgSucesso', 'Vacina excluída!');

        }else{
            return redirect('vacina/show')->with('msgFracasso', 'Erro ao excluir. Tente novamente!');

        }
    }
}
