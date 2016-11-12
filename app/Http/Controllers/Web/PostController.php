<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Route;

class PostController extends Controller
{
    public function index()
    {
    	return "WEB";
    }

    public function create()
    {
    	return "WEB Create";
    }


}
