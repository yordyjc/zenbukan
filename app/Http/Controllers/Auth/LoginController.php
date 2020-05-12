<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
// use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Auth;

use App\User;
use App\Models\Configuracion;
use App\Models\Fondo;
use App\Models\Servicio;

class LoginController extends Controller
{
    public function ultimo_fondo()
    {
        $ultimo=Fondo::orderBy('numero','desc')->first();
        if ($ultimo) {
            $numero=$ultimo->numero;
        }
        else{
            $numero=1;
        }
        return $numero;
    }

    public function fondo(){
        $elegido = rand(1,$this->ultimo_fondo());
        $fondo = Fondo::where('numero',$elegido)->first();
        return $fondo->foto;
    }

    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    // use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = '/home';
    protected $redirectLogout;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('guest')->except('logout');
    // }
    public function ShowLoginForm(){

        $configuracion=Configuracion::find(1);
        $servicios=Servicio::orderBy('id','asc')->get();
        return view('auth.login')
            ->with('fondo',$this->fondo())
            ->with('configuracion',$configuracion)
            ->with('servicios',$servicios);
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email'=>'required|email',
            'password'=>'required|string'
        ]);
        if ($validator->fails()) {
            return redirect('/login')
            ->withErrors($validator)
            ->withInput();
        }
        $credentials = $request->only('email', 'password');
        $credentials['activo']=1;
        if (Auth::attempt($credentials)) {
            if(Auth::user()->confirmado==1){
                if (Auth::user()->tipo==1  && Auth::user()->activo==1) {
                    return redirect('/admin/inscritos');
                }
                elseif (Auth::user()->tipo==2 && Auth::user()->activo==1) {

                    return redirect('/user/mificha');

                }
                else{
                    Auth::logout();
                    return redirect('/login');
                }
            }
            Auth::logout();
            return redirect('/login?q=sin-confirmar');
            // $this->redirectLogout='/login?q=sin-confirmar';
            // $this->logout();
        }
        return redirect('/login?q=incorrectos');
        // return back()
        //     ->withErrors(['username'=>trans('auth.failed')])
        //     ->withImput(request(['username']));
    }

    public function logout(){
        // $this->redirectLogout='/login';
        Auth::logout();
        return redirect('/login');
    }

}
