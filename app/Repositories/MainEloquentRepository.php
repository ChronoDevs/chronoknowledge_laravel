<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Schema;

class MainEloquentRepository
{
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

        return $rtn;
    }

    public function add(array $attributes)
    {
        $rtn = false;

        if (!empty($this->Model)) {
            $rtn = $this->Model::all();
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

    /**
     * adjust a list of records base on attributes given
     * call NTC (No Try Catch) method
     *
     * @param Array $whereAttributes
     * @param Array $adjustAttributes
     * @return Bool
     */
    public function adjustByAttributes(array $whereAttributes, array $adjustAttributes)
    {
        $rtn = false;

        try {
            $rtn = $this->NTCadjustByAttributes($whereAttributes, $adjustAttributes);
        } catch (\Exception $e) {
            \L0g::error('Exception: ' . $e->getMessage());
            \SlackLog::error('Exception: ' . $e->getMessage());
        } catch (\Error $e) {
            \L0g::error($e->getMessage());
            \SlackLog::error($e->getMessage());
        }

        return $rtn;
    }

    /**
     * adjust a list of records base on attributes given
     * NTC (No Try Catch) method
     *
     * @param Array $whereAttributes
     * @param Array $adjustAttributes
     * @return Bool
     */
    public function NTCadjustByAttributes(array $whereAttributes, array $adjustAttributes)
    {
        $rtn = false;

        if (!empty($this->Model) && count($whereAttributes) != 0 && count($adjustAttributes) != 0) {
            $rtn = $this->Model::where(function ($query) use ($whereAttributes, $adjustAttributes) {
                foreach ($whereAttributes as $key => $value) {
                    if (is_array($value)) {
                        $query->whereIn($key, $value);
                    } else {
                        $query->where($key, $value);
                    }
                }

                return $query;
            })->update($adjustAttributes);

            if ($rtn === 0) {
                $rtn = true;
            }
        }

        return $rtn;
    }
}
