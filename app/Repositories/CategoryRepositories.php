<?php

namespace App\Repositories;

use App\Interfaces\CategoryInterface;
use App\Models\Category;

class CategoryRepositories implements CategoryInterface{

    public function addCategory(array $data)
    {
        return Category::create($data);
    }
    public function getAllCategory()
    {
        return Category::select(['id','name', 'slug', 'banner'])->paginate(9);
    }
    public function updateCategory($id, array $data)
    {

    }
    public function deleteCategory($id)
    {

    }
    public function getCategoryId($id)
    {

    }
    public function showCategory($slug)
    {
        return Category::where('slug', $slug)->first();
    }



}




?>
