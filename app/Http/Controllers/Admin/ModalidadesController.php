<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Torneo;
use App\Models\Modalidad;
use Illuminate\Support\Facades\Input;
use File;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Response;
use App\Imports\ModalidadesImport;
use Maatwebsite\Excel\Facades\Excel;

class ModalidadesController extends Controller
{
    public function agregarModalidades($id)
    {
        $torneo = Torneo::find($id);
        $modalidades = Modalidad::where('torneo_id',$id)->get();
        return view('admin.torneos.agregar-modalidades')
            ->with('torneo',$torneo)
            ->with('modalidades',$modalidades);
    }

    public function storeModalidades(Request $request)
    {
        $deletemod=Modalidad::where('torneo_id',$request->torneo)->delete();
        $file = $request->file;
        Excel::import(new ModalidadesImport, $file);
        alert()->success('Yeah!', 'Operación realizada con éxito');
        return redirect('/admin/agregar-modalidades/'.$request->torneo);
    }

    public function modalidades($id)
    {
        $modalidades = Modalidad::where('torneo_id',$id)->get();
        return view('admin.torneos.modalidades')
            ->with('modalidades',$modalidades);
    }
}
