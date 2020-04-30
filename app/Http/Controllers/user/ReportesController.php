<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Sector;
use App\Models\Ficha;
use App\Models\Periodo;
use Auth;
use App\User;

class ReportesController extends Controller
{
    public function reporte()
    {
        return view('user.reportes.reporte');
    }
}
