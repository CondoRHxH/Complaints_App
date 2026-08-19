<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Professeur extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $guard = 'Professeur';
    protected $fillable = ['Mat_prof','Telephone','Filiere','Email','Niveau','Prenom','Nom'];

    protected $primaryKey = 'id';

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
        'password' => 'hashed',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function notes()
    {
        return $this->hasMany(Note::class);
    }

    public function matieres()
    {
        return $this->hasMany(Matiere::class);
    }

    public function reclamations()
    {
        return $this->hasMany(Reclamer::class);
    }
}
