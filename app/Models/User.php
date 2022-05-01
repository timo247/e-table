<?php

namespace App\Models;

use App\Models\Voiture;
use App\Models\Etablissement;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'admin',
        'gerant'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // DEFINITON DE LA RELATION x:N
    public function voitures()
    { // NOUVEAU !!!!!!!!
        return $this->hasMany(Voiture::class); // Relation (1:)N
    }

     // DEFINITON DE LA RELATION x:N
     public function etablissements()
     { // NOUVEAU !!!!!!!!
         return $this->belongsToMany(Etablissement::class); 
     }

}
