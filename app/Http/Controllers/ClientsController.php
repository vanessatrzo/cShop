<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

use App\Client;

use App\User;

use Illuminate\Support\Facades\Cache;

use App\Http\Requests\CreateClientRequest;

use App\Http\Requests\UpdateClientRequest;

class ClientsController extends Controller
{   
    function __construct(){
        $this->middleware('auth');
    }
    
    public function index(Request $request)
    {
        $users = User::with(['roles'])->get();
        DB::update('UPDATE clients SET code = UPPER(code)');
       
        if ($request)
        {
            $query=trim($request->get('searchText'));
            $clients=DB::table('clients')->where('name','LIKE','%'.$query.'%')
                ->orderBy('id','desc')
                ->paginate(5);
            return view('clients.index',["clients"=>$clients,"searchText"=>$query], compact('clients','users'));
        }
    }

    public function create()
    {
        $users = User::with(['roles'])->get();
        return view('clients.create', compact('users'));
    }

    public function store(CreateClientRequest $request)
    {
        try{

            $imagenCodificada = $request->ife; //Obtener la imagen
            if(strlen($imagenCodificada) <= 0) exit("No se recibió ninguna imagen");
            //La imagen traerá al inicio data:image/png;base64, cosa que debemos remover
            $imagenCodificadaLimpia = str_replace('data:image/png;base64,', '', $imagenCodificada);
            //Venía en base64 pero sólo la codificamos así para que viajara por la red, ahora la decodificamos y todo el contenido lo guardamos en un archivo
            $imagenDecodificada = base64_decode($imagenCodificadaLimpia);

            //Calcular un nombre único
            $nombreImagenGuardada = "client_" . uniqid() . ".png";

            //Escribir el archivo
            file_put_contents("./storage/" . $nombreImagenGuardada, $imagenDecodificada);

            $client=new Client;
            $client->fill( $request->all() );
            $client->ife=$nombreImagenGuardada;
            $client->save();
            
            return redirect()->route('clientes.index');
            return $nombreImagenGuardada;
            

        } catch(Exception $e){
            die($e);
        }

        //return $request->all();
        //Client::create($request ->all());

        //return redirect()->route('clientes.index');
    }

    public function show($id)
    {
        $client = Client::findOrFail($id);
        $users = User::with(['roles'])->get();

        return view('clients.show', compact('client', 'users'));
    }

    public function edit($id)
    {
        $client = Client::findOrFail($id);
        $users = User::with(['roles'])->get();

        return view('clients.edit', compact('client', 'users'));
    }

    public function update(UpdateClientRequest $request, $id)
    {
        //dd( $request->file('picture') );
        //return $request->all();
        $client = Client::findOrFail($id);

        //if ($request->hasFile('picture')) {

            //$client->picture = $request->file('picture')->store('public');
        //}
        $client->update($request->all());
        //$client->update($request->only('name', 'code', 'picture', 'email', 'phone', 'cell', 'street', 'col', 'nex', 'nin', 'pc'));

        //return back()->with('info', 'Cliente actualizado');

        return redirect()->route('clientes.index');
    }

    public function destroy($id)
    {
        Client::findOrFail($id)->delete();

        return redirect()->route('clientes.index');
    }
}