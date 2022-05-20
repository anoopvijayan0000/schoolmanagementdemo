<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Studentmarks extends Model
{
    use HasFactory;
    public $fillable = [
        'subject',
        'term',
        'total_mark',
        'student_id'
    ];
}
