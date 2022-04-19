<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use  Illuminate\Database\Eloquent\SoftDeletes;
class UserEducation extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table='user_education';
    protected $fillable = [
        'user_id',
        'year',
        'details',
    ];

}
