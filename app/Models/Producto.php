<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'linea', 
        'catalogo', 
        'modelo', 
        'serie', 
        'color', 
        'ubicacion', 
        'diasPiso', 
        'costo', 
        'estatus', 
        'observaciones', 
        'apartado',
        'autorizado'
    ];
}
