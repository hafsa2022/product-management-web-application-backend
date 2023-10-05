<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Services\Interfaces\IUserService;
use Illuminate\Validation\ValidationException;
use Illuminate\Validation\Rules\Password;



class UserController extends Controller
{
    private IUserService $userService;

    public function __construct(IUserService $userService)
    {
        $this->userService = $userService;
    }

    public function addUser(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255|unique:users,name',
            // 'email'=>'required|email:rfc,dns|unique:users,email',
            'password' => [
                'required',
                Password::min(6)
                    ->letters()
                    ->mixedCase()
                    ->numbers()
                    ->symbols()
                    ->uncompromised()
            ],
            'password_confirmation' => 'required|same:password',
        ]);
        $user = $this->userService->addUser($request);
        return response()->json($user);
    }

    public function getUser(Request $request)
    {
        $request->validate([
            // 'email'=>'required|email:rfc,dns|email',
        ]);
        $user = $this->userService->getUser($request);
        return response()->json($user);
    }

    public function logout(Request $request)
    {
        return response()->json($this->userService->logout($request));
    }

//     public function getUserInfo(Request $request)
//     {
//         return response->json($this->userService->getUserInfo($request));
//     }
}

?>
