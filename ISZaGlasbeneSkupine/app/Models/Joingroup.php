<?php

namespace App\Models;

use App\Models\User;
use App\Models\Glasbenaskupina;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Invite extends Model
{
    use HasFactory;

    public $table="joingroups";
    
    protected $fillable = [
        'id',
        'user_id',
        'group_id',
    ];


}
