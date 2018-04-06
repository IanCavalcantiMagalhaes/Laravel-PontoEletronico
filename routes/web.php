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
Route::get('/f', 'Control@Começo')->name('Test');

Route::get('/a','Controller@ola');

Route::get('/InserirProfessor','CadastrarProfessor@IrParaPaginaDeCadastroProfessor');

Route::get('/InseririndoProfessor','CadastrarProfessor@InserirProfessor');

Route::get('/TelaDeContar', function () {
    return view('PaginaContador');//Ira para RegistrarEntrada_Saida
});
Route::get('/Banco', function () {
  
    return view('Lista')->with('Valor',DB::table('users')->get());
});
Route::get('/RegistrarEntrada_Saida','Entrada_Saida@Contador');


Route::get('/PesquisarProfessor','Pesquisar@Pagina');

Route::get('/matematica/soma/{a}/{b}',function(int $a , int $b){
    echo $a+$b;
});

Route::get('/RealizarPesquisaProfessor','Pesquisar@ExecutarPesquisa');

 //AJAX
Route::get('/AjaxPeriodo','CadastrarProfessor@AjaxPeriodo');

Route::get('/AjaxMateria','CadastrarProfessor@AjaxMateria');

Route::get('/Ajax1','CadastrarProfessor@AjaxTest');

Route::get('/AjaxInserirProfessor','CadastrarProfessor@InserirProfessor');