<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

use App\Shop;

use App\User;
use App\Product;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = User::with(['roles'])->get();
        $nombre = $request->input("f1t1");
       // $products = Product::all();
        
        //$name = DB::select('select name from products where id = 9');
       // $users = DB::select('select * from users where active = ?', [1]);
       
        if ($request)
        {
            
            $query=trim($request->get('f1t1'));
            $products = DB::table('products')->where('code',$query)->first();
              //  ->orderBy('id','desc')
                //->paginate(5);
            return view('shop.index',["f1t1"=>$query], compact('products','users', 'nombre'));
            //return view('shop.index', ["products"=>$products,"delay" => $query]);
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }
}
