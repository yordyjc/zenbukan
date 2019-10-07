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
use App\Models\Periodo;

class ReportesController extends Controller
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

    public function fechasGet()
    {
        $desde = Carbon::now()->subMonth(1)->format('Y-m-d');
        $hasta = Carbon::now()->format('Y-m-d');

        $inscritos = User::where('tipo',2)->where('activo',1)->whereBetween('created_at', [$desde, $hasta])->orderBy('id','desc')->get();

        return view('admin.reportes.fechas')
            ->with('desde',$desde)
            ->with('hasta',$hasta)
            ->with('inscritos',$inscritos);
    }

    public function fechasPost(Request $request)
    {
        $desde = $request->desde;
        $hasta = $request->hasta;

        $inscritos = User::where('tipo',2)->where('activo',1)->whereBetween('created_at', [$desde, $hasta])->orderBy('id','desc')->get();

        return view('admin.reportes.fechas')
            ->with('desde',$desde)
            ->with('hasta',$hasta)
            ->with('inscritos',$inscritos);
    }

    public function sexoGet()
    {
        $desde = Carbon::now()->subMonth(1)->format('Y-m-d');
        $hasta = Carbon::now()->format('Y-m-d');
        $sexo = NULL;

        $inscritos = User::where('tipo',2)->where('activo',1)->whereBetween('created_at', [$desde, $hasta])->orderBy('id','desc')->get();

        return view('admin.reportes.sexo')
            ->with('desde',$desde)
            ->with('hasta',$hasta)
            ->with('sexo',$sexo)
            ->with('inscritos',$inscritos);
    }

    public function sexoPost(Request $request)
    {
        $desde = $request->desde;
        $hasta = $request->hasta;
        $sexo = $request->sexo;

        if ($sexo != NULL) {
            $inscritos = User::where('tipo',2)->where('activo',1)->where('sexo',$sexo)->whereBetween('created_at', [$desde, $hasta])->orderBy('id','desc')->get();
        } else {
            $inscritos = User::where('tipo',2)->where('activo',1)->whereBetween('created_at', [$desde, $hasta])->orderBy('id','desc')->get();
        }

        return view('admin.reportes.sexo')
            ->with('desde',$desde)
            ->with('hasta',$hasta)
            ->with('sexo',$sexo)
            ->with('inscritos',$inscritos);
    }

    public function objetivoGet()
    {
        $desde = Carbon::now()->subMonth(1)->format('Y-m-d');
        $hasta = Carbon::now()->format('Y-m-d');
        $objetivo = NULL;

        $inscritos = User::where('tipo',2)->where('activo',1)->whereBetween('created_at', [$desde, $hasta])->orderBy('id','desc')->get();

        return view('admin.reportes.objetivo')
            ->with('desde',$desde)
            ->with('hasta',$hasta)
            ->with('objetivo',$objetivo)
            ->with('inscritos',$inscritos);
    }

    public function objetivoPost(Request $request)
    {
        $desde = $request->desde;
        $hasta = $request->hasta;
        $objetivo = $request->objetivo;

        if ($objetivo != NULL) {
            $inscritos = User::where('tipo',2)->where('activo',1)->where('interes',$objetivo)->whereBetween('created_at', [$desde, $hasta])->orderBy('id','desc')->get();
        } else {
            $inscritos = User::where('tipo',2)->where('activo',1)->whereBetween('created_at', [$desde, $hasta])->orderBy('id','desc')->get();
        }

        return view('admin.reportes.objetivo')
            ->with('desde',$desde)
            ->with('hasta',$hasta)
            ->with('objetivo',$objetivo)
            ->with('inscritos',$inscritos);
    }

    public function cumpleanosGet()
    {
        $mes = Carbon::now()->format('m');

        $inscritos = User::where('tipo',2)->where('activo',1)->whereMonth('nacimiento',$mes)->orderBy('nacimiento','asc')->get();

        return view('admin.reportes.cumpleanos')
            ->with('mes',$mes)
            ->with('inscritos',$inscritos);
    }

    public function cumpleanosPost(Request $request)
    {
        $mes = $request->mes;

        $inscritos = User::where('tipo',2)->where('activo',1)->whereMonth('nacimiento',$mes)->orderBy('nacimiento','asc')->get();

        return view('admin.reportes.cumpleanos')
            ->with('mes',$mes)
            ->with('inscritos',$inscritos);
    }
}
