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
use Illuminate\Http\Request;
Route::get('/oi', function () {
    return view('welcome');
});

  Route::get('/Logout','LogarUsuario@Logout')->name('Logout');
  
Route::group([], function() {
     Route::get('/','LogarUsuario@RetornarView')->name('PaginaLogar');
     Route::post('/Auntenticar','LogarUsuario@testValidar')->name('Autenticar');
    });
  

Route::group(['prefix' => 'MarcarPonto','middleware'=>['login']], function() {
     Route::get('/VisualizarFuncionario','Entrada_Saida@IndentificarFuncionarioLiberado');
     Route::get('/RegistrandoTest','Entrada_Saida@testContador');
     Route::get('/Registrando','Entrada_Saida@Contador');
     Route::get('/RegistrarEntrada_Saida','Entrada_Saida@RetornarView')->name('MarcarPonto')->middleware('login');
});


    //'middleware'=> ['login']
 Route::group(['prefix' => 'CadastrarProfessor'], function() {
      Route::post('/AjaxInserirProfessor','CadastrarProfessor@InserirProfessor')->name('InserirProfessor');
      Route::get('/AjaxPeriodo','CadastrarProfessor@AjaxPeriodo'); 
      Route::get('/AjaxMateria','CadastrarProfessor@AjaxMateria');
      Route::get('/CadastroProfessor', 'CadastrarProfessor@InicializarView')->middleware('login');//->middleware(LoginBlock::class);
      
    });

 Route::group(['prefix' => 'Pesquisar'], function() {
       Route::get('/AjaxPesquisaProfessor','Pesquisar@Professor');
       Route::get('/AjaxPesquisaCurso','Pesquisar@Curso');
       
        Route::get('/Procurar',function(Request $request){
    //$RS=DB::table('funcionarios')->find($request->id)->get();
            return view('PaginaPesquisar')->with('navbar','Pesquisar');
     // ->with('TodosOsDadosProfessor',$RS);

})->middleware('login');

});
Route::group(['prefix' => 'GerenciarProfessor'], function() {
    Route::get('/Mostrar','GerenciarProfessor@ListarTodosOsDadosProfessor')->name('GerenciarProfessor')->middleware('login');
    Route::get('/Adicionar','CursoPeriodoMateriaAula@Curso');

});

Route::group(['prefix' => 'GerenciarCursos'], function() {
        Route::get('/Curso','CursoPeriodoMateriaAula@Curso');
        Route::get('/Periodo','CursoPeriodoMateriaAula@Periodo');
        Route::get('/Materia','CursoPeriodoMateriaAula@Materia');
        Route::get('/Curso',function(){
              return view('PaginaCursoPeriodoMateriaAluno')->with('navbar','Gerenciar Cursos');
    
})->name('GerenciarCursos');
        Route::get('/CarregarCursos','CursoPeriodoMateriaAula@CarregarCursos');
        Route::get('/CarregarSala','CursoPeriodoMateriaAula@CarregarSala');

});
//as funçoes abaixo nao tem grupo definido ja que é utilizada em varios conjunto de rotas
Route::get('/AjaxPeriodo','CadastrarProfessor@AjaxPeriodo');
Route::get('/AjaxMateria','CadastrarProfessor@AjaxMateria');


























Route::get('/InserirProfessor','CadastrarProfessor@IrParaPaginaDeCadastroProfessor');

Route::get('/InseririndoProfessor','CadastrarProfessor@InserirProfessor');

Route::get('/Pesquisar', function () {
  
    return view('PaginaPesquisar');
});

Route::get('/ManipularCurso', function () {
  
    return view('PaginaCursoPeriodoMateriaAluno');
});
Route::get('/Testando',function(){
    $X= Funcionario::get();//find(1);
    foreach($X as $dados){
      //$Array[]=$dados->id;
      //$Array[]=$dados->nome;
     
    }
 
    return view('Test')->with('Arranjo',$X);
});
Route::get('/Somar','test@AjaxSoma');Route::get('/AjaxTestando','test@AjaxTest');