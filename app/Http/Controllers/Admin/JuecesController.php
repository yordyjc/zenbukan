<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Response;
use App\User;
use App\Models\Modalidad;
use Illuminate\Support\Facades\DB;

class JuecesController extends Controller
{
    public function agregarJueces($id)
    {
        $modalidad = Modalidad::find($id);

        $mod = DB::table('modalidad_user')
                    ->where('modalidad_id',$id);

        // $jueces = User::where('tipo',3)
        //     ->pluck('nombres','id');

        $jueces = DB::table('users')
                        ->leftJoinSub($mod,'modalidades',function($join){
                            $join->on('users.id','=','modalidades.user_id');
                        })
                        ->where('users.tipo',3)
                        ->where('modalidad_id','=',NULL)
                        ->pluck('users.nombres','users.id');
        //dd($juecesleft);

        return view('admin.torneos.agregar-jueces')
            ->with('jueces',$jueces)
            ->with('modalidad', $modalidad);

    }

    public function storeJueces(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'jueces' => 'required'
        ]);

        if ($validator->fails()) {
            alert()->error('Ups!','La operación no pudo ser completada')->autoClose(4000)->showCloseButton();
            return redirect('/admin/agregar-jueces/'.$request->modalidad)
                ->withErrors($validator)
                ->withInput();
        }

        $modalidad = Modalidad::find($request->modalidad);
        $juez = User::find($request->jueces);
        $modalidad->jueces()->attach($juez->id);

        alert()->success('¡Yeah!',$juez->nombres.' '.$juez->apellidos.' fue asignado a la categoria con exito')->autoClose(5000)->showCloseButton();
        return redirect('/admin/agregar-jueces/'.$request->modalidad);

    }
    public function deleteJueces($im,$id)
    {
        // $juez= User::find($id);
        // $modalidad = Modalidad::find($im);
        // $modalidad->jueces()->detach($juez->id);
        DB::table('modalidad_user')->where('user_id', $id)->delete();

        alert()->success('¡Yeah!','Juez fue eliminado con exito')->autoClose(5000)->showCloseButton();
        return redirect('/admin/agregar-jueces/'.$im);

    }

}
