<?php

namespace App\Services\Interfaces;

use Illuminate\Http\Request;

interface IUserService
{
    public function addUser(Request $request);

    public function getUser(Request $request);

    public function logout(Request $request);

    // public function getUserInfo(Request $request);

}
