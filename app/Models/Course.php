<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;


    
    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'teacher_id', 'user_id');  // 'teacher_id' là khóa ngoại trong bảng courses, 'user_id' là khóa chính trong bảng teachers
    }
}
