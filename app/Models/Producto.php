<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Producto extends Model
{
    use HasFactory;

    // Especificar la tabla (opcional si sigue la convención de Laravel)
    protected $table = 'productos';

    // Campos permitidos para asignación masiva
    // Define los campos que pueden ser asignados masivamente con create() o update().
    protected $fillable = [
        'nombre',
        'precio',
        'descripcion',
        'cantidad',
    ];

    // Definir la relación con las ventas
    public function ventas()
    {
        return $this->hasMany(Venta::class, 'producto_id'); // 'producto_id' es la clave foránea en la tabla ventas
    }
}
