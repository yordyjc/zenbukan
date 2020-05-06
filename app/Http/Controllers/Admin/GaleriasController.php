<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Galeria;
use App\Models\Video;
use Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Response;
use File;
use Carbon\Carbon;
use Auth;

class GaleriasController extends Controller
{
    function sanear_string($string)
    {

        $string = trim($string);

        $string = str_replace(
            array('á', 'à', 'ä', 'â', 'ª', 'Á', 'À', 'Â', 'Ä'),
            array('a', 'a', 'a', 'a', 'a', 'A', 'A', 'A', 'A'),
            $string
        );

        $string = str_replace(
            array('é', 'è', 'ë', 'ê', 'É', 'È', 'Ê', 'Ë'),
            array('e', 'e', 'e', 'e', 'E', 'E', 'E', 'E'),
            $string
        );

        $string = str_replace(
            array('í', 'ì', 'ï', 'î', 'Í', 'Ì', 'Ï', 'Î'),
            array('i', 'i', 'i', 'i', 'I', 'I', 'I', 'I'),
            $string
        );

        $string = str_replace(
            array('ó', 'ò', 'ö', 'ô', 'Ó', 'Ò', 'Ö', 'Ô'),
            array('o', 'o', 'o', 'o', 'O', 'O', 'O', 'O'),
            $string
        );

        $string = str_replace(
            array('ú', 'ù', 'ü', 'û', 'Ú', 'Ù', 'Û', 'Ü'),
            array('u', 'u', 'u', 'u', 'U', 'U', 'U', 'U'),
            $string
        );

        $string = str_replace(
            array('ñ', 'Ñ', 'ç', 'Ç'),
            array('n', 'N', 'c', 'C',),
            $string
        );
        return $string;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galerias= Galeria::all();
        return view('admin.galerias-video.index')->with('galerias',$galerias);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.galerias-video.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator=Validator::make($request->all(),[
            'galeria'=>'required',
            'descripcion'=>'required',
            'foto'=>'required|file|mimes:png,jpg,jpeg|max:5120',
            'estado'=>'required'
        ]);
        if($validator->fails())
        {
            alert()->error('Ups!','La operacion no pudo ser completada')->autoClose(4000)->showCloseButton();
            return redirect('/admin/galeria-videos/create')
            ->withErrors($validator)
            ->withInput();
        }
        $galeria = new Galeria();
        $galeria->galeria =$request->galeria;
        $galeria->descripcion = $request->descripcion;
        $foto=Input::file('foto');
        if(!is_null($foto))
        {
            $extension=$foto->getClientOriginalExtension();
            $name=str_replace(' ','-',strtolower($this->sanear_string($request->galeria))).'.'.$extension;
            $path=public_path().'/resources/img/videos';
            $foto->move($path,$name);
            $galeria->foto='/resources/img/videos/'.$name;
        }
        if($request->estado==0)
        {
            $galeria->estado=false;
        }
        $galeria->save();
        alert()->success('¡Yeah!','Operación realizada con éxito')->autoClose(3000)->showCloseButton();
        return redirect('/admin/galeria-videos');
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
        $galeria=Galeria::find($id);
        if($galeria)
        {
            return view('admin.galerias-video.editar')->with('galeria',$galeria);
        }
        else
        {
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
        $validator=Validator::make($request->all(),[
            'galeria'=>'required',
            'descripcion'=>'required',
            'foto'=>'required|file|mimes:png,jpg,jpeg|max:5120',
            'estado'=>'required'
        ]);
        if($validator->fails())
        {
            alert()->error('Ups!','La operacion no pudo ser completada')->autoClose(4000)->showCloseButton();
            return redirect('/admin/galeria-videos/create')
            ->withErrors($validator)
            ->withInput();
        }

        $galeria=Galeria::find($id);
        $galeria->galeria=$request->galeria;
        $galeria->descripcion=$request->descripcion;
        $foto  = Input::file('foto');
        if (!is_null($foto)) {
            File::delete(public_path().$galeria->foto);
            $extension=$foto->getClientOriginalExtension();
            $name=str_replace(' ', '-', strtolower($this->sanear_string($request->galeria))).'.'.$extension;
            $path=public_path().'/resources/img/videos/';
            $foto->move($path,$name);
            $galeria->foto='/resources/img/videos/'.$name;
        }
        if($request->estado==0)
        {
            $galeria->estado=false;
        }
        else{
            $galeria->estado=true;
        }
        $galeria->save();
        alert()->success('¡Yeah!','Operación realizada con éxito')->autoClose(3000)->showCloseButton();
        return redirect('/admin/galeria-videos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

            $galeria=Galeria::find($id);
            if($galeria->videos->count() !=0)
            {
                alert()->error('Espere!','La galeria contiene videos')->autoClose(3000)->showCloseButton();
                return redirect('/admin/galeria-videos');
            }
            File::delete(public_path().$galeria->foto);
            $galeria->delete();
    
            alert()->success('¡Yeah!','Operación realizada con éxito')->autoClose(3000)->showCloseButton();
            return redirect('/admin/galeria-videos');
    }

    //Metodos para los videos

    public function listaVideos()
    {
        $videos=Video::with('galeria')->orderBy('id','desc')->get();
        return view('admin.galerias-video.lista-videos')->with('videos',$videos);
    }

    public function subirVideo()
    {
        $galerias=Galeria::all()->pluck('galeria','id');
        
        return view('admin.galerias-video.subir-video')->with('galerias',$galerias);
    }

    public function guardarVideo(Request $request)
    {
        $validator=Validator::make($request->all(),[
            'galeria'=>'required',
            'nombre'=>'required',
            'descripcion'=>'required',
            'url'=>'required'
        ]);

        if($validator->fails())
        {
            alert()->error('Ups!','La operacion no pudo ser completada')->autoClose(4000)->showCloseButton();
            return redirect('admin/galeria-videos/videos/subir')
            ->withErrors($validator)
            ->withInput();
        }

        $video = new Video();
        $video->nombre = $request->nombre;
        $video->descripcion = $request->descripcion;
        $video->url = $request->url;
        $video->galeria_id = $request->galeria;
        $video->save();
        alert()->success('¡Yeah!','Operación realizada con éxito')->autoClose(3000)->showCloseButton();
        return redirect('/admin/galeria-videos/video/lista');
    }

    public function eliminarVideo($id)
    {
        $video=Video::find($id);
        $video->delete();

        alert()->success('¡Yeah!','Operación realizada con éxito')->autoClose(3000)->showCloseButton();
        return redirect('/admin/galeria-videos/video/lista');

    }
}
