<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Services\PostService;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
     /**
     * @param PostService $service
     * @return void
     */
    public function __construct(PostService $service)
    {
        $this->service = $service;
    }

    /**
     * @param Reqeust $request
     * @return JSON $rtn
     */
    public function index()
    {
        $rtn = null;
        $rtn = $this->service->all();
        return $rtn;
    }

    /**
     * @param Reqeust $request
     * @return JSON $rtn
     */
    public function store(Request $request)
    {
        $rtn = null;
        $rtn = $this->service->add();
        return $rtn;
    }

    /**
     * @param Reqeust $request
     * @return JSON $rtn
     */
    public function show($id)
    {
        $rtn = null;
        $rtn = $this->service->acquire($id);
        return $rtn;
    }
}
