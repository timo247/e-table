<?php

namespace App\Models;
use App\Models\Etablissement;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Consommation extends Model
{
    use HasFactory;
    protected $fillable = ['nom','description','image_url','categorie','prix','tags','etablissement_id'];
    
    public function etablissement() {                    // NOUVEAU !!!!!!!!!!
        return $this->belongsTo(Etablissement::class);    // Relation 1(:N)
    } 
}
