<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SymptomsDisease extends Model
{
    use HasFactory;

    protected $fillable = [
        'disease_id',
        'symptoms_id',
    ];

    public function disease(){
        return $this->belongsTo(Disease::class);
    }

    public function symptoms(){
        return $this->belongsTo(Symptoms::class);
    }
}
