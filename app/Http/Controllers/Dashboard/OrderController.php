<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Order;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(Request $request)
    {

        $orders = Order::whereHas('client' ,function($q) use($request)
        {
            return $q->where('name' , 'like' , '%' .$request->search. '%');

        })->latest()->paginate(PAGINATION_COUNT);

        return view('dashboard.orders.index',compact('orders'));

    }// end of index

    public function products(Order $order)
    {
        
        $products = $order->products;

        return view('dashboard.orders._products',compact('products','order'));
    }

    public function destroy(Order $order){

        foreach ($order->products as $product) {
            $product->update([
                'stock' => $product->stock + $product->pivot->quantity,
            ]);
        }// end of foreach

        $order->delete();

        session()->flash('success' , __('site.deleted_successfully'));
        return redirect()->route('dashboard.orders.index');

    }// end of order

}// end of controller
