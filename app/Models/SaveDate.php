<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaveDate extends Model
{
    use HasFactory;
    protected $fillable = ['clinic_id', 'user_id', 'date', 'time', 'messageToUser', 'messageToDoctor'];

    public function clinic()
    {
        return $this->belongsTo(Clinic::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function messageToUser()
    {
        return $this->belongsTo(messageToUser::class);
    }
}