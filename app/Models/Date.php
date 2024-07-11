<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Date extends Model
{
    use HasFactory;

    protected $fillable = ['clinic_id', 'day', 'start_at', 'end_at', 'break'];

    //  protected $hidden = ['created_at', 'updated_at'];

    public function clinic()
    {
        return $this->belongsTo(Clinic::class);
    }
}
