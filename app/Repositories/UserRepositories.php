<?php

namespace App\Repositories;

use App\Interfaces\UserInterface;
use App\Models\User;

class UserRepositories implements UserInterface{

    public function addUser(array $data)
    {
        return User::create($data);
    }
    public function getAllUser()
    {
        return User::select(['id','name', 'email', 'phone_number'])->paginate(9);
    }
    public function updateUser($id, array $data)
    {

    }
    public function deleteUser($id)
    {

    }
    public function getUserId()
    {

    }
    public function showUser($id)
    {
        return User::where('id', $id)->first();
    }



}




?>
