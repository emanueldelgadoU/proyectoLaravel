<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Evento;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;



class EventoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        return view('asistente.eventos', ['eventos' => Evento::all(),'categorias' => Categoria::all()]);
    }

    public function indexCreador()
    {   //eventos se mete en la base d edatos y las mete en las varaible eventos de abajo
        //esta variable se va a la vista dasboardCreador
        return view('creador.dashboardCreador', ['eventos' => Evento::all(),]);
    }

    public function indexAdmin()
    {   //eventos se mete en la base d edatos y las mete en las varaible eventos de abajo
        //esta variable se va a la vista dasboardCreador
        return view('admin.dashboard', ['eventos' => Evento::all(),'categorias' => Categoria::all()]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.formNuevoEvento', ['categorias'=> Categoria::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //Mete los datos del input en la sesión

        request()->flash();

        //Grabar un objeto Sendero en BBDD con los datos del $request
        $evento = new Evento();
        $evento->nombre = $request->input('nombre');
        $evento->fecha = $request->input('fecha');
        $evento->descripcion = $request->input('descripcion');
        $evento->ciudad = $request->input('ciudad');
        $evento->direccion = $request->input('direccion');
        $evento->aforomax = $request->input('aforomax');
        $evento->tipo = $request->input('tipo');
        $evento->numMaxEntradas = $request->input('numMaxEntradas');
        $evento->categoria_id = $request->input('categoria_id');
        $evento->user_id = $request->input('user_id');

        // Foto
        $path = $request->file('img')->store('public');
        // /public/nombreimagengenerado.jpg
        // Cambiamos public por storage en la BBDD para que se pueda ver la imagen en la web
        $evento->img =  str_replace('public', 'storage', $path);

        $evento->save();

        return redirect()->intended('/dashboard');
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function show(Evento $evento)
    {
        return view('admin.dashboard', ['eventos' => Evento::all()]);


    }


    public function detalle(Evento $evento){

        return view('admin.dashboardDetalle', ['eventos' => $evento, 'participantes' => $evento->usuariosDelosEvento()->get() ]);

    }



    public function detalleAsistente(Evento $evento){

        return view('asistente.eventosDetalle', ['eventos' => $evento, 'participantes' => $evento->usuariosDelosEvento()->get() ]);

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function edit(Evento $evento)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Evento $evento)
    {

        $eventoNuevo = Evento::find($evento->id);
        $eventoNuevo->nombre = $request->input('nombre');
        $eventoNuevo->fecha = $request->input('fecha');
        $eventoNuevo->descripcion = $request->input('descripcion');
        $eventoNuevo->ciudad = $request->input('ciudad');
        $eventoNuevo->aforomax = $request->input('aforomax');
        $eventoNuevo->tipo = $request->input('tipo');
        $eventoNuevo->numMaxEntradas = $request->input('numMaxEntradas');
        $eventoNuevo->categoria_id = $request->input('categoria_id');

        $eventoNuevo->save();

        return redirect()->intended('/dashboard');



    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function destroy(Evento $evento)
    {
        $evento->delete();
        return view('admin.dashboard', ['eventos' => Evento::all(),'categorias' => Categoria::all()]);
    }

    // public function inscribir(Grupo $grupo, User $user) {
    //     if ( $grupo->componentes()->where('user_id', $user->id)->get()->count() == 0)
    //         $grupo->componentes()->attach($user->id, [ 'created_at' => Carbon::now()]);

    //     return view('web.grupocomponentes' , ['grupo' => $grupo, 'componentes' => $grupo->componentes()->orderBy('name', 'asc')->get()]);
    // }

    public function eliminarUserEvento(User $user, Evento $evento) {
        if ( $evento->usuariosDelosEvento()->where('user_id', $user->id)->get()->count() == 1)
            $evento->usuariosDelosEvento()->detach($user->id);

        if(Auth::user()->rol=="admin"){
            return view('admin.dashboardDetalle', ['eventos' => $evento, 'participantes' => $evento->usuariosDelosEvento()->get() ]);
        }else if(Auth::user()->rol=="creador"){
            return view('admin.dashboardDetalle', ['eventos' => $evento, 'participantes' => $evento->usuariosDelosEvento()->get() ]);
        }else{
            return view('asistente.eventosDetalle', ['eventos' => $evento, 'participantes' => $evento->usuariosDelosEvento()->get() ]);
        }
    }

    public function addUserEvento (Evento $evento, User $user ) {

        //entre comilla la variable y lo otro el objeto que le mandas
        return view('admin.formApuntarse', ['evento' => $evento, 'user' => $user ]);

    }

    public function inscribir(Request $request) {

        $user = new User();
        $evento= new Evento();

        $evento->img = $request->input('img');
        $evento->nombre = $request->input('nombre');
        $evento->fecha = $request->input('fecha');
        $evento->descripcion = $request->input('descripcion');
        $evento->ciudad = $request->input('ciudad');
        $evento->aforomax = $request->input('aforomax');
        $evento->tipo = $request->input('tipo');

        $user->id = $request->input('user_id');
        $evento->id = $request->input('evento_id');

        $numEntradas=$request->input('numEntradas');
        $estado=$request->input('estado');

        if ( $evento->usuariosDelosEvento()->where('user_id', $user->id)->get()->count() == 0)
             $evento->usuariosDelosEvento()->attach($user->id, ['numEntradas'=> $numEntradas, 'estado' => $estado]);

        if(Auth::user()->rol=="admin"){
            return view('admin.dashboardDetalle', ['eventos' => $evento, 'participantes' => $evento->usuariosDelosEvento()->get() ]);
        }else if(Auth::user()->rol=="creador"){
            return view('admin.dashboardDetalle', ['eventos' => $evento, 'participantes' => $evento->usuariosDelosEvento()->get() ]);
        }else{
            return view('asistente.eventosDetalle', ['eventos' => $evento, 'participantes' => $evento->usuariosDelosEvento()->get() ]);
        }
    }


    public function buscarCiudad(Request $request){

        $resultados = DB::table('eventos')
            ->where('ciudad', '=', $request->input('buscarCiudad'))
            ->get();

        if(Auth::user()->rol=="admin"){
            return view('admin.dashboard', ['eventos' => $resultados,'categorias' => Categoria::all()]);
        }else if(Auth::user()->rol=="creador"){
            return view('admin.dashboard', ['eventos' => $resultados,'categorias' => Categoria::all()]);
        }else{
            return view('asistente.eventos', ['eventos' => $resultados,'categorias' => Categoria::all()]);
        }
    }

    public function buscarCategoria (Request $request){

        $resultados = DB::table('eventos')
                ->join('categorias', 'eventos.categoria_id', '=', 'categorias.id')
                ->where('categorias.nombre', '=', $request->input('buscarCategoria'))
                ->select('eventos.*')
                ->get();

        if(Auth::user()->rol=="admin"){
            return view('admin.dashboard', ['eventos' => $resultados,'categorias' => Categoria::all()]);
        }else if(Auth::user()->rol=="creador"){
            return view('admin.dashboard', ['eventos' => $resultados,'categorias' => Categoria::all()]);
        }else{
            return view('asistente.eventos', ['eventos' => $resultados,'categorias' => Categoria::all()]);
        }
    }

    public function buscarFecha (Request $request){

        $resultados = DB::table('eventos')
            ->where('fecha', '=', $request->input('buscarFecha'))
            ->get();

        if(Auth::user()->rol=="admin"){
            return view('admin.dashboard', ['eventos' => $resultados,'categorias' => Categoria::all()]);
        }else if(Auth::user()->rol=="creador"){
            return view('admin.dashboard', ['eventos' => $resultados,'categorias' => Categoria::all()]);
        }else{
            return view('asistente.eventos', ['eventos' => $resultados,'categorias' => Categoria::all()]);
        }
    }

}
