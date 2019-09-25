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

class FichasController extends Controller
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
    public function listaFichas()
    {
        $inscritos = User::where('tipo',2)->where('activo',1)->orderBy('id','desc')->get();
        return view('admin.fichas.index')
            ->with('inscritos',$inscritos);
    }

    public function verFicha($correlativo)
    {
        $ficha = Ficha::where('correlativo',$correlativo)->with('periodos')->first();
        return view('admin.fichas.ver')
            ->with('ficha',$ficha);
    }
}
