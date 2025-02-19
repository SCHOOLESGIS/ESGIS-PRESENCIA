<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Absence extends Model
{
    use SoftDeletes;
    protected $primaryKey = 'absence_id';
    protected $table = 'absences';

    protected $fillable = [
        'absence_date',
        'status'
    ];

    public function justification () : HasOne
    {
        return $this->hasOne(Justification::class, 'absence_id', 'absence_id');
    }

    public function enseignant () : BelongsTo
    {
        return $this->belongsTo(Enseignant::class, 'enseignant_id', 'enseignant_id');
    }

    public function cour() : BelongsTo
    {
        return $this->belongsTo(Cour::class, 'cour_id', 'cour_id');
    }
}
