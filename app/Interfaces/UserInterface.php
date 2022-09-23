<?php

namespace App\Interfaces;


interface UserInterface{
    public function addUser(array $data);
    public function getAllUser();
    public function updateUser($id, array $data);
    public function deleteUser($id);
    public function getUserId();
    public function showUser($slug);
}

?>
