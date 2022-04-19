<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CourseCategory extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table='course_categories';
    protected $fillable = [
        'name',
        'icon'
    ];
}
