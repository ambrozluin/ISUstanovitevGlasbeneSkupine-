<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Invite extends Model
{
    use HasFactory;

    public $table="invites";
    
    protected $fillable = [
        'email', 'instrument', 'namen', 'token',
    ];

    // Relationship To User
      public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
