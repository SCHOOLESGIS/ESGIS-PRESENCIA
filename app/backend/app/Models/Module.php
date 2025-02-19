<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Module extends Model
{
    use SoftDeletes;
    protected $primaryKey = 'module_id';
    protected $table = 'modules';

    protected $fillable = [
        'module_name',
        'module_code',
        'description'
    ];

    public function filiere () : HasOne
    {
        return $this->hasOne(Filiere::class, 'filiere_id', 'filiere_id');
    }

    public function cours () : HasMany
    {
        return $this->hasMany(Cour::class, 'module_id', 'module_id');
    }
}
