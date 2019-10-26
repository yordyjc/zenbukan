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
use App\Models\Sector;
use App\Models\Ficha;

class InscritosController extends Controller
{
    public function ultima_ficha()
    {
        $ultimo=Ficha::orderBy('correlativo','desc')->first();
        if ($ultimo) {
            $numero=$ultimo->correlativo+1;
        }
        else{
            $numero=1;
        }
        return $numero;
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inscritos = User::where('tipo',2)->orderBy('id','desc')->get();
        return view('admin.inscritos.index')
            ->with('inscritos',$inscritos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sectores = Sector::all()->pluck('sector','id');
        return view('admin.inscritos.crear')
            ->with('sectores',$sectores);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string',
            'apellido' => 'required|string',
            'telefono' => 'required',
            'email' => 'required|string|email|max:255|unique:users',
            'foto' => 'file|mimes:png,jpg,jpeg|max:5120',
            'talla' => 'numeric|min:0.60|max:2.20',
        ]);
        if ($validator->fails()) {
            alert()->error('Ups!','La operación no pudo ser completada')->autoClose(4000)->showCloseButton();
            return redirect('/admin/inscritos/create')
                ->withErrors($validator)
                ->withInput();
        }

        $inscrito = New User();
        $inscrito->nombres = $request->nombre;
        $inscrito->apellidos = $request->apellido;
        $inscrito->email = $request->email;
        $inscrito->password = bcrypt('12345678');
        $inscrito->telefono = $request->telefono;
        $inscrito->sexo = $request->sexo;
        $inscrito->sector_id = $request->sector;
        $inscrito->interes = $request->interes;
        if ($request->nacimiento) {
            $inscrito->nacimiento = $request->nacimiento;
        }
        if ($request->edad) {
            $inscrito->edad = $request->edad;
        }
        $inscrito->enfermedad = $request->enfermedad;
        $inscrito->observaciones = $request->observaciones;

        $foto  = Input::file('foto');
        if (!is_null($foto)) {
            $name2=str_replace(' ', '-', strtolower($request->nombre.' '.$request->apellido));
            $largo=strlen($name2);
            $extension=$foto->getClientOriginalExtension();
            $fin=$largo - strlen($extension);
            $name=$name2.'.'.$extension;
            $path=public_path().'/resources/img/user/';
            $foto->move($path,$name);
            $inscrito->foto='/resources/img/user/'.$name;
        }

        $inscrito->save();

        $actual_ficha=$this->ultima_ficha();

        $ficha = New Ficha();
        $ficha->user_id = $inscrito->id;
        $ficha->correlativo = $actual_ficha;
        $ficha->talla = $request->talla;
        $ficha->fecha = Carbon::now();
        $ficha->save();

        alert()->success('¡Yeah!',$inscrito->nombres.' '.$inscrito->apellidos.' fue registrado con éxito')->autoClose(5000)->showCloseButton();
        return redirect('/admin/inscritos');
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
        $inscrito=User::find($id);

        if ($inscrito->tipo==2) {
            $sectores = Sector::all()->pluck('sector','id');
            return view('admin.inscritos.editar')
                ->with('inscrito',$inscrito)
                ->with('sectores',$sectores);
        }
        else{
            return redirect('/admin/sin-permiso');
        }
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
        $foto  = Input::file('foto');
        if (!is_null($foto)) $a='required|file|mimes:png,jpg,jpeg|max:5120';
        else $a='';

        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string',
            'apellido' => 'required|string',
            'email' => 'required|string|email|max:255|unique:users,email,'.$id,
            'talla' => 'numeric|min:0.60|max:2.20',
            'foto' => $a,
        ]);
        if ($validator->fails()) {
             alert()->error('Ups!','La operación no pudo ser completada')->autoClose(4000)->showCloseButton();
            return redirect('/admin/inscritos/'.$id.'/edit')
            ->withErrors($validator)
            ->withInput();
        }

        $inscrito=User::find($id);
        $inscrito->nombres = $request->nombre;
        $inscrito->apellidos = $request->apellido;
        $inscrito->email = $request->email;
        $inscrito->telefono = $request->telefono;
        $inscrito->sexo = $request->sexo;
        $inscrito->sector_id = $request->sector;
        $inscrito->interes = $request->interes;
        if ($request->nacimiento) {
            $inscrito->nacimiento = $request->nacimiento;
        }
        if ($request->edad) {
            $inscrito->edad = $request->edad;
        }
        $inscrito->enfermedad = $request->enfermedad;
        $inscrito->observaciones = $request->observaciones;
        $inscrito->activo = $request->activo;

        if (!is_null($foto)) {
            File::delete(public_path().$inscrito->foto);
            $name2=str_replace(' ', '-', strtolower($request->nombre.' '.$request->apellido));
            $largo=strlen($name2);
            $extension=$foto->getClientOriginalExtension();
            $fin=$largo - strlen($extension);
            $name=$name2.'.'.$extension;
            $path=public_path().'/resources/img/user/';
            $foto->move($path,$name);
            $inscrito->foto='/resources/img/user/'.$name;
        }
        $inscrito->save();

        $ficha = Ficha::where('user_id',$id)->first();
        $ficha->talla = $request->talla;
        $ficha->activo = $request->activo;
        $ficha->save();

        alert()->success('¡Yeah!','Los datos de'.$inscrito->nombres.' '.$inscrito->apellidos.' se actualizaron con éxito')->autoClose(5000)->showCloseButton();
        return redirect('/admin/inscritos');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $inscrito=User::find($id);
        $inscrito->activo = 0;
        $inscrito->save();

        $ficha = Ficha::where('user_id',$id)->first();
        $ficha->activo = 0;
        $ficha->save();

        alert()->success('¡Yeah!',$inscrito->nombres.' '.$inscrito->apellidos.' dejó de ser activo del gimnasio')->autoClose(3000)->showCloseButton();
        return redirect('/admin/inscritos');
    }
}
