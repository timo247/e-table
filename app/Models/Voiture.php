<?php

namespace App\Models;

use App\Models\User;
use App\Models\Accessoire;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Voiture extends Model
{
    use HasFactory;

    protected $fillable=['marque','type', 'couleur', 'cylindree', 'user_id'];  // pour plus tard ;-)    
    public function user() {                    // NOUVEAU !!!!!!!!!!
        return $this->belongsTo(User::class);    // Relation 1(:N)
    } 
    public function accessoires() {
        return $this->belongsToMany(Accessoire::class);
        }
}
