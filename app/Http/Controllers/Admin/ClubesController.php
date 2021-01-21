<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use File;
use Illuminate\Support\Facades\Validator;
use App\Models\Club;
use App\Models\Pais;

class ClubesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clubes = Club::all();
        return view('admin.clubes.index')->with('clubes',$clubes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pais = Pais::all()->pluck('nombre','id');
        return view('admin.clubes.crear')
            ->with('pais', $pais);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator= Validator::make($request->all(),[
            'nombre' => 'required | string',
            'pais' => 'required',
            'direccion' => 'string',
            'foto' => 'file|mimes:png,jpg,jpeg|max:5120'
        ]);

        if($validator->fails())
        {
            alert()->error('Ups!', 'La operación no pude se completada')->autoClose(4000)->showCloseButton();
            return redirect('admin/clubes/create')
                ->withErrors($validator)
                ->withInput();
        }

        $club = new Club;
        $club->nombre = $request->nombre;
        $club->pais = $request->pais;
        $club->direccion = $request->direccion;
        $foto = Input::file('foto');
        if(!is_null($foto))
        {
            $name2 = str_replace(' ','_',strtolower($request->nombre));
            $extension=$foto->getClientOriginalExtension();
            $name=$name2.'.'.$extension;
            $path=public_path().'/resources/img/clubes/';
            $foto->move($path,$name);
            $club->foto = '/resources/img/clubes/'.$name;
        }
        $club->save();
        alert()->success('Yeah!', $club->nombre.' fue registrado con exito');
        return redirect('/admin/clubes');

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
}
