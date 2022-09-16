<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Interfaces\ProductInterface;

class HomeController extends Controller
{
    protected $product;
    public function __construct(ProductInterface $product)
    {
        $this->product=$product;
    }


    public function showHomePage()
    {
        $data=[];

        $data['products']=$this->product->getAllProduct();
        return view('frontend.home', $data);
    }
}
