<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Product;
use App\Client;
use App\Category;
use \Milon\Barcode\DNS1D;
use \Milon\Barcode\DNS2D; 

class PagesController extends Controller
{
    function __construct(){
        $this->middleware('auth');
    }
    
    public function home(){
    	$users = User::with(['roles'])->get();
        $products = Product::all();
        $users_count = User::count();
        $products_count = Product::count();
        $clients_count = Client::count();
        
    	return view('home', compact('users', 'users_count', 'products_count', 'clients_count', 'products'));
    }
    public function barcode()
	{
		$users = User::with(['roles'])->get();
	    return view('barcode', compact('users'));
	}
    public function webcam2()
    {
        $users = User::with(['roles'])->get();
        return view('webcam2', compact('users'));
    }

    public function prueba()
    {
        $clients = Client::all();
        $categories = Category::all();
        $products = Product::all();
        $users = User::with(['roles'])->get();
        return view('prueba', compact('users', 'clients', 'categories', 'products'));
    }
    public function shop()
    {
        $users = User::with(['roles'])->get();
        $products = Product::all();
        return view('shop', compact(['users','products']));
    }

    public function guardafoto()
    {
        $users = User::with(['roles'])->get();
        $products = Product::all();

        try{
            $imagenCodificada = file_get_contents("php://input"); //Obtener la imagen
        if(strlen($imagenCodificada) <= 0) exit("No se recibió ninguna imagen");
        //La imagen traerá al inicio data:image/png;base64, cosa que debemos remover
        $imagenCodificadaLimpia = str_replace("data:image/png;base64,", "", urldecode($imagenCodificada));

        //Venía en base64 pero sólo la codificamos así para que viajara por la red, ahora la decodificamos y
        //todo el contenido lo guardamos en un archivo
        $imagenDecodificada = base64_decode($imagenCodificadaLimpia);

        //Calcular un nombre único
        $nombreImagenGuardada = "foto_" . uniqid() . ".png";

        //Escribir el archivo
        file_put_contents($nombreImagenGuardada, $imagenDecodificada);

        return $nombreImagenGuardada;
        }catch(Exception $e){
            die($e);
        }
        //return view('guardafoto', compact(['users','products']));
    }
}
