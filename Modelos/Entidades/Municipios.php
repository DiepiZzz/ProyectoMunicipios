<?php
namespace Modelos\Entidades;

use Illuminate\Database\Eloquent\Model;
use Modelos\Entidades\Usuario;

class Municipios extends Model
{
    protected $table = 'municipio'; 

    protected $primaryKey = 'id_municipio'; 

    public $timestamps = false; 

    protected $fillable = [
        'nombre',
        'departamento',
        'pais',
        'alcalde',
        'gobernador',
        'patron_religioso',
        'num_habitantes',
        'num_casas',
        'num_parques',
        'num_colegios',
        'descripcion',
        'id_usuario'
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_usuario', 'id_usuario');
    }
}
?>