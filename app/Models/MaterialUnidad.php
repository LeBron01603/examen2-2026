<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MaterialUnidad extends Model
{
    use HasFactory;

    protected $table = 'material_unidad';
    
    protected $primaryKey = 'id_material_unidad';

    protected $fillable = [
        'cantidad',
        'id_unidad',
        'codigo',
        'codigo_presupuesto',
    ];

    /**
     * Relación inversa hacia el modelo Unidad.
     */
    public function unidad(): BelongsTo
    {
        return $this->belongsTo(Unidad::class, 'id_unidad', 'id_unidad');
    }

    /**
     * Relación inversa hacia el modelo Material.
     */
    public function material(): BelongsTo
    {
        return $this->belongsTo(Material::class, 'codigo', 'codigo');
    }

    /**
     * Relación inversa hacia el modelo Presupuesto.
     */
    public function presupuesto(): BelongsTo
    {
        return $this->belongsTo(Presupuesto::class, 'codigo_presupuesto', 'codigo_presupuesto');
    }
}