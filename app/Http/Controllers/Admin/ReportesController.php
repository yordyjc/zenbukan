<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Collection;
use Illuminate\Support\Collectioncollectstrtoupper;
use Hash;
use Illuminate\Support\Facades\Validator;
use Response;
use Illuminate\Support\Facades\Input;
use File;
use Carbon\Carbon;
use Auth;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Models\Sector;
use App\Models\Ficha;
use App\Models\Periodo;

use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\BeforeExport;
use Maatwebsite\Excel\Events\AfterSheet;
use App\Models\Torneo;
use App\Models\Modalidad;
use App\Models\Inscripcion;
use App\Models\Posicion;

class ReportesController extends Controller
{
    public function ultima_ficha()
    {
        $ultimo=Ficha::orderBy('correlativo','desc')->first();
        if ($ultimo) {
            $numero=$ultimo->correlativo+1;
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

    /****************************************
    * REPORTE POR FECHAS
    ****************************************/

    public function fechasGet()
    {
        $desde = Carbon::now()->subMonth(1)->format('Y-m-d');
        $hasta = Carbon::now()->format('Y-m-d');

        $inscritos = User::where('tipo',2)->where('activo',1)->whereBetween('created_at', [$desde, $hasta])->orderBy('id','desc')->get();

        return view('admin.reportes.fechas')
            ->with('desde',$desde)
            ->with('hasta',$hasta)
            ->with('inscritos',$inscritos);
    }

    public function fechasPost(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'desde'     => 'required|date|before_or_equal:hasta',
            'hasta'     => 'required|date|after_or_equal:desde',
        ]);
        if ($validator->fails()) {
            alert()->error('Ups!','La operación no pudo ser completada')->autoClose(4000)->showCloseButton();
            return redirect('admin/reporte-fechas')
                ->withErrors($validator)
                ->withInput();
        }

        $desde = $request->desde;
        $hasta = $request->hasta;

        $inscritos = User::where('tipo',2)->where('activo',1)->whereBetween('created_at', [$desde, $hasta])->orderBy('id','desc')->get();

        return view('admin.reportes.fechas')
            ->with('desde',$desde)
            ->with('hasta',$hasta)
            ->with('inscritos',$inscritos);
    }

    public function fechasExcel(Request $request)
    {
        $desde=$request->desde;
        $desdeformat=Carbon::parse($desde)->format('d-m-Y');
        $hasta=$request->hasta;
        $hastaformat=Carbon::parse($hasta)->format('d-m-Y');

        $archivo = 'REPORTE_POR_FECHAS_PERIODO_'.$desdeformat.'_HASTA'.$hastaformat.'-FITNESS10_CREADO_'.date('d-m-Y').'-'.date('h_i_s_a').'.xlsx';

        return Excel::download(new fechasExcelExport($desde,$desdeformat,$hasta,$hastaformat), $archivo);
    }

    /****************************************
    * REPORTE POR SEXO
    ****************************************/

    public function sexoGet()
    {
        $desde = Carbon::now()->subMonth(1)->format('Y-m-d');
        $hasta = Carbon::now()->format('Y-m-d');
        $sexo = NULL;

        $inscritos = User::where('tipo',2)->where('activo',1)->whereBetween('created_at', [$desde, $hasta])->orderBy('id','desc')->get();

        return view('admin.reportes.sexo')
            ->with('desde',$desde)
            ->with('hasta',$hasta)
            ->with('sexo',$sexo)
            ->with('inscritos',$inscritos);
    }

    public function sexoPost(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'desde'     => 'required|date|before_or_equal:hasta',
            'hasta'     => 'required|date|after_or_equal:desde',
        ]);
        if ($validator->fails()) {
            alert()->error('Ups!','La operación no pudo ser completada')->autoClose(4000)->showCloseButton();
            return redirect('admin/reporte-sexo')
                ->withErrors($validator)
                ->withInput();
        }

        $desde = $request->desde;
        $hasta = $request->hasta;
        $sexo = $request->sexo;

        if ($sexo != NULL) {
            $inscritos = User::where('tipo',2)->where('activo',1)->where('sexo',$sexo)->whereBetween('created_at', [$desde, $hasta])->orderBy('id','desc')->get();
        } else {
            $inscritos = User::where('tipo',2)->where('activo',1)->whereBetween('created_at', [$desde, $hasta])->orderBy('id','desc')->get();
        }

        return view('admin.reportes.sexo')
            ->with('desde',$desde)
            ->with('hasta',$hasta)
            ->with('sexo',$sexo)
            ->with('inscritos',$inscritos);
    }

    public function sexoExcel(Request $request)
    {
        $desde=$request->desde;
        $desdeformat=Carbon::parse($desde)->format('d-m-Y');
        $hasta=$request->hasta;
        $hastaformat=Carbon::parse($hasta)->format('d-m-Y');
        $sexo = $request->sexo;
        if ($sexo == NULL) {
            $sexoformat = 'AMBOS';
        } else {
            if ($sexo == 1) {
                $sexoformat = 'HOMBRES';
            } else {
                $sexoformat = 'MUJERES';
            }
        }
        $archivo = 'REPORTE_POR_SEXO_'.$sexoformat.'_PERIODO_'.$desdeformat.'_HASTA'.$hastaformat.'-FITNESS10_CREADO_'.date('d-m-Y').'-'.date('h_i_s_a').'.xlsx';
        return Excel::download(new sexoExcelExport($desde,$desdeformat,$hasta,$hastaformat,$sexo,$sexoformat), $archivo);
    }

    /****************************************
    * REPORTE POR OBJETIVO
    ****************************************/

    public function objetivoGet()
    {
        $desde = Carbon::now()->subMonth(1)->format('Y-m-d');
        $hasta = Carbon::now()->format('Y-m-d');
        $objetivo = NULL;

        $inscritos = User::where('tipo',2)->where('activo',1)->whereBetween('created_at', [$desde, $hasta])->orderBy('id','desc')->get();

        return view('admin.reportes.objetivo')
            ->with('desde',$desde)
            ->with('hasta',$hasta)
            ->with('objetivo',$objetivo)
            ->with('inscritos',$inscritos);
    }

    public function objetivoPost(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'desde'     => 'required|date|before_or_equal:hasta',
            'hasta'     => 'required|date|after_or_equal:desde',
        ]);
        if ($validator->fails()) {
            alert()->error('Ups!','La operación no pudo ser completada')->autoClose(4000)->showCloseButton();
            return redirect('admin/reporte-objetivo')
                ->withErrors($validator)
                ->withInput();
        }

        $desde = $request->desde;
        $hasta = $request->hasta;
        $objetivo = $request->objetivo;

        if ($objetivo != NULL) {
            $inscritos = User::where('tipo',2)->where('activo',1)->where('interes',$objetivo)->whereBetween('created_at', [$desde, $hasta])->orderBy('id','desc')->get();
        } else {
            $inscritos = User::where('tipo',2)->where('activo',1)->whereBetween('created_at', [$desde, $hasta])->orderBy('id','desc')->get();
        }

        return view('admin.reportes.objetivo')
            ->with('desde',$desde)
            ->with('hasta',$hasta)
            ->with('objetivo',$objetivo)
            ->with('inscritos',$inscritos);
    }

    public function objetivoExcel(Request $request)
    {
        $desde=$request->desde;
        $desdeformat=Carbon::parse($desde)->format('d-m-Y');
        $hasta=$request->hasta;
        $hastaformat=Carbon::parse($hasta)->format('d-m-Y');
        $objetivo = $request->objetivo;

        if ($objetivo == NULL) {
            $objetivoformat = "TODOS";
        } else {
            switch ($objetivo) {
                case 1:
                    $objetivoformat = "Perder peso";
                    break;

                case 2:
                    $objetivoformat = "Tonificar";
                    break;

                case 3:
                    $objetivoformat = "Musculación";
                    break;

                case 4:
                    $objetivoformat = "Competencia";
                    break;

                default:
                    $objetivoformat = "Otro";
                    break;
            }
        }
        $archivo = 'REPORTE_POR_OBJETIVO_'.$objetivoformat.'_PERIODO_'.$desdeformat.'_HASTA'.$hastaformat.'-FITNESS10_CREADO_'.date('d-m-Y').'-'.date('h_i_s_a').'.xlsx';
        return Excel::download(new objetivoExcelExport($desde,$desdeformat,$hasta,$hastaformat,$objetivo,$objetivoformat), $archivo);
    }

    /****************************************
    * REPORTE POR CUMPLEAÑOS
    ****************************************/

    public function cumpleanosGet()
    {
        $mes = Carbon::now()->format('m');

        $inscritos = User::where('tipo',2)->where('activo',1)->whereMonth('nacimiento',$mes)->orderBy('nacimiento','asc')->get();

        return view('admin.reportes.cumpleanos')
            ->with('mes',$mes)
            ->with('inscritos',$inscritos);
    }

    public function cumpleanosPost(Request $request)
    {
        $mes = $request->mes;

        $inscritos = User::where('tipo',2)->where('activo',1)->whereMonth('nacimiento',$mes)->orderBy('nacimiento','asc')->get();

        return view('admin.reportes.cumpleanos')
            ->with('mes',$mes)
            ->with('inscritos',$inscritos);
    }

    public function cumpleanosExcel(Request $request)
    {
        $mes=$request->mes;

        switch ($mes) {
            case 1:
                $mesformat = 'Enero';
                break;

            case 2:
                $mesformat = 'Febrero';
                break;

            case 3:
                $mesformat = 'Marzo';
                break;

            case 4:
                $mesformat = 'Abril';
                break;

            case 5:
                $mesformat = 'Mayo';
                break;

            case 6:
                $mesformat = 'Junio';
                break;

            case 7:
                $mesformat = 'Julio';
                break;

            case 8:
                $mesformat = 'Agosto';
                break;

            case 9:
                $mesformat = 'Setiembre';
                break;

            case 10:
                $mesformat = 'Octubre';
                break;

            case 11:
                $mesformat = 'Noviembre';
                break;

            case 12:
                $mesformat = 'Diciembre';
                break;

            default:
                $mesformat = 'No definido';
                break;
        }

        $archivo = 'REPORTE_CUMPLEANOS_MES_'.$mesformat.'-FITNESS10_CREADO_'.date('d-m-Y').'-'.date('h_i_s_a').'.xlsx';
        return Excel::download(new cumpleanosExcelExport($mes,$mesformat), $archivo);
    }

    /*******************************
     * REPORTE SORTEO PRO CATEGORIA*
     *******************************/
    //zenbukan
    public function frmSorteo()
    {
        $torneos= Torneo::all()->pluck('nombre','id');
        $categorias = Modalidad::all()->pluck('kumite','id');
        return view('admin.reportes.sorteo')->with('torneos',$torneos)->with('categorias',$categorias);

    }

    public function getCategorias($id)
    {
        $modalidades = Modalidad::where('torneo_id', $id)->get();
        return $modalidades;
    }

    //Funcion para calcular la posicion del algoritomo de sorteo
    public function posicion($n,$i){
        $r1= $i%2;
        $r2= ($i+1) % 2;
        $p = pow(2,$n)/($r1+1) - $i+$r2+1;
        return $p;
    }
    public function generarSorteo(Request $request)
    {
        if($request->ajax())
        {
            $inscripciones = Inscripcion::where('modalidad_id', $request->categoria)->with('modalidad')->get();
            //agrupamos por club
            $agrupados= $inscripciones->groupBy('competidor.club_id');

            //contamos por agrupacion
            $conteo = $agrupados->map(function($item, $key){
                return collect($item)->count();
            });
            $ordenado=$conteo->sort();

            //retornamos las claves de los clubes
            $mynombre = Array();
            foreach($ordenado as $key =>$value){
                $mykey[] = $key;
                //$mynombre[] = $inscripciones->where('competidor.club_id',$key);
                $array = $inscripciones->where('competidor.club_id',$key)->toArray();
                $mynombre = array_merge($mynombre,$array);
            }
            $mycolect= $mynombre;

            /*************************************
             * ALGORITMO DE SORTEO DE COMPETIDORES
             *************************************/

            $c = $inscripciones->count(); // numero de inscripciones de la cateogria
            $n = 1;
            while($c >= pow(2,$n)){
                $n++;
            }
            $n_encuentros = pow(2,$n-1);
            $preliminares = $c - $n_encuentros;
            $pasan = pow(2,$n) - $c;

            //posicionamos los participantes que pasan directo
            $sorteados = array();
            for($i=1; $i<=$pasan;$i++){
                $posicion =$this->posicion($n,$i);
                if($i<=3){
                    $sorteados[$posicion] = $mynombre[0];//asignamos el primer elemento de $mynombre a $sorteados en la posicion correspondiente
                    unset($mynombre[0]); //eliminamos el elemento de $mynombre
                    $mynombre = array_values($mynombre); //reindexamos
                }
                else{
                    reset($mynombre);
                    end($sorteados);
                    prev($sorteados);
                    while($mynombre[key($mynombre)]["competidor"]["club_id"] == $sorteados[key($sorteados)]["competidor"]["club_id"]){
                        next($mynombre);

                    }
                    $sorteados[$posicion] = current($mynombre);
                    unset($mynombre[key($mynombre)]);
                    $mynombre = array_values($mynombre); //reindexamos
                }
            }

            //posicionamos el resto de participante en el mismo arreglo $sorteados
            $topeinicial_1 =1;
            $topeinicial_2 = pow(2,$n)/2 +1;
            $topeinicial_4=0;
            $topeinicial_3=0;
            if($posicion < $n/2){
                $topeinicial_3 = $posicion-1;
                $topeinicial_4= $this->posicion($n,$pasan-1)-2;
            }
            else{
                $topeinicial_4=$posicion-1;
                $topeinicial_3=$this->posicion($n,$pasan-1)-2;
            }
            $tope_1 =$topeinicial_1;
            $tope_2 =$topeinicial_2;
            $tope_3 =$topeinicial_3;
            $tope_4 =$topeinicial_4;
            $orden=1;
            // while(empty($mynombre)!=1){
            //     if($tope_1!=$topeinicial_1){
            //         $topeinicial_1++;
            //     }
            //     if($tope_2!=$topeinicial_2){
            //         $topeinicial_2++;
            //     }
            //     if($tope_3!=$topeinicial_3){
            //         $topeinicial_3++;
            //     }
            //     if($tope_4!=$topeinicial_4){
            //         $topeinicial_4++;
            //     }
            //     $tope_1 =$topeinicial_1;
            //     $tope_2 =$topeinicial_2;
            //     $tope_3 =$topeinicial_3;
            //     $tope_4 =$topeinicial_4;

            //     //ubicamos los competidores que son del mismo club
            //     end($mynombre);//ubicamos el puntero de array sorteados al ultimo elemento
            //     $club=$mynombre[key($mynombre)]["competidor"]["club_id"];
            //     while($mynombre[key($mynombre)]["competidor"]["club_id"]==$club){
            //         switch($orden){
            //             case 1:
            //                 $sorteados[$tope_1] = $mynombre[key($mynombre)];
            //                 unset($mynombre[key($mynombre)]);//eliminamos el elemento extraido del array $mynombre
            //                 $mynombre = array_values($mynombre); //reindexamos
            //                 end($mynombre);
            //                 $tope_1 = $tope_1 +2;
            //                 $orden++;
            //                 break;

            //         }
            //     }
            // }


            //algoritmo para ingresmos los participantes de las preliminares
            $i=2;
            $grupo=1; //cantidad de ciclos en los que vuelve a tomar el arreglo combates
            //ingresmos los valso de los extremos el array $combates
            $combates = array();
            $combates[1]=end($mynombre);
            unset($mynombre[key($mynombre)]);
            array_values($mynombre);
            // reset($mynombre);
            //$combates[2] = $mynombre[0];
            // unset($mynombre[0]);
            // array_values($mynombre);
            $total = pow(2, $n);
            $combates[$total]=end($mynombre);
            unset($mynombre[key($mynombre)]);
            array_values($mynombre);
            // reset($mynombre);
            // $combates[$total-1] = $mynombre[0];
            // unset($mynombre[0]);
            // array_values($mynombre);

            //iniciamos el while principal que recorre hasta la cantidad de encuentros
            while($i<$preliminares){

                unset($aux);
                foreach($combates as $key =>$value){
                    //$arrayaux = $inscripciones->where('competidor.club_id',$key)->toArray();
                    $aux[] = $key;
                }
                reset($combates);
                unset($aux[0]);


                unset($aux[1]);
                array_values($aux);
                asort($aux);
                reset($aux);
                $alternador=1;

                $n_elementos=count($combates);
                if($i==4) $nprimero=$n_elementos;
                for($j=1; $j<=$n_elementos; $j++){

                    if(key($combates)==1 && $i<=$preliminares){
                        $m=$n-$grupo;
                        $posicion = pow(2,$m);
                        end($mynombre);
                        $combates[$posicion] = $mynombre[key($mynombre)];
                        unset($mynombre[key($mynombre)]);
                        array_values($mynombre);
                        // reset($mynombre);
                        // $combates[$posicion-1] = $mynombre[key($mynombre)];
                        // unset($mynombre[key($mynombre)]);
                        // array_values($mynombre);
                        next($combates);
                        $i++;
                    }
                    else{
                        if(key($combates)==pow(2,$n) && $i<=$preliminares){
                            $m=$n-$grupo;
                            $posicion = pow(2,$n) - pow(2,$m) + 1;
                            end($mynombre);
                            $combates[$posicion] = $mynombre[key($mynombre)];
                            unset($mynombre[key($mynombre)]);
                            array_values($mynombre);
                            // reset($mynombre);
                            // $combates[$posicion+1] = $mynombre[key($mynombre)];
                            // unset($mynombre[key($mynombre)]);
                            // array_values($mynombre);
                            next($combates);
                            $i++;
                        }
                        else{
                            if($i<$preliminares){
                                $alternador=$alternador*(-1);
                                $m=$n-$grupo;
                                $auxi= $aux[key($aux)];
                                $posicion=$auxi + $alternador*pow(2,$m) + (-1)*$alternador;
                                end($mynombre);
                                $combates[$posicion] = $mynombre[key($mynombre)];
                                unset($mynombre[key($mynombre)]);
                                array_values($mynombre);
                                // reset($mynombre);
                                // $combates[$posicion+(-1)*$alternador] = $mynombre[key($mynombre)];
                                // unset($mynombre[key($mynombre)]);
                                // array_values($mynombre);
                                next($combates);
                                next($aux);
                                $i++;
                            }


                        }
                    }

                }
                $grupo++;
            }
            //posicionamos los ultimos elementos
            end($mynombre);
            $i=key($mynombre);
            foreach($combates as $key=>$value){
                if($key%2 == 0){
                    $combates[$key-1] = $mynombre[$i];
                    $i--;
                }
                else{
                    $combates[$key+1] = $mynombre[$i];
                    $i--;
                }
            }
            reset($sorteados);
            for($i=1; $i<=pow(2,$n); $i++){
                if(isset($combates[$i])){

                }
                else{
                    $combates[$i] = $sorteados[key($sorteados)];
                    $combates[$i+1]['competidor']['apellidos']="robot";
                    $combates[$i+1]['id']="0";
                    next($sorteados);
                }
            }
            //$this->saveSorteo($combates);
            $posicionesdestroy = Posicion::where('modalidad_id',$request->categoria)->delete();
            //$posicionesdestroy->truncate();
            //$posicionesdestroy->destroy();
            foreach($combates as $key=>$value)
            {
                $posicion = new Posicion();
                if($combates[$key]['id']==0){
                    $posicion->inscripcion_id = 0;
                }
                else{
                    $posicion->inscripcion_id = $combates[$key]['id'];
                }
                $posicion->posicion = $key;
                $posicion->ronda = 1;
                $posicion->modalidad_id = $request->categoria;
                $posicion->save();
            }

            return $combates;


        }
    }

    public function saveSorteo($sorteados)
    {
        //$posicion = new Posicion();
        foreach ($sorteados as $sorteado)
        {
            $posicion = new Posicion();
            $posicion->id_inscripcion = $sorteado['id'];
            $posicion->posicion = key($sorteado);
            $posicion->ronda = 1;
        }
    }
}



class fechasExcelExport implements FromView, ShouldAutoSize, WithEvents
{
    public function  __construct($desde,$desdeformat,$hasta,$hastaformat) {
        $this->desde =$desde;
        $this->desdeformat =$desdeformat;
        $this->hasta =$hasta;
        $this->hastaformat =$hastaformat;
    }

    public function view(): View
    {
        return view('admin.reportes.excel.fechas', [
            'inscritos' => User::where('tipo',2)
                            ->where('activo',1)
                            ->whereBetween('created_at', [$this->desde, $this->hasta])
                            ->orderBy('id','desc')
                            ->get(),
            'desde' => $this->desdeformat,
            'hasta' => $this->hastaformat,
        ]);
    }

    public function registerEvents(): array
    {
        return [
            BeforeExport::class => function(BeforeExport $event) {
                $event->writer->getProperties()->setCreator('FITNESS10');
            },

            AfterSheet::class    => function(AfterSheet $event) {
                $cellRange = 'A1:H1';
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(16)->setBold(true);
                 $cellRange = 'A2:H2';
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setBold(true);
                $event->sheet->setTitle("REP. POR FECHAS");
            },
        ];
    }
}

class sexoExcelExport implements FromView, ShouldAutoSize, WithEvents
{
    public function  __construct($desde,$desdeformat,$hasta,$hastaformat,$sexo,$sexoformat) {
        $this->desde =$desde;
        $this->desdeformat =$desdeformat;
        $this->hasta =$hasta;
        $this->hastaformat =$hastaformat;
        $this->sexo =$sexo;
        $this->sexoformat =$sexoformat;
    }

    public function view(): View
    {
        if ($this->sexo != NULL) {
            return view('admin.reportes.excel.sexo', [
                'inscritos' => User::where('tipo',2)
                                ->where('activo',1)
                                ->where('sexo',$this->sexo)
                                ->whereBetween('created_at', [$this->desde, $this->hasta])
                                ->orderBy('id','desc')
                                ->get(),
                'desde' => $this->desdeformat,
                'hasta' => $this->hastaformat,
                'sexo' => $this->sexoformat,
            ]);
        } else {
            return view('admin.reportes.excel.sexo', [
                'inscritos' => User::where('tipo',2)
                                ->where('activo',1)
                                ->whereBetween('created_at', [$this->desde, $this->hasta])
                                ->orderBy('id','desc')
                                ->get(),
                'desde' => $this->desdeformat,
                'hasta' => $this->hastaformat,
                'sexo' => $this->sexoformat,
            ]);
        }

    }

    public function registerEvents(): array
    {
        return [
            BeforeExport::class => function(BeforeExport $event) {
                $event->writer->getProperties()->setCreator('FITNESS10');
            },

            AfterSheet::class    => function(AfterSheet $event) {
                $cellRange = 'A1:H1';
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(16)->setBold(true);
                 $cellRange = 'A2:H2';
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setBold(true);
                $event->sheet->setTitle("REP. POR SEXO");
            },
        ];
    }
}

class objetivoExcelExport implements FromView, ShouldAutoSize, WithEvents
{
    public function  __construct($desde,$desdeformat,$hasta,$hastaformat,$objetivo,$objetivoformat) {
        $this->desde =$desde;
        $this->desdeformat =$desdeformat;
        $this->hasta =$hasta;
        $this->hastaformat =$hastaformat;
        $this->objetivo =$objetivo;
        $this->objetivoformat =$objetivoformat;
    }

    public function view(): View
    {
        if ($this->objetivo != NULL) {
            return view('admin.reportes.excel.objetivo', [
                'inscritos' => User::where('tipo',2)
                                ->where('activo',1)
                                ->where('interes',$this->objetivo)
                                ->whereBetween('created_at', [$this->desde, $this->hasta])
                                ->orderBy('id','desc')
                                ->get(),
                'desde' => $this->desdeformat,
                'hasta' => $this->hastaformat,
                'objetivo' => $this->objetivoformat,
            ]);
        } else {
            return view('admin.reportes.excel.objetivo', [
                'inscritos' => User::where('tipo',2)
                                ->where('activo',1)
                                ->whereBetween('created_at', [$this->desde, $this->hasta])
                                ->orderBy('id','desc')
                                ->get(),
                'desde' => $this->desdeformat,
                'hasta' => $this->hastaformat,
                'objetivo' => $this->objetivoformat,
            ]);
        }

    }

    public function registerEvents(): array
    {
        return [
            BeforeExport::class => function(BeforeExport $event) {
                $event->writer->getProperties()->setCreator('FITNESS10');
            },

            AfterSheet::class    => function(AfterSheet $event) {
                $cellRange = 'A1:H1';
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(16)->setBold(true);
                 $cellRange = 'A2:H2';
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setBold(true);
                $event->sheet->setTitle("REP. POR OBJETIVO");
            },
        ];
    }
}

class cumpleanosExcelExport implements FromView, ShouldAutoSize, WithEvents
{
    public function  __construct($mes,$mesformat) {
        $this->mes =$mes;
        $this->mesformat =$mesformat;
    }

    public function view(): View
    {
        return view('admin.reportes.excel.cumpleanos', [
            'inscritos' => User::where('tipo',2)
                            ->where('activo',1)
                            ->whereMonth('nacimiento',$this->mes)
                            ->orderBy('nacimiento','asc')
                            ->get(),
            'mes' => $this->mesformat,
        ]);
    }

    public function registerEvents(): array
    {
        return [
            BeforeExport::class => function(BeforeExport $event) {
                $event->writer->getProperties()->setCreator('FITNESS10');
            },

            AfterSheet::class    => function(AfterSheet $event) {
                $cellRange = 'A1:H1';
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(16)->setBold(true);
                 $cellRange = 'A2:H2';
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setBold(true);
                $event->sheet->setTitle("REP. CUMPLEANOS");
            },
        ];
    }
}


