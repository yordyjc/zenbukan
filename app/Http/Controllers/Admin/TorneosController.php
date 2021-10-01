<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Torneo;
use Illuminate\Support\Facades\Input;
use File;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Response;
Use App\Models\Modalidad;
Use App\Models\Calificacioneskata;
Use App\Models\Posicioneskata;
use Illuminate\Support\Facades\DB;



class TorneosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $torneos= Torneo::all()
                ->where('estado',1);
        return view('admin.torneos.index')->with('torneos',$torneos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.torneos.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // if(is_null($request->kata)) $b='required';
        // else $b='';

        // if(is_null($request->kumite)) $a= 'required';
        // else $a= '';
        $a = '';
        if($request->precio)
        {
            $a = 'numeric';
        }
        $validator = Validator::make($request->all(),[
            'nombre' => 'required | string',
            'descripcion' => 'required | string',
            'foto' => 'file | max:5120',
            'portada' => 'file | max:5120',
            'bases' => 'file | max:5120',
            'fecha' => 'required | date',
            'hora' => 'required',
            'precio' => $a,
            'lugar' => 'required | string'
            // 'kata' => $a,
            // 'kumite' => $b
        ]);

        if($validator->fails())
        {
            alert()->error('Ups!', 'La operación no pude se completada')->autoClose(4000)->showCloseButton();
            return redirect('admin/torneos/create')
                ->withErrors($validator)
                ->withInput();
        }

        $torneo = new Torneo;
        $torneo->nombre = $request->nombre;
        $torneo->descripcion = $request->descripcion;
        $torneo->bases = $request->bases;
        $torneo->fecha = $request->fecha;
        $torneo->hora = $request->hora;
        $torneo->activo=1;
        if($request->precio)
        {
            $torneo->precio = $request->precio;
        }
        $torneo->lugar = $request->lugar;
        if(!is_null($request->kata)) $torneo->kata = $request->kata;
        if(!is_null($request->kumite)) $torneo->kumite = $request->kumite;
        $portada = Input::file('portada');
        $bases = Input::file('bases');

        if(!is_null($portada))
        {

            $name2=str_replace(' ', '-', strtolower($request->nombre));
            $largo=strlen($name2);
            $extension=$portada->getClientOriginalExtension();
            $fin=$largo - strlen($extension);
            $name=$name2.'.'.$extension;
            $path=public_path().'/resources/img/torneos/';
            $portada->move($path,$name);
            $torneo->portada='/resources/img/torneos/'.$name;

        }

        if(!is_null($bases))
        {
            $namebases = time().'.pdf';
            $pathbases=public_path().'/resources/bases/';
            $bases->move($pathbases,$namebases);
            $torneo->bases = '/resources/bases/'.$namebases;
        }

        $foto = Input::file('foto');
        if( !is_null($foto))
        {
            $extension = $foto->getClientOriginalExtension();
            $name = time().'.'.$extension;
            $path = public_path().'/resources/img/torneos/';
            $foto->move($path,$name);
            $torneo->foto = '/resources/img/torneos/'.$name;
        }


        $torneo->save();
        alert()->success('Yeah!', $torneo->nombre.' fue registrado con exito');
        return redirect('/admin/torneos');

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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $torneo = Torneo::find($id);
        $torneo->estado = 0;
        $torneo->save();
        return redirect('admin/torneos');
    }
    function listarCategoriasKata($id)
    {
        $modalidades = Modalidad::where('torneo_id',$id)->orderBy('id','desc')->get();
        return view('admin.torneos.listar_modalidades_kata')
            ->with('modalidades',$modalidades);
    }
    function verCalificacionesKata($id)
    {
        $posiciones=Posicioneskata::where('modalidad_id',$id)->orderBy('grupo','desc')->with('inscripcion.competidor')->with('inscripcion.club')->get();
        return view('admin.torneos.calificaciones_kata')
            ->with('posiciones',$posiciones);
        //return $posiciones;
    }
    function verPantCalKata($id)
    {
        $posicion=Posicioneskata::find($id);

        return view('admin.torneos.pantalla_calificacion_kata')
            ->with('posicionkata',$posicion);
    }
    function verRondasKata($id)
    {
        $modalidad=$id;
        $ultimaRonda=Posicioneskata::where('modalidad_id', $id)->orderBy('ronda','desc')->first();
        if($ultimaRonda==""){
            $ultimaRonda=0;
            $labelFinal="";
        }

        else{
            $labelFinal=$ultimaRonda->final;
            $ultimaRonda=$ultimaRonda->ronda;
        }
        return view('admin.torneos.rondas')
            ->with('ultimaRonda', $ultimaRonda)
            ->with('modalidad', $modalidad)
            ->with('labelFinal', $labelFinal);

    }
    function sigRondaKata($id, $ronda)
    {
        $posiciones=Posicioneskata::where('modalidad_id',$id)->where('ronda',$ronda)->get();

        foreach($posiciones as $posicion)
        {
            $savePosicion=Posicioneskata::find($posicion->id);
            $savePosicion->puntajeath = $this->promPar($this->ordenar($posicion->id,'puntajeAtletico'),'puntajeAtletico');
            $savePosicion->puntajetec = $this->promPar($this->ordenar($posicion->id,'puntajeTecnico'),'puntajeTecnico');
            $savePosicion->puntajefinal=$savePosicion->puntajeath + $savePosicion->puntajetec;
            $savePosicion->save();
        }

        //Obtener los 4 primeros de cada grupo
        $ultGrupo=Posicioneskata::where('modalidad_id', $id)->where('ronda',$ronda)->orderBy('grupo','desc')->first();
        $ultGrupo=$ultGrupo->grupo;
        switch($ultGrupo)
        {
            case  4:
                $topgrupo1=Posicioneskata::where('modalidad_id', $id)->where('ronda',$ronda)->where('grupo',1)->orderBy('puntajefinal','desc')->take(4)->get();
                $topgrupo2=Posicioneskata::where('modalidad_id', $id)->where('ronda',$ronda)->where('grupo',2)->orderBy('puntajefinal','desc')->take(4)->get();
                $topgrupo3=Posicioneskata::where('modalidad_id', $id)->where('ronda',$ronda)->where('grupo',3)->orderBy('puntajefinal','desc')->take(4)->get();
                $topgrupo4=Posicioneskata::where('modalidad_id', $id)->where('ronda',$ronda)->where('grupo',4)->orderBy('puntajefinal','desc')->take(4)->get();

                $topgrupos= $topgrupo1->merge($topgrupo2);
                $topgrupos=$topgrupos->merge($topgrupo3);
                $topgrupos=$topgrupos->merge($topgrupo4);
                //Registramos los competidores a la siguiete ronda
                $orden=1;
                foreach($topgrupos as $top)
                {
                    if($top->grupo<=2){
                        $grupo=1;
                    }
                    else{
                        $grupo=2;
                    }
                    $savePosicion = New Posicioneskata();
                    $savePosicion->inscripcion_id=$top->inscripcion_id;
                    $savePosicion->modalidad_id=$top->modalidad_id;
                    $savePosicion->grupo=$grupo;
                    $savePosicion->ronda=$ronda+1;
                    $savePosicion->orden=$orden++;
                    $savePosicion->save();
                    if($orden==9)
                        $orden=1;
                }
            case 2:
                $topgrupo1=Posicioneskata::where('modalidad_id', $id)->where('ronda',$ronda)->where('grupo',1)->orderBy('puntajefinal','desc')->take(3)->get();
                $topgrupo2=Posicioneskata::where('modalidad_id', $id)->where('ronda',$ronda)->where('grupo',2)->orderBy('puntajefinal','desc')->take(3)->get();

                //Los que pasan a la semifinal 1
                $primsemifinal1=New Posicioneskata();
                $primsemifinal1->inscripcion_id=$topgrupo1[1]->inscripcion_id;
                $primsemifinal1->modalidad_id=$topgrupo1[1]->modalidad_id;
                $primsemifinal1->grupo=1;
                $primsemifinal1->ronda=$ronda+1;
                $primsemifinal1->orden=1;
                $primsemifinal1->final=2;
                $primsemifinal1->save();

                $primsemifinal2=New Posicioneskata();
                $primsemifinal2->inscripcion_id=$topgrupo2[2]->inscripcion_id;
                $primsemifinal2->modalidad_id=$topgrupo2[2]->modalidad_id;
                $primsemifinal2->grupo=1;
                $primsemifinal2->ronda=$ronda+1;
                $primsemifinal2->orden=2;
                $primsemifinal2->final=2;
                $primsemifinal2->save();

                //Los que pasan a la semifinal2
                $primsemifinal1=New Posicioneskata();
                $primsemifinal1->inscripcion_id=$topgrupo2[1]->inscripcion_id;
                $primsemifinal1->modalidad_id=$topgrupo2[1]->modalidad_id;
                $primsemifinal1->grupo=1;
                $primsemifinal1->ronda=$ronda+1;
                $primsemifinal1->orden=3;
                $primsemifinal1->final=3;
                $primsemifinal1->save();

                $primsemifinal2=New Posicioneskata();
                $primsemifinal2->inscripcion_id=$topgrupo1[2]->inscripcion_id;
                $primsemifinal2->modalidad_id=$topgrupo1[2]->modalidad_id;
                $primsemifinal2->grupo=1;
                $primsemifinal2->ronda=$ronda+1;
                $primsemifinal2->orden=4;
                $primsemifinal2->final=3;
                $primsemifinal2->save();

                //pasamos a la final
                $final1=New Posicioneskata();
                $final1->inscripcion_id=$topgrupo1[0]->inscripcion_id;
                $final1->modalidad_id=$topgrupo1[0]->modalidad_id;
                $final1->grupo=1;
                $final1->ronda=$ronda+1;
                $final1->orden=5;
                $final1->final=1;
                $final1->save();

                $final2=New Posicioneskata();
                $final2->inscripcion_id=$topgrupo2[0]->inscripcion_id;
                $final2->modalidad_id=$topgrupo2[0]->modalidad_id;
                $final2->grupo=1;
                $final2->ronda=$ronda+1;
                $final2->orden=6;
                $final2->final=1;
                $final2->save();
            case 1:
                return "Saludos";
        }

        return redirect('/admin/torneos/kata/rondas/'.$id);
        //return $ult;

    }
    function ordenar($id, $tipo)
    {
        $ordenado=Calificacioneskata::where('posicioneskata_id',$id)->orderBy($tipo,'asc')->get();
        return $ordenado;
    }
    function promPar($puntajes, $nivel)
    {
        $sum=0;
        $nPuntajes=count($puntajes);
        for($i=2; $i < $nPuntajes-2; $i++)
        {
                $sum=$sum+$puntajes[$i]->$nivel;
        }
        if($nivel =='puntajeTecnico')
        {
            $factor=0.7;
        }
        else{
            $factor=0.3;
        }
        return $res=$sum*$factor;
    }
    function finalKata($id)
    {
        $ultimaRonda=Posicioneskata::where('modalidad_id', $id)->orderBy('ronda','desc')->first();
        if($ultimaRonda->final==NULL)
        {
            $posiciones=Posicioneskata::where('modalidad_id',$id)->where('ronda',$ultimaRonda->ronda)->get();
            foreach($posiciones as $posicion)
            {
                $savePosicion=Posicioneskata::find($posicion->id);
                $savePosicion->puntajeath = $this->promPar($this->ordenar($posicion->id,'puntajeAtletico'),'puntajeAtletico');
                $savePosicion->puntajetec = $this->promPar($this->ordenar($posicion->id,'puntajeTecnico'),'puntajeTecnico');
                $savePosicion->puntajefinal=$savePosicion->puntajeath + $savePosicion->puntajetec;
                $savePosicion->save();
            }
        }

        $posiciones=Posicioneskata::where('modalidad_id',$id)->where('ronda', $ultimaRonda->ronda)->with('inscripcion.competidor')->with('inscripcion.club')->get();
        $posiciones = $posiciones->groupBy('final');
        //return view('admin.torneos.resultados_finales')->with('posiciones',$posiciones);
        //$posi = DB::table('posicioneskata')->where('modalidad_id', $id)->where('ronda', $ultimaRonda->ronda)->where('final',1)->with('inscripcion')->get();
        $campeones = collect([]);
        foreach($posiciones as $posicion=>$key)
        {
                $res=$key->max('puntajefinal');
                $final1=$key->where('puntajefinal', $res);
                $campeones = $campeones->merge($final1);

        }

        return view('admin.torneos.resultados_finales')->with('campeones',$campeones);
    }

    function pruebas()
    {
        for($i=1;$i<=8;$i++){ $cal = New Calificacioneskata(); $cal->posicioneskata_id=41; $cal->juez_id=13; $cal->puntajeTecnico=rand(5,10); $cal->puntajeAtletico=rand(5,10); $cal->save();}
        return 'holi';
    }
}

