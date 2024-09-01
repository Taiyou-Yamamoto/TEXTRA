<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
}
