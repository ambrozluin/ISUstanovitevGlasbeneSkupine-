<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instrument extends Model
{
    use HasFactory;

    public $table = 'instruments';

    protected $fillable = ['ime', 'vrsta', 'cena', 'user_id'];

    
    // Relationship To User
      public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
