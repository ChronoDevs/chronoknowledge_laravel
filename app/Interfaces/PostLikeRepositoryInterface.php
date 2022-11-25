<?php

namespace App\Interfaces;

interface PostLikeRepositoryInterface
{
    /**
     * @param Array $attributes
     * @return Bool/Model
     */
    public function add(array $attributes);

    /**
     * @param Int $id
     * @return Bool
     */
    public function annul(int $id);
}