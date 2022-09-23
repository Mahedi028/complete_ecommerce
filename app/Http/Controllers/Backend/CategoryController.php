<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Interfaces\CategoryInterface;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $category;
    public function __construct(CategoryInterface $category)
    {
        $this->category=$category;
    }

    public function create()
    {

    }

    public function store(Request $request)
    {

    }

    public function index()
    {

    }


    public function edit()
    {

    }

    public function update()
    {

    }

    public function delete()
    {

    }
}
