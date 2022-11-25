<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\Category;
use App\Models\Post;

class Category extends MainModel
{
    /**
    * @var $table
    */
    protected $table = 'categories';

    /**
    * @var $primaryKey
    */
    protected $primaryKey = 'id';

    /**
    * @var $fillable
    */
    protected $fillable = [
        'title',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    /**
    * @var $cast
    */
    protected $casts = [
        //
    ];

    /**
    * @var $appends
    */
    protected $appends = [
        //
    ];

    /*======================================================================
     * CONSTANTS
     *======================================================================*/
    /*======================================================================
     * ACCESSORS
     *======================================================================*/
    /*======================================================================
     * MUTATORS
     *======================================================================*/
    /*======================================================================
     * RELATIONSHIPS
     *======================================================================*/
    /**
     * This method return mulitple Category relation to post.
     *
     * @return collection
     */
    public function posts()
    {
        return $this->hasMany(Post::class, 'post_id');
    }
    /*======================================================================
     * SCOPES
     *======================================================================*/
}
