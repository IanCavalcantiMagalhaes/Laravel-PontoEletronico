<?php

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
use Illuminate\Support\Facades\Input;


Route::get('/oi', function () {
    return view('welcome');
});



Route::get('/InserirProfessor','CadastrarProfessor@IrParaPaginaDeCadastroProfessor');

Route::get('/InseririndoProfessor','CadastrarProfessor@InserirProfessor');

Route::get('/TelaDeContar', function () {
    return view('PaginaContador');//Ira para RegistrarEntrada_Saida
});

Route::get('/Login', function () {
    return view('PaginaLogin');//Ira para RegistrarEntrada_Saida
});

Route::get('/CadastrarProfessor', function () {
    $ID_e_NomeCursos=
      DB::table('Curso')
    ->select('id','nomeCurso')
    ->get();
    
    return view('PaginaCadastrarProfessor')->with('Cursos',$ID_e_NomeCursos);
    
});

Route::get('/MostrarProfessor', function (Request $request) {
    $Result=
      DB::table('Funcionario')
      ->where('id',$request->IdSelecionado)
      ->get();
    
    return view('PaginaMostrarDadosProfessor')->with('TodosOsDadosProfessor',$Result)->with('Escolha',$request->Escolha);
    
});

Route::get('/Pesquisar', function () {
  
    return view('PaginaPesquisar');
});

Route::get('/ManipularCurso', function () {
  
    return view('PaginaCursoPeriodoMateriaAluno');
});

Route::get('/RegistrarEntrada_Saida','Entrada_Saida@Contador');

Route::get('/matematica/soma/{a}/{b}',function(int $a , int $b){
    echo $a+$b;
});


 //AJAX
Route::get('/AjaxPeriodo','CadastrarProfessor@AjaxPeriodo');

Route::get('/AjaxPesquisaProfessor','Pesquisar@Professor');

Route::get('/AjaxMateria','CadastrarProfessor@AjaxMateria');

Route::get('/Ajax1','CadastrarProfessor@AjaxTest');

Route::get('/AjaxInserirProfessor','CadastrarProfessor@InserirProfessor');

Route::get('/Curso','CursoPeriodoMateriaAula@Curso');

Route::get('/CarregarCursos','CursoPeriodoMateriaAula@InserirCurso');


Route::get('/Periodo','CursoPeriodoMateriaAula@Periodo');

Route::get('/Materia','CursoPeriodoMateriaAula@Materia');

Route::get('/Curso',function(){
 return view('PaginaCursoPeriodoMateriaAluno');   
    
});