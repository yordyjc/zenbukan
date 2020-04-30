<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Sector;
use App\Models\Ficha;
use App\Models\Periodo;
use Auth;
use App\User;

class FichaController extends Controller
{
    public function actual()
    {
        $ficha = Ficha::where('user_id',Auth::user()->id)->with('periodos')->first();
        $periodos = Periodo::where('ficha_id',$ficha->id)->orderBy('id','desc')->take(5)->get();
        $data=$periodos->first();
        $imc=round($data->peso/($data->talla*$data->talla),1);            
        return view('user.actual.index')
            ->with('ficha',$ficha)
            ->with('periodos',$periodos)
            ->with('imc',$imc);
    }
    public function mificha()
    {
        $ficha = Ficha::where('user_id',Auth::user()->id)->with('periodos')->first();
        return view('user.periodos.index')
            ->with('ficha',$ficha);
    }

    public function verperiodo($id)
    {
        $periodo=Periodo::find($id);

        $baneado = $periodo->ficha->usuario->activo;

        if ($baneado!=0) {
            return view('user.periodos.ver')
                ->with('periodo',$periodo);
        }
        else{
            return redirect('/admin/sin-permiso');
        }
    }
}
