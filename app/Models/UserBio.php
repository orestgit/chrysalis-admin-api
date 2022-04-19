<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserBio extends Model
{
    use HasFactory;
    protected $table='user_bio';

    protected $fillable=[
        'user_id',
        'about',
        'facebook',
        'instagram',
        'twitter',
        'linkedin',
    ];
}
