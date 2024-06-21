<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disease extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'code',
        'solution',
    ];

    public function symptoms()
    {
        return $this->belongsToMany(Symptoms::class, 'symptoms_diseases', 'disease_id', 'symptoms_id');
    }
}
