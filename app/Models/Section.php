<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'about'];

    protected $hidden = ['created_at', 'updated_at'];

    public function clinics()
    {
        return $this->hasMany(Clinic::class);
    }
}
