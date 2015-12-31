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
Response::macro('xml', function($vars, $status = 200, array $header = array(), $rootElement = 'response', $xml = null)
{

    if (is_object($vars) && $vars instanceof Illuminate\Support\Contracts\ArrayableInterface) {
        $vars = $vars->toArray();
    }

    if (is_null($xml)) {
        $xml = new SimpleXMLElement('<' . $rootElement . '/>');
    }
    foreach ($vars as $key => $value) {
        if (is_array($value)) {
            if (is_numeric($key)) {
                Response::xml($value, $status, $header, $rootElement, $xml->addChild(str_singular($xml->getName())));
            } else {
                Response::xml($value, $status, $header, $rootElement, $xml->addChild($key));
            }
        } else {
            $xml->addChild($key, $value);
        }
    }
    if (empty($header)) {
        $header['Content-Type'] = 'application/xml';
    }
    return Response::make($xml->asXML(), $status, $header);
});





// How to use
// routes.php
Route::get('api.{ext}', function()
{
    $data = ['status' => 'OK'];
    $ext = \File::extension(\Request::url());
    return response()->$ext($data);
})->where('ext', 'xml|json');


Route::group(['prefix' => 'treinamento'], function () {
    Route::post('customer', [
        'uses' => 'CustomerController@store'
    ]);

    Route::put('customer/{id}', [
        'uses' => 'CustomerController@update'
    ]);

    Route::get('customer', [
        'uses' => 'CustomerController@index'
    ]);

    Route::get('customer/{id}', [
        'uses' => 'CustomerController@find'
    ]);

    Route::delete('customer/{id}', [
        'uses' => 'CustomerController@destroy'
    ]);

    Route::post('order', [
        'uses' => 'OrderController@store'
    ]);

    Route::put('order/{id}', [
        'uses' => 'OrderController@update'
    ]);

    Route::get('order', [
        'uses' => 'OrderController@index'
    ]);

    Route::get('order/{id}', [
        'uses' => 'OrderController@find'
    ]);

    Route::delete('order/{id}', [
        'uses' => 'OrderController@destroy'
    ]);



    Route::post('funcionario', [
        'uses' => 'FuncionarioController@store'
    ]);

    Route::put('funcionario/{id}', [
        'uses' => 'FuncionarioController@update'
    ]);

    Route::get('funcionario', [
        'uses' => 'FuncionarioController@index'
    ]);
    Route::get('funcionario1', [
        'uses' => 'FuncionarioController@teste'
    ]);

    Route::get('funcionario/{id}', [
        'uses' => 'FuncionarioController@find'
    ]);

    Route::delete('funcionario/{id}', [
        'uses' => 'FuncionarioController@destroy'
    ]);


    Route::post('telefone', [
        'uses' => 'TelefoneController@store'
    ]);

    Route::put('telefone/{id}', [
        'uses' => 'TelefoneController@update'
    ]);

    Route::get('telefone', [
        'uses' => 'TelefoneController@index'
    ]);


    Route::get('telefone/{id}', [
        'uses' => 'TelefoneController@find'
    ]);

    Route::delete('telefone/{id}', [
        'uses' => 'TelefoneController@destroy'
    ]);

    Route::post('post', [
        'uses' => 'PostController@store'
    ]);

    Route::put('post/{id}', [
        'uses' => 'PostController@update'
    ]);

    Route::get('post', [
        'uses' => 'PostController@index'
    ]);

    Route::get('post/{id}', [
        'uses' => 'PostController@find'
    ]);

    Route::delete('post/{id}', [
        'uses' => 'PostController@destroy'
    ]);
    Route::post('comment', [
        'uses' => 'CommentController@store'
    ]);

    Route::put('comment/{id}', [
        'uses' => 'CommentController@update'
    ]);

    Route::get('comment', [
        'uses' => 'CommentController@index'
    ]);

    Route::get('comment/{id}', [
        'uses' => 'CommentController@find'
    ]);

    Route::delete('comment/{id}', [
        'uses' => 'CommentController@destroy'
    ]);

    Route::get('post-with-comment', [
        'uses' => 'PostController@getPostWithComment'
    ]);
    Route::get('post-with-comment2/{id}', [
        'uses' => 'PostController@getPostWithComment2'
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
