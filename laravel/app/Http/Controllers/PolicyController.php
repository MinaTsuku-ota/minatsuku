<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PolicyController extends Controller
{
    public function index(){
        return view('policy.policy');
    }
    // policy_iframeを表示
    public function show_iframe(){
        return view('policy.policy_iframe');
    }
}
