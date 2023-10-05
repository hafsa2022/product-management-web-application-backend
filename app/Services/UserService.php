<?php

namespace App\Services;
use Illuminate\Http\Request;
use App\Services\Interfaces\IUserService;
use App\Repositories\Interfaces\IUserRepository;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Hash;



class UserService implements IUserService
{
    protected $repository;

    public function __construct(IUserRepository $userRepository)
    {
        $this->repository = $userRepository;
    }
    public function addUser(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        $user = $this->repository->addUser($user);

        return $user;
    }

    public function getUser(Request $request){

        $user = $this->repository->getUser($request);

        return $user;
    }

    public function logout(Request $request)
    {
        return response()->json($this->repository->logout($request));
    }

}
