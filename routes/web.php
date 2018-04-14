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
use App\Models\Funcionario;
use App\Models\Curso;
Route::get('/oi', function () {
    return view('welcome');
});

Route::get('/Login', function () {
    return view('PaginaLogin');//Ira para RegistrarEntrada_Saida
});


Route::get('/Somar','Calculo@AjaxSoma');

Route::get('/Testando',function(){

    return view('Test');
});

Route::get('/MostrarProfessor', function (Request $request) {
    $Result=
      DB::table('Funcionario')
      ->where('id',$request->IdSelecionado)
      ->get();
    
    return view('PaginaMostrarDadosProfessor')->with('TodosOsDadosProfessor',$Result)->with('Escolha',$request->Escolha);
    
})->name('MostrarProfessor');





Route::get('/RegistrarEntrada_Saida','Entrada_Saida@Contador');

Route::get('/matematica/soma/{a}/{b}',function(int $a , int $b){
    echo $a+$b;
});

Route::group(['prefix' => 'PequisaDeBanco'], function() {
Route::get('/AjaxPesquisaProfessor','Pesquisar@Professor');
Route::get('/Pesquisar', function () {
  
    return view('PaginaPesquisar');
});
});
 //AJAX
 
 Route::group(['prefix' => 'CadastroProfessor'], function() {
      Route::get('/AjaxInserirProfessor','CadastrarProfessor@InserirProfessor');
      Route::get('/AjaxPeriodo','CadastrarProfessor@AjaxPeriodo'); 
      Route::get('/AjaxMateria','CadastrarProfessor@AjaxMateria');
      Route::get('/CadastrarProfessor', function () {
        $ID_e_NomeCursos=
            DB::table('cursos')
          ->select('id','nomeCurso')
          ->get();
          //$ID_e_NomeCursos=Curso::all();
          
          return view('PaginaCadastrarProfessor')->with('Cursos',$ID_e_NomeCursos);
          
      });

 });
 Route::group(['prefix' => 'CursoPeriodoMateria'], function() {
       Route::get('/ManipularCurso', function () {
  
          return view('PaginaCursoPeriodoMateriaAluno');
      });
 });

Route::get('/AjaxTestando','Calculo@AjaxTest');

Route::get('/AjaxInserirProfessor','CadastrarProfessor@InserirProfessor');

Route::get('/Curso','CursoPeriodoMateriaAula@Curso');

Route::get('/CarregarCursos','CursoPeriodoMateriaAula@InserirCurso');


Route::get('/Periodo','CursoPeriodoMateriaAula@Periodo');

Route::get('/Materia','CursoPeriodoMateriaAula@Materia');

Route::get('/Curso',function(){
 return view('PaginaCursoPeriodoMateriaAluno');   
    
});