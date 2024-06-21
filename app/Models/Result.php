<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;

    protected $fillable = [
        'symptoms',
        'disease',
        'solution',
        'user_id',
        'percentage',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
