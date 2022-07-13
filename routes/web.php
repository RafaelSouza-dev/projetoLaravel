<?php

use App\Http\Controllers\ComorbidadeController;
use App\Http\Controllers\CovidController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Entrega_ProtocolosController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EsfController;
use App\Http\Controllers\MicroareaController;
use App\Http\Controllers\ProtocoloController;
use App\Http\Controllers\RuaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VacinaController;
use App\Models\M_area;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::resource('pacientes',EsfController::class);*/
Route::get('/',[EsfController::class,'index']);
Route::get('/inicio',[EsfController::class,'index']);
Route::post('/pacientes/{id_paciente}',[EsfController::class,'destroy'])->middleware('auth');
Route::get('/pacientes/edit/{id_paciente}',[EsfController::class,'edit'])->middleware('auth');
Route::put('/pacientes/update/{id_paciente}',[EsfController::class,'update'])->middleware('auth');
Route::get('/pacientes/create',[EsfController::class,'create'])->middleware('auth');
Route::post('/pacientes', [EsfController::class, 'store']);
Route::get('/pacientes/show',[EsfController::class,'show'])->middleware('auth');
Route::get('/pacientes/search',[EsfController::class,'search'])->middleware('auth');

Route::get('/vacina',[VacinaController::class,'index']);
Route::get('/vacina/show',[VacinaController::class,'show'])->middleware('auth');
Route::get('/vacina/create',[VacinaController::class,'create'])->middleware('auth');
Route::post('/vacina', [VacinaController::class, 'store']);
Route::get('/vacina/edit/{id_vacina}',[VacinaController::class,'edit'])->middleware('auth');
Route::put('/vacina/update/{id_vacina}',[VacinaController::class,'update'])->middleware('auth');
Route::post('/vacina/{id_vacina}',[VacinaController::class,'destroy'])->middleware('auth');

Route::get('/rua/search',[RuaController::class,'index']);
Route::get('/rua/show',[RuaController::class,'show'])->middleware('auth');
Route::get('/rua/create',[RuaController::class,'create'])->middleware('auth');
Route::get('/rua/edit/{id_rua}',[RuaController::class,'edit'])->middleware('auth');
Route::post('/rua',[RuaController::class,'store']);
Route::post('/rua/{id_rua}',[RuaController::class,'destroy'])->middleware('auth');
Route::put('/rua/update/{id_rua}',[RuaController::class,'update'])->middleware('auth');

Route::get('/microarea/search',[MicroareaController::class,'index']);
Route::get('/microarea/show',[MicroareaController::class,'show'])->middleware('auth');
Route::get('/microarea/create',[MicroareaController::class,'create'])->middleware('auth');
Route::post('/microarea',[MicroareaController::class,'store']);
Route::get('/microarea/edit/{id_m_areas}',[MicroareaController::class,'edit'])->middleware('auth');
Route::put('/microarea/update/{id_m_areas}',[MicroareaController::class,'update'])->middleware('auth');
Route::post('/microarea/{id_m_areas}',[MicroareaController::class,'destroy'])->middleware('auth');

Route::get('/protocolo',[ProtocoloController::class,'index']);
Route::get('/protocolo/show',[ProtocoloController::class,'show'])->middleware('auth');
Route::get('/protocolo/create',[ProtocoloController::class,'create'])->middleware('auth');
Route::post('/protocolo',[ProtocoloController::class,'store']);
Route::get('/protocolo/edit/{id_protocolo}',[ProtocoloController::class,'edit'])->middleware('auth');
Route::put('/protocolo/update/{id_protocolo}',[ProtocoloController::class,'update'])->middleware('auth');
Route::get('/protocolo/entrega/{id_paciente}',[ProtocoloController::class,'entrega'])->middleware('auth');
//Route::post('/protocolo/entrega/{id_paciente}',[ProtocoloController::class,'entregaconcluida']);
Route::post('/protocolo/entrega/{id_paciente}',[Entrega_ProtocolosController::class,'store']);
Route::post('/protocolo/{id_protocolo}',[ProtocoloController::class,'destroy'])->middleware('auth');

Route::get('/protocoloentregue/search',[Entrega_ProtocolosController::class,'index']);
Route::get('/protocoloentregue/show',[Entrega_ProtocolosController::class,'show'])->middleware('auth');
Route::get('/protocoloentregue/{id_entrega}',[Entrega_ProtocolosController::class,'showAll'])->middleware('auth');
Route::get('/protocoloentregue/edit/{id_entrega}',[Entrega_ProtocolosController::class,'edit'])->middleware('auth');
Route::put('/protocoloentregue/update/{id_entrega}',[Entrega_ProtocolosController::class,'update'])->middleware('auth');
Route::post('/protocoloentregue/{id_entrega}',[Entrega_ProtocolosController::class,'destroy'])->middleware('auth');

Route::get('/comorbidade/search',[ComorbidadeController::class,'index']);
Route::get('/comorbidade/show',[ComorbidadeController::class,'show'])->middleware('auth');
Route::get('/comorbidade/create',[ComorbidadeController::class,'create'])->middleware('auth');
Route::post('/comorbidade',[ComorbidadeController::class,'store']);
Route::get('/comorbiddade/edit/{id_comorbidade}',[ComorbidadeController::class,'edit'])->middleware('auth');
Route::put('/comorbidade/update/{id_comorbidade}',[ComorbidadeController::class,'update'])->middleware('auth');
Route::post('/comorbidade/{id_comorbidade}',[ComorbidadeController::class,'destroy'])->middleware('auth');

Route::get('/covid/search',[CovidController::class,'index']);
Route::get('/covid/create/{id_paciente}',[CovidController::class,'create'])->middleware('auth');
Route::get('/covid/show',[CovidController::class,'show'])->middleware('auth');
Route::post('/covid/{id_paciente}',[CovidController::class,'store']);
Route::get('/covid/edit/{id_covid}',[CovidController::class,'edit'])->middleware('auth');
Route::put('/covid/update/{id_covid}',[CovidController::class,'update'])->middleware('auth');
Route::post('/covid/destroy/{id_covid}',[CovidController::class,'destroy'])->middleware('auth');

Route::get('/usuario',[UserController::class,'index'])->middleware('auth');
Route::get('/usuario/show',[UserController::class,'show'])->middleware('auth');
Route::get('/usuario/edit/{id}',[UserController::class,'edit'])->middleware('auth');
Route::put('/usuario/update/{id}',[UserController::class,'update'])->middleware('auth');
Route::post('/usuario/destroy/{id}',[UserController::class,'destroy'])->middleware('auth');


/* outra forma de acessar o controller
Route::get('/esfs/create',[EsfController::class, 'create']);

/* passando parâmetro para a view
Route::get('/sei lá/{id}', function($id){
    return view('sei lá',['id' => $id]);
})*/

Route::middleware(['auth:sanctum', 'verified'])->get('dashboard', function () {
    $microarea = M_area::with('usuario','rua','paciente')->get();
    $usuario = User::all();
    return view('dashboard',['microarea' =>$microarea,'usuario'=>$usuario]);
})->name('dashboard');
