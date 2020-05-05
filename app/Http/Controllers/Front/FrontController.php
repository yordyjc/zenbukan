<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Validator;
use Response;
use Illuminate\Support\Facades\Input;
use File;
use Carbon\Carbon;

use App\User;
use App\Models\Configuracion;
use App\Models\Fondo;
use App\Models\Producto;
use App\Models\Servicio;
use App\Models\Plan;
use App\Models\Preinscripcion;
use App\Models\Suscriptor;

use Auth;
use Mail;

class FrontController extends Controller
{
    public function ultimo_fondo()
    {
        $ultimo=Fondo::orderBy('numero','desc')->first();
        if ($ultimo) {
            $numero=$ultimo->numero;
        }
        else{
            $numero=1;
        }
        return $numero;
    }

    public function fondo(){
        $elegido = rand(1,$this->ultimo_fondo());
        $fondo = Fondo::where('numero',$elegido)->first();
        return $fondo->foto;
    }

    public function index()
    {
        $configuracion=Configuracion::find(1);
        return view('front.index.index')
            ->with('fondo',$this->fondo())
            ->with('configuracion',$configuracion);
    }

    public function imc()
    {
        $configuracion=Configuracion::find(1);
        return view('front.imc.index')
            ->with('fondo',$this->fondo())
            ->with('configuracion',$configuracion);
    }

    public function listaProductos()
    {
        $productos=Producto::orderBy('oferta','desc')->get();
        $configuracion=Configuracion::find(1);
        return view('front.productos.index')
            ->with('fondo',$this->fondo())
            ->with('configuracion',$configuracion)
            ->with('productos',$productos);
    }

    public function detalleProducto($slug)
    {
        $producto=Producto::where('slug',$slug)->first();
        if ($producto) {
            $configuracion=Configuracion::find(1);
            return view('front.productos.detalle')
            ->with('fondo',$this->fondo())
            ->with('configuracion',$configuracion)
            ->with('producto',$producto);
        }
        else{
            return redirect('/productos');
        }
    }

    public function listaServicios()
    {
        $servicios=Servicio::orderBy('id','asc')->get();
        $configuracion=Configuracion::find(1);
        return view('front.servicios.index')
            ->with('fondo',$this->fondo())
            ->with('configuracion',$configuracion)
            ->with('servicios',$servicios);
    }

    public function listaPlanes()
    {
        $planes=Plan::orderBy('id','asc')->get();
        $configuracion=Configuracion::find(1);
        return view('front.planes.index')
            ->with('fondo',$this->fondo())
            ->with('configuracion',$configuracion)
            ->with('planes',$planes);
    }

    public function formPreInscripcion()
    {
        $planes=Plan::orderBy('id','asc')->get();
        $configuracion=Configuracion::find(1);
        return view('front.planes.preinscripcion')
            ->with('fondo',$this->fondo())
            ->with('configuracion',$configuracion)
            ->with('planes',$planes);
    }

    public function sendPreInscripcion(Request $request)
    {
        if ($request->ajax()) {
            $preinscripcion = New Preinscripcion();
            $preinscripcion->nombre = $request->nombre;
            $preinscripcion->celular = $request->telefono;
            $preinscripcion->email = $request->email;
            $preinscripcion->plan = $request->plan;
            $preinscripcion->save();
            return 'ok';
        }
        else{

        }
    }

    public function sendSuscripcion(Request $request)
    {
        if ($request->ajax()) {
            $suscriptor = New Suscriptor();
            $suscriptor->nombre = $request->nombre;
            $suscriptor->email = $request->email;
            $suscriptor->save();
            return 'ok';
        }
        else{

        }
    }
}
