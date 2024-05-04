<?php

use Illuminate\Support\Facades\Route;


//aqui 
// 127.0.0.1:8000/admin/cursos --> devo colocar isso no nav
// SE EU NAO LIGAR O ADMIN EM XAMPP, NAO FUNCIONA!
Route::get('/admin/cursos',
['as' =>'admin.cursos',
'uses'=>'App\Http\Controllers\Admin\CursoController@index']);
Route::get('/admin/cursos/adicionar',
['as' =>'admin.cursos.adicionar',
'uses'=>'App\Http\Controllers\Admin\CursoController@adicionar']);

Route::post('/admin/cursos/salvar',
['as' =>'admin.cursos.salvar',
'uses'=>'App\Http\Controllers\Admin\CursoController@salvar']);

//a partir daqui, preciso começar a receber um parâmetro para mexer com coisas específicas
Route::get('/admin/cursos/editar/{id}',
['as' =>'admin.cursos.editar',
'uses'=>'App\Http\Controllers\Admin\CursoController@editar']);

Route::put('/admin/cursos/atualizar/{id}',
['as' =>'admin.cursos.atualizar',
'uses'=>'App\Http\Controllers\Admin\CursoController@atualizar']);

Route::get('/admin/cursos/excluir/{id}',
['as' =>'admin.cursos.excluir',
'uses'=>'App\Http\Controllers\Admin\CursoController@excluir']);