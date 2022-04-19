<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class CourseMeta extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table='course_meta';

    protected $fillable=[
        'course_id',
        'views',
        'likes',
        'location',
        'lat',
        'lng',
    ];
}
