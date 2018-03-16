<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

use App\Sale;

use App\User;
use App\Product;

use Illuminate\Support\Facades\Reridect;
use Illuminate\Support\Facades\Input;

use Carbon\Carbon;
use Response;
use Illuminate\Support\Collection;

class SalesController extends Controller
{
    public function index(Request $request)
    {
        $users = User::with(['roles'])->get();

        // if ($request)
        // {
        //     $query=trim($request->get('searchText'));
        //     $sales=DB::table('sales as s')
        //         ->select('s.id','s.code','s.name','s.quantity','s.price','s.total','s.created_at')
        //         ->where('s.id','LIKE','%'.$query.'%')
        //         ->orderBy('s.id','desc')
        //         ->groupBy('s.id','s.created_at')
        //         ->paginate(8);
        //         return view('sales.index',["sales"=>$sales,"searchText"=>$query]);
        // }


        $sales = Sale::all();
        //$things = Product::all();
        if ($request)
        {
            $query=trim($request->get('searchText'));
            $products=DB::table('products')->where('code','LIKE',''.$query.'')
            ->orderBy('id','desc')->paginate(8);
            //dd($products);
            $things=$products;
            return view('sales.index',["products"=>$products,"searchText"=>$query], compact('sales','products','users', 'things'));
        }
    }

    public function create()
    {
        $clients=DB::table('clients')->get();
        $products = DB::table('products as p')
            ->select(DB::raw('CONCAT(p.code, " ", p.name) as articulo'),'p.id','p.quantity','p.price','p.code', 'p.category')
            ->where('p.status', '=', 'Disponible')
            ->where('p.quantity', '>', '0')
            ->groupBy('articulo','p.id','p.quantity', 'p.price', 'p.code', 'p.category')
            ->get();
        return view('sales.create',["clients"=>$clients,"products"=>$products]);
    }

    public function store(Request $request)
    {
        dd($request->all());
        try{

            $sale=new Sale;
            $sale->fill( $request->all() );
            $sale->save();
            
            return redirect()->route('compras.index');            

        } catch(Exception $e){
            die($e);
        }

        // try{
        //     $cont = 0;

        //     while($cont < count($id)){
        //         $sale = new Sale();
        //         $sale->id= $venta->id; 
        //         $sale->code= $code[$cont];
        //         $sale->quantity= $quantity[$cont];
        //         $sale->price= $price[$cont];
        //         $sale->total= $total[$cont];
        //         $sale->save();
        //         $cont=$cont+1;
        //     }
        //     DB::commit();

        // }catch(\Exception $e)
        // {
        //    DB::rollback();
        // }

        // return Redirect::to('sales.index');
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
