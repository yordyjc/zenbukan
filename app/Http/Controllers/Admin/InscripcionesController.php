<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Hash;
use Illuminate\Support\Facades\Validator;
use Response;
use Illuminate\Support\Facades\Input;
use File;
use Carbon\Carbon;
use Auth;

use App\User;
use App\Models\Inscripcion;
use App\Models\Torneo;
use App\Models\club;
use App\Models\Sector;
use App\Models\Modalidad;

class InscripcionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function frmCrear($id)
    {
        $clubes= Club::all()->pluck('nombre', 'id');
        $sectores = Sector::all()->pluck('sector','id');
        $torneo = Torneo::find($id);
        return view('admin.inscripciones.crear')->with('torneo',$torneo)->with('clubes',$clubes)->with('sectores',$sectores);
    }

     public function create()
    {
        //
    }

    public function concatenar($numero)
    {
        $n=strlen($numero);
        if ($n==1) {
            $a='0000'.$numero;
        }
        else if ($n==2) {
            $a='000'.$numero;
        }
        else if ($n==3) {
            $a='00'.$numero;
        }
        else if ($n==4) {
            $a='0'.$numero;
        }
        else{
            $a=$numero;
        }
        return $a;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Auth::user()->tipo == 1)
        {
            $a= 'required';
        }
        else
        {
            $a='';
        }
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string',
            'apellido' => 'required|string',
            'edad' =>'integer',
            'club' =>$a,
            'grado' => 'required',
            'sexo' =>'required',
            'foto' => 'file|mimes:png,jpg,jpeg|max:5120',
            'talla' => 'numeric|min:0.60|max:2.20',
        ]);
        if ($validator->fails()) {
            alert()->error('Ups!','La operación no pudo ser completada')->autoClose(4000)->showCloseButton();
            return redirect('/admin/inscripciones/nuevo/'.$request->torneo)
                ->withErrors($validator)
                ->withInput();
        }

        $competidor = New User();
        $competidor->nombres = $request->nombre;
        $competidor->apellidos = $request->apellido;
        $competidor->email = $request->email;
        $competidor->password = bcrypt('12345678');
        $competidor->telefono = $request->telefono;
        $competidor->sexo = $request->sexo;
        $competidor->anfitrion_id = Auth::user()->id;
        if(Auth::user()->tipo==1)
        {
            $competidor->club_id = $request->club;
        }
        else
        {
            $competidor->club_id = Auth::user()->club_id;
        }


        if ($request->nacimiento) {
            $competidor->nacimiento = $request->nacimiento;
        }
        if ($request->edad) {
            $competidor->edad = $request->edad;
        }
        $competidor->observaciones = $request->observaciones;

        $foto  = Input::file('foto');
        if (!is_null($foto)) {
            $name2=str_replace(' ', '-', strtolower($request->nombre.' '.$request->apellido));
            $largo=strlen($name2);
            $extension=$foto->getClientOriginalExtension();
            $fin=$largo - strlen($extension);
            $name=$name2.'.'.$extension;
            $path=public_path().'/resources/img/user/';
            $foto->move($path,$name);
            $competidor->foto='/resources/img/user/'.$name;
        }
        $competidor->save();

        //Agregando inscripcion
        $inscripcion = New Inscripcion();
        $ultimocompetidor = User::orderBy('id','desc')->first();

        if($request->kumite)
        {
            $inscripcion->kumite = $request->kumite;
        }
        if($request->kata)
        {
            $inscripcion->kata = $request->kata;
        }
        $inscripcion->modalidad_id =1;
        $inscripcion->competidor_id = $ultimocompetidor->id;
        $inscripcion->cabeza_serie = $request->cabeza_serie;
        $inscripcion->edad = $request->edad;
        $inscripcion->grado = $request->grado;
        $inscripcion->save();

        alert()->success('¡Yeah!',$competidor->nombres.' '.$competidor->apellidos.' fue registrado con éxito')->autoClose(5000)->showCloseButton();
        return redirect('/admin/torneos');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    //Funcion para obtener la categoria de un competidor
    public function obtenerCategoria(Request $request)
    {
        if($request->ajax())
        {
            $torneo = $request->torneo;
            if($request->nacimiento)
            {
                $edad = Carbon::parse($request->nacimiento)->age;
            }
            if($request->edad)
            {
                $edad = $request->edad;
            }

            $grado = $request->grado;
            $sexo = $request->sexo;
            $modalidad_id = NULL;
            $modalidades=Modalidad::where('torneo_id',$torneo)->where('sexo',$sexo)->get();

            foreach($modalidades as $modalidad)
            {
                if($edad <= $modalidad->edad_max && $edad >= $modalidad->edad_min)
                {
                    if($grado >= $modalidad->grado_max && $grado <= $modalidad->grado_min)
                    {
                        $modalidad_id = $modalidad->id;
                    }

                }
            }
            $resultado = Modalidad::find($modalidad_id);
            // $r = User::find(1);
            // return response()->json($modalidades,200);
            return $resultado;
        }
    }
}
