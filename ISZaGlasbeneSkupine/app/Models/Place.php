<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    use HasFactory;

    public $table = 'glasbeniprostori';


    // Relationship To User
    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
