<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;
use App\User;
use App\Client;
use App\Category;
use DB;
use Carbon\Carbon;
use App\Ubication;

use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\UpdateProductRequest;

class ProductsController extends Controller
{
    function __construct(){
        $this->middleware('auth');
    }
    
    public function index(Request $request)
    {
        DB::update('UPDATE products SET code = UPPER(code)');
        
        $users = User::with(['roles'])->get();
        // $products = Product::all();
        // $products = Product::paginate(8);

        // return view('products.index', compact('products','users'));
        if ($request)
        {
            $query=trim($request->get('searchText'));
            $products=DB::table('products')->where('name','LIKE','%'.$query.'%')
            ->orderBy('id','desc')
            ->paginate(8);
            //dd($products);
            return view('products.index',["products"=>$products,"searchText"=>$query], compact('products','users'));
        }
    }

    public function create()
    {
        //DB::update('UPDATE products SET code = CONCAT (code, id)');
        DB::update('UPDATE products SET subtotal = (price * quantity)');
        $products = Product::whereDate('created_at', '=', Carbon::now()->format('Y-m-d'))->orderBy('id','desc')->get();
        //$products = Product::all();
        $users = User::all();
        $ubications = Ubication::all();
        $clients = Client::all();
        $categories = Category::all();
        return view('products.create', compact('products','users', 'clients', 'categories','ubications'));
    }

    public function store(CreateProductRequest $request)
    {
        try{

            $imagenCodificada = $request->picture; //Obtener la imagen
            if(strlen($imagenCodificada) <= 0) exit("No se recibió ninguna imagen");
            //La imagen traerá al inicio data:image/png;base64, cosa que debemos remover
            $imagenCodificadaLimpia = str_replace('data:image/png;base64,', '', $imagenCodificada);
            //Venía en base64 pero sólo la codificamos así para que viajara por la red, ahora la decodificamos y todo el contenido lo guardamos en un archivo
            $imagenDecodificada = base64_decode($imagenCodificadaLimpia);

            //Calcular un nombre único
            $nombreImagenGuardada = "product_" . uniqid() . ".png";

            //Escribir el archivo
            file_put_contents("./storage/" . $nombreImagenGuardada, $imagenDecodificada);

            $product=new Product;
            $product->fill( $request->all() );
            $product->picture=$nombreImagenGuardada;
            $product->save();
            
            return redirect()->route('articulos.index');
            return $nombreImagenGuardada;
            

        } catch(Exception $e){
            die($e);
        }
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        $users = User::with(['roles'])->get();

        return view('products.show', compact('product','users'));
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $users = User::with(['roles'])->get();
        $clients = Client::all();
        $ubications = Ubication::all();
        $categories = Category::all();

        return view('products.edit', compact('product','users', 'clients', 'categories', 'ubications'));
    }

    public function update(UpdateProductRequest $request, $id)
    {
        Product::findOrFail($id)->update($request->all());

        return redirect()->route('articulos.index');
    }

    public function destroy($id)
    {
        Product::findOrFail($id)->delete();

        return back();
    }
}
