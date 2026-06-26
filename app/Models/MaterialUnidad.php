namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaterialUnidad extends Model
{
    use HasFactory;

    protected $table = 'material_unidad';
    
    // Definición explícita de la llave primaria personalizada
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
    public function unidad()
    {
        return $this->belongsTo(Unidad::class, 'id_unidad', 'id_unidad');
    }

    /**
     * Relación inversa hacia el modelo Material.
     */
    public function material()
    {
        return $this->belongsTo(Material::class, 'codigo', 'codigo');
    }

    /**
     * Relación inversa hacia el modelo Presupuesto.
     */
    public function presupuesto()
    {
        return $this->belongsTo(Presupuesto::class, 'codigo_presupuesto', 'codigo');
    }
}