<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function tag()
    {
        return view('vendor.voyager.tag.edit-add');
    }
}
