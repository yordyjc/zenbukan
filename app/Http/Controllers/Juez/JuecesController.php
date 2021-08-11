<?php

namespace App\Http\Controllers\Juez;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\Modalidad;
use App\Models\Posicion;
use App\Models\Posicioneskata;
use App\Models\Inscripcion;
use App\Models\Calificacioneskata;

class JuecesController extends Controller
{
    public function index()
    {
        $juez = User::find(Auth::user()->id);
        $modalidades = $juez->modalidades;
        return view('juez.torneos.index')
            ->with('modalidades',$modalidades);
    }

    public function Combates($id) //devuelve la vista que contiene todos los combates de la categoria seleccionada
    {
        $combates = Posicion::where('modalidad_id',$id)
            ->orderBy('posicion','asc')
            ->with('inscripcion')
            ->get();
        $modalidad = Modalidad::find($id);
        $torneo = $modalidad->torneo;
        return view('juez.combates.index')
            ->with('combates',$combates)
            ->with('modalidad', $modalidad)
            ->with('torneo', $torneo);
    }


    public function frmKata($id)
    {
        $modalidad_id = $id;
        //obtiene la ultima ronda de la categoria
        $ultimaRonda=Posicioneskata::where('modalidad_id', $modalidad_id)->orderBy('ronda','desc')->first();
        $ultGrupo=Posicioneskata::where('modalidad_id', $modalidad_id)->where('ronda',$ultimaRonda->ronda)->orderBy('grupo','desc')->first();
        return view('juez.combates.kata')
            ->with('ultGrupo',$ultGrupo);
    }

    /*************************************
                CALIFICACIONES
     *************************************/

    public function frmCalificarKata($id)
    {
        /*
        $posicionkata = Posicioneskata::find($id);
        //$incripcion = Inscripcion::find($id);
        return view('juez.combates.pantalla_calificacion_kata')
            ->with('posicionkata',$posicionkata);
            */
        $modalidad_id = $id;
        //obtiene la ultima ronda de la categoria
        $ultimaRonda=Posicioneskata::where('modalidad_id', $modalidad_id)->select('ronda')->orderBy('ronda','desc')->first();
        //$ultimaRonda=DB::table('posicioneskata')->select('ronda')->distinct()->get();
        //$ultimo=$ultimaRonda;

        $posicionkata = Posicioneskata::where('modalidad_id', $modalidad_id)->where('ronda',$ultimaRonda->ronda)->where('grupo',1)->orderBy('id','asc')->with('inscripcion.competidor')->with('inscripcion.club')->first();
        $ultGrupo=Posicioneskata::where('modalidad_id', $modalidad_id)->where('ronda',$ultimaRonda->ronda)->orderBy('grupo','desc')->first();
        return view('juez.combates.pantalla_calificacion_kata')
            ->with('posicionkata',$posicionkata)
            ->with('ultGrupo', $ultGrupo->grupo);
    }

    public function calificaKata(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tecnico1' => 'required',
            'tecnico2' => 'required',
            'atletico1' => 'required',
            'atletico2' => 'required',
        ]);
        if ($validator->fails()) {
            alert()->error('Ups!','La operación no pudo ser completada')->autoClose(4000)->showCloseButton();
            return redirect('/juez/categorias/calificacion/kata/'.$request->id)
                ->withErrors($validator)
                ->withInput();
        }
        $calificacionkata = New Calificacioneskata();
        $calificacionkata->posicioneskata_id =$request->posicionkata_id;
        $calificacionkata->juez_id=Auth::user()->id;
        $calificacionkata->puntajeTecnico = $request->tecnico1 + $request->tecnico2;
        $calificacionkata->puntajeAtletico = $request->atletico1 + $request->atletico2;
        $calificacionkata->save();
        $posicionkata = Posicioneskata::find($request->posicionkata_id);
        alert()->success('¡Correcto!',' Calificacion exitosa')->autoClose(5000)->showCloseButton();


        $posicionkata = Posicioneskata::where('modalidad_id', $request->modalidad)->where('ronda',$request->ronda)->where('grupo',$request->grupo)->where('orden',$request->orden+1)->orderBy('id','asc')->with('inscripcion.competidor')->with('inscripcion.club')->first();
        if($posicionkata =="")
        {
            $request->grupo=$request->grupo+1;
            if($request->grupo>$request->ultGrupo)
            {
                $posicionkata = Posicioneskata::where('modalidad_id', $request->modalidad)->where('ronda',$request->ronda)->where('grupo',1)->where('orden',1)->orderBy('id','asc')->with('inscripcion.competidor')->with('inscripcion.club')->first();
            }
            else{
                $posicionkata = Posicioneskata::where('modalidad_id', $request->modalidad)->where('ronda',$request->ronda)->where('grupo',$request->grupo)->where('orden',1)->orderBy('id','asc')->with('inscripcion.competidor')->with('inscripcion.club')->first();
            }
        }

        return view('juez.combates.pantalla_calificacion_kata')
           ->with('posicionkata',$posicionkata)
           ->with('ultGrupo',$request->ultGrupo);
        //return redirect('/juez/categorias/kata/'.$posicionkata->modalidad->id);
    }

    public function calificarKumite($id)
    {
        return view('juez.combates.kumite');
    }
}
