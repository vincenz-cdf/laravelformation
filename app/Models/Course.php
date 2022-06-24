<?php

namespace App\Models;

use App\Models\User;
use App\Models\Video;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Course extends Model
{
    use HasFactory;

    public function videos() {
        return $this->hasMany(Video::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
