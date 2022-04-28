<?php

namespace App\Models;

use App\Models\Voiture;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Accessoire extends Model
{
    use HasFactory;
    protected $fillable = ['type', 'type_url'];
    public function voitures()
    {
        return $this->belongsToMany(Voiture::class);
    }
}
