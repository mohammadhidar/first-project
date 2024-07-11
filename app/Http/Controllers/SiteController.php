<?php

namespace App\Http\Controllers;

use App\Models\Clinic;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    //
    public function index()
    {
        return view('site');
    }
    public function contact()
    {
        return view('site');
    }

    public function clinics()
    {
        $clinics = Clinic::all();
        return view('clinics')->with(['clinics' => $clinics]);
    }

    public function clinicsDetails($id)
    {
        $clinic = Clinic::find($id);
        $dates = $clinic->dates;
        return view('clinicDetails')->with(['clinic' => $clinic, 'dates' => $dates]);
    }
}