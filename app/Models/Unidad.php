namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unidad extends Model
{
    use HasFactory;

    protected $table = 'unidades';
    
    // Definición explícita de la llave primaria personalizada
    protected $primaryKey = 'id_unidad';

    protected $fillable = [
        'nombre',
    ];

    /**
     * Relación con los registros de la tabla intermedia.
     */
    public function materialUnidades()
    {
        return $this->hasMany(MaterialUnidad::class, 'id_unidad', 'id_unidad');
    }
}