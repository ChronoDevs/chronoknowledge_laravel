<?php

namespace App\Repositories;

use Carbon\Carbon;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Interfaces\UserRepositoryInterface;
use App\Models\User;

class UserEloquentRepository extends MainEloquentRepository implements UserRepositoryInterface
{
    /*======================================================================
     * PROPERTIES
     *======================================================================*/

    /**
     * @var User $Model
     */
    public $Model = User::class;

    /*======================================================================
     * METHODS
     *======================================================================*/

    /**
     * add a User record
     *
     * @param Array $attributes
     * @return Bool/User
     */
    public function add(array $attributes)
    {
        $rtn = false;

        try {
            $rtn = $this->NTCadd($attributes);
        } catch (\Exception $e) {
            \Log::error('Exception: ' . $e->getMessage());
        }

        return $rtn;
    }

    /**
     * add a model record
     * NTC (No Try Catch) method
     *
     * @param Array $attributes
     * @return Bool/Model
     */
    public function NTCadd(array $attributes)
    {
        $rtn = false;

        if (!empty($this->Model) && count($attributes) != 0) {
            $rtn = $this->Model::create($attributes);

            if ($rtn) {
                $rtn = $rtn->fresh();
            }
        }

        return $rtn;
    }

}
