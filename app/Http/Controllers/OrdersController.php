<?php

namespace App\Http\Controllers;

use App\Orders;
use Carbon\Carbon;
use Faker\Provider\DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrdersController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Check for date of latest order.
     *
     * @return boolz
     */
    protected function checkDate()
    {
        $date = Orders::all()->last();
        $datetime = Carbon::now();
        $diff = $date->created_at->diffInDays($datetime);
        if ($diff > 0) {
            return true;
        }
        else{
            return false;
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::id();
        $orders = Orders::where('client_id', $user_id)->get();
        return view('home', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($this->checkDate()) {
            $user_id = Auth::id();
            $order = new Orders;
            $order->title = $request->title;
            $order->message = $request->message;
            $order->client_id = $user_id;
            $order->save();

            return redirect('/home');
        }
        else {
            $errors = "You can submit only one order per day!";
            return view('home', compact('errors'));
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function show(Orders $orders, $id)
    {
        $order = Orders::find($id);
        return view('order', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function edit(Orders $orders)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Orders $orders)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function destroy(Orders $orders)
    {
        //
    }
}
