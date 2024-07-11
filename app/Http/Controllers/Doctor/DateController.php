<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Date;
use App\Models\MessageToNurse;
use App\Models\SaveDate;
use Illuminate\Http\Request;

class DateController extends Controller
{
    //
    public function index($clinic_id)
    {
        // $id for clinic_id;
        $dates = Date::where('clinic_id', $clinic_id)->get();
        return view('doctor.dates.index')->with(['dates' => $dates, 'clinic_id' => $clinic_id]);
    }

    public function create($clinic_id)
    {
        //id for clinic
        return view('doctor.dates.create')->with(['clinic_id' => $clinic_id]);
    }

    public function show($id)
    {
        $date = Date::find($id);
        $clinic_id = $date->clinic->id;
        return view('doctor.dates.create')->with(['date' => $date, 'clinic_id' => $clinic_id]);
    }

    public function store(Request $request, $clinic_id)
    {
        $data = $request->all();

        Date::create($data);
        return redirect(route('dates.index', $clinic_id));
    }

    public function update(Request $request, $date_id)
    {
        $data = $request->only(['day', 'start_at', 'end_at', 'break', 'clinic_id']);
        Date::where('id', $date_id)->update($data);
        $date = Date::find($date_id);
        $clinic_id = $date->clinic->id;
        return redirect(route('dates.index', $clinic_id));
    }

    public function destroy($id)
    {
        //

        $date = Date::find($id);
        $date->delete();
        return redirect(route('dates.index', $id));
    }


    public function booksDates($clinic_id)
    {
        $dates = SaveDate::where('clinic_id', $clinic_id)->get();
        return view('doctor.dates.saveDates')->with(['dates' => $dates, 'clinic_id' => $clinic_id]);
    }

    public function booksDatesUpdate($save_date_id)
    {

        return view('doctor.dates.saveDates_update')->with(['save_date_id' => $save_date_id]);
    }

    public function booksDatesStore(Request $request)
    {

        $data = $request->all();


        $save_date_id = SaveDate::find($request->save_date_id);

        $clinic_id = $save_date_id->clinic->id;

        MessageToNurse::create($data);
        return redirect(route('booksDates.index', $clinic_id));
    }
}