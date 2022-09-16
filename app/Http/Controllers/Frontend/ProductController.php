<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Interfaces\ProductInterface;

class ProductController extends Controller
{
    protected $product;
    public function __construct(ProductInterface $product)
    {
        $this->product=$product;
    }

    public function productDetails($slug)
    {
        $data=[];
        $data['product']=$this->product->showProduct($slug);

        if($data['product']==null){
            return redirect()->route('home');
        }

        return view('frontend.products.details', $data);

    }
}
