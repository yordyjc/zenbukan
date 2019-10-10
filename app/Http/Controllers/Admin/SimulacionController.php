<?php

namespace App\Http\Controllers\admin;

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
use App\Models\Periodo;

class SimulacionController extends Controller
{
    public function ver($correlativo)
    {
    	$ficha = Ficha::where('correlativo',$correlativo)->with('periodos')->first();
        return view('admin.fichas.alt-simulacion')
            ->with('ficha',$ficha);
    }
}
