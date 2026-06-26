<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ItemRequisicion extends Model
{
    protected $table = 'items_requisicion';

    protected $primaryKey = 'id_item_requisicion';

    protected $fillable = [
        'id_requisicion',
        'codigo',
    ];

    public function requisicion(): BelongsTo
    {
        return $this->belongsTo(Requisicion::class, 'id_requisicion', 'id_requisicion');
    }

    public function material(): BelongsTo
    {
        return $this->belongsTo(Material::class, 'codigo', 'codigo');
    }
}
