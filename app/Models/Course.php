<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\CourseLesson;
class Course extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'course_category_id',
        'title',
        'price',
        'summary',
        'method',
        'views',
        'likes',
        'image',
        'status',
    ];
    public function courseLessons(){
        return $this->hasMany(CourseLesson::class);
    }
}
