<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\SaveDate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //
    public function index()
    {
        //
        $dates = SaveDate::where('user_id', Auth::user()->id)->get();
        return view('user.home')->with(['dates' => $dates]);
    }
    public function profile()
    {
        $dates = SaveDate::where('user_id', Auth::user()->id)->get();
        return view('user.home')->with(['dates' => $dates]);
    }
}