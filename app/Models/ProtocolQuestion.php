<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProtocolQuestion extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table='protocol_questions';
    protected $fillable=[
        'chapter_id',
        'hint',
        'question',
        'type',
    ];
}
