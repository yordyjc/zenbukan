<?php

namespace App\Http\Controllers\Juez;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class JuecesController extends Controller
{
    public function index()
    {
        return view('juez.torneos.index');
    }
}
