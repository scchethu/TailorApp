<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Tailor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $user = Auth::user();
        if($user->can('user')) {
            $orders = $user->orders;
            return view('order.index',compact('orders'));
        }
        else
        {

            $tailor = Tailor::find($user->id);
            if(!$tailor->is_verified) {
                $orders = [];
                session()->put('error','Need verified by admin');
            }
            else
            {
                $orders = $tailor->orders;

            }
            return view('order.index',compact('orders'));


        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fabric_id = \request()->fabric_id;
        return view('order.create',compact('fabric_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $requests = $request->all();
        $json = json_encode([
            'data'=>$requests['measurements']
        ]);
        $requests['measurements'] = $json;
        Order::create($requests);
        return  redirect()->route('orders.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        return view('order.edit',compact('order'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {

        if($request->has('pay')) {
            $order->status = Order::STATUS_PROCESSING;
            $order->is_paid = true;
        }
        if($request->has('feedback'))
        {
            $order->feedback = $request->feedback;
        }
       if($request->has('status')){
            $order->status = $request->status;
        }

       if($request->has('amount'))
       {
           $order->amount = $request->amount;
       }
        $order->save();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
