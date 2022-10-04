<?php
namespace App\Services;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Interfaces\UserRepositoryInterface;

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
    public function registerUser()
    {
        $user = false;

        DB::beginTransaction();
        try {
            $repository->insert
        } catch (\Exception $e) {
            DB::rollback();
        }

        return $user;
    }
}
?>

