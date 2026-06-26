<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Presupuesto extends Model
{
    protected $table = 'presupuestos';

    protected $primaryKey = 'codigo_presupuesto';

    public $incrementing = false;

    protected $keyType = 'string';

    protected $fillable = [
        'codigo_presupuesto',
        'nombre_presupuesto',
    ];

    public function materialUnidades(): HasMany
    {
        return $this->hasMany(MaterialUnidad::class, 'codigo_presupuesto', 'codigo_presupuesto');
    }
}
