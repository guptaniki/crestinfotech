<?php

namespace App\Http\Controllers;

use App\Order;
use App\Order_Items;
use App\Product;
use App\Product_image;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        $uid=Auth::id();

        $user=User::find($uid);

        foreach(session()->get('cart') as $carts)
        {
            $pro_id[]=$carts['product_id'];
            $qty[$carts['product_id']]=array($carts['product_id'],$carts['quantity']);
        }
        $product=Product::whereIn('id',$pro_id)->get();
        $main_images = Product_image::whereIn('f_product_id', $pro_id)
            ->where('i_main', 1)
            ->get();
        $t=session()->get('total',$request['total']);
        return view('order.create',compact('product','t','main_images','qty','user'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $t=session()->get('total',$request['total']);
        $latestOrder = Order::orderBy('created_at','DESC')->first();
        $data=[
            "i_customar_id" => Auth::id(),
            "v_order_id" => 'Cr'.str_pad($latestOrder->id + 1, 8, "0", STR_PAD_LEFT),
            "f_final_total" => $t,
            "v_firstname"=>$request['v_firstname'],
            "v_lastname"=>$request['v_lastname'],
            "v_email"=>$request['v_email'],
            "v_address"=>$request['v_address']
        ];
        $order=Order::create($data);

        foreach(session()->get('cart') as $row)
        {
            $ins=[
                'i_order_id'=>$order->id,
                'i_product_id'=>$row['product_id'],
                'v_product_name'=>$row['name'],
                'f_price'=>$row['price'],
                'f_qty'=>$row['quantity'],
                'f_subtotal'=>$row['price']*$row['quantity']
            ];
            Order_Items::create($ins);

        }


return redirect('stripe');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
