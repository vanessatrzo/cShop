<?php

namespace App\Http\Controllers;

use App\User;
use DB;
use App\Webcam;
use Illuminate\Http\Request;

class WebcamController extends Controller
{
    function __construct(){
        $this->middleware('auth');
    }
    
    public function index(Request $request)
    {
        $users = User::with(['roles'])->get();
        //DB::update('UPDATE webcams SET foto = SUBSTRING(foto, 11, 25)');

        if ($request)
        {
            $query=trim($request->get('searchText'));
            $webcam=DB::table('webcams')->where('foto','LIKE','%'.$query.'%')
            ->orderBy('id','desc')
            ->paginate(5);
            return view('webcam.index',["webcam"=>$webcam,"searchText"=>$query], compact('webcam','users'));
        }
    }
    public function create(Request $request)
    {
        $users = User::with(['roles'])->get();

        return view('webcam.create', compact('users'));
    }

    public function store(Request $request)
    {
        //return $request->all();
        //print_r($request->foto);
        
        //exit();
        
        try{

            $imagenCodificada = $request->foto; //Obtener la imagen
            if(strlen($imagenCodificada) <= 0) exit("No se recibió ninguna imagen");
            //La imagen traerá al inicio data:image/png;base64, cosa que debemos remover
            $imagenCodificadaLimpia = str_replace('data:image/png;base64,', '', $imagenCodificada);
            //Venía en base64 pero sólo la codificamos así para que viajara por la red, ahora la decodificamos y todo el contenido lo guardamos en un archivo
            $imagenDecodificada = base64_decode($imagenCodificadaLimpia);

            //Calcular un nombre único
            $nombreImagenGuardada = "foto_" . uniqid() . ".png";

            //Escribir el archivo
            file_put_contents("./storage/" . $nombreImagenGuardada, $imagenDecodificada);
            
            $webcam=new Webcam;
            $webcam->foto=$nombreImagenGuardada;
            $webcam->save();

            return $nombreImagenGuardada;
            

        } catch(Exception $e){
            die($e);
        }

        //Webcam::create($request ->all());

        //return redirect()->route('webcam.index', compact('nombreImagenGuardada'));

        
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
