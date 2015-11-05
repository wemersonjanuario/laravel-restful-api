<?php
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::group(['prefix' => 'treinamento'], function () {
    Route::post('funcionario', [
        'uses' => 'FuncionarioController@store'
    ]);

    Route::put('funcionario/{id}', [
        'uses' => 'FuncionarioController@update'
    ]);

    Route::get('funcionario', [
        'uses' => 'FuncionarioController@index'
    ]);

    Route::get('funcionario/{id}', [
        'uses' => 'FuncionarioController@find'
    ]);

    Route::delete('funcionario/{id}', [
        'uses' => 'FuncionarioController@destroy'
    ]);
});

Route::group(['prefix' => 'v1'], function () {
    Route::get('status', function () {
        return response()->json([
            'status' => 'working'
        ]);
    });

    Route::get('protected', [
        'middleware' => ['jwt.auth'],
        function () {
            return response()->json([
                'jwt' => 'rocks'
            ]);
        }
    ]);
    Route::post('upload', [
//    'is' => config('defender.superuser_role'),
//    'middleware' => ['jwt.auth'],
        //'can' => ['laboratorio_amostra_leitura'],
        function (Request $request) {
            $file = $request->file('file');


            $caminho = base_path() . '/public';
            $file->move($caminho, $file->getClientOriginalName());


            return Response::json([
                'success' => true,
                'message' => 'OK'
            ]);
        }

    ]);


});
