<?php
//http://clubedosgeeks.com.br/programacao/listando-registro-de-banco-de-dados-mysql-com-ajax-json-e-php
//https://stackoverflow.com/questions/26922123/load-cities-from-state-laravel
//http://matheuspiscioneri.com.br/blog/preview-de-imagem-antes-do-upload-filereader/
// https://select2.org/getting-started/basic-usage
//https://select2.org/troubleshooting/common-problems
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
use App\Models\Materia;
use App\Models\FuncionarioMateria;
use App\Models\TempoChegada;

use Illuminate\Http\Request;
Route::get('/oi', function () {
    return view('welcome');
});
Route::get('/Logout','LogarUsuario@Logout')->name('Logout');
  
Route::group([], function() {
     Route::get('/','LogarUsuario@RetornarView')->name('PaginaLogar');
     Route::post('/Auntenticar','LogarUsuario@Validar')->name('Autenticar');
    });
  

Route::group(['prefix' => 'MarcarPonto','middleware'=>['login']], function() {
     Route::get('/VisualizarFuncionario','MarcarPonto@IndentificarFuncionarioLiberado');
     Route::get('/RegistrandoTest','MarcarPonto@testContador');
     Route::get('/Registrando','MarcarPonto@Contador');
     Route::get('/RegistrarEntrada_Saida','MarcarPonto@RetornarView')->name('PaginaMarcarPonto')->middleware('login');
});


    //'middleware'=> ['login']
 Route::group(['prefix' => 'CadastrarProfessor'], function() {
      Route::post('/AjaxInserirProfessor','CadastrarProfessor@InserirProfessor')->name('InserirProfessor');
      Route::get('/AjaxPeriodo','CadastrarProfessor@AjaxPeriodo'); 
      Route::get('/AjaxMateria','CadastrarProfessor@AjaxMateria');
      Route::get('/CadastroProfessor', 'CadastrarProfessor@InicializarView')->name('PaginaDeCadastroDeProfessor')->middleware('login');//->middleware(LoginBlock::class);
      
    });

 Route::group(['prefix' => 'Pesquisar'], function() {//Tera tambem gerenciar professor
       Route::get('/AjaxPesquisaProfessor','Pesquisar@Professor');
       Route::get('/AjaxPesquisaCurso','Pesquisar@Curso');
       
       Route::get('/Procurar',function(Request $request){
    //$RS=DB::table('funcionarios')->find($request->id)->get();
    $Result=null;
            return view('PaginaPesquisar')->with('navbar','Pesquisar')->with('Result',$Result);
     // ->with('TodosOsDadosProfessor',$RS);

})->middleware('login')->name('Pesquisar');

//Route::get('GerenciarProfessor/Mostrar','GerenciarProfessor@ListarTodosOsDadosProfessorComModel')->name('GerenciarProfessor')->middleware('login');


});
Route::group(['prefix' => 'GerenciarProfessor'], function() {
    Route::get('/Mostrar','GerenciarProfessor@ListarTodosOsDadosProfessorComModel')->name('Mostrar')->middleware('login');
   // Route::get('/Mostrar/{ID}','GerenciarProfessor@ListarTodosOsDadosProfessorComModel')->middleware('login');//Passar valor por rota='/Mostrar/{ID}'
    Route::get('/AtualizarProfessor','GerenciarProfessor@AtualizarProfessor')->middleware('login')->name('AtualizarProfessor');
    Route::get('/AtualizarPagina','GerenciarProfessor@AtualizarProfessor')->middleware('login')->name('AtualizarPagina');
    Route::get('/ApagarProfessor','GerenciarProfessor@ApagarProfessor')->middleware('login')->name('ApagarProfessor');
    Route::get('/AdicionarMateria','GerenciarProfessor@AdicionarMateriaAoProfessor')->middleware('login')->name('AdicionarMateria');
    Route::get('/RemoverMateria','GerenciarProfessor@RemoverMateriaDoProfessor')->middleware('login')->name('RemoverMateria');
    Route::get('/VerificarSeValorAdicionadoJaEstavaAdicionado','GerenciarProfessor@VerificarSeValorAdicionadoJaEstavaAdicionado')->middleware('login');
    Route::get('/PermitirEdiçao','GerenciarProfessor@PermitirEdiçao')->middleware('login');
});

Route::group(['prefix' => 'GerenciarCursos'], function() {
        Route::get('/Curso','GerenciarCursos@Curso');
        Route::get('/Periodo','GerenciarCursos@Periodo');
        Route::get('/Materia','GerenciarCursos@Materia');
        Route::get('/Pagina',function(){
              return view('PaginaGerenciarCursos')->with('navbar','Gerenciar Cursos');
    
})->name('GerenciarCursos')->middleware('login');
        Route::get('/CarregarCursos','GerenciarCursos@CarregarCursos');
        Route::get('/CarregarSala','GerenciarCursos@CarregarSala');
        Route::get('/CarregarTurno','GerenciarCursos@CarregarTurno');

});
//as funçoes abaixo nao tem grupo definido ja que é utilizada em varios conjunto de rotas{
Route::get('/AjaxPeriodo','CadastrarProfessor@AjaxPeriodo');
Route::get('/AjaxMateria','CadastrarProfessor@AjaxMateria');
//}



















//Rotas nao utilizadas abaixo
Route::get('/InserirProfessor','CadastrarProfessor@IrParaPaginaDeCadastroProfessor');

Route::get('/InseririndoProfessor','CadastrarProfessor@InserirProfessor');

Route::get('/Pesquisar', function () {
  
    return view('PaginaPesquisar');
});

Route::get('/ManipularCurso', function () {
  
    return view('PaginaCursoPeriodoMateriaAluno');
});
Route::get('/Testando',function(){
   
 $R=Funcionario::find(1);
     
    return view('Test')->with('S',$R->nome);
});

Route::get('/TestAjax','test@AjaxSoma');
Route::get('/Somar/{V1}/{V2}',function(Request $request){

echo $request->V1+$request->V2;

});

Route::get('/Soma',function(){
    $V1=1;$V2=2;
    return redirect()->route('Somar/'+4+'/'+2+'');

});

Route::get('/te',function(){
    $F=Funcionario::all();
    return Funcionario::all();;
});




Route::get('/aulairregular','AulaIrregular@RetornarView');
Route::get('/aulairregularprocura','AulaIrregular@ProcurarProfessor');

Route::get('/AjaxTestando','test@AjaxTest');