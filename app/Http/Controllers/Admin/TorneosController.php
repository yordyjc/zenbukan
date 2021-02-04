<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Torneo;
use Illuminate\Support\Facades\Input;
use File;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Response;


class TorneosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $torneos= Torneo::all()
                ->where('estado',1);
        return view('admin.torneos.index')->with('torneos',$torneos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.torneos.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // if(is_null($request->kata)) $b='required';
        // else $b='';

        // if(is_null($request->kumite)) $a= 'required';
        // else $a= '';
        $a = '';
        if($request->precio)
        {
            $a = 'numeric';
        }
        $validator = Validator::make($request->all(),[
            'nombre' => 'required | string',
            'descripcion' => 'required | string',
            'foto' => 'file | max:5120',
            'portada' => 'file | max:5120',
            'bases' => 'file | max:5120',
            'fecha' => 'required | date',
            'hora' => 'required',
            'precio' => $a,
            'lugar' => 'required | string'
            // 'kata' => $a,
            // 'kumite' => $b
        ]);

        if($validator->fails())
        {
            alert()->error('Ups!', 'La operación no pude se completada')->autoClose(4000)->showCloseButton();
            return redirect('admin/torneos/create')
                ->withErrors($validator)
                ->withInput();
        }

        $torneo = new Torneo;
        $torneo->nombre = $request->nombre;
        $torneo->descripcion = $request->descripcion;
        $torneo->bases = $request->bases;
        $torneo->fecha = $request->fecha;
        $torneo->hora = $request->hora;
        if($request->precio)
        {
            $torneo->precio = $request->precio;
        }
        $torneo->lugar = $request->lugar;
        if(!is_null($request->kata)) $torneo->kata = $request->kata;
        if(!is_null($request->kumite)) $torneo->kumite = $request->kumite;
        $portada = Input::file('portada');
        $bases = Input::file('bases');

        if(!is_null($portada))
        {

            $name2=str_replace(' ', '-', strtolower($request->nombre));
            $largo=strlen($name2);
            $extension=$portada->getClientOriginalExtension();
            $fin=$largo - strlen($extension);
            $name=$name2.'.'.$extension;
            $path=public_path().'/resources/img/torneos/';
            $portada->move($path,$name);
            $torneo->portada='/resources/img/torneos/'.$name;

        }

        if(!is_null($bases))
        {
            $namebases = time().'.pdf';
            $pathbases=public_path().'/resources/bases/';
            $bases->move($pathbases,$namebases);
            $torneo->bases = '/resources/bases/'.$namebases;
        }

        $foto = Input::file('foto');
        if( !is_null($foto))
        {
            $extension = $foto->getClientOriginalExtension();
            $name = time().'.'.$extension;
            $path = public_path().'/resources/img/torneos/';
            $foto->move($path,$name);
            $torneo->foto = '/resources/img/torneos/'.$name;
        }


        $torneo->save();
        alert()->success('Yeah!', $torneo->nombre.' fue registrado con exito');
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
        $torneo = Torneo::find($id);
        $torneo->estado = 0;
        $torneo->save();
        return redirect('admin/torneos');
    }
}
