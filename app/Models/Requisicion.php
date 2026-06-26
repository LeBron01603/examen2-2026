<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Requisicion extends Model
{
    protected $table = 'requisiciones';

    protected $primaryKey = 'id_requisicion';

    protected $fillable = [
        'fecha',
        'estado',
    ];

    public function itemsRequisicion(): HasMany
    {
        return $this->hasMany(ItemRequisicion::class, 'id_requisicion');
    }
}
