<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MessageToNurse extends Model
{
    use HasFactory;

    protected $fillable = ['save_date_id', 'message'];

    public function savedDate()
    {
        return   $this->hasOne(SaveDate::class);
    }

    public function find_save_dates($save_date_id)
    {
        return  $save_dates = SaveDate::where('id', $save_date_id)->get();
    }
}