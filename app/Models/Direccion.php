<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Direccion extends Model
{
    protected $primaryKey = 'ID_Direccion';
    public $incrementing = true;
    protected $keyType = 'int';
    protected $table = 'direcciones';
    use HasFactory;

    protected $fillable = ['ID_Cliente', 'Estado', 'Municipio', 'Colonia', 'Calle', 'Numero_Ext', 'Numero_Int', 'Codigo_Postal'];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'ID_Cliente');
    }
}
