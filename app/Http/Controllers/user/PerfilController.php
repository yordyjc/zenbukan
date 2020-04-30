<?php

namespace App\Http\Controllers\user;

use Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Response;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use App\Models\Sector;
use App\Models\Ficha;
use App\Models\Periodo;
use Auth;
use App\User;
use Carbon\Carbon;

class PerfilController extends Controller
{
    public function confirmpass(Request $request)
    {
        if ($request->ajax()) {
            if(Hash::check($request->password, Auth::user()->password)){
                return 200;
            }
            else{
                return 503;
            }
        }
    }

    public function changepass(Request $request)
    {
        if ($request->ajax()) {
            //Validación del server
            $error = array();
            if(!empty($request->password)){
                if (!Hash::check($request->password, Auth::user()->password)) {
                    $error["password"]="Contraseña actual incorrecta";
                }
            }
            else{
                $error["password"]="Ingrese su contraseña actual";
            }

            if (!empty($request->password_new)) {
                if (!empty($request->password_confirm)) {
                    if (!$request->password_new==$request->password_confirm) {
                        $error["password_confirm"]="Contraseña de confirmación incorrecta";
                    }
                }
                else{
                    $error["password_confirm"]="Ingrese contraseña de confirmación";
                }
            }
            else{
                $error["password_new"]="Ingrese contraseña nueva";
            }
            //retorna error
            if (count($error)>0) {
                return response($error, 422)
              ->header('Content-Type', 'application/json');
            }

            $user=User::find(Auth::user()->id);
            $user->password=bcrypt($request->password_new);
            $user->save();
            return $user;
        }
    }

    public function perfil()
    {
        return view('user.perfil.perfil');
    }

    public function modificarfoto(Request $request)
    {
        $user=User::find(Auth::user()->id);
        $foto  = Input::file('foto');
        if (!is_null($foto)) {
            File::delete(public_path().$user->foto);
            //$name2=str_replace(' ', '-', $foto->getClientOriginalName());
            $name2=str_replace(' ', '-', $user->nombres.'-'.$user->apellidos);
            $largo=strlen($name2);
            $extension=$foto->getClientOriginalExtension();
            $fin=$largo - strlen($extension);
            $name=substr($name2,0,$fin-1).'.'.$extension;
            $path=public_path().'/resources/img/user/';
            $foto->move($path,$name);
            $user->foto='/resources/img/user/'.$name;
            $user->save();

            alert()->success('¡Yeah!','Ahora tienes una nueva foto de perfil')->autoClose(3000)->showCloseButton();
            return redirect('/user/perfil-user');
        }
        alert()->error('Ups!','Debe seleccionar una imagen')->autoClose(4000)->showCloseButton();
        return redirect('/user/perfil-user');
    }

    public function obtenerperfil()
    {
        $sectores=Sector::pluck('sector','id');
        return view('user.perfil.editar')
                ->with('sectores',$sectores);
    }

    public function modificarperfil(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombres' => 'required|string',
            'apellidos' => 'required|string',
            //'email' => 'required|string|email|max:255|unique:users,email,'.Auth::user()->id,
        ]);
        if ($validator->fails()) {
            alert()->error('Ups!','La operación no pudo ser completada')->autoClose(4000)->showCloseButton();
            return redirect('/user/perfil-user/modificar')
                ->withErrors($validator)
                ->withInput();
        }
        $user=User::find(Auth::user()->id);
        $user->nombres=$request->nombres;
        $user->apellidos=$request->apellidos;
        $user->telefono=$request->telefono;
        if ($request->distrito != 0) {
            $user->distrito_id=$request->distrito;
        }

        $user->save();
        alert()->success('¡Yeah!','Tu perfil se actualizó con éxito')->autoClose(3000)->showCloseButton();
        return redirect('/user/perfil-user/');
    }
}
