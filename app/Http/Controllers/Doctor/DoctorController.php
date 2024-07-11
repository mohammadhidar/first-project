<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\Clinic;
use Illuminate\Support\Facades\Auth;

class DoctorController extends Controller
{
    //
    public function index()
    {
        //
        return view('doctor.dashboard');
    }
    public function profile()
    {
        return view('doctor.profile');
    }

    public function clincs()
    {
        $user_id = Auth::user()->id;
        $clinics = Clinic::where('user_id', $user_id)->get();
        return view('doctor.clinics')->with(['clinics' => $clinics]);
    }
}