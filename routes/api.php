<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Resources\AsistenteCollection;
use App\Http\Resources\CategoriaCollection;
use App\Http\Resources\EventoCollection;
use App\Http\Resources\EventoResource;
use App\Http\Resources\UserResource;
use App\Http\Resources\CategoriaResource;
use App\Http\Resources\UserCollection;
use App\Models\Categoria;
use App\Models\Evento;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


//TODOS LOS EVENTOS
Route::get('eventia/evento/', function (){
    return new EventoResource(Evento::all());
});


//EVENTO ID
Route::get('eventia/evento/{id}', function ($id){
    return new EventoResource(Evento::findOrFail($id));
});

//TODOS LAS CATEGORIAS
Route::get('eventia/categorias/', function (){
    return new CategoriaResource(Categoria::all());
});

//TODOS LOS ASISTENTES
Route::get('eventia/asistente/', function (){
    return new UserResource(User::all());
});

//ASISTENTES POR DNI
Route::get('eventia/asistente/{dni}', function ($dni){
    return new UserResource(User::where('dni', $dni)->first());
});

//BORRAR
Route::delete('eventia/eventos/{id}', function ($id) {
    return new EventoResource(Evento::findOrFail($id)->delente());
});



//CREAR TOKEN
Route::post('/tokens/create', function (Request $request) {

    $user = User::where('email', $request->email)->first();

    if (!$user || !Hash::check($request->password, $user->password)) {
        return response()->json(['error' => 'Usuario o contraseña incorrectos']);
        /*
        throw ValidationException::withMessages([
          'email' => ['The provided credentials are incorrect.'],
        ]);
        */
    }

    $token = $user->createToken($request->email);

    return response()->json(['token' => $token->plainTextToken]);
});
