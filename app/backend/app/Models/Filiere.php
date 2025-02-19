<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Filiere extends Model
{
    use SoftDeletes;
    protected $primaryKey = 'filiere_id';
    protected $table = 'filieres';

    protected $fillable = [
        'filiere_name',
        'filiere_level'
    ];

    public function modules () : HasMany
    {
        return $this->hasMany(Module::class, 'filiere_id', 'filiere_id');
    }
}
