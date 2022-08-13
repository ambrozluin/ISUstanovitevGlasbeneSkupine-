<?php

namespace App\Models;

use App\Models\User;
use App\Models\Glasbenaskupina;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Invite extends Model
{
    use HasFactory;

    public $table="invites";
    
    protected $fillable = [
        'sender_id',
        'receiver_id',
        'group_id',
        'email',
        'sender_email',
        'instrument', 
        'namen', 
        'token',
        'status'
    ];

    // Relationship To User
    //  public function user() {
   //     return $this->belongsTo(User::class, 'user_id');
    //}

    // Relationship To User
    public function sender() {
        return $this->belongsTo(User::class, 'sender_id');
    }

    // Relationship To User
    public function receiver() {
        return $this->belongsTo(User::class, 'receiver_id');
    }

    // Relationship To User
    public function group() {
        return $this->belongsTo(Glasbenaskupina::class, 'group_id');
    }


}
