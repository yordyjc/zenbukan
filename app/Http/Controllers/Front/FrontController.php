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
}
