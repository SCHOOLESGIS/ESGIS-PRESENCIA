<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rapport extends Model
{
    use SoftDeletes;
    protected $primaryKey = 'rapport_id';
    protected $table = 'rapports';

    protected $fillable = [
        'enseignant_id',
        'emargement_debut',
        'emargement_fin',
        'emargement_confirm',
        'emargement_not_confirm',
    ];

    public function enseignant () : HasOne
    {
        return $this->hasOne(Enseignant::class, 'enseignant_id', 'enseignant_id');
    }
}
