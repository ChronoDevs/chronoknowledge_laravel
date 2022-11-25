<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\PostFavoriteService;

class PostFavoriteController extends Controller
{
     /**
     * @param PostFavoriteService $service
     * @return void
     */
    public function __construct(PostFavoriteService $service)
    {
        $this->service = $service;
    }

    /**
     * @param Reqeust $request
     * @return JSON $rtn
     */
    public function store()
    {
        $rtn = null;
        $rtn = $this->service->add();
        return $rtn;
    }

    /**
     * @param Reqeust $request
     * @return JSON $rtn
     */
    public function update()
    {
        $rtn = null;
        $rtn = $this->service->adjust();
        return $rtn;
    }

    /**
     * @param Reqeust $request
     * @return JSON $rtn
     */
    public function destroy()
    {
        $rtn = null;
        $rtn = $this->service->annul();
        return $rtn;
    }
}
