<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Models\ParentModel;

class MainModel extends Model
{
    use ParentModel;

    /**
     * @var $appends
     */
    protected $appends = [
        'id',
        'isEmpty',
        'isNotEmpty',
    ];

    /**
     * @var $timestamps
     */
    // public $timestamps = false;

    /*======================================================================
     * CONSTANTS
     *======================================================================*/

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    const STATUS_DELETED = null;
}
