<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ImageController extends Controller
{
    public function store(Request $request)
    {
        // obtener imagen cargada
        $imagen = $request->file('file');
        // generar nombre unico para cada imagen
        $nombreImagen = Str::uuid() . "." . $imagen->extension();
        // crear instancia de intervention image
        $imagenServidor = Image::make($imagen);
        // aplicar cambios a imagen
        $imagenServidor->fit(1000, 1000);
        // definir ruta destino
        $imagenPath = public_path('uploads' . '/' . $nombreImagen);
        // guardar imagen final
        $imagenServidor->save($imagenPath);

        return response()->json(['image' => $nombreImagen]);
    }
}
