<?php

namespace App\Http\Controllers\Nurse;

use App\Http\Controllers\Controller;
use App\Models\MessageToNurse;
use App\Models\SaveDate;
use Illuminate\Http\Request;

class SaveDateController extends Controller
{
    //
    public function show($save_date_id)
    {
        $date = SaveDate::find($save_date_id);
        return view('nurse.savedates.show')->with(['date' => $date]);
    }

    public function decline($save_date_id)
    {
        $date = SaveDate::find($save_date_id);

        //insert
        $date->user_id = $date->user_id;
        $date->clinic_id = $date->clinic_id;
        $date->messageToUser = "Sorry an emergency event led to the cancellation of the appointment.
        Message us again to set an appointment later";
        $date->messageToDoctor = "Hi Dr the appointment has been cancelled ";
        $date->save();
        $message = MessageToNurse::where('save_date_id', $save_date_id)->first();
        $message->delete();
        return redirect(route('nurse.dates'));
    }
    public function update(Request $request, $save_date_id)
    {
        $data = $request->only(['user_id', 'clinic_id', 'date', 'time', 'messageToUser', 'messageToDoctor']);
        SaveDate::where('id', $save_date_id)->update($data);
        $message = MessageToNurse::where('save_date_id', $save_date_id)->first();
        $message->delete();
        return redirect(route('nurse.dates'));
    }
}