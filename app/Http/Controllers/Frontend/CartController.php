<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function showCart()
    {
        $data=[];
        $data['cart']=session()->has('cart')? session()->get('cart'):[];
        $data['total']=array_sum(array_column($data['cart'],'original_price'));

        // dd($data);

        return view('frontend.cart', $data);

    }

    public function addToCart(Request $request)
    {

        try{
            $this->validate($request,
            [
                'product_id'=>['required', 'numeric']
            ]);

        }catch(\Exception $e){
            return redirect()->back();
        }

        $product=Product::findOrFail($request->input('product_id'));

        // dd($product);

        $cart=session()->has('cart')? session()->get('cart'):[];
        $unit_price=($product->selling_price!=null && $product->selling_price>0)?$product->selling_price:$product->original_price;

        // dd($cart);

        if(array_key_exists($product->id, $cart)){
            $cart[$product->id]['quantity']++;
            $cart[$product->id]['total_price']=$cart[$product->id]['quantity']*$cart[$product->id]['unit_price'];
        }
        else{
            $cart[$product->id]=[
                'id'=>$product->id,
                'title'=>$product->title,
                'quantity'=>1,
                'unit_price'=>$unit_price,
                'original_price'=>$product->original_price,
                'total_price'=>$unit_price
            ];
        }
        // dd($cart);

        session(['cart'=>$cart]);
        session()->flash('message', $product->title.'added to cart');

        return redirect()->route('cart.show');

    }


    public function removeCart(Request $request)
    {
        try{
            $this->validate($request,
            [
                'product_id'=>['required', 'numeric']
            ]);

        }catch(\Exception $e){
            return redirect()->back();
        }

        $cart=session()->has('cart')? session()->get('cart'):[];

        //remove product from session
        unset($cart[$request->input('product_id')]);

        //update session
        session(['cart'=>$cart]);


        session()->flash('message','Product remove from  cart');

        return redirect()->back();

    }

    public function clearCart()
    {
        // $cart=session()->has('cart')? session()->get('cart'):[];
        // $cart=[];
        session(['cart'=>[]]);
        return redirect()->back();
    }

    public function checkout()
    {
        return view('frontend.checkout');
    }
}
