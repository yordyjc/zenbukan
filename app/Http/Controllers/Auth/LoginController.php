<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
// use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Auth;
use App\User;

class LoginController extends Controller
{
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
        return view('auth.login');
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
