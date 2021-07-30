<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Collection;
use Illuminate\Support\Collectioncollectstrtoupper;
use Hash;
use Illuminate\Support\Facades\Validator;
use Response;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Models\Sector;
use App\Models\Ficha;
use App\Models\Periodo;
use App\Models\Modalidad;
use App\Models\Torneo;
use App\Models\Inscripcion;
use App\Models\Posicioneskata;

class SorteosController extends Controller
{
    public function frmSorteoKata(){
        $torneos= Torneo::all()->pluck('nombre','id');
        $categorias = Modalidad::all()->pluck('kata','id');
        return view('admin.sorteos.sorteo-kata')
            ->with('torneos',$torneos)
            ->with('categorias',$categorias);
    }

    //FUNCION PARA OBETENER LOS KATAS DE LAS CATEGORIAS POR TORNEO
    public function getCategoriasKata($id){
        $modalidades = Modalidad::where('torneo_id', $id)->get();
        return $modalidades;
    }

    public function generarSorteokata(Request $request){
        if($request->ajax()){
            //primero eliminamos los sorteos anteriores de la primera ronda de esta categoria
            Posicioneskata::where('modalidad_id', $request->categoria)->where('ronda',1)->delete();
            $inscritos = Inscripcion::orderBy('club_id', 'desc')->where('modalidad_id',$request->categoria)->where('cabeza_serie',0)->get();
            $cabezaSerie = Inscripcion::orderBy('club_id', 'desc')->where('modalidad_id',$request->categoria)->where('cabeza_serie',1)->get();
            $total_inscritos = $inscritos->count() + $cabezaSerie->count();

            $grupos=$this->numeroGrupos($total_inscritos);
            /*
            $agrupados= $inscritos->groupBy('competidor.club_id');
            $conteo = $agrupados->map(function($item, $key){
                return collect($item);
            });
            $ordenado=$conteo->sort();
            //dd($agrupados);
            */
            /***********************************
             * ALGORITMO PARA EL SORTEO DE KATA*
             * *********************************/

             //Dependiendo del numero de grupos se escoje el patron de orden que tendra
            $orden= Array();
            //Creamos el modelo para guargar el sorteo de kata

            switch($grupos)
            {
                case 1:
                    //Insertamos el listado de competidores en la tabla posicioneskata
                    $ultOrden=0;
                    foreach($inscritos as $inscrito)
                    {
                        $posicionkata= New Posicioneskata();
                        $posicionkata->inscripcion_id = $inscrito->id;
                        $posicionkata->modalidad_id = $inscrito->modalidad_id;
                        $posicionkata->grupo=1;
                        $posicionkata->ronda =1; //aqui solo inserta el 1 porque el sorteo se genera una ves para la primera ronda
                        $posicionkata->orden=$ultOrden+1;
                        $posicionkata->save();
                        $ultOrden++;
                    }
                    //si HAY CABEZAS DE SERIE SE INSERTAN AL ULTIMO
                    if($cabezaSerie->count()>0){
                        foreach($cabezaSerie as $inscrito)
                        {
                            $ultOrden=Posicioneskata::where('modalidad_id',$inscrito->modalidad_id)->where('ronda',1)->select('orden')->get();
                            $posicionkata= New Posicioneskata();
                            $posicionkata->inscripcion_id = $inscrito->id;
                            $posicionkata->modalidad_id = $inscrito->modalidad_id;
                            $posicionkata->grupo=1;
                            $posicionkata->ronda =1; //aqui solo inserta el 1 porque el sorteo se genera una ves para la primera ronda
                            $posicionkata->orden=$ultOrden+1;
                            $posicionkata->save();
                            $ultOrden++;
                        }
                    }

                    break;
                case 2:
                    //$orden almacenara el orden en el cual se insertara en cada grupo
                    //$orden=['1'=>1, '2'=>2];


                    $orden=array(1,2);
                    //Insertamos el listado de competidores en la tabla posicioneskata
                    $i=0;//usado para el indeice del array $orden
                    foreach($inscritos as $inscrito)
                    {
                        $LultOrden=Posicioneskata::where('modalidad_id',$inscrito->modalidad_id)->where('ronda',1)->where('grupo',$orden[$i])->orderBy('orden','desc')->first();

                        if($LultOrden==NULL){
                            $ultOrden=0;
                        }
                        else{
                            $ultOrden=$LultOrden->orden;
                        }
                        $posicionkata= New Posicioneskata();
                        $posicionkata->inscripcion_id = $inscrito->id;
                        $posicionkata->modalidad_id = $inscrito->modalidad_id;
                        $posicionkata->grupo=$orden[$i];
                        $posicionkata->ronda =1; //aqui solo inserta el 1 porque el sorteo se genera una ves para la primera ronda
                        $posicionkata->orden=$ultOrden+1;
                        $posicionkata->save();
                        if($i<count($orden)-1){
                            $i++;
                        }
                        else{
                            $i=0;
                        }
                    }
                    //si HAY CABEZAS DE SERIE SE INSERTAN AL ULTIMO
                    if($cabezaSerie->count()>0){
                        $i=0;//usado para el indeice del array $orden
                        foreach($cabezaSerie as $inscrito)
                        {
                            $LultOrden=Posicioneskata::where('modalidad_id',$inscrito->modalidad_id)->where('ronda',1)->where('grupo',$orden[$i])->orderBy('ronda','desc')->first();
                            if($LultOrden==NULL){
                                $ultOrden=0;
                            }
                            else{
                                $ultOrden=$LultOrden->orden;
                            }
                            $posicionkata= New Posicioneskata();
                            $posicionkata->inscripcion_id = $inscrito->id;
                            $posicionkata->modalidad_id = $inscrito->modalidad_id;
                            $posicionkata->grupo=$orden[$i];
                            $posicionkata->ronda =1; //aqui solo inserta el 1 porque el sorteo se genera una ves para la primera ronda
                            $posicionkata->orden=$ultOrden+1;
                            $posicionkata->save();
                            if($i<count($orden)-1){
                                $i++;
                            }
                            else{
                                $i=0;
                            }
                        }
                    }
                    break;
                case 4:
                    //$orden almacenara el orden en el cual se insertara en cada grupo
                    $orden=array(1,3,2,4);
                    //Insertamos el listado de competidores en la tabla posicioneskata
                    $i=0;//usado para el indeice del array $orden
                    foreach($inscritos as $inscrito)
                    {
                        $LultOrden=Posicioneskata::where('modalidad_id',$inscrito->modalidad_id)->where('ronda',1)->where('grupo',$orden[$i])->orderBy('orden','desc')->first();

                        if($LultOrden==NULL){
                            $ultOrden=0;
                        }
                        else{
                            $ultOrden=$LultOrden->orden;
                        }
                        $posicionkata= New Posicioneskata();
                        $posicionkata->inscripcion_id = $inscrito->id;
                        $posicionkata->modalidad_id = $inscrito->modalidad_id;
                        $posicionkata->grupo=$orden[$i];
                        $posicionkata->ronda =1; //aqui solo inserta el 1 porque el sorteo se genera una ves para la primera ronda
                        $posicionkata->orden=$ultOrden+1;
                        $posicionkata->save();
                        if($i<count($orden)-1){
                            $i++;
                        }
                        else{
                            $i=0;
                        }
                    }
                    //si HAY CABEZAS DE SERIE SE INSERTAN AL ULTIMO
                    if($cabezaSerie->count()>0){
                        $i=0;//usado para el indeice del array $orden
                        foreach($cabezaSerie as $inscrito)
                        {
                            $LultOrden=Posicioneskata::where('modalidad_id',$inscrito->modalidad_id)->where('ronda',1)->where('grupo',$orden[$i])->orderBy('orden','desc')->first();
                            if($LultOrden==NULL){
                                $ultOrden=0;
                            }
                            else{
                                $ultOrden=$LultOrden->orden;
                            }
                            $posicionkata= New Posicioneskata();
                            $posicionkata->inscripcion_id = $inscrito->id;
                            $posicionkata->modalidad_id = $inscrito->modalidad_id;
                            $posicionkata->grupo=$orden[$i];
                            $posicionkata->ronda =1; //aqui solo inserta el 1 porque el sorteo se genera una ves para la primera ronda
                            $posicionkata->orden=$ultOrden+1;
                            $posicionkata->save();
                            if($i<count($orden)-1){
                                $i++;
                            }
                            else{
                                $i=0;
                            }
                        }
                    }
                    break;
                case 8:
                    //$orden almacenara el orden en el cual se insertara en cada grupo
                    $orden=array(1,7,3,5, 2, 8, 4, 6);
                    //Insertamos el listado de competidores en la tabla posicioneskata
                    $i=0;//usado para el indeice del array $orden
                    foreach($inscritos as $inscrito)
                    {
                        $LultOrden=Posicioneskata::where('modalidad_id',$inscrito->modalidad_id)->where('ronda',1)->where('grupo',$orden[$i])->orderBy('orden','desc')->first();
                        if($LultOrden==NULL){
                            $ultOrden=0;
                        }
                        else{
                            $ultOrden=$LultOrden->orden;
                        }
                        $posicionkata= New Posicioneskata();
                        $posicionkata->inscripcion_id = $inscrito->id;
                        $posicionkata->modalidad_id = $inscrito->modalidad_id;
                        $posicionkata->grupo=$orden[$i];
                        $posicionkata->ronda =1; //aqui solo inserta el 1 porque el sorteo se genera una ves para la primera ronda
                        $posicionkata->orden=$ultOrden+1;
                        $posicionkata->save();
                        if($i<count($orden)-1){
                            $i++;
                        }
                        else{
                            $i=0;
                        }
                    }
                    //si HAY CABEZAS DE SERIE SE INSERTAN AL ULTIMO
                    if($cabezaSerie->count()>0){
                        $i=0;//usado para el indeice del array $orden
                        foreach($cabezaSerie as $inscrito)
                        {
                            $LultOrden=Posicioneskata::where('modalidad_id',$inscrito->modalidad_id)->where('ronda',1)->where('grupo',$orden[$i])->orderBy('orden','desc')->first();
                            if($LultOrden==NULL){
                                $ultOrden=0;
                            }
                            else{
                                $ultOrden=$LultOrden->orden;
                            }
                            $posicionkata= New Posicioneskata();
                            $posicionkata->inscripcion_id = $inscrito->id;
                            $posicionkata->modalidad_id = $inscrito->modalidad_id;
                            $posicionkata->grupo=$orden[$i];
                            $posicionkata->ronda =1; //aqui solo inserta el 1 porque el sorteo se genera una ves para la primera ronda
                            $posicionkata->orden=$ultOrden+1;
                            $posicionkata->save();
                            if($i<count($orden)-1){
                                $i++;
                            }
                            else{
                                $i=0;
                            }
                        }
                    }
                    break;
                default:


                    break;
            }
            $sorteados = Posicioneskata::where('modalidad_id', $request->categoria)->where('ronda', 1)->orderBy('id','asc')->with('inscripcion.competidor')->with('inscripcion.club')->get();
            return $sorteados;
        }

    }

    public function numeroGrupos($competidores){
        switch ($competidores) {
            case ($competidores<=3):
                $grupos=1;
                break;

            case ($competidores<=24):
                $grupos=2;
                break;
            case ($competidores<=48):
                $grupos=4;
                break;
            case ($competidores<=96):
                $grupos=8;
                break;

            default:
                $grupos=16;
                break;
        }
    return $grupos;
    }
}
