<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GlasbenaSkupina extends Model
{
    use HasFactory;

    protected $fillable = ['imeskupine', 'zanr', 'lokacija', 'opis', 'oznake'];

    public function scopeFilter($query, array $filters) {
        if($filters['oznake'] ?? false) {
            $query->where('oznake', 'like', '%' . request('oznake') . '%');
        }

        if($filters['search'] ?? false) {
            $query->where('imeskupine', 'like', '%' . request('search') . '%')
                ->orWhere('opis', 'like', '%' . request('search') . '%')
                ->orWhere('oznake', 'like', '%' . request('search') . '%');
        }
    }

    // Relationship To User
    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
