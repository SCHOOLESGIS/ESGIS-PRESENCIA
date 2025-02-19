<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cour extends Model
{
    use SoftDeletes;
    protected $primaryKey = 'cour_id';
    protected $table = 'cours';

    protected $fillable = [
        'cour_date',
        'begin_hour',
        'end_hour',
        'status'
    ];

    public function emargement () : HasOne
    {
        return $this->hasOne(Emargement::class, 'cour_id', 'cour_id');
    }

    public function enseignant () : BelongsTo
    {
        return $this->belongsTo(Enseignant::class, 'absence_id', 'absence_id');
    }

    public function module() : BelongsTo
    {
        return $this->belongsTo(Module::class, 'module_id', 'module_id');
    }
}
