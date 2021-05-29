<?php

namespace App\Http\Controllers\Juez;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\User;
use App\Models\Modalidad;
use App\Models\Posicion;

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

    /*************************************
                CALIFICACIONES
     *************************************/

    public function calificarKata($id)
    {
        $kata = $id;
        return view('juez.combates.kata')
            ->with('kata',$kata);
    }

    public function calificarKumite($id)
    {
        return view('juez.combates.kumite');
    }
}
