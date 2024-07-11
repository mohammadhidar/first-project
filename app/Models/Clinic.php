<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clinic extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'location', 'about', 'phone', 'user_id', 'nurse_id', 'section_id'];
    protected $hidden = ['created_at', 'updated_at'];

    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    public function dates()
    {
        return $this->hasMany(Date::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function books()
    {
        return $this->hasMany(Book::class);
    }

    public function saveDates()
    {
        return $this->hasMany(SaveDate::class);
    }
}
