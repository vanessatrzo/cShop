<?php

namespace App\Http\Controllers;

use App\User;
use App\Payment;
use App\Client;
use App\Product;
use DB;

use Illuminate\Http\Request;

class PaymentsController extends Controller
{
    function __construct(){
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $users = User::with(['roles'])->get();
        $clients = Client::all();
        $products = Product::all();
        if ($request)
        {
            $query=trim($request->get('searchText'));
            $payments=DB::table('payments')->where('name','LIKE','%'.$query.'%')
            ->orderBy('id','desc')
            ->paginate(5);
            return view('payments.index',["payments"=>$payments,"searchText"=>$query], compact('clients','users', 'payments', 'products'));
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
