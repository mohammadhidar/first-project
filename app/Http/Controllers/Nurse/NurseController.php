<?php

namespace App\Http\Controllers\Nurse;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\MessageToNurse;
use App\Models\SaveDate;
use Illuminate\Http\Request;

class NurseController extends Controller
{
    //
    public function index()
    {
        //
        return view('nurse.dashboard');
    }
    public function profile()
    {
        return view('nurse.profile');
    }
    public function dates()
    {
        $dates = Book::all();
        return view('nurse.dates.index')->with(['dates' => $dates]);
    }

    public function accept($id)
    {
        $date = Book::find($id);

        //insert
        $data = new SaveDate();
        $data->user_id = $date->user_id;
        $data->clinic_id = $date->clinic_id;
        $data->date = $date->date;
        $data->time = $date->time1;
        $data->messageToUser = "Your request to book in our clinic for the date you have been selected has been accepted";
        $data->messageToDoctor = "Hi Dr new date";
        $data->save();

        $date->delete();
        return redirect(route('nurse.dates'));
    }
    public function decline($id)
    {
        $date = Book::find($id);

        //insert
        $data = new SaveDate();
        $data->user_id = $date->user_id;
        $data->clinic_id = $date->clinic_id;
        $data->messageToUser = "Your appointment was not accepted because it does not fit with our clinic times. Please contact us at a later time";
        $data->messageToDoctor = "Hi Dr new date decline";
        $data->save();
        $date->delete();
        return redirect(route('nurse.dates'));
    }

    public function show($id)
    {
        $date = Book::find($id);
        return view('nurse.dates.update')->with(['date' => $date]);
    }

    public function store(Request $request, $id)
    {
        // return $request->all();
        $data = $request->all();
        SaveDate::create($data);
        $date = Book::find($id);
        $date->delete();
        return redirect(route('nurse.dates'));
    }

    public function booksDatesAccepted($clinic_id)
    {
        $dates = SaveDate::where('clinic_id', $clinic_id)->get();
        return view('nurse.dates.booksdates')->with(['dates' => $dates]);
    }

    public function complaints($save_date_id)
    {
        $messages = MessageToNurse::where('save_date_id', $save_date_id)->get();
        return view('nurse.dates.messages')->with(['messages' => $messages]);
    }
}