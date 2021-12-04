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
use App\Models\Club;
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

    }

    public function inscritosAprobados()
    {

    }

    public function listaInscritos()
    {
        $inscritos = Inscripcion::orderBy('id','desc')->get();
        return view('admin.inscripciones.inscritos')
            ->with('inscritos',$inscritos);
    }

    public function Inscritos($id){
        //$modalidad= Modalidad::where('torneo.id',$id)->get();
        $allinscritos = Inscripcion::orderBy('id','desc')->get();
        $inscritos = $allinscritos->where('modalidad.torneo_id',$id);
        return view('admin.inscripciones.inscritos')->with('inscritos',$inscritos);
    }

    public function torneosVigentes()
    {
        $torneos = Torneo::where('estado',1)->get();
        return view('admin.inscripciones.torneos-vigentes')->with('torneos',$torneos);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function frmCrear($id)
    {
        $clubes= Club::all()->pluck('nombre', 'id');
        $competidores=User::where('tipo',4)->where('activo',1)->where('club_id',Auth::user()->club_id)->pluck('doc','id');
        //$sectores = Sector::all()->pluck('sector','id');
        $torneo = Torneo::find($id);
        return view('admin.inscripciones.crear')->with('torneo',$torneo)->with('clubes',$clubes)->with('dniComp', $competidores);
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
        $inscripcion->anfitrion_id = Auth::user()->id;
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
        if(Auth::user()->tipo==1)
        {
            $competidor->club_id = $request->club;
        }
        else
        {
            $competidor->club_id = Auth::user()->club_id;
        }
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

    public function storeInscripcion(Request $request)
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
            'club' =>$a,
            'grado' => 'required'
            //'email'=> 'required|string|email|max:255|unique:users'
        ]);
        if ($validator->fails()) {
            alert()->error('Ups!','La operación no pudo ser completada')->autoClose(4000)->showCloseButton();
            return redirect('/admin/inscripciones/nuevo/'.$request->torneo)
                ->withErrors($validator)
                ->withInput();
        }

        //Agregando inscripcion
        $inscripcion = New Inscripcion();
        $inscripcion->anfitrion_id = Auth::user()->id;
        $ultimocompetidor = User::orderBy('id','desc')->first();
        if($request->kumite)
        {
            $inscripcion->kumite = $request->kumite;
        }
        if($request->kata)
        {
            $inscripcion->kata = $request->kata;
        }
        $inscripcion->modalidad_id =$request->modalidad;
        $inscripcion->competidor_id = $request->dniComp;
        $inscripcion->cabeza_serie = $request->cabeza_serie;
        $inscripcion->edad = $request->edad;
        $inscripcion->grado = $request->grado;
        if(Auth::user()->tipo==1)
        {
            $inscripcion->club_id = $request->club;
        }
        else
        {
            $inscripcion->club_id = Auth::user()->club_id;
        }
        $inscripcion->save();

        alert()->success('¡Yeah!','Competidor registrado con éxito')->autoClose(5000)->showCloseButton();
        return redirect('/admin/inscripciones/nuevo/'.$request->torneo);
    }

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

    }

    //Funcion para obtener la categoria de un competidor
    public function obtenerCategoria(Request $request)
    {
        if($request->ajax())
        {
            $competidor=User::find($request->dniComp);
            $torneo = $request->torneo;
            if($competidor->nacimiento)
            {
                $edad = Carbon::parse($competidor->nacimiento)->age;
            }
            if($competidor->edad)
            {
                $edad = $competidor->edad;
            }

            $grado = $request->grado;
            $sexo = $competidor->sexo;
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

    public function aprobarCompetencia(Request $request, $id)
    {
        $inscripcion = Inscripcion::find($id);
        //return $inscripcion;
        $inscripcion->estado = $request->estado;
        $inscripcion->save();
        return redirect('admin/inscripciones/lista-inscritos');

    }

    public function aprobarPorTorneo($im, $id, Request $request)
    {
        $inscripcion = Inscripcion::find($id);
        //return $inscripcion;
        $inscripcion->estado = $request->estado;
        $inscripcion->save();
        return redirect('admin/inscripciones/inscritos/'.$im);
    }

    public function destroyInscripcion($im, $id)
    {
        $inscripcion = Inscripcion::find($id);
        $inscripcion->delete();
        return redirect('admin/inscripciones/inscritos/'.$im);
    }

    public function getNombre(Request $request, $id)
    {
        if($request->ajax())
        {
            $nomComp=User::select('nombres','apellidos')
                ->where('id',$id)
                ->get();
            return $nomComp;
        }
    }
    //METODOS PARA COMPETIDORES
    public function storeCompetidor(Request $request)
    {
        if($request->ajax())
        {
            if($request->nacimiento)
            {
                $a='required';
                $b='';
            }
            else
            {
                $a='';
                $b='required';
            }
            $validator = Validator::make($request->all(), [
                'Dni' =>'required||max:8|unique:users,doc',
                'nombres' => 'required|string',
                'apellidos' => 'required|string',
                'nacimiento' =>$a,
                'edad'=> $b

                //'email'=> 'required|string|email|max:255|unique:users'
            ]);
            if ($validator->fails()) {
                return response()->json($validator->errors(),422);
                //return $validator->errors();
            }
            $competidor = New User();
            $competidor->doc=$request->Dni;
            $competidor->nombres = $request->nombres;
            $competidor->apellidos = $request->apellidos;
            $competidor->password = bcrypt('12345678');
            $competidor->sexo = $request->sexo;
            $competidor->club_id = Auth::user()->club_id;
            if ($request->nacimiento) {
                $competidor->nacimiento = $request->nacimiento;
            }
            if ($request->edad) {
                $competidor->edad = $request->edad;
            }

            $foto  = Input::file('foto');
            if (!is_null($foto)) {
                $name2=str_replace(' ', '-', strtolower($request->nombres.' '.$request->apellidos.' '.$request->Dni));
                $largo=strlen($name2);
                $extension=$foto->getClientOriginalExtension();
                $fin=$largo - strlen($extension);
                $name=$name2.'.'.$extension;
                $path=public_path().'/resources/img/user/';
                $foto->move($path,$name);
                $competidor->foto='/resources/img/user/'.$name;
            }
            $competidor->save();
            return $foto;
            }
    }
}

