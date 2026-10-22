<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Ingrediente extends Model
{
    protected $fillable = ['nombre'];

    public function recetas(): BelongsToMany
    {
        return $this->belongsToMany(Receta::class, 'ingrediente_receta')
                    ->withPivot('cantidad', 'unidad_medida')
                    ->withTimestamps();
    }
}
