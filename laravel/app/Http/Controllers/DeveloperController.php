<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;

use App\Opinion;

class DeveloperController extends Controller
{
    public function __construct(){
        // $this->middleware('auth.basic'); // まだ使い方が分からない
    }
    public function index(){
        $opinions = Opinion::latest('created_at')->get();
        return view('dev.dev', compact('opinions'));
    }
}
