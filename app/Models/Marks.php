<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Student;


class Marks extends Model
{
    use HasFactory;
    protected $fillable = ['student_id', 'subject', 'marks'];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
