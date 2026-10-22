<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

use App\Models\Receta;
use App\Models\Ingrediente;

// ===== Ejercicio 4 =====
Route::get('/receta', function () {
    $receta = Receta::create([
        'titulo' => 'Panqueques',
        'porciones' => 4,
        'instrucciones' => 'Mezclar los ingredientes, verter en sartén caliente y cocinar por ambos lados.',
    ]);

    $harina = Ingrediente::firstOrCreate(['nombre' => 'Harina']);
    $leche  = Ingrediente::firstOrCreate(['nombre' => 'Leche']);
    $huevo  = Ingrediente::firstOrCreate(['nombre' => 'Huevo']);

    $receta->ingredientes()->attach($harina->id, ['cantidad' => 250, 'unidad_medida' => 'gramos']);
    $receta->ingredientes()->attach($leche->id,  ['cantidad' => 300, 'unidad_medida' => 'ml']);
    $receta->ingredientes()->attach($huevo->id,  ['cantidad' => 2,   'unidad_medida' => 'unidades']);

    return $receta->load('ingredientes');
});
