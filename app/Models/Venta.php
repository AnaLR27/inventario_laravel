<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Venta extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'producto_id',
        'cantidad',
        'precio_total',
    ];

    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }
}
