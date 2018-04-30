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




Route::group(['prefix' => 'MarcarPonto'], function() {
    Route::get('/VisualizarFuncionario','Entrada_Saida@IndentificarFuncionarioLiberado');
     Route::get('/RegistrandoTest','Entrada_Saida@testContador');
     Route::get('/Registrando','Entrada_Saida@Contador');
     Route::get('/RegistrarEntrada_Saida','Entrada_Saida@RetornarView')->name('MarcarPonto');
});
Route::group(['prefix' => 'Upload'], function() {
       Route::get('/ListarUploads', function(Request $request) {
           $file = $request->file('image');
        return view('Upload/ListarImagens')->with('categories',$file);

       }); 
       Route::get('/FazerUpload', function(Request $request) {
        $file = $request->file('image');
     return view('Upload/UploadImagem');

    }); 
    });

Route::group(['prefix' => 'Entrar'], function() {
     Route::get('/Login','LogarUsuario@RetornarView')->name('PaginaLogar');
     Route::post('/Auntenticar','LogarUsuario@testValidar')->name('Autenticar');
    });

 
 Route::group(['prefix' => 'CadastrarProfessor'], function() {
      Route::post('/AjaxInserirProfessor','CadastrarProfessor@InserirProfessor')->name('InserirProfessor');
      Route::get('/AjaxPeriodo','CadastrarProfessor@AjaxPeriodo'); 
      Route::get('/AjaxMateria','CadastrarProfessor@AjaxMateria');
      Route::get('/CadastroProfessor', 'CadastrarProfessor@InicializarView');//->middleware(LoginBlock::class);
      
    });

 Route::group(['prefix' => 'Pesquisar'], function() {
       Route::get('/AjaxPesquisaProfessor','Pesquisar@Professor');
       Route::get('/AjaxPesquisaCurso','Pesquisar@Curso');
       
        Route::get('/Procurar',function(Request $request){
    //$RS=DB::table('funcionarios')->find($request->id)->get();
            return view('PaginaPesquisar');
     // ->with('TodosOsDadosProfessor',$RS);

});

});
Route::group(['prefix' => 'GerenciarProfessor'], function() {
    Route::get('/Mostrar',function(Request $request){//controller:MostrarDadosListarTodosOsDadosProfessor
        //$RS=DB::table('funcionarios')->find($request->id)->get();
          return view('GerenciarProfessor');
         // ->with('TodosOsDadosProfessor',$RS);
   
    })->name('GerenciarProfessor');
    Route::get('/Adicionar','CursoPeriodoMateriaAula@Curso');

});

Route::group(['prefix' => 'GerenciarCursos'], function() {
        Route::get('/Curso','CursoPeriodoMateriaAula@Curso');
        Route::get('/Periodo','CursoPeriodoMateriaAula@Periodo');
        Route::get('/Materia','CursoPeriodoMateriaAula@Materia');
        Route::get('/Curso',function(){
              return view('PaginaCursoPeriodoMateriaAluno');   
    
})->name('GerenciarCursos');


});














Route::get('/AjaxPeriodo','CadastrarProfessor@AjaxPeriodo');



Route::get('/AjaxMateria','CadastrarProfessor@AjaxMateria');

Route::get('/AjaxTestando','Calculo@AjaxTest');
Route::get('/InserirProfessor','CadastrarProfessor@IrParaPaginaDeCadastroProfessor');

Route::get('/InseririndoProfessor','CadastrarProfessor@InserirProfessor');



Route::get('/Somar','Calculo@AjaxSoma');




Route::get('/Pesquisar', function () {
  
    return view('PaginaPesquisar');
});

Route::get('/ManipularCurso', function () {
  
    return view('PaginaCursoPeriodoMateriaAluno');
});
Route::get('/Testando',function(){

    return view('Test');
});
