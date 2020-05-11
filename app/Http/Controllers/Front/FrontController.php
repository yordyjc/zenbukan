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
use App\Models\Contacto;
use App\Models\Galeria;
use App\Models\Video;
use App\Models\Pase;

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
        $planes=Plan::orderBy('id','asc')->get();
        $configuracion=Configuracion::find(1);
        return view('front.index.index')
            ->with('fondo',$this->fondo())
            ->with('configuracion',$configuracion)
            ->with('planes',$planes);
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
        if ($request->ajax() && $request->nombre!=NULL && $request->email!=NULL) {
            $suscriptor = New Suscriptor();
            $suscriptor->nombre = $request->nombre;
            $suscriptor->email = $request->email;
            $suscriptor->save();
            return 'ok';
        }
        else{

        }
    }

    public function formContacto()
    {
        $configuracion=Configuracion::find(1);
        $servicios=Servicio::orderBy('id','asc')->get();
        return view('front.contacto.index')
            ->with('fondo',$this->fondo())
            ->with('configuracion',$configuracion)
            ->with('servicios',$servicios);
    }

    public function sendContacto(Request $request)
    {
        if ($request->ajax()) {
            $contacto = New Contacto();
            $contacto->nombre = $request->nombre;
            $contacto->celular = $request->telefono;
            $contacto->email = $request->email;
            $contacto->mensaje = $request->mensaje;
            $contacto->save();
            return 'ok';
        }
        else{

        }
    }

    public function formPase()
    {
        $configuracion=Configuracion::find(1);
        $servicios=Servicio::orderBy('id','asc')->get();
        return view('front.pase-gratis.index')
            ->with('fondo',$this->fondo())
            ->with('configuracion',$configuracion)
            ->with('servicios',$servicios);
    }

    public function sendPase(Request $request)
    {
        $check=Pase::where('dni',$request->dni)->first();
        if ($check) {

        }
        else{
            if ($request->ajax()) {
                $pase = New Pase();
                $pase->nombre = $request->nombre;
                $pase->dni = $request->dni;
                $pase->celular = $request->telefono;
                $pase->email = $request->email;
                $pase->save();
                return 'ok';
            }

        }
    }

    //Galeria de videos
    public function galeriasVideos()
    {
        $galerias=Galeria::orderBy('id','desc')->get();
        $configuracion=Configuracion::find(1);
        return view('front.galerias-videos.index')
            ->with('galerias',$galerias)
            ->with('fondo',$this->fondo())
            ->with('configuracion',$configuracion);
    }

    public function videos($id)
    {
        $videos=Video::where('galeria_id',$id)->orderBy('id','desc')->get();
        $configuracion=Configuracion::find(1);
        $galeria=Galeria::find($id);
        return view('front.galerias-videos.videos')
            ->with('fondo',$this->fondo())
            ->with('configuracion',$configuracion)
            ->with('videos',$videos)
            ->with('galeria',$galeria);
    }

    public function misionVision()
    {
        $configuracion=Configuracion::first();
        return view('front.mision-vision.index')
                ->with('configuracion',$configuracion)
                ->with('fondo',$this->fondo());

    }

    public function horarios()
    {
        $configuracion=Configuracion::first();
        return view('front.horarios.index')
                ->with('configuracion',$configuracion)
                ->with('fondo',$this->fondo());
    }

    public function entrenamientoKids()
    {
        $configuracion=Configuracion::first();
        return view('front.programas.ninos')
                ->with('configuracion',$configuracion)
                ->with('fondo',$this->fondo());
    }

    public function maternidad()
    {
        $configuracion=Configuracion::first();
        return view('front.programas.maternidad')
                ->with('configuracion',$configuracion)
                ->with('fondo',$this->fondo());
    }

    public function corporativo()
    {
        $configuracion=Configuracion::first();
        return view('front.programas.corporativo')
                ->with('configuracion',$configuracion)
                ->with('fondo',$this->fondo());
    }
}
