<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class StaticPage extends Model
{
    use HasFactory;
    public $fillable=[
        'parent',
        'title',
        'content',
        'icon'
    ];
}
