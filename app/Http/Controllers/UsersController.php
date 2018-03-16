<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

use App\Role;

use App\User;
use Illuminate\Contracts\Filesystem\Filesystem;

//use Illuminate\Support\Facades\Input;
use Image;
use Input;

use App\Http\Requests\CreateUserRequest;

use App\Http\Requests\UpdateUserRequest;


class UsersController extends Controller
{
    function __construct(){
        $this->middleware('auth');
        //$this->middleware('roles:admin', ['except' => ['edit', 'update']]);
    }
    
    public function index()
    {
        $users = User::with(['roles'])->get();
        $users = User::paginate(4);

        return view('users.index', compact('users'));
    }

    public function uploadImage(){
        $file = Input::file('picture');
        $random = str_random(10);
        $nombre = $random.'-'.$file->getClientOriginalName();
        $file->move('uploads',$nombre);
        return "ok";
    }

    public function create()
    {
        $roles = Role::pluck('name', 'id');
        $users = User::with(['roles'])->get();

        return view('users.create', compact('roles', 'users'));
    }

    /**
    * @param \App\Http\Requests\CreateUserRequest $request
    * @return Illuminate\Http\Response
    */
    public function store(CreateUserRequest $request)
    {
        //return $request->all();
       // dd($request->picture);
        //exit();

        try{

            $imagenCodificada = $request->picture; //Obtener la imagen
            if(strlen($imagenCodificada) <= 0) exit("No se recibió ninguna imagen");
            //La imagen traerá al inicio data:image/png;base64, cosa que debemos remover
            $imagenCodificadaLimpia = str_replace('data:image/png;base64,', '', $imagenCodificada);
            //Venía en base64 pero sólo la codificamos así para que viajara por la red, ahora la decodificamos y todo el contenido lo guardamos en un archivo
            $imagenDecodificada = base64_decode($imagenCodificadaLimpia);

            //Calcular un nombre único
            $nombreImagenGuardada = "user_" . uniqid() . ".png";

            //Escribir el archivo
            file_put_contents("./storage/" . $nombreImagenGuardada, $imagenDecodificada);

            $user=new User;
            $user->fill( $request->all() );
            $user->picture=$nombreImagenGuardada;
            $user->save();

            $user->roles()->attach($request->roles);
            
            //return redirect()->route('usuarios.index');
            //return back()->with('info', 'Usuario creado');
            return back()->with('info', 'Usuario creado')->$nombreImagenGuardada;
            

        } catch(Exception $e){
            die($e);
        }        
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        $users = User::with(['roles'])->get();

        return view('users.show', compact('user', 'users'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $users = User::with(['roles'])->get();

        //$this->authorize($user);
        //$this->authorize('edit', $user);

        $roles = Role::pluck('name', 'id');

        return view('users.edit', compact('user', 'roles', 'users'));
    }

    public function update(UpdateUserRequest $request, $id)
    {
        //$file_name = 'blabla';
        //dd( $request->all() );
        //Image::make($request->file('picture'))->save('img/users/'.$file_name);
        //return $request->all();
        //dd($request->file('picture')->store('public'));

        try{

            $imagenCodificada = $request->picture; //Obtener la imagen
            if(strlen($imagenCodificada) <= 0) exit("No se recibió ninguna imagen");
            //La imagen traerá al inicio data:image/png;base64, cosa que debemos remover
            $imagenCodificadaLimpia = str_replace('data:image/png;base64,', '', $imagenCodificada);
            //Venía en base64 pero sólo la codificamos así para que viajara por la red, ahora la decodificamos y todo el contenido lo guardamos en un archivo
            $imagenDecodificada = base64_decode($imagenCodificadaLimpia);

            //Calcular un nombre único
            $nombreImagenGuardada = "user_" . uniqid() . ".png";

            //Escribir el archivo
            file_put_contents("./storage/" . $nombreImagenGuardada, $imagenDecodificada);

            $user = User::findOrFail($id);
            $user->picture=$request->get('picture');
            $user->name=$request->get('name');
            $user->email=$request->get('email');
            $user->password=$request->get('password');
            //$user->update($request->only('name', 'email', 'picture')); 
            $user->picture=$nombreImagenGuardada;
            $user->update();

            $user->roles()->sync($request->roles);
            
            return back()->with('info', 'Usuario actualizado');
            return $nombreImagenGuardada;

        //     $category=Category::findOrFail($id);
        // $category->name=$request->get('name');
        // $category->description=$request->get('description');
        // $category->update();
        // return Redirect::to('categorias');
            

        } catch(Exception $e){
            die($e);
        }        

        //$this->authorize($user);
        
               
    }

    public function destroy($id)
    {
        User::findOrFail($id)->delete();

        return redirect()->route('usuarios.index');
    }
}
