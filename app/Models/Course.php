<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    // digunakan untuk menghubungkan Course dengan users
    public function users()
    {
        // untuk mendapatkan user yang mengambil suatu course
        return $this->belongsToMany(User::class);
    }

    // digunakan untuk menghubungkan Course dengan departments
    public function departments()
    {
        // untuk mendapatkan department dari suatu course
        return $this->belongsTo(Department::class);
    }
}
