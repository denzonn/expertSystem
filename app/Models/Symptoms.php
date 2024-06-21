<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Symptoms extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'code',
        'bobot',
    ];
    public function diseases()
    {
        return $this->belongsToMany(Disease::class, 'symptoms_diseases', 'symptoms_id', 'disease_id');
    }
}
