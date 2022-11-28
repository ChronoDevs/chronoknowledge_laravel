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
     * acquire a list of records base on attributes given
     * call NTC (No Try Catch) method
     *
     * @param Array $attributes
     * @param Bool $returnCollection - either return by BuildQuery or Collection
     * @return BuildQuery|Collection
     */
    public function acquireByAttributes(array $attributes, bool $returnCollection = true)
    {
        if ($returnCollection) {
            $rtn = $this->arrayToCollection([]);
        } else {
            $rtn = $this->Model::query();
        }

        try {
            $rtn = $this->NTCacquireByAttributes($attributes, $returnCollection);
        } catch (\Exception $e) {
            Log::error('Exception: ' . $e->getMessage());
        }

        return $rtn;
    }

    /**
     * acquire a list of records base on attributes given
     * NTC (No Try Catch) method
     *
     * @param Array $attributes
     * @param Bool $returnCollection - either return by BuildQuery or Collection
     * @return BuildQuery|Collection
     */
    public function NTCacquireByAttributes(array $attributes, bool $returnCollection = true)
    {
        if ($returnCollection) {
            $rtn = $this->arrayToCollection([]);
        } else {
            $rtn = $this->Model::query();
        }

        //
        return $rtn;
    }

    /**
     * acquire a list of records by user favorites
     * call NTC (No Try Catch) method
     *
     * @param int $id
     * @param Bool $returnCollection - either return by BuildQuery or Collection
     * @return BuildQuery|Collection
     */
    public function acquireAllByUserFavorites(int $id, bool $returnCollection = true)
    {
        if ($returnCollection) {
            $rtn = $this->arrayToCollection([]);
        } else {
            $rtn = $this->Model::query();
        }

        try {
            $rtn = new $this->Model;
            $user = $this->acquire($id);
            $fav()->guard('api')->user()->favorites;
        } catch (\Exception $e) {
            Log::error('Exception: ' . $e->getMessage());
        }

        return $rtn;
    }

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
