<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Justification extends Model
{
    use SoftDeletes;
    protected $primaryKey = 'justification_id';
    protected $table = 'justifications';

    protected $fillable = [
        'type',
        'doc'
    ];

    public function justification () : BelongsTo
    {
        return $this->belongsTo(Justification::class, 'absence_id', 'absence_id');
    }
}
