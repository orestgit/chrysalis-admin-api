<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserInvitations extends Model
{
    use HasFactory;
    protected $table='user_invitations';
    protected $fillable=['user_id','message'];
}
