<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Enseignant extends Model
{
    use SoftDeletes;
    protected $primaryKey = 'enseignant_id';
    protected $table = 'enseignants';

    protected $fillable = [
        'matricule',
        'speciality'
    ];

    public function cours () : HasMany
    {
        return $this->hasMany(Cour::class, 'enseignant_id', 'enseignant_id');
    }

    public function absences () : HasMany
    {
        return $this->hasMany(Absence::class, 'enseignant_id', 'enseignant_id');
    }

    public function emargements () : HasMany
    {
        return $this->hasMany(Emargement::class, 'enseignant_id', 'enseignant_id');
    }

    public function rapports () : HasMany
    {
        return $this->hasMany(Rapport::class, 'enseignant_id', 'enseignant_id');
    }

    public function user () : BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }
}
