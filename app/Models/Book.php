<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $fillable =   ['clinic_id', 'user_id', 'day', 'date', 'time1', 'time2', 'state'];

    public function clinic()
    {
        return $this->belongsTo(Clinic::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}