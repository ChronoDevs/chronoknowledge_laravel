<?php

namespace App\Interfaces;

interface UserRepositoryInterface
{

    /**
     * @param Array $attributes
     * @return Bool/Model
     */
    public function add(array $attributes);
}
