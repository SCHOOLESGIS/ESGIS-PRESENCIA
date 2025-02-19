<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Emargement extends Model
{
    use SoftDeletes;
    protected $primaryKey = 'emargement_id';
    protected $table = 'emargements';

    protected $fillable = [
        'begin_hour',
        'end_hour',
        'status'
    ];

    public function cour () : BelongsTo
    {
        return $this->belongsTo(Cour::class, 'cour_id', 'cour_id');
    }

    public function enseignant () : BelongsTo
    {
        return $this->belongsTo(Enseignant::class, 'enseignant_id', 'enseignant_id');
    }
}
