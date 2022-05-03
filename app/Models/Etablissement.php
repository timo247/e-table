<?php

namespace App\Models;

use App\Models\User;
use App\Models\Accessoire;
use App\Models\Consommation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Etablissement extends Model
{
    use HasFactory;

    protected $fillable=['nom'];  
    public function users() {                
        return $this->belongsToMany(User::class);    
    } 

    public function consommations() {                
        return $this->hasMany(Consommation::class);    
    } 
}
