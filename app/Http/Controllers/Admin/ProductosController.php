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

use App\Models\Producto;

class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos=Producto::all();
        return view('admin.web.productos.index')->with('productos',$productos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.web.productos.crear');
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
            'nombre' => 'required',
            'foto' => 'required|file|mimes:png,jpg,jpeg|max:5120',
            'descripcion' => 'required',
            'precio' => 'required',
        ]);
        if ($validator->fails()) {
            alert()->error('Ups!','La operación no pudo ser completada')->autoClose(4000)->showCloseButton();
            return redirect('/admin/productos/create')
                ->withErrors($validator)
                ->withInput();
        }

        $producto=new Producto();
        $producto->nombre=$request->nombre;
        $producto->descripcion=$request->descripcion;
        $foto  = Input::file('foto');
        if (!is_null($foto)) {
            $extension=$foto->getClientOriginalExtension();
            $name=str_replace(' ', '-', strtolower($producto->nombre)).'.'.$extension;
            $path=public_path().'/resources/img/productos/';
            $foto->move($path,$name);
            $producto->foto='/resources/img/productos/'.$name;
        }
        $producto->youtube=$request->youtube;
        $producto->moneda=$request->moneda;
        $producto->precio=$request->precio;
        $producto->oferta=$request->oferta;
        $producto->save();
        alert()->success('¡Yeah!','Operación realizada con éxito')->autoClose(3000)->showCloseButton();
        return redirect('/admin/productos');
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
        $producto=Producto::find($id);
        if ($producto) {
            return view('admin.web.productos.editar')
                ->with('producto',$producto);
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
        $validator = Validator::make($request->all(), [
            'nombre' => 'required',
            'descripcion' => 'required',
            'precio' => 'required',
        ]);
        if ($validator->fails()) {
            alert()->error('Ups!','La operación no pudo ser completada')->autoClose(4000)->showCloseButton();
            return redirect('/admin/productos/'.$id.'/edit')
                ->withErrors($validator)
                ->withInput();
        }

        $producto=Producto::find($id);
        $producto->nombre=$request->nombre;
        $producto->descripcion=$request->descripcion;
        $foto  = Input::file('foto');
        if (!is_null($foto)) {
            File::delete(public_path().$producto->foto);
            $extension=$foto->getClientOriginalExtension();
            $name=str_replace(' ', '-', strtolower($producto->nombre)).'.'.$extension;
            $path=public_path().'/resources/img/productos/';
            $foto->move($path,$name);
            $producto->foto='/resources/img/productos/'.$name;
        }
        $producto->youtube=$request->youtube;
        $producto->moneda=$request->moneda;
        $producto->precio=$request->precio;
        $producto->oferta=$request->oferta;
        $producto->save();
        alert()->success('¡Yeah!','Operación realizada con éxito')->autoClose(3000)->showCloseButton();
        return redirect('/admin/productos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $producto=Producto::find($id);
        File::delete(public_path().$producto->foto);
        $producto->delete();

        alert()->success('¡Yeah!','Operación realizada con éxito')->autoClose(3000)->showCloseButton();
        return redirect('/admin/productos');
    }
}
