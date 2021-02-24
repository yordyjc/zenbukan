<?php

namespace App\Http\Controllers\Juez;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\User;
use App\Models\Modalidad;

class JuecesController extends Controller
{
    public function index()
    {
        $juez = User::find(Auth::user()->id);
        $modalidades = $juez->modalidades;
        return view('juez.torneos.index')
            ->with('modalidades',$modalidades);
    }

    public function frmCombates($id) //devuelve la vista que contiene todos los combates de la categoria seleccionada
    {

    }
}
