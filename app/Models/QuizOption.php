<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class QuizOption extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table='quiz_options';
    protected $fillable=[
        'question_id',
        'option',
        'is_correct',
    ];
}
