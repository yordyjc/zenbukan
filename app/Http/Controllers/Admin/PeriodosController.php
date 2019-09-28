<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Hash;
use Illuminate\Support\Facades\Validator;
use Response;
use Illuminate\Support\Facades\Input;
use File;
use Carbon\Carbon;
use Auth;

use App\User;
use App\Models\Sector;
use App\Models\Ficha;
use App\Models\Periodo;

class PeriodosController extends Controller
{
    public function ultimo_periodo($correlativo)
    {
        $ultimo=Periodo::where('ficha_id',$correlativo)->orderBy('numero','desc')->first();
        if ($ultimo) {
            $numero=$ultimo->numero+1;
        }
        else{
            $numero=1;
        }
        return $numero;
    }

    public function concatenar($numero)
    {
        $n=strlen($numero);
        if ($n==1) {
            $a='0000'.$numero;
        }
        else if ($n==2) {
            $a='000'.$numero;
        }
        else if ($n==3) {
            $a='00'.$numero;
        }
        else if ($n==4) {
            $a='0'.$numero;
        }
        else{
            $a=$numero;
        }
        return $a;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return redirect('/admin/fichas');
    }

    public function formCrear($correlativo)
    {
        $ficha = Ficha::where('correlativo',$correlativo)->with('usuario')->first();
        return view('admin.periodos.crear')
            ->with('ficha',$ficha);
    }
    public function create()
    {
        return redirect('/admin/fichas');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'planchas' => 'numeric|integer|min:0',
            'sentadillas' => 'numeric|integer|min:0',
            'abdominales' => 'numeric|integer|min:0',
        ]);
        if ($validator->fails()) {
            alert()->error('Ups!','La operación no pudo ser completada')->autoClose(4000)->showCloseButton();
            return redirect('/admin/crear-periodo/'.$request->ficha)
                ->withErrors($validator)
                ->withInput();
        }

        $ultimo_periodo = $this->ultimo_periodo($request->ficha);
        $ficha = Ficha::where('correlativo',$request->ficha)->first();

        if ($periodo->planchas != 0 && $periodo->sentadillas != 0 && $periodo->abdominales != 0 ) {
            $check_fisico = 1;
        } else {
            $check_fisico = 2;
        }

        $periodo = New Periodo();
        $periodo->numero = $ultimo_periodo;
        $periodo->ficha_id = $request->ficha;
        $periodo->fecha= Carbon::now();
        $periodo->check_fisico = $check_fisico;
        $periodo->planchas = $request->planchas;
        $periodo->sentadillas = $request->sentadillas;
        $periodo->abdominales = $request->abdominales;
        $periodo->save();

        alert()->success('¡Yeah!','El periodo de evaluación se agregó con éxito')->autoClose(5000)->showCloseButton();
        return redirect('/admin/ver-ficha/'.$ficha->correlativo);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $periodo=Periodo::find($id);

        $baneado = $periodo->ficha->usuario->activo;

        if ($baneado!=0) {
            return view('admin.periodos.editar')
                ->with('periodo',$periodo);
        }
        else{
            return redirect('/admin/sin-permiso');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'planchas' => 'numeric|integer|min:0',
            'sentadillas' => 'numeric|integer|min:0',
            'abdominales' => 'numeric|integer|min:0',
        ]);
        if ($validator->fails()) {
            alert()->error('Ups!','La operación no pudo ser completada')->autoClose(4000)->showCloseButton();
            return redirect('/admin/periodos/'.$id.'/edit')
                ->withErrors($validator)
                ->withInput();
        }

        $periodo=Periodo::find($id);
        $periodo->check_fisico = $check_fisico;
        $periodo->planchas = $request->planchas;
        $periodo->sentadillas = $request->sentadillas;
        $periodo->abdominales = $request->abdominales;
        $periodo->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return redirect('/admin/fichas');
    }
}
