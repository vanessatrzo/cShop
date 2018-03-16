<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

use App\Http\Requests\CreateCategoryRequest;

use App\Category;

use App\User;

use DB;

class CategoriesController extends Controller
{
    public function __construct(){


    }

    public function index(Request $request)
    {
        $users = User::with(['roles'])->get();
        if ($request)
        {
            $query=trim($request->get('searchText'));
            $categories=DB::table('category')->where('name','LIKE','%'.$query.'%')
            ->orderBy('id','desc')
            ->paginate(5);
            return view('categories.index',["categories"=>$categories,"searchText"=>$query], compact('users'));
        }
    }

    public function create()
    {
        $users = User::with(['roles'])->get();

        return view("categories.create", compact('users'));
    }

    public function store(CreateCategoryRequest $request)
    {
        $category=new Category;
        $category->name=$request->get('name');
        $category->description=$request->get('description');
        $category->save();
        return Redirect::to('categorias');
    }

    public function show($id)
    {
        $users = User::with(['roles'])->get();

        return view("categories.show",["category"=>Category::findOrFail($id)], compact('users'));
    }

    public function edit($id)
    {
        $users = User::with(['roles'])->get();
        
        return view("categories.edit",["category"=>Category::findOrFail($id)], compact('users'));
    }

    public function update(CreateCategoryRequest $request, $id)
    {
        $category=Category::findOrFail($id);
        $category->name=$request->get('name');
        $category->description=$request->get('description');
        $category->update();
        return Redirect::to('categorias');
    }

    public function destroy($id)
    {
        Category::findOrFail($id)->delete();

        return redirect()->route('categorias.index');
    }
}
