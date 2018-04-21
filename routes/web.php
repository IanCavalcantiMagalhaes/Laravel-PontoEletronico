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



Route::get('/InserirProfessor','CadastrarProfessor@IrParaPaginaDeCadastroProfessor');

Route::get('/InseririndoProfessor','CadastrarProfessor@InserirProfessor');

Route::group(['prefix' => 'Entrar'], function() {
  Route::get('/Login', function () {
    return view('PaginaLogin');//Ira para RegistrarEntrada_Saida
  });
  Route::post('/Auntenticar','LogarUsuario@testValidar')->name('Autenticar');
  });

Route::get('/Somar','Calculo@AjaxSoma');

Route::get('/Testando',function(){

    return view('Test');
});



Route::get('/Pesquisar', function () {
  
    return view('PaginaPesquisar');
});

Route::get('/ManipularCurso', function () {
  
    return view('PaginaCursoPeriodoMateriaAluno');
});

Route::group(['prefix' => 'MarcarPonto'], function() {
    Route::get('/VisualizarFuncionario','Entrada_Saida@IndentificarFuncionarioLiberado');
     Route::get('/RegistrandoTest','Entrada_Saida@testContador');
     Route::get('/Registrando','Entrada_Saida@Contador');
     Route::get('/RegistrarEntrada_Saida','Entrada_Saida@RetornarView')->name('MarcarPonto');
});


    



 //AJAX
 
 Route::group(['prefix' => 'CadastrarProfessor'], function() {
      Route::get('/AjaxInserirProfessor','CadastrarProfessor@InserirProfessor');
      Route::get('/AjaxPeriodo','CadastrarProfessor@AjaxPeriodo'); 
      Route::get('/AjaxMateria','CadastrarProfessor@AjaxMateria');
      Route::get('/CadastroProfessor', function () {
        $ID_e_NomeCursos=
            DB::table('cursos')
          ->select('id','nomeCurso')
          ->get();
          //$ID_e_NomeCursos=Curso::all();
          
          return view('PaginaCadastrarProfessor')->with('Cursos',$ID_e_NomeCursos);
          
      });//->middleware(LoginBlock::class);
      
      

 });
 Route::group(['prefix' => 'PesquisarCursoPeriodoMateriaAula'], function() {

 });

 Route::group(['prefix' => 'PesquisarProfessor'], function() {
       Route::get('/AjaxPesquisaProfessor','Pesquisar@Professor');
       Route::get('/Mostrar',function(Request $request){
        //$RS=DB::table('funcionarios')->find($request->id)->get();
          return view('PaginaMostrarDadosProfessor');
         // ->with('TodosOsDadosProfessor',$RS);
   
});

});
 
Route::get('/AjaxPeriodo','CadastrarProfessor@AjaxPeriodo');



Route::get('/AjaxMateria','CadastrarProfessor@AjaxMateria');

Route::get('/AjaxTestando','Calculo@AjaxTest');


Route::group(['prefix' => 'GerenciarCursos'], function() {
Route::get('/Curso','CursoPeriodoMateriaAula@Curso');


Route::get('/Periodo','CursoPeriodoMateriaAula@Periodo');

Route::get('/Materia','CursoPeriodoMateriaAula@Materia');

Route::get('/Curso',function(){
 return view('PaginaCursoPeriodoMateriaAluno');   
    
});


});