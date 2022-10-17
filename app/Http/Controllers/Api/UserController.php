<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\UserService;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Models\User;

class UserController extends Controller
{
    /**
     * @param UserService $service
     * @return void
     */
    public function __construct(UserService $service)
    {
        $this->service = $service;
    }

    /**
     * @param Reqeust $request
     * @return JSON $user
     */
    public function login(Request $request)
    {
        $user = new User;

        if(auth()->attempt(['email' => 'admin@chronoknowledge.com', 'password' => 'admin'])) {
            return response()->json([
                'token' => $user->createToken('chronoknowledge')->accessToken,
                'user' => auth()->user()
            ]);
        }

        // throw new Exception("Invalid credentials.");
    }

    /**
     * @param Request $request
     * @return JSON $user
     */
    public function register(UserRequest $request)
    {
        $rtn = null;
        $rtn = $this->service->registerUser();
        return $rtn;
    }
}
