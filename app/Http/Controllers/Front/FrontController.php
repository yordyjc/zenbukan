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

use Auth;
use Mail;

class FrontController extends Controller
{
    public function index()
    {
        $configuracion=Configuracion::find(1);
        return view('front.index.index')
            ->with('configuracion',$configuracion);
    }

    public function imc()
    {
        $configuracion=Configuracion::find(1);
        return view('front.imc.index')
            ->with('fondo',$fondo)
            ->with('configuracion',$configuracion);
    }
}
