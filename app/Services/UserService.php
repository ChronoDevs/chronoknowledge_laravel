<?php
namespace App\Services;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Interfaces\UserRepositoryInterface;
use Exception;

class UserService
{
    /**
     * @param UserService $service
     * @return void
     */
    public function __construct(UserRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     *
     * @param Int $id
     * @return JSON $user
     */
    public function login()
    {
        $rtn = [];

        $data = request()->only('email', 'password');
        $user = new User;
        // $user = $this->service->acquireByAttributes($data);

        if (auth()->attempt($data)) {
            $rtn = [
                'token' => $user->createToken('chronoknowledge')->accessToken,
                'user' => auth()->user()
            ];
        } else {
            throw new \Exception("The given data was invalid.");
        }

        return response()->json($rtn, 200);
    }

    /**
     *
     * @param Int $id
     * @return JSON $user
     */
    public function registerUser()
    {
        $user = false;

        $data = [
            'email' => request()->get('email'),
            'username' => request()->get('username'),
            'password' => request()->get('password'),
            'name' => request()->get('name'),
            'nick_name' => request()->get('nick_name'),
            'birth_date' => request()->get('birth_date'),
            'gender' => request()->get('gender'),
            'zip_code' => request()->get('zip_code'),
            'address' => request()->get('address'),
            'tel' => request()->get('tel'),
            'email_verified_at' => request()->get('email_verified_at'),
            'deleted_at' => request()->get('deleted_at')
        ];

        \DB::beginTransaction();
        try {
            $user = $this->repository->add($data);
            \DB::commit();
        } catch (\Exception $e) {
            \DB::rollback();
        }

        return $user;
    }
}
?>

