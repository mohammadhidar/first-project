<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ClinicRequest;
use App\Models\Clinic;
use App\Models\Section;
use Illuminate\Http\Request;
use App\Models\User;

class ClinicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $clinics = Clinic::get();
        return view('admin.clinics.index')->with(['clinics' => $clinics]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        $sections = Section::get();
        $users = User::where('role', 'doctor')->get();
        $nurses = User::where('role', 'nurse')->get();
        return view('admin.clinics.create')->with(['users' => $users, 'sections' => $sections, 'nurses' => $nurses]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClinicRequest $request)
    {
        //
        $data = $request->all();
        Clinic::create($data);
        return redirect(route('clinics.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

        $sections = Section::get();
        $users = User::where('role', 'doctor')->get();
        $nurses = User::where('role', 'nurse')->get();
        $clinic = Clinic::find($id);
        return view('admin.clinics.create')->with(['clinic' => $clinic, 'users' => $users, 'sections' => $sections, 'nurses' => $nurses]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->only(['name', 'about', 'location', 'phone', 'user_id']);
        Clinic::where('id', $id)->update($data);
        return redirect(route('clinics.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $clinic = Clinic::find($id);
        $clinic->delete();
        return redirect(route('clinics.index'));
    }
}
