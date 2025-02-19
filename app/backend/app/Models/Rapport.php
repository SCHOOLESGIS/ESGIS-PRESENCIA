<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rapport extends Model
{
    use SoftDeletes;
    protected $primaryKey = 'rapport_id';
    protected $table = 'rapports';

    protected $fillable = [
        'hour_number',
        'absence_number',
        'justification_number'
    ];

    public function enseignants () : HasMany
    {
        return $this->hasMany(Enseignant::class, 'rapport_id', 'rapport_id');
    }
}
